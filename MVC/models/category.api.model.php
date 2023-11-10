<?php
    require_once 'config.php';

    class CategoryModel {
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host='. MYSQL_HOST .';dbname='. MYSQL_DB .';charset=utf8', MYSQL_USER, MYSQL_PASS);
        }


        public function getCategory($id){
            $query=$this->db->prepare('SELECT * FROM category WHERE id=?');
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

        public function insertCategory($name,$season){
            $query=$this->db->prepare('INSERT INTO category (name, season) VALUES (?,?)');
            $query->execute([$name,$season]);
            return $this->db->lastInsertId();
        }

        public function getAll(){
            $query=$this->db->prepare('SELECT * FROM category');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        public function updateCategory($name,$season,$id){
            $query=$this->db->prepare('UPDATE category SET name=?, season=? WHERE id=?');
            $query->execute([$name,$season,$id]);
        }
    }