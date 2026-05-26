@extends('layouts.app')
@section('title', 'Закажување посета')
@section('content')

<style>
  :root {
    --blue-deep: #1a3a6b;
    --blue-mid:  #2563eb;
    --blue-light:#dbeafe;
    --blue-pale: #eff6ff;
    --border:    #bfdbfe;
  }
  * { box-sizing: border-box; }

  h1,h2,h3 { font-family: 'Source Serif 4', serif; }

  .card {
    background: #fff;
    border: 1.5px solid var(--border);
    border-radius: 16px;
    box-shadow: 0 4px 24px 0 rgba(37,99,235,0.07);
  }

  .section-title {
    font-family: 'Source Serif 4', serif;
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--blue-deep);
    letter-spacing: .02em;
    display: flex;
    align-items: center;
    gap: .55rem;
    padding-bottom: .55rem;
    border-bottom: 2px solid var(--blue-light);
    margin-bottom: 1.1rem;
  }

  .form-label {
    display: block;
    font-size: .82rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: .3rem;
    letter-spacing: .01em;
  }
  .form-label .req { color: #2563eb; margin-left:2px; }

  .form-input {
    width: 100%;
    border: 1.5px solid #c7d9f5;
    border-radius: 9px;
    padding: .6rem .85rem;
    font-size: .93rem;
    color: #1e293b;
    background: var(--blue-pale);
    transition: border .18s, box-shadow .18s;
    outline: none;
  }
  .form-input:focus {
    border-color: var(--blue-mid);
    background: #fff;
    box-shadow: 0 0 0 3px rgba(37,99,235,0.13);
  }
  .form-input.error {
    border-color: #ef4444;
    background: #fff5f5;
  }
  .error-msg {
    font-size: .77rem;
    color: #dc2626;
    margin-top: .25rem;
    display: none;
  }
  .error-msg.show { display: block; }

  .radio-group { display: flex; gap: .8rem; flex-wrap: wrap; }
  .radio-option {
    display: flex; align-items: center; gap: .4rem;
    cursor: pointer; font-size: .9rem;
    padding: .5rem .9rem;
    border: 1.5px solid #c7d9f5;
    border-radius: 8px;
    background: var(--blue-pale);
    transition: border .15s, background .15s;
    user-select: none;
  }
  .radio-option:hover { border-color: var(--blue-mid); background: #dbeafe; }
  .radio-option input[type=radio] { accent-color: var(--blue-mid); width:16px; height:16px; }
  .radio-option.selected { border-color: var(--blue-mid); background: #dbeafe; font-weight:600; }

  .count-ctrl { display: flex; align-items: center; gap: .6rem; }
  .count-btn {
    width:36px; height:36px;
    border-radius: 8px;
    border: 1.5px solid var(--blue-mid);
    background: var(--blue-pale);
    color: var(--blue-mid);
    font-size: 1.3rem;
    font-weight: 700;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: background .14s;
    line-height:1;
  }
  .count-btn:hover { background: #dbeafe; }
  .count-val {
    min-width: 44px; text-align: center;
    font-size: 1.05rem; font-weight: 700;
    color: var(--blue-deep);
    border: 1.5px solid #c7d9f5;
    border-radius: 8px;
    padding: .3rem .6rem;
    background: #fff;
  }

  .btn-primary {
    background: linear-gradient(135deg, #2563eb 0%, #1a3a6b 100%);
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: .75rem 2rem;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    letter-spacing: .02em;
    transition: opacity .17s, transform .13s, box-shadow .17s;
    box-shadow: 0 2px 12px rgba(37,99,235,.25);
  }
  .btn-primary:hover { opacity: .92; transform: translateY(-1px); box-shadow: 0 6px 20px rgba(37,99,235,.3); }
  .btn-primary:active { transform: translateY(0); }

  .btn-danger {
    background: #fff;
    color: #dc2626;
    border: 2px solid #fca5a5;
    border-radius: 10px;
    padding: .65rem 1.6rem;
    font-size: .95rem;
    font-weight: 700;
    cursor: pointer;
    transition: background .15s, border-color .15s;
  }
  .btn-danger:hover { background: #fff5f5; border-color: #ef4444; }

  .step-dot {
    width:10px; height:10px; border-radius:50%;
    background: #c7d9f5; display:inline-block;
    transition: background .2s;
  }
  .step-dot.active { background: var(--blue-mid); }
  .step-dot.done   { background: #1a3a6b; }

  .success-icon {
    width:72px; height:72px;
    border-radius:50%;
    background: linear-gradient(135deg,#2563eb,#1a3a6b);
    display:flex; align-items:center; justify-content:center;
    margin: 0 auto 1.2rem;
    box-shadow: 0 4px 20px rgba(37,99,235,.3);
  }

  #cancelOverlay {
    display:none; position:fixed; inset:0;
    background: rgba(15,23,42,.45); backdrop-filter:blur(2px);
    z-index:1000; align-items:center; justify-content:center;
  }
  #cancelOverlay.show { display:flex; }

  .pill {
    display: inline-block;
    background: var(--blue-light);
    color: var(--blue-deep);
    border-radius: 999px;
    padding: .18rem .75rem;
    font-size: .8rem;
    font-weight: 700;
    letter-spacing: .04em;
    text-transform: uppercase;
  }

  .time-grid { display:flex; flex-wrap:wrap; gap:.5rem; }
  .time-slot {
    padding:.42rem .85rem;
    border:1.5px solid #c7d9f5;
    border-radius:8px;
    background:var(--blue-pale);
    font-size:.88rem; font-weight:600;
    color:#374151; cursor:pointer;
    transition: all .14s;
  }
  .time-slot:hover { border-color:var(--blue-mid); background:#dbeafe; }
  .time-slot.selected { background:var(--blue-mid); color:#fff; border-color:var(--blue-mid); }

  @keyframes fadeIn { from{opacity:0;transform:translateY(12px)} to{opacity:1;transform:translateY(0)} }
  .fade-in { animation: fadeIn .35s ease both; }

  .code-box {
    background: var(--blue-pale);
    border: 2px dashed var(--blue-mid);
    border-radius: 12px;
    padding: 1.2rem;
    text-align: center;
  }
  .code-val {
    font-family: 'Source Serif 4', serif;
    font-size: 2.2rem;
    font-weight: 700;
    letter-spacing: .18em;
    color: var(--blue-deep);
  }
</style>

<div class="py-8 px-3">

  <!-- ======= MAIN FORM ======= -->
  <div id="mainForm" class="max-w-2xl mx-auto fade-in">

    <!-- Top badge -->
    <div class="flex items-center gap-3 mb-6">
      <div style="width:44px;height:44px;background:linear-gradient(135deg,#2563eb,#1a3a6b);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0">
        <svg width="24" height="24" fill="none" stroke="#fff" stroke-width="2.2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
      </div>
      <div>
        <div class="text-xs font-semibold uppercase tracking-widest" style="color:#2563eb">Управа за извршување санкции</div>
        <h1 class="text-xl font-bold leading-tight" style="color:#1a3a6b;font-family:'Source Serif 4',serif">Закажување посета во затвор</h1>
      </div>
    </div>

    <!-- Progress dots -->
    <div class="flex items-center gap-2 mb-6">
      <span id="dot1" class="step-dot active"></span>
      <span id="dot2" class="step-dot"></span>
      <span id="dot3" class="step-dot"></span>
      <span class="text-xs text-gray-400 ml-1" id="stepLabel">Чекор 1 од 3</span>
    </div>

    <!-- STEP 1 — Посетител -->
    <div id="step1" class="card p-6 mb-4">
      <div class="section-title">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
        Податоци за посетителот
      </div>
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
          <label class="form-label">Име <span class="req">*</span></label>
          <input id="ime" class="form-input" placeholder="Вашето име" maxlength="60"/>
          <div class="error-msg" id="err-ime">Полето е задолжително.</div>
        </div>
        <div>
          <label class="form-label">Презиме <span class="req">*</span></label>
          <input id="prezime" class="form-input" placeholder="Вашето презиме" maxlength="60"/>
          <div class="error-msg" id="err-prezime">Полето е задолжително.</div>
        </div>
        <div>
          <label class="form-label">Email адреса</label>
          <input id="email" type="email" class="form-input" placeholder="пример@mail.com (незадолжително)"/>
          <div class="error-msg" id="err-email">Внесете валидна email адреса.</div>
        </div>
        <div>
          <label class="form-label">Мобилен број</label>
          <input id="mobilen" class="form-input" placeholder="+389 7X XXX XXX (незадолжително)" maxlength="20"/>
        </div>
      </div>
      <p class="text-xs text-gray-400 mt-3">* Не е задолжително да внесете и email и број — доволен е еден или ниту еден.</p>
    </div>

    <!-- STEP 2 — Термин -->
    <div id="step2" class="card p-6 mb-4">
      <div class="section-title">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
        Термин и број на посетители
      </div>
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
          <label class="form-label">Датум на посета <span class="req">*</span></label>
          <input id="datum" type="date" class="form-input"/>
          <div class="error-msg" id="err-datum">Одберете датум (мин. 2 дена однапред).</div>
        </div>
        <div>
          <label class="form-label">Час на посета <span class="req">*</span></label>
          <div class="time-grid" id="timeGrid"></div>
          <input type="hidden" id="cas"/>
          <div class="error-msg" id="err-cas">Одберете час.</div>
        </div>
      </div>
      <div class="mt-4">
        <label class="form-label">Број на посетители <span class="req">*</span></label>
        <div class="count-ctrl">
          <button type="button" class="count-btn" onclick="changeCount(-1)">−</button>
          <div class="count-val" id="countVal">1</div>
          <button type="button" class="count-btn" onclick="changeCount(1)">+</button>
          <span class="text-sm text-gray-400 ml-1">лица</span>
        </div>
      </div>
    </div>

    <!-- STEP 3 — Затвореник -->
    <div id="step3" class="card p-6 mb-4">
      <div class="section-title">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/><circle cx="12" cy="16" r="1" fill="currentColor"/></svg>
        Податоци за затвореникот
      </div>
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
          <label class="form-label">Регистарски број на затвореник <span class="req">*</span></label>
          <input id="zatvorenik1" class="form-input" placeholder="пр. 2024-00123" maxlength="30"/>
          <div class="error-msg" id="err-zat1">Внесете го бројот на затвореникот.</div>
        </div>
        <div>
          <label class="form-label">Потврди го бројот повторно <span class="req">*</span></label>
          <input id="zatvorenik2" class="form-input" placeholder="пр. 2024-00123" maxlength="30"/>
          <div class="error-msg" id="err-zat2">Броевите не се совпаѓаат.</div>
        </div>
      </div>
      <div class="mt-5">
        <label class="form-label">Како сакате да добиете потврда? <span class="req">*</span></label>
        <div class="radio-group mt-1" id="notifyGroup">
          <label class="radio-option" id="ro-sms">
            <input type="radio" name="notify" value="sms" onchange="selectNotify(this)"/>
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><circle cx="12" cy="17" r="1" fill="currentColor"/></svg>
            SMS на мобилен
          </label>
          <label class="radio-option" id="ro-email">
            <input type="radio" name="notify" value="email" onchange="selectNotify(this)"/>
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 7l10 7 10-7"/></svg>
            Email
          </label>
          <label class="radio-option" id="ro-none">
            <input type="radio" name="notify" value="none" onchange="selectNotify(this)"/>
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 8v4l3 3"/></svg>
            Кодот на страната
          </label>
        </div>
        <div class="error-msg" id="err-notify" style="display:none">Одберете начин за потврда.</div>
      </div>
    </div>

    <!-- Submit -->
    <div class="flex justify-end mt-2">
      <button type="button" class="btn-primary" onclick="submitForm()">
        <span class="flex items-center gap-2">
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path d="M22 2L11 13"/><path d="M22 2L15 22l-4-9-9-4 20-7z"/></svg>
          Испрати барање до администраторот
        </span>
      </button>
    </div>
  </div>

  <!-- ======= SUCCESS SCREEN ======= -->
  <div id="successScreen" class="max-w-xl mx-auto fade-in" style="display:none">
    <div class="card p-8 text-center">
      <div class="success-icon">
        <svg width="36" height="36" fill="none" stroke="#fff" stroke-width="2.5" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
      </div>
      <h2 class="text-2xl font-bold mb-2" style="color:#1a3a6b">Барањето е испратено!</h2>
      <p class="text-gray-500 mb-5 text-sm">Администраторот ќе го разгледа барањето и ќе добиете потврда.</p>

      <div class="code-box mb-4">
        <div class="text-xs font-semibold uppercase tracking-widest mb-1" style="color:#2563eb" id="codeLabel">Вашиот код за потврда</div>
        <div class="code-val" id="displayCode">——</div>
        <div class="text-xs text-gray-400 mt-2" id="codeNote"></div>
      </div>

      <div id="summaryBox" class="text-left bg-blue-50 rounded-xl p-4 mb-6 text-sm space-y-1"></div>

      <button type="button" class="btn-danger w-full mt-2" onclick="openCancelOverlay()">
        <span class="flex items-center justify-center gap-2">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
          Откажи ја посетата (48ч пред одење)
        </span>
      </button>
      <p class="text-xs text-gray-400 mt-2">Откажувањето е возможно најдоцна 48 часа пред закажаниот термин.</p>
    </div>
  </div>

  <!-- ======= CANCEL OVERLAY ======= -->
  <div id="cancelOverlay">
    <div class="card p-7 max-w-md w-full mx-3 fade-in">
      <div class="flex items-center gap-3 mb-4">
        <div style="width:40px;height:40px;border-radius:9px;background:#fee2e2;display:flex;align-items:center;justify-content:center;flex-shrink:0">
          <svg width="22" height="22" fill="none" stroke="#dc2626" stroke-width="2.3" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
        </div>
        <h3 class="text-lg font-bold" style="color:#1a3a6b;font-family:'Source Serif 4',serif">Потврди откажување</h3>
      </div>
      <p class="text-sm text-gray-600 mb-4">За да ја откажете посетата, внесете го вашето целосно <strong>Име и Презиме</strong> и <strong>кодот</strong> кој го добивте.</p>
      <div class="space-y-3">
        <div>
          <label class="form-label">Име и Презиме <span class="req">*</span></label>
          <input id="cancelName" class="form-input" placeholder="пр. Марко Иванов"/>
          <div class="error-msg" id="err-cancelName">Не се совпаѓа со резервираното ime/prezime.</div>
        </div>
        <div>
          <label class="form-label">Код за потврда <span class="req">*</span></label>
          <input id="cancelCode" class="form-input" placeholder="6-цифрен код" maxlength="6"/>
          <div class="error-msg" id="err-cancelCode">Кодот не е точен.</div>
        </div>
      </div>
      <div class="flex gap-3 mt-5">
        <button type="button" class="btn-danger flex-1" onclick="confirmCancel()">Да, откажи ја</button>
        <button type="button" class="btn-primary flex-1" onclick="closeCancelOverlay()">Назад</button>
      </div>
    </div>
  </div>

  <!-- ======= CANCELLED SCREEN ======= -->
  <div id="cancelledScreen" class="max-w-xl mx-auto fade-in" style="display:none">
    <div class="card p-8 text-center">
      <div style="width:72px;height:72px;border-radius:50%;background:#fee2e2;display:flex;align-items:center;justify-content:center;margin:0 auto 1.2rem">
        <svg width="38" height="38" fill="none" stroke="#dc2626" stroke-width="2.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
      </div>
      <h2 class="text-2xl font-bold mb-2" style="color:#1a3a6b">Посетата е откажана</h2>
      <p class="text-gray-500 text-sm">Вашата резервација е успешно откажана. Ако имате прашања, контактирајте ја управата на затворот.</p>
    </div>
  </div>

</div><!-- end py-8 wrapper -->

<script>
let visitCount = 1;
let selectedTime = '';
let bookingCode = '';
let bookingData = {};

const TIMES = ['08:00','09:00','10:00','11:00','13:00','14:00','15:00','16:00'];

(function init(){
  const timeGrid = document.getElementById('timeGrid');
  TIMES.forEach(t => {
    const b = document.createElement('button');
    b.type = 'button';
    b.className = 'time-slot';
    b.textContent = t;
    b.onclick = () => selectTime(t, b);
    timeGrid.appendChild(b);
  });
  const minD = new Date();
  minD.setDate(minD.getDate() + 2);
  document.getElementById('datum').min = minD.toISOString().split('T')[0];
})();

function selectTime(t, btn){
  selectedTime = t;
  document.getElementById('cas').value = t;
  document.querySelectorAll('.time-slot').forEach(b => b.classList.remove('selected'));
  btn.classList.add('selected');
}

function changeCount(d){
  visitCount = Math.max(1, visitCount + d);
  document.getElementById('countVal').textContent = visitCount;
}

function selectNotify(radio){
  document.querySelectorAll('.radio-option').forEach(el => el.classList.remove('selected'));
  radio.closest('.radio-option').classList.add('selected');
}

function setErr(id, show, msg){
  const el = document.getElementById('err-'+id);
  if(!el) return;
  if(msg) el.textContent = msg;
  el.classList.toggle('show', show);
  const inp = document.getElementById(id);
  if(inp) inp.classList.toggle('error', show);
}
function clearErr(id){ setErr(id, false); }

function genCode(){
  return String(Math.floor(100000 + Math.random()*900000));
}

function submitForm(){
  let ok = true;

  const ime     = document.getElementById('ime').value.trim();
  const prezime = document.getElementById('prezime').value.trim();
  const email   = document.getElementById('email').value.trim();
  const mobilen = document.getElementById('mobilen').value.trim();
  const datum   = document.getElementById('datum').value;
  const cas     = document.getElementById('cas').value;
  const zat1    = document.getElementById('zatvorenik1').value.trim();
  const zat2    = document.getElementById('zatvorenik2').value.trim();
  const notify  = document.querySelector('input[name=notify]:checked');

  if(!ime){ setErr('ime', true, 'Полето е задолжително.'); ok=false; } else clearErr('ime');
  if(!prezime){ setErr('prezime', true, 'Полето е задолжително.'); ok=false; } else clearErr('prezime');

  if(email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){
    setErr('email', true, 'Внесете валидна email адреса.'); ok=false;
  } else clearErr('email');

  if(!datum){
    setErr('datum', true, 'Одберете датум.'); ok=false;
  } else {
    const sel = new Date(datum); const now = new Date();
    now.setHours(0,0,0,0); sel.setHours(0,0,0,0);
    const diff = (sel-now)/(1000*60*60*24);
    if(diff < 2){ setErr('datum', true, 'Датумот мора да биде мин. 2 дена однапред.'); ok=false; }
    else clearErr('datum');
  }

  if(!cas){ setErr('cas', true, 'Одберете час.'); ok=false; } else clearErr('cas');
  if(!zat1){ setErr('zat1', true, 'Внесете го бројот на затвореникот.'); ok=false; } else clearErr('zat1');
  if(!zat2 || zat2!==zat1){ setErr('zat2', true, 'Броевите не се совпаѓаат.'); ok=false; } else clearErr('zat2');

  const notifyEl = document.getElementById('err-notify');
  if(!notify){ notifyEl.style.display='block'; ok=false; } else { notifyEl.style.display='none'; }

  if(notify && notify.value==='sms' && !mobilen){
    alert('За SMS потврда треба да внесете мобилен број.'); ok=false;
  }
  if(notify && notify.value==='email' && !email){
    alert('За email потврда треба да внесете email адреса.'); ok=false;
  }

  if(!ok) return;

  bookingCode = genCode();
  bookingData = { ime, prezime, email, mobilen, datum, cas, visitCount, zat1, notify: notify.value };

  document.getElementById('mainForm').style.display = 'none';
  document.getElementById('successScreen').style.display = 'block';

  const lbl  = document.getElementById('codeLabel');
  const note = document.getElementById('codeNote');
  if(notify.value==='sms'){
    lbl.textContent  = 'Кодот ќе ви биде испратен преку SMS';
    note.textContent = `На број: ${mobilen} — по одобрување од администраторот.`;
  } else if(notify.value==='email'){
    lbl.textContent  = 'Кодот ќе ви биде испратен на Email';
    note.textContent = `На: ${email} — по одобрување од администраторот.`;
  } else {
    lbl.textContent  = 'Вашиот код за потврда (зачувајте го!)';
    note.textContent = 'Кодот е потребен за откажување на посетата.';
  }
  document.getElementById('displayCode').textContent = bookingCode;

  const days = ['Недела','Понеделник','Вторник','Среда','Четврток','Петок','Сабота'];
  const dayName = days[new Date(datum).getDay()];
  document.getElementById('summaryBox').innerHTML = `
    <div class="flex justify-between"><span class="text-gray-500">Посетител:</span><strong>${ime} ${prezime}</strong></div>
    <div class="flex justify-between"><span class="text-gray-500">Датум:</span><strong>${dayName}, ${datum}</strong></div>
    <div class="flex justify-between"><span class="text-gray-500">Час:</span><strong>${cas}h</strong></div>
    <div class="flex justify-between"><span class="text-gray-500">Број на лица:</span><strong>${visitCount}</strong></div>
    <div class="flex justify-between"><span class="text-gray-500">Затвореник бр.:</span><strong>${zat1}</strong></div>
  `;
}

function openCancelOverlay(){
  const d    = new Date(bookingData.datum);
  const now  = new Date();
  const diff = (d - now) / (1000*60*60);
  if(diff < 48){
    alert('Откажувањето не е возможно — помалку од 48 часа до посетата.');
    return;
  }
  document.getElementById('cancelOverlay').classList.add('show');
}

function closeCancelOverlay(){
  document.getElementById('cancelOverlay').classList.remove('show');
  document.getElementById('cancelName').value = '';
  document.getElementById('cancelCode').value = '';
  document.getElementById('err-cancelName').classList.remove('show');
  document.getElementById('err-cancelCode').classList.remove('show');
}

function confirmCancel(){
  const name = document.getElementById('cancelName').value.trim();
  const code = document.getElementById('cancelCode').value.trim();
  let ok = true;

  const fullName = `${bookingData.ime} ${bookingData.prezime}`;
  if(name.toLowerCase() !== fullName.toLowerCase()){
    document.getElementById('err-cancelName').classList.add('show');
    document.getElementById('cancelName').classList.add('error');
    ok=false;
  } else {
    document.getElementById('err-cancelName').classList.remove('show');
    document.getElementById('cancelName').classList.remove('error');
  }

  if(code !== bookingCode){
    document.getElementById('err-cancelCode').classList.add('show');
    document.getElementById('cancelCode').classList.add('error');
    ok=false;
  } else {
    document.getElementById('err-cancelCode').classList.remove('show');
    document.getElementById('cancelCode').classList.remove('error');
  }

  if(!ok) return;

  closeCancelOverlay();
  document.getElementById('successScreen').style.display = 'none';
  document.getElementById('cancelledScreen').style.display = 'block';
}
</script>

@endsection