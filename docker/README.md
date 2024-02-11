# Docker - Apache + PHP5.6 + MariaDB
## Instalación

0. Asegurate de tener un archivo `../.env` con la información de la base de datos
```
# Database
MYSQL_HOST=mariadb
MYSQL_DATABASE=nombredelabase 
MYSQL_USER=usuario
MYSQL_PASSWORD='pa$$word'
```
1. Agrega el volcado inicial de la base en docker/dump.sql (opcional)
2. Contruye la imagen de php + apache que está en el Dockerfile
```
docker-compose build 
```
3. Levanta los containers

```
docker-compose up -d
```
4. Si agregaste el volcado (dump.sql) antes de levantar los containers, deberás esperar a que mariadb_container termine de trabajar, SI NO, puedes hacer el volcado manualmente con: (opcional)
```
docker exec -i mariadb_container mysql -uroot -proot nombredelabase < /path/to/dump.sql
```

## Uso diario
- Inicia los containers
```
docker-compose up -d
```
- Apaga los containers
```
docker-compose stop
```

## Configuración
- Puedes agregar tu configuración `php.ini` o `my.cfn` antes de construir la imagen.
- El container está diseñado para correr SIN HTTPS en localhost, asegurate de evitar cualquier redirección
```
<IfModule mod_rewrite.c>
  Options +FollowSymlinks
  RewriteEngine On 

  # This line is to avoid https redirect in localhost
  RewriteCond %{HTTP_HOST} !^localhost$ [NC]

  RewriteCond %{HTTPS} off
  RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</IfModule>
```

## Comandos útiles
### Construir la imagen de Dockerfile
`docker-compose build`

### Levantar los containers
`docker-compose up -d`

### Detener los containers
`docker-compose stop`

### Eliminar los containers
`docker-compose down`

### Ver los logs de un container
`docker logs mariadb_container`

### Hacer el volcado manualmente
`docker exec -i mariadb_container mysql -uroot -proot nombredelabase < dump.sql`

### Accesar a la base
`docker exec -it mariadb_container mysql -u root -proot -e`

### Ejecutar algo en la base directamente
`docker exec -it mariadb_container mysql -u root -proot -e "show databases;"`