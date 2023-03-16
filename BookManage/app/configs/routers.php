<?php
return array(
    "/" => "HomeController@index",
    "/login" => "GuestController@login",
    "/logout" => "GuestController@logout",
    "/notice" => "GuestController@notice",
    "/welcome" => "HomeController@welcome",
    "/phpinfo" => "GuestController@phpinfo",

    "/book/add" => "BookController@add",
    "/book/add2" => "BookController@add2",
    "/book/edit" => "BookController@edit",
    "/book/delete" => "BookController@delete",
    "/book/index" => "BookController@index",
    "/book/list" => "BookController@ajaxList",
    "/book/detail" => "BookController@detail",
    "/book/status/modify" => "BookController@statusModify",

    "/book/shelf/add" => "ShelfController@add",
    "/book/shelf/edit" => "ShelfController@edit",
    "/book/shelf/delete" => "ShelfController@delete",
    "/book/shelf/index" => "ShelfController@index",

    "/category/index" => "CategoryController@index",
    "/category/add" => "CategoryController@add",
    "/category/edit" => "CategoryController@edit",
    "/category/delete" => "CategoryController@delete",

    "/user/add" => "UserController@add",
    "/user/edit" => "UserController@edit",
    "/user/delete" => "UserController@delete",
    "/user/index" => "UserController@index",
    "/user/list" => "UserController@ajaxList",
    "/user/detail" => "UserController@detail",

    "/lend/add" => "LendController@add",
    "/lend/index" => "LendController@index",
    "/lend/return/back" => "LendController@returnBack",

    "/subscribe/add" => "SubscribeController@add",
    "/subscribe/index" => "SubscribeController@index",
    "/subscribe/delete" => "SubscribeController@delete",
);
