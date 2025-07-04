# scholae
App gestion ecole

## Configuration

The database connection settings are read from environment variables. Set the
following variables when deploying the application:

| Variable    | Description                | Default (local development) |
|-------------|----------------------------|-----------------------------|
| `DB_HOST`   | Database host              | `localhost`                 |
| `DB_USER`   | Database user              | `root`                      |
| `DB_PASSWORD` | Database password        | *(empty)*                   |
| `DB_NAME`   | Database name              | `gestecole`                 |

If a variable is not provided, the default value shown above is used. This
allows the application to run locally without additional configuration.

## Dependencies

Third-party libraries such as Bootstrap and jQuery should be installed via
Composer or npm. These dependencies must be placed in the `vendor/` directory,
which is excluded from version control by the `.gitignore` file. Only
project-specific assets are committed to the repository.
