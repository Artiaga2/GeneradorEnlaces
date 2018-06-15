## Guia de instalacion

1- Para empezar necesitamos tener PHP, composer, node.js y virtualBox instalados en el equipo.

- [PHP](http://php.net/manual/es/install.php)
- [Composer](https://getcomposer.org/download/) 
- [Node.js](https://nodejs.org/es/)
- [VitualBox](https://www.virtualbox.org/wiki/Downloads)

2- Lo primero que tenemos que hacer es descargar el proyecto en la carpeta que queramos usarlo:
`git clone https://github.com/Artiaga2/GeneradorEnlaces`

3- Una vez descargado, usaremos los comandos composer install y npm run dev para instalar todos los paquetes necesarios.

4- Seguidamente seguiremos el tutorial de Laravel Homestead para instalarnos nuestro proyecto en Homestead
https://laravel.com/docs/5.6/homestead

5- Una vez hecho esto tenemos que crear la base de datos con el nombre,la ip, el usuario y el password que le hemos dado en el archivo `.env`.
- `DB_DATABASE` = Nombre Aplicacion
- `DB_HOST` = Ip
- `DB_USERNAME` = Usuario
- `DB_PASSWORD` = Password

6- Por ultimo ejecutamos el comando `php artisan migrate:refresh --seed` para proveer a la base de datos, de datos
ficticios.


##Funcionalidades

**Como usuario logeado**:

- Crear enlaces.
- Editar y borrar tus enlaces.

**Como usuario no logeado**:

- Registrarse.
- Logearse.


## Genereador de Enlaces

La aplicacion Generador de enlaces es una aplicacion para la crear nuestros propios enlaces, guardarlos y compartirlos.

Esta es mi primera aplicacion en laravel.
