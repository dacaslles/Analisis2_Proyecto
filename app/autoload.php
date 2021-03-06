<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('soap',_DIR_.'/../vendor/soap/');
AnnotationRegistry::registerLoader([$loader, 'loadClass']);

return $loader;
