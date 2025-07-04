# scholae
App gestion ecole

## Purpose

Kelasi is a lightweight web application intended for the management of a
school. It provides a simple interface for authentication and handling of
school data such as students and teachers.

## Prerequisites

* **PHP** 7.4 or higher with the PDO extension enabled
* **MySQL** or **MariaDB** server

Any web server capable of running PHP can be used (Apache, Nginx, or the built
in PHP development server).

## Basic Setup

1. Clone this repository on your machine.
2. Ensure your PHP installation includes the required extensions and that your
   database service is running.
3. Create a database named `gestecole` (or use a different name and update the
   configuration).
4. Configure the database credentials as described below.
5. Serve the application with your preferred web server. For a quick test you
   may run:

   ```bash
   php -S localhost:8000
   ```

   Then open `http://localhost:8000/index.php` in your browser.

## Configuration

The database connection settings are read from environment variables. Define the
variables below in your shell or web server configuration before running the
application:

| Variable    | Description                | Default (local development) |
|-------------|----------------------------|-----------------------------|
| `DB_HOST`   | Database host              | `localhost`                 |
| `DB_USER`   | Database user              | `root`                      |
| `DB_PASSWORD` | Database password        | *(empty)*                   |
| `DB_NAME`   | Database name              | `gestecole`                 |

If a variable is not provided, the default value shown above is used. This
allows the application to run locally without additional configuration.

Example of setting these variables on Linux/macOS:

```bash
export DB_HOST=localhost
export DB_USER=root
export DB_PASSWORD=secret
export DB_NAME=gestecole
```

## Dependencies

Third-party libraries such as Bootstrap and jQuery should be installed via
Composer or npm. These dependencies must be placed in the `vendor/` directory,
which is excluded from version control by the `.gitignore` file. Only
project-specific assets are committed to the repository.
