$(document).ready(function() {
    $('#fullpage').fullpage({
        scrollingSpeed:1000,
        loopTop: true,
        loopBottom: true,
        navigation: true,
        fixedElements: '#nav',
        sectionsColor: ['#11c392', '#3aa5be','#007052','#4587c3']
    });
});