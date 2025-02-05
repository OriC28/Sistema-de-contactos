<?php

interface interfaceContact{
    public function addContact();
    public function editContact();
    public function getContact();
    public function deleteContact();
}

/**
 * Este controlador contendrá todos los métodos para realizar 
 * las operaciones de: Agregar, Editar, Obtener y Eliminar un contacto.
 */

class contactController implements interfaceContact{

}