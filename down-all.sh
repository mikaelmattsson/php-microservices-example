#!/usr/bin/env bash

docker-compose -f microservices/support/docker-compose.yml down

docker-compose -f microservices/application/website/docker-compose.yml down
docker-compose -f microservices/application/inventory/docker-compose.yml down
