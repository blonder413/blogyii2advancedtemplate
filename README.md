Yii 2 Basic Project Template
============================

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources

CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTE:** Yii won't create the database for you, this has to be done manually before you can access it.

Also check and edit the other files in the `config/` directory to customize your application.


Nombre de la aplicación
-----------------------

El nombre de la aplicación se configura en el archivo `frontend/config/main.php` estableciendo valor a la clave `name`


Editar Rutas
------------

Las rutas de las redes sociales se configuran en el archivo `frontend/config/main.php` en la clave `aliases`

Editar Layout
-------------

El layout del frontend se establece en el archivo `frontend/config/main.php` modificando el valor de la clave `layout`