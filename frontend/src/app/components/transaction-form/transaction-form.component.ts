import { Component, signal } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { TransactionService } from '../../services/transaction.service';
import { ActivatedRoute, Router } from '@angular/router';
import { CommonModule } from '@angular/common';
import { TransactionType } from '../../types/types';

@Component({
  selector: 'app-transaction-form',
  standalone: true,
  imports: [CommonModule, ReactiveFormsModule],
  templateUrl: './transaction-form.component.html',
  styleUrls: ['./transaction-form.component.css'],
})
export class TransactionFormComponent {
  transactionForm: FormGroup;
  transactionId = signal<number | null>(null);
  transactionTypes = signal<TransactionType[]>([]);
  title = signal<string>('');
  isEditMode = signal(false);
  isLoading = signal(false);


  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private transactionService: TransactionService
  ) {

    this.transactionId.set(Number(this.route.snapshot.paramMap.get('id')) || null)
    this.isEditMode.set(!!this.transactionId());
    this.transactionForm = new FormGroup({
      amount: new FormControl(null, Validators.required),
      type: new FormControl('expense', Validators.required),
      transaction_type_id: new FormControl(null, Validators.required)
    });


    if (this.isEditMode()) {
      this.title.set('Editar Transação');
      this.loadTransaction(this.transactionId()!);
    } else {
      this.title.set('Adicionar Transação');
    }
    this.loadTransactionTypes();
  }

  loadTransaction(id: number) {
    this.isLoading.set(true);
    this.transactionService.getTransactionById(id).subscribe((transaction) => {
      this.transactionForm.patchValue(transaction);
      this.isLoading.set(false);
    });
  }

  loadTransactionTypes() {
    this.transactionService.getTransactionTypes().subscribe((types) => {
      this.transactionTypes.set(types);
    });
  }

  onSubmit(): void {
    if (this.transactionForm.valid) {
      const formValue = this.transactionForm.value;
      const adjustedAmount = formValue.type === 'expense' ? -Math.abs(formValue.amount!) : Math.abs(formValue.amount!);

     const transactionData = { ...formValue, amount: adjustedAmount };

      if (this.isEditMode()) {
        this.transactionService.updateTransaction(this.transactionId()!, transactionData).subscribe(() => {
          this.router.navigate(['/']);
        },
        (error)=>{
          console.error('Erro ao editar transação:', error);
        });
      } else {
        this.transactionService.createTransaction(transactionData).subscribe(
          () => {
            this.router.navigate(['/']);
          },
          (error) => {
            console.error('Erro ao criar transação:', error);
          }
      );}
    }
  }
}
