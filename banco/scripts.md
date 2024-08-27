> Criação da tabela transaction_types
```sql
CREATE TABLE transaction_types (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP
);
```

> Criação da tabela transactions
```sql
CREATE TABLE transactions (
    id SERIAL PRIMARY KEY,
    amount DECIMAL(15, 2) NOT NULL,
    transaction_type_id INT NOT NULL,
    created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(transaction_type_id) REFERENCES transaction_types(id)
);
```

> Inserindo dados na tabela transaction_types
```sql
INSERT INTO transaction_types (name) VALUES 
('Aluguel'),
('Salário'),
('Prolabore'),
('Contas'),
('Alimentação'),
('Educação'),
('Investimentos'),
('Mercado'),
('Transporte'),
('Vestuário'),
('Outros');
```

> Inserindo dados na tabela transactions
```sql
INSERT INTO transactions (amount, type, transaction_type_id, created_at, updated_at )
VALUES (100.00,'expense', 1, NOW(), NOW());
```
