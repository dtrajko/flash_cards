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
