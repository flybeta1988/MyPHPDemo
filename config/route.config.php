<?php
/**
 * Created by PhpStorm.
 * User: hcf
 * Date: 16-9-22
 * Time: 下午5:29
 */
require_once __DIR__.'/global.config.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Generator\UrlGenerator;

$routes = new RouteCollection ();

// 站点首页
$routes->add ( 'site_index', new Route ( '/', array (
    '_directory' => 'home',
    '_class' => 'home',
    '_action' => 'index'
), array (), array (
    'prefixPattern' => WEB_DOMAIN ? 'www.' . WEB_DOMAIN : 'www.huivo.com'
) ) );

$routes->add ( 'site_add', new Route ( '/add', array (
    '_directory' => 'home',
    '_class' => 'home',
    '_action' => 'add'
), array (), array (
    'prefixPattern' => WEB_DOMAIN ? 'www.' . WEB_DOMAIN : 'www.huivo.com'
) ) );
