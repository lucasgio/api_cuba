
# API_CUBA

API desarrollada con Laravel PHP para brindar servicios REST para multiples plataformas sobre información politico administrativa de API_CUBA




## Features

- Realizar busquedas por provincias, municipios
- Listar provincias con sus municipios


## Future Features
- Listado de Codigos postales de Cuba
- Listados de consejos populares y mas


## Documentation

[Documentation](http://appcuba.herokuapp.com/docs/)


## Autor

- [Iosvany Alvarez](https://www.github.com/lucasgio)


## Instalación


```bash
  git clone https://github.com/lucasgio/api_cuba.git
  cd api_cuba
  composer install 
  cp env.example .env
```

```bash
Crear una db en su cofiguración de mysql


DB_DATABASE=nombredeldb
DB_USERNAME=usuariomysql
DB_PASSWORD=passwordmysql

```

```bash
php artisan migrate --seed
php artisan config:clear
php artisan optimize

php artisan test
```

```bash
php artisan serve
```

## API EndPoints

#### GET
Se obtiene todas las provincias

```http
  GET /api/v1/provincies
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `page` | `int` | **Optional** |

#### GET
Se obtiene todos los municipios

```http
  GET /api/v1/municipalities
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `page`      | `int` | **Optional** |

#### GET
Se obtiene todos los barrios o consejos populares (SOONNN)

```http
  GET /api/v1/neighborhoods
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `page`      | `int` | **Optional** |







## License

[MIT](https://choosealicense.com/licenses/mit/)


## Tech Stack

**Back-End:** Laravel, PHP


