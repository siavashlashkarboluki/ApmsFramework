<?php

use ApmsKit\Core\Router\RoutesCollection;

$routes_collection = new RoutesCollection();

$routes_collection->add("POST",constant('URL_SUBFOLDER') . '/product\/[0-9]+/', 'ProductController', 'showProduct', [
    'id'
]);
$routes_collection->add("GET",constant('URL_SUBFOLDER') . '/news\/[0-9]+\/[0-9]+/', 'NewsController', 'showNews', [
    'id',
    'cid'
]);
