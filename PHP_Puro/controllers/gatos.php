<?
include "models/Gato.php";

function nuevoGato(string $name, int $age): Gato
{
    return new Gato($name, $age);
}
