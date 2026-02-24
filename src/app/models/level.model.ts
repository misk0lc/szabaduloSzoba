export interface Level {
  LevelID: number;
  Name: string;
  Description: string;
  OrderNumber: number;
  IsUnlocked: boolean;
  IsCompleted: boolean;
  IsActive: boolean;
}

export interface LevelDetail extends Level {
  TimeSpent: number;
  CompletedAt?: string;
}
