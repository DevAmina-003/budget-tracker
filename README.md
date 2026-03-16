# Budget Tracker
  A Laravel web application to help you track your personal finances: incomes, expenses, and    categories. Keep your budget organized and see your balance at a glance.

## Features
  - User authentication (register/login/logout)
  - Dashboard showing total income, total expenses, current balance, and recent expenses.
  - Add, edit, view, and delete incomes and expenses
  - Manage categories for your expenses
  - Responsive design with Bootstrap
  - Simple and clean UI for easy navigation

## Installation

1. **Clone the repository**
```bash
   git clone https://github.com/DevAmina-003/budget-tracker.git
   cd budget-tracker
```

2. **Install PHP dependencies**
   composer install

3. **Install JavaScript dependencies**
   npm install
   npm run dev

4. **Configure environment**
   cp .env.example .env
    php artisan key:generate
   
5. **Run migrations**
   php artisan migrate

6. **Run the application**
   php artisan serve

## Usage
  - Open the project in your browser at http://localhost:8000
  - Register a new account
  - Start adding your incomes, expenses, and categories
    
## Version
  v1.0-Initial release