$(function () {
    let cont=0;
    let res = 0;

    if ($("#username").val() !== ""){
        cont++;

    }
    if ($("#name").val() !== ""){
        cont++
        alert("entro 2");

    }
    if ($("#surnames").val() !== ""){
        cont++
        alert("entro 3");

    }
    if ($("#email").val() !== ""){
        cont++
        console.log("entro 4");

    }
    if ($("#movil").val() !== ""){
        cont++
    }
    if ($("#sector").val() !== ""){
        cont++
    }
    if ($("#website").val() !== ""){
        cont++
    }



    res = (cont / 7)*100;

    let barra = $("#progressUserData");

    if (res <= 15){
        barra.attr("aria-valuenow","25");
        barra.css('width',"");
        barra.css('width',"25%");
        barra.text('25%');
    }else if (res <= 50){
        barra.attr("aria-valuenow","50");
        barra.css('width',"");
        barra.css('width',"50%");
        barra.text('50%');
    }else if(res <= 75){
        barra.attr("aria-valuenow","75");
        barra.css('width',"");
        barra.css('width',"75%");
        barra.text('75%');
    }else if (res > 75){
        barra.attr("aria-valuenow","100");
        barra.css('width',"");
        barra.css('width',"100%");
        barra.text('100%');    }

});