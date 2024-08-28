import { Component, effect, inject, signal } from '@angular/core';
import { TransactionService } from '../../services/transaction.service';
import { Transaction } from '../../types/types';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-transaction-list',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './transaction-list.component.html',
  styleUrl: './transaction-list.component.css'
})
export class TransactionListComponent {
  transactionsSignal = signal<Transaction[]>([]);

  constructor(private transactionService: TransactionService) {
    effect(() => {
      this.transactionService.getAllTransactions().subscribe(
        (data: Transaction[]) => {
          this.transactionsSignal.set(data);
        },
        (error) => {
          console.error('Error fetching transactions:', error);
        }
      );
    });
  }

  get transactions() {
    return this.transactionsSignal();
  }

}
