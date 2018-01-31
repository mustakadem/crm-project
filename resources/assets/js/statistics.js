$(function () {


    let username= $("#username").val();


     axios.get('/statistics?name='+username, {
        }).then(function (response) {
         let staticUser = $("#staticUser");

         //Se guarda en la variable la configuracion de la llamada

         let barChart = new Chart(staticUser, {
             type: 'bar',
             data: {
                 labels: ["Customers Create", "Product Create"],
                 datasets: [{
                     label: 'Activity',
                     data: [response.data.customers,response.data.products],
                     backgroundColor: [
                         'rgba(255, 99, 132, 0.6)',
                         'rgba(54, 162, 235, 0.6)',
                     ]
                 }]
             }
         });
        })
            .catch(function (error) {
                console.log(error);
                alert("EERRRORR")
            });





});