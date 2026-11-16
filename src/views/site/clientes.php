<?php
/**
 * views/site/clientes.php
 * Renderizado por PhpRenderer en GET /clientes dentro de layouts/site.php.
 * Listado de clientes de la consultora; cada uno enlaza a su caso.
 */
?>
<section class="page-header">
  <div class="wrap">
    <h1>Nuestros clientes.</h1>
    <p class="lead">Voltec Ergon toma proyectos de distintas organizaciones. Acá está cada cliente y lo que hicimos para él.</p>
  </div>
</section>

<section class="sec inkbg">
  <div class="wrap feature">
    <div>
      <span class="tag">Nuestro cliente más grande hasta ahora</span>
      <h2>Voltec</h2>
      <p class="big">Para Voltec diseñamos y armamos un medidor de consumo eléctrico por artefacto, con corte por relé, montado en la caja Eco Smart Grid. El proyecto se presentó en la convocatoria de Fundación YPF.</p>
      <dl class="facts">
        <div><dt>Servicios</dt><dd>Electrónica, web y diseño 3D</dd></div>
        <div><dt>Dispositivo</dt><dd>ESP32, 3 sensores y 3 relés</dd></div>
        <div><dt>Estado</dt><dd>Prototipo funcionando; nube en diseño</dd></div>
      </dl>
      <div class="feature-actions">
        <a href="/clientes/voltec" class="btn btn-yellow">Ver el caso completo</a>
        <a href="https://github.com/spandrio/voltec" class="tlink">Repositorio del proyecto</a>
      </div>
    </div>
    <?php include __DIR__ . '/../partials/caja.php'; ?>
  </div>
</section>

<section class="sec">
  <div class="wrap">
    <div class="head">
      <h2>El próximo caso puede ser el tuyo.</h2>
      <p>Estos son los tipos de organización con los que trabajamos y lo que suelen necesitar.</p>
    </div>
    <div class="prospects">
      <a href="/contacto"><h3>Hogares</h3><p>Saber qué artefacto consume más y cuánto cuesta.</p><span>Pedir un presupuesto</span></a>
      <a href="/contacto"><h3>Instituciones</h3><p>Sistemas web con usuarios, catálogos y paneles de gestión.</p><span>Pedir un presupuesto</span></a>
      <a href="/contacto"><h3>Comercios</h3><p>Medir, controlar y automatizar equipos con sensores y relés.</p><span>Pedir un presupuesto</span></a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/../partials/cta.php'; ?>
