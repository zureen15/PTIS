<!-- Created By CodingNepal -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTIS Chatbot</title>
    <link rel="stylesheet" href="../css/bot.css">
    <link rel="stylesheet" href="../css/chat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>

    <div class="chat-button" style="width: 200px;  position: fixed; bottom: 0px; right: 0px;">
        <span></span>
    </div>

    <div class="wrapper" style="display: none; margin-top: 100px;" >
        <div class="title">PTIS Chatbot &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <i class="fa fa-times"></i>
        </div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Hello there, how can I help you?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>

    <div class="modal">
        <div class="modal-content">
            <span class="modal-close-button">&times;</span>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="bot.js"></script>
</body>
</html>