<?php
/**
 * views/site/trabajos.php
 * Renderizado por PhpRenderer en GET /trabajos dentro de layouts/site.php.
 */
?>
<section class="page-header">
  <div class="wrap reveal">
    <span class="eyebrow">Trabajos · Caso de un cliente</span>
    <h1>Voltec</h1>
    <p class="lead">Un medidor de consumo eléctrico por artefacto, montado en la caja Eco Smart Grid, hecho para YPF en la convocatoria de Fundación YPF, desarrollado desde la E.E.S.T. N°4 de Berazategui.</p>
  </div>
</section>

<section class="bg-white" style="padding-top:20px;">
  <div class="wrap two-col">
    <div>
      <div class="section-head reveal" style="margin-bottom:34px;">
        <span class="eyebrow">El problema del cliente</span>
        <h2>La factura dice cuánto se pagó. No dice por qué.</h2>
        <p>Un número acumulado a fin de mes no permite saber qué artefacto gasta de más, ni cuánto se pierde en aparatos que parecen apagados pero siguen consumiendo.</p>
      </div>
      <div class="bill reveal">
        <div><span>Factura eléctrica del mes</span><span class="bill-tag">Sin detalle</span></div>
        <div><span>Consumo total</span><span>312 kWh</span></div>
        <div><span>¿Qué artefacto consumió más?</span><span>—</span></div>
        <div><span>¿Cuánto se perdió en standby?</span><span>—</span></div>
      </div>
      <p class="fine reveal">Factura de ejemplo, con valores ilustrativos.</p>
    </div>
    <div class="prob-list">
      <div class="reveal-left"><b>01</b><div><h4>Consumo en standby</h4><p>Aparatos que parecen apagados y siguen tomando corriente todo el día.</p></div></div>
      <div class="reveal-left" style="transition-delay:.1s;"><b>02</b><div><h4>Sin detalle por artefacto</h4><p>La factura junta todo el consumo en un solo número.</p></div></div>
      <div class="reveal-left" style="transition-delay:.2s;"><b>03</b><div><h4>Impacto ambiental que no se ve</h4><p>Nadie sabe cuánto CO₂ genera lo que deja enchufado.</p></div></div>
    </div>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="section-head reveal">
      <span class="eyebrow">La solución</span>
      <h2>Qué hace el prototipo hoy y qué viene después</h2>
      <p>Separamos lo que ya funciona en el prototipo de lo que está diseñado para la próxima etapa.</p>
    </div>
    <div class="process-grid cols-5">
      <div class="process-step reveal"><div class="n">1</div><h4>Mide</h4><p>Tres sensores PZEM-004T leen voltaje, corriente, potencia y energía de cada artefacto.</p></div>
      <div class="process-step reveal"><div class="n">2</div><h4>Procesa</h4><p>Un ESP32 lee los tres sensores y calcula los valores.</p></div>
      <div class="process-step reveal"><div class="n">3</div><h4>Muestra</h4><p>Una pantalla TFT de 2,2" presenta las mediciones y se recorre con botones.</p></div>
      <div class="process-step reveal"><div class="n">4</div><h4>Corta</h4><p>Un botón por artefacto acciona su relé para cortar el suministro.</p></div>
      <div class="process-step next reveal"><div class="n">5</div><h4>Próxima etapa</h4><p>Conexión Wi-Fi, registro en la nube y la app Energhost. Está diseñado, todavía no programado.</p></div>
    </div>
  </div>
</section>

<section class="bg-white">
  <div class="wrap two-col center">
    <div class="device-visual reveal">
      <div class="ring r1"></div>
      <div class="ring r2"></div>
      <div class="core"><span>ESP32</span></div>
      <div class="float-tag t1">PZEM-004T</div>
      <div class="float-tag t2">Relé 220V</div>
      <div class="float-tag t3">Pantalla TFT</div>
    </div>
    <div class="reveal">
      <span class="eyebrow">Componentes</span>
      <h2 style="font-size:32px;margin:14px 0 14px;">Qué lleva adentro</h2>
      <p style="color:var(--ink-soft);font-size:15.5px;">Todo va montado en una caja diseñada en CAD e impresa en 3D.</p>
      <div class="spec-list">
        <div class="spec"><div class="k">Microcontrolador</div><div class="v">ESP32</div></div>
        <div class="spec"><div class="k">Sensores</div><div class="v">3 × PZEM-004T V3.0</div></div>
        <div class="spec"><div class="k">Actuadores</div><div class="v">3 relés de 5 V</div></div>
        <div class="spec"><div class="k">Pantalla</div><div class="v">TFT 2,2" ILI9341</div></div>
        <div class="spec"><div class="k">Programa</div><div class="v">Arduino (C++)</div></div>
        <div class="spec"><div class="k">Sitio web</div><div class="v">PHP, Slim y MySQL</div></div>
      </div>
    </div>
  </div>
</section>

<section class="bg-navy">
  <div class="wrap impact-grid reveal">
    <div class="impact-copy">
      <span class="eyebrow">Huella de carbono</span>
      <h2 style="font-size:32px;margin:14px 0 14px;">Cada kWh que se ahorra es CO₂ que no se emite</h2>
      <p>El cálculo usa el factor de emisión promedio de la red eléctrica argentina: 0,325 kg de CO₂ por cada kWh consumido.</p>
      <div class="stat-row">
        <div><div class="num">0,49 kg</div><div class="lbl">CO₂ por día · heladera de 1,5 kWh</div></div>
        <div><div class="num">0,10 kg</div><div class="lbl">CO₂ · licuadora, 0,3 kWh</div></div>
      </div>
    </div>
    <div class="calc">
      <label for="kwh">Simulá un consumo (kWh del mes)</label>
      <input type="range" id="kwh" min="10" max="500" value="150">
      <div class="val-row"><span>Consumo</span><b id="kwhVal">150 kWh</b></div>
      <div class="calc-result">
        <div class="box"><div class="l">Huella de carbono</div><div class="v" id="co2Val">48.75 kg</div></div>
        <div class="box amber"><div class="l">Costo estimado</div><div class="v" id="costVal">$ 40.500</div></div>
      </div>
      <p class="calc-note">Costo calculado con una tarifa de ejemplo de $ 270 por kWh.</p>
    </div>
  </div>
</section>

<section>
  <div class="wrap reveal" style="text-align:center;">
    <span class="eyebrow">¿Necesitás algo parecido?</span>
    <h2 style="margin-top:14px;font-size:30px;">Podemos hacer un proyecto así para tu organización</h2>
    <a href="/contacto" class="btn btn-primary" style="margin-top:22px;">Pedir un presupuesto →</a>
  </div>
</section>

<script>
const kwhInput = document.getElementById('kwh');
const kwhVal = document.getElementById('kwhVal');
const co2Val = document.getElementById('co2Val');
const costVal = document.getElementById('costVal');
const TARIFA = 270;

function updateCalc(){
  const kwh = parseFloat(kwhInput.value);
  kwhVal.textContent = kwh + ' kWh';
  co2Val.textContent = (kwh * 0.325).toFixed(2).replace('.', ',') + ' kg';
  costVal.textContent = '$ ' + Math.round(kwh * TARIFA).toLocaleString('es-AR');
}
kwhInput.addEventListener('input', updateCalc);
updateCalc();
</script>
