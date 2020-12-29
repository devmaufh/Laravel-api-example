# Simple API REST
Desarrollado con Laravel 7.

## Instalación  
Instalar las dependencias necesarias con composer
```
composer install 
```

Copiar el contenido del archivo **env.example** en un nuevo archivo llamado **.env** y configurar las credenciales de la base de datos.

## Test
Ejecutar el siguiente comando para correr las pruebas unitarias.
```
vendor/bin/phpunit
``` 

 Run server:
 ```
 php artisan serve
 ```


## Ejemplos

URL base: http://127.0.0.1:8000/api/category

#### Obtener categorias
* Request type: GET

* Descripción: Obtiene todos los recursos paginados por 10 en su defecto, si se desea paginar por otro número se debe adjuntar en la url el parámetro `perpage=${numeroPaginacion}`.

* URL:
    ```
    http://127.0.0.1:8000/api/category?perpage=2
    ```



#### Crear categoría
* Request type: POST

* Descripción: Crea una categoría.

* Body: 
    ```json
        {
            "name" : "categoria 1",
            "description":"Descripción categoria 1"
        }
        /**
        El parámetro description es opcional
        **/
    ```
* URL:
    ```
    http://127.0.0.1:8000/api/category
    ```


#### Editar una categoría
* Request type: PUT | PATCH

* Descripción: Edita la categoría con el ID enviado en la url.

* Body: 
    ```json
        {
            "name" : "categoria 1",
            "description":"Descripción categoria 1"
        }
        /**
        El parámetro description es opcional
        **/
    ```
* URL:
    ```
    http://127.0.0.1:8000/api/category/${id}
    ```


#### Obtener información de categoría
* Request type: GET

* Descripción: Obtiene la información de la categoría con el ID enviado en la url.

* URL:
    ```
    http://127.0.0.1:8000/api/category/${id}
    ```


#### Eliminar categoría
* Request type: DELETE

* Descripción: Elimina la  la categoría con el ID enviado en la url.

* URL:
    ```
    http://127.0.0.1:8000/api/category/${id}
    ```

