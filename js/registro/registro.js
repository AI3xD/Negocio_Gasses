function modalLoading_register(o) {
    o.preventDefault();
    const usuario=document.getElementById('usuario').value;
    const password=document.getElementById('password').value;
    const password_confirm=document.getElementById('password_confirm').value;
    if(password!=password_confirm){
        modal_contrasenas_diferentes();
        return;
    }
    Swal.fire({
        title: "Consultando datos",
        html: "Validando tu informacion",
        showConfirmButton: !1,
        didOpen: () => {
          Swal.showLoading(), registrar(usuario,password,password_confirm);
        },
    });
  }
function modal_contrasenas_diferentes(){
    Swal.fire({
        icon: 'waring',
        text: 'Las contraseñas no coiniciden',
        timer: 1500,
        showCancelButton: false,
        showConfirmButton: false,
        customClass: {
            popup: 'swalalert',
        },
    })
}
async function registrar(usuario,password,password_confirm) {
    const datos = new FormData();
    datos.append('usuario', usuario);
    datos.append('password', password);
    datos.append('password_confirm', password_confirm);

    const url = 'http://localhost/API/insertarUsuarios.php';
    const respuesta = await fetch(url, {
        method: 'POST',
        body: datos
    });

    const resultado = await respuesta.json();
    if (resultado.success) {
        Swal.fire({
            icon: 'success',
            text: resultado.message,
            timer: 1500,
            showCancelButton: false,
            showConfirmButton: false,
            customClass: {
                popup: 'swalalert',
            },
        }).then((result) => {
            // Haz lo que necesites aquí después de mostrar el mensaje de éxito
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: resultado.message,
            customClass: {
                popup: 'swalalert',
            },
            confirmButtonText: 'Entiendo'
        });
    }
}