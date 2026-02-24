export interface Question {
  QuestionID: number;
  LevelID: number;
  QuestionText: string;
  PositionX: number;
  PositionY: number;
  MoneyReward: number;
}

export interface CheckAnswerRequest {
  answer: string;
}

export interface CheckAnswerResponse {
  correct: boolean;
  message: string;
  RewardDigit?: number;
  MoneyReward?: number;
  NewBalance?: number;
  Penalty?: number;
}
