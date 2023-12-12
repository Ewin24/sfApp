# Solucion 1 - Modelo entidad-relación
![diagrama entidad-relacion](colegiosf.png)

# Soluciones 2,3,4
### 2. Haga un query para obtener la calificación de todos los estudiantes que presentaron una evaluación
- El codigo relacionado a esta funcionalidad se encuentra en: 
  
    ```
    'app/src/Controller/EvaluacionController.php'
    y 
    'app/src/Repository/EvaluacionRepository.php'
    ```

- el endpoint en que se pueden ver los resultados es 
  
  ```
  '/calificaciones'
  ```

- NOTA: no tuve exito al implementar un DISCTINCT para no repetir resultados y tampoco pude implementar la paginacion para optimizar la carga


### 3. Realice un formulario de contacto en symfony que tenga: nombre, apellido, correo, celular, área de contacto (es una entidad) y mensaje. Debe guardar los datos en la base de datos

- El codigo relacionado a esta funcionalidad se encuentra en: 
  
    ```
    'app/src/Services/ContactService.php'
    
    'app/src/Repository/ContactoRepository.php'

    'app/src/Controller/ContactoController.php'
    ```

- los endpoint en que se pueden ver los resultados son:
  
  ```
  '/contacto'
  '/contacto/save'
  ```

### 4. Valide que un usuario (correo) no pueda enviar más de 1 mensaje al día

- El codigo relacionado a esta funcionalidad se encuentra en: 
  
    ```
    'app/src/Services/MensajeService.php'
    
    'app/src/Repository/MensajeRepository.php'

    'app/src/Controller/ValidarCorreoController.php'
    ```

- los endpoint en que se pueden ver los resultados son:
  
  ```
  '/mensaje'
  '/mensaje/save'
  ```
  

# Informacion para poder iniciar con exito el proyecto

### Requisitos

- php version 8.2 o superior
- composer para la gestión de paquetes
- Consola para ejecución de comandos CLI symfony
- motor de base de datos MySQL (usado), PostgreSQL, SQLite ...etc 
  
### Indicaciones de inicio

Al iniciar el proyecto, dirigirse a /.env y configure el string de conexion a la base de datos

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

En caso de tener algun inconveniente con la migracion actual, podemos generar otra, haciendo uso del comando:

```

php bin/console make:migration

```


Luego de ello, el siguiente comando aplica la migracion a nuestra base de datos 

```

php bin/console doctrine:migration:migrate

```

En caso de que necesitar datos de prueba, ejecutar el comando: 

```

php bin/console doctrine:fixtures:load

```

finalmente, para poder iniciar el servidor del proyecto, ejecutar el comando:

```

symfony server:start

```