# Estoque de Mercado
Repositorio para realização das atividades do componente 'Desenvolvimento Web III', 2024.
## Requisitos de Sistema
- PHP Versão: 8.2
- Laravel Versão: 11.9
- Docker Versão: 27.3.1

## Como Testar
1. Primeira configuração
``` bash
cp .env.example .env
composer install
php artisan sail:install
./vendor/bin/sail artisan key:generate
./vendor/bin/sail up -d
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
./vendor/bin/sail artisan migrate:fresh --seed
```
2. Levantando o serviço
```bash
./vendor/bin/sail up -d
./vendor/bin/sail npm run dev
```
3. Credenciais para teste:
- usuário: test@example.com
- senha: password
