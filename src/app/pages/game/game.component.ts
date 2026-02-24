import { Component } from '@angular/core';
import { AuthService } from '../../services/auth.service';

@Component({
  selector: 'app-game',
  standalone: true,
  templateUrl: './game.component.html',
  styleUrl: './game.component.css'
})
export class GameComponent {

  user;

  constructor(private auth: AuthService) {
    this.user = this.auth.getUser();
  }

  logout(): void {
    this.auth.logout().subscribe();
  }

}
