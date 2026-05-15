<div align="center">

<br>

<img src="public/assets/img/gecsa.png" alt="GECSA INGENIEROS S.A.C." width="220"/>

<br><br>

# GECSA INGENIEROS S.A.C.
## Sitio Web Corporativo & Panel Administrativo

<br>

[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=flat-square&logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![SQLite](https://img.shields.io/badge/SQLite-3.x-003B57?style=flat-square&logo=sqlite&logoColor=white)](https://sqlite.org/)
[![License](https://img.shields.io/badge/Licencia-Privada-red?style=flat-square)](#)

<br>

> Plataforma web institucional para GECSA INGENIEROS S.A.C. — empresa peruana de ejecución, supervisión y consultoría de obras civiles, ambientales y mineras. Incluye sitio público y panel de administración completo.

<br>

**[🌐 Sitio público](#)** &nbsp;·&nbsp; **[🔐 Panel admin](#-panel-administrativo)** &nbsp;·&nbsp; **[📖 Documentación](#-tabla-de-contenidos)**

<br>

---

</div>

## ✨ ¿Qué incluye?

<table>
<tr>
<td width="50%">

### 🌐 Sitio Público
- **Hero** con isla flotante animada y olas SVG corporativas
- **Barra de estadísticas** con contadores en tiempo real
- **Carrusel de obras** ejecutadas y supervisadas
- **Swiper de expedientes** técnicos (2 visibles)
- **Swiper de perfiles** técnicos (3 visibles)
- **Certificaciones ISO** 9001 · 14001 · 45001 · 50001 · 37001
- **Footer** de 3 columnas con navegación y datos legales

</td>
<td width="50%">

### 🔐 Panel Administrativo
- **Dashboard** con estadísticas y acciones rápidas
- **CRUD Obras** con upload de imágenes y preview
- **CRUD Expedientes** con código SNIP y montos
- **CRUD Perfiles** con selector visual de íconos
- **Control de orden** y visibilidad por registro
- **Autenticación** segura con sesiones Laravel
- **Diseño responsive** con sidebar colapsable

</td>
</tr>
</table>

---

## 📋 Tabla de contenidos

- [Tecnologías](#-tecnologías)
- [Arquitectura del proyecto](#-arquitectura-del-proyecto)
- [Base de datos](#-base-de-datos)
- [Rutas del sistema](#-rutas-del-sistema)
- [Requisitos previos](#-requisitos-previos)
- [Instalación rápida](#-instalación-rápida)
- [Panel administrativo](#-panel-administrativo)
- [Diseño y componentes](#-diseño-y-componentes)
- [Configuración del entorno](#-configuración-del-entorno)
- [Comandos útiles](#-comandos-útiles)
- [Despliegue en producción](#-despliegue-en-producción)
- [Roadmap](#-roadmap)

---

## 🛠️ Tecnologías

### Backend
| Tecnología | Versión | Rol |
|---|---|---|
| **[Laravel](https://laravel.com)** | 12.x | Framework principal |
| **PHP** | 8.2+ | Lenguaje de servidor |
| **SQLite** | 3.x | Base de datos (archivo local, sin instalación) |

### Frontend
| Tecnología | Rol |
|---|---|
| **[Bootstrap 5.3](https://getbootstrap.com/)** | Grid, componentes UI, carruseles de obras |
| **[Bootstrap Icons](https://icons.getbootstrap.com/)** | Iconografía completa del sistema |
| **[Swiper.js](https://swiperjs.com/)** | Carruseles de expedientes y perfiles técnicos |
| **[AOS](https://michalsnik.github.io/aos/)** | Animaciones de entrada al hacer scroll |
| **[Animate.css](https://animate.style/)** | Animaciones del hero (fadeIn, slideUp) |
| **[GLightbox](https://biati-digital.github.io/glightbox/)** | Galería multimedia |

### Colores corporativos
```
Teal oscuro:   #065b5e   ← color principal
Teal claro:    #1dc8cd   ← acento / highlight
Fondo oscuro:  #0d1f26   ← secciones dark
Hero gradient: #00454a → #005f73 → #0a9396
```

> **Nota:** Node.js **no es requerido**. Los assets frontend ya están compilados en `public/assets/vendor/`.

---

## 📁 Arquitectura del proyecto

```
GECSA-SAC/
│
├── 📂 app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php              ← Carga datos DB → vista pública
│   │   ├── Auth/
│   │   │   └── LoginController.php         ← Login/logout manual (sin Breeze)
│   │   └── Admin/
│   │       ├── DashboardController.php     ← Stats del dashboard
│   │       ├── ObraController.php          ← CRUD + upload de imágenes
│   │       ├── ExpedienteController.php    ← CRUD expedientes
│   │       └── PerfilController.php        ← CRUD perfiles técnicos
│   └── Models/
│       ├── Obra.php                        ← scope activos(), fillable
│       ├── ExpedienteTecnico.php           ← tabla: expedientes_tecnicos
│       └── PerfilTecnico.php              ← tabla: perfiles_tecnicos
│
├── 📂 database/
│   ├── database.sqlite                     ← BD SQLite (generada en instalación)
│   ├── migrations/
│   │   ├── ..._create_obras_table.php
│   │   ├── ..._create_expedientes_tecnicos_table.php
│   │   └── ..._create_perfiles_tecnicos_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── AdminSeeder.php                 ← usuario admin@gecsa.pe
│       ├── ObrasSeeder.php                 ← 5 obras iniciales
│       ├── ExpedientesSeeder.php           ← 16 expedientes
│       └── PerfilesSeeder.php              ← 9 perfiles técnicos
│
├── 📂 public/
│   └── assets/
│       ├── css/main.css                    ← Estilos corporativos (al final del archivo)
│       ├── js/main.js                      ← Scripts personalizados (al final del archivo)
│       ├── img/
│       │   ├── obras/                      ← Imágenes subidas desde el admin
│       │   ├── clients/                    ← Logos de clientes (6 imágenes)
│       │   └── iso*.png                    ← Logos de certificaciones ISO
│       └── vendor/                         ← Bootstrap, Swiper, AOS, GLightbox, etc.
│
├── 📂 resources/views/
│   ├── layouts/
│   │   ├── avilon.blade.php               ← Layout público (meta, assets, nav, footer)
│   │   └── admin.blade.php               ← Layout admin (sidebar, header, toasts)
│   ├── partials/
│   │   ├── nav.blade.php                 ← Navbar fijo + ícono 🛡️ → admin login
│   │   └── footer.blade.php             ← Footer 3 columnas
│   ├── home.blade.php                   ← Página pública principal
│   ├── auth/
│   │   └── login.blade.php              ← Formulario de acceso admin
│   └── admin/
│       ├── dashboard.blade.php
│       ├── obras/       {index, create, edit}.blade.php
│       ├── expedientes/ {index, create, edit}.blade.php
│       └── perfiles/    {index, create, edit}.blade.php
│
└── 📂 routes/
    └── web.php                          ← Todas las rutas del sistema
```

---

## 🗃️ Base de datos

### Tabla `obras`
| Campo | Tipo | Descripción |
|---|---|---|
| `id` | bigint PK | Identificador |
| `title` | string | Nombre de la obra |
| `img` | string nullable | Ruta relativa a `public/assets/img/` |
| `ubicacion` | string | Distrito, Provincia, Región |
| `cliente` | string | Entidad contratante |
| `monto` | string | Ej: `S/ 2,074,386.16` |
| `plazo` | string | Ej: `18/05/2022 al 30/12/2022` |
| `tipo` | enum | `ejecucion` \| `supervision` |
| `orden` | smallint | Menor = aparece primero |
| `activo` | boolean | Si `false` no aparece en el sitio |

### Tabla `expedientes_tecnicos`
| Campo | Tipo | Descripción |
|---|---|---|
| `id` | bigint PK | Identificador |
| `title` | string | Nombre del proyecto |
| `snip` | string | Código SNIP o CUI |
| `monto` | string | Ej: `S/. 15,580,784.43` |
| `fecha_contrato` | string | Ej: `28/01/2018` |
| `orden` | smallint | Orden de aparición |
| `activo` | boolean | Visibilidad pública |

### Tabla `perfiles_tecnicos`
| Campo | Tipo | Descripción |
|---|---|---|
| `id` | bigint PK | Identificador |
| `proyecto` | string(500) | Descripción del proyecto |
| `ubicacion` | string | Localización geográfica |
| `icon` | string | Nombre del ícono Bootstrap Icons (ej: `building`) |
| `orden` | smallint | Orden de aparición |
| `activo` | boolean | Visibilidad pública |

> **Imágenes de obras:** Las originales del seeder están en `public/assets/img/`. Las subidas desde el admin se guardan en `public/assets/img/obras/timestamp_nombre.ext`.

---

## 🗺️ Rutas del sistema

### Públicas
| Método | URL | Descripción |
|---|---|---|
| `GET` | `/` | Página principal pública |
| `GET` | `/admin/login` | Formulario de acceso |
| `POST` | `/admin/login` | Procesar login |
| `POST` | `/admin/logout` | Cerrar sesión |

### Admin (requieren autenticación)
| Método | URL | Nombre | Descripción |
|---|---|---|---|
| `GET` | `/admin` | `admin.dashboard` | Dashboard con estadísticas |
| `GET/POST` | `/admin/obras` | `admin.obras.*` | Listar / crear obras |
| `GET/PUT/DELETE` | `/admin/obras/{obra}` | `admin.obras.*` | Ver / editar / eliminar |
| `GET/POST` | `/admin/expedientes` | `admin.expedientes.*` | Listar / crear expedientes |
| `GET/PUT/DELETE` | `/admin/expedientes/{expediente}` | `admin.expedientes.*` | Ver / editar / eliminar |
| `GET/POST` | `/admin/perfiles` | `admin.perfiles.*` | Listar / crear perfiles |
| `GET/PUT/DELETE` | `/admin/perfiles/{perfil}` | `admin.perfiles.*` | Ver / editar / eliminar |

---

## 📋 Requisitos previos

| Herramienta | Versión mínima | Cómo verificar |
|---|---|---|
| **PHP** | 8.2+ | `php -v` |
| **Composer** | 2.x | `composer -V` |
| **Git** | cualquiera | `git --version` |

---

## 🚀 Instalación rápida

```bash
# 1. Clonar el repositorio
git clone https://github.com/guver71/GECSA-SAC.git
cd GECSA-SAC

# 2. Instalar dependencias PHP
composer install

# 3. Configurar entorno
cp .env.example .env
php artisan key:generate

# 4. Crear base de datos y cargar datos iniciales
touch database/database.sqlite
php artisan migrate --seed

# 5. Iniciar servidor
php artisan serve
```

Abre **[http://localhost:8000](http://localhost:8000)** — ¡el sitio ya está funcionando! 🎉

---

## 🔐 Panel administrativo

### Credenciales de acceso

```
URL:       http://localhost:8000/admin/login
Email:     admin@gecsa.pe
Contraseña: gecsa2024
```

> ⚠️ Cambia la contraseña antes de subir a producción ejecutando `php artisan tinker` y actualizando el usuario.

### Acceso rápido desde el sitio
El ícono **🛡️** en el extremo derecho de la barra de navegación lleva directamente al login de administración. Es discreto para visitantes normales pero accesible para el administrador.

### Funcionalidades del panel

```
📊 Dashboard
   └── Estadísticas: total obras, expedientes, perfiles
   └── Acciones rápidas: crear registro, ver sitio público

🏗️ Obras (/admin/obras)
   ├── Listar con imagen en miniatura, tipo y estado
   ├── Crear con upload de imagen (preview en tiempo real)
   ├── Tipo: Ejecución | Supervisión
   ├── Control de orden de aparición
   └── Activar / desactivar visibilidad

📄 Expedientes (/admin/expedientes)
   ├── Listar con código SNIP, monto y fecha
   ├── Crear / editar / eliminar
   └── Control de orden y visibilidad

📐 Perfiles Técnicos (/admin/perfiles)
   ├── Selector visual de íconos Bootstrap Icons
   ├── Preview del ícono en tiempo real
   └── Control de orden y visibilidad
```

---

## 🎨 Diseño y componentes

### Secciones de la página pública

| # | Sección | ID | Fondo | Descripción |
|---|---|---|---|---|
| 1 | **Hero** | `#hero` | Gradiente teal | Isla flotante animada + olas SVG |
| 2 | **Stats** | — | Blanco | 4 contadores: obras, expedientes, perfiles, año |
| 3 | **Obras** | `#about` | Blanco | Bootstrap carousel con ficha técnica |
| 4 | **Clientes** | `#clients` | Gris | 6 logos en escala de grises con hover color |
| 5 | **Expedientes** | `#services` | Oscuro | Swiper 2 visibles · tags SNIP/monto/fecha |
| 6 | **Perfiles** | `#perfiles` | Blanco | Swiper 3 visibles · cards con cabecera teal |
| 7 | **Certificaciones** | `#certificaciones` | Oscuro | 5 certificaciones ISO en grid |

### Componentes destacados

**🏝️ Isla flotante del hero**
- Animación CSS `islandFloat` — sube y baja 14px cada 5 segundos
- Rota entre las primeras 3 obras registradas en la BD
- Badge inferior "Obras certificadas ISO 9001 · 14001 · 45001"
- Dots sincronizados que se expanden al estar activos

**🌊 Olas animadas**
- 3 capas SVG con velocidades distintas (10s · 8s · 6s)
- Sentidos alternados — crea efecto de profundidad real
- Fill blanco para transicionar al fondo blanco de la siguiente sección

**🔄 Carruseles Swiper**
- Autoplay con pausa al pasar el cursor
- Controles personalizados (flechas + dots dinámicos)
- Responsive: 3→2→1 slides según tamaño de pantalla

---

## ⚙️ Configuración del entorno

```dotenv
# ── Aplicación ──────────────────────────────
APP_NAME="GECSA INGENIEROS"
APP_ENV=local                 # → production al desplegar
APP_DEBUG=true                # → false en producción
APP_URL=http://localhost
APP_LOCALE=es

# ── Base de datos (SQLite) ───────────────────
DB_CONNECTION=sqlite
DB_DATABASE=/ruta/absoluta/al/proyecto/database/database.sqlite

# ── Correo electrónico ───────────────────────
MAIL_MAILER=smtp
MAIL_HOST=smtp.tudominio.com
MAIL_PORT=587
MAIL_USERNAME=contacto@gecsa.pe
MAIL_PASSWORD=tu_password_aqui
MAIL_FROM_ADDRESS="contacto@gecsa.pe"
MAIL_FROM_NAME="GECSA INGENIEROS SAC"
```

> **Importante:** El archivo `.env` está en `.gitignore` — nunca lo versiones ni lo compartas.

---

## 🧰 Comandos útiles

```bash
# Iniciar servidor de desarrollo
php artisan serve

# Recargar BD con datos frescos  ⚠️ borra todo
php artisan migrate:fresh --seed

# Limpiar caché de vistas
php artisan view:clear

# Limpiar todo el caché
php artisan optimize:clear

# Ver todas las rutas registradas
php artisan route:list

# Acceder a la BD por consola
php artisan tinker
```

---

## 🌐 Despliegue en producción

### ✅ Checklist

```
□  APP_ENV=production  y  APP_DEBUG=false  en .env
□  APP_URL apuntando al dominio real
□  composer install --optimize-autoloader --no-dev
□  php artisan config:cache
□  php artisan route:cache
□  php artisan view:cache
□  chmod -R 775 storage/ bootstrap/cache/
□  Servidor web apuntando a la carpeta public/
□  Certificado SSL (HTTPS) configurado
□  Contraseña del admin cambiada
□  Variables MAIL_* configuradas
```

### Configuración Nginx

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

## 🗺️ Roadmap

- [x] Sitio web corporativo completo con diseño minimalista
- [x] Hero con isla flotante animada y olas SVG
- [x] Panel administrativo con autenticación
- [x] CRUD Obras con upload de imágenes
- [x] CRUD Expedientes Técnicos
- [x] CRUD Perfiles Técnicos con selector de íconos
- [x] Carruseles Swiper para expedientes y perfiles
- [x] Diseño responsive completo
- [ ] Formulario de contacto con envío de email (Laravel Mail)
- [ ] Redes sociales reales en el footer
- [ ] Panel de ajustes generales (logo, datos de contacto)
- [ ] Soporte para múltiples administradores con roles
- [ ] Galería de imágenes por obra

---

<div align="center">

<br>

---

Desarrollado para **GECSA INGENIEROS S.A.C.**

*Ejecución · Supervisión · Consultoría de obras civiles, ambientales y mineras*

<br>

🇵🇪 &nbsp; **RUC:** 20604533051 &nbsp;·&nbsp; **Fundada:** 19 de mayo de 2021 &nbsp;·&nbsp; **Perú**

<br>

</div>
