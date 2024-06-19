# CRUD Application

This project is a basic CRUD (Create, Read, Update, Delete) application built using PHP, following MVC (Model-View-Controller) architecture. The application allows users to manage products with functionalities to add, view, edit, and delete products.

## Features

- **Add Product**: Add new products with name, description, price, and quantity.
- **View Products**: View a list of all products.
- **Edit Product**: Update product details.
- **Delete Product**: Delete a product after confirmation.

## Requirements

- PHP 7.x or higher
- MySQL
- XAMPP or any similar local server environment

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/SeifAhmed11/crud-application.git
    cd crud-application
    ```

2. **Setup the database:**

    - Create a database named `crud_db`.
    - Import the `crud_db.sql` file located in the `database` directory to create the necessary tables.

3. **Configure database connection:**

    - Update the database configuration in `app/Core/DB.php` with your MySQL credentials:

    ```php
    class DB {
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '';
        private $dbname = 'crud_db';
        //...
    }
    ```

4. **Start the server:**

    - If you are using XAMPP, place the project folder in `htdocs`.
    - Start Apache and MySQL from XAMPP Control Panel.
    - Navigate to `http://localhost/crud-application/public` in your browser.

## Project Structure

- `app/`
  - `Controllers/`: Contains the controller files.
    - `ProductController.php`
  - `Core/`: Contains the core files for the framework.
    - `App.php`
    - `DB.php`
  - `Models/`: Contains the model files.
    - `Product.php`
  - `Views/`: Contains the view files.
    - `inc/`: Contains header and footer files.
    - `product/`: Contains the product-specific view files.
      - `add.php`
      - `edit.php`
      - `index.php`
      - `delete.php`
- `public/`: Contains publicly accessible files.
  - `index.php`: The entry point for the application.
  - `.htaccess`: For URL rewriting.
- `database/`
  - `crud_db.sql`: SQL file to set up the database schema.

## Usage

### Adding a Product

1. Navigate to `http://localhost/crud-application/public/Product/add`.
2. Fill in the product details and submit.

### Viewing Products

1. Navigate to `http://localhost/crud-application/public/Product/index`.

### Editing a Product

1. Click on the "Edit" button next to a product on the product listing page.
2. Update the product details and submit.

### Deleting a Product

1. Click on the "Delete" button next to a product on the product listing page.
2. Confirm the deletion.

## Contributing

Feel free to fork this repository and contribute by submitting a pull request. Please 
