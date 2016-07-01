<?php

$hostname = getenv('HOSTNAME');

echo "Hello world from website service ($hostname) <br><br> \n";

echo "Response from inventory service:";
echo "<pre>";
echo file_get_contents('http://192.168.99.100:8081/backend-service/inventory');
echo "</pre>";


