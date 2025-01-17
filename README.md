# Laravel REST API with Sanctum Authentication

This project is a RESTful API built with Laravel and Sanctum for authentication. It includes user authentication, CRUD operations for posts, and proper error handling.

---

## Features

1. **Authentication**
   - User registration and login using Laravel Sanctum.
   - Issue and revoke tokens for authenticated routes.

2. **Posts Management**
   - Authenticated users can:
     - Create posts.
     - View all posts.
     - View a single post.
     - Update their own posts.
     - Delete their own posts.
   - Post fields:
     - `id`: Auto-increment.
     - `title`: String, required.
     - `content`: Text, required.
     - `created_at`: Timestamp.
     - `updated_at`: Timestamp.

3. **Permissions**
   - Only the creator of a post can update or delete it.

4. **Error Handling**
   - Meaningful error messages for:
     - Validation errors.
     - Unauthorized access.
     - Missing or invalid tokens.
     - Permissions violations.

5. **Rate Limiting** (Optional Bonus)
   - API rate limits can be configured in `app/Providers/RouteServiceProvider.php`.

---

## Installation

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL or SQLite
- Postman (for testing)

### Steps
1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd rest-api-task
2. Install dependencies:
    ```bash
    composer install
3. Set up the .env file:
    ```bash
    cp .env.example .env
4. Run migrations:
    ```bash
    php artisan migrate
5. Install Laravel Sanctum:
    ```bash
    php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
    php artisan migrate
6. Generate the application key:
    ```bash
    php artisan key:generate
7. Start the server:
    ```bash
    php artisan serve

## API Documentation

### Authentication Endpoints
| Method | Endpoint     | Description         | Authorization |
|--------|--------------|---------------------|---------------|
| POST   | `/register`  | User registration   | No            |
| POST   | `/login`     | User login          | No            |
| POST   | `/logout`    | User logout         | Yes           |

### Post Endpoints
| Method | Endpoint      | Description             | Authorization |
|--------|---------------|-------------------------|---------------|
| GET    | `/posts`      | List all posts          | Yes           |
| POST   | `/posts`      | Create a new post       | Yes           |
| GET    | `/posts/{id}` | Retrieve a single post  | Yes           |
| PUT    | `/posts/{id}` | Update a specific post  | Yes           |
| DELETE | `/posts/{id}` | Delete a specific post  | Yes           |

### Headers for Authenticated Routes
| Header         | Value                 |
|----------------|-----------------------|
| Authorization  | Bearer `<your-token>` |

---

## Postman Collection

The Postman collection is available [https://app.getpostman.com/join-team?invite_code=8cfd2fce29f28267ffb161e9dd7e1268d3171d54dc51bc560eb4f3db5871a2cd&target_code=9ba02a446cfd7523083b67f79de8555f](#). You can import it into Postman to test the API.

---

## Demo Video

A demo video showcasing the API functionality can be found [https://www.youtube.com/watch?v=GmWBmkaF7zk](#).



