<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransactionType;

class TransactionTypeSeeder extends Seeder
{
    public function run()
    {
        $types = [
            'Aluguel',
            'Salário',
            'Prolabore',
            'Contas',
            'Alimentação',
            'Educação',
            'Investimentos',
            'Mercado',
            'Transporte',
            'Vestuário',
            'Outros'
        ];

        foreach ($types as $type) {
            TransactionType::create(['name' => $type]);
        }
    }
}
