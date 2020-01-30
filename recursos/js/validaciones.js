//Carga la imagen seleccionada en el input hidden del avatar, para guardar el valor y pasarlo en el formulario
$("#carouselAvatar").bind("slide.bs.carousel", function(e) {
  var numImagen = e.to;
  console.log("Avatar seleccionado: " + numImagen);
  document.getElementById("txtAvatar").value = numImagen;
});

/**
 * Valida si una cadena es vacía
 * @param {String} valor
 */
function validarStringVacio(valor) {
  valor = valor.trim();
  return !valor || 0 === valor.length;
}

/**
 * Valida si el correo de un control Input es válido
 * @param {Input} control
 */
function validarCorreo(control) {
  var filtro = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if (filtro.test(control.value)) {
    //Si es válido cambia el borde del input a color verde agregando la clase de bootstrap is-valid al control
    control.className = "form-control is-valid";    
    return true;
  } else {
    //Si no es válido cambia el borde del input a color rojo agregando la clase de bootstrap is-invalid al control
    control.className = "form-control is-invalid";    
    control.focus;
    return false;
  }
}


/**
 * Valida si el sitio web es https
 * @param {Input} control
 */
function validarSitioWeb(control) {
    let txtSitioWeb = control.value;
    if (txtSitioWeb.startsWith("https")) {
      //Si es válido cambia el borde del input a color verde agregando la clase de bootstrap is-valid al control
      control.className = "form-control is-valid";    
      return true;
    } else {
      //Si no es válido cambia el borde del input a color rojo agregando la clase de bootstrap is-invalid al control
      control.className = "form-control is-invalid";    
      control.focus;
      return false;
    }
  }

/**
 * Valida si son iguales los campos Confirmar correo y clave respectivamente
 * @param {String} cadena
 * @param {String} cadenaConfirma
 */
function validarConfirmar(cadena, cadenaConfirma) {
  return cadena === cadenaConfirm;
}

/**
 * Valida que se ingresen solo números en el cuadro de texto mediante el evento onkeypress
 * @param {Evento} evt
 */
function validarSoloNumeros(evt) {
  var code = evt.which ? evt.which : evt.keyCode;
  if (code == 8) {
    //espacio en blanco
    return true;
  } else if (code >= 48 && code <= 57) {
    //solo numeros
    return true;
  } else {
    return false;
  }
}

/**============
 * Funcion para validar una fecha
 * Tiene que recibir:
 *  La fecha en formato ingles yyyy-mm-dd
 * Devuelve:
 *  true-Fecha correcta
 *  false-Fecha Incorrecta
 * https://www.lawebdelprogramador.com/codigo/JavaScript/2379-Validar-una-fecha-con-HTML5.html
 * https://blog.reaccionestudio.com/funciones-para-validar-fechas-con-javascript/
 * http://javascript-coder.com/javascript-form/javascript-get-check.phtml
 */
function validate_fecha(fecha) {
  var patron = new RegExp(
    "^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$"
  );
  if (fecha.search(patron) == 0) {
    var values = fecha.split("-");

    if (isValidDate(values[2], values[1], values[0])) {
      return true;
    }
  }
  return false;
}

function validarFormatoFecha(campo) {
  let RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
  if (campo.match(RegExPattern) && campo != "") {
    return true;
  } else {
    return false;
  }
}

function getEdad(dateString) {
  let hoy = new Date();
  let fechaNacimiento = new Date(dateString);
  let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
  let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth();
  if (
    diferenciaMeses < 0 ||
    (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())
  ) {
    edad--;
  }
  return edad;
}
/**================= */

/**
 * Realiza las validaciones en el evento onsubmit
 */
function valirarFormulario() {
  //Recupera todas los objetos del formulario
  let txtNombre = document.getElementById("txtNombre");
  let txtSitioWeb = document.getElementById("txtSitioWeb");
  let txtEmail = document.getElementById("txtEmail");
  let txtConfirmaEmail = document.getElementById("txtConfirmaEmail");
  let txtClave = document.getElementById("txtClave");
  let txtConfirmaClave = document.getElementById("txtConfirmaClave");
  let txtFechaNacimiento = document.getElementById("txtFechaNacimiento");
  let txtTelefono = document.getElementById("txtTelefono");
  let selPais = document.getElementById("selPais");
  let txtProvincia = document.getElementById("txtProvincia");
  let txtCodigoPostal = document.getElementById("txtCodigoPostal");
  let txtDireccion = document.getElementById("txtDireccion");
  let radGenero = document.getElementById("radGenero");
  let teaComentario = document.getElementById("teaComentario");

  

  //chkIntereses[]

  //el formulario se envia
  alert("Muchas gracias por enviar el formulario");
  document.formulario.submit();
}
