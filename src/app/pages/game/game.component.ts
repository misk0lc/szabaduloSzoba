import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { CommonModule } from '@angular/common';
import { AuthService } from '../../services/auth.service';
import { LevelService } from '../../services/level.service';
import { Level } from '../../models/level.model';

@Component({
  selector: 'app-game',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './game.component.html',
  styleUrl: './game.component.css'
})
export class GameComponent implements OnInit {

  user;
  levels: Level[] = [];
  toltes = true;
  hiba = '';

  constructor(
    private auth: AuthService,
    private levelService: LevelService,
    private router: Router
  ) {
    this.user = this.auth.getUser();
  }

  ngOnInit(): void {
    this.levelService.getLevels().subscribe({
      next: (levels) => {
        this.levels = levels;
        this.toltes = false;
      },
      error: () => {
        this.hiba = 'Nem sikerült betölteni a pályákat.';
        this.toltes = false;
      }
    });
  }

  palyaValaszt(level: Level): void {
    if (!level.IsUnlocked) return;
    this.router.navigate(['/room', level.LevelID]);
  }

  logout(): void {
    this.auth.logout().subscribe();
  }

  getAllapot(level: Level): 'completed' | 'active' | 'locked' {
    if (level.IsCompleted) return 'completed';
    if (level.IsUnlocked) return 'active';
    return 'locked';
  }
}
