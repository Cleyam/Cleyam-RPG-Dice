(function ($) {
    $(document).ready(function () {

        $('#roll').on('click', function () {
            $('#result').html('');
            let number = $('#diceNumber').val();
            let type = $('#diceType').val();
            let results = [];
            for (let loop = 0; loop < number; loop++) {
                results.push("<button class='btn text-light mx-2'>" + (Math.floor(Math.random() * (type - 1 + 1)) + 1) + "</button>")
            }
            $('#result').html(results);
        })




    });
}(jQuery));