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
