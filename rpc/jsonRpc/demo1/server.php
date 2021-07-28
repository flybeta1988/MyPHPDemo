<?php
require_once 'User.php';
require_once 'JsonRPCServer.php';

//服务端调用
$user = new User();

//注入实例
JsonRPCServer::handle($user) or print 'no request';
