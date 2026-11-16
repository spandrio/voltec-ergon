<?php
/**
 * views/partials/caja.php
 * Esquema en línea de la caja Eco Smart Grid: pantalla, ESP32, tres medidores y tres tomas con su relé.
 * Se incluye desde el inicio, clientes y el caso de Voltec.
 */
?>
<svg class="caja" viewBox="0 0 520 400" role="img" aria-labelledby="caja-t caja-d">
  <title id="caja-t">Esquema de la caja Eco Smart Grid</title>
  <desc id="caja-d">Una caja con pantalla y botones; adentro un ESP32 conectado a tres sensores de consumo y tres relés, uno por cada toma.</desc>
  <rect x="40" y="40" width="440" height="320" rx="18" class="c-box"/>
  <rect x="70" y="70" width="170" height="104" rx="6" class="c-screen"/>
  <path d="M86 140 L104 118 L120 130 L138 100 L156 122 L174 108 L192 126 L222 96" class="c-plot"/>
  <circle cx="92" cy="200" r="9" class="c-btn"/><circle cx="122" cy="200" r="9" class="c-btn"/><circle cx="152" cy="200" r="9" class="c-btn"/>
  <rect x="300" y="78" width="140" height="84" rx="6" class="c-chip"/>
  <text x="370" y="126" class="c-label">ESP32</text>
  <path d="M240 122 H300" class="c-wire c-blue"/>
  <?php foreach ([0, 1, 2] as $i): $x = 110 + $i * 150; ?>
    <rect x="<?= $x - 34 ?>" y="236" width="68" height="40" rx="5" class="c-sensor"/>
    <text x="<?= $x ?>" y="261" class="c-small">PZEM</text>
    <path d="M<?= $x ?> 236 V214 H<?= 330 + $i * 40 ?> V162" class="c-wire c-blue"/>
    <rect x="<?= $x - 26 ?>" y="298" width="52" height="34" rx="17" class="c-plug"/>
    <circle cx="<?= $x - 9 ?>" cy="315" r="3.4" class="c-hole"/><circle cx="<?= $x + 9 ?>" cy="315" r="3.4" class="c-hole"/>
    <path d="M<?= $x ?> 276 V298" class="c-wire c-yellow"/>
  <?php endforeach; ?>
</svg>
