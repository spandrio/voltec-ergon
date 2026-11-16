<?php
/**
 * views/site/contacto.php
 * Renderizado por PhpRenderer en GET/POST /contacto dentro de layouts/site.php.
 * Variables disponibles: $enviado (bool), $errores (array), $old (array).
 */
$enviado = $enviado ?? false;
$errores = $errores ?? [];
$old = $old ?? [];
$servicios = ["web" => "Desarrollo web a medida", "iot" => "Electrónica e IoT", "auditoria" => "Auditoría energética", "soporte" => "Soporte y mantenimiento"];
?>
<section class="page-header">
  <div class="wrap">
    <h1>Contanos qué necesitás.</h1>
    <p class="lead">Completá el formulario y te respondemos con una propuesta. Si preferís, escribinos directamente por email.</p>
  </div>
</section>

<section class="sec">
  <div class="wrap contact">
    <div class="form">
      <?php if ($enviado): ?>
        <div class="msg ok" role="status"><b>Recibimos tu consulta.</b> Te vamos a escribir al email que dejaste.</div>
        <a href="/" class="tlink">Volver al inicio</a>
      <?php else: ?>
        <?php if (!empty($errores)): ?>
          <div class="msg err" role="alert">
            <b>Revisá estos datos antes de enviar:</b>
            <ul>
              <?php foreach ($errores as $error): ?><li><?= html($error) ?></li><?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
        <form method="POST" action="/contacto">
          <div class="field">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" autocomplete="name" value="<?= html($old['nombre'] ?? '') ?>" required>
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" autocomplete="email" value="<?= html($old['email'] ?? '') ?>" required>
          </div>
          <div class="field">
            <label for="servicio">Servicio que te interesa</label>
            <select id="servicio" name="servicio">
              <?php foreach ($servicios as $valor => $texto): ?>
                <option value="<?= html($valor) ?>" <?= ($old['servicio'] ?? '') === $valor ? 'selected' : '' ?>><?= html($texto) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="field">
            <label for="mensaje">Qué querés resolver</label>
            <textarea id="mensaje" name="mensaje" required><?= html($old['mensaje'] ?? '') ?></textarea>
          </div>
          <button type="submit" class="btn btn-ink" style="width:100%;">Enviar consulta</button>
          <p class="note">Al enviar aceptás nuestra <a href="/privacidad">Política de Privacidad</a>. Usamos tus datos solo para responderte.</p>
        </form>
      <?php endif; ?>
    </div>

    <div>
      <dl class="ways">
        <div><dt>Email</dt><dd><a href="mailto:ergonvoltec@gmail.com">ergonvoltec@gmail.com</a></dd></div>
        <div><dt>Institución</dt><dd>E.E.S.T. N°4 de Berazategui, con Fundación YPF</dd></div>
        <div><dt>Proyecto técnico</dt><dd><a href="https://github.com/spandrio/voltec">Repositorio de Voltec</a></dd></div>
      </dl>
      <div class="faq" style="margin-top:48px;">
        <details><summary>¿Cuánto tardan en responder?</summary><p>Leemos cada consulta y te respondemos por email con los pasos a seguir.</p></details>
        <details><summary>¿Qué datos míos guardan?</summary><p>Solo los que dejás en el formulario, para responderte. Está explicado en la <a href="/privacidad">Política de Privacidad</a>.</p></details>
        <details><summary>¿Puedo pedir más de un servicio?</summary><p>Sí. Elegí el principal en el formulario y contanos el resto en el mensaje.</p></details>
      </div>
    </div>
  </div>
</section>
