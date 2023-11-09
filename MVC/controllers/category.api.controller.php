<?php

    require_once './MVC/models/category.api.model.php';
    require_once './MVC/controllers/api.controller.php';

    class CategoryApiController extends ApiController{
        
        private $model;
     

        function __construct(){
            $this->model= new CategoryModel();
            parent::__construct();
        }

        public function addCategory(){
            $body=$this->getData();
            $name=$body->name;
            $season=$body->season;
            $id = $this->model->insertCategory($name,$season);
            $this->view->response(['Se inserto correctamente con el id = '.$id],201);
        }

        public function getCategoryId($params=[]){
            $data=$this->model->getCategory($params[':ID']);
            if(!empty($data)){
                $this->view->response($data,200);
            }else{
                $this->view->response(['No existe la categoria'],404);
            }  
        }   

        // public function getAll(){
        //     $order = $this->getOrder();
            
        // }

        // public function getOrder(){
        //     if($_GET['sort']){
        //         $sort=$_GET['sort'];
        //     }else{
        //         $sort='ASC'
        //     }
            
        // }

        public function getAll(){
            $categories=$this->model->getAll();
            if(!empty($categories)){
                $this->view->response($categories,200);
            }else{
                $this->view->response(['No hat categorias'],400);
            }
           

        }
    }
