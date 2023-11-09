<?php
    require_once './libs/router.php';
    require_once './config.php';
    require_once './MVC/controllers/category.api.controller.php';

    //creo el router
    $router = new Router();

    //defino la tabla  endpoint    verbo        controller          metodo
   
    $router->addRoute('category','POST','CategoryApiController','addCategory');
    $router->addRoute('category/:ID','GET','CategoryApiController','getCategoryId');
    $router->addRoute('category','GET','CategoryApiController','getAll');
    $router->addRoute('category/:ID','PUT','CategoryApiController','modifyCategory');



    //rutea
    $router->route($_GET["resource"],$_SERVER['REQUEST_METHOD']);