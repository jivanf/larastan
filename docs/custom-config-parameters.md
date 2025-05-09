# Custom config parameters

All custom config parameters that are defined by Larastan are listed here.

## `noUnnecessaryCollectionCall`, `noUnnecessaryCollectionCallOnly`, `noUnnecessaryCollectionCallExcept`

These parameters are related to the `NoUnnecessaryCollectionCall` rule. You can find the details about these parameters and the rule [here](rules.md#NoUnnecessaryCollectionCall).

## `databaseMigrationsPath`

By default, the default Laravel database migration path (`database/migrations`) is used to scan migration files to understand the table structure and model properties. If you have database migrations in other place than the default, you can use this config parameter to tell Larastan where the database migrations are stored.

You can give absolute paths, or paths relative to the PHPStan config file.
Paths with wildcards are also supported (passed to `glob` function).

### Example

```neon
parameters:
    databaseMigrationsPath:
        - app/Domain/*/migrations
```

**Note:** If your migrations are using `if` statements to conditionally alter database structure (ex: create table only if it's not there, add column only if table exists and column does not etc...) Larastan will assume those if statements evaluate to true and will consider everything from the `if` body.

## `disableMigrationScan`

**default**: `false`

You can disable use this config to disable migration scanning.

### Example

```neon
parameters:
    disableMigrationScan: true
```

## `squashedMigrationsPath`

By default, Larastan will check `database/schema` directory to find schema dumps. If you have them in other locations or if you have multiple folders, you can use this config option to add them.

Paths with wildcards are also supported (passed to `glob` function).

### Example

```neon
parameters:
    squashedMigrationsPath:
        - app/Domain/*/schema
```

### PostgreSQL

The package used to parse the schema dumps, [phpmyadmin/sql-parser](https://github.com/phpmyadmin/sql-parser), is primarily focused on the MySQL dialect.
It can read (or rather, try to read) PostgreSQL dumps provided they are in the *plain text (and not the 'custom') format*, but the mileage may vary as problems have been noted with timestamp columns and lengthy parse time on more complicated dumps.

The viable options for PostgreSQL at the moment are:

1. Use the [laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper) package to write PHPDocs directly to the Models.
2. Use the [laravel-migrations-generator](https://github.com/kitloong/laravel-migrations-generator) to generate migration files (or a singular squashed migration file) for Larastan to scan with the `databaseMigrationsPath` setting.

## `disableSchemaScan`

**default**: `false`

You can disable use this config to disable schema scanning.

### Example

```neon
parameters:
    disableSchemaScan: true
```

## `checkModelProperties`

**default**: `false`

This config parameter enables the checks for model properties that are passed to methods. You can read the details [here](rules.md#modelpropertyrule).

To enable you can set it to `true`:

```neon
parameters:
    checkModelProperties: true
```

## `checkModelAppends`

**default**: `true`

This config parameter enables the checks the model's $appends property for computed properties. You can read the details [here](rules.md#modelappendsrule).

To disable you can set it to `false`:

```neon
parameters:
    checkModelAppends: false
```
