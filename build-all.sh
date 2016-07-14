#!/usr/bin/env bash

docker-compose -f microservices/support/docker-compose.yml build

docker-compose -f microservices/application/website/docker-compose.yml build
docker-compose -f microservices/application/order/docker-compose.yml build
docker-compose -f microservices/application/inventory/docker-compose.yml build

cd microservices/application/order/; composer install; cd ../../..
