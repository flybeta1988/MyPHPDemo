<?php
return array(
    "/" => "HomeController@index",
    "/login" => "GuestController@login",
    "/logout" => "HomeController@logout",
    "/notice" => "HomeController@notice",
    "/welcome" => "HomeController@welcome",
    "/phpinfo" => "HomeController@phpinfo",
    "/book/add" => "BookController@add",
    "/book/index" => "BookController@index",
    "/book/detail" => "BookController@detail",
    "/book/shelf/index" => "ShelfController@index",
    "/category/list" => "CategoryController@index",
    "/shelf/list" => "ShelfController@ajaxList",
);
