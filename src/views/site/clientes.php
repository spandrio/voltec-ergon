<?php
/**
 * views/site/clientes.php
 * Renderizado por PhpRenderer en GET /clientes dentro de layouts/site.php.
 * Listado de clientes de la consultora; cada uno enlaza a su caso.
 */
?>
<section class="page-header">
  <div class="wrap reveal">
    <span class="eyebrow">Clientes</span>
    <h1>Trabajos hechos para nuestros clientes</h1>
    <p class="lead">Voltec Ergon es una consultora: tomamos proyectos de distintas organizaciones. Acá está cada cliente con lo que hicimos para él.</p>
  </div>
</section>

<section class="bg-white" style="padding-top:30px;">
  <div class="wrap">
    <article class="client-feature reveal">
      <div class="cf-body">
        <div class="client-top">
          <span class="client-logo" aria-hidden="true">V</span>
          <span class="badge">Nuestro cliente más grande hasta el momento</span>
        </div>
        <h2>Voltec</h2>
        <p class="cf-lead">Para Voltec diseñamos y armamos un medidor de consumo eléctrico por artefacto, con corte por relé, montado en la caja <b>Eco Smart Grid</b>. El proyecto se presentó en la convocatoria de Fundación YPF.</p>
        <dl class="cf-facts">
          <div><dt>Servicios</dt><dd>Electrónica e IoT · Desarrollo web · Diseño 3D</dd></div>
          <div><dt>Estado</dt><dd>Prototipo funcionando; conexión a la nube en diseño</dd></div>
          <div><dt>Dispositivo</dt><dd>ESP32 · 3 × PZEM-004T · 3 relés · pantalla TFT</dd></div>
          <div><dt>Equipo</dt><dd>3 comisiones: software, hardware y diseño</dd></div>
        </dl>
        <div class="cf-actions">
          <a href="/clientes/voltec" class="btn btn-primary">Ver el caso completo →</a>
          <a href="https://github.com/spandrio/voltec" class="btn btn-ghost">Repositorio</a>
        </div>
      </div>
      <div class="device-visual cf-visual">
        <div class="ring r1"></div>
        <div class="ring r2"></div>
        <div class="core"><span>ESP32</span></div>
        <div class="float-tag t1">PZEM-004T</div>
        <div class="float-tag t2">Relé 220V</div>
        <div class="float-tag t3">Caja Eco Smart Grid</div>
      </div>
    </article>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="section-head reveal" style="margin-bottom:30px;">
      <span class="eyebrow">Próximos clientes</span>
      <h2>El próximo caso puede ser el tuyo</h2>
      <p>Tomamos proyectos de desarrollo web, electrónica e IoT, auditoría energética y soporte.</p>
    </div>
    <div class="client-row three">
      <a class="client-card next reveal" href="/contacto"><span class="plus" aria-hidden="true">+</span><h3>Hogares</h3><p>Saber qué artefacto consume más y cuánto cuesta.</p><span class="link">Pedir presupuesto →</span></a>
      <a class="client-card next reveal" href="/contacto"><span class="plus" aria-hidden="true">+</span><h3>Instituciones</h3><p>Sistemas web con usuarios, catálogos y paneles de gestión.</p><span class="link">Pedir presupuesto →</span></a>
      <a class="client-card next reveal" href="/contacto"><span class="plus" aria-hidden="true">+</span><h3>Comercios</h3><p>Medir, controlar y automatizar equipos con sensores y relés.</p><span class="link">Pedir presupuesto →</span></a>
    </div>
  </div>
</section>
