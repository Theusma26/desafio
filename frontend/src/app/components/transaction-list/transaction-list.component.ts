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
  loading = signal<boolean>(true);

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
        this.loading.set(false);
      },
      (error) => {
        console.error('Error fetching transactions:', error);
        this.loading.set(false);
      }
    );
  }

  editTransaction(transactionId: number) {
    this.router.navigate(['/transaction-form', transactionId]);
  }

  deleteTransaction(id: number) {
    this.loading.set(true);
    if (confirm('Are you sure you want to delete this transaction?')) {
      this.transactionService.deleteTransaction(id).subscribe(() => {
        this.loadTransactions();
      });
    }
  }

}
