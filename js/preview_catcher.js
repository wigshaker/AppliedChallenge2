var mjpeg_img;

function reload_img () {
  mjpeg_img.src = "http://wigshaker.ddns.net:41817/html/cam_pic.php?time=" + new Date().getTime();
}
// TO-DO:Fix this.
function error_img () {
  setTimeout("mjpeg_img.src = 'cam_pic.php?time=' + new Date().getTime();", 100);
}

function init() {
  mjpeg_img = document.getElementById("mjpeg_dest");
  mjpeg_img.onload = reload_img;
  mjpeg_img.onerror = error_img;
  reload_img();
}
