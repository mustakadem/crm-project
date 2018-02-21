$(function () {
    username = $("#username").val();



    $("#buttonCustomer").on("click",function (event) {
        event.preventDefault();

        displayData('customers/panel');
    });

    $("#listCustomer").on("click",function (event) {
        event.preventDefault();

        displayData('home/'+username+'/customers/list');
    });

    $("#newCustomer").on("click",function (event) {
        event.preventDefault();

        displayData('home/'+username+'/customers/new');
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