$(document).ready(function () {
    $('.chat-button').on('click', function () {
        $(this).hide();
        $('.wrapper').show();
    });

    $('.wrapper .title i').on('click', function () {
        $('.chat-button').show();
        $('.wrapper').hide();
    });

    $("#addExtra").on("click", function () {
        $(".modal").toggleClass("show-modal");
    });

    $(".modal-close-button").on("click", function () {
        $(".modal").toggleClass("show-modal");
    });

    $("#send-btn").on("click", function () {
        const userInput = $("#data").val();
        const userMessage = `<div class="user-inbox inbox"><div class="msg-header"><p>${userInput}</p></div></div>`;
        $(".form").append(userMessage);
        $("#data").val('');

        $.ajax({
            url: '../botcon.php',
            type: 'POST',
            data: 'text=' + userInput,
            success: function (result) {
                const botResponse = `<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>${result}</p></div></div>`;
                $(".form").append(botResponse);
                $(".form").scrollTop($(".form")[0].scrollHeight);
            }
        });
    });
});