$(function () {
    username = $("#username").val();

    panel =  $("#panel");


    /**
     * Function of Costumers
     */


    $("#buttonCustomer").on("click",function (e) {
        e.preventDefault();

        displayData('customers/panel',"");
    });

    panel.on("click","#listCustomer",function (e) {
        e.preventDefault();

        displayData('home/'+username+'/customers/list',"");
    });

    panel.on("click","#newCustomer",function (e) {
        e.preventDefault();

        displayData('home/'+username+'/customers/new',"");
    });

    panel.on("click","#homeCostumer",function (e) {
        e.preventDefault();

        displayData('customers/panel',"");
    });

    /**
     *     Function of Products
     */

    $("#buttonProduct").on("click",function (e) {
        e.preventDefault();

        displayData('product/panel',"");
    });

    panel.on("click","#listProduct",function (e) {
        e.preventDefault();

        displayData('home/'+username+'/products/list',"");
    });


    panel.on("click","#newProduct",function (e) {
        e.preventDefault();

        displayData('home/'+username+'/products/new',"");
    });

    panel.on("click","#homeProduct",function (e) {
        e.preventDefault();

        displayData('product/panel',"")
    });


    /**
     * Function Profile
     */

    $("#buttonProfile").on("click",function (e) {
       e.preventDefault();

       displayData('/home/profile/'+username,"");

    });

    /**
     * Function bills
     */

    $("#buttonBill").on("click",function (e) {
        e.preventDefault();

        displayData('bill/panel',"");
    });

    panel.on("click","#listBill",function (e) {
        e.preventDefault();

        displayData('home/'+username+'/bills/list',"")
    });

    panel.on("click","#newBill",function (e) {
        e.preventDefault();

        displayData('home/'+username+'/bills/new',cargarMultiSelect);
    });


    $("#products").on("change",function () {
        totalPrice();
    });

    $("#discount").on("change",function () {
        discountPrice();
    })
});


function displayData(ruta,param) {

    axios.get(ruta, {
    }).then(function (response) {
        $("#panel").html(response.data);
        if(typeof param === 'function'){
            param();
        }
    })
        .catch(function (error) {
            console.log(error);
            alert("EERRRORR")
        });
}



