
$(function () {
     $("#username").on("change",function () {
             validateRegister("username","#username","#errorUsername");
     });

    $("#userEmail").on("change",function () {
        validateRegister('email',"#userEmail","#errorUserEmail");
    });

     $("#products").on("change",function () {
            totalPrice();
     });

    $("#discount").on("change",function () {
            discountPrice();
    })


});


function validateRegister(dato,selector,selectorDiv) {
//Se guarda en esta variable las cabeceras
    let headers = new Headers();

    headers.append("X-CSRF-TOKEN",$('meta[name="csrf-token"]').attr('content'));
    // Se guarda en esta variable los datos recogidos del formulario
    let form = new FormData();

    form.append(dato,$(selector).val());

    //Se guarda en la variable la configuracion de la llamada

    let configuration = {
        method: 'POST',
        headers: headers,
        body: form,
        credentials: "same-origin"
    };

    // Comienza la llamada

    fetch("/register/validate/"+dato,configuration).then(function (response){
        return response.json();
    }).then(function (data){
        console.log(dato);
        if (data[dato].length > 0) {
            $(selectorDiv).addClass("invalid-feedback").text(data[dato]);
            $(selector).removeClass("is-valid");
            $(selector).addClass("is-invalid");
        }else {
            $(selector).removeClass("is-invalid");
            $(selector).addClass("is-valid");
            $(selectorDiv).removeClass("invalid-feedback");
            $(selectorDiv).addClass("valid-feedback").text("Correct");
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
        $("#price").val(response.data);
        $("#total").val(response.data.total);
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