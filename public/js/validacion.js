

$(function () {
     $("#username").on("change",function () {

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
                     $("#errorUsername").text(data.username).attr("class", "help-block");
                     $("#divUsername").attr("class", "form-group has-error");
                 }else {
                     $("#divUsername").attr("class", "form-group has-success");
                     $("#errorUsername").text("Correct").attr("class", "help-block");
                 }
             }).catch(function (err) {
                 console.log(err);
                 alert("EERRROOR");
             });
         });

         // axios.post('/register/username', {
         //     username: $("#username").val()
         // }).then(function (response) {
         //     $("#username").append("<span class=\"help-block\">" +
         //         "<strong id=\"errorName\">" + response.data.username + "</strong></span>")
         // })
         //     .catch(function (error) {
         //         console.log(error);
         //         alert("EERRRORR")
         //     });
   //  });



});