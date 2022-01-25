let btn = document.querySelectorAll("#hideRow");
let ids = document.querySelectorAll('#id');

btn.forEach(function (item,i , arr){
    item.addEventListener('click', function (){
        //Удаление товара
        let rows = document.querySelectorAll('#row');
        rows[i].style.display = 'none';

        //Отправка аякса
        $.ajax({
            url: 'ajax/update.php',
            method: 'POST',
            dataType: 'text',
            data: {'visibility': ids[i].innerText},
            success: function(data){
                console.log(data);
            },
            error:function(){
                console.log('Ошибка!');
            }
        });
    });
})

//Измениние количество товаров
let quas = document.querySelectorAll('#quantity');
let btnsMinus = document.querySelectorAll('#minus');
let btnsPlus = document.querySelectorAll('#plus');

quas.forEach(function(item, i){
    let num;
    num = quas[i].innerText.replace(/[- +]/g, '');
    $(btnsMinus[i]).click(function(){
        let id = $(this).attr("data-id");
        num--;
        $.ajax({
            url: 'ajax/update.php',
            method: 'POST',
            dataType: 'text',
            data: {
                'quantity': num,
                'id': id
            },
            success: function(data){
                $(quas[i]).html(btnsMinus[i].outerHTML + data + btnsPlus[i].outerHTML);
                window.location.reload();
            },
            error:function(){
                console.log('Ошибка!');
            }
        });
    })

    $(btnsPlus[i]).click(function(){
        num++;
        let id = $(this).attr("data-id");
        $.ajax({
            url: 'ajax/update.php',
            method: 'POST',
            dataType: 'text',
            data: {
                'quantity': num,
                'id': id
            },
            success: function(data){
                $(quas[i]).html(btnsMinus[i].outerHTML + data + btnsPlus[i].outerHTML);
                window.location.reload()
            },
            error:function(){
                console.log('Ошибка!');
            }
        });
    })
})





