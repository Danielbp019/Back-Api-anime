<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalación

Teniendo composer instalado y php en el equipo:

1. Se importan los paquetes.

```sh
composer install
```
2. Realiza una copia de .env example, recombra la copia para que se llame ".env" y configura tus variables.

3. Generar una nueva clave de aplicacion:

```sh
php artisan key:generate
```

4. Activar las migraciones (Asegurate de tener una db disponible), por defecto se usa sqlite:

```sh
php artisan migrate
```

5. Levantar el servidor:

```sh
php artisan serve
```

Notas:
Clear the providers cache:
```sh
composer dump-autoload
```

Clear All, run: 
```sh
php artisan optimize:clear
```