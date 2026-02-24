import { Component, OnInit, OnDestroy } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { interval, Subscription } from 'rxjs';

import { AuthService } from '../../services/auth.service';
import { QuestionService } from '../../services/question.service';
import { HintService } from '../../services/hint.service';
import { ProgressService } from '../../services/progress.service';

import { Question, CheckAnswerResponse } from '../../models/question.model';
import { Hint } from '../../models/hint.model';

interface QuestionState {
  question: Question;
  solved: boolean;
  digit: number | null;
}

@Component({
  selector: 'app-room',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './room.component.html',
  styleUrls: ['./room.component.css']
})
export class RoomComponent implements OnInit, OnDestroy {

  // ─── Állapotok ───────────────────────────────────────────────────
  levelId = 0;
  loading = true;
  error = '';

  questions: QuestionState[] = [];
  balance = 0;

  // ─── Kérdés modal ────────────────────────────────────────────────
  activeQuestion: QuestionState | null = null;
  answerInput = '';
  answerResult: CheckAnswerResponse | null = null;
  answerLoading = false;

  // ─── Hint panel ──────────────────────────────────────────────────
  showHints = false;
  hints: Hint[] = [];
  hintsLoading = false;
  hintError = '';
  boughtHints: Hint[] = [];

  // ─── Kód beküldés ────────────────────────────────────────────────
  showCodeSubmit = false;
  codeInput = '';
  submitResult: { correct: boolean; message: string; score?: number } | null = null;
  submitLoading = false;

  // ─── Timer ───────────────────────────────────────────────────────
  timeSpent = 0;
  private timerSub?: Subscription;

  get timerDisplay(): string {
    const m = Math.floor(this.timeSpent / 60);
    const s = this.timeSpent % 60;
    return `${String(m).padStart(2,'0')}:${String(s).padStart(2,'0')}`;
  }

  // ─── Összegyűjtött számjegyek ─────────────────────────────────────
  get collectedDigits(): (number | null)[] {
    return this.questions.map(q => q.digit);
  }

  get solvedCount(): number {
    return this.questions.filter(q => q.solved).length;
  }

  get allSolved(): boolean {
    return this.questions.length > 0 && this.questions.every(q => q.solved);
  }

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private auth: AuthService,
    private questionSvc: QuestionService,
    private hintSvc: HintService,
    private progressSvc: ProgressService
  ) {}

  ngOnInit(): void {
    this.levelId = Number(this.route.snapshot.paramMap.get('id'));
    this.loadQuestions();
    this.startTimer();
  }

  ngOnDestroy(): void {
    this.timerSub?.unsubscribe();
  }

  private startTimer(): void {
    this.timerSub = interval(1000).subscribe(() => this.timeSpent++);
  }

  loadQuestions(): void {
    this.loading = true;
    this.questionSvc.getQuestions(this.levelId).subscribe({
      next: (data) => {
        this.questions = data.map(q => ({ question: q, solved: false, digit: null }));
        this.loading = false;
      },
      error: () => {
        this.error = 'Nem sikerült betölteni a szoba kérdéseit.';
        this.loading = false;
      }
    });
  }

  // ─── Kérdés megnyitása ────────────────────────────────────────────
  openQuestion(qs: QuestionState): void {
    if (qs.solved) return;
    this.activeQuestion = qs;
    this.answerInput = '';
    this.answerResult = null;
    this.showHints = false;
    this.hints = [];
    this.boughtHints = [];
    this.hintError = '';
  }

  closeQuestion(): void {
    this.activeQuestion = null;
    this.answerResult = null;
  }

  // ─── Válasz ellenőrzése ───────────────────────────────────────────
  checkAnswer(): void {
    if (!this.activeQuestion || !this.answerInput.trim()) return;
    this.answerLoading = true;
    this.answerResult = null;

    this.questionSvc.checkAnswer(this.activeQuestion.question.QuestionID, {
      answer: this.answerInput.trim()
    }).subscribe({
      next: (res) => {
        this.answerResult = res;
        this.answerLoading = false;
        if (res.correct && this.activeQuestion) {
          this.activeQuestion.solved = true;
          if (res.RewardDigit !== undefined) {
            this.activeQuestion.digit = res.RewardDigit;
          }
          if (res.NewBalance !== undefined) {
            this.balance = res.NewBalance;
          }
          setTimeout(() => this.closeQuestion(), 1800);
        }
      },
      error: () => {
        this.answerResult = { correct: false, message: 'Szerver hiba. Próbáld újra.' };
        this.answerLoading = false;
      }
    });
  }

  // ─── Hint kezelés ────────────────────────────────────────────────
  toggleHints(): void {
    this.showHints = !this.showHints;
    if (this.showHints && this.hints.length === 0 && this.activeQuestion) {
      this.loadHints(this.activeQuestion.question.QuestionID);
    }
  }

  loadHints(questionId: number): void {
    this.hintsLoading = true;
    this.hintSvc.getHints(questionId).subscribe({
      next: (data) => {
        this.hints = data;
        this.hintsLoading = false;
      },
      error: () => {
        this.hintError = 'Nem sikerült betölteni a tippeket.';
        this.hintsLoading = false;
      }
    });
  }

  buyHint(hint: Hint): void {
    this.hintSvc.buyHint(hint.HintID).subscribe({
      next: (res) => {
        this.balance = res.NewBalance;
        const bought: Hint = { ...hint, HintText: res.HintText };
        this.boughtHints.push(bought);
        // frissítjük az listában is
        const idx = this.hints.findIndex(h => h.HintID === hint.HintID);
        if (idx !== -1) this.hints[idx] = bought;
      },
      error: () => {
        this.hintError = 'Nincs elegendő egyenleged vagy már megvetted ezt a tippet.';
      }
    });
  }

  isHintBought(hint: Hint): boolean {
    return hint.HintText !== undefined && hint.HintText !== null;
  }

  // ─── Kód beküldés ────────────────────────────────────────────────
  openCodeSubmit(): void {
    this.showCodeSubmit = true;
    this.codeInput = this.collectedDigits.map(d => d ?? '_').join('');
    this.submitResult = null;
  }

  closeCodeSubmit(): void {
    this.showCodeSubmit = false;
  }

  submitCode(): void {
    if (!this.codeInput.trim()) return;
    this.submitLoading = true;
    this.submitResult = null;

    this.progressSvc.submitCode(this.levelId, {
      code: this.codeInput.trim(),
      timeSpent: this.timeSpent
    }).subscribe({
      next: (res) => {
        this.submitLoading = false;
        this.submitResult = {
          correct: res.correct,
          message: res.message,
          score: res.Score
        };
        if (res.correct) {
          this.timerSub?.unsubscribe();
          setTimeout(() => this.router.navigate(['/game']), 3000);
        }
      },
      error: () => {
        this.submitLoading = false;
        this.submitResult = { correct: false, message: 'Szerver hiba. Próbáld újra.' };
      }
    });
  }

  // ─── Navigáció ───────────────────────────────────────────────────
  visszaMegyek(): void {
    this.router.navigate(['/game']);
  }

  kilepes(): void {
    this.auth.logout().subscribe();
  }

  getUsername(): string {
    return this.auth.getUser()?.Username ?? '';
  }
}
