sudo adduser usuario docker


IMPORTANTE. PASO 1:
docker context use default

PASO 2:
dentro de docker/mysql:
docker compose up -d

(d es detach)
(tambien cambiar la version a 8.1, en .env)


EN UN DOCKERFILE ESTAN:
run install-php-extensions @composer
run install-php-extensions decimal-1.5.3
ADSGDFGH