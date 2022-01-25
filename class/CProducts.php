<?php

class CProducts
{
    public function connectDB()
    {
        $conn = new mysqli("localhost",
            "root",
            "",
            "testdb");

        if ($conn->connect_error) {
            die("Ошибка:" . $conn->connect_error);
        }

        return $conn;
    }

    public function selectData($countData)
    {

        $query = sprintf('SELECT * FROM products WHERE VISIBILITY = 1 ORDER BY DATE_CREATE DESC LIMIT %d', $countData);

        if ($result = mysqli_query($this->connectDB(), $query)) {
            $rows = [];
            while ($products = mysqli_fetch_assoc($result)) {
                $rows [] = $products;
                /*echo "<pre>";
                var_dump($rows);
                echo "</pre>";*/
            }
        } else {
            echo "Ошибка: " . $this->connectDB()->error;
        }

        return $rows;


    }

    public function changeQuantity($quantity, $id){
       $conn = $this->connectDB();
        $query = sprintf('UPDATE Products SET PRODUCT_QUANTITY = %d WHERE ID=%d', $quantity, $id);

        return $conn->query($query);
    }

    public function hide($btnId){
        $conn = $this->connectDB();
        $query = sprintf('UPDATE Products SET VISIBILITY = 0 WHERE ID=%s', $btnId);
        return $conn->query($query);
    }
}