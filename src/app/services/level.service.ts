import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Level } from '../models/level.model';

@Injectable({ providedIn: 'root' })
export class LevelService {

  private api = 'http://localhost:8001/api';

  constructor(private http: HttpClient) {}

  getLevels(): Observable<Level[]> {
    return this.http.get<Level[]>(`${this.api}/levels`);
  }
}
