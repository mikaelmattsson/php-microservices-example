#!/usr/bin/env bash

docker-compose -f microservices/support/docker-compose.yml up -d --remove-orphans

docker-compose -f microservices/application/website/docker-compose.yml \
               -f microservices/application/website/docker-compose.dev.yml up -d --remove-orphans
docker-compose -f microservices/application/order/docker-compose.yml \
               -f microservices/application/order/docker-compose.dev.yml up -d --remove-orphans
docker-compose -f microservices/application/inventory/docker-compose.yml \
               -f microservices/application/inventory/docker-compose.dev.yml up -d --remove-orphans

