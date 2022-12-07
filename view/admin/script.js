function tinyInit() {
  tinymce.init({
    selector: "#editor",
    plugins: [
      "advlist",
      "autolink",
      "link",
      "image",
      "lists",
      "charmap",
      "preview",
      "anchor",
      "pagebreak",
      "searchreplace",
      "wordcount",
      "visualblocks",
      "visualchars",
      "code",
      "fullscreen",
      "insertdatetime",
      "media",
      "table",
      "emoticons",
      "template",
      "help",
    ],
    toolbar:
      "undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | " +
      "bullist numlist outdent indent | link image | print preview media fullscreen | " +
      "forecolor backcolor emoticons | help",
    menu: {
      favs: {
        title: "My Favorites",
        items: "code visualaid | searchreplace | emoticons",
      },
    },
    menubar: "favs file edit view insert format tools table help",
  });
}

function showForm(page) {
  event.preventDefault();
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("form_place").innerHTML = this.responseText;
      tinyInit();
      window.location.href = '#form_place'
    }
  };
  if (page) {
    xhttp.open("GET", "show_form.php?page=" + page, true);
    xhttp.send();
  } else {
    xhttp.open("GET", "show_form.php", true);
    xhttp.send();
  }
}
function deletePage(page) {
  event.preventDefault();
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
      cancelButton: "btn btn-danger",
    },
    buttonsStyling: false,
  });

  swalWithBootstrapButtons
    .fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      reverseButtons: true,
    })
    .then((result) => {
      if (result.isConfirmed) {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById(page).innerHTML = ' ';
            tinyInit();
          }
        };
        xhttp.open("GET", "delete_page.php?page=" + page);
        xhttp.send();
        swalWithBootstrapButtons.fire(
          "Deleted!",
          "Your file has been deleted.",
          "success"
        );
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          "Cancelled",
          "Your imaginary file is safe :)",
          "error"
        );
      }
    });
}

function printSrc() {
  let x = document.getElementById("medias").value.substring(12);
  document.getElementById("media_src").innerHTML =
    "http://localhost/NLN_MT/assets/uploads/" + x;
}
