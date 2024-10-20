# LexiQuest

## Project Setup Instructions

This document will guide you through setting up and running LexiQuest, including database setup, server requirements, and development tools.

---

### Prerequisites

Before starting, ensure you have the following installed on your machine:

- **[PHP 8.x](https://www.php.net/downloads.php)**
- **[Composer](https://getcomposer.org/download/)**
- **[XAMPP](https://www.apachefriends.org/index.html)** (for MySQL and phpMyAdmin)
- **[Node.js](https://nodejs.org/en/download/)** (for npm)
- **[Git](https://git-scm.com/downloads)** (optional, for version control)

### Installation Steps

1. **Clone the repository**  
   Clone the repository to your local machine using Git or download the zip file.

   ```bash
   git clone <your-repo-url>
   cd <project-directory>
   ```

2. **Install PHP Dependencies**  
   Install all PHP dependencies using Composer.

   ```bash
   composer install
   ```

3. **Install Node Modules**  
   Install the required node packages.

   ```bash
   npm install
   npm audit fix
   ```

4. **Environment Configuration**  
   Copy the `.env.example` file to `.env` and configure the environment variables.

   ```bash
   cp .env.example .env
   ```

   Edit the `.env` file and update the following fields to match your MySQL database setup:

   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=<your-database-name>
   DB_USERNAME=<your-mysql-username>
   DB_PASSWORD=<your-mysql-password>
   ```

5. **Set Up MySQL Database**  
   - Open **XAMPP** and start **Apache** and **MySQL** servers.
   - Access **phpMyAdmin** via [localhost/phpmyadmin](http://localhost/phpmyadmin).
   - Create a new MySQL database with the name specified in your `.env` file.

6. **Run Migrations & Seeders**  
   To set up the database schema and seed the necessary data, run the following Artisan commands:

   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. **Build Frontend Assets**  
   To compile the front-end assets (CSS, JS, etc.), run:

   ```bash
   npm run dev
   ```

8. **Start the Development Server**  
   Finally, you can start the development server by running:

   ```bash
   php artisan serve
   ```

   The application will be accessible at `http://127.0.0.1:8000`.

---

### Optional Commands

- **To run the database migrations with seeders again (resetting the database):**

  ```bash
  php artisan migrate:fresh --seed
  ```

- **To watch for file changes and recompile assets:**

  ```bash
  npm run watch
  ```

---

### Troubleshooting

- **XAMPP MySQL not starting:**  
  Ensure no other service is using the default MySQL port (3306). If needed, change the MySQL port in the XAMPP settings and update the `.env` file accordingly.
  
- **Permission issues:**  
  Ensure the proper file permissions are set for the project folder, especially for directories like `storage` and `bootstrap/cache`.

---

### Credits

- **Laravel** - [Official Documentation](https://laravel.com/docs)
- **XAMPP** - [Official Documentation](https://www.apachefriends.org/index.html)
- **Composer** - [Official Documentation](https://getcomposer.org/doc/)

---

### License

This project is open-source and freely available under the [MIT License](LICENSE.md).
