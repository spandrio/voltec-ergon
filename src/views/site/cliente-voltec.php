<?php
/**
 * views/site/cliente-voltec.php
 * Renderizado por PhpRenderer en GET /clientes/voltec dentro de layouts/site.php.
 * Caso completo del cliente Voltec: problema, solución, componentes y huella de carbono.
 */
?>
<section class="page-header">
  <div class="wrap">
    <a href="/clientes" class="back">Todos los clientes</a>
    <h1>Caso Voltec.</h1>
    <p class="lead">Nuestro cliente más grande hasta ahora. Para Voltec hicimos un medidor de consumo eléctrico por artefacto, montado en la caja Eco Smart Grid y presentado en la convocatoria de Fundación YPF.</p>
  </div>
</section>

<section class="sec">
  <div class="wrap split">
    <div>
      <h2>La factura dice cuánto se pagó. No dice por qué.</h2>
      <p style="margin-top:18px;color:var(--ink-2);font-size:18px;">Un número acumulado a fin de mes no permite saber qué artefacto gasta de más, ni cuánto se pierde en aparatos que parecen apagados.</p>
      <div class="bill">
        <div><span>Factura eléctrica del mes</span><span class="bill-tag">Sin detalle</span></div>
        <div><span>Consumo total</span><b>312 kWh</b></div>
        <div><span>¿Qué artefacto consumió más?</span><b>—</b></div>
        <div><span>¿Cuánto se perdió en standby?</span><b>—</b></div>
      </div>
      <p class="fine">Factura de ejemplo, con valores ilustrativos.</p>
    </div>
    <ul class="probs">
      <li><h3>Consumo en standby</h3><p>Aparatos que parecen apagados y siguen tomando corriente todo el día.</p></li>
      <li><h3>Sin detalle por artefacto</h3><p>La factura junta todo el consumo en un solo número.</p></li>
      <li><h3>Impacto ambiental que no se ve</h3><p>Nadie sabe cuánto CO₂ genera lo que deja enchufado.</p></li>
    </ul>
  </div>
</section>

<section class="sec paper">
  <div class="wrap">
    <div class="head">
      <h2>Qué hace el dispositivo.</h2>
      <p>Separamos lo que ya funciona en el prototipo de lo que está diseñado para la próxima etapa.</p>
    </div>
    <ol class="steps five">
      <li><h3>Mide</h3><p>Tres sensores PZEM-004T leen voltaje, corriente, potencia y energía de cada artefacto.</p></li>
      <li><h3>Procesa</h3><p>Un ESP32 lee los tres sensores y calcula los valores.</p></li>
      <li><h3>Muestra</h3><p>Una pantalla TFT de 2,2" presenta las mediciones y se recorre con botones.</p></li>
      <li><h3>Corta</h3><p>Un botón por artefacto acciona su relé para cortar el suministro.</p></li>
      <li class="next"><h3>Próxima etapa</h3><p>Wi-Fi, registro en la nube y la app Energhost. Está diseñado, todavía no programado.</p></li>
    </ol>
  </div>
</section>

<section class="sec bg-white">
  <div class="wrap feature">
    <?php include __DIR__ . '/../partials/caja.php'; ?>
    <div>
      <h2 style="font-size:clamp(30px,3.8vw,50px);">Qué lleva la caja Eco Smart Grid.</h2>
      <p style="margin:16px 0 28px;color:var(--ink-2);font-size:18px;">Todo va montado en una caja diseñada en CAD e impresa en 3D.</p>
      <dl class="specs">
        <div><dt>Microcontrolador</dt><dd>ESP32</dd></div>
        <div><dt>Sensores</dt><dd>3 × PZEM-004T V3.0</dd></div>
        <div><dt>Actuadores</dt><dd>3 relés de 5 V</dd></div>
        <div><dt>Pantalla</dt><dd>TFT 2,2" ILI9341</dd></div>
        <div><dt>Programa</dt><dd>Arduino (C++)</dd></div>
        <div><dt>Sitio web</dt><dd>PHP, Slim y MySQL</dd></div>
      </dl>
    </div>
  </div>
</section>

<section class="sec inkbg">
  <div class="wrap feature">
    <div>
      <h2 style="font-size:clamp(30px,3.8vw,50px);">Cada kWh que se ahorra es CO₂ que no se emite.</h2>
      <p style="margin-top:16px;font-size:18px;">El cálculo usa el factor de emisión promedio de la red eléctrica argentina: 0,325 kg de CO₂ por cada kWh consumido.</p>
      <div class="stat-row">
        <div><div class="num">0,49 kg</div><div class="lbl">CO₂ por día, heladera de 1,5 kWh</div></div>
        <div><div class="num">0,10 kg</div><div class="lbl">CO₂, licuadora de 0,3 kWh</div></div>
      </div>
    </div>
    <div class="calc">
      <label for="kwh">Simulá un consumo mensual</label>
      <input type="range" id="kwh" min="10" max="500" value="150">
      <div class="val-row"><span>Consumo</span><b id="kwhVal">150 kWh</b></div>
      <div class="calc-result">
        <div class="box"><div class="l">Huella de carbono</div><div class="v" id="co2Val">48,75 kg</div></div>
        <div class="box amber"><div class="l">Costo estimado</div><div class="v" id="costVal">$ 40.500</div></div>
      </div>
      <p class="calc-note">Costo calculado con una tarifa de ejemplo de $ 270 por kWh.</p>
    </div>
  </div>
</section>

<?php include __DIR__ . '/../partials/cta.php'; ?>

<script>
(function () {
  var kwhInput = document.getElementById('kwh');
  var kwhVal = document.getElementById('kwhVal');
  var co2Val = document.getElementById('co2Val');
  var costVal = document.getElementById('costVal');
  var TARIFA = 270;
  function updateCalc() {
    var kwh = parseFloat(kwhInput.value);
    kwhVal.textContent = kwh + ' kWh';
    co2Val.textContent = (kwh * 0.325).toFixed(2).replace('.', ',') + ' kg';
    costVal.textContent = '$ ' + Math.round(kwh * TARIFA).toLocaleString('es-AR');
  }
  kwhInput.addEventListener('input', updateCalc);
  updateCalc();
})();
</script>
