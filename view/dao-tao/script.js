var subject = "CNTT";
var type = "CTDT";
function loadPdf(a, b) {
  document.getElementById("pdf-display").classList.remove("d-none");
  // document.getElementById("form-add").classList.add("d-none");
  if (subject != "") {
    document.getElementById(subject).classList.remove("active");
  }
  document.getElementById(type).classList.remove("active");
  if (a != "") {
    subject = a;
  }
  type = b;
  document.getElementById(type).classList.add("active");
  document.getElementById(subject).classList.add("active");
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("pdf-frame").src =
        "../../assets/uploads/" + this.responseText;
    }
  };
  xhttp.open("GET", "../admin/load-pdf-helper.php?sj=" + subject + "&type=" + type);
  xhttp.send();
}
