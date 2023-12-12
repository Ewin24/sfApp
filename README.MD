Al iniciar el proyecto, dirigirse a /.env y configurare el string de conexion a la base de datos

```

# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"

#DATABASE_URL="mysql://root:utilizar@127.0.0.1:3306/colegioSF?serverVersion=8.0.32&charset=utf8mb4"

# DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=10.11.2-MariaDB&charset=utf8mb4"

# DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=15&charset=utf8"

```

Con la configuracion del string ya podremos acceder a la base de datos, pero primero debemos crearla con el comando:
```
php bin/console doctrine:database:create

```
Luego de ello, el siguiente comando aplica la migracion a nuestra base de datos 

```
php bin/console doctrine:migration:migrate

```

En caso de que necesitar datos de prueba, ejecutar el comando: 

```

php bin/console doctrine:fixtures:load

```