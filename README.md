<div align="center">

<img src="public/assets/img/logo.png" alt="GECSA Ingenieros" width="180"/>

# GECSA INGENIEROS S.A.C.
### Sitio Web Corporativo

[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Vite](https://img.shields.io/badge/Vite-6.x-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vitejs.dev/)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)](https://tailwindcss.com/)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![License](https://img.shields.io/badge/Licencia-MIT-green?style=for-the-badge)](LICENSE)

*Plataforma web institucional para la presentación de servicios, obras ejecutadas, expedientes técnicos y certificaciones de GECSA INGENIEROS S.A.C.*

</div>

---

## Tabla de Contenidos

- [Acerca del Proyecto](#acerca-del-proyecto)
- [Tecnologías](#tecnologías)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Requisitos Previos](#requisitos-previos)
- [Instalación](#instalación)
- [Configuración del Entorno](#configuración-del-entorno)
- [Servidor de Desarrollo](#servidor-de-desarrollo)
- [Build para Producción](#build-para-producción)
- [Pruebas](#pruebas)
- [Despliegue](#despliegue)

---

## Acerca del Proyecto

**GECSA INGENIEROS S.A.C.** fue fundada el **19 de mayo de 2021** con el objetivo de participar en la ejecución y consultoría de obras civiles, ambientales y mineras a nivel nacional.

Este repositorio contiene el sitio web corporativo de la empresa. Es una aplicación **Laravel 12** de una sola página que presenta:

| Sección | Descripción |
|---|---|
| **Hero** | Carrusel de bienvenida con misión, visión y valores corporativos |
| **Obras Ejecutadas** | Galería de proyectos concluidos con datos contractuales |
| **Clientes** | Logos de entidades contratantes |
| **Expedientes Técnicos** | 16 proyectos con código SNIP y montos de inversión |
| **Perfiles Técnicos** | 9 proyectos en etapa de preinversión |
| **Certificaciones ISO** | ISO 9001, 14001, 45001, 50001 y 37001 |

---

## Tecnologías

### Backend
- **[Laravel 12](https://laravel.com/docs/12.x)** — Framework PHP principal
- **PHP 8.2+** — Lenguaje de servidor
- **SQLite** — Base de datos (configurada para entorno local)

### Frontend
- **[Vite 6](https://vitejs.dev/)** — Bundler y servidor de desarrollo
- **[Tailwind CSS 4](https://tailwindcss.com/)** — Framework de utilidades CSS
- **[Bootstrap 5](https://getbootstrap.com/)** — Componentes UI y grilla responsiva
- **[Bootstrap Icons](https://icons.getbootstrap.com/)** — Biblioteca de iconos
- **[AOS](https://michalsnik.github.io/aos/)** — Animaciones al hacer scroll
- **[Animate.css](https://animate.style/)** — Animaciones CSS
- **[GLightbox](https://biati-digital.github.io/glightbox/)** — Lightbox multimedia
- **[Swiper](https://swiperjs.com/)** — Carruseles táctiles

### Testing & Calidad
- **[Pest PHP 3](https://pestphp.com/)** — Framework de pruebas
- **[Laravel Pint](https://laravel.com/docs/pint)** — Formateador de código PHP

---

## Estructura del Proyecto

```
GECSA-SAC/
│
├── app/
│   ├── Http/
│   │   └── Controllers/        # Controladores (base)
│   ├── Models/
│   │   └── User.php
│   └── Providers/
│
├── database/
│   ├── migrations/             # Migraciones de BD
│   ├── factories/
│   └── seeders/
│
├── public/
│   └── assets/
│       ├── css/                # Estilos compilados
│       ├── js/                 # Scripts compilados
│       ├── img/                # Imágenes del sitio
│       │   ├── clients/        # Logos de clientes
│       │   ├── gallery/
│       │   └── portfolio/
│       └── vendor/             # Librerías frontend (Bootstrap, AOS, etc.)
│
├── resources/
│   ├── css/
│   │   └── app.css             # Estilos con Tailwind CSS
│   ├── js/
│   │   └── app.js              # Entry point JavaScript
│   └── views/
│       ├── layouts/
│       │   └── avilon.blade.php  # Layout principal
│       ├── partials/
│       │   ├── nav.blade.php     # Barra de navegación
│       │   └── footer.blade.php  # Pie de página
│       └── welcome.blade.php     # Vista principal (homepage)
│
├── routes/
│   └── web.php                 # Definición de rutas
│
├── tests/
│   ├── Feature/
│   └── Unit/
│
├── .env.example                # Variables de entorno de ejemplo
├── composer.json               # Dependencias PHP
├── package.json                # Dependencias Node.js
└── vite.config.js              # Configuración de Vite
```

---

## Requisitos Previos

Asegúrate de tener instaladas las siguientes herramientas antes de continuar:

| Herramienta | Versión mínima | Verificar |
|---|---|---|
| **PHP** | 8.2+ | `php -v` |
| **Composer** | 2.x | `composer -V` |
| **Node.js** | 18+ | `node -v` |
| **npm** | 9+ | `npm -v` |
| **Git** | cualquier | `git --version` |

> **Nota:** Para producción se recomienda un servidor web como **Nginx** o **Apache** con soporte para PHP-FPM.

---

## Instalación

Sigue estos pasos para poner en marcha el proyecto en tu entorno local:

### 1. Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/GECSA-SAC.git
cd GECSA-SAC
```

### 2. Instalar dependencias PHP

```bash
composer install
```

### 3. Instalar dependencias Node.js

```bash
npm install
```

### 4. Configurar variables de entorno

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Ejecutar migraciones

```bash
php artisan migrate
```

### 6. Crear enlace de almacenamiento

```bash
php artisan storage:link
```

### 7. Compilar assets frontend

```bash
npm run build
```

Con estos 7 pasos el proyecto está listo para funcionar.

---

## Configuración del Entorno

Edita el archivo `.env` con los valores correspondientes a tu entorno:

```dotenv
# Aplicación
APP_NAME="GECSA INGENIEROS SAC"
APP_ENV=local           # local | production
APP_DEBUG=true          # false en producción
APP_URL=http://localhost

# Base de datos
DB_CONNECTION=sqlite
# Para MySQL/PostgreSQL en producción:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=gecsasac
# DB_USERNAME=root
# DB_PASSWORD=tu_password

# Correo electrónico
MAIL_MAILER=smtp
MAIL_HOST=smtp.tudominio.com
MAIL_PORT=587
MAIL_USERNAME=contacto@gecsa.pe
MAIL_PASSWORD=tu_password
MAIL_FROM_ADDRESS="contacto@gecsa.pe"
MAIL_FROM_NAME="GECSA INGENIEROS SAC"
```

> **Importante:** Nunca subas el archivo `.env` al repositorio. Ya está incluido en `.gitignore`.

---

## Servidor de Desarrollo

Para iniciar todos los servicios en paralelo (servidor PHP + queue + Vite):

```bash
composer run dev
```

Este comando levanta simultáneamente:
- `php artisan serve` → [http://localhost:8000](http://localhost:8000)
- `php artisan queue:listen`
- `npm run dev` (Vite con HMR)

O bien, puedes iniciarlos por separado:

```bash
# Terminal 1 — servidor Laravel
php artisan serve

# Terminal 2 — Vite con hot reload
npm run dev
```

---

## Build para Producción

```bash
# Optimizar autoloader de Composer
composer install --optimize-autoloader --no-dev

# Compilar y minificar assets
npm run build

# Cachear configuración, rutas y vistas
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Para limpiar los cachés en cualquier momento:

```bash
php artisan optimize:clear
```

---

## Pruebas

El proyecto utiliza **Pest PHP** como framework de testing.

```bash
# Ejecutar todas las pruebas
composer test

# Ejecutar con cobertura de código
php artisan test --coverage

# Ejecutar solo pruebas unitarias
php artisan test --testsuite=Unit

# Ejecutar solo pruebas de feature
php artisan test --testsuite=Feature
```

Para formatear el código con Laravel Pint:

```bash
./vendor/bin/pint
```

---

## Despliegue

### Checklist de producción

- [ ] `APP_ENV=production` y `APP_DEBUG=false` en `.env`
- [ ] `APP_KEY` generada y segura
- [ ] `composer install --optimize-autoloader --no-dev` ejecutado
- [ ] `npm run build` ejecutado
- [ ] `php artisan config:cache` ejecutado
- [ ] `php artisan route:cache` ejecutado
- [ ] `php artisan view:cache` ejecutado
- [ ] Permisos correctos en `storage/` y `bootstrap/cache/` (`chmod -R 775`)
- [ ] Servidor web apuntando a la carpeta `public/`
- [ ] HTTPS configurado

### Configuración de Nginx (ejemplo)

```nginx
server {
    listen 80;
    server_name gecsa.pe www.gecsa.pe;
    root /var/www/GECSA-SAC/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

---

<div align="center">

Desarrollado para **GECSA INGENIEROS S.A.C.**

*Ejecución y consultoría de obras civiles, ambientales y mineras*

</div>
