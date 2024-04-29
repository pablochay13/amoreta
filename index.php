<?php
require 'inc/class/lenguaje.php';

if ($_GET)
  $key = (isset($_GET['idioma'])) ? $_GET['idioma'] : 'es';

# se crea instancia a lenguaje
$idioma = new lenguaje($key);
# se carga array de idioma
$diccionario = $idioma->get_idioma();
# se carga la plantilla HTML
$template = file_get_contents('inc/tpl/plantilla.tpl.php');
#se llenan los valores generales a toda la plantilla
foreach ($diccionario as $clave => $valor) {
  $template = str_replace('{' . $clave . '}', $valor, $template);
}
#Se muestra pagina web
echo $template;
