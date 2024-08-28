import { Component, effect, signal } from '@angular/core';
import { TransactionService } from '../../services/transaction.service';
import { Transaction } from '../../types/types';
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router';

@Component({
  selector: 'app-transaction-list',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './transaction-list.component.html',
  styleUrl: './transaction-list.component.css'
})
export class TransactionListComponent {
  transactionsSignal = signal<Transaction[]>([]);

  constructor(
    private transactionService: TransactionService,
    private router: Router
    ) {
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

  editTransaction(transactionId: number) {
    this.router.navigate(['/transaction-form', transactionId]);
  }

}
