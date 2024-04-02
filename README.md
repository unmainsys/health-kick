# Health kick
"Start sanatate" seems to be Romanian, and it could be translated to English as "Health kick" or "Healthy start." 
These translations convey the idea of beginning or initiating a focus on health or wellness.


## Docker & project setup

### Initial setup
- see .env file inside _docker container and update upon your needs

- set local ip alias
``./_docker/bin/set-local-ip-alias.sh`` requires sudo

This will allow you to have multiple containers up using the same port numbers as expected ones (80, 443, 3306 etc) instead of using custom port numbers 

run `docker-compose up`

- add new line in /etc/hosts


### Access container
docker exec -it hk-php-fpm bash


### Node Local Tunnel
https://localtunnel.github.io/www/