<?php
require_once('vendor/symfony/src/Symfony/Component/ClassLoader/UniversalClassLoader.php');
use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Project' => __DIR__.'/../lib',
));
$loader->register();

$launcher = new Project\Launcher();
$launcher->run();