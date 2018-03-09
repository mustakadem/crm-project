$(function () {
    username = $("#username").val();

    panel =  $("#panel");


    /**
     * Function of Costumers
     */


    panel.on("click","#newCustomer",function (e) {
        e.preventDefault();

        displayData('/home/'+username+'/customers/new',validateCustomer);
    });


    /**
     *     Function of Products
     */




    panel.on("click","#newProduct",function (e) {
        e.preventDefault();

        displayData('/home/'+username+'/products/new',validateProduct);
    });

    /**
     * Function bills
     */

    panel.on("click","#newBill",function (e) {
        e.preventDefault();

        displayData('/home/'+username+'/bills/new',cargarFunciones);
    });

    /**
     * Function Contacts
     */

    panel.on("click","#newContact",function (e) {
        e.preventDefault();

        displayData('/home/'+username+'/contacts/new',validateContact);
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




