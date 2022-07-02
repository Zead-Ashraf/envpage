function sendData() {
  window.scrollTo(0, 0);

  let url = window.location.href.split("/");

  let pass =1;
  let i = 0;

  while (pass == 1) {
    if (url[i] == "127.0.0.1") {
      pass++;
      i++;
      break;
    }

    else {
      i++
    }
  }

  html2canvas(document.body).then(function (canvas) {
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "../save-capture.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9) +
      "&project=" + url[i]);
  });

  
}

sendData();