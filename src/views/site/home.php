<?php
/**
 * views/site/home.php
 * Renderizado por PhpRenderer en GET / dentro de layouts/site.php.
 */
$ico = [
  "web" => '<path d="M3 5h18v12H3z"/><path d="M8 21h8M12 17v4M7 9l2 2-2 2M12 13h4"/>',
  "iot" => '<rect x="7" y="7" width="10" height="10" rx="1.5"/><path d="M10 3v4M14 3v4M10 17v4M14 17v4M3 10h4M3 14h4M17 10h4M17 14h4"/>',
  "aud" => '<path d="M4 20V10M10 20V4M16 20v-7M22 20H2"/><path d="M15 6l2 2 4-4"/>',
  "sop" => '<path d="M12 3a9 9 0 1 0 9 9"/><path d="M12 7v5l3 2M17 3h4v4M21 3l-5 5"/>',
];
$svg = fn(string $k) => '<svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $ico[$k] . '</svg>';
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
        <li>3 comisiones técnicas</li>
        <li>Proyecto institucional E.E.S.T. N°4</li>
      </ul>
    </div>

    <aside class="hero-card" aria-label="Proyecto en curso">
      <div class="hc-top">
        <span class="hc-label">Proyecto en curso</span>
        <span class="pill">Cliente: E.E.S.T. N°4</span>
      </div>
      <h3>Eco Smart Grid</h3>
      <p>Medidor de consumo eléctrico para tres artefactos, con corte por relé.</p>
      <ol class="stages">
        <li class="done"><span>Relevamiento y presupuesto</span><b>Hecho</b></li>
        <li class="done"><span>Diseño del circuito y la caja</span><b>Hecho</b></li>
        <li class="done"><span>Prototipo con pantalla y relés</span><b>Hecho</b></li>
        <li><span>Conexión a la nube y app</span><b>En diseño</b></li>
      </ol>
      <a href="/trabajos" class="hc-link">Ver el caso completo →</a>
    </aside>
  </div>
</section>

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
  <div class="wrap">
    <div class="section-head reveal">
      <span class="eyebrow">Cómo trabajamos</span>
      <h2>El mismo recorrido en todos los proyectos</h2>
    </div>
    <div class="process-grid">
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

<section class="bg-white">
  <div class="wrap">
    <div class="section-head reveal" style="margin-bottom:34px;">
      <span class="eyebrow">Trabajos</span>
      <h2>Un proyecto hecho para un cliente</h2>
    </div>
    <div class="case-card reveal">
      <div>
        <div class="tags"><span>Electrónica</span><span>ESP32</span><span>PZEM-004T</span><span>Impresión 3D</span></div>
        <h3>Eco Smart Grid</h3>
        <p>Un prototipo que mide voltaje, corriente y potencia de tres artefactos, muestra los valores en una pantalla y permite cortar cada uno con un relé.</p>
        <a href="/trabajos" class="btn btn-ghost">Ver caso completo →</a>
        <div class="case-stats">
          <div><div class="num">3</div><div class="lbl">Artefactos medidos</div></div>
          <div><div class="num">0.325</div><div class="lbl">kg CO₂ por kWh (factor AR)</div></div>
        </div>
      </div>
      <div class="device-visual">
        <div class="ring r1"></div>
        <div class="ring r2"></div>
        <div class="core"><span>ESP32</span></div>
        <div class="float-tag t1">PZEM-004T</div>
        <div class="float-tag t2">Relé 220V</div>
        <div class="float-tag t3">Pantalla TFT</div>
      </div>
    </div>
  </div>
</section>

<section id="contacto">
  <div class="cta-band">
    <div>
      <h2>¿Tenés un proyecto o un problema para resolver?</h2>
      <p>Contanos qué necesitás y te respondemos con una propuesta.</p>
    </div>
    <a href="/contacto" class="btn btn-primary">Pedir un presupuesto</a>
  </div>
</section>
