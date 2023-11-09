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
                $this->view->response(['No hay categorias'],400);
            }

        }

        public function updateCategory($params = []) {
            // Obtener datos del cuerpo de la solicitud
            $body = $this->getData();
        
            // Verificar si los campos requeridos se han proporcionado
            if (empty($body->name) || empty($body->season) || empty($params[':ID'])) {
                $this->view->response(['Completa los campos requeridos.'], 400);
                return;
            }
        
            // Obtener el ID del parámetro de la URL
            $id = $params[':ID'];
        
            // Realizar la actualización en la base de datos
            $name = $body->name;
            $season = $body->season;
            $result = $this->model->modifyCategory($id, $name, $season);
        
            if($result) {
                $this->view->response(['Se actualizó correctamente con el id = ' . $id], 200);
            }else{
                $this->view->response(['No se encontró una categoría con el ID proporcionado'], 404);
            }
        }
    }
