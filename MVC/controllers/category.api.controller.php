<?php

require_once './MVC/models/category.api.model.php';
require_once './MVC/controllers/api.controller.php';

class CategoryApiController extends ApiController
{

    private $model;


    function __construct()
    {
        $this->model = new CategoryModel();
        parent::__construct();
    }

    public function addCategory()
    {
        $body = $this->getData();
        $name = $body->name;
        $season = $body->season;
        $id = $this->model->insertCategory($name, $season);
        $this->view->response(['Se inserto correctamente con el id = ' . $id], 201);
    }

    public function getCategoryId($params = [])
    {
        $data = $this->model->getCategory($params[':ID']);
        if (!empty($data)) {
            $this->view->response($data, 200);
        } else {
            $this->view->response(['No existe la categoria'], 404);
        }
    }

    public function getAll()
    {
        $categories = $this->model->getAll();
        if (!empty($categories)) {
            $this->view->response($categories, 200);
        } else {
            $this->view->response(['No hay categorias'], 400);
        }
    }

    public function updateCategory($params = [])
    {
        $id = $params[':ID'];
        $category = $this->model->getCategory($id);

        if ($category) {
            $body = $this->getData();
            $name = $body->name;
            $season = $body->season;

            $this->model->updateCategory($name, $season, $id);
            $this->view->response(['Se actualizó correctamente con el id = ' . $id], 200);
        } else {
            $this->view->response(['No se encontró una categoría con el ID proporcionado'], 404);
        }
    }
    public function get($params = []){

        if (empty($params)) {
            // Verifica si se solicita paginación
            $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Página actual
            $per_page = isset($_GET['per_page']) ? intval($_GET['per_page']) : 10; // Elementos por página
            $sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'ID';
            $order = isset($_GET['order']) ? $_GET['order'] : 'asc';

            if (($order == 'ASC' || $order == 'DESC') && ($sort_by == 'ID' || $sort_by == 'name' || $sort_by == 'season')) {
                $categories = $this->model->getCategoryPaginados($sort_by, $order, $page, $per_page);
                return $this->view->response($categories, 200);
            } else {
                return $this->view->response(['Complete los campos'],400);
            }
        } else {
            $category = $this->model->getCategory($params[':ID']);
            if (!empty($category)) {
                return $this->view->response($category, 200);
            } else {
                return $this->view->response(['No existe la categoria con id = ' . $params[':ID']], 404);
            }
        }
    }
}
