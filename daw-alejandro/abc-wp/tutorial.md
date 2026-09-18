https://github.com/docker/awesome-compose/tree/master/official-documentation-samples/wordpress/

steps:

create the yml

run docker compose up -d from your project directory.

This runs docker compose up in detached mode, pulls the needed Docker images, and starts the wordpress and database containers, as shown in the example below.

esta en localhost 80, o localhost a secas.


The command 'docker compose down' removes the containers and default network, but preserves your WordPress database.

The command 'docker compose down --volumes' removes the containers, default network, and the WordPress database.