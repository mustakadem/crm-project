function validateContact() {
    $("#name").on("change",function () {
        validateData("name","#name","#errorName","#lableName");
    });
    $("#surnames").on("change",function () {
        validateData("surnames","#surnames","#errorSurnames","#lableSurnames");
    });
    $("#email").on("change",function () {
        validateData("email","#email","#errorEmail","#lableEmail");
    });
    $("#address").on("change",function () {
        validateData("address","#address","#errorAddress","#lableAddress");
    });
    $("#movil").on("change",function () {
        validateData("movil","#movil","#errorMovil","#lableMovil");
    });



}

function validateData(dato,selector,selectorDiv,selectorLabel) {
    let formData = new FormData();
    formData.append(dato,$(selector).val());

    axios.post("/contact/new/validate/"+dato, formData)
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
    return !!($("#name").hasClass('is-valid') && $("#surnames").hasClass('is-valid') && $("#email").hasClass('is-valid')
        && $("#address").hasClass('is-valid') && $("#movil").hasClass('is-valid')) ;
}