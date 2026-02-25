import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Hint, BuyHintResponse } from '../models/hint.model';
import { environment } from '../../environments/environment';

@Injectable({ providedIn: 'root' })
export class HintService {
  private api = environment.apiUrl;

  constructor(private http: HttpClient) {}

  getHints(questionId: number): Observable<Hint[]> {
    return this.http.get<Hint[]>(`${this.api}/questions/${questionId}/hints`);
  }

  buyHint(hintId: number): Observable<BuyHintResponse> {
    return this.http.post<BuyHintResponse>(`${this.api}/hints/${hintId}/buy`, {});
  }
}
