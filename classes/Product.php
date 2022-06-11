<?php


class Product{

    private $db;

    public function __construct()
    {
        $this->db = new DB();   
    }

    public function index(){
        
        $data = $this->db->getAll();
        include 'views/index.php';
    }


    public function create(){
        include 'views/create.php';
    }

    public function store(){
        $name = $_POST['name'];
        $price = $_POST['price'];

        $sql = "INSERT INTO products(`name`,`price`) VALUES(?,?)";
        $this->db->insert($sql,[$name,$price]);

        header("location:".URL."index");
        die;

    }


    public function edit($id){
        $sql = "SELECT * FROM `products` WHERE `id`=? ";
        $row = $this->db->getOne($sql,[$id]);
        include 'views/edit.php';
    }


    public function update($id){
        $name = $_POST['name'];
        $price = $_POST['price'];

        $sql = "UPDATE  `products` SET `name`=?,`price`=? WHERE `id`=? ";
        $this->db->update($sql,[$name,$price,$id]);
        header("location:".URL."index");
        die;
    }



    public function delete($id){
        $sql = "DELETE FROM  `products`  WHERE `id`=? ";
        $this->db->delete($sql,[$id]);
        header("location:".URL."index");
        die;
    }

}