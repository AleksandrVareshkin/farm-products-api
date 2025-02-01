# farm-products-api

# 1. Clone the repository
git clone https://github.com/AleksandrVareshkin/farm-products-api.git  
# Clone the project from GitHub to your local machine.

# 2. Navigate into the project directory
cd project-name  
# Move into the folder where the project is located.

# 3. Install PHP dependencies
composer install  
# Install all PHP dependencies required for the project.

# 4. Set up the .env file
# Copy the .env.example file to .env and update the database connection settings:

# DB_CONNECTION=pgsql
# DB_HOST=your_database_host
# DB_PORT=your_database_port
# DB_DATABASE=your_database_name
# DB_USERNAME=your_database_username
# DB_PASSWORD=your_database_password

# Configure your database connection in the .env file to match your local setup.

# 5. Generate the application key
php artisan key:generate  
# Create a unique application key for security purposes.

# 6. Run database migrations
php artisan migrate  
# Create all the required tables in the database.

# 7. Start the development server
php artisan serve  
# Start the built-in PHP server and access the application at http://127.0.0.1:8000

Postman Requests for Testing

Get All Products with Pagination
GET http://127.0.0.1:8000/api/products?page=1

Search Products by Name
GET http://127.0.0.1:8000/api/products?name=apple

Filter Products by Price Range
GET http://127.0.0.1:8000/api/products?min_price=10&max_price=50

Filter Products by Stock Availability
GET http://127.0.0.1:8000/api/products?in_stock=true

Create a New Product
POST http://127.0.0.1:8000/api/products
Headers: Content-Type: application/json
Body:
json
{
  "name": "New Product",
  "price": 25.99,
  "quantity": 10
}

Update an Existing Product
PUT http://127.0.0.1:8000/api/products/{id}
Headers: Content-Type: application/json
Body:
json
{
  "name": "Updated Product",
  "price": 30.99,
  "quantity": 5
}

Delete a Product
DELETE http://127.0.0.1:8000/api/products/{id}


