// flash_cards.js

var soundSuccess = document.createElement('audio');
var soundFailure = document.createElement('audio');
soundSuccess.setAttribute('src', '/sounds/success.mp3');
soundFailure.setAttribute('src', '/sounds/failure_02.wav');

$("[id^=card_option]").css('cursor', 'pointer');

$("[id^=card_option]").click(function() {

    var _token = $("input[name='_token']").val();
    var button_id = this.id;
    var button_id_array = button_id.split('_');
    var term_id = button_id_array[2];
    var language_id = button_id_array[3];
    var vocabulary_id = button_id_array[4];

    $.ajax({
        type: "POST",
        url: '/vocabulary/verify',
        data: { _token:_token, term_id: term_id, language_id: language_id, vocabulary_id: vocabulary_id },
        success: function( msg ) {
            var msg_text = msg.msg;
            $('#modal_popup_background').show(); // Get the modal
            $('#modal_popup_button').click(function() {
                location.reload();
            });
            if (msg_text == 'true') {
                soundSuccess.play();
                $('#modal_popup_message').css('color', 'green');
                $('#modal_popup_message').text('Your answer is correct!');
            } else if (msg_text == 'false') {
                soundFailure.play();
                $('#modal_popup_message').css('color', 'red');
                $('#modal_popup_message').text('Your answer is incorrect.');
            }
        }
    });
});

$('.delete_confirm').click(function() {
    return window.confirm("Are you sure?");
});

$('.delete_confirm_voc').click(function() {
    return window.confirm("Are you sure?");
});

$("[id^=language_switch]").click(function() {

    var button_id = this.id;
    var button_id_array = button_id.split('_');
    var language_id = button_id_array[2];
    $.ajax({
        type: "GET",
        url: '/languages/switch_enabled/' + language_id,
        success: function( msg ) {
            location.reload();
        }
    });
});

$("[id^=expand_collapse_button]").click(function() {
    var button_id = this.id;
    var button_id_array = button_id.split('_');
    var id_number = button_id_array[3];
    if ($('#expand_collapse_area_' + id_number).css('display') == 'none')
    {
        $('#expand_collapse_area_' + id_number).css('display', 'block');
        $('#expand_collapse_span_' + id_number).text('▼');
    }
    else if ($('#expand_collapse_area_' + id_number).css('display') == 'block')
    {
        $('#expand_collapse_area_' + id_number).css('display', 'none');
        $('#expand_collapse_span_' + id_number).text('►');
    }
});

$('#history_back').click(function() {
    window.history.back();
});

$('#search_field').focus();
var tmpStr = $('#search_field').val();
$('#search_field').val('');
$('#search_field').val(tmpStr);

$('#search_field').keyup(function(e) {
    switch (e.which) {
        case 37:
        case 39:
        case 16:
            break;
        default:
            onChangeSearchBox(this.value);
    }
});

onChangeSearchBox = function(keyword) {
    $("#search_results").load('/vocabulary/search/' + keyword);
};

$('#search_form').submit(function(e) {
    e.preventDefault();
});

this.imagePreview = function(image) {
    var offsetX = 5;
    var offsetY = 5;
    isMouseAboveImg = function(image, e) {
        var result = true;
        var mouse_x = Math.round(e.pageX);
        var mouse_y = Math.round(e.pageY);
        var image_offset = image.offset();
        var image_x = Math.round(image_offset.left);
        var image_y = Math.round(image_offset.top);
        var image_w = image.width();
        var image_h = image.height();
        if (mouse_x < image_x || mouse_x >= image_x + image_w ||
            mouse_y < image_y || mouse_y >= image_y + image_h) {
            result = false;
        }
        // console.log('MX=' + mouse_x + ' | MY=' + mouse_y + ' | IX=' + image_x + ' | IY=' + image_y + ' | IW=' + image_w + ' | IH=' + image_h + ' | Result=' + result);
        return result;
    }
    image.mouseenter(function(e){
        if (isMouseAboveImg(image, e) && !$("#preview_photo_jq").length) {
            // console.log('mouseenter | e.pageX = ' + e.pageX + ' | e.pageY = ' + e.pageY);
            $("#content_container").append('<img id="preview_photo_jq" src="' + this.src + '" />');
            $("#preview_photo_jq").css({ top: (e.pageY + offsetY), left: (e.pageX + offsetX), position: 'absolute' });
            $("#preview_photo_jq").fadeIn("fast");
        }
    });
    image.mouseleave(function(e){
        if (!isMouseAboveImg(image, e) && $("#preview_photo_jq").length) {
            // console.log('mouseleave | e.pageX = ' + e.pageX + ' | e.pageY = ' + e.pageY);
            $("#preview_photo_jq").remove();
        }
    });
    image.mousemove(function(e){
        // console.log('mousemove | e.pageX = ' + e.pageX + ' | e.pageY = ' + e.pageY);
        $("#preview_photo_jq").css({ top: (e.pageY + offsetY), left: (e.pageX + offsetX), position: 'absolute' });
    });
};

// starting the script on page load
$(document).ready(function(){
	imagePreview($('#term_image'));
});
