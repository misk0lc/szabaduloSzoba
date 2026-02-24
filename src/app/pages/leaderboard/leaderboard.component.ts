import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { AuthService } from '../../services/auth.service';
import { LeaderboardEntry } from '../../models/leaderboard.model';

@Component({
  selector: 'app-leaderboard',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './leaderboard.component.html',
  styleUrls: ['./leaderboard.component.css']
})
export class LeaderboardComponent implements OnInit {
  entries: LeaderboardEntry[] = [];
  loading = true;
  error = '';
  private api = 'http://localhost:8001/api';

  constructor(
    private http: HttpClient,
    private auth: AuthService,
    private router: Router
  ) {}

  ngOnInit(): void {
    this.http.get<LeaderboardEntry[]>(`${this.api}/leaderboard`).subscribe({
      next: (data) => {
        this.entries = data;
        this.loading = false;
      },
      error: () => {
        this.error = 'Nem sikerült betölteni a rangsort.';
        this.loading = false;
      }
    });
  }

  visszaMegyek(): void {
    this.router.navigate(['/game']);
  }

  kilepes(): void {
    this.auth.logout().subscribe();
  }

  formatIdo(seconds: number): string {
    if (!seconds) return '–';
    const m = Math.floor(seconds / 60);
    const s = seconds % 60;
    return `${m}p ${s}mp`;
  }

  getSajat(): number {
    const user = this.auth.getUser();
    return this.entries.findIndex(e => e.UserID === user?.UserID) + 1;
  }
}
