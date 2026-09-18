netstat -ltn
(debes evitar que docker use alguno de los puestos listados alli)






Change the host port:

docker run -d --name nginx1 -p 9000:80 nginx







See all containers:
sudo docker ps -a






----------------------
docker --help
docker create --help (o CUALQUIERCOMANDO --help)


-----
sudo usermod -aG docker daw2al15




----------






1. Comprobar que Docker está instalado

docker --version

2. Descargar la imagen de Nginx

docker pull nginx

Esto descarga la imagen nginx:latest desde Docker Hub.

3. Crear el volumen

docker volume create nginx_volumen

Puedes comprobarlo:

docker volume ls

4. Crear el contenedor y asociarle el volumen

Por ejemplo, montando el volumen en /usr/share/nginx/html, que es el directorio donde Nginx sirve normalmente los archivos web:

sudo docker run -d   --name nginx_contenedor   -p 8080:80   -v mi_volumen:/usr/share/nginx/html   nginx

5. comprobar
sudo docker -ps

6. esta asociado?
sudo docker inspect nginx_contenedor


revisar 
sudo docker volume inspect mi_volumen
[
    {
        "CreatedAt": "2026-09-17T12:34:21+02:00",
        "Driver": "local",
        "Labels": null,
        "Mountpoint": "/var/lib/docker/volumes/mi_volumen/_data",
        "Name": "mi_volumen",
        "Options": null,
        "Scope": "local"
    }
]


 En tu host, el volumen está en:
/var/lib/docker/volumes/mi_volumen/_data



intento 2 de agregar
sudo usermod -aG docker $USER

comprueba;
getent group docker

actualiza:
newgrp docker

(resultado: al cambiar sesion, se perdio el grupo docker, de nuevo)


If you hit problems, check your socket permissions and restart Docker. https://www.datacamp.com/tutorial/add-users-to-docker-group 




---

docker compose -v