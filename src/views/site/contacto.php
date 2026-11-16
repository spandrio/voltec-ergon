<?php
/**
 * views/site/contacto.php
 * Renderizado por PhpRenderer en GET/POST /contacto dentro de layouts/site.php.
 * Variables disponibles: $enviado (bool), $errores (array), $old (array).
 */
$enviado = $enviado ?? false;
$errores = $errores ?? [];
$old = $old ?? [];
?>
<section class="page-header">
  <div class="wrap reveal">
    <span class="eyebrow">Contacto</span>
    <h1>Contanos qué necesitás.</h1>
    <p class="lead">Completá el formulario con tu consulta y te respondemos con una propuesta.</p>
  </div>
</section>

<section class="bg-white" style="padding-top:20px;">
  <div class="wrap contact-grid">
    <div>
      <div class="contact-card reveal-left">
        <div class="ico">@</div>
        <div><h5>Email</h5><a href="mailto:ergonvoltec@gmail.com">ergonvoltec@gmail.com</a></div>
      </div>
      <div class="contact-card reveal-left" style="transition-delay:.06s;">
        <div class="ico">#</div>
        <div><h5>Institución</h5><p>E.E.S.T. N°4 de Berazategui — Proyecto institucional con Fundación YPF</p></div>
      </div>
      <div class="contact-card reveal-left" style="transition-delay:.18s;">
        <div class="ico">→</div>
        <div><h5>Proyecto técnico</h5><a href="https://github.com/spandrio/voltec">Ver repositorio de Voltec</a></div>
      </div>
    </div>

    <div class="contact-form reveal">
      <?php if ($enviado): ?>
        <div style="background:rgba(15,184,138,.1);border:1px solid rgba(15,184,138,.35);border-radius:10px;padding:16px 18px;color:#0A7A5C;font-size:14.5px;">
          <b>¡Listo!</b> Recibimos tu consulta. Te vamos a contactar a la brevedad.
        </div>
      <?php else: ?>
        <?php if (!empty($errores)): ?>
          <div style="background:rgba(214,69,69,.08);border:1px solid rgba(214,69,69,.3);border-radius:10px;padding:14px 18px;margin-bottom:18px;color:#B0392E;font-size:13.5px;">
            <ul style="padding-left:18px;">
              <?php foreach ($errores as $error): ?>
                <li><?= html($error) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
        <form method="POST" action="/contacto">
          <div class="field">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?= html($old['nombre'] ?? '') ?>" placeholder="Tu nombre">
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= html($old['email'] ?? '') ?>" placeholder="tu@email.com">
          </div>
          <div class="field">
            <label for="servicio">Servicio que te interesa</label>
            <select id="servicio" name="servicio">
              <?php foreach (["web" => "Desarrollo web a medida", "iot" => "Electrónica e IoT", "auditoria" => "Auditoría energética", "soporte" => "Soporte y mantenimiento"] as $valor => $texto): ?>
                <option value="<?= html($valor) ?>" <?= ($old['servicio'] ?? '') === $valor ? 'selected' : '' ?>><?= html($texto) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="field">
            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="mensaje" placeholder="Contanos qué querés resolver..."><?= html($old['mensaje'] ?? '') ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;">Enviar consulta</button>
          <p style="font-size:12px;color:var(--ink-soft);margin-top:12px;text-align:center;">Al enviar este formulario aceptás nuestra <a href="/privacidad" style="color:var(--blue-brand);">Política de Privacidad</a>.</p>
        </form>
      <?php endif; ?>
    </div>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="section-head reveal" style="margin:0 auto 30px;text-align:center;max-width:560px;">
      <span class="eyebrow">Preguntas frecuentes</span>
      <h2>Antes de escribirnos</h2>
    </div>
    <div class="faq-list" style="margin:0 auto;">
      <details class="faq-item reveal">
        <summary>¿Qué servicios ofrecen?</summary>
        <div class="a">Desarrollo web a medida, electrónica e IoT, auditoría energética y soporte. El detalle está en la página de <a href="/servicios" style="color:var(--blue-brand);">Servicios</a>.</div>
      </details>
      <details class="faq-item reveal" style="transition-delay:.08s;">
        <summary>¿Cómo pido un presupuesto?</summary>
        <div class="a">Completá el formulario de esta página o escribinos por email. Relevamos tu caso y te enviamos un presupuesto antes de empezar.</div>
      </details>
      <details class="faq-item reveal" style="transition-delay:.16s;">
        <summary>¿Qué datos míos guardan?</summary>
        <div class="a">Solo los que dejás en el formulario, para responderte. Está explicado en la <a href="/privacidad" style="color:var(--blue-brand);">Política de Privacidad</a>.</div>
      </details>
    </div>
  </div>
</section>
