var subject = "ATTT";
var type = "CTDT";
function loadPdf(a, b) {
  document.getElementById("pdf-display").classList.remove("d-none");
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
  xhttp.open("GET", "load-pdf-helper.php?sj=" + subject + "&type=" + type);
  xhttp.send();
}
function deleteSubject(sj) {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success m-2",
      cancelButton: "btn btn-danger m-2",
    },
    buttonsStyling: false,
  });

  swalWithBootstrapButtons
    .fire({
      title: "Xóa ngành này?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Xóa",
      cancelButtonText: "Hủy",
      reverseButtons: true,
    })
    .then((result) => {
      if (result.isConfirmed) {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById(sj + 'wrapper').innerHTML = '';
            tinyInit();
          }
        };
        xhttp.open("GET", "delete_subject.php?sj=" + sj);
        xhttp.send();
        swalWithBootstrapButtons.fire(
          "Đã xóa!",
          "",
          "success"
        );
      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          "Đã hủy",
          "",
          "error"
        );
      }
    });
}