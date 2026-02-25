import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Level, LevelDetail } from '../models/level.model';
import { environment } from '../../environments/environment';

@Injectable({ providedIn: 'root' })
export class LevelService {

  private api = environment.apiUrl;

  constructor(private http: HttpClient) {}

  getLevels(): Observable<Level[]> {
    return this.http.get<Level[]>(`${this.api}/levels`);
  }

  getLevel(id: number): Observable<LevelDetail> {
    return this.http.get<LevelDetail>(`${this.api}/levels/${id}`);
  }
}
