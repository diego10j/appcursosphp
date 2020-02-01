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
?>