function validateProduct() {
    $("#name").on("change",function () {
        validateData("name","#name","#errorName","#labelName");
    });
    $("#image").on("change",function () {
        validateData("image","#image","#errorImage","#labelImage");
    });
    $("#price").on("change",function () {
        validateData("price","#price","#errorPrice","#labelPrice");
    });
    $("#type_product").on("change",function () {
        validateData("type_product","#type_product","#errorType_product","#labelType_product");
    });
    $("#description").on("change",function () {
        validateData("description","#description","#errorDescription","#labelDescription");
    });


}

function validateData(dato,selector,selectorDiv,selectorLabel) {
    let formData = new FormData();
    formData.append(dato,$(selector).val());

    axios.post("/product/new/validate/"+dato, formData)
        .then(function (response) {
            console.log(response);
            if (response.data[dato].length > 0) {
                $(selectorDiv).addClass("invalid-feedback").text(response.data[dato]);
                $(selector).removeClass("is-valid");
                $(selector).addClass("is-invalid");
                if (!isDisabled()){
                    $("#buttonForm").attr('disabled');
                }
            }else {
                $(selector).removeClass("is-invalid");
                $(selector).addClass("is-valid");
                $(selectorDiv).removeClass("invalid-feedback");
                $(selectorDiv).addClass("valid-feedback").text("Correct");
                $(selectorLabel).remove();
                if (isDisabled()){
                    $("#buttonForm").removeAttr('disabled');
                }
            }
        })
        .catch(function (error) {
            console.log(error);
            alert("EERRRORR")
        });
}

function isDisabled() {
    return !!($("#name").hasClass('is-valid') && $("#image").hasClass('is-valid') && $("#price").hasClass('is-valid')
        && $("#type_product").hasClass('is-valid') && $("#description").hasClass('is-valid'));
}