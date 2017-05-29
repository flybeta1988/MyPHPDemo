<?php
die('index page');
require_once __DIR__.'/config/route.config.php';

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Generator\UrlGenerator;

$context = new RequestContext();
$urlgenerator = new UrlGenerator($routes, $context);
$url = $urlgenerator->generate('site_add');

echo '<br/>';
echo 'Hello World !';

echo '<br/>';
echo $url;
