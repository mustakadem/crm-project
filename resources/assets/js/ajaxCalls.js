
$(function () {
     $("#username").on("change",function () {
             validateRegister("username","#username","#errorUsername");
     });

    $("#emailRegister").on("change",function () {
        validateRegister('email',"#emailRegister","#errorUserEmail");
    });

    $("#passwordRegister").on("change",function () {
        validateRegister('password',"#passwordRegister","#errorUserPassword");
    });



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

    fetch('/user/new/validate/'+dato,configuration).then(function (response){
        return response.json();
    }).then(function (data){
        console.log(dato);
        if (data[dato].length > 0) {
            $(selectorDiv).addClass("invalid-feedback").text(data[dato]);
            $(selector).removeClass("is-valid");
            $(selector).addClass("is-invalid");
            // $(function () {
            //     $(selector).tooltip({'trigger':'focus', 'title': data[dato]});
            // });

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

