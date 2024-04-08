
# Api Laravel 

Se crean apis para las siguientes entidades
User:
    GET
    https://laravel-talen-production.up.railway.app/api/users
    https://laravel-talen-production.up.railway.app/api/users/:id

    POST
    https://laravel-talen-production.up.railway.app/api/users
    Ejemplo request
    {
        "name": "Michael",
        "email": "mike@example.com",
        "image_path": "ava"
    }

    PUT
    https://laravel-talen-production.up.railway.app/api/users/:id
    Ejemplo request
    {
        "name": "Alejandra",
        "email": "alejandra.ruiz@vital.co",
        "image_path": "PPPPPPPPP"
    }

    DELETE
    https://laravel-talen-production.up.railway.app/api/users/:id

Company,Challenge, Program y ProgramParticipant también tienen las apis con su CRUD

URL base
https://laravel-talen-production.up.railway.app/api/

para consumir cada entidad solo se debe agregar a la url base cualquiera de las siguintes rutas finales de cada entidad
- User = users
- Company = companies
- Program = programs
- ProgramParticipant = program-participants
- Challenge = challenges
## Instalación

Decargar el proyecto y correr los siguientes comandos

```bash
  git clonehttps://github.com/alejandrovalencias/laravel-talen.git
  cd laravel-talen
 composer install
 php artisan serve
```
    
## Api en Laravel 11 

 - [Se usa railway.app para desplegar la api](https://railway.app/)
  - [Url para consumir la api](https://laravel-talen-production.up.railway.app/api/)




## Nota

- Las apis de consulta de la entidad ProgramParticipants no funcionan
- También se agrega archivo de insomnia para que sea importado y cargue todos los metodos de las entiades

* Insomnia es un programa para consumir Apis Rest

  - [Insomnia metodos de las apis](https://drive.google.com/file/d/1m2FKaaA2wZ9J2DLZ6nTn3t-R64uXn-eg/view)
