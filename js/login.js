function modalLoading_login(o) {
  o.preventDefault(),
    Swal.fire({
      title: "Consultando datos",
      html: "Validando tu informacion",
      showConfirmButton: !1,
      didOpen: () => {
        Swal.showLoading(), login();
      },
    });
}
async function login() {
  const o = document.getElementById("usuario").value,
    t = document.getElementById("password").value,
    e = new FormData();
  e.append("username", o), e.append("password", t);
  const n = await fetch("http://localhost/API/validar.php", {
      method: "POST",
      body: e,
    }),
    a = await n.json();
  a.success
    ? Swal.fire({
        icon: "success",
        text: a.message,
        timer: 1500,
        showCancelButton: !1,
        showConfirmButton: !1,
        customClass: { popup: "swal" },
        didClose: () => {
          window.location.href = "http://localhost/API/LinksVistas.php";
        },
      })
    : Swal.fire({
        icon: "error",
        title: "Oops...",
        text: a.message,
        customClass: { popup: "swal" },
        confirmButtonText: "Entiendo",
      });
}
