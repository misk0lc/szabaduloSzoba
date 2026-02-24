import { Component } from '@angular/core';
import { AuthService } from '../../services/auth.service';

@Component({
  selector: 'app-admin',
  standalone: true,
  templateUrl: './admin.component.html',
  styleUrl: './admin.component.css'
})
export class AdminComponent {

  user;

  constructor(private auth: AuthService) {
    this.user = this.auth.getUser();
  }

  logout(): void {
    this.auth.logout().subscribe();
  }

}
