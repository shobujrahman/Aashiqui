$(document).ready(function () {
    $("#video_type").change(function () {
        var type = $("#video_type").val();

        if (type == "others") {
            $("#videoUrl").hide(1000);
            $("#uploadVideo").show(1000);
        }

        else {
            $("#videoUrl").show(1000);
            $("#uploadVideo").hide(1000);
        }


    });

    $(window).on('load', function () {
        var type = $("#video_type").val();

        if (type == 6) {
            $("#url").show(1000);
            $("#upload_video").hide(1000);
        }
        if (type == 5) {
            $("#url").show(1000);
            $("#upload_video").hide(1000);
        }
        if (type == 4) {
            $("#url").show(1000);
            $("#upload_video").hide(1000);
        }
        if (type == 3) {
            $("#url").show(1000);
            $("#upload_video").hide(1000);
        }
        if (type == 2) {
            $("#url").show(1000);
            $("#upload_video").hide(1000);
        }
        if (type == 1) {
            $("#url").show(1000);
            $("#upload_video").hide(1000);
        }
        if (type == 7) {
            $("#url").hide(1000);
            $("#upload_video").show(1000);
        }
    });

});

//fake streaming
$(document).ready(function () {
    $("#type").change(function () {
        var type = $("#type").val();

        if (type == "Others") {
            $("#url").hide(1000);
            $("#upload_video").show(1000);
        }

        else {
            $("#url").show(1000);
            $("#upload_video").hide(1000);
        }


    });

    $(window).on('load', function () {
        var type = $("#video_type").val();

        if (type == 6) {
            $("#url").show(1000);
            $("#upload_video").hide(1000);
        }
        else {
            $("#upload_video").show(1000);
            $("#url").hide(1000);
        }
    });

});