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
        <div
          class="text-xs font-semibold uppercase tracking-widest"
          style="color:#2563eb"
          data-mk="Управа за извршување санкции"
          data-sq="Drejtoria e Ekzekutimit të Sanksioneve"
          data-en="Sanctions Execution Directorate">
          Управа за извршување санкции
        </div>
        <h1
          class="text-xl font-bold leading-tight"
          style="color:#1a3a6b;font-family:'Source Serif 4',serif"
          data-mk="Закажување посета во затвор"
          data-sq="Rezervim vizite në burg"
          data-en="Schedule a Prison Visit">
          Закажување посета во затвор
        </h1>
      </div>
    </div>

    <!-- Progress dots -->
    <div class="flex items-center gap-2 mb-6">
      <span id="dot1" class="step-dot active"></span>
      <span id="dot2" class="step-dot"></span>
      <span id="dot3" class="step-dot"></span>
      <span
        class="text-xs text-gray-400 ml-1"
        id="stepLabel"
        data-mk="Чекор 1 од 3"
        data-sq="Hapi 1 nga 3"
        data-en="Step 1 of 3">
        Чекор 1 од 3
      </span>
    </div>

    <!-- STEP 1 — Посетител -->
    <div id="step1" class="card p-6 mb-4">
      <div class="section-title">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
        <span
          data-mk="Податоци за посетителот"
          data-sq="Të dhënat e vizitorit"
          data-en="Visitor Details">
          Податоци за посетителот
        </span>
      </div>
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
          <label class="form-label">
            <span
              data-mk="Име"
              data-sq="Emri"
              data-en="First Name">Име</span>
            <span class="req">*</span>
          </label>
          <input
            id="ime"
            class="form-input"
            placeholder="Вашето име"
            data-placeholder-mk="Вашето име"
            data-placeholder-sq="Emri juaj"
            data-placeholder-en="Your first name"
            maxlength="60"/>
          <div
            class="error-msg"
            id="err-ime"
            data-mk="Полето е задолжително."
            data-sq="Fusha është e detyrueshme."
            data-en="This field is required.">
            Полето е задолжително.
          </div>
        </div>
        <div>
          <label class="form-label">
            <span
              data-mk="Презиме"
              data-sq="Mbiemri"
              data-en="Last Name">Презиме</span>
            <span class="req">*</span>
          </label>
          <input
            id="prezime"
            class="form-input"
            placeholder="Вашето презиме"
            data-placeholder-mk="Вашето презиме"
            data-placeholder-sq="Mbiemri juaj"
            data-placeholder-en="Your last name"
            maxlength="60"/>
          <div
            class="error-msg"
            id="err-prezime"
            data-mk="Полето е задолжително."
            data-sq="Fusha është e detyrueshme."
            data-en="This field is required.">
            Полето е задолжително.
          </div>
        </div>
        <div>
          <label class="form-label">
            <span
              data-mk="Email адреса"
              data-sq="Adresa email"
              data-en="Email Address">Email адреса</span>
          </label>
          <input
            id="email"
            type="email"
            class="form-input"
            placeholder="пример@mail.com (незадолжително)"
            data-placeholder-mk="пример@mail.com (незадолжително)"
            data-placeholder-sq="shembull@mail.com (fakultative)"
            data-placeholder-en="example@mail.com (optional)"/>
          <div
            class="error-msg"
            id="err-email"
            data-mk="Внесете валидна email адреса."
            data-sq="Vendosni një adresë email të vlefshme."
            data-en="Please enter a valid email address.">
            Внесете валидна email адреса.
          </div>
        </div>
        <div>
          <label class="form-label">
            <span
              data-mk="Мобилен број"
              data-sq="Numri i celularit"
              data-en="Mobile Number">Мобилен број</span>
          </label>
          <input
            id="mobilen"
            class="form-input"
            placeholder="+389 7X XXX XXX (незадолжително)"
            data-placeholder-mk="+389 7X XXX XXX (незадолжително)"
            data-placeholder-sq="+389 7X XXX XXX (fakultative)"
            data-placeholder-en="+389 7X XXX XXX (optional)"
            maxlength="20"/>
          <div
            class="error-msg"
            id="err-mobilen"
            data-mk="Внесете валиден мобилен број."
            data-sq="Vendosni një numër celular të vlefshëm."
            data-en="Please enter a valid mobile number.">
            Внесете валиден мобилен број.
          </div>
        </div>
      </div>
      <p
        class="text-xs text-gray-400 mt-3"
        data-mk="* Не е задолжително да внесете и email и број — доволен е еден или ниту еден."
        data-sq="* Nuk është e detyrueshme të vendosni edhe email edhe numër — mjafton njëri ose asnjëri."
        data-en="* It is not required to enter both email and number — one or neither is sufficient.">
        * Не е задолжително да внесете и email и број — доволен е еден или ниту еден.
      </p>
    </div>

    <!-- STEP 2 — Термин -->
    <div id="step2" class="card p-6 mb-4">
      <div class="section-title">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
        <span
          data-mk="Термин и број на посетители"
          data-sq="Orari dhe numri i vizitorëve"
          data-en="Appointment & Number of Visitors">
          Термин и број на посетители
        </span>
      </div>
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
          <label class="form-label">
            <span
              data-mk="Датум на посета"
              data-sq="Data e vizitës"
              data-en="Visit Date">Датум на посета</span>
            <span class="req">*</span>
          </label>
          <input id="datum" type="date" class="form-input"/>
          <div
            class="error-msg"
            id="err-datum"
            data-mk="Одберете датум (мин. 2 дена однапред)."
            data-sq="Zgjidhni një datë (min. 2 ditë përpara)."
            data-en="Select a date (min. 2 days in advance).">
            Одберете датум (мин. 2 дена однапред).
          </div>
        </div>
        <div>
          <label class="form-label">
            <span
              data-mk="Час на посета"
              data-sq="Ora e vizitës"
              data-en="Visit Time">Час на посета</span>
            <span class="req">*</span>
          </label>
          <div class="time-grid" id="timeGrid"></div>
          <input type="hidden" id="cas"/>
          <div
            class="error-msg"
            id="err-cas"
            data-mk="Одберете час."
            data-sq="Zgjidhni një orë."
            data-en="Please select a time.">
            Одберете час.
          </div>
        </div>
      </div>
      <div class="mt-4">
        <label class="form-label">
          <span
            data-mk="Број на посетители"
            data-sq="Numri i vizitorëve"
            data-en="Number of Visitors">Број на посетители</span>
          <span class="req">*</span>
        </label>
        <div class="count-ctrl">
          <button type="button" class="count-btn" onclick="changeCount(-1)">−</button>
          <div class="count-val" id="countVal">1</div>
          <button type="button" class="count-btn" onclick="changeCount(1)">+</button>
          <span
            class="text-sm text-gray-400 ml-1"
            data-mk="лица"
            data-sq="persona"
            data-en="persons">лица</span>
        </div>
      </div>
    </div>

    <!-- STEP 3 — Затвореник -->
    <div id="step3" class="card p-6 mb-4">
      <div class="section-title">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/><circle cx="12" cy="16" r="1" fill="currentColor"/></svg>
        <span
          data-mk="Податоци за затвореникот"
          data-sq="Të dhënat e të burgosurit"
          data-en="Prisoner Details">
          Податоци за затвореникот
        </span>
      </div>
      <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <div>
          <label class="form-label">
            <span
              data-mk="Регистарски број на затвореник"
              data-sq="Numri regjistrar i të burgosurit"
              data-en="Prisoner Registration Number">Регистарски број на затвореник</span>
            <span class="req">*</span>
          </label>
          <input
            id="zatvorenik1"
            class="form-input"
            placeholder="пр. 2024-00123"
            data-placeholder-mk="пр. 2024-00123"
            data-placeholder-sq="p.sh. 2024-00123"
            data-placeholder-en="e.g. 2024-00123"
            maxlength="30"/>
          <div
            class="error-msg"
            id="err-zat1"
            data-mk="Внесете го бројот на затвореникот."
            data-sq="Vendosni numrin e të burgosurit."
            data-en="Please enter the prisoner number.">
            Внесете го бројот на затвореникот.
          </div>
        </div>
        <div>
          <label class="form-label">
            <span
              data-mk="Потврди го бројот повторно"
              data-sq="Konfirmo numrin përsëri"
              data-en="Confirm the Number Again">Потврди го бројот повторно</span>
            <span class="req">*</span>
          </label>
          <input
            id="zatvorenik2"
            class="form-input"
            placeholder="пр. 2024-00123"
            data-placeholder-mk="пр. 2024-00123"
            data-placeholder-sq="p.sh. 2024-00123"
            data-placeholder-en="e.g. 2024-00123"
            maxlength="30"/>
          <div
            class="error-msg"
            id="err-zat2"
            data-mk="Броевите не се совпаѓаат."
            data-sq="Numrat nuk përputhen."
            data-en="The numbers do not match.">
            Броевите не се совпаѓаат.
          </div>
        </div>
      </div>
      <div class="mt-5">
        <label class="form-label">
          <span
            data-mk="Како сакате да добиете потврда?"
            data-sq="Si dëshironi të merrni konfirmimin?"
            data-en="How would you like to receive confirmation?">Како сакате да добиете потврда?</span>
          <span class="req">*</span>
        </label>
        <div class="radio-group mt-1" id="notifyGroup">
          <label class="radio-option" id="ro-sms">
            <input type="radio" name="notify" value="sms" onchange="selectNotify(this)"/>
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><circle cx="12" cy="17" r="1" fill="currentColor"/></svg>
            <span
              data-mk="SMS на мобилен"
              data-sq="SMS në celular"
              data-en="SMS to mobile">SMS на мобилен</span>
          </label>
          <label class="radio-option" id="ro-email">
            <input type="radio" name="notify" value="email" onchange="selectNotify(this)"/>
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 7l10 7 10-7"/></svg>
            <span
              data-mk="Email"
              data-sq="Email"
              data-en="Email">Email</span>
          </label>
          <label class="radio-option" id="ro-none">
            <input type="radio" name="notify" value="none" onchange="selectNotify(this)"/>
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 8v4l3 3"/></svg>
            <span
              data-mk="Кодот на страната"
              data-sq="Kodi në faqe"
              data-en="Code on the page">Кодот на страната</span>
          </label>
        </div>
        <div
          class="error-msg"
          id="err-notify"
          style="display:none"
          data-mk="Одберете начин за потврда."
          data-sq="Zgjidhni një mënyrë konfirmimi."
          data-en="Please select a confirmation method.">
          Одберете начин за потврда.
        </div>
      </div>
    </div>

    <!-- Submit -->
    <div class="flex justify-end mt-2">
      <button type="button" class="btn-primary" onclick="submitForm()">
        <span class="flex items-center gap-2">
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path d="M22 2L11 13"/><path d="M22 2L15 22l-4-9-9-4 20-7z"/></svg>
          <span
            data-mk="Испрати барање до администраторот"
            data-sq="Dërgo kërkesë tek administratori"
            data-en="Send Request to Administrator">
            Испрати барање до администраторот
          </span>
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
      <h2
        class="text-2xl font-bold mb-2"
        style="color:#1a3a6b"
        data-mk="Барањето е испратено!"
        data-sq="Kërkesa u dërgua!"
        data-en="Request Submitted!">
        Барањето е испратено!
      </h2>
      <p
        class="text-gray-500 mb-5 text-sm"
        data-mk="Администраторот ќе го разгледа барањето и ќе добиете потврда."
        data-sq="Administratori do ta shqyrtojë kërkesën dhe do të merrni konfirmim."
        data-en="The administrator will review the request and you will receive confirmation.">
        Администраторот ќе го разгледа барањето и ќе добиете потврда.
      </p>

      <div class="code-box mb-4">
        <div class="text-xs font-semibold uppercase tracking-widest mb-1" style="color:#2563eb" id="codeLabel"></div>
        <div class="code-val" id="displayCode">——</div>
        <div class="text-xs text-gray-400 mt-2" id="codeNote"></div>
      </div>

      <div id="summaryBox" class="text-left bg-blue-50 rounded-xl p-4 mb-6 text-sm space-y-1"></div>

      <button type="button" class="btn-danger w-full mt-2" onclick="openCancelOverlay()">
        <span class="flex items-center justify-center gap-2">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
          <span
            data-mk="Откажи ја посетата (48ч пред одење)"
            data-sq="Anulo vizitën (48h para nisjes)"
            data-en="Cancel the Visit (48h before)">
            Откажи ја посетата (48ч пред одење)
          </span>
        </span>
      </button>
      <p
        class="text-xs text-gray-400 mt-2"
        data-mk="Откажувањето е возможно најдоцна 48 часа пред закажаниот термин."
        data-sq="Anulimi është i mundur deri në 48 orë para takimit të planifikuar."
        data-en="Cancellation is possible up to 48 hours before the scheduled appointment.">
        Откажувањето е возможно најдоцна 48 часа пред закажаниот термин.
      </p>
    </div>
  </div>

  <!-- ======= CANCEL OVERLAY ======= -->
  <div id="cancelOverlay">
    <div class="card p-7 max-w-md w-full mx-3 fade-in">
      <div class="flex items-center gap-3 mb-4">
        <div style="width:40px;height:40px;border-radius:9px;background:#fee2e2;display:flex;align-items:center;justify-content:center;flex-shrink:0">
          <svg width="22" height="22" fill="none" stroke="#dc2626" stroke-width="2.3" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
        </div>
        <h3
          class="text-lg font-bold"
          style="color:#1a3a6b;font-family:'Source Serif 4',serif"
          data-mk="Потврди откажување"
          data-sq="Konfirmo anulimin"
          data-en="Confirm Cancellation">
          Потврди откажување
        </h3>
      </div>
      <p
        class="text-sm text-gray-600 mb-4"
        data-mk="За да ја откажете посетата, внесете го вашето целосно Име и Презиме и кодот кој го добивте."
        data-sq="Për të anuluar vizitën, vendosni Emrin dhe Mbiemrin tuaj të plotë dhe kodin që keni marrë."
        data-en="To cancel the visit, enter your full First and Last Name and the code you received.">
        За да ја откажете посетата, внесете го вашето целосно <strong>Име и Презиме</strong> и <strong>кодот</strong> кој го добивте.
      </p>
      <div class="space-y-3">
        <div>
          <label class="form-label">
            <span
              data-mk="Име и Презиме"
              data-sq="Emri dhe Mbiemri"
              data-en="First and Last Name">Име и Презиме</span>
            <span class="req">*</span>
          </label>
          <input
            id="cancelName"
            class="form-input"
            placeholder="пр. Марко Иванов"
            data-placeholder-mk="пр. Марко Иванов"
            data-placeholder-sq="p.sh. Marko Ivanov"
            data-placeholder-en="e.g. Marko Ivanov"/>
          <div
            class="error-msg"
            id="err-cancelName"
            data-mk="Не се совпаѓа со резервираното ime/prezime."
            data-sq="Nuk përputhet me emrin/mbiemrin e rezervuar."
            data-en="Does not match the reserved first/last name.">
            Не се совпаѓа со резервираното ime/prezime.
          </div>
        </div>
        <div>
          <label class="form-label">
            <span
              data-mk="Код за потврда"
              data-sq="Kodi i konfirmimit"
              data-en="Confirmation Code">Код за потврда</span>
            <span class="req">*</span>
          </label>
          <input
            id="cancelCode"
            class="form-input"
            placeholder="6-цифрен код"
            data-placeholder-mk="6-цифрен код"
            data-placeholder-sq="Kod 6-shifror"
            data-placeholder-en="6-digit code"
            maxlength="6"/>
          <div
            class="error-msg"
            id="err-cancelCode"
            data-mk="Кодот не е точен."
            data-sq="Kodi nuk është i saktë."
            data-en="The code is incorrect.">
            Кодот не е точен.
          </div>
        </div>
      </div>
      <div class="flex gap-3 mt-5">
        <button type="button" class="btn-danger flex-1" onclick="confirmCancel()">
          <span
            data-mk="Да, откажи ја"
            data-sq="Po, anulo"
            data-en="Yes, cancel it">
            Да, откажи ја
          </span>
        </button>
        <button type="button" class="btn-primary flex-1" onclick="closeCancelOverlay()">
          <span
            data-mk="Назад"
            data-sq="Prapa"
            data-en="Back">
            Назад
          </span>
        </button>
      </div>
    </div>
  </div>

  <!-- ======= CANCELLED SCREEN ======= -->
  <div id="cancelledScreen" class="max-w-xl mx-auto fade-in" style="display:none">
    <div class="card p-8 text-center">
      <div style="width:72px;height:72px;border-radius:50%;background:#fee2e2;display:flex;align-items:center;justify-content:center;margin:0 auto 1.2rem">
        <svg width="38" height="38" fill="none" stroke="#dc2626" stroke-width="2.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M15 9l-6 6M9 9l6 6"/></svg>
      </div>
      <h2
        class="text-2xl font-bold mb-2"
        style="color:#1a3a6b"
        data-mk="Посетата е откажана"
        data-sq="Vizita u anulua"
        data-en="Visit Cancelled">
        Посетата е откажана
      </h2>
      <p
        class="text-gray-500 text-sm"
        data-mk="Вашата резервација е успешно откажана. Ако имате прашања, контактирајте ја управата на затворот."
        data-sq="Rezervimi juaj u anulua me sukses. Nëse keni pyetje, kontaktoni administratën e burgut."
        data-en="Your reservation has been successfully cancelled. If you have questions, please contact the prison administration.">
        Вашата резервација е успешно откажана. Ако имате прашања, контактирајте ја управата на затворот.
      </p>
    </div>
  </div>

</div><!-- end py-8 wrapper -->

<script>
let visitCount = 1;
let selectedTime = '';
let bookingCode = '';
let bookingData = {};

const TIMES = ['08:00','09:00','10:00','11:00','13:00','14:00','15:00','16:00'];

// ── Translations for JS-generated strings ──────────────────────────────────
const T = {
  mk: {
    days: ['Недела','Понеделник','Вторник','Среда','Четврток','Петок','Сабота'],
    summaryVisitor:   'Посетител:',
    summaryDate:      'Датум:',
    summaryTime:      'Час:',
    summaryPersons:   'Број на лица:',
    summaryPrisoner:  'Затвореник бр.:',
    codeLabelSms:     'Кодот ќе ви биде испратен преку SMS',
    codeLabelEmail:   'Кодот ќе ви биде испратен на Email',
    codeLabelPage:    'Вашиот код за потврда (зачувајте го!)',
    codeNoteSms:      'На број: {0} — по одобрување од администраторот.',
    codeNoteEmail:    'На: {0} — по одобрување од администраторот.',
    codeNotePage:     'Кодот е потребен за откажување на посетата.',
    waitingMessage:   'Датумот е полн, вашето барање е ставено на листа на чекање.',
    alertSms:         'За SMS потврда треба да внесете мобилен број.',
    alertEmail:       'За email потврда треба да внесете email адреса.',
    alertCancel48:    'Откажувањето не е возможно — помалку од 48 часа до посетата.',
    errRequired:      'Полето е задолжително.',
    errEmail:         'Внесете валидна email адреса.',
    errDate:          'Датумот мора да биде мин. 2 дена однапред.',
    errTime:          'Одберете час.',
    errZat1:          'Внесете го бројот на затвореникот.',
    errZat2:          'Броевите не се совпаѓаат.',
    errNotify:        'Одберете начин за потврда.',
  },
  sq: {
    days: ['E diel','E hënë','E martë','E mërkurë','E enjte','E premte','E shtunë'],
    summaryVisitor:   'Vizitori:',
    summaryDate:      'Data:',
    summaryTime:      'Ora:',
    summaryPersons:   'Numri i personave:',
    summaryPrisoner:  'Nr. i të burgosurit:',
    codeLabelSms:     'Kodi do t\'ju dërgohet me SMS',
    codeLabelEmail:   'Kodi do t\'ju dërgohet me Email',
    codeLabelPage:    'Kodi juaj i konfirmimit (ruajeni!)',
    codeNoteSms:      'Në numrin: {0} — pas miratimit nga administratori.',
    codeNoteEmail:    'Në: {0} — pas miratimit nga administratori.',
    codeNotePage:     'Kodi nevojitet për anulimin e vizitës.',
    waitingMessage:   'Data është e plotë, kërkesa juaj u vendos në listën e pritjes.',
    alertSms:         'Për konfirmim me SMS duhet të vendosni numrin e celularit.',
    alertEmail:       'Për konfirmim me email duhet të vendosni adresën email.',
    alertCancel48:    'Anulimi nuk është i mundur — më pak se 48 orë deri në vizitë.',
    errRequired:      'Fusha është e detyrueshme.',
    errEmail:         'Vendosni një adresë email të vlefshme.',
    errDate:          'Data duhet të jetë min. 2 ditë përpara.',
    errTime:          'Zgjidhni një orë.',
    errZat1:          'Vendosni numrin e të burgosurit.',
    errZat2:          'Numrat nuk përputhen.',
    errNotify:        'Zgjidhni një mënyrë konfirmimi.',
  },
  en: {
    days: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
    summaryVisitor:   'Visitor:',
    summaryDate:      'Date:',
    summaryTime:      'Time:',
    summaryPersons:   'Number of persons:',
    summaryPrisoner:  'Prisoner No.:',
    codeLabelSms:     'The code will be sent to you via SMS',
    codeLabelEmail:   'The code will be sent to you via Email',
    codeLabelPage:    'Your confirmation code (save it!)',
    codeNoteSms:      'To number: {0} — after approval by the administrator.',
    codeNoteEmail:    'To: {0} — after approval by the administrator.',
    codeNotePage:     'The code is required for cancelling the visit.',
    waitingMessage:   'The date is full, your request has been placed on the waiting list.',
    alertSms:         'For SMS confirmation you must enter a mobile number.',
    alertEmail:       'For email confirmation you must enter an email address.',
    alertCancel48:    'Cancellation is not possible — less than 48 hours until the visit.',
    errRequired:      'This field is required.',
    errEmail:         'Please enter a valid email address.',
    errDate:          'The date must be at least 2 days in advance.',
    errTime:          'Please select a time.',
    errZat1:          'Please enter the prisoner number.',
    errZat2:          'The numbers do not match.',
    errNotify:        'Please select a confirmation method.',
  }
};

const VISITS_ENDPOINT = '{{ route('visits.store') }}';
const CSRF_TOKEN = '{{ csrf_token() }}';

// Returns current language (defaults to mk)
function getLang() {
  return localStorage.getItem('lang') || 'mk';
}

function t(key) {
  const lang = getLang();
  return (T[lang] && T[lang][key]) ? T[lang][key] : T['mk'][key];
}

// ── Placeholder switching (extend setLang to also update placeholders) ──────
const _origSetLang = window.setLang;
window.setLang = function(lang) {
  if (_origSetLang) _origSetLang(lang);
  // Update all data-placeholder-{lang} inputs
  document.querySelectorAll('[data-placeholder-' + lang + ']').forEach(function(el) {
    el.placeholder = el.getAttribute('data-placeholder-' + lang);
  });
};

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
  // fetch availability when date changes
  document.getElementById('datum').addEventListener('change', function(){
    fetchAvailability(this.value);
  });
})();

function selectTime(time, btn){
  // ignore clicks on unavailable slots
  if (!btn || btn.classList.contains('unavailable') || btn.disabled) return;
  selectedTime = time;
  document.getElementById('cas').value = time;
  document.querySelectorAll('.time-slot').forEach(b => b.classList.remove('selected'));
  btn.classList.add('selected');
}

async function fetchAvailability(date){
  if(!date) return;
  try{
    const res = await fetch('/visits/availability?date=' + encodeURIComponent(date));
    if(!res.ok) return;
    const data = await res.json();
    document.querySelectorAll('.time-slot').forEach(b => {
      const slot = b.textContent.trim().replace(/\s*✖\s*$/, '');
      const count = data[slot] ?? 0;
      const full = count >= {{ \App\Http\Controllers\Admin\Admin\VisitRequestController::MAX_DAILY_VISITS }};
      b.disabled = full;
      b.classList.toggle('unavailable', full);
      // show an X marker when full
      b.textContent = slot + (full ? ' ✖' : '');
      b.setAttribute('aria-disabled', full ? 'true' : 'false');
      if(full){
        b.style.backgroundColor = '#f87171';
        b.style.color = '#fff';
        b.style.borderColor = '#f87171';
        b.style.cursor = 'not-allowed';
      } else {
        b.style.backgroundColor = '';
        b.style.color = '';
        b.style.borderColor = '';
        b.style.cursor = '';
      }
    });
  }catch(e){
    // ignore availability errors
  }
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

async function submitForm(){
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

  if(!ime){ setErr('ime', true, t('errRequired')); ok=false; } else clearErr('ime');
  if(!prezime){ setErr('prezime', true, t('errRequired')); ok=false; } else clearErr('prezime');

  if(email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)){
    setErr('email', true, t('errEmail')); ok=false;
  } else clearErr('email');

  if(!datum){
    setErr('datum', true, t('errDate')); ok=false;
  } else {
    const sel = new Date(datum); const now = new Date();
    now.setHours(0,0,0,0); sel.setHours(0,0,0,0);
    const diff = (sel-now)/(1000*60*60*24);
    if(diff < 2){ setErr('datum', true, t('errDate')); ok=false; }
    else clearErr('datum');
  }

  if(!cas){ setErr('cas', true, t('errTime')); ok=false; } else clearErr('cas');
  if(!zat1){ setErr('zat1', true, t('errZat1')); ok=false; } else clearErr('zat1');
  if(!zat2 || zat2!==zat1){ setErr('zat2', true, t('errZat2')); ok=false; } else clearErr('zat2');

  const notifyEl = document.getElementById('err-notify');
  if(!notify){ notifyEl.textContent = t('errNotify'); notifyEl.style.display='block'; ok=false; }
  else { notifyEl.style.display='none'; }

  if(notify && notify.value==='sms' && !mobilen){
    alert(t('alertSms')); ok=false;
  }
  if(notify && notify.value==='email' && !email){
    alert(t('alertEmail')); ok=false;
  }

  if(!ok) return;

  const payload = {
    visitor_name: ime + ' ' + prezime,
    visitor_email: email || null,
    phone: mobilen || null,
    prisoner_name: zat1,
    requested_date: datum,
    requested_time: cas,
    visit_count: visitCount,
    notification_method: notify.value,
  };

  let response;
  try {
    response = await fetch(VISITS_ENDPOINT, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': CSRF_TOKEN,
      },
      body: JSON.stringify(payload),
    });
  } catch (error) {
    alert('Се случи грешка при испраќање. Ве молиме обидете се повторно.');
    return;
  }

  const data = await response.json();
  if (!response.ok) {
    if (data.errors) {
      if (data.errors.visitor_contact) { alert(data.errors.visitor_contact[0]); }
      if (data.errors.phone) { setErr('mobilen', true, data.errors.phone[0]); }
      if (data.errors.visitor_email) { setErr('email', true, data.errors.visitor_email[0]); }
      if (data.errors.requested_date) { setErr('datum', true, data.errors.requested_date[0]); }
      if (data.errors.monthly_limit) { alert(data.errors.monthly_limit[0]); }
    } else {
      alert('Се случи грешка при испраќање. Ве молиме обидете се повторно.');
    }
    return;
  }

  bookingCode = data.code;
  bookingData = { ...payload, cas, notify: notify.value };

  document.getElementById('mainForm').style.display = 'none';
  document.getElementById('successScreen').style.display = 'block';

  const lbl  = document.getElementById('codeLabel');
  const note = document.getElementById('codeNote');
  if(notify.value==='sms'){
    lbl.textContent  = t('codeLabelSms');
    note.textContent = (data.status === 'waiting' ? t('waitingMessage') + ' ' : '') + t('codeNoteSms').replace('{0}', mobilen);
  } else if(notify.value==='email'){
    lbl.textContent  = t('codeLabelEmail');
    note.textContent = (data.status === 'waiting' ? t('waitingMessage') + ' ' : '') + t('codeNoteEmail').replace('{0}', email);
  } else {
    lbl.textContent  = t('codeLabelPage');
    note.textContent = (data.status === 'waiting' ? t('waitingMessage') + ' ' : '') + t('codeNotePage');
  }
  document.getElementById('displayCode').textContent = bookingCode;

  const dayName = t('days')[new Date(datum).getDay()];
  document.getElementById('summaryBox').innerHTML = `
    <div class="flex justify-between"><span class="text-gray-500">${t('summaryVisitor')}</span><strong>${ime} ${prezime}</strong></div>
    <div class="flex justify-between"><span class="text-gray-500">${t('summaryDate')}</span><strong>${dayName}, ${datum}</strong></div>
    <div class="flex justify-between"><span class="text-gray-500">${t('summaryTime')}</span><strong>${cas}h</strong></div>
    <div class="flex justify-between"><span class="text-gray-500">${t('summaryPersons')}</span><strong>${visitCount}</strong></div>
    <div class="flex justify-between"><span class="text-gray-500">${t('summaryPrisoner')}</span><strong>${zat1}</strong></div>
  `;
}

function openCancelOverlay(){
  const d    = new Date(bookingData.requested_date);
  const now  = new Date();
  const diff = (d - now) / (1000*60*60);
  if(diff < 48){
    alert(t('alertCancel48'));
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
  const fullName = (bookingData.visitor_name || ((bookingData.ime || '') + ' ' + (bookingData.prezime || ''))).trim();
  if(!fullName || name.toLowerCase() !== fullName.toLowerCase()){
    document.getElementById('err-cancelName').classList.add('show');
    document.getElementById('cancelName').classList.add('error');
    ok=false;
  } else {
    document.getElementById('err-cancelName').classList.remove('show');
    document.getElementById('cancelName').classList.remove('error');
  }

  if(code !== bookingCode){
    document.getElementById('err-cancelCode').textContent = t('errZat2');
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