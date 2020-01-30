<?php

/**
 * Retorna los paises para el combo de seleccion
 *
 * @return Array
 */
function getPaises()
{
    return array('ECUADOR', 'COLOMBIA', 'ESPAÑA', 'OTRO');
}

/**
 * Valida si son iguales los campos Confirmar correo y clave respectivamente 
 *
 * @param [String] $_string
 * @param [String] $_stringConfirma
 * @return Boolean
 */
function validarConfirmar($_string, $_stringConfirma)
{
    if ($_string === $_stringConfirma) {
        return true;
    }
    return false;
}

/**
 * Validar que se ingrese una contraseña segura
 * 1. La Contraseña debe tener al menos 6 caracteres
 * 2. La Contraseña debe tener al menos una letra minúscula
 * 3. La Contraseña debe tener al menos una letra mayúscula
 * 4. La Contraseña debe tener al menos un caracter numérico
 *
 * @param [String] $_clave
 * @param [String] $_error
 * @return Boolean
 */
function validarSeguridadClave($_clave, &$_error)
{
    if (strlen($_clave) < 6) {
        $_error = 'La Contraseña debe tener al menos 6 caracteres.';
        return false;
    }
    if (!preg_match('`[a-z]`', $_clave)) {
        $_error = 'La Contraseña debe tener al menos una letra minúscula.';
        return false;
    }
    if (!preg_match('`[A-Z]`', $_clave)) {
        $_error = 'La Contraseña debe tener al menos una letra mayúscula.';
        return false;
    }
    if (!preg_match('`[0-9]`', $_clave)) {
        $_error = 'La Contraseña debe tener al menos un numéro';
        return false;
    }
    $_error = "";
    return true;
}

/**
 * Valida que la url del sitio web ingresado sea correcto
 * 1. La URL debe ser https
 *
 * @param [String] $_sitioWeb
 * @param [String] $_error
 * @return Boolean
 */
function validarSitioWeb($_sitioWeb, &$_error)
{
    $urlParts = parse_url($_sitioWeb);
    $scheme = $urlParts['scheme'];
    if ($scheme != 'https') {
        $_error = 'La URL del sitio web debe ser https.';
        return false;
    }
    $_error = '';
    return true;
}

/**
 * Valida que el usuario sea mayor de 18 años
 *
 * @param [Date] $_fechaNacimiento
 * @param [String] $_error
 * @return Boolean
 */
function validarFechaNacimiento($_fechaNacimiento, &$_error)
{
    $_fechaNacimiento = str_replace("/", "-", $_fechaNacimiento);
    $_fechaNacimiento = date('Y/m/d', strtotime($_fechaNacimiento));
    $fechaServidor = date('Y/m/d');
    $edad = (int) $fechaServidor - (int) $_fechaNacimiento;

    if ($edad < 18) {
        $_error = 'Debes ser mayor de 18 años para poder registrarte.';
        return false;
    }
    $_error = '';
    return true;
}

/**
 * Valida que el comentario sea mayor a 10 caracteres
 *
 * @param [String] $_comentario
 * @param [String] $_error
 * @return Boolean
 */
function validarComentario($_comentario, &$_error)
{
    if (strlen($_comentario) < 10) {
        $_error = 'El comentario debe tener al menos 10 caracteres.';
        return false;
    }
    $_error = '';
    return true;
}
