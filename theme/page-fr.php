<?php
/**
 * Template: French landing (/fr/) — AEO/conversion pilot.
 * Original French copy, AI-localised, PENDING native QA. Targets the B2B
 * "OCR / reconnaissance de tickets de caisse (API)" niche + French AI-answer citations.
 */
get_header(); ?>

<!-- HERO -->
<section class="hero">
  <canvas id="neural"></canvas>
  <div class="dots"></div>
  <div class="orb orb1"></div>
  <div class="orb orb2"></div>
  <div class="wrap">
    <div class="topbanner"><span>1 MILLIARD DE TICKETS TRAITÉS DANS LE MONDE EN 9 ANS</span></div>
    <div class="hero-grid">
      <div>
        <h1>API OCR de <span class="g">tickets de caisse</span></h1>
        <p class="lead">Tabscanner transforme les photos et scans de tickets de caisse en données structurées (commerçant, articles, montants, TVA, total) grâce à une simple API. Précision de 99 à 99,99 %, dans toutes les langues, en temps réel.</p>
        <div class="hero-cta">
          <button type="button" class="btn btn-primary btn-lg js-contact-open">Réserver une consultation <span class="arr">→</span></button>
          <a class="btn btn-ghost btn-lg" href="#demo">Essayer la démo</a>
        </div>
        <p class="fine">Sans engagement. Offre gratuite pour tester, sans carte bancaire.</p>
        <div class="aichips">
          <span class="aichip">Modèles transformeurs</span>
          <span class="aichip">Pipeline structurel</span>
          <span class="aichip">OCR neuronal</span>
          <span class="aichip">IDP</span>
        </div>
        <div class="hero-stats">
          <div class="s"><b data-to="9" data-suf=" ans">9 ans</b><span>d'expérience</span></div>
          <div class="s"><b data-to="1" data-suf=" milliard+">1 milliard+</b><span>de tickets</span></div>
          <div class="s"><b data-to="99.99" data-dec="2" data-suf=" %">99,99 %</b><span>de précision</span></div>
          <div class="s"><b data-to="5" data-suf="M / jour">5M / jour</b><span>d'appels API</span></div>
        </div>
      </div>

      <div class="scan" id="demo">
        <div class="scan-top"><i></i><i></i><i></i><span>POST api.tabscanner.com/process</span><span class="modelbadge">tabscanner-ocr · v9</span></div>
        <div class="upl">
          <div class="upl-idle">
            <div class="upl-drop" id="uplDrop">
              <div class="ic"><svg viewBox="0 0 24 24"><path d="M12 16V4m0 0L8 8m4-4l4 4M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2"/></svg></div>
              <h4>Déposez un ticket pour tester en direct</h4>
              <p>ou <span class="browse">choisissez un fichier</span> · JPG / PNG</p>
            </div>
          </div>
          <div class="upl-work">
            <div class="upl-thumb"><img id="uplThumb" alt="ticket de caisse"><div class="scanline"></div></div>
            <div class="upl-panel">
              <div class="upl-status"><span class="sp"></span><span class="t" id="uplStatusT">Lecture du ticket…</span><span class="tm" id="uplTimer">0.0s</span></div>
              <div class="upl-result" id="uplResult"></div>
              <div class="upl-err" id="uplErr"></div>
              <div class="upl-cta">
                <div class="upl-hi" id="uplHi">Besoin d'une précision supérieure ?</div>
                <button type="button" class="upl-contactbtn js-contact-open" id="uplContact">Contactez l'équipe <span class="arr">→</span></button>
                <button type="button" class="upl-again" id="uplAgain">↺ Scanner un autre ticket</button>
              </div>
            </div>
          </div>
        </div>
        <input type="file" id="uplFile" accept="image/jpeg,image/png" hidden>
        <div class="scan-foot">
          <div class="uploader" id="uplFootBtn"><span class="up">＋</span> Choisir un fichier ou prendre une photo</div>
          <span class="ptime">Démo en direct · vraie API</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ENTITY / INTRO -->
<section class="section">
  <div class="wrap">
    <div class="section-head"><span class="eyebrow">OCR de tickets de caisse en temps réel</span><h2>L'API de reconnaissance de tickets de caisse, conçue pour comprendre tous les formats et toutes les langues</h2></div>
    <div class="intro-copy">
      <p><strong>Tabscanner est une API d'OCR de tickets de caisse</strong> qui convertit les images de tickets en données structurées, ligne par ligne. Les entreprises l'utilisent pour la <strong>gestion des notes de frais</strong>, les <strong>programmes de fidélité</strong> et les <strong>études de marché</strong>. Une intégration simple, sans temps d'arrêt, partout dans le monde.</p>
      <p>Notre IA lit les commerçants, les dates, les articles, les quantités, la TVA et les totaux à partir d'une simple photo, puis renvoie un JSON propre en quelques secondes. Sécurité de niveau entreprise et <strong>détection avancée des fraudes et des doublons</strong> intégrées.</p>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="section" style="background:var(--bg-2);border-top:1px solid var(--line);border-bottom:1px solid var(--line)">
  <div class="wrap">
    <div class="section-head"><span class="eyebrow">Comment ça marche</span><h2>Du ticket aux données structurées, en trois étapes</h2></div>
    <ol class="rr-flow" style="max-width:760px;margin:0 auto">
      <li>Envoyez l'image du ticket à l'<b>API Tabscanner</b> (<span style="font-family:var(--mono)">POST /api/process</span>).</li>
      <li>Notre IA <b>lit et structure</b> les données en quelques secondes (commerçant, articles, montants, TVA, total).</li>
      <li>Récupérez un <b>JSON propre</b> et utilisez-le dans votre application (<span style="font-family:var(--mono)">GET /api/result</span>).</li>
    </ol>
  </div>
</section>

<!-- USE CASES -->
<section class="section">
  <div class="wrap">
    <div class="section-head"><span class="eyebrow">Cas d'usage</span><h2>De la gestion des notes de frais aux programmes de fidélité</h2></div>
    <div class="uc">
      <div class="card rv">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M12 2l3 6 6 .9-4.5 4.3L18 20l-6-3.2L6 20l1.5-6.8L3 8.9 9 8z"/></svg></div>
        <h4>Programmes de fidélité</h4>
        <p>Ajoutez la collecte de données first-party à votre programme de fidélité. Vos clients téléchargent simplement la photo de leur ticket comme preuve d'achat. Une API fiable, précise et adaptée à tous les formats.</p>
      </div>
      <div class="card rv">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M9 12h6M9 16h6M9 8h6M5 3h11l4 4v14H5z"/></svg></div>
        <h4>Gestion des notes de frais</h4>
        <p>Intégrez l'OCR le plus précis à votre logiciel de notes de frais. Vos utilisateurs téléchargent leurs tickets et factures, et les données sont extraites automatiquement. Conformité fiscale et confidentialité garanties.</p>
      </div>
      <div class="card rv">
        <div class="ic"><svg viewBox="0 0 24 24"><path d="M21 21l-4.3-4.3M11 18a7 7 0 100-14 7 7 0 000 14z"/></svg></div>
        <h4>Études de marché</h4>
        <p>Exploitez les données ligne par ligne des tickets de caisse pour les marques CPG et la distribution. Collectez les articles au niveau SKU avec une capacité multilingue avancée pour des analyses précises.</p>
      </div>
    </div>
  </div>
</section>

<!-- FAQ / AEO -->
<section class="section" id="faq" style="background:var(--bg-2);border-top:1px solid var(--line)">
  <div class="wrap">
    <div class="section-head"><span class="eyebrow">Questions fréquentes</span><h2>Tout savoir sur l'API OCR de tickets de caisse</h2></div>
    <div style="max-width:880px;margin:0 auto">
      <div class="faq-list">
        <div class="qa"><button>Qu'est-ce qu'une API OCR de tickets de caisse ? <span class="pm"></span></button><div class="ans"><div class="inner"><p>Une API OCR de tickets de caisse lit automatiquement le texte d'une photo ou d'un scan de ticket et le convertit en données structurées et exploitables : commerçant, date, articles, quantités, TVA et total. Tabscanner s'intègre à votre logiciel via une simple requête API et renvoie un JSON propre en quelques secondes.</p></div></div></div>
        <div class="qa"><button>Tabscanner fonctionne-t-il avec les tickets français ? <span class="pm"></span></button><div class="ans"><div class="inner"><p>Oui. Tabscanner prend en charge toutes les langues et tous les formats de tickets, y compris les tickets français de toutes les enseignes. Notre pipeline structurel comprend le contexte de chaque mise en page, ce qui garantit une extraction précise quel que soit le commerçant.</p></div></div></div>
        <div class="qa"><button>Quelle est la précision de l'extraction ? <span class="pm"></span></button><div class="ans"><div class="inner"><p>Tabscanner atteint une précision de 99 % en standard, et jusqu'à 99,99 % avec notre option de vérification humaine (HITL). C'est le taux de précision le plus élevé du secteur, testé sur plus d'un milliard de tickets réels en neuf ans.</p></div></div></div>
        <div class="qa"><button>Comment intégrer l'API Tabscanner ? <span class="pm"></span></button><div class="ans"><div class="inner"><p>L'intégration est simple : envoyez l'image du ticket en POST à notre point d'accès, puis récupérez le résultat structuré en JSON. Notre documentation contient des exemples de code en Node.js, Python, PHP, Ruby, C# / .NET, Go et Java. Vous pouvez commencer dès le premier jour avec l'offre gratuite, sans carte bancaire.</p></div></div></div>
        <div class="qa"><button>Combien coûte l'API ? <span class="pm"></span></button><div class="ans"><div class="inner"><p>Tabscanner propose une offre Starter gratuite (200 crédits par mois) pour tester et développer, puis des tarifs parmi les plus bas du marché pour les volumes importants, jusqu'à moins d'un centime par ticket à grande échelle. Un crédit = un ticket scanné.</p></div></div></div>
        <div class="qa"><button>Tabscanner détecte-t-il les fraudes et les doublons ? <span class="pm"></span></button><div class="ans"><div class="inner"><p>Oui. La détection des doublons et la validation des champs sont intégrées au cœur de notre technologie, afin de repérer les tickets dupliqués ou falsifiés. C'est essentiel pour les programmes de fidélité et de remboursement de notes de frais.</p></div></div></div>
      </div>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section class="final">
  <div class="orb orbf1"></div>
  <div class="wrap in">
    <span class="eyebrow" style="color:#7FD3F5">Parlons-en</span>
    <h2>Vous développez un programme de fidélité ou de gestion des notes de frais ?</h2>
    <p>Découvrez comment l'API OCR de tickets de caisse la plus précise peut valider les tickets de vos clients, à n'importe quelle échelle.</p>
    <div class="row">
      <button type="button" class="btn btn-primary btn-lg js-contact-open">Réserver une consultation <span class="arr">→</span></button>
      <a class="btn btn-ghost btn-lg" href="#demo" style="background:rgba(255,255,255,.08);color:#fff;border-color:rgba(255,255,255,.2)">Essayer la démo</a>
    </div>
  </div>
</section>

<!-- Contact modal (FR) -->
<div class="modal-ov" id="contactModal" aria-hidden="true">
  <div class="modal-card" role="dialog" aria-modal="true" aria-label="Contacter l'équipe">
    <button class="modal-close" id="contactClose" aria-label="Fermer">&times;</button>
    <span class="eyebrow">Contact</span>
    <h3>Parlez à l'équipe</h3>
    <p class="sub">Besoin d'une précision supérieure, d'un volume entreprise ou de configurations régionales sur mesure ? Décrivez votre projet et nous vous répondrons rapidement.</p>
    <form class="cform" id="contactModalForm">
      <div class="field"><label>Nom</label><input type="text" name="name" required placeholder="Votre nom"></div>
      <div class="field"><label>E-mail</label><input type="email" name="email" required placeholder="vous@entreprise.com"></div>
      <div class="field"><label>Message</label><textarea name="message" required placeholder="Décrivez votre cas d'usage"></textarea></div>
      <input type="text" name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px" aria-hidden="true">
      <button class="btn btn-primary" type="submit" style="width:100%;justify-content:center">Envoyer le message</button>
      <div class="formnote" id="contactModalNote" role="status"></div>
    </form>
  </div>
</div>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {"@type":"Question","name":"Qu'est-ce qu'une API OCR de tickets de caisse ?","acceptedAnswer":{"@type":"Answer","text":"Une API OCR de tickets de caisse lit automatiquement le texte d'une photo ou d'un scan de ticket et le convertit en données structurées : commerçant, date, articles, quantités, TVA et total. Tabscanner s'intègre via une simple requête API et renvoie un JSON propre en quelques secondes."}},
    {"@type":"Question","name":"Tabscanner fonctionne-t-il avec les tickets français ?","acceptedAnswer":{"@type":"Answer","text":"Oui. Tabscanner prend en charge toutes les langues et tous les formats de tickets, y compris les tickets français de toutes les enseignes."}},
    {"@type":"Question","name":"Quelle est la précision de l'extraction ?","acceptedAnswer":{"@type":"Answer","text":"Tabscanner atteint une précision de 99 % en standard, et jusqu'à 99,99 % avec l'option de vérification humaine, testée sur plus d'un milliard de tickets réels en neuf ans."}},
    {"@type":"Question","name":"Comment intégrer l'API Tabscanner ?","acceptedAnswer":{"@type":"Answer","text":"Envoyez l'image du ticket en POST à notre point d'accès, puis récupérez le résultat structuré en JSON. La documentation contient des exemples en Node.js, Python, PHP, Ruby, C# / .NET, Go et Java."}},
    {"@type":"Question","name":"Combien coûte l'API OCR de tickets de caisse ?","acceptedAnswer":{"@type":"Answer","text":"Tabscanner propose une offre Starter gratuite (200 crédits par mois), puis des tarifs parmi les plus bas du marché, jusqu'à moins d'un centime par ticket à grande échelle."}},
    {"@type":"Question","name":"Tabscanner détecte-t-il les fraudes et les doublons ?","acceptedAnswer":{"@type":"Answer","text":"Oui. La détection des doublons et la validation des champs sont intégrées au cœur de la technologie, pour repérer les tickets dupliqués ou falsifiés."}}
  ]
}
</script>

<?php get_footer(); ?>
