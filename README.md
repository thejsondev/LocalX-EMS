# Employee Management API

## Requirements

- PHP 8.0+
- MySQL
- Composer

## Setup

1. Clone the repository:
    ```bash
    git clone https://github.com/thejsondev/LocalX-EMS
    cd employee-management
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Configure the database in `.env` file:
    ```ini
    DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=8.0"
    ```
4. Create database:
    ```bash
    php bin/console doctrine:database:create
    ```
5. Run migrations:
    ```bash
    php bin/console doctrine:migrations:migrate
    ```

6. Start the Symfony server:
    ```bash
    symfony server:start
    ```

## API Endpoints

- `POST /api/employee`: Upload a CSV file to batch import employees.
- `GET /api/employee`: List all employees.
- `GET /api/employee/{id}`: Get a specific employee by ID.
- `DELETE /api/employee/{id}`: Delete a specific employee by ID.

## Additional Thoughts

If this were a real-world task, I would consider implementing the following:
- **Authentication and Authorization**: Secure the endpoints to ensure only authorized users can access them.
- **Data Validation**: Implement validation to ensure the data from the CSV is correct before saving it to the database.
- **Pagination**: Implement pagination for the `GET /api/employee` endpoint to handle large datasets.
- **Asynchronous Processing**: For large CSV files, consider processing the file asynchronously using a queue system.
- **Unit Tests**: Write unit and integration tests to ensure the functionality is working as expected.
- **Better property types**: Check compatibility with DateTime on values in imported CSV to insert date and times in DateTime type instead of string. 
