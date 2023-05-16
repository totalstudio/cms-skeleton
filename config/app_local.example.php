<?php
/*
 * Local configuration file to provide any overrides to your app.php configuration.
 * Copy and save this file as app_local.php and make changes as required.
 * Note: It is not recommended to commit files with credentials such as app_local.php
 * into source code version control.
 */

use Cake\Database\Connection;
use Cake\Database\Driver\Mysql;

return [
    /*
     * Debug Level:
     *
     * Production Mode:
     * false: No error messages, errors, or warnings shown.
     *
     * Development Mode:
     * true: Errors and warnings shown.
     */
    'debug' => filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN),

    /*
     * Security and encryption configuration
     *
     * - salt - A random string used in security hashing methods.
     *   The salt value is also used as the encryption key.
     *   You should treat it as extremely sensitive data.
     */
    'Security' => [
        'salt' => env('SECURITY_SALT', 'eb80b8cf15a9c531c694bb6338f9824bcdb9c663bc78ff18da4db7c1a1af7b39'),
    ],

    /*
     * Connection information used by the ORM to connect
     * to your application's datastores.
     *
     * See app.php for more configuration options.
     */
    'Datasources' => [
        'default' => [
            'className' => Connection::class,
            'driver' => Mysql::class,
            'persistent' => false,
            'host' => env('DATABASE_HOST', '127.0.0.1'),
            'port' => env('DATABASE_PORT', 3306),
            'username' => env('DATABASE_USERNAME', 'root'),
            'password' => env('DATABASE_PASSWORD', ''),
            'database' => env('DATABASE_DATABASE', false),
            'encoding' => env('DATABASE_ENCODING', 'utf8mb4'),
            'timezone' => 'UTC',
            'flags' => [],
            'cacheMetadata' => true,
            'log' => env('DATABASE_LOG_ENABLED', false),

            /**
             * Set identifier quoting to true if you are using reserved words or
             * special characters in your table or column names. Enabling this
             * setting will result in queries built using the Query Builder having
             * identifiers quoted when creating SQL. It should be noted that this
             * decreases performance because each query needs to be traversed and
             * manipulated before being executed.
             */
            'quoteIdentifiers' => true,

            /**
             * During development, if using MySQL < 5.6, uncommenting the
             * following line could boost the speed at which schema metadata is
             * fetched from the database. It can also be set directly with the
             * mysql configuration directive 'innodb_stats_on_metadata = 0'
             * which is the recommended value in production environments
             */
            //'init' => ['SET GLOBAL innodb_stats_on_metadata = 0'],

            'url' => env('DATABASE_URL', null),
        ],
        'old' => [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Mysql',
            'persistent' => FALSE,
            'host' => env('DATABASE_HOST_OLD', '127.0.0.1'),
            'port' => env('DATABASE_PORT_OLD', 3306),
            'username' => env('DATABASE_USERNAME_OLD', 'root'),
            'password' => env('DATABASE_PASSWORD_OLD', ''),
            'database' => env('DATABASE_DATABASE_OLD', 'old'),
            'encoding' => 'utf8',
            'timezone' => 'UTC',
            'flags' => [],
            'cacheMetadata' => TRUE,
            'log' => TRUE,
            'quoteIdentifiers' => FALSE,
            'url' => env('DATABASE_URL', NULL),
        ],
    ],

    /*
     * Email configuration.
     *
     * Host and credential configuration in case you are using SmtpTransport
     *
     * See app.php for more configuration options.
     */
    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
];
