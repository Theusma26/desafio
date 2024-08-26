<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->enum('categoria', [
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
            ])->after('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('categoria');
        });
    }
};
