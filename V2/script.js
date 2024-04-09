$(document).ready(function () {
    $('form').hide();
    AfficherProduits();
    console.log('test')
    $('.addProduct').click(function (e) { 
       $('table').hide();
        $('form').show();
    });
});

function AfficherProduits() {
    $.ajax({
        url: "http://localhost/CRUD_PHP_nat/V2/WS/WS.php",
        dataType: "json",
        success: function (data) {
            console.log('il y a ' + data.length + ' produits');
            console.log(data);
            for (let i = 0; i < data.length; i++) {
                let content = "<tr> <td>" + data[i].id + "</td> <td>" + data[i].name + "</td> <td>" + data[i].description + "</td> <td>" + data[i].price + "</td> <td> <a href=''><i class='fa-regular fa-trash-can fa-2xl'></i></a> </td> </tr>";
                let updateIcon = ""
                let deleteIcon = "<a href=''><i class='fa-regular fa-trash-can fa-2xl'></i></a>"
                $('tbody').append(content);
            }
        }
    });
}
function AfficherProduit() {
    $.ajax({
        url: "http://localhost/CRUD_PHP_nat/V2/WS/WS.php",
        dataType: "json",
        success: function (data) {
            console.log('il y a ' + data.length + ' produits');
            console.log(data);
            for (let i = 0; i < data.length; i++) {
                let content = "<tr> <td>" + data[i].id + "</td> <td>" + data[i].name + "</td> <td>" + data[i].description + "</td> <td>" + data[i].price + "</td> <td> <a href=''><i class='fa-regular fa-trash-can fa-2xl'></i></a> </td> </tr>";
                $('tbody').append(content);
            }
        }
    });
}