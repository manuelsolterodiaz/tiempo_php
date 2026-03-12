# Aplicación del Tiempo

## Índice

- [Funcionalidades](#funcionalidades)
- [Estructura del proyecto](#estructura-del-proyecto)
- [Base de datos](#base-de-datos)
- [APIs utilizadas](#apis-utilizadas)
- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Despliegue en AWS](#despliegue-en-aws)
- [Tecnologías](#tecnologías)

Aplicación web en PHP que permite consultar el tiempo atmosférico de cualquier ciudad del mundo usando la API de OpenWeatherMap. Incluye despliegue con Docker y base de datos MariaDB para registrar el historial de consultas.

## Funcionalidades

- Búsqueda de ciudades mediante formulario con geolocalización automática.
- Si la ciudad no existe, se muestra un mensaje de error.
- Si la ciudad existe, se puede consultar:
  - El tiempo actual (temperatura, humedad, viento, descripción).
  - La previsión por horas del día actual.
  - La previsión para la semana.
- Historial de todas las consultas realizadas, guardadas en base de datos.
- Gráficas con Chart.js en cada vista.

## Estructura del proyecto

```
.
├── Dockerfile
├── docker-compose.yml
├── sql/
│   └── base_datos.sql
└── src/
    ├── index.php
    ├── config/
    │   └── config.php
    ├── modelos/
    │   ├── conexion.php
    │   ├── consultas.php
    │   └── weather.php
    ├── controladores/
    │   ├── actual.php
    │   ├── horas.php
    │   ├── semana.php
    │   └── historial.php
    └── vistas/
        ├── inicio.php
        ├── actual.php
        ├── horas.php
        ├── semana.php
        ├── historial.php
        └── error.php
```

La aplicación sigue el patrón MVC. El archivo `index.php` actúa como router y redirige a cada controlador según la página solicitada.

## Base de datos

Se usa MariaDB con una sola tabla que guarda cada consulta realizada.

```sql
CREATE TABLE consultas (
    id     INT AUTO_INCREMENT PRIMARY KEY,
    ciudad VARCHAR(100),
    tipo   VARCHAR(50),
    fecha  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

El campo `tipo` puede ser `actual`, `horas` o `semana`.

## APIs utilizadas

Se usan tres endpoints de OpenWeatherMap:

- **Geocoding**: obtiene la latitud y longitud a partir del nombre de la ciudad.
- **Current Weather**: devuelve el tiempo actual para unas coordenadas.
- **Forecast**: devuelve la previsión en intervalos de 3 horas durante 5 días. Se usa tanto para la vista de horas como para la semanal.

## Requisitos

- Docker y Docker Compose instalados.
- Clave de API gratuita de OpenWeatherMap.

## Instalación

Clonar el repositorio:

```bash
git clone https://github.com/tu-usuario/tu-repo.git
cd tu-repo
```

Editar `src/config/config.php` y poner la API key:

```php
$API_KEY = "TU_API_KEY";
```

Levantar los contenedores:

```bash
docker compose up -d --build
```

La aplicación estará disponible en `http://localhost`. phpMyAdmin en `http://localhost:8081`.

## Despliegue en AWS

1. Crear una instancia EC2 con Ubuntu.
2. Abrir los puertos 80 y 22 en el Security Group.
3. Instalar Docker en la instancia.
4. Clonar el repositorio, configurar la API key y ejecutar `docker compose up -d --build`.
5. Acceder desde la IP pública de la instancia.

## Tecnologías

- PHP 8.2 con Apache
- MariaDB 10.5
- Docker y Docker Compose
- Chart.js
- OpenWeatherMap API



