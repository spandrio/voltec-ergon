<?php
/**
 * Router solo para el servidor embebido de PHP (`composer serve`).
 * Emula el rewrite de .htaccess: si el path pedido es un archivo real
 * (favicon.ico, CSS, etc.) lo sirve tal cual; si no, delega en index.php.
 */

$path = urldecode(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));

if ($path !== "/" && file_exists(__DIR__ . $path) && !is_dir(__DIR__ . $path)) {
  return false;
}

require __DIR__ . "/index.php";
