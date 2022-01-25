<?php

//Подключение класса
require_once ('../class/CProducts.php');
// Обновление видимости товаров в таблице
$CProducts = new CProducts();
$conn = $CProducts->connectDB();

if(isset($_POST['visibility'])){
    $visibility = $_POST['visibility'];
    $query = sprintf('UPDATE Products SET VISIBILITY = 0 WHERE ID=%s', $visibility);

    if ($conn->query($query) === TRUE) {
        echo "Данные успешно обновлены";
    } else {
        echo "Ошибка: " . $conn->error;
    }
}

if(isset($_POST['quantity'], $_POST['id'])) {
    $quantity = $_POST['quantity'];
    $id = $_POST['id'];
    $query = sprintf('UPDATE Products SET PRODUCT_QUANTITY = %d WHERE ID=%d', $quantity, $id);
    if ($conn->query($query) === TRUE) {
        echo $quantity;
    } else {
        echo "Ошибка: " . $conn->error;
    }
}





