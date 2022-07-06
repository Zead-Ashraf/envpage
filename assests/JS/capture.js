function sendData() {
  window.scrollTo(0, 0);

  let url = window.location.href.split("/");

  let pass =1;
  let pathNum = 0;

  for (var i=0; i < url.length; i++) {
    if (url[i].split(".")[0] == "index") {
      pathNum = i - 1;
    }
  }

  html2canvas(document.body).then(function (canvas) {
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "http://localhost/envpage/frontend/php/save-capture.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9) +
      "&project=" + url[pathNum]);
    ajax.onreadystatechange = function() {
    if (ajax.readyState === 4) {
      console.log(ajax.response);
    }
  }
  });

 

  
}

sendData();