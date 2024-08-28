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
  transactions = signal<Transaction[]>([]);

  constructor(
    private transactionService: TransactionService,
    private router: Router
    ) {
    effect(() => {
      this.loadTransactions();
    });
  }

  loadTransactions() {
    this.transactionService.getAllTransactions().subscribe(
      (data: Transaction[]) => {
        this.transactions.set(data);
      },
      (error) => {
        console.error('Error fetching transactions:', error);
      }
    );
  }

  editTransaction(transactionId: number) {
    this.router.navigate(['/transaction-form', transactionId]);
  }

  deleteTransaction(id: number) {
    if (confirm('Are you sure you want to delete this transaction?')) {
      this.transactionService.deleteTransaction(id).subscribe(() => {
        this.loadTransactions();
      });
    }
  }

}
