<?php



    // Запрос на добавление данных в базу данных
    /*$query = "INSERT INTO products (PRODUCT_ID,PRODUCT_NAME,PRODUCT_PRICE,PRODUCT_ARTICLE,PRODUCT_QUANTITY,DATE_CREATE)
                      VALUES (4, 'Товар 5', 600, 'Lorem Ipsum - это текст5', 4, NOW())";*/
require_once ('class/CProducts.php');

    function createTable()
    {

        $products = new CProducts();
        $data = $products->selectData();
        echo '<script src="/js/jquery-3.6.0.js"></script>';
        echo '<link rel="stylesheet" href="/css/style.css">';
        $table = '<table border="1" id="table" class="table" >
    <tr>
        <th>№ п/п</th>
        <th>ID товара</th>
        <th>Название товара</th>
        <th>Цена, руб.</th>
        <th>Описание</th>
        <th>Кол-во</th>
        <th>Дата добавления</th>
        <th>Видимость</th>
    </tr>';

        foreach ($data as $item) {
            $table .= sprintf('
   <tr style="text-align: center;" id="row">
       <td id="id">%d</td>
       <td>%d</td>
       <td>%s</td>
       <td>%d</td>
       <td class="description">%s</td>
       <td id="quantity"><button data-id="%d" id="minus">-</button>%d<button id="plus" data-id="%d">+</button></td>
       <td>%s</td>
       <td><button type="button" class="hideRow" id="hideRow">Скрыть</button></td>
   </tr>',
                $item['ID'],
                $item['PRODUCT_ID'],
                $item['PRODUCT_NAME'],
                $item['PRODUCT_PRICE'],
                $item['PRODUCT_ARTICLE'],
                $item['ID'],
                $item['PRODUCT_QUANTITY'],
                $item['ID'],
                $item['DATE_CREATE']);
                }

        echo $table;

        echo '<script src="/js/script.js"></script>';


    }

    createTable();








