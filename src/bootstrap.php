<?php

use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

Dotenv::createImmutable(__DIR__ . '/..')->safeLoad();

$env = $_ENV["APP_ENV"] ?? "prod";
$allowedEnvs = ["dev", "prod"];

if (!in_array($env, $allowedEnvs, true)) {
  throw new RuntimeException("APP_ENV inválido: $env");
}

$debug = $env === "dev";

require_once __DIR__ . '/middlewares/logMiddleware.php';

$app = AppFactory::create();

$app->addBodyParsingMiddleware();

$app->add(logMiddleware(...));

$renderer = new PhpRenderer(
  templatePath: __DIR__ . "/views",
  attributes: ["title" => "Voltec Ergon"],
);

require __DIR__ . '/routes/site.routes.php';

$app->addErrorMiddleware($debug, true, true);

return $app;
