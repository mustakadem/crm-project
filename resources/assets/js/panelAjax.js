$(function () {
    username = $("#username").val();

    panel =  $("#panel");


    /**
     * Function of Costumers
     */


    panel.on("click","#listCustomer",function (e) {
        e.preventDefault();

        displayData('/home/' + username + '/customers/list', cargarTabla);

    });

    panel.on("click","#newCustomer",function (e) {
        e.preventDefault();

        displayData('/home/'+username+'/customers/new',validateCustomer);
    });


    /**
     *     Function of Products
     */


    panel.on("click","#listProduct",function (e) {
        e.preventDefault();

        displayData('/home/'+username+'/products/list',"");
    });


    panel.on("click","#newProduct",function (e) {
        e.preventDefault();

        displayData('/home/'+username+'/products/new',validateProduct);
    });

    /**
     * Function bills
     */

    panel.on("click","#listBill",function (e) {
        e.preventDefault();

        displayData('/home/'+username+'/bills/list',"")
    });

    panel.on("click","#newBill",function (e) {
        e.preventDefault();

        displayData('/home/'+username+'/bills/new',cargarFunciones);
    });








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




