<?php
/**
 * views/site/servicios.php
 * Renderizado por PhpRenderer en GET /servicios dentro de layouts/site.php.
 * Cada servicio tiene su ancla (#web, #iot, #auditoria, #soporte) y el color de un cable.
 */
$servicios = [
  ["web", "t-fase", "Desarrollo web a medida",
   "Construimos el sitio o el sistema que tu organización necesita, con la información ordenada y un panel para administrarla.",
   ["Sitios institucionales con varias páginas y formulario de contacto", "Catálogos con altas, bajas y modificaciones", "Registro e inicio de sesión de usuarios", "Base de datos MySQL con migraciones"]],
  ["iot", "t-neutro", "Electrónica e IoT",
   "Diseñamos y armamos el dispositivo: el circuito, el programa del microcontrolador y la caja que lo contiene.",
   ["Microcontroladores ESP32 programados en Arduino (C++)", "Sensores de medición eléctrica y módulos de relé", "Pantalla y botones para usarlo sin computadora", "Carcasa modelada en CAD e impresa en 3D"]],
  ["auditoria", "t-tierra", "Auditoría energética",
   "Medimos el consumo real de los artefactos de un hogar, una oficina o una institución, y te decimos dónde se va la energía.",
   ["Voltaje, corriente, potencia y energía por artefacto", "Detección de consumo en standby", "Costo estimado en pesos", "Huella de carbono (0,325 kg de CO₂ por kWh)"]],
  ["soporte", "t-amarillo", "Soporte y mantenimiento",
   "Después de la entrega seguimos a cargo: cada reporte queda registrado desde que llega hasta que se cierra.",
   ["Registro de cada falla reportada", "Diagnóstico y corrección", "Informe al cliente con la causa y la solución", "Cambios y mejoras sobre lo entregado"]],
];
?>
<section class="page-header">
  <div class="wrap">
    <h1>Lo que podés contratar.</h1>
    <p class="lead">Cuatro servicios que se piden por separado o combinados en un mismo proyecto. Todos empiezan con un relevamiento y un presupuesto por escrito.</p>
  </div>
</section>

<section class="sec">
  <div class="wrap">
    <?php foreach ($servicios as [$id, $tab, $nombre, $desc, $items]): ?>
      <article class="svc" id="<?= html($id) ?>">
        <span class="tab <?= $tab ?>"></span>
        <div>
          <h2><?= html($nombre) ?></h2>
          <p class="desc"><?= html($desc) ?></p>
        </div>
        <div>
          <h3>Qué incluye</h3>
          <ul class="ticks">
            <?php foreach ($items as $item): ?><li><?= html($item) ?></li><?php endforeach; ?>
          </ul>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<section class="sec paper">
  <div class="wrap">
    <div class="head">
      <h2>Con qué trabajamos.</h2>
      <p>Las herramientas que usamos hoy en nuestros proyectos.</p>
    </div>
    <div class="tools">
      <div><h3>Web</h3><ul><li>PHP y Slim</li><li>MySQL</li><li>HTML, CSS y JavaScript</li><li>Git y GitHub</li></ul></div>
      <div><h3>Electrónica</h3><ul><li>ESP32</li><li>Sensores PZEM-004T</li><li>Módulos de relé</li><li>Pantallas TFT</li></ul></div>
      <div><h3>Diseño</h3><ul><li>Tinkercad y Fusion 360</li><li>Impresión 3D</li><li>Planos y esquemas</li></ul></div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/../partials/cta.php'; ?>
