# Crud de gestión de productos con Laravel

## Instalación

```bash

# 1. Clonar el repositorio
git https://github.com/BrayanZipa/prueba_gestion_productos.git

# 2. Instalar dependencias PHP
composer install

# 3. Instalar dependencias JS
npm install

# 4. Configurar el entorno
cp .env.example .env
php artisan key:generate
Crear base de datos y configurar credenciales

# 5. Ejecutar migraciones y seeders
php artisan migrate --seed
o alternativamente ejecutar el script productos.sql ubicado en la carpeta database (ya contiene la creación de la base de datos)

# 6. Iniciar el servidor frontend
npm run dev

# 7. Iniciar el servidor backend
php artisan serve

```

## Usuario de prueba

```bash

Puedes ingresar con el siguiente usuario:

Correo: test@example.com
Contraseña: test123*

O alternativamente puedes crear una nueva cuenta desde el formulario de registro

```
