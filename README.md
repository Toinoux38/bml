<p align="center"><a href="" target="_blank"><img src="logobml.svg" width="400" alt="BML Logo"></a></p>



# Bibliothèque Municipale de Lyon

This web application serves as an interface for librarians and users to manage and interact with the library's collection of books. It is built using Laravel with Breeze for authentication, providing various features for browsing, selling, renting, and more.

## Features

- **Authentication:** Utilizes Laravel Breeze for authentication with full authentication methods.
- **Book Management:** Browse, sell, rent, and manage the library's collection.
- **Mailing System:** Integrated mailing functionality for notifications and communication.

## Installation

### Prerequisites

- PHP 8.2
- Composer
- Node.js
- npm or Yarn

### Steps

1. Clone the repository:
   ```bash
   git clone https://github.com/Toinoux38/bml.git
   cd bml
   ```
   
2. Install dependencies:
   ```bash
    composer install
    npm install
    ```
   
3. Create a `.env` file:
   ```bash
   cp .env.example .env
   ```
   then fill in the database credentials.

4. Start the server:
   ```bash
   php artisan serve
   ```
   
5. Visit `localhost:8000` in your browser.

## License and Credits

This project is licensed under the [MIT License](LICENSE)

Made with ❤️ by [Toinoux38](https://github.com/Toinoux38)
