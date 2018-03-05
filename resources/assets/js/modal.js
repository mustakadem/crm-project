$(function () {
    $('#modalLogin').iziModal();
    $("#modalRegister").iziModal();

    $(document).on('click', '.login', function (event) {
        event.preventDefault();
        $('#modalLogin').iziModal('open', { zindex: 99999 });
    });
    $(document).on('click', '.register', function (event) {
        event.preventDefault();
        $('#modalRegister').iziModal('open', { zindex: 99999 });
    });

});

