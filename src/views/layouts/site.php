<?php
/**
 * views/layouts/site.php
 * Layout compartido por las páginas públicas de la consultora (inicio, servicios, clientes, equipo, contacto y legales).
 * Variables disponibles: $content (html ya renderizado de la vista), $active (string, ruta activa para resaltar el nav).
 *
 * Sistema visual: colores de los cables de una instalación eléctrica (fase marrón, neutro celeste,
 * tierra verde y amarillo) sobre la tinta azul de la marca, y una sola familia tipográfica (Archivo)
 * que se ensancha en los títulos como las etiquetas de un tablero.
 */
$active = $active ?? '';
$navItems = [
  '/servicios' => 'Servicios',
  '/clientes' => 'Clientes',
  '/equipo' => 'Equipo',
  '/contacto' => 'Contacto',
];
$pageTitle = $title ?? 'Voltec Ergon';
$pageDescription = $description ?? 'Voltec Ergon: consultora de tecnología. Desarrollo web a medida, electrónica e IoT, auditoría energética y soporte.';
$canonicalUrl = $canonicalUrl ?? null;
$ogImage = $ogImage ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= html($pageTitle) ?></title>
<meta name="description" content="<?= html($pageDescription) ?>">
<?php if ($canonicalUrl): ?>
<link rel="canonical" href="<?= html($canonicalUrl) ?>">
<?php endif; ?>
<meta property="og:type" content="website">
<meta property="og:site_name" content="Voltec Ergon">
<meta property="og:locale" content="es_AR">
<meta property="og:title" content="<?= html($pageTitle) ?>">
<meta property="og:description" content="<?= html($pageDescription) ?>">
<?php if ($canonicalUrl): ?>
<meta property="og:url" content="<?= html($canonicalUrl) ?>">
<?php endif; ?>
<?php if ($ogImage): ?>
<meta property="og:image" content="<?= html($ogImage) ?>">
<?php endif; ?>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= html($pageTitle) ?>">
<meta name="twitter:description" content="<?= html($pageDescription) ?>">
<meta name="theme-color" content="#14213D">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo:wdth,wght@75..125,400..800&display=swap" rel="stylesheet">
<style>
:root{
  --ink:#14213D;          /* tinta de la marca */
  --ink-2:#46526A;        /* texto secundario */
  --paper:#F3F5F7;        /* papel frío */
  --white:#FFFFFF;
  --line:#D6DCE4;
  --yellow:#F2C200;       /* amarillo de seguridad eléctrica: acciones */
  --celeste:#4FA3D9;      /* cable neutro */
  --fase:#7A4A2A;         /* cable de fase */
  --tierra:#2E9E4F;       /* cable de tierra */
  --link:#1F6AAE;
  --f:'Archivo', system-ui, sans-serif;
  /* alias que usan las páginas legales */
  --navy-deep:var(--ink); --blue-brand:var(--link); --ink-soft:var(--ink-2);
}
*{box-sizing:border-box;margin:0;padding:0;}
html{scroll-behavior:smooth;}
body{font-family:var(--f);font-size:17px;line-height:1.6;color:var(--ink);background:var(--white);-webkit-font-smoothing:antialiased;}
img,svg{display:block;max-width:100%;}
a{color:inherit;text-decoration:none;}
ul,ol{list-style:none;}
:focus-visible{outline:3px solid var(--yellow);outline-offset:3px;border-radius:4px;}
.skip{position:absolute;left:-999px;top:12px;background:var(--yellow);color:var(--ink);padding:10px 16px;border-radius:6px;z-index:100;font-weight:700;}
.skip:focus{left:12px;}

h1,h2,h3,.wide{font-stretch:125%;font-weight:800;letter-spacing:-.01em;line-height:1.02;text-wrap:balance;}
h1{font-size:clamp(34px,6.2vw,84px);}
h2{font-size:clamp(30px,3.8vw,50px);}
h3{font-size:22px;font-weight:700;font-stretch:112%;line-height:1.15;}
p{text-wrap:pretty;}
.lead{font-size:clamp(18px,1.6vw,21px);line-height:1.55;color:var(--ink-2);max-width:60ch;}
.wrap{max-width:1200px;margin:0 auto;padding:0 32px;}
@media(max-width:600px){.wrap{padding:0 20px;}}
.sec{padding:112px 0;}
@media(max-width:700px){.sec{padding:72px 0;}}
.paper{background:var(--paper);}
.inkbg{background:var(--ink);color:#fff;}
.inkbg .lead,.inkbg p{color:#C9D3E4;}
.head{max-width:62ch;margin-bottom:56px;}
.head p{margin-top:18px;color:var(--ink-2);font-size:18px;}
.inkbg .head p{color:#C9D3E4;}

/* cables: firma visual */
.wires{display:grid;grid-template-rows:repeat(3,5px);gap:3px;}
.wires i{display:block;}
.wires i:nth-child(1){background:var(--fase);}
.wires i:nth-child(2){background:var(--celeste);}
.wires i:nth-child(3){background:repeating-linear-gradient(90deg,var(--tierra) 0 34px,var(--yellow) 34px 52px);}

/* botones */
.btn{display:inline-flex;align-items:center;justify-content:center;gap:10px;font-family:var(--f);font-size:16px;font-weight:700;font-stretch:105%;padding:15px 26px;border-radius:8px;border:2px solid transparent;cursor:pointer;transition:background .2s,color .2s,border-color .2s;}
.btn-yellow{background:var(--yellow);color:var(--ink);}
.btn-yellow:hover{background:#FFD633;}
.btn-ink{background:var(--ink);color:#fff;}
.btn-ink:hover{background:#22345C;}
.btn-line{border-color:currentColor;}
.btn-line:hover{background:rgba(127,140,160,.12);}
.tlink{font-weight:700;border-bottom:2px solid var(--yellow);padding-bottom:2px;}
.tlink:hover{border-color:currentColor;}

/* cabecera */
.top{position:sticky;top:0;z-index:50;background:rgba(255,255,255,.94);backdrop-filter:blur(10px);border-bottom:1px solid var(--line);}
.nav{display:flex;align-items:center;gap:32px;height:76px;}
.logo{display:flex;align-items:center;gap:12px;margin-right:auto;}
.logo svg{width:38px;height:38px;}
.logo b{font-stretch:125%;font-weight:800;font-size:19px;letter-spacing:.01em;}
.navl{display:flex;gap:30px;font-weight:600;font-size:16px;}
.navl a{padding:6px 0;border-bottom:3px solid transparent;}
.navl a:hover{border-color:var(--line);}
.navl a[aria-current="page"]{border-color:var(--yellow);}
.nav .btn{padding:11px 20px;font-size:15px;}
.mnav{display:none;position:relative;}
.mnav summary{list-style:none;cursor:pointer;width:46px;height:46px;border:2px solid var(--line);border-radius:8px;display:grid;place-items:center;}
.mnav summary::-webkit-details-marker{display:none;}
.mnav summary span,.mnav summary span::before,.mnav summary span::after{display:block;width:20px;height:2px;background:var(--ink);position:relative;transition:.2s;}
.mnav summary span::before,.mnav summary span::after{content:"";position:absolute;left:0;}
.mnav summary span::before{top:-7px;}
.mnav summary span::after{top:7px;}
.mnav[open] summary span{background:transparent;}
.mnav[open] summary span::before{top:0;transform:rotate(45deg);}
.mnav[open] summary span::after{top:0;transform:rotate(-45deg);}
.mnav-panel{position:absolute;right:0;top:58px;width:240px;background:#fff;border:1px solid var(--line);border-radius:10px;padding:8px;box-shadow:0 24px 48px -24px rgba(20,33,61,.45);display:flex;flex-direction:column;}
.mnav-panel a{padding:12px 14px;border-radius:6px;font-weight:600;}
.mnav-panel a:hover,.mnav-panel a[aria-current="page"]{background:var(--paper);}
@media(max-width:900px){.navl{display:none;}.mnav{display:block;}}
@media(max-width:520px){.nav .btn{display:none;}}

/* encabezado de páginas internas */
.page-header{padding:96px 0 64px;background:var(--paper);}
.page-header h1{font-size:clamp(32px,5vw,68px);max-width:18ch;}
.page-header .lead{margin-top:22px;}
.page-header .eyebrow{display:none;}
.back{display:inline-block;margin-bottom:22px;font-weight:600;color:var(--link);}
.back:hover{text-decoration:underline;}
.bg-white{background:var(--white);padding:72px 0 112px;}
.reveal{}

/* ---------- INICIO ---------- */
.hero{background:var(--ink);color:#fff;padding:72px 0 0;overflow:hidden;}
.hero-intro{font-size:18px;color:#C9D3E4;margin-bottom:26px;}
.hero h1{max-width:20ch;font-size:clamp(33px,5.2vw,74px);}
.hero-row{display:flex;justify-content:space-between;align-items:flex-end;gap:40px;flex-wrap:wrap;margin-top:34px;}
.hero-row .lead{color:#C9D3E4;max-width:52ch;}
.hero-actions{display:flex;gap:14px;flex-wrap:wrap;}
.hero .btn-line{color:#fff;}
.trace{margin-top:52px;border-top:1px solid rgba(255,255,255,.12);}
.trace svg{width:100%;height:auto;}
.trace .grid line{stroke:rgba(255,255,255,.07);stroke-width:1;}
.trace .cut{stroke:rgba(255,255,255,.22);stroke-width:1.5;stroke-dasharray:4 6;}
.trace .sig{fill:none;stroke:var(--yellow);stroke-width:3.5;stroke-linejoin:round;stroke-linecap:round;
  stroke-dasharray:var(--len);stroke-dashoffset:var(--len);animation:draw 2.6s cubic-bezier(.6,.05,.3,1) .3s forwards;filter:drop-shadow(0 0 6px rgba(242,194,0,.55));}
@keyframes draw{to{stroke-dashoffset:0;}}
.trace-cap{display:grid;grid-template-columns:repeat(3,1fr);border-top:1px solid rgba(255,255,255,.12);}
.trace-cap a{display:block;padding:26px 28px 34px;border-left:1px solid rgba(255,255,255,.12);transition:background .2s;}
.trace-cap a:first-child{border-left:none;}
.trace-cap a:hover{background:rgba(255,255,255,.05);}
.trace-cap b{display:block;font-stretch:118%;font-size:20px;font-weight:800;color:#fff;margin-bottom:4px;}
.trace-cap span{color:#AEBBD2;font-size:15.5px;}
@media(max-width:760px){.trace-cap{grid-template-columns:1fr;}.trace-cap a{border-left:none;border-top:1px solid rgba(255,255,255,.12);}}

.board{border-top:2px solid var(--ink);}
.board li a{display:grid;grid-template-columns:10px minmax(220px,1fr) 1.5fr auto;gap:28px;align-items:center;padding:32px 0;border-bottom:1px solid var(--line);transition:background .2s,padding .2s;}
.board li a:hover{background:var(--white);padding-left:18px;padding-right:18px;}
.board .tab{align-self:stretch;border-radius:3px;}
.board h3{font-size:26px;}
.board p{color:var(--ink-2);}
.board .go{font-weight:700;white-space:nowrap;border-bottom:2px solid var(--yellow);}
@media(max-width:820px){.board li a{grid-template-columns:8px 1fr;gap:10px 20px;}.board li a>p,.board li a>.go{grid-column:2;}}
.t-fase{background:var(--fase);} .t-neutro{background:var(--celeste);} .t-tierra{background:var(--tierra);} .t-amarillo{background:var(--yellow);}

.steps{display:grid;grid-template-columns:repeat(4,1fr);gap:0;counter-reset:paso;position:relative;}
.steps li{padding:0 28px 0 0;position:relative;}
.steps li::before{counter-increment:paso;content:counter(paso);display:block;font-stretch:125%;font-weight:800;font-size:64px;line-height:1;color:var(--ink);margin-bottom:18px;}
.steps li::after{content:"";position:absolute;top:30px;left:56px;right:16px;height:3px;background:var(--celeste);}
.steps li:last-child::after{display:none;}
.steps h3{margin-bottom:10px;}
.steps p{color:var(--ink-2);font-size:16px;}
.steps .get{margin-top:16px;padding-top:14px;border-top:1px solid var(--line);font-size:15px;color:var(--ink);}
.steps .get strong{display:block;font-weight:700;}
@media(max-width:900px){.steps{grid-template-columns:1fr 1fr;gap:48px 0;}.steps li:nth-child(2)::after{display:none;}}
@media(max-width:560px){.steps{grid-template-columns:1fr;}.steps li::after{display:none;}}

.feature{display:grid;grid-template-columns:1fr 1fr;gap:72px;align-items:center;}
@media(max-width:900px){.feature{grid-template-columns:1fr;gap:44px;}}
.feature .tag{display:inline-block;font-weight:700;color:var(--ink);background:var(--yellow);padding:5px 12px;border-radius:4px;font-size:14px;margin-bottom:22px;}
.feature h2{font-size:clamp(44px,6vw,80px);}
.feature p.big{font-size:19px;margin:20px 0 28px;}
.facts{display:grid;grid-template-columns:repeat(3,1fr);gap:0;border-top:1px solid rgba(255,255,255,.18);margin-bottom:34px;}
.facts div{padding:16px 16px 0 0;}
.facts dt{font-size:14px;color:#AEBBD2;}
.facts dd{font-weight:700;font-size:16px;}
.paper .facts,.bg-white .facts{border-color:var(--line);}
.paper .facts dt{color:var(--ink-2);}
@media(max-width:600px){.facts{grid-template-columns:1fr;}}
.feature-actions{display:flex;gap:22px;align-items:center;flex-wrap:wrap;}
.inkbg .tlink{color:#fff;}
.caja{width:100%;height:auto;}
.caja .c-box{fill:rgba(255,255,255,.04);stroke:#fff;stroke-width:2.5;}
.caja .c-screen{fill:#0E1830;stroke:var(--celeste);stroke-width:2;}
.caja .c-plot{fill:none;stroke:var(--yellow);stroke-width:2.5;stroke-linejoin:round;}
.caja .c-btn{fill:none;stroke:#C9D3E4;stroke-width:2;}
.caja .c-chip{fill:none;stroke:#fff;stroke-width:2;stroke-dasharray:0;}
.caja .c-label{fill:#fff;font:700 18px var(--f);font-stretch:120%;text-anchor:middle;}
.caja .c-small{fill:#C9D3E4;font:600 13px var(--f);text-anchor:middle;}
.caja .c-sensor{fill:none;stroke:#C9D3E4;stroke-width:1.8;}
.caja .c-plug{fill:none;stroke:#fff;stroke-width:2;}
.caja .c-hole{fill:#fff;}
.caja .c-wire{fill:none;stroke-width:2.2;}
.caja .c-blue{stroke:var(--celeste);}
.caja .c-yellow{stroke:var(--yellow);}
.paper .caja .c-box,.bg-white .caja .c-box{fill:#fff;stroke:var(--ink);}
.paper .caja .c-chip,.paper .caja .c-plug,.bg-white .caja .c-chip,.bg-white .caja .c-plug{stroke:var(--ink);}
.paper .caja .c-label,.bg-white .caja .c-label{fill:var(--ink);}
.paper .caja .c-small,.bg-white .caja .c-small{fill:var(--ink-2);}
.paper .caja .c-sensor,.paper .caja .c-btn,.bg-white .caja .c-sensor,.bg-white .caja .c-btn{stroke:var(--ink-2);}
.paper .caja .c-hole,.bg-white .caja .c-hole{fill:var(--ink);}

.crew{display:grid;grid-template-columns:repeat(3,1fr);gap:40px;}
.crew li{border-top:5px solid;padding-top:22px;}
.crew li:nth-child(1){border-color:var(--fase);} .crew li:nth-child(2){border-color:var(--celeste);} .crew li:nth-child(3){border-color:var(--tierra);}
.crew h3{margin-bottom:10px;}
.crew p{color:var(--ink-2);}
.crew ul{margin-top:16px;display:flex;flex-direction:column;gap:8px;font-size:16px;}
.crew ul li{border:none;padding:0 0 0 18px;position:relative;}
.crew ul li::before{content:"";position:absolute;left:0;top:11px;width:8px;height:2px;background:currentColor;}
@media(max-width:860px){.crew{grid-template-columns:1fr;gap:34px;}}

.split{display:grid;grid-template-columns:.85fr 1.15fr;gap:72px;align-items:start;}
@media(max-width:900px){.split{grid-template-columns:1fr;gap:36px;}}
.faq details{border-bottom:1px solid var(--line);}
.faq details:first-child{border-top:2px solid var(--ink);}
.faq summary{cursor:pointer;list-style:none;display:flex;justify-content:space-between;gap:20px;padding:24px 0;font-weight:700;font-size:19px;font-stretch:108%;}
.faq summary::-webkit-details-marker{display:none;}
.faq summary::after{content:"+";font-size:28px;line-height:.9;font-weight:400;transition:transform .2s;}
.faq details[open] summary::after{transform:rotate(45deg);}
.faq details p{padding:0 0 24px;color:var(--ink-2);max-width:62ch;}
.faq a{color:var(--link);text-decoration:underline;}

.cta{background:var(--yellow);padding:88px 0;}
.cta-in{display:flex;justify-content:space-between;align-items:center;gap:40px;flex-wrap:wrap;}
.cta h2{font-size:clamp(32px,4.4vw,58px);max-width:16ch;}
.cta p{margin-top:14px;font-size:18px;max-width:46ch;}
.cta-actions{display:flex;flex-direction:column;align-items:flex-start;gap:14px;}
.cta-mail{font-weight:700;border-bottom:2px solid var(--ink);}

/* ---------- SERVICIOS ---------- */
.svc{display:grid;grid-template-columns:12px 1fr 1fr;gap:40px;padding:64px 0;border-bottom:1px solid var(--line);scroll-margin-top:90px;}
.svc:first-child{padding-top:0;}
.svc .tab{border-radius:3px;}
.svc h2{font-size:clamp(28px,3.2vw,42px);}
.svc .desc{margin-top:16px;color:var(--ink-2);font-size:18px;max-width:46ch;}
.svc h3{font-size:17px;margin-bottom:14px;}
.ticks{display:flex;flex-direction:column;gap:12px;}
.ticks li{padding-left:30px;position:relative;}
.ticks li::before{content:"";position:absolute;left:0;top:7px;width:16px;height:9px;border-left:2.5px solid var(--tierra);border-bottom:2.5px solid var(--tierra);transform:rotate(-45deg);}
@media(max-width:820px){.svc{grid-template-columns:8px 1fr;gap:24px 20px;}.svc>div:last-child{grid-column:2;}}
.tools{display:grid;grid-template-columns:repeat(3,1fr);gap:40px;}
.tools h3{font-size:18px;margin-bottom:12px;padding-bottom:12px;border-bottom:2px solid var(--ink);}
.tools li{padding:8px 0;border-bottom:1px solid var(--line);}
@media(max-width:760px){.tools{grid-template-columns:1fr;}}

/* ---------- CLIENTES ---------- */
.prospects{display:grid;grid-template-columns:repeat(3,1fr);border-top:2px solid var(--ink);}
.prospects a{display:block;padding:30px 28px 34px 0;border-right:1px solid var(--line);margin-right:28px;}
.prospects a:last-child{border-right:none;margin-right:0;}
.prospects h3{margin-bottom:10px;}
.prospects p{color:var(--ink-2);margin-bottom:18px;}
.prospects span{font-weight:700;border-bottom:2px solid var(--yellow);}
@media(max-width:760px){.prospects{grid-template-columns:1fr;}.prospects a{border-right:none;margin-right:0;border-bottom:1px solid var(--line);padding-right:0;}}

/* ---------- CASO VOLTEC ---------- */
.bill{border:2px solid var(--ink);border-radius:8px;padding:8px 24px;background:#fff;margin-top:34px;}
.bill>div{display:flex;justify-content:space-between;gap:16px;padding:14px 0;border-bottom:1px dashed var(--line);}
.bill>div:last-child{border-bottom:none;}
.bill-tag{font-size:13px;font-weight:700;color:#9B2C22;background:#FBE6E3;padding:3px 9px;border-radius:4px;}
.fine{font-size:14px;color:var(--ink-2);margin-top:10px;}
.probs{display:flex;flex-direction:column;gap:30px;}
.probs h3{margin-bottom:6px;}
.probs p{color:var(--ink-2);}
.probs li{padding-left:22px;border-left:4px solid var(--fase);}
.probs li:nth-child(2){border-color:var(--celeste);} .probs li:nth-child(3){border-color:var(--tierra);}
.steps.five{grid-template-columns:repeat(5,1fr);}
.steps .next::before{color:#9A6B00;}
.steps .next h3{color:#7A5500;}
@media(max-width:1000px){.steps.five{grid-template-columns:1fr 1fr;gap:48px 0;}.steps.five li::after{display:none;}}
@media(max-width:560px){.steps.five{grid-template-columns:1fr;}}
.specs{display:grid;grid-template-columns:1fr 1fr;border-top:2px solid var(--ink);}
.specs div{padding:14px 16px 14px 0;border-bottom:1px solid var(--line);}
.specs dt{font-size:14px;color:var(--ink-2);}
.specs dd{font-weight:700;}
.calc{background:#1C2C4F;border-radius:12px;padding:30px;}
.calc label{font-weight:700;display:block;margin-bottom:14px;color:#fff;}
.calc input[type=range]{width:100%;accent-color:var(--yellow);}
.val-row{display:flex;justify-content:space-between;margin:12px 0 22px;color:#C9D3E4;}
.val-row b{color:#fff;}
.calc-result{display:grid;grid-template-columns:1fr 1fr;gap:14px;}
.calc-result .box{background:rgba(255,255,255,.06);border-radius:8px;padding:16px;}
.calc-result .l{font-size:14px;color:#AEBBD2;}
.calc-result .v{font-stretch:120%;font-weight:800;font-size:26px;color:#fff;}
.calc-result .amber .v{color:var(--yellow);}
.calc-note{font-size:14px;margin-top:14px;}
.stat-row{display:flex;gap:36px;flex-wrap:wrap;margin-top:28px;}
.stat-row .num{font-stretch:120%;font-weight:800;font-size:30px;color:var(--yellow);}
.stat-row .lbl{font-size:15px;color:#C9D3E4;}

/* ---------- EQUIPO ---------- */
.timeline{border-left:3px solid var(--celeste);margin-left:10px;display:flex;flex-direction:column;gap:40px;}
.timeline li{padding-left:34px;position:relative;}
.timeline li::before{content:"";position:absolute;left:-11px;top:6px;width:19px;height:19px;border-radius:50%;background:#fff;border:3px solid var(--ink);}
.timeline .when{font-weight:700;color:var(--link);margin-bottom:4px;}
.timeline p{color:var(--ink-2);max-width:60ch;}

/* ---------- CONTACTO ---------- */
.contact{display:grid;grid-template-columns:1.1fr .9fr;gap:72px;align-items:start;}
@media(max-width:900px){.contact{grid-template-columns:1fr;gap:48px;}}
.form{background:#fff;border:2px solid var(--ink);border-radius:12px;padding:36px;}
@media(max-width:600px){.form{padding:24px;}}
.field{margin-bottom:22px;}
.field label{display:block;font-weight:700;margin-bottom:8px;}
.field input,.field select,.field textarea{width:100%;font:inherit;font-size:17px;padding:14px 16px;border:1.5px solid #AEB8C6;border-radius:8px;background:#fff;color:var(--ink);}
.field input:focus,.field select:focus,.field textarea:focus{outline:3px solid var(--yellow);outline-offset:1px;border-color:var(--ink);}
.field textarea{min-height:150px;resize:vertical;}
.msg{border-radius:8px;padding:16px 18px;margin-bottom:22px;}
.msg.ok{background:#E3F4E8;border:1.5px solid var(--tierra);color:#1D5E31;}
.msg.err{background:#FBE6E3;border:1.5px solid #C0392B;color:#8E2A20;}
.msg.err ul{padding-left:18px;list-style:disc;}
.form .note{font-size:14px;color:var(--ink-2);margin-top:14px;}
.form .note a{color:var(--link);text-decoration:underline;}
.ways{display:flex;flex-direction:column;}
.ways div{padding:22px 0;border-bottom:1px solid var(--line);}
.ways div:first-child{border-top:2px solid var(--ink);}
.ways dt{font-size:14px;color:var(--ink-2);}
.ways dd{font-weight:700;font-size:18px;}
.ways a{color:var(--link);}

/* ---------- PIE ---------- */
.foot{background:var(--ink);color:#C9D3E4;padding:0 0 36px;}
.foot-grid{display:grid;grid-template-columns:1.4fr 1fr 1fr 1fr;gap:40px;padding:64px 0 48px;}
.foot .logo b{color:#fff;}
.foot p{max-width:34ch;margin-top:16px;font-size:15.5px;}
.foot h4{color:#fff;font-size:16px;font-weight:700;margin-bottom:14px;}
.foot-grid a{display:block;padding:4px 0;font-size:15.5px;}
.foot-grid a:hover{color:#fff;text-decoration:underline;}
.foot-bottom{display:flex;justify-content:space-between;gap:16px;flex-wrap:wrap;padding-top:24px;border-top:1px solid rgba(255,255,255,.14);font-size:14px;}
.foot-bottom nav{display:flex;gap:20px;}
.foot-bottom a:hover{color:#fff;}
@media(max-width:860px){.foot-grid{grid-template-columns:1fr 1fr;}}
@media(max-width:520px){.foot-grid{grid-template-columns:1fr;}}

@media(prefers-reduced-motion:reduce){
  html{scroll-behavior:auto;}
  .trace .sig{animation:none;stroke-dashoffset:0;}
  *{transition:none !important;}
}
</style>
</head>
<body>
<a class="skip" href="#main">Saltar al contenido</a>

<header class="top">
  <div class="wrap nav">
    <a href="/" class="logo" aria-label="Voltec Ergon, inicio">
      <svg viewBox="0 0 40 40" aria-hidden="true"><rect width="40" height="40" rx="9" fill="#14213D"/><path d="M6 24 C10 10 14 10 17 20 S24 30 27 20 H34" fill="none" stroke="#F2C200" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      <b>Voltec Ergon</b>
    </a>
    <nav class="navl" aria-label="Principal">
      <?php foreach ($navItems as $href => $label): ?>
        <a href="<?= html($href) ?>"<?= $active === $href ? ' aria-current="page"' : '' ?>><?= html($label) ?></a>
      <?php endforeach; ?>
    </nav>
    <a href="/contacto" class="btn btn-yellow">Pedir presupuesto</a>
    <details class="mnav">
      <summary aria-label="Abrir menú"><span></span></summary>
      <nav class="mnav-panel" aria-label="Menú">
        <a href="/"<?= $active === '/' ? ' aria-current="page"' : '' ?>>Inicio</a>
        <?php foreach ($navItems as $href => $label): ?>
          <a href="<?= html($href) ?>"<?= $active === $href ? ' aria-current="page"' : '' ?>><?= html($label) ?></a>
        <?php endforeach; ?>
      </nav>
    </details>
  </div>
</header>

<main id="main">
<?= $content ?>
</main>

<footer class="foot">
  <div class="wires" aria-hidden="true"><i></i><i></i><i></i></div>
  <div class="wrap">
    <div class="foot-grid">
      <div>
        <a href="/" class="logo" aria-label="Voltec Ergon, inicio">
          <svg viewBox="0 0 40 40" aria-hidden="true"><rect width="40" height="40" rx="9" fill="#F2C200"/><path d="M6 24 C10 10 14 10 17 20 S24 30 27 20 H34" fill="none" stroke="#14213D" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          <b>Voltec Ergon</b>
        </a>
        <p>Consultora de tecnología de la E.E.S.T. N°4 de Berazategui. Desarrollo web, electrónica e IoT, auditoría energética y soporte.</p>
      </div>
      <div>
        <h4>Consultora</h4>
        <a href="/servicios">Servicios</a>
        <a href="/clientes">Clientes</a>
        <a href="/equipo">Equipo</a>
        <a href="/contacto">Contacto</a>
      </div>
      <div>
        <h4>Servicios</h4>
        <a href="/servicios#web">Desarrollo web</a>
        <a href="/servicios#iot">Electrónica e IoT</a>
        <a href="/servicios#auditoria">Auditoría energética</a>
        <a href="/servicios#soporte">Soporte</a>
      </div>
      <div>
        <h4>Escribinos</h4>
        <a href="mailto:ergonvoltec@gmail.com">ergonvoltec@gmail.com</a>
        <a href="https://github.com/spandrio/voltec">Repositorio de Voltec</a>
      </div>
    </div>
    <div class="foot-bottom">
      <span>© 2026 Voltec Ergon. Proyecto institucional de la E.E.S.T. N°4 de Berazategui y Fundación YPF.</span>
      <nav aria-label="Legales">
        <a href="/privacidad">Política de Privacidad</a>
        <a href="/terminos">Términos y Condiciones</a>
      </nav>
    </div>
  </div>
</footer>
</body>
</html>
