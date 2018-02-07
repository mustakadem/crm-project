

$(function () {
     $("#username").on("change",function () {
             validateRegister();
     });

     $("#products").on("change",function () {
            totalPrice();
     });

    $("#discount").on("click",function () {
            discountPrice();
    })


});


function validateRegister() {
//Se guarda en esta variable las cabeceras
    let headers = new Headers();

    headers.append("X-CSRF-TOKEN",$('meta[name="csrf-token"]').attr('content'));
    // Se guarda en esta variable los datos recogidos del formulario
    let form = new FormData();

    form.append("username",$("#username").val());

    //Se guarda en la variable la configuracion de la llamada

    let configuration = {
        method: 'POST',
        headers: headers,
        body: form,
        credentials: "same-origin"
    };

    // Comienza la llamada

    fetch("/register/validate",configuration).then(function (response){
        return response.json()
    }).then(function (data) {
        if (data.username.length > 0) {
            $("#errorUsername").text(data.username).addClass("form-control-feedback");
            $("#username").addClass("form-control form-control-danger");
            $("#divUsername").addClass("form-group row has-danger");
        }else {
            $("#divUsername").attr("class", "form-group is-valid");
            $("#errorUsername").text("Correct").attr("class", "valid-feedback");
        }
    }).catch(function (err) {
        console.log(err);
        alert("EERRROOR");
    });
}

function totalPrice() {

    axios.post('/bill/price', {
        products: $("#products").val()
    }).then(function (response) {
        $("#price").val(response.data.total)
    })
        .catch(function (error) {
            console.log(error);
            alert("EERRRORR")
        });
}

function discountPrice() {
   let  total= $("#price").val() - $("#discount").val();

   $("#total").val(total);
}