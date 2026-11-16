<?php

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

function validarContacto(array $data): array
{
  $errores = [];

  $nombre = trim((string) ($data["nombre"] ?? ""));
  $email = trim((string) ($data["email"] ?? ""));
  $mensaje = trim((string) ($data["mensaje"] ?? ""));

  if ($nombre === "") {
    $errores[] = "Ingresá tu nombre.";
  }

  if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "Ingresá un email válido.";
  }

  if ($mensaje === "") {
    $errores[] = "Contanos brevemente qué necesitás.";
  }

  return $errores;
}

$app->get("/", function (ServerRequestInterface $request, $response) use ($renderer) {
  return view($renderer, $response, "site/home.php", [
    "active" => "/",
    "title" => "Voltec Ergon — Consultora de tecnología",
    "description" => "Desarrollo web a medida, electrónica e IoT, auditoría energética y soporte. Consultora de tecnología de la E.E.S.T N°4 de Berazategui.",
    "canonicalUrl" => baseUrl($request) . "/",
  ], "layouts/site.php");
});

$app->get("/servicios", function (ServerRequestInterface $request, $response) use ($renderer) {
  return view($renderer, $response, "site/servicios.php", [
    "active" => "/servicios",
    "title" => "Servicios — Voltec Ergon",
    "description" => "Desarrollo web a medida, electrónica e IoT, auditoría energética y soporte. Conocé los servicios de Voltec Ergon.",
    "canonicalUrl" => baseUrl($request) . "/servicios",
  ], "layouts/site.php");
});

$app->get("/equipo", function (ServerRequestInterface $request, $response) use ($renderer) {
  return view($renderer, $response, "site/equipo.php", [
    "active" => "/equipo",
    "title" => "Equipo — Voltec Ergon",
    "description" => "Conocé al equipo de Voltec Ergon: seis integrantes en tres comisiones técnicas, proyecto institucional de la E.E.S.T N°4 de Berazategui.",
    "canonicalUrl" => baseUrl($request) . "/equipo",
  ], "layouts/site.php");
});

$app->get("/trabajos", function (ServerRequestInterface $request, $response) use ($renderer) {
  return view($renderer, $response, "site/trabajos.php", [
    "active" => "/trabajos",
    "title" => "Voltec, cliente YPF — Voltec Ergon",
    "description" => "Voltec: un medidor de consumo eléctrico por artefacto con corte por relé, en la caja Eco Smart Grid, hecho por Voltec Ergon para YPF.",
    "canonicalUrl" => baseUrl($request) . "/trabajos",
  ], "layouts/site.php");
});

$app->get("/contacto", function (ServerRequestInterface $request, $response) use ($renderer) {
  return view($renderer, $response, "site/contacto.php", [
    "active" => "/contacto",
    "title" => "Contacto — Voltec Ergon",
    "description" => "Pedí un presupuesto a Voltec Ergon: desarrollo web, electrónica e IoT, auditoría energética y soporte.",
    "canonicalUrl" => baseUrl($request) . "/contacto",
  ], "layouts/site.php");
});

$app->post("/contacto", function (ServerRequestInterface $request, $response) use ($renderer) {
  $data = $request->getParsedBody() ?? [];
  $errores = validarContacto($data);

  $meta = [
    "active" => "/contacto",
    "title" => "Contacto — Voltec Ergon",
    "canonicalUrl" => baseUrl($request) . "/contacto",
  ];

  if (!empty($errores)) {
    return view($renderer, $response->withStatus(422), "site/contacto.php", [
      ...$meta,
      "errores" => $errores,
      "old" => $data,
    ], "layouts/site.php");
  }

  return view($renderer, $response, "site/contacto.php", [
    ...$meta,
    "enviado" => true,
  ], "layouts/site.php");
});

$app->get("/privacidad", function (ServerRequestInterface $request, $response) use ($renderer) {
  return view($renderer, $response, "site/privacidad.php", [
    "active" => "/privacidad",
    "title" => "Política de Privacidad — Voltec Ergon",
    "description" => "Cómo Voltec Ergon trata los datos que dejás en el formulario de contacto: qué recopilamos, para qué, y tus derechos sobre esa información.",
    "canonicalUrl" => baseUrl($request) . "/privacidad",
  ], "layouts/site.php");
});

$app->get("/terminos", function (ServerRequestInterface $request, $response) use ($renderer) {
  return view($renderer, $response, "site/terminos.php", [
    "active" => "/terminos",
    "title" => "Términos y Condiciones — Voltec Ergon",
    "description" => "Condiciones de uso del sitio de Voltec Ergon, proyecto técnico institucional de la E.E.S.T N°4 de Berazategui y Fundación YPF.",
    "canonicalUrl" => baseUrl($request) . "/terminos",
  ], "layouts/site.php");
});

$app->get("/sitemap.xml", function (ServerRequestInterface $request, ResponseInterface $response) {
  $base = baseUrl($request);
  $pages = [
    ["path" => "/", "priority" => "1.0"],
    ["path" => "/servicios", "priority" => "0.8"],
    ["path" => "/equipo", "priority" => "0.6"],
    ["path" => "/trabajos", "priority" => "0.8"],
    ["path" => "/contacto", "priority" => "0.7"],
    ["path" => "/privacidad", "priority" => "0.2"],
    ["path" => "/terminos", "priority" => "0.2"],
  ];

  $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
  $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

  foreach ($pages as $page) {
    $xml .= "  <url>\n";
    $xml .= "    <loc>" . html($base . $page["path"]) . "</loc>\n";
    $xml .= "    <priority>" . $page["priority"] . "</priority>\n";
    $xml .= "  </url>\n";
  }

  $xml .= "</urlset>\n";

  $response->getBody()->write($xml);

  return $response->withHeader("Content-Type", "application/xml");
});

$app->get("/robots.txt", function (ServerRequestInterface $request, ResponseInterface $response) {
  $base = baseUrl($request);
  $body = "User-agent: *\n";
  $body .= "Allow: /\n";
  $body .= "Sitemap: {$base}/sitemap.xml\n";

  $response->getBody()->write($body);

  return $response->withHeader("Content-Type", "text/plain");
});
