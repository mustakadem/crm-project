

$(function () {
     $("#username").on("change",function () {
         //
         //     //Se guarda en esta variable las cabeceras
         //     let headers = new Headers();
         //
         //     headers.append("X-CSRF-TOKEN",$('meta[name="csrf-token"]').attr('content'));
         //     headers.append("X-XSRF-TOKEN",$('meta[name="csrf-token"]').attr('content'));
         //     // Se guarda en esta variable los datos recogidos del formulario
         //     let form = new FormData();
         //
         //     form.append("username",$("#username").val());
         //
         //     //Se guarda en la variable la configuracion de la llamada
         //
         //     let configuration = {
         //         method: 'POST',
         //         headers: headers,
         //         body: form,
         //         credential: "same-origin"
         //     };
         //
         //     // Comienza la llamada
         //
         //     fetch("/register/username",configuration).then(function (response){
         //         return response.json()
         //     }).then(function (data) {
         //         $("#username").append("<span class=\"help-block\">"+
         //             "<strong id=\"errorName\">"+data.name+"</strong>"+
         //         "</span>")
         //     }).catch(function (err) {
         //         console.log(err);
         //         alert("EERRROOR");
         //     });
         // });

         axios.post('/register/username', {
             name: $("#username").val()
         }).then(function (response) {
             $("#username").append("<span class=\"help-block\">" +
                 "<strong id=\"errorName\">" + response.data.username + "</strong></span>")
         })
             .catch(function (error) {
                 console.log(error);
                 alert("EERRRORR")
             });
     });
});