<?php
use Kahlan\Filter\Filter;
use Kahlan\Jit\Interceptor;
use Kahlan\Jit\Patcher\Layer;

Filter::register('api.patchers', function ($chain) {
	$interceptor = Interceptor::instance();
	$patchers = $interceptor->patchers();
	$patchers->add('layer', new Layer([
		'override' => [
			'Phalcon\Mvc\Model', // apply a layer on top of all classes extending `Phalcon\Mvc\Model`.
			'Phalcon\Mvc\Controller' // not working
		],
	]));

	return $chain->next();
});

Filter::apply($this, 'patchers', 'api.patchers');

Filter::register('movieapp.namespaces', function ($chain) {
	$this->autoloader()->addPsr4('DM\\MovieApp\\Model\\', __DIR__ . '/app/Models/');
	$this->autoloader()->addPsr4('DM\\MovieApp\\Controllers\\', __DIR__ . '/app/Controllers/');
	$this->autoloader()->addPsr4('DM\\MovieApp\\Services\\', __DIR__ . '/app/Services/');
	return $chain->next();

});

$this->args()->set('include', [
	'app/',
]);

Filter::apply($this, 'namespaces', 'movieapp.namespaces');
require 'config/bootstrap.php';