<style>
    * {
  box-sizing: border-box;
}

body {
  background-color: #edeff2;
  font-family: "Calibri", "Roboto", sans-serif;
}

.chat_window {
  position: absolute;
  width: calc(100% - 20px);
  max-width: 1200px;
  height: 700px;
  border-radius: 10px;
  background-color: #fff;
  left: 50%;
  top: 50%;
  transform: translateX(-50%) translateY(-50%);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
  background-color: #f8f8f8;
  overflow: hidden;
}

.top_menu {
  background-color: slategray;
  width: 100%;
  padding: 20px 0 15px;
  box-shadow: 0 1px 30px rgba(0, 0, 0, 0.1);
}
.top_menu .buttons {
  margin: 3px 0 0 20px;
  position: absolute;
}
.top_menu .buttons .button {
  background-color: #45829b; /* Green */
  border: none;
  color: #c7eafc;
  padding: 4px 14px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}


.top_menu .title {
  text-align: center;
  color: #bcbdc0;
  font-size: 20px;
}

.messages {
  position: relative;
  list-style: none;
  padding: 20px 10px 0 10px;
  margin: 0;
  height: 570px;
  overflow: scroll;
  background-color: #386d81
}
.messages .message {
  clear: both;
  overflow: hidden;
  margin-bottom: 20px;
  transition: all 0.5s linear;
  opacity: 0;
}
.messages .message.left .avatar {
  background-color: #f5886e;
  float: left;
}
.messages .message.left .text_wrapper {
  background-color: #ffe6cb;
  margin-left: 20px;
}
.messages .message.left .text_wrapper::after, .messages .message.left .text_wrapper::before {
  right: 100%;
  border-right-color: #ffe6cb;
}
.messages .message.left .text {
  color: #c48843;
}
.messages .message.right .avatar {
  background-color: #fdbf68;
  float: right;
}
.messages .message.right .text_wrapper {
  background-color: #c7eafc;
  margin-right: 20px;
  float: right;
}
.messages .message.right .text_wrapper::after, .messages .message.right .text_wrapper::before {
  left: 100%;
  border-left-color: #c7eafc;
}
.messages .message.right .text {
  color: #45829b;
}
.messages .message.appeared {
  opacity: 1;
}
.messages .message .avatar {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  display: inline-block;
}
.messages .message .text_wrapper {
  display: inline-block;
  padding: 20px;
  border-radius: 6px;
  width: calc(100% - 85px);
  min-width: 100px;
  position: relative;
}
.messages .message .text_wrapper::after, .messages .message .text_wrapper:before {
  top: 18px;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}
.messages .message .text_wrapper::after {
  border-width: 13px;
  margin-top: 0px;
}
.messages .message .text_wrapper::before {
  border-width: 15px;
  margin-top: -2px;
}
.messages .message .text_wrapper .text {
  font-size: 18px;
  font-weight: 300;
}

.bottom_wrapper {
  position: relative;
  width: 100%;
  background-color: slategray;
  padding: 20px 20px;
  position: absolute;
  bottom: 0;
}
.bottom_wrapper .message_input_wrapper {
  display: inline-block;
  height: 50px;
  border-radius: 25px;
  border: 1px solid #bcbdc0;
  width: calc(100% - 160px);
  position: relative;
  padding: 0 20px;
}
.bottom_wrapper .message_input_wrapper .message_input {
  border: none;
  height: 100%;
  box-sizing: border-box;
  width: calc(100% - 40px);
  position: absolute;
  outline-width: 0;
  color: #fff;
  background-color: slategray;
  
}
::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #fff;
  opacity: 1;
}
.bottom_wrapper .send_message {
  width: 140px;
  height: 50px;
  display: inline-block;
  border-radius: 50px;
  background-color: #45829b;
  border: 2px solid #bcbdc0;
  color: #fff;
  cursor: pointer;
  transition: all 0.2s linear;
  text-align: center;
  float: right;
}
.bottom_wrapper .send_message:hover {
  color: #a3d063;
  background-color: #fff;
}
.bottom_wrapper .send_message .text {
  font-size: 18px;
  font-weight: 300;
  display: inline-block;
  line-height: 48px;
}

.message_template {
  display: none;
}

::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #386d81;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #c7eafc;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #386d81;
}

</style>

<body style="background-color: #212a33;">
<div class="chat_window">
    <div class="top_menu">
    <div class="buttons">
    <a href="/logout"><div class="button">logout</div></a>
        </div>
        <div class="title"><?=Illuminate\Support\Facades\Auth::user()->email?></div>
    </div>
    
    <ul id="table" class="messages">
   
    </ul>
    <form action="/" id="form">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="bottom_wrapper clearfix">
        <div class="message_input_wrapper">
            <input id="text" name="message_text" class="message_input" placeholder="Type your message here..." />
        </div>
        <button type="submit" class="send_message"><div >
            <div class="icon"></div>
            <div class="text">Send</div>
        </div></button>
    </div>
</div>
<div class="message_template">
    <li class="message">
        <div class="avatar"></div>
        <div class="text_wrapper">
            <div class="text"></div>
        </div>
    </li>
</div>
</form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    let elem
    function loadFromServer() {
        $.get( "/message", function( data ) {
            elem.html( data )
        });
    }
    $(document).ajaxError(function(event,xhr,options,exc) {
        alert("something went wrong")
    })
    function refreshTicker() {
        loadFromServer()
    }
    $( document ).ready(function() {
        elem = $( "#table" )
        setInterval(loadFromServer, 1000)
        loadFromServer();
    });
 

    $( "#form" ).submit(function( event ) {
 
     event.preventDefault();
     
     $.post( "/", $( "#form" ).serialize() );

     document.getElementById("text").value = "";
     refreshTicker()
     
    });
    

</script>
 
