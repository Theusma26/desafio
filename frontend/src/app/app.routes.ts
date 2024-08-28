import { Routes } from '@angular/router';
import { HomeComponent } from './pages/home/home.component';
import { TransactionFormComponent } from './components/transaction-form/transaction-form.component';

export const routes: Routes = [
    { path: '', redirectTo: '/transactions', pathMatch: 'full' },
    { path: 'transactions', component: HomeComponent },
    { path: 'transaction-form', component: TransactionFormComponent },
    { path: 'transaction-form/:id', component: TransactionFormComponent },
];
