import { Component, inject } from '@angular/core';
import { TransactionListComponent } from '../../components/transaction-list/transaction-list.component';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [TransactionListComponent],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent {
  private router = inject(Router);

  constructor() { }

  navigateToCreate(): void {
    this.router.navigate(['/transaction-form']);
  }
}
