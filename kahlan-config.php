<?php
use Kahlan\Filter\Filter;

Filter::register('movieapp.namespaces', function($chain) {
  $this->autoloader()->addPsr4('DM\\MovieApp\\Model\\', __DIR__ . '/app/Models/');
  $this->autoloader()->addPsr4('DM\\MovieApp\\Controllers\\', __DIR__ . '/app/Controllers/');
  $this->autoloader()->addPsr4('DM\\MovieApp\\Services\\', __DIR__ . '/app/Services/');
  return $chain->next();

});

$this->args()->set('include', [
    'app/',
]);


Filter::apply($this, 'namespaces', 'movieapp.namespaces');
