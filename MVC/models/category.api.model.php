<?php
    require_once 'config.php';

    class CategoryModel {
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
        }


        public function getCategory($id){ // obtengo una categoria por
            $query=$this->db->prepare('SELECT * FROM category WHERE id=?');
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function insertCategory($name,$season){ // inserto una categoria
            $query=$this->db->prepare('INSERT INTO category (name, season) VALUES (?,?)');
            $query->execute([$name,$season]);
            return $this->db->lastInsertId();
        }

        public function getAll(){ // obtengo todas las categorias
            $query=$this->db->prepare('SELECT * FROM category');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function updateCategory($name,$season,$id){ //modifico una categoria por su id
            $query=$this->db->prepare('UPDATE category SET name=?, season=? WHERE id=?');
            $query->execute([$name,$season,$id]);
        }
        public function getCategoryPaginados($sort_by, $order, $page, $per_page) {
            // Asegúrate de que $sort_by sea un nombre de columna válido y seguro.
            // Asegúrate de que $order sea "ASC" o "DESC" para la dirección de orden.
    
            // Calcula el límite y el desplazamiento para la paginación
            $limit = $per_page;
            $offset = ($page - 1) * $per_page;
        
            // Construye la consulta SQL con el nombre de la columna y la dirección de orden, además de la paginación.
            $query = $this->db->prepare("SELECT * FROM category ORDER BY $sort_by $order LIMIT $limit OFFSET $offset");
            $query->execute();
            $resultado=$query->fetchAll(PDO::FETCH_OBJ);
            return $resultado;
        }
    }