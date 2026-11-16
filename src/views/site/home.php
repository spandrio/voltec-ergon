<?php
/**
 * views/site/home.php
 * Renderizado por PhpRenderer en GET / dentro de layouts/site.php.
 * El inicio presenta a la consultora. La traza del hero pasa de onda senoidal (energía)
 * a onda cuadrada (electrónica) y a una línea de datos (software): las tres cosas que hacemos.
 */
$W = 1200; $mid = 110; $amp = 62;
$pts = [];
for ($x = 0; $x <= 400; $x += 4) {                       // energía: 3 ciclos de senoidal
  $pts[] = [$x, $mid - $amp * sin($x / 400 * 3 * 2 * M_PI)];
}
$hi = $mid - 52; $lo = $mid + 52; $y = $mid;              // electrónica: onda cuadrada
$pts[] = [400, $lo];
for ($k = 0; $k < 8; $k++) {
  $x0 = 400 + $k * 50; $lvl = $k % 2 ? $lo : $hi;
  $pts[] = [$x0, $lvl]; $pts[] = [$x0 + 50, $lvl];
}
$bits = [1, 0, 1, 1, 0, 0, 1, 0, 1, 1, 1, 0, 1, 0, 0, 1];  // software: tramas de datos
$pts[] = [800, $mid];
foreach ($bits as $i => $b) {
  $x0 = 806 + $i * 24;
  if ($b) { $pts[] = [$x0, $mid]; $pts[] = [$x0 + 4, $mid - 26]; $pts[] = [$x0 + 16, $mid - 26]; $pts[] = [$x0 + 20, $mid]; }
}
$pts[] = [$W, $mid];
$d = 'M' . implode(' L', array_map(fn($p) => round($p[0], 1) . ',' . round($p[1], 1), $pts));
$len = 0;
for ($i = 1; $i < count($pts); $i++) { $len += hypot($pts[$i][0] - $pts[$i - 1][0], $pts[$i][1] - $pts[$i - 1][1]); }
$len = (int) ceil($len);
?>
<section class="hero">
  <div class="wrap">
    <p class="hero-intro">Voltec Ergon, consultora de tecnología de Berazategui</p>
    <h1>Medimos, programamos y armamos lo que tu organización necesita.</h1>
    <div class="hero-row">
      <p class="lead">Hacemos sitios y sistemas web, dispositivos con sensores y relés, y auditorías de consumo eléctrico. Todo con presupuesto por escrito y entregado probado.</p>
      <div class="hero-actions">
        <a href="/contacto" class="btn btn-yellow">Pedir un presupuesto</a>
        <a href="/servicios" class="btn btn-line">Ver servicios</a>
      </div>
    </div>
  </div>
  <figure class="trace">
    <svg viewBox="0 0 <?= $W ?> 220" aria-hidden="true">
      <g class="grid">
        <?php for ($gy = 20; $gy <= 200; $gy += 30): ?><line x1="0" y1="<?= $gy ?>" x2="<?= $W ?>" y2="<?= $gy ?>"/><?php endfor; ?>
        <?php for ($gx = 50; $gx < $W; $gx += 50): ?><line x1="<?= $gx ?>" y1="0" x2="<?= $gx ?>" y2="220"/><?php endfor; ?>
      </g>
      <line class="cut" x1="400" y1="0" x2="400" y2="220"/>
      <line class="cut" x1="800" y1="0" x2="800" y2="220"/>
      <path class="sig" d="<?= $d ?>" style="--len:<?= $len ?>"/>
    </svg>
    <figcaption class="trace-cap">
      <a href="/servicios#auditoria"><b>Energía</b><span>Medimos cuánto consume cada artefacto y cuánto cuesta.</span></a>
      <a href="/servicios#iot"><b>Electrónica</b><span>Diseñamos y armamos el dispositivo, con su caja.</span></a>
      <a href="/servicios#web"><b>Software</b><span>Programamos el sitio o el sistema que muestra los datos.</span></a>
    </figcaption>
  </figure>
</section>

<section class="sec paper">
  <div class="wrap">
    <div class="head">
      <h2>Cuatro servicios, un solo equipo.</h2>
      <p>Podés contratar uno solo o el proyecto completo. Trabajamos con hogares, instituciones y comercios.</p>
    </div>
    <ul class="board">
      <li><a href="/servicios#web"><span class="tab t-fase"></span><h3>Desarrollo web a medida</h3><p>Sitios institucionales, catálogos y sistemas de gestión con usuarios y base de datos.</p><span class="go">Ver el servicio</span></a></li>
      <li><a href="/servicios#iot"><span class="tab t-neutro"></span><h3>Electrónica e IoT</h3><p>Prototipos con microcontroladores, sensores y relés, con su carcasa diseñada e impresa en 3D.</p><span class="go">Ver el servicio</span></a></li>
      <li><a href="/servicios#auditoria"><span class="tab t-tierra"></span><h3>Auditoría energética</h3><p>Medimos cuánto consume cada artefacto y entregamos un informe con costo y huella de carbono.</p><span class="go">Ver el servicio</span></a></li>
      <li><a href="/servicios#soporte"><span class="tab t-amarillo"></span><h3>Soporte y mantenimiento</h3><p>Registramos cada falla, la corregimos y te informamos qué pasó y cómo quedó resuelta.</p><span class="go">Ver el servicio</span></a></li>
    </ul>
  </div>
</section>

<section class="sec">
  <div class="wrap">
    <div class="head">
      <h2>Cómo trabajamos.</h2>
      <p>El mismo recorrido en todos los proyectos, y en cada paso sabés qué vas a recibir.</p>
    </div>
    <ol class="steps">
      <li><h3>Solicitud y presupuesto</h3><p>Nos contás qué necesitás y relevamos el caso.</p><p class="get"><strong>Recibís</strong>Un presupuesto por escrito.</p></li>
      <li><h3>Diseño</h3><p>Definimos pantallas, circuito o plan de medición antes de construir.</p><p class="get"><strong>Recibís</strong>El diseño para aprobar.</p></li>
      <li><h3>Desarrollo o instalación</h3><p>Programamos, armamos y probamos.</p><p class="get"><strong>Recibís</strong>Los avances a medida que salen.</p></li>
      <li><h3>Entrega y soporte</h3><p>Lo probamos con vos y seguimos disponibles para las fallas.</p><p class="get"><strong>Recibís</strong>La solución y su manual.</p></li>
    </ol>
  </div>
</section>

<section class="sec inkbg">
  <div class="wrap feature">
    <div>
      <span class="tag">Nuestro cliente más grande hasta ahora</span>
      <h2>Voltec</h2>
      <p class="big">Para Voltec diseñamos y armamos un medidor de consumo eléctrico por artefacto, con corte por relé, montado en la caja Eco Smart Grid.</p>
      <dl class="facts">
        <div><dt>Servicios</dt><dd>Electrónica, web y diseño 3D</dd></div>
        <div><dt>Mide</dt><dd>3 artefactos a la vez</dd></div>
        <div><dt>Estado</dt><dd>Prototipo funcionando</dd></div>
      </dl>
      <div class="feature-actions">
        <a href="/clientes/voltec" class="btn btn-yellow">Ver el caso de Voltec</a>
        <a href="/clientes" class="tlink">Todos los clientes</a>
      </div>
    </div>
    <?php include __DIR__ . '/../partials/caja.php'; ?>
  </div>
</section>

<section class="sec paper">
  <div class="wrap">
    <div class="head">
      <h2>Tres comisiones, un mismo proyecto.</h2>
      <p>Somos seis integrantes. Cada comisión responde por su parte, y el proyecto sale de las tres juntas.</p>
    </div>
    <ul class="crew">
      <li><h3>Software</h3><p>El programa del microcontrolador y los sitios y sistemas web.</p></li>
      <li><h3>Hardware</h3><p>El montaje, las conexiones eléctricas, la soldadura y las pruebas de seguridad.</p></li>
      <li><h3>Diseño y presentación</h3><p>El modelado e impresión 3D de las carcasas y la presentación de cada proyecto.</p></li>
    </ul>
    <p style="margin-top:44px;"><a href="/equipo" class="tlink">Conocé al equipo</a></p>
  </div>
</section>

<section class="sec">
  <div class="wrap split">
    <div class="head" style="margin-bottom:0;">
      <h2>Preguntas frecuentes.</h2>
      <p>Si no encontrás tu respuesta, <a href="/contacto" style="color:var(--link);text-decoration:underline;">escribinos</a>.</p>
    </div>
    <div class="faq">
      <details><summary>¿Puedo contratar solo una parte, por ejemplo la web?</summary><p>Sí. Cada servicio se puede contratar por separado o combinado en un mismo proyecto.</p></details>
      <details><summary>¿Cómo pido un presupuesto?</summary><p>Completá el <a href="/contacto">formulario de contacto</a> o escribinos por email. Relevamos tu caso y te enviamos el presupuesto antes de empezar.</p></details>
      <details><summary>¿Trabajan con hogares o solo con empresas?</summary><p>Trabajamos con hogares, instituciones y comercios.</p></details>
      <details><summary>¿Qué pasa si algo falla después de la entrega?</summary><p>Registramos la falla, la diagnosticamos, la corregimos y te informamos la causa y cómo quedó resuelta.</p></details>
    </div>
  </div>
</section>

<?php include __DIR__ . '/../partials/cta.php'; ?>
