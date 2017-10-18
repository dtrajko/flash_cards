// flash_cards.js

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
            $('#response_msg').text(msg_text);
            if (msg_text == 'true') {
                $('#response_msg').css('color', 'green');
            } else if (msg_text == 'false') {
                $('#response_msg').css('color', 'red');
            }
        }
    });
});
