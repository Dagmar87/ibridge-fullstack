# ibridge-fullstack
Desafio Técnico do iBridge que consiste em um projeto fullstack que importa dados de um JSON, armazena em um banco relacional e apresenta um painel web com resumo e rankings.

## Requisitos
- PHP e Composer instalados
- Node.js e npm instalados
- Banco de dados (MySQL/PostgreSQL) configurado

## Backend (Laravel)
1. Acesse a pasta do backend:
   - `cd backend`
2. Copie o arquivo de ambiente:
   - `cp .env.example .env` (no Windows: copie manualmente ou use `copy`)
3. Configure o `.env` com as credenciais do seu banco (DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD).
4. Instale as dependências PHP:
   - `composer install`
5. Gere a chave da aplicação:
   - `php artisan key:generate`
6. Rode as migrações:
   - `php artisan migrate`
7. Importe os dados do JSON:
   - `php artisan import:json`
8. Suba o servidor:
   - `php artisan serve`
   - Backend ficará disponível em `http://127.0.0.1:8000`
9. (Opcional) Se precisar dos assets do Laravel:
   - `npm install`
   - `npm run dev`

## Frontend (Vite + React)
1. Acesse a pasta do frontend:
   - `cd dashboard-frontend`
2. Instale as dependências:
   - `npm install`
3. Inicie o servidor de desenvolvimento:
   - `npm run dev`
   - Frontend ficará disponível em `http://localhost:5173`

### Integração Frontend/Backend
- O frontend consome a API em `http://127.0.0.1:8000/api`, conforme definido em [api.js](file:///c:/Users/jdfss/Documents/testes/ibridge-fullstack/dashboard-frontend/src/services/api.js#L3-L5).
- Se você mudar a porta/host do backend, ajuste o `baseURL` no arquivo citado.

## Endpoints disponíveis
- `GET /api/resumo`
- `GET /api/top-operadores`
- `GET /api/top-listas`
- `GET /api/top-campanhas`

## Estrutura
- Backend (Laravel): [backend](file:///c:/Users/jdfss/Documents/testes/ibridge-fullstack/backend)
- Frontend (Vite + React): [dashboard-frontend](file:///c:/Users/jdfss/Documents/testes/ibridge-fullstack/dashboard-frontend)
