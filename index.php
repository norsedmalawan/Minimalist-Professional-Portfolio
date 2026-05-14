<?php
$name    = "Norsed Malawan";
$title   = "Norsed.Dev";
$tagline = "Full-Stack Web Developer";
$email   = "norsedmalawan@gmail.com";
$github  = "github.com/norsed";
$linkedin= "linkedin.com/in/norsed";
$facebook= "facebook.com/norsed";
$instagram="instagram.com/norsed";
$profile = file_exists(__DIR__.'/PROFILE.png') ? 'PROFILE.png'
         : (file_exists(__DIR__.'/profile.jpg') ? 'profile.jpg'
         : (file_exists(__DIR__.'/profile.png') ? 'profile.png' : null));

$skills = [
  "Frontend"         => ["HTML5","CSS3","JavaScript","Bootstrap","React","Tailwind CSS","AJAX"],
  "Backend"          => ["PHP","MySQL","C#"],
  "Developer Tools"  => ["Visual Studio Code","Visual Studio 2022","GitHub"],
];

$experience = [
  ["role"=>"On-the-Job Training","company"=>"MBHTE-BARMM","period"=>"2026–Present"],
  ["role"=>"B.S. Information Technology","company"=>"Cotabato State University","period"=>"2022–2026"],
  ["role"=>"Hello World","company"=>"","period"=>"2021"],
];

$projects = [
  ["name"=>"ShopFlow","image"=>"shopflow.jpg",
   "desc"=>"Full-stack e-commerce with real-time inventory, Stripe payments, and admin dashboard.",
   "stack"=>[["Laravel"],["Vue.js"],["MySQL"],["Stripe"]],"link"=>"#","repo"=>"#"],
  ["name"=>"TaskBridge","image"=>"taskbridge.jpg",
   "desc"=>"Kanban project tool with drag-and-drop boards, real-time collaboration via WebSockets.",
   "stack"=>[["React"],["Node.js"],["MongoDB"],["Socket.io"]],"link"=>"#","repo"=>"#"],
  ["name"=>"DevFolio CMS","image"=>"devfolio.jpg",
   "desc"=>"Lightweight Markdown-first CMS with a clean REST API and streamlined deployment.",
   "stack"=>[["PHP"],["MySQL"],["REST API"],["Docker"]],"link"=>"#","repo"=>"#"],
  ["name"=>"MetricsPulse","image"=>"metricspulse.jpg",
   "desc"=>"Real-time analytics dashboard integrating third-party APIs to visualize business data.",
   "stack"=>[["Next.js"],["PostgreSQL"],["Chart.js"],["Python"]],"link"=>"#","repo"=>"#"],
];

$submitted=false; $errors=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
  $cn=trim($_POST['cname']??''); $ce=trim($_POST['cemail']??''); $cm=trim($_POST['cmsg']??'');
  if(!$cn) $errors[]='Name is required.';
  if(!filter_var($ce,FILTER_VALIDATE_EMAIL)) $errors[]='Valid email required.';
  if(!$cm) $errors[]='Message is required.';
  if(!$errors) $submitted=true;
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8"/><meta name="viewport" content="width=device-width,initial-scale=1"/>
<title><?=htmlspecialchars($title)?> — <?=htmlspecialchars($name)?></title>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
<style>
:root[data-theme="dark"]{--bg:#0f0f0f;--bg2:#161616;--bg3:#1c1c1c;--b:#242424;--b2:#2e2e2e;--t:#f0f0f0;--t2:#888;--t3:#444;}
:root[data-theme="light"]{--bg:#ffffff;--bg2:#f7f7f7;--bg3:#f0f0f0;--b:#e4e4e4;--b2:#d0d0d0;--t:#111;--t2:#666;--t3:#bbb;}
*{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--t);font-size:14px;line-height:1.7;-webkit-font-smoothing:antialiased;transition:background .2s,color .2s}
nav{position:sticky;top:0;z-index:99;background:var(--bg);border-bottom:1px solid var(--b)}
.ni{max-width:960px;margin:0 auto;padding:0 24px;display:flex;align-items:center;justify-content:space-between;height:52px}
.brand{font-size:13px;font-weight:700;color:var(--t);text-decoration:none;letter-spacing:-.02em}
.nlinks{display:flex;align-items:center;gap:2px}
.nl{font-size:12px;color:var(--t2);text-decoration:none;padding:5px 10px;border-radius:5px;transition:all .15s;font-weight:500}
.nl:hover{color:var(--t);background:var(--bg3)}
.tbtn{width:32px;height:32px;border-radius:6px;border:1px solid var(--b);background:var(--bg3);color:var(--t2);cursor:pointer;margin-left:6px;transition:all .15s;display:flex;align-items:center;justify-content:center;padding:0}
.tbtn:hover{color:var(--t);border-color:var(--b2)}
.tbtn svg{width:15px;height:15px;display:block;flex-shrink:0}
.icon-sun{display:block}.icon-moon{display:none}
:root[data-theme="light"] .icon-sun{display:none}
:root[data-theme="light"] .icon-moon{display:block}
.mbtn{display:none;background:none;border:1px solid var(--b);color:var(--t2);padding:5px 12px;border-radius:5px;font-size:11px;cursor:pointer;font-family:inherit;font-weight:600;letter-spacing:.06em}
#mm{display:none;border-top:1px solid var(--b);background:var(--bg)}
#mm.open{display:block}
.mml{display:block;padding:12px 24px;font-size:13px;color:var(--t2);text-decoration:none;border-bottom:1px solid var(--b);transition:color .15s}
.mml:hover{color:var(--t)}
.mm-theme-row{display:flex;align-items:center;justify-content:space-between;padding:12px 24px}
.mm-theme-lbl{font-size:10px;color:var(--t3);font-weight:600;letter-spacing:.08em;text-transform:uppercase}
.mm-tbtn{display:flex;align-items:center;gap:7px;background:var(--bg3);border:1px solid var(--b);color:var(--t2);padding:5px 12px;border-radius:5px;font-size:11px;font-weight:600;font-family:inherit;cursor:pointer;transition:all .15s}
.mm-tbtn:hover{color:var(--t);border-color:var(--b2)}
.mm-tbtn svg{width:13px;height:13px;flex-shrink:0}
@media(max-width:640px){.nlinks{display:none!important}.mbtn{display:block!important}}
.w{max-width:960px;margin:0 auto;padding:0 24px}
section{padding:64px 0}
hr{border:none;border-top:1px solid var(--b)}
h2{font-size:clamp(1.2rem,2.5vw,1.6rem);font-weight:700;letter-spacing:-.04em;color:var(--t);margin-bottom:0;line-height:1.15}
.sec-hd{display:flex;align-items:center;justify-content:space-between;margin-bottom:28px;flex-wrap:wrap;gap:10px}
.view-all{display:inline-flex;align-items:center;gap:5px;font-size:11px;font-weight:600;color:var(--t2);background:var(--bg3);border:1px solid var(--b);padding:5px 12px;border-radius:5px;cursor:pointer;transition:all .15s;font-family:inherit;white-space:nowrap}
.view-all:hover{color:var(--t);border-color:var(--b2)}
.view-all svg{width:11px;height:11px;flex-shrink:0}
#hero{padding:72px 0 60px}
.hgrid{display:grid;grid-template-columns:160px 1fr;gap:40px;align-items:center}
@media(max-width:640px){.hgrid{grid-template-columns:1fr;gap:24px}.hgrid .himg-col{order:-1}}
h1{font-size:clamp(2rem,5vw,3.2rem);font-weight:700;letter-spacing:-.05em;line-height:1.05;color:var(--t)}
.htag{font-size:12px;color:var(--t2);margin-top:10px;font-weight:400}
.hloc{display:inline-flex;align-items:center;gap:5px;font-size:12px;color:var(--t2);margin-top:6px}
.hloc svg{opacity:.5;flex-shrink:0}
.hbtns{display:flex;gap:8px;margin-top:20px;flex-wrap:wrap}
.socials{display:flex;gap:8px;align-items:center;margin-top:16px}
.soc-btn{width:34px;height:34px;border-radius:7px;border:1px solid var(--b);background:var(--bg3);color:var(--t2);display:flex;align-items:center;justify-content:center;text-decoration:none;transition:all .15s}
.soc-btn:hover{color:var(--t);border-color:var(--b2)}
.soc-btn svg{width:16px;height:16px;display:block;flex-shrink:0}
.pimg{width:160px;height:160px;border-radius:12px;object-fit:cover;object-position:top center;border:1px solid var(--b);display:block}
.pph{width:160px;height:160px;border-radius:12px;background:var(--bg3);border:1px solid var(--b);display:flex;flex-direction:column;align-items:center;justify-content:center;color:var(--t3);font-size:11px;gap:6px;text-align:center;padding:12px}
@media(max-width:640px){.pimg,.pph{width:100px;height:100px;border-radius:10px}}
.btn{display:inline-flex;align-items:center;gap:6px;font-size:12px;font-weight:600;padding:8px 18px;border-radius:7px;text-decoration:none;transition:all .15s;border:1px solid transparent;cursor:pointer;font-family:inherit;letter-spacing:-.01em}
.bp{background:var(--t);color:var(--bg);border-color:var(--t)}.bp:hover{opacity:.85}
.bgs{background:var(--bg3);color:var(--t2);border-color:var(--b)}.bgs:hover{color:var(--t);border-color:var(--b2)}
.about-grid{display:grid;grid-template-columns:1fr;gap:24px}
@media(min-width:640px){.about-grid{grid-template-columns:1fr 1fr;gap:40px;align-items:start}}
.about-text p{font-size:13px;color:var(--t2);line-height:1.85;margin-bottom:14px}
.about-text p:last-child{margin-bottom:0}
.scats{display:flex;flex-direction:column;gap:20px}
.scat-lbl{font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--t3);margin-bottom:8px;display:block}
.stags{display:flex;flex-wrap:wrap;gap:6px}
.stag{font-size:12px;color:var(--t2);background:var(--bg2);padding:5px 12px;border-radius:5px;border:1px solid var(--b);font-weight:500;transition:all .15s}
.stag:hover{color:var(--t);border-color:var(--b2)}
.stag-more{cursor:pointer;border-style:dashed!important;font-family:inherit}
.elist{margin-top:0}
.eitem{display:grid;grid-template-columns:20px 1fr;gap:0 16px;padding:0 0 28px 0}
.eitem:last-child{padding-bottom:0}
.etl{display:flex;flex-direction:column;align-items:center;padding-top:5px}
.edot{width:8px;height:8px;border-radius:50%;background:var(--t);flex-shrink:0;position:relative;z-index:1}
.eline{flex:1;width:1px;background:var(--b);margin-top:5px;min-height:24px}
.eitem:last-child .eline{display:none}
.etop{display:flex;flex-wrap:wrap;justify-content:space-between;gap:4px;align-items:baseline}
.erole{font-size:13px;font-weight:700;color:var(--t)}
.eco{font-size:12px;color:var(--t2);margin-left:6px}
.eper{font-size:11px;color:var(--t3);font-weight:500;white-space:nowrap}
.pgrid{display:grid;gap:12px}
@media(min-width:640px){.pgrid{grid-template-columns:1fr 1fr}}
.pcard{background:var(--bg2);border:1px solid var(--b);border-radius:10px;overflow:hidden;transition:border-color .2s,transform .2s;display:flex;flex-direction:column}
.pcard:hover{border-color:var(--b2);transform:translateY(-2px)}
.piw{position:relative;aspect-ratio:16/9;background:var(--bg3);overflow:hidden}
.pi{width:100%;height:100%;object-fit:cover;display:block;transition:transform .3s}
.pcard:hover .pi{transform:scale(1.03)}
.piph{width:100%;height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;color:var(--t3);font-size:11px;gap:5px}
.pov{position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.55) 0%,transparent 55%);opacity:0;transition:opacity .2s}
.pcard:hover .pov{opacity:1}
.plnks{position:absolute;bottom:10px;right:10px;display:flex;gap:6px;opacity:0;transform:translateY(4px);transition:all .2s}
.pcard:hover .plnks{opacity:1;transform:translateY(0)}
.plbtn{width:30px;height:30px;border-radius:6px;background:rgba(255,255,255,.15);backdrop-filter:blur(6px);border:1px solid rgba(255,255,255,.2);color:#fff;display:flex;align-items:center;justify-content:center;text-decoration:none;font-size:13px;transition:background .15s}
.plbtn:hover{background:rgba(255,255,255,.28)}
.pbody{padding:16px;flex:1;display:flex;flex-direction:column;gap:6px}
.pname{font-size:13px;font-weight:700;color:var(--t)}
.pdesc{font-size:12px;color:var(--t2);line-height:1.7;flex:1}
.pstack{display:flex;flex-wrap:wrap;gap:5px;margin-top:4px}
.psb{font-size:11px;color:var(--t2);background:var(--bg3);border:1px solid var(--b);padding:3px 8px;border-radius:4px;font-weight:500}
.cgrid{display:grid;gap:40px}
@media(min-width:640px){.cgrid{grid-template-columns:200px 1fr}}
.cinfo{display:flex;flex-direction:column;gap:16px}
.cilbl{font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--t3);display:block;margin-bottom:3px}
.cival{font-size:13px;color:var(--t2);text-decoration:none;transition:color .15s}
.cival:hover{color:var(--t)}
.avail{display:inline-flex;align-items:center;gap:6px;font-size:11px;font-weight:600;color:#2da55e;background:rgba(34,197,94,.08);border:1px solid rgba(34,197,94,.22);padding:5px 10px;border-radius:5px;margin-top:4px}
.adot{width:6px;height:6px;border-radius:50%;background:#22c55e;flex-shrink:0;animation:pulse 2s ease infinite}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.3}}
.c-socials{display:flex;gap:8px;margin-top:2px}
.c-soc{width:32px;height:32px;border-radius:6px;border:1px solid var(--b);background:var(--bg3);color:var(--t2);display:flex;align-items:center;justify-content:center;text-decoration:none;transition:all .15s}
.c-soc:hover{color:var(--t);border-color:var(--b2)}
.c-soc svg{width:14px;height:14px;display:block}
.fg{margin-bottom:12px}
.fl{display:block;font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--t3);margin-bottom:6px}
.fi,.fta{width:100%;padding:9px 13px;border:1px solid var(--b);border-radius:7px;background:var(--bg2);color:var(--t);font-size:13px;font-family:inherit;outline:none;transition:border-color .15s;resize:vertical}
.fi:focus,.fta:focus{border-color:var(--b2)}
.fi::placeholder,.fta::placeholder{color:var(--t3)}
.fsub{background:var(--t);color:var(--bg);border:none;border-radius:7px;padding:9px 24px;font-size:13px;font-weight:600;cursor:pointer;transition:opacity .15s;font-family:inherit;margin-top:4px}
.fsub:hover{opacity:.85}
.ebox{background:var(--bg2);border:1px solid var(--b);border-radius:7px;padding:12px 14px;margin-bottom:12px}
.ebox p{font-size:12px;color:var(--t2);line-height:1.8}
.sbox{background:var(--bg2);border:1px solid var(--b);border-radius:10px;padding:36px 24px;text-align:center}
.sbox h3{font-size:1rem;font-weight:700;margin-bottom:6px}
.sbox p{font-size:12px;color:var(--t2)}
footer{border-top:1px solid var(--b);padding:20px 0}
.fi2{max-width:960px;margin:0 auto;padding:0 24px;display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;gap:8px}
footer p{font-size:11px;color:var(--t3);font-weight:500}
.modal-overlay{display:none;position:fixed;inset:0;z-index:200;background:rgba(0,0,0,.75);backdrop-filter:blur(4px);align-items:center;justify-content:center;padding:16px}
.modal-overlay.open{display:flex}
.modal{background:var(--bg2);border:1px solid var(--b);border-radius:14px;width:100%;max-width:700px;max-height:90vh;display:flex;flex-direction:column;overflow:hidden;animation:mfade .2s ease}
@keyframes mfade{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
.modal-head{display:flex;align-items:center;justify-content:space-between;padding:18px 24px;border-bottom:1px solid var(--b);flex-shrink:0}
.modal-head h3{font-size:14px;font-weight:700;color:var(--t);letter-spacing:-.02em}
.modal-close{width:28px;height:28px;border-radius:6px;border:1px solid var(--b);background:var(--bg3);color:var(--t2);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:18px;line-height:1;transition:all .15s;font-family:inherit;padding:0}
.modal-close:hover{color:var(--t);border-color:var(--b2)}
.modal-body{padding:24px;overflow-y:auto;flex:1}
.modal-skills{display:flex;flex-direction:column;gap:22px}
.modal-scat-lbl{font-size:10px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--t3);margin-bottom:8px;display:block}
.modal-tags{display:flex;flex-wrap:wrap;gap:7px}
.modal-tag{font-size:12px;color:var(--t2);background:var(--bg3);padding:5px 14px;border-radius:5px;border:1px solid var(--b);font-weight:500;transition:all .15s}
.modal-tag:hover{color:var(--t);border-color:var(--b2)}
.modal-exp-item{padding:18px 0;border-bottom:1px solid var(--b)}
.modal-exp-item:first-child{padding-top:0}
.modal-exp-item:last-child{border-bottom:none;padding-bottom:0}
.modal-exp-top{display:flex;flex-wrap:wrap;justify-content:space-between;gap:4px;align-items:baseline}
.modal-exp-role{font-size:13px;font-weight:700;color:var(--t)}
.modal-exp-co{font-size:12px;color:var(--t2);margin-left:5px}
.modal-exp-per{font-size:11px;color:var(--t3);font-weight:500}
.modal-pgrid{display:grid;gap:12px}
@media(min-width:480px){.modal-pgrid{grid-template-columns:1fr 1fr}}
.modal-pcard{background:var(--bg3);border:1px solid var(--b);border-radius:9px;overflow:hidden;transition:border-color .15s}
.modal-pcard:hover{border-color:var(--b2)}
.modal-piw{aspect-ratio:16/9;background:var(--bg);overflow:hidden}
.modal-piw img{width:100%;height:100%;object-fit:cover;display:block}
.modal-piph{width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:var(--t3);font-size:11px}
.modal-pbody{padding:13px}
.modal-pname{font-size:12px;font-weight:700;color:var(--t);margin-bottom:4px}
.modal-pdesc{font-size:11px;color:var(--t2);line-height:1.65;margin-bottom:8px}
.modal-pstack{display:flex;flex-wrap:wrap;gap:4px;margin-bottom:8px}
.modal-psb{font-size:10px;color:var(--t2);background:var(--bg2);border:1px solid var(--b);padding:2px 7px;border-radius:3px;font-weight:500}
.modal-plinks{display:flex;gap:6px}
.modal-plbtn{font-size:11px;font-weight:600;color:var(--t2);background:var(--bg2);border:1px solid var(--b);padding:4px 10px;border-radius:5px;text-decoration:none;transition:all .15s}
.modal-plbtn:hover{color:var(--t);border-color:var(--b2)}
.rv{opacity:0;transform:translateY(12px);transition:opacity .5s ease,transform .5s ease}
.rv.in{opacity:1;transform:translateY(0)}
@keyframes fu{from{opacity:0;transform:translateY(10px)}to{opacity:1;transform:translateY(0)}}
.ha>*{animation:fu .45s ease both}
.ha>*:nth-child(1){animation-delay:.04s}.ha>*:nth-child(2){animation-delay:.1s}
.ha>*:nth-child(3){animation-delay:.16s}.ha>*:nth-child(4){animation-delay:.22s}
.ha>*:nth-child(5){animation-delay:.28s}.ha>*:nth-child(6){animation-delay:.34s}

/* ===== AI CHAT WIDGET ===== */
.ai-fab{position:fixed;bottom:24px;right:24px;z-index:300;width:50px;height:50px;border-radius:14px;background:var(--t);color:var(--bg);border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;box-shadow:0 4px 28px rgba(0,0,0,.4);transition:transform .2s,box-shadow .2s;font-family:inherit}
.ai-fab:hover{transform:scale(1.08);box-shadow:0 6px 36px rgba(0,0,0,.5)}
.ai-fab svg{width:20px;height:20px;display:block;flex-shrink:0;transition:transform .2s}
.fab-close{display:none}
.ai-fab.open .fab-open{display:none}
.ai-fab.open .fab-close{display:block}

/* Pulsing ring on fab */
.ai-fab::before{content:'';position:absolute;inset:-3px;border-radius:17px;border:2px solid var(--t);opacity:0;animation:fabring 3s ease 2s infinite}
@keyframes fabring{0%{opacity:.5;transform:scale(1)}100%{opacity:0;transform:scale(1.25)}}
.ai-fab.open::before{display:none}

/* Panel */
.ai-panel{position:fixed;bottom:84px;right:24px;z-index:299;width:360px;max-width:calc(100vw - 32px);background:var(--bg2);border:1px solid var(--b);border-radius:16px;box-shadow:0 12px 48px rgba(0,0,0,.5);display:flex;flex-direction:column;overflow:hidden;max-height:540px;opacity:0;transform:translateY(14px) scale(.96);pointer-events:none;transition:opacity .22s ease,transform .22s ease;transform-origin:bottom right}
.ai-panel.open{opacity:1;transform:translateY(0) scale(1);pointer-events:all}

/* Header */
.ai-head{padding:13px 16px;border-bottom:1px solid var(--b);display:flex;align-items:center;gap:10px;flex-shrink:0;background:var(--bg3)}
.ai-avatar{width:32px;height:32px;border-radius:9px;background:var(--t);color:var(--bg);display:flex;align-items:center;justify-content:center;flex-shrink:0}
.ai-avatar svg{width:16px;height:16px;display:block}
.ai-head-info{flex:1;min-width:0}
.ai-head-name{font-size:12px;font-weight:700;color:var(--t);letter-spacing:-.01em}
.ai-head-sub{font-size:10px;color:var(--t2);display:flex;align-items:center;gap:4px;margin-top:1px}
.ai-online{width:5px;height:5px;border-radius:50%;background:#22c55e;flex-shrink:0;animation:pulse 2s ease infinite}
.ai-badge{font-size:9px;font-weight:600;letter-spacing:.06em;text-transform:uppercase;color:var(--t3);background:var(--bg2);border:1px solid var(--b);padding:1px 5px;border-radius:3px;margin-left:2px}
.ai-clear{width:26px;height:26px;border-radius:5px;border:1px solid var(--b);background:transparent;color:var(--t3);cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all .15s;flex-shrink:0;padding:0}
.ai-clear:hover{color:var(--t2);border-color:var(--b2)}
.ai-clear svg{width:12px;height:12px;display:block}

/* Messages area */
.ai-messages{flex:1;overflow-y:auto;padding:14px 14px 4px;display:flex;flex-direction:column;gap:10px;scroll-behavior:smooth}
.ai-messages::-webkit-scrollbar{width:3px}
.ai-messages::-webkit-scrollbar-track{background:transparent}
.ai-messages::-webkit-scrollbar-thumb{background:var(--b2);border-radius:2px}
.ai-msg{display:flex;flex-direction:column;gap:3px;max-width:88%}
.ai-msg.user{align-self:flex-end;align-items:flex-end}
.ai-msg.bot{align-self:flex-start;align-items:flex-start}
.ai-bubble{padding:9px 12px;border-radius:11px;font-size:12px;line-height:1.65;word-break:break-word}
.ai-msg.user .ai-bubble{background:var(--t);color:var(--bg);border-radius:11px 11px 3px 11px}
.ai-msg.bot .ai-bubble{background:var(--bg3);color:var(--t);border:1px solid var(--b);border-radius:11px 11px 11px 3px}
.ai-msg-time{font-size:9px;color:var(--t3);padding:0 2px}

/* Typing dots */
.ai-typing{display:none;align-self:flex-start}
.ai-typing.show{display:flex;flex-direction:column;gap:3px}
.ai-typing-bubble{background:var(--bg3);border:1px solid var(--b);border-radius:11px 11px 11px 3px;padding:10px 14px;display:flex;align-items:center;gap:4px}
.ai-typing-dot{width:5px;height:5px;border-radius:50%;background:var(--t3);animation:tdot 1.2s ease infinite}
.ai-typing-dot:nth-child(2){animation-delay:.2s}.ai-typing-dot:nth-child(3){animation-delay:.4s}
@keyframes tdot{0%,60%,100%{transform:translateY(0);opacity:.4}30%{transform:translateY(-4px);opacity:1}}

/* Quick suggestions */
.ai-suggestions{display:flex;flex-wrap:wrap;gap:5px;padding:8px 12px;flex-shrink:0;border-top:1px solid var(--b)}
.ai-sug{font-size:10px;font-weight:500;color:var(--t2);background:var(--bg3);border:1px solid var(--b);padding:4px 10px;border-radius:20px;cursor:pointer;transition:all .15s;font-family:inherit;white-space:nowrap;flex-shrink:0}
.ai-sug:hover{color:var(--t);border-color:var(--b2)}

/* Input row */
.ai-input-row{display:flex;align-items:flex-end;gap:8px;padding:10px 12px 12px;border-top:1px solid var(--b);flex-shrink:0}
.ai-input{flex:1;background:var(--bg3);border:1px solid var(--b);border-radius:9px;padding:8px 11px;font-size:12px;color:var(--t);font-family:inherit;outline:none;resize:none;line-height:1.5;max-height:90px;overflow-y:auto;transition:border-color .15s}
.ai-input:focus{border-color:var(--b2)}
.ai-input::placeholder{color:var(--t3)}
.ai-send{width:32px;height:32px;border-radius:8px;background:var(--t);color:var(--bg);border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:opacity .15s;align-self:flex-end}
.ai-send:hover{opacity:.8}
.ai-send:disabled{opacity:.3;cursor:default}
.ai-send svg{width:13px;height:13px;display:block}

/* Powered-by footer */
.ai-powered{padding:6px 12px;text-align:center;font-size:9px;color:var(--t3);letter-spacing:.04em;border-top:1px solid var(--b);flex-shrink:0}
.ai-powered span{opacity:.6}
</style>
</head>
<body>

<!-- MODALS -->
<div class="modal-overlay" id="modal-skills" onclick="closeModal('modal-skills')">
  <div class="modal" onclick="event.stopPropagation()">
    <div class="modal-head"><h3>All Skills &amp; Technologies</h3><button class="modal-close" onclick="closeModal('modal-skills')">×</button></div>
    <div class="modal-body">
      <div class="modal-skills">
        <?php foreach($skills as $cat=>$items): ?>
        <div><span class="modal-scat-lbl"><?=htmlspecialchars($cat)?></span><div class="modal-tags"><?php foreach($items as $i): ?><span class="modal-tag"><?=htmlspecialchars($i)?></span><?php endforeach; ?></div></div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<div class="modal-overlay" id="modal-exp" onclick="closeModal('modal-exp')">
  <div class="modal" onclick="event.stopPropagation()">
    <div class="modal-head"><h3>Experience Journey</h3><button class="modal-close" onclick="closeModal('modal-exp')">×</button></div>
    <div class="modal-body">
      <?php foreach($experience as $exp): ?>
      <div class="modal-exp-item">
        <div class="modal-exp-top">
          <div><span class="modal-exp-role"><?=htmlspecialchars($exp['role'])?></span><?php if($exp['company']): ?><span class="modal-exp-co">@ <?=htmlspecialchars($exp['company'])?></span><?php endif; ?></div>
          <span class="modal-exp-per"><?=htmlspecialchars($exp['period'])?></span>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div class="modal-overlay" id="modal-projects" onclick="closeModal('modal-projects')">
  <div class="modal" onclick="event.stopPropagation()">
    <div class="modal-head"><h3>All Projects</h3><button class="modal-close" onclick="closeModal('modal-projects')">×</button></div>
    <div class="modal-body">
      <div class="modal-pgrid">
        <?php foreach($projects as $p): ?>
        <div class="modal-pcard">
          <div class="modal-piw"><?php if(file_exists(__DIR__.'/'.$p['image'])): ?><img src="<?=htmlspecialchars($p['image'])?>" alt="<?=htmlspecialchars($p['name'])?>"/><?php else: ?><div class="modal-piph"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" style="opacity:.2"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg></div><?php endif; ?></div>
          <div class="modal-pbody">
            <div class="modal-pname"><?=htmlspecialchars($p['name'])?></div>
            <p class="modal-pdesc"><?=htmlspecialchars($p['desc'])?></p>
            <div class="modal-pstack"><?php foreach($p['stack'] as $s): ?><span class="modal-psb"><?=htmlspecialchars($s[0])?></span><?php endforeach; ?></div>
            <div class="modal-plinks"><a href="<?=htmlspecialchars($p['link'])?>" class="modal-plbtn" target="_blank">Live ↗</a><a href="<?=htmlspecialchars($p['repo'])?>" class="modal-plbtn" target="_blank">Repo</a></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<!-- NAV -->
<nav>
  <div class="ni">
    <a href="#hero" class="brand"><?=htmlspecialchars($title)?></a>
    <div class="nlinks" id="nl">
      <?php foreach(['about','tech-stack','experience','projects','contact'] as $s): ?>
      <a href="#<?=$s?>" class="nl"><?=$s==='tech-stack'?'Tech Stack':ucfirst($s)?></a>
      <?php endforeach; ?>
      <button class="tbtn" onclick="toggleTheme()" title="Toggle theme">
        <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
        <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
      </button>
    </div>
    <button class="mbtn" onclick="toggleMenu()">Menu</button>
  </div>
  <div id="mm">
    <?php foreach(['about','tech-stack','experience','projects','contact'] as $s): ?>
    <a href="#<?=$s?>" class="mml" onclick="closeMenu()"><?=$s==='tech-stack'?'Tech Stack':ucfirst($s)?></a>
    <?php endforeach; ?>
    <div class="mm-theme-row">
      <span class="mm-theme-lbl">Appearance</span>
      <button class="mm-tbtn" onclick="toggleTheme()">
        <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
        <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
        <span>Switch to <span class="mode-lbl">Light</span></span>
      </button>
    </div>
  </div>
</nav>

<!-- HERO -->
<div class="w"><section id="hero">
  <div class="hgrid">
    <div class="himg-col">
      <?php if($profile): ?>
      <img src="<?=htmlspecialchars($profile)?>" alt="<?=htmlspecialchars($name)?>" class="pimg"/>
      <?php else: ?>
      <div class="pph"><svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor" style="opacity:.3"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg><span>Add PROFILE.png</span></div>
      <?php endif; ?>
    </div>
    <div class="ha">
      <h1><?=htmlspecialchars($name)?></h1>
      <p class="htag"><?=htmlspecialchars($tagline)?></p>
      <p class="hloc"><svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>Cotabato City, Philippines</p>
      <div class="hbtns"><a href="#contact" class="btn bp">Get in Touch</a><a href="#projects" class="btn bgs">View Projects</a></div>
      <div class="socials">
        <a href="https://<?=htmlspecialchars($facebook)?>" class="soc-btn" target="_blank" title="Facebook"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.514c-1.491 0-1.956.93-1.956 1.886v2.267h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/></svg></a>
        <a href="https://<?=htmlspecialchars($instagram)?>" class="soc-btn" target="_blank" title="Instagram"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg></a>
        <a href="https://<?=htmlspecialchars($github)?>" class="soc-btn" target="_blank" title="GitHub"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.21 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.75-1.33-1.75-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.24 1.84 1.24 1.07 1.83 2.8 1.3 3.49 1 .1-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.17 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 0 1 3-.4c1.02 0 2.04.14 3 .4 2.29-1.55 3.3-1.23 3.3-1.23.66 1.65.25 2.87.12 3.17.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.49 5.92.43.37.82 1.1.82 2.22v3.29c0 .32.22.7.83.58C20.57 21.8 24 17.3 24 12c0-6.63-5.37-12-12-12z"/></svg></a>
      </div>
    </div>
  </div>
</section></div>

<!-- ABOUT -->
<hr/><div class="w"><section id="about" class="rv">
  <div class="sec-hd"><h2>About</h2></div>
  <div class="about-grid">
    <div class="about-text">
      <p>I'm a Full-Stack Web Developer specializing in front-end and back-end web development. With experience in <strong style="color:var(--t);font-weight:600">React, Tailwind CSS</strong>, and <strong style="color:var(--t);font-weight:600">PHP</strong>, I develop modern web solutions that are fast, responsive, and user-focused.</p>
      <p>My approach combines clean architecture with intuitive user experience. I enjoy solving complex technical challenges, optimizing application performance, and transforming ideas into polished digital products.</p>
    </div>
    <div class="about-text">
      <p>When I'm not coding, I'm exploring new frameworks, contributing to open-source projects, and staying current with the evolving web ecosystem. I'm always open to new opportunities and collaborations — feel free to reach me out.</p>
    </div>
  </div>
</section></div>

<!-- TECH STACK -->
<hr/><div class="w"><section id="tech-stack" class="rv">
  <div class="sec-hd">
    <h2>Tech Stack</h2>
    <button class="view-all" onclick="openModal('modal-skills')">View All<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg></button>
  </div>
  <div class="scats">
    <?php foreach($skills as $cat=>$items): ?>
    <div>
      <span class="scat-lbl"><?=htmlspecialchars($cat)?></span>
      <div class="stags">
        <?php $shown=array_slice($items,0,5); foreach($shown as $i): ?><span class="stag"><?=htmlspecialchars($i)?></span><?php endforeach; ?>
        <?php if(count($items)>5): ?><button class="stag stag-more" onclick="openModal('modal-skills')">+<?=count($items)-5?> more</button><?php endif; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section></div>

<!-- EXPERIENCE -->
<hr/><div class="w"><section id="experience" class="rv">
  <div class="sec-hd">
    <h2>Experience</h2>
    <button class="view-all" onclick="openModal('modal-exp')">View All<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg></button>
  </div>
  <div class="elist">
    <?php foreach(array_slice($experience,0,2) as $exp): ?>
    <div class="eitem">
      <div class="etl"><div class="edot"></div><div class="eline"></div></div>
      <div>
        <div class="etop">
          <div><span class="erole"><?=htmlspecialchars($exp['role'])?></span><?php if($exp['company']): ?><span class="eco">@ <?=htmlspecialchars($exp['company'])?></span><?php endif; ?></div>
          <span class="eper"><?=htmlspecialchars($exp['period'])?></span>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section></div>

<!-- PROJECTS -->
<hr/><div class="w"><section id="projects" class="rv">
  <div class="sec-hd">
    <h2>Projects</h2>
    <button class="view-all" onclick="openModal('modal-projects')">View All<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg></button>
  </div>
  <div class="pgrid">
    <?php foreach(array_slice($projects,0,2) as $p): ?>
    <div class="pcard">
      <div class="piw">
        <?php if(file_exists(__DIR__.'/'.$p['image'])): ?><img src="<?=htmlspecialchars($p['image'])?>" alt="<?=htmlspecialchars($p['name'])?>" class="pi"/>
        <?php else: ?><div class="piph"><svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" style="opacity:.25"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/></svg><span><?=htmlspecialchars($p['image'])?></span></div><?php endif; ?>
        <div class="pov"></div>
        <div class="plnks">
          <a href="<?=htmlspecialchars($p['link'])?>" class="plbtn" target="_blank" title="Live">↗</a>
          <a href="<?=htmlspecialchars($p['repo'])?>" class="plbtn" target="_blank" title="Repo"><svg width="11" height="11" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.21 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.75-1.33-1.75-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.24 1.84 1.24 1.07 1.83 2.8 1.3 3.49 1 .1-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.17 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 0 1 3-.4c1.02 0 2.04.14 3 .4 2.29-1.55 3.3-1.23 3.3-1.23.66 1.65.25 2.87.12 3.17.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.49 5.92.43.37.82 1.1.82 2.22v3.29c0 .32.22.7.83.58C20.57 21.8 24 17.3 24 12c0-6.63-5.37-12-12-12z"/></svg></a>
        </div>
      </div>
      <div class="pbody">
        <div class="pname"><?=htmlspecialchars($p['name'])?></div>
        <p class="pdesc"><?=htmlspecialchars($p['desc'])?></p>
        <div class="pstack"><?php foreach($p['stack'] as $s): ?><span class="psb"><?=htmlspecialchars($s[0])?></span><?php endforeach; ?></div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section></div>

<!-- CONTACT -->
<hr/><div class="w"><section id="contact" class="rv">
  <div class="sec-hd"><h2>Contact</h2></div>
  <div class="cgrid">
    <div class="cinfo">
      <div><span class="cilbl">Email</span><a href="mailto:<?=htmlspecialchars($email)?>" class="cival"><?=htmlspecialchars($email)?></a></div>
      <div><span class="cilbl">GitHub</span><a href="https://<?=htmlspecialchars($github)?>" class="cival" target="_blank"><?=htmlspecialchars($github)?></a></div>
      <div>
        <span class="cilbl">Social</span>
        <div class="c-socials">
          <a href="https://<?=htmlspecialchars($facebook)?>" class="c-soc" target="_blank" title="Facebook"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.514c-1.491 0-1.956.93-1.956 1.886v2.267h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/></svg></a>
          <a href="https://<?=htmlspecialchars($instagram)?>" class="c-soc" target="_blank" title="Instagram"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg></a>
          <a href="https://<?=htmlspecialchars($github)?>" class="c-soc" target="_blank" title="GitHub"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.44 9.8 8.21 11.39.6.11.82-.26.82-.58v-2.03c-3.34.73-4.04-1.61-4.04-1.61-.54-1.38-1.33-1.75-1.33-1.75-1.09-.74.08-.73.08-.73 1.2.08 1.84 1.24 1.84 1.24 1.07 1.83 2.8 1.3 3.49 1 .1-.78.42-1.3.76-1.6-2.67-.3-5.47-1.33-5.47-5.93 0-1.31.47-2.38 1.24-3.22-.13-.3-.54-1.52.12-3.17 0 0 1.01-.32 3.3 1.23a11.5 11.5 0 0 1 3-.4c1.02 0 2.04.14 3 .4 2.29-1.55 3.3-1.23 3.3-1.23.66 1.65.25 2.87.12 3.17.77.84 1.24 1.91 1.24 3.22 0 4.61-2.81 5.63-5.49 5.92.43.37.82 1.1.82 2.22v3.29c0 .32.22.7.83.58C20.57 21.8 24 17.3 24 12c0-6.63-5.37-12-12-12z"/></svg></a>
        </div>
      </div>
      <div><span class="cilbl">Status</span><div class="avail"><span class="adot"></span>Available for hire</div></div>
    </div>
    <div>
      <?php if($submitted): ?>
      <div class="sbox"><h3>Message received ✓</h3><p>Thank you — I'll get back to you shortly.</p></div>
      <?php else: ?>
      <?php if($errors): ?><div class="ebox"><?php foreach($errors as $e): ?><p>✕ <?=htmlspecialchars($e)?></p><?php endforeach; ?></div><?php endif; ?>
      <form method="POST" action="#contact">
        <div class="fg"><label class="fl" for="cn">Name</label><input type="text" id="cn" name="cname" class="fi" placeholder="Your full name" value="<?=htmlspecialchars($_POST['cname']??'')?>"/></div>
        <div class="fg"><label class="fl" for="ce">Email</label><input type="email" id="ce" name="cemail" class="fi" placeholder="your@email.com" value="<?=htmlspecialchars($_POST['cemail']??'')?>"/></div>
        <div class="fg"><label class="fl" for="cm">Message</label><textarea id="cm" name="cmsg" class="fta" rows="4" placeholder="Tell me about your project."><?=htmlspecialchars($_POST['cmsg']??'')?></textarea></div>
        <button type="submit" class="fsub">Send Message →</button>
      </form>
      <?php endif; ?>
    </div>
  </div>
</section></div>

<footer>
  <div class="fi2">
    <p><?=htmlspecialchars($title)?> — <?=htmlspecialchars($name)?></p>
    <p>© <?=date('Y')?></p>
  </div>
</footer>

<!-- ===== AI CHAT WIDGET ===== -->
<!-- Floating Action Button -->
<button class="ai-fab" id="aiFab" onclick="toggleChat()" title="Ask AI about Norsed">
  <svg class="fab-open" viewBox="0 0 24 24" fill="currentColor">
    <path d="M12 2l1.5 5.5 5.5 1.5-5.5 1.5L12 16l-1.5-5.5L5 9l5.5-1.5z"/>
    <circle cx="19" cy="3" r="1.2" opacity=".7"/>
    <circle cx="5" cy="18" r=".8" opacity=".5"/>
  </svg>
  <svg class="fab-close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
  </svg>
</button>

<!-- Chat Panel -->
<div class="ai-panel" id="aiPanel">

  <div class="ai-head">
    <div class="ai-avatar">
      <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16"><path d="M12 2l1.5 5.5 5.5 1.5-5.5 1.5L12 16l-1.5-5.5L5 9l5.5-1.5z"/></svg>
    </div>
    <div class="ai-head-info">
      <div class="ai-head-name">Ask about Norsed</div>
      <div class="ai-head-sub">
        <span class="ai-online"></span>
        AI Assistant
        <span class="ai-badge">RAG + LLM</span>
      </div>
    </div>
    <button class="ai-clear" onclick="clearChat()" title="Clear chat">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 1 0 .49-3.96"/></svg>
    </button>
  </div>

  <div class="ai-messages" id="aiMessages">
    <div class="ai-msg bot">
      <div class="ai-bubble">Hi! 👋 I'm an AI assistant with full knowledge of Norsed's portfolio. Ask me about his skills, projects, experience, or anything else!</div>
      <span class="ai-msg-time">now</span>
    </div>
  </div>

  <div class="ai-typing" id="aiTyping">
    <div class="ai-typing-bubble">
      <div class="ai-typing-dot"></div><div class="ai-typing-dot"></div><div class="ai-typing-dot"></div>
    </div>
  </div>

  <div class="ai-suggestions" id="aiSuggestions">
    <button class="ai-sug" onclick="sendSuggestion(this)">His skills?</button>
    <button class="ai-sug" onclick="sendSuggestion(this)">Projects built</button>
    <button class="ai-sug" onclick="sendSuggestion(this)">Available for hire?</button>
    <button class="ai-sug" onclick="sendSuggestion(this)">How to contact?</button>
  </div>

  <div class="ai-input-row">
    <textarea class="ai-input" id="aiInput" placeholder="Ask anything about Norsed…" rows="1" onkeydown="handleKey(event)" oninput="autoResize(this)"></textarea>
    <button class="ai-send" id="aiSend" onclick="sendMessage()" disabled>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
    </button>
  </div>

  <div class="ai-powered"><span>Powered by Claude · Anthropic</span></div>
</div>

<script>
// ─── Theme / UI helpers ─────────────────────────────────────
const html = document.documentElement;
function syncLabels(d){ document.querySelectorAll('.mode-lbl').forEach(e=>e.textContent=d?'Light':'Dark'); }
const saved=localStorage.getItem('nd-theme');
if(saved){html.setAttribute('data-theme',saved);syncLabels(saved==='dark');}
function toggleTheme(){const n=html.getAttribute('data-theme')==='dark'?'light':'dark';html.setAttribute('data-theme',n);localStorage.setItem('nd-theme',n);syncLabels(n==='dark');}
function toggleMenu(){document.getElementById('mm').classList.toggle('open');}
function closeMenu(){document.getElementById('mm').classList.remove('open');}
function openModal(id){document.getElementById(id).classList.add('open');document.body.style.overflow='hidden';}
function closeModal(id){document.getElementById(id).classList.remove('open');document.body.style.overflow='';}
document.addEventListener('keydown',e=>{if(e.key==='Escape'){document.querySelectorAll('.modal-overlay.open').forEach(m=>{m.classList.remove('open');document.body.style.overflow='';});}});
const obs=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');obs.unobserve(e.target);}}),{threshold:.07});
document.querySelectorAll('.rv').forEach(el=>obs.observe(el));
const secs=document.querySelectorAll('section[id]'),nls=document.querySelectorAll('.nl');
window.addEventListener('scroll',()=>{let cur='';secs.forEach(s=>{if(window.scrollY>=s.offsetTop-70)cur=s.id;});nls.forEach(l=>{const a=l.getAttribute('href')==='#'+cur;l.style.color=a?'var(--t)':'';l.style.background=a?'var(--bg3)':'';});},{passive:true});

// ─── AI CHAT ────────────────────────────────────────────────

// =====================================================================
// RAG KNOWLEDGE BASE — all portfolio data baked into the system prompt
// This is the "Retrieval" layer: structured context injected per request
// =====================================================================
const RAG_CONTEXT = `You are a helpful AI assistant embedded in Norsed Malawan's personal portfolio website.
Your job is to answer visitor questions about Norsed in a friendly, concise, and accurate way.
Only answer based on the knowledge base below. If asked something outside this scope, say you only have portfolio info and suggest contacting Norsed directly.
Keep answers brief and scannable. Use line breaks for lists.

--- KNOWLEDGE BASE ---

PERSONAL INFO
Name: Norsed Malawan | Brand: Norsed.Dev
Role: Full-Stack Web Developer (Front-End & Back-End)
Location: Cotabato City, Philippines
Email: norsedmalawan@gmail.com
GitHub: github.com/norsed
Facebook: facebook.com/norsed | Instagram: instagram.com/norsed
Status: Available for hire ✅

BIO
Norsed builds fast, responsive, user-focused web solutions. He specializes in React, Tailwind CSS, and PHP. He cares about clean architecture, good UX, and writing maintainable code. Outside of work he explores new frameworks, contributes to open source, and keeps up with the web ecosystem.

TECH STACK
Frontend: HTML5, CSS3, JavaScript, React, Tailwind CSS, Bootstrap, AJAX
Backend: PHP, MySQL, C#
Tools: Visual Studio Code, Visual Studio 2022, GitHub

EXPERIENCE
• On-the-Job Training @ MBHTE-BARMM — 2026–Present
• B.S. Information Technology @ Cotabato State University — 2022–2026
• Started programming in 2021 ("Hello World" moment)

PROJECTS (4 total)
1. ShopFlow — Full-stack e-commerce: real-time inventory, Stripe payments, admin dashboard | Stack: Laravel, Vue.js, MySQL, Stripe
2. TaskBridge — Kanban board with drag-and-drop & real-time WebSocket collaboration | Stack: React, Node.js, MongoDB, Socket.io
3. DevFolio CMS — Lightweight Markdown CMS with REST API & Docker deployment | Stack: PHP, MySQL, REST API, Docker
4. MetricsPulse — Real-time analytics dashboard with third-party API integrations | Stack: Next.js, PostgreSQL, Chart.js, Python

CONTACT / HIRE
Email norsedmalawan@gmail.com or use the contact form on this page.
Also reachable via GitHub, Facebook, and Instagram.
--- END KNOWLEDGE BASE ---`;

// ==================
// Chat state
// ==================
let chatHistory = [];
let chatOpen    = false;
let isLoading   = false;

// ==================
// YOUR ANTHROPIC API KEY
// For production, proxy this through a PHP backend (chat-api.php)
// to keep the key server-side. For local dev, paste it here.
// ==================
const ANTHROPIC_API_KEY = 'YOUR_ANTHROPIC_API_KEY_HERE';

function toggleChat(){
  chatOpen=!chatOpen;
  document.getElementById('aiPanel').classList.toggle('open',chatOpen);
  document.getElementById('aiFab').classList.toggle('open',chatOpen);
  if(chatOpen) setTimeout(()=>document.getElementById('aiInput').focus(),220);
}

function clearChat(){
  chatHistory=[];
  document.getElementById('aiMessages').innerHTML=`<div class="ai-msg bot"><div class="ai-bubble">Hi! 👋 I'm an AI assistant with full knowledge of Norsed's portfolio. Ask me about his skills, projects, experience, or anything else!</div><span class="ai-msg-time">now</span></div>`;
  document.getElementById('aiSuggestions').style.display='';
}

function autoResize(el){
  el.style.height='auto';
  el.style.height=Math.min(el.scrollHeight,90)+'px';
  document.getElementById('aiSend').disabled=!el.value.trim();
}

function handleKey(e){if(e.key==='Enter'&&!e.shiftKey){e.preventDefault();sendMessage();}}

function sendSuggestion(btn){
  document.getElementById('aiInput').value=btn.textContent;
  document.getElementById('aiSuggestions').style.display='none';
  sendMessage();
}

function nowTime(){return new Date().toLocaleTimeString([],{hour:'2-digit',minute:'2-digit'});}

function appendMsg(role,text){
  const msgs=document.getElementById('aiMessages');
  const d=document.createElement('div');
  d.className=`ai-msg ${role}`;
  d.innerHTML=`<div class="ai-bubble">${text.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/\n/g,'<br>')}</div><span class="ai-msg-time">${nowTime()}</span>`;
  msgs.appendChild(d);
  msgs.scrollTop=msgs.scrollHeight;
}

function setTyping(show){
  document.getElementById('aiTyping').classList.toggle('show',show);
  const msgs=document.getElementById('aiMessages');
  msgs.scrollTop=msgs.scrollHeight;
}

// Local RAG fallback (answers without API when key not set / network fails)
function localRAG(q){
  q=q.toLowerCase();
  if(/skill|tech|stack|language|framework|know|use|frontend|backend/.test(q))
    return "Norsed's tech stack:\n\nFrontend: HTML5, CSS3, JavaScript, React, Tailwind CSS, Bootstrap, AJAX\nBackend: PHP, MySQL, C#\nTools: VS Code, GitHub, Visual Studio 2022";
  if(/project|built|made|work|portfolio|app/.test(q))
    return "Norsed has 4 projects:\n\n• ShopFlow — e-commerce (Laravel, Vue.js, Stripe)\n• TaskBridge — Kanban tool (React, WebSockets)\n• DevFolio CMS — PHP Markdown CMS\n• MetricsPulse — analytics dashboard (Next.js, Chart.js)";
  if(/contact|email|reach|message|dm/.test(q))
    return "You can reach Norsed at:\n\nnorsedmalawan@gmail.com\n\nOr use the contact form on this page. He's also on GitHub, Facebook, and Instagram (@norsed).";
  if(/hire|available|job|freelan|opportunit|open to/.test(q))
    return "Yes! Norsed is currently available for hire. 🟢\n\nSend him a message at norsedmalawan@gmail.com or use the contact form.";
  if(/experience|background|education|study|school|university|ojt/.test(q))
    return "Norsed's background:\n\n• OJT @ MBHTE-BARMM (2026–Present)\n• B.S. IT @ Cotabato State University (2022–2026)\n• Started coding in 2021";
  if(/about|who|introduce|himself|person/.test(q))
    return "Norsed Malawan is a Full-Stack Web Developer from Cotabato City, Philippines. He builds fast, responsive web apps with React, Tailwind CSS, and PHP — blending clean code with great UX.";
  if(/location|where|city|country|from/.test(q))
    return "Norsed is based in Cotabato City, Philippines.";
  return "I can answer questions about Norsed's skills, projects, experience, and how to contact him. What would you like to know?";
}

async function sendMessage(){
  if(isLoading) return;
  const input=document.getElementById('aiInput');
  const text=input.value.trim();
  if(!text) return;

  document.getElementById('aiSuggestions').style.display='none';
  appendMsg('user',text);
  chatHistory.push({role:'user',content:text});
  input.value='';
  input.style.height='auto';
  document.getElementById('aiSend').disabled=true;
  isLoading=true;
  setTyping(true);

  // If no API key set, use local RAG fallback instantly
  if(!ANTHROPIC_API_KEY || ANTHROPIC_API_KEY==='YOUR_ANTHROPIC_API_KEY_HERE'){
    await new Promise(r=>setTimeout(r,600+Math.random()*400));
    setTyping(false);
    const reply=localRAG(text);
    appendMsg('bot',reply);
    chatHistory.push({role:'assistant',content:reply});
    isLoading=false;
    return;
  }

  try{
    // Option A: Direct browser call (dev/demo — key exposed)
    // Option B (recommended for prod): POST to your own chat-api.php proxy
    const res=await fetch('https://api.anthropic.com/v1/messages',{
      method:'POST',
      headers:{
        'Content-Type':'application/json',
        'x-api-key':ANTHROPIC_API_KEY,
        'anthropic-version':'2023-06-01',
        'anthropic-dangerous-direct-browser-ipc':'true'
      },
      body:JSON.stringify({
        model:'claude-haiku-4-5-20251001',
        max_tokens:400,
        system:RAG_CONTEXT,
        messages:chatHistory.slice(-10) // keep last 10 turns for context window
      })
    });
    const data=await res.json();
    setTyping(false);

    if(data.error){
      const e=data.error.type==='authentication_error'
        ?'⚠️ API key not configured. Contact Norsed directly at norsedmalawan@gmail.com!'
        :`Error: ${data.error.message}`;
      appendMsg('bot',e);
      chatHistory.push({role:'assistant',content:e});
    } else {
      const reply=data.content?.[0]?.text||'Sorry, I couldn\'t get a response.';
      appendMsg('bot',reply);
      chatHistory.push({role:'assistant',content:reply});
    }
  } catch(err){
    setTyping(false);
    // Network error — fall back to local RAG
    const reply=localRAG(text);
    appendMsg('bot',reply);
    chatHistory.push({role:'assistant',content:reply});
  }
  isLoading=false;
}
</script>
</body>
</html>