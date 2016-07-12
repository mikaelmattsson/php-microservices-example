# Php Microservices Example

This is an example/demo/boilerplate/skeleton of an application built with
php microservices.

I made this for myself. Use at your own risk.


### Helpful commands

Show the current generated load balancer config:

    docker-compose -f microservices/support/docker-compose.yml exec lb cat /etc/nginx/conf.d/app.conf
    docker-compose -f microservices/support/docker-compose.yml exec rabbitmq cat /etc/rabbitmq/rabbitmq.config

### Keywords
* Consul
* Docker
* docker-compose
* docker-machine

### Links
* http://blog.neilni.com/2015/09/14/consul-and-consul-template-with-docker-compose/
* http://www.kennybastani.com/2016/04/event-sourcing-microservices-spring-cloud.html
* http://artplustech.com/docker-consul-dns-registrator/
