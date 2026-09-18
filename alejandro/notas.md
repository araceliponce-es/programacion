docker run --help



----

Si quieres verla en localhost:1234, haz esto desde la carpeta welcome-to-docker:

cd welcome-to-docker
docker build -t welcome-to-docker .
docker run -p 1234:3000 welcome-to-docker

Luego abre:

http://localhost:1234


----


Si quieres ejecutarlo en segundo plano, usa:

docker run -d -p 1234:3000 --name welcome-to-docker welcome-to-docker


----

Y puedes comprobarlo con:

docker ps

Para pararlo:

docker stop welcome-to-docker


----

rm 
para remover


-p = publish a container ports to the host.





todo:
ver tutorial de docker