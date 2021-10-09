# laravel-admin-shreyu
Panel de administración basico usando el template Shreyu.

# Introducción

- Este es un panel de administración de laravel que nos permite administrar usuarios y crear roles de usuarios para limitar el acceso a diferentes vistas.
- El proyecto se desarrollo con laravel 6.

# Instalación
```
  # clonar el repositorio
  $ git clone https://github.com/alf1995/laravel-admin-shreyu.git
  
  # acceder al directorio de nuestro proyecto
  $ cd laravel-admin-shreyu
  
  # instalar dependencias
  $ composer install
```
# Configuración

- Crearemos nuestro archivo **.env** dentro de nuestro proyecto desde la terminal windows con el siguiente comando
```
  copy NUL .env
```
- Dentro de nuestro archivo **.env** copiaremos el siguiente código:
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```
- Luego generamos un **key** para nuestro proyecto:

```
php artisan key:generate
```
# Características

- Para acceder al panel de administración ingresaremos la url **/dashboard** :
```
Usuarios

  Admin:
   - Usuario: admin@gmail.com
   - Contraseña: admin2020
   
  Editor:
   - Usuario: editor@gmail.com
   - Contraseña: editor2020
    
```

- Módulo de usuario.

![Imagen de modulo usuario](https://i.imgur.com/KaVi86i.png)

- Perfil de usuario

![Imagen perfil de usuario](https://i.imgur.com/lLFBf6T.png)

- Módulo de roles

![Imagen de modulo roles](https://i.imgur.com/6UTKncr.png)

- Módulo de permisos

![Imagen de modulo permisos](https://i.imgur.com/OdQUtKN.png)
