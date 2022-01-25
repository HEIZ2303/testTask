<?php

class CProducts
{
    public function connectDB(){
        $conn = new mysqli("localhost",
            "root",
            "",
            "testdb");

        if($conn->connect_error){
            die("Ошибка:" . $conn->connect_error);
        }

        return $conn;
    }

    public function selectData(){

        $query = "SELECT * FROM products WHERE VISIBILITY = 1 ORDER BY DATE_CREATE DESC";

        if($result = mysqli_query($this->connectDB(), $query)){
            $rows = [];
            while ($products = mysqli_fetch_assoc($result)){
                $rows [] = $products;
                /*echo "<pre>";
                var_dump($rows);
                echo "</pre>";*/
            }
        } else{
            echo "Ошибка: " . $this->connectDB()->error;
        }

        return $rows;
    }
}