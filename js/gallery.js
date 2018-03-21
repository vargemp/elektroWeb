(function($) {
    var History = window.History;
    jQuery.support.cors = true;
    jQuery.ajaxSetup({
        beforeSend: function() {
            $('.loader').show();
        },
        complete: function(){
            $('.loader').hide();
        }
    });
    function processState(state) {
        if('album' in state.data) {
            $.fancybox.close();
            facebookAlbumImages(state.data.album);
        } else if('image' in state.data) {
            // get the album id
            $.getJSON('https://graph.facebook.com/' + state.data.image, function(response) {
                var re = /a\.([0-9]+)\./g;
                facebookAlbumImages(re.exec(response.link)[1]);
            });
        } else {
            facebookAlbums(1942653579280439);
        }
    }
    // Bind to StateChange Event
    History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
        var state = History.getState(); // Note: We are using History.getState() instead of event.state
        processState(state);
    });
    function facebookAlbumImages(albumID) {
        $.getJSON('https://graph.facebook.com/' + albumID + '/photos?callback=?', function(response) {
            var data = response.data;
            if(!('image' in History.getState().data)) {
                History.pushState({album:albumID}, null, "?album=" + albumID);
            }
            $("#facebookPhotoGallery").html("<div id='facebookImages'></div>");
            $.each(data, function(index, imageData) {
                var thumb = imageData.images[5];
                $("#facebookImages").append("<div class='facebookImgThumb " + imageData.id + "'><a href='" + imageData.source + "' title='' class='fancybox' rel='facebookGalleryImages'><i style='background-image: url(" + thumb.source + ")'></i></a></div>");
            });
        });
    }
    $(document).on("click", ".facebookImgThumb > a.fancybox", function() {
        var imageID = $(this).parent().attr("class").split(" ")[1];
        History.pushState({image:imageID}, null, "?image=" + imageID);
    });
    function facebookAlbums(oID) {
        $.getJSON('https://graph.facebook.com/' + oID + '/albums?callback=?', function(response) {
            console.log("working?");
            var data = response.data;
            $("#facebookPhotoGallery").html("<div id='facebookAlbums'></div>");
            $.each(data, function(index, val) {
                if('cover_photo' in val) {
                    $.getJSON('https://graph.facebook.com/' + val.cover_photo + '?callback=?', function(responsePicture) {
                        // calculate size
                        var image = responsePicture.images[5];
                        $("#facebookAlbums").append("<div class='facebookImgThumb " + val.id + "'><i style='background-image: url(" + image.source + ")'></i><p>" + val.name + "</p></div>");
                    });
                }
            });
        }).error(function(jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            });
        $(document).on("click", ".facebookImgThumb", function() {
            $(document).off("click", ".facebookImgThumb");
            var albumID = $(this).attr("class").split(" ")[1];
            History.pushState({album:albumID}, null, "?album=" + albumID);
        });
    }
    $(".fancybox").fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        afterClose: function() {
            console.log("Going back!");
            History.back();
        }
    });
    processState(History.getState());
})(jQuery);