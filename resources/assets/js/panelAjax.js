$(function () {
    username = $("#username").val();

    panel =  $("#panel");


    /**
     * Function of Costumers
     */


    $("#buttonCustomer").on("click",function (e) {
        e.preventDefault();

        displayData('customers/panel');
    });

    panel.on("click","#listCustomer",function (e) {
        e.preventDefault();

        displayData('home/'+username+'/customers/list');
    });

    panel.on("click","#newCustomer",function (e) {
        e.preventDefault();

        displayData('home/'+username+'/customers/new');
    });

    panel.on("click","#homeCostumer",function (e) {
        e.preventDefault();

        displayData('customers/panel');
    });

    /**
     *     Function of Products
     */

    $("#buttonProduct").on("click",function (e) {
        e.preventDefault();

        displayData('product/panel');
    });

    panel.on("click","#listProduct",function (e) {
        e.preventDefault();

        displayData('home/'+username+'/products/list');
    });


    panel.on("click","#newProduct",function (e) {
        e.preventDefault();

        displayData('home/'+username+'/products/new');
    });

    panel.on("click","#homeProduct",function (e) {
        e.preventDefault();

        displayData('product/panel')
    });

    /**
     * Function bills
     */

    $("#buttonBill").on("click",function (e) {
        e.preventDefault();

        displayData('bill/panel');
    });

    panel.on("click","#listBill",function (e) {
        e.preventDefault();

        displayData('home/'+username+'/bills/list')
    });

    panel.on("click","#newBill",function (e) {
        e.preventDefault();

        displayData('home/'+username+'/bills/new');
    });
});


function displayData(ruta) {
    axios.get(ruta, {
    }).then(function (response) {
        $("#panel").html(response.data);
    })
        .catch(function (error) {
            console.log(error);
            alert("EERRRORR")
        });
}