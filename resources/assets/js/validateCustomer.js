function validateCustomer() {
    $("#name").on("change",function () {
        validateData("name","#name","#errorName");
    });
    $("#surnames").on("change",function () {
        validateData("surnames","#surnames","#errorSurnames");
    });
    $("#email").on("change",function () {
        validateData("email","#email","#errorEmail");
    });
    $("#address").on("change",function () {
        validateData("address","#address","#errorAddress");
    });
    $("#movil").on("change",function () {
        validateData("movil","#movil","#errorMovil");
    });
    $("#job_title").on("change",function () {
        validateData("job_title","#job_title","#errorJob_title");
    });
    $("#company").on("change",function () {
        validateData("company","#company","#errorCompany");
    });
    $("#type_customer").on("change",function () {
        validateData("type_customer","#type_customer","#errorType_customer");
    });


}

function validateData(dato,selector,selectorDiv) {
    let formData = new FormData();
    formData.append(dato,$(selector).val());

    axios.post("/customer/new/validate/"+dato, formData)
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
    return !!($("#name").hasClass('is-valid') && $("#surnames").hasClass('is-valid') && $("#email").hasClass('is-valid')
        && $("#address").hasClass('is-valid') && $("#movil").hasClass('is-valid') && $("#job_title").hasClass('is-valid')
        && $("#company").hasClass('is-valid'));
}