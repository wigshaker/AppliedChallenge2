if(typeof(EventSource) !== "undefined") {
    var source = new EventSource("http://wigshaker.ddns.net:4/html/ac2/model/msg_generator.php");
    source.onmessage = function(event) {
        document.getElementById("result").innerHTML += event.data + "<br>";
        navigator.vibrate(150);
    };
} else {
    document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
}
