/**
 * Bills function
 */
function cargarFunciones() {

    cargarMultiSelect();
    totalPrice();
    discountPrice();
    validateBill();

}
function cargarMultiSelect(){
    let elementSelect= document.getElementById('products');
    multi(elementSelect , {
        ' enable_search ' :  true ,
        ' search_placeholder ' :  ' Search ... ' ,
        ' non_selected_header ' :  null ,
        ' selected_header ' :  null
    });
    $(elementSelect).on("change",function () {
        totalPrice();
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
    panel.on("change","#discount",function () {

        let  total= $("#price").val() - $("#discount").val();

        $("#total").val(total);
    });

}

function validateBill() {
    let products =$('#products');


        let formData = new FormData();
        formData.append('products', products.val());

        console.log(formData);
        axios.post("/bill/new/validate", formData)
            .then(function (response) {
                console.log(response);
                if (response.data['products'].length > 0) {
                    $('#errorProduct').addClass("invalid-feedback").text(response.data['products']);
                    products.removeClass("is-valid");
                    products.addClass("is-invalid");
                    if (products.hasClass('is-invalid')) {
                        $("#buttonForm").attr('disabled');
                    }
                } else {
                    products.removeClass("is-invalid");
                    products.addClass("is-valid");
                    $('#errorProduct').removeClass("invalid-feedback");
                    $('#errorProduct').addClass("valid-feedback").text("Correct");
                    $('#labelProduct').remove();
                    if (products.hasClass('is-valid')) {
                        $("#buttonForm").removeAttr('disabled');
                    }
                }
            })
            .catch(function (error) {
                console.log(error);
                alert("EERRRORR")
            });




}