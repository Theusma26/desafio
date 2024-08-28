export enum TransactionTypeEnum {
    EXPENSE = 'expense',
    INCOME = 'income'
}
  
export interface Transaction {
    id: number;
    amount: number;
    type: TransactionTypeEnum; 
    transaction_type: TransactionType;
}

export interface TransactionType {
    id: number;
    name: string;
}

export interface ApiResponse {
    message: string;
    error?: string;
}
  