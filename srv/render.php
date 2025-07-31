<?php

require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

try {

 $lista = [
  [
   "nombre" => "Jair",
   "chiste" => "¿Qué hace una abeja en el gimnasio? ¡Zumba!"
  ],
  [
   "nombre" => "Orlando",
   "chiste" => "¿Por qué los pájaros no usan Facebook? Porque ya tienen Twitter."
  ],
  [
   "nombre" => "Cadena",
   "chiste" => "¿Cuál es el colmo de un electricista? Que su mujer se llame Luz y sus hijos le sigan la corriente."
  ],
  [
   "nombre" => "Nequiz",
   "chiste" => "¿Qué le dice una impresora a otra? ¿Esa hoja es tuya o es impresión mía?"
  ]
 ];

 // Genera el código HTML de la lista.
 $render = "";
 foreach ($lista as $modelo) {
  /* Codifica nombre y color para que cambie los caracteres
   * especiales y el texto no se pueda interpretar como HTML.
   * Esta técnica evita la inyección de código. */
  $nombre = htmlentities($modelo["nombre"]);
  $chiste = htmlentities($modelo["chiste"]);
  $render .=
   "<dt>{$nombre}</dt>
    <dd>{$chiste}</dd>";
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
} catch (Throwable $error) {

 devuelveErrorInterno($error);
}
