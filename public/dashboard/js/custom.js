$(document).ready(function() {


    var userFeed = new Instafeed({
        get: 'user',
        userId: '2694516816',
        limit: 15,
        resolution: 'standard_resolution',
        accessToken: '2694516816.1677ed0.61f19e3e2a5d4aeebe93ce883e61d4a2',
        sortBy: 'most-recent',
        template: '<div class="col-lg-4 instaimg"><a href="{{image}}" title="{{caption}}" target="_blank"><img src="{{image}}" alt="{{caption}}" class="img-fluid"/></a></div>',
    });


    userFeed.run();

    
    // This will create a single gallery from all elements that have class "gallery-item"
    $('.gallery').magnificPopup({
        type: 'image',
        delegate: 'a',
        gallery: {
            enabled: true
        }
    });


});