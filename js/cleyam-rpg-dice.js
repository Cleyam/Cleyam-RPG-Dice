(function ($) {
    $(document).ready(function () {
        $('#roll').on('click', function (e) {
            e.preventDefault();
            $('#result').html('');
            let number = $('#diceNumber').val();
            let type = $('#diceType').val();
            let results = [];
            let roll = [];
            for (let loop = 0; loop < number; loop++) {
                roll[loop] = Math.floor(Math.random() * (type - 1 + 1)) + 1;
                results.push("<button class='btn text-light mx-2'>" + roll[loop] + "</button>")
            }
            $('#result').html(results);

            $.ajax({
                url: ajaxurl,
                type: "POST",
                data: {
                    'action': 'insert_roll',
                    'diceNumber': $('#diceNumber').val(),
                    'diceType': $('#diceType').val(),
                    'result': roll.join()

                }
            })
        })
    });
}(jQuery));