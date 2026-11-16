<?php
/**
 * views/site/home.php
 * Renderizado por PhpRenderer en GET / dentro de layouts/site.php.
 * El inicio presenta a la consultora; los clientes tienen su propio apartado en /clientes.
 */
$ico = [
  "web" => '<path d="M3 5h18v12H3z"/><path d="M8 21h8M12 17v4M7 9l2 2-2 2M12 13h4"/>',
  "iot" => '<rect x="7" y="7" width="10" height="10" rx="1.5"/><path d="M10 3v4M14 3v4M10 17v4M14 17v4M3 10h4M3 14h4M17 10h4M17 14h4"/>',
  "aud" => '<path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/><path d="M15 6l2 2 4-4"/>',
  "sop" => '<path d="M12 3a9 9 0 1 0 9 9"/><path d="M12 7v5l3 2M17 3h4v4M21 3l-5 5"/>',
];
$svg = fn(string $k, int $s = 26) => '<svg viewBox="0 0 24 24" width="' . $s . '" height="' . $s . '" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $ico[$k] . '</svg>';
$tecnologias = ["PHP", "Slim", "MySQL", "HTML y CSS", "JavaScript", "ESP32", "Arduino (C++)", "Sensores PZEM-004T", "Relés", "Diseño CAD", "Impresión 3D", "Flutter", "Git y GitHub"];
?>
<section class="hero-dark">
  <div class="wrap hero-grid">
    <div>
      <span class="eyebrow">Consultora de tecnología</span>
      <h1>Soluciones a medida, desde el relevamiento hasta que <em>funcionan</em>.</h1>
      <p class="lead">Voltec Ergon desarrolla sitios y sistemas web, arma soluciones con electrónica e IoT y hace auditorías de consumo eléctrico. Cada proyecto se presupuesta, se diseña y se entrega probado.</p>
      <div class="hero-actions">
        <a href="/contacto" class="btn btn-light">Pedir un presupuesto</a>
        <a href="/servicios" class="btn btn-outline">Ver servicios</a>
      </div>
      <ul class="hero-points">
        <li>4 servicios</li>
        <li>Software y hardware en un mismo equipo</li>
        <li>Presupuesto por escrito</li>
      </ul>
    </div>

    <aside class="hero-card need-card" aria-label="Elegí qué necesitás resolver">
      <div class="hc-top">
        <span class="hc-label">¿Qué necesitás resolver?</span>
        <span class="pill green">Elegí un servicio</span>
      </div>
      <a class="need" href="/servicios#web"><span class="ni"><?= $svg("web", 20) ?></span><span><b>Un sitio o sistema web</b><small>Institucional, catálogo o gestión con usuarios</small></span><i>→</i></a>
      <a class="need" href="/servicios#iot"><span class="ni"><?= $svg("iot", 20) ?></span><span><b>Medir o controlar algo</b><small>Prototipos con sensores, relés y su carcasa 3D</small></span><i>→</i></a>
      <a class="need" href="/servicios#auditoria"><span class="ni"><?= $svg("aud", 20) ?></span><span><b>Saber cuánto consumo</b><small>Auditoría por artefacto con costo y CO₂</small></span><i>→</i></a>
      <a class="need" href="/servicios#soporte"><span class="ni"><?= $svg("sop", 20) ?></span><span><b>Que algo vuelva a funcionar</b><small>Soporte y mantenimiento con informe</small></span><i>→</i></a>
      <p class="need-foot">¿No sabés cuál es? <a href="/contacto">Contanos el problema</a> y te orientamos.</p>
    </aside>
  </div>
</section>

<div class="tech-strip" aria-label="Tecnologías con las que trabajamos">
  <div class="tech-track">
    <?php foreach ([...$tecnologias, ...$tecnologias] as $i => $t): ?>
      <span<?= $i >= count($tecnologias) ? ' aria-hidden="true"' : '' ?>><?= html($t) ?></span>
    <?php endforeach; ?>
  </div>
</div>

<section class="bg-white">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="eyebrow">Lo que hacemos</span>
      <h2>Cuatro servicios para organizaciones que necesitan resolver algo con tecnología</h2>
      <p>Trabajamos con hogares, instituciones y comercios. Podés contratar un servicio solo o el proyecto completo.</p>
    </div>
    <div class="service-grid">
      <a class="service-card reveal" href="/servicios#web">
        <div class="ico"><?= $svg("web") ?></div>
        <h4>Desarrollo web a medida</h4>
        <p>Sitios institucionales, catálogos y sistemas de gestión con usuarios y base de datos.</p>
        <span class="link">Ver más →</span>
      </a>
      <a class="service-card reveal" href="/servicios#iot">
        <div class="ico"><?= $svg("iot") ?></div>
        <h4>Electrónica e IoT</h4>
        <p>Prototipos con microcontroladores, sensores y relés, con su carcasa diseñada e impresa en 3D.</p>
        <span class="link">Ver más →</span>
      </a>
      <a class="service-card reveal" href="/servicios#auditoria">
        <div class="ico"><?= $svg("aud") ?></div>
        <h4>Auditoría energética</h4>
        <p>Medimos cuánto consume cada artefacto y entregamos un informe con costo y huella de carbono.</p>
        <span class="link">Ver más →</span>
      </a>
      <a class="service-card reveal" href="/servicios#soporte">
        <div class="ico"><?= $svg("sop") ?></div>
        <h4>Soporte y mantenimiento</h4>
        <p>Registramos cada falla, la corregimos y te informamos qué pasó y cómo quedó resuelta.</p>
        <span class="link">Ver más →</span>
      </a>
    </div>
  </div>
</section>

<section>
  <div class="wrap why-grid">
    <div class="section-head reveal" style="margin-bottom:0;">
      <span class="eyebrow">Por qué elegirnos</span>
      <h2>Una consultora chica, con todo el proyecto en las mismas manos</h2>
      <p>No tercerizamos partes: el mismo equipo releva, diseña, construye y da soporte.</p>
    </div>
    <div class="why-list">
      <div class="why reveal"><b>01</b><div><h4>Software y hardware juntos</h4><p>Si tu solución necesita una placa, un sensor y una página web, lo resolvemos todo sin intermediarios.</p></div></div>
      <div class="why reveal"><b>02</b><div><h4>Presupuesto antes de empezar</h4><p>Relevamos el caso y te pasamos un presupuesto por escrito. Nada se construye sin que lo apruebes.</p></div></div>
      <div class="why reveal"><b>03</b><div><h4>Entregado probado y documentado</h4><p>Cada entrega se prueba con vos y lleva su manual. Después seguimos disponibles para las fallas.</p></div></div>
    </div>
  </div>
</section>

<section class="bg-white">
  <div class="wrap">
    <div class="section-head reveal">
      <span class="eyebrow">Cómo trabajamos</span>
      <h2>El mismo recorrido en todos los proyectos</h2>
    </div>
    <div class="process-grid linked">
      <div class="process-step reveal">
        <div class="n">1</div>
        <h4>Solicitud y presupuesto</h4>
        <p>Nos contás qué necesitás, relevamos el caso y te enviamos un presupuesto.</p>
      </div>
      <div class="process-step reveal">
        <div class="n">2</div>
        <h4>Diseño</h4>
        <p>Definimos pantallas, circuito o plan de medición, y lo acordamos antes de construir.</p>
      </div>
      <div class="process-step reveal">
        <div class="n">3</div>
        <h4>Desarrollo o instalación</h4>
        <p>Programamos, armamos y probamos. Vas viendo los avances.</p>
      </div>
      <div class="process-step reveal">
        <div class="n">4</div>
        <h4>Entrega y soporte</h4>
        <p>Entregamos la solución con su manual y seguimos disponibles para las fallas.</p>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="section-head reveal" style="margin-bottom:34px;">
      <span class="eyebrow">Clientes</span>
      <h2>Organizaciones que confiaron en nosotros</h2>
      <p>Cada cliente tiene su propio caso en el apartado de clientes.</p>
    </div>
    <div class="client-row">
      <a class="client-card featured reveal" href="/clientes/voltec">
        <div class="client-top">
          <span class="client-logo" aria-hidden="true">V</span>
          <span class="badge">Nuestro cliente más grande</span>
        </div>
        <h3>Voltec</h3>
        <p>Diseñamos y armamos para Voltec un medidor de consumo eléctrico por artefacto, con corte por relé, dentro de la caja Eco Smart Grid.</p>
        <div class="client-tags"><span>Electrónica e IoT</span><span>Desarrollo web</span><span>Diseño 3D</span></div>
        <span class="link">Ver el caso de Voltec →</span>
      </a>
      <a class="client-card next reveal" href="/contacto">
        <span class="plus" aria-hidden="true">+</span>
        <h3>Tu organización</h3>
        <p>¿Tenés un problema que se resuelve con tecnología? Puede ser nuestro próximo caso.</p>
        <span class="link">Contanos tu proyecto →</span>
      </a>
    </div>
  </div>
</section>

<section id="contacto" class="bg-white">
  <div class="cta-band">
    <div>
      <h2>¿Tenés un proyecto o un problema para resolver?</h2>
      <p>Contanos qué necesitás y te respondemos con una propuesta.</p>
    </div>
    <a href="/contacto" class="btn btn-light">Pedir un presupuesto</a>
  </div>
</section>
