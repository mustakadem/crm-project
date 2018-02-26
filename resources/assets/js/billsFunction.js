/**
 * Bills function
 */

function cargarMultiSelect(){
    let elementSelect= document.getElementById('products');
    multi(elementSelect , {
        ' enable_search ' :  true ,
        ' search_placeholder ' :  ' Search ... ' ,
        ' non_selected_header ' :  null ,
        ' selected_header ' :  null
    });
}

function totalPrice() {

    axios.post('/bill/price', {
        products: $("#products").val()
    }).then(function (response) {
        $("#price").val(response.data.total);
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