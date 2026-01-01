# Fastie Feasties REST API

REST API to list products and manage orders of a fast-food restaurant.

> [!NOTE]
> This API is used in a Fronted React application: <br/>
🔗 **[Related repository](https://www.github.com/YahirAdrian/fastie-feasties-react)**<br/>
🚀 **[Live application](https://fastie-feasties-react.vercel.app/)**<br/>
▶️ **[Test API](https://fastie-feasties-api-production.up.railway.app/api/products)**

This orders & products API is developed using Laravel v12.35.1. REST API features of the framework are used along with the corresponding Models and Controllers for each entity of the application.

## ⚙️ Features
- Products CRUD
- Orders creation and management
- User authentication with Laravel Sanctum
- Protected admin routes
- Role-based access (public / authenticated user / admin)
- Integration with a Frontend application

## 🔐 Authentication

### Register

To create a new account, sed the the register POST credentials to `api/register?name={name}&email={email}&password={password}&password_confirmation={password_confirmation}`

You will receive a token, which has to be included as the Bearer Authorization token in each authenticated request.

### Login
To authenticate, send the login POST credentials to `api/login?email={email}&password={password}`.

You will receive a token, which has to be included as the Bearer Authorization token in each authenticated request.

### Admin user
For the moment, the admin user creation is not available. To convert a regular user into and admin, update the `is_admin` field colum to `1` in the database.

## 📄 API routes

### Product routes: 


| Method    | Endpoint                      | Role      | Description                   |
| ------    | ----------------------------- | --------- | -------------------------     |
| GET       | api/products                  | Public    | Get all products              |
| GET       | api/products/{id}             | Public    | Get a specific product        |
| GET       | api/products/category/{name}  | Public    | Get all products of a category|
| POST      | api/products/new*             | Admin     | Create a product              |
| PUT       | api/products/update/{id}*     | Admin     | Update a product              |
| DELETE    | api/products/delete/{id}      | Admin     | Delete a product              |

_Order params: category, name description, price, image_

_*Images have to be manually sored in `public/product-images` and the value is its filename_

### Order routes:

| Method    | Endpoint                     | Role      | Description           |
| ------    | -------------------------    | --------- | --------------------- |
| GET       | api/orders                   | Admin     | Get all orders        |
| GET       | api/orders/{id}              | User      | Get a specific order  |
| GET       | api/orders/user/{user_id}    | User      | Get user ordes        |
| POST      | api/orders/new*              | User      | Create an order       |
| PUT       | api/orders/update/{id}*      | Admin     | Update an order       |
| DELETE    | api/orders/delete/{id}       | Admin     | Delete an order       |


**Order data structure sample:**


```json
    {
    "user": {
        "id": 5
    },
    "products": [
        {

            "id": 48,
            "quantity": 1
        },
        {
            "id": 44,
            "quantity": 1
        }
    ],
    "comments": "",
    "status": "Pending"
}
```
*The Bearer token should be also present in the request headers

## 📦 Installation
```bash
    git clone https://github.com/YahirAdrian/fastie-feasties-api
    php artisan migrate
    php artisan serve
```
***Before installing, configure the .env database variables for the local environment**
```json
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=fastie_feasties
    DB_USERNAME=root
    DB_PASSWORD=
```






