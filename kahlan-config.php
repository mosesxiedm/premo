<?php
use Kahlan\Filter\Filter;

Filter::register('movieapp.namespaces', function($chain) {
  $this->autoloader()->addPsr4('DM\\MovieApp\\Model\\', __DIR__ . '/app/models/');
  $this->autoloader()->addPsr4('DM\\MovieApp\\Controllers\\', __DIR__ . '/app/controllers/');
  $this->autoloader()->addPsr4('DM\\MovieApp\\Services\\', __DIR__ . '/app/services/');
  return $chain->next();

});

$this->args()->set('include', [
    'app/',
]);


Filter::apply($this, 'namespaces', 'movieapp.namespaces');
