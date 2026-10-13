<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/content.php';
$content = page_content('home');
$pageTitle = $content->meta('title');
$pageDescription = $content->meta('description');
$plannerBenefits = $content->items('Planner benefits');
$supplierBenefits = $content->items('Supplier benefits');
require __DIR__ . '/includes/header.php';
?>
  <main id="top" class="home-page">
    <section class="home-hero">
      <div class="container">
        <div class="home-hero__copy">
          <h1><?= escape($content->text('Hero title')) ?><br><span><?= escape($content->text('Hero highlight')) ?></span></h1>
          <hr>
          <?= $content->html('Hero copy') ?>
        </div>
        <p class="visually-hidden"><?= escape($content->text('Screen line one')) ?> <?= escape($content->text('Screen line two')) ?> <?= escape($content->text('Screen line three')) ?></p>
      </div>
    </section>

    <section class="home-roles" aria-labelledby="roles-title">
      <h2 id="roles-title" class="visually-hidden">Choose how you use AVRFP</h2>
      <div class="container">
        <article class="role-card">
          <div class="role-heading role-heading--planner"><p class="eyebrow">For Event Planners</p><h2>What can I do here?</h2><p>Post your AV RFP, manage communication, and receive proposals from AV suppliers all in one place.</p></div>
          <div class="role-content"><ul><?php foreach ($plannerBenefits as $benefit): ?><li><?= escape($benefit['title']) ?></li><?php endforeach; ?></ul><p class="commission">AVRFP receives no commission on business awarded.</p><a class="button button--primary" href="/for-event-planners/">Post an RFP for Free <span aria-hidden="true">→</span></a><small>Create your account and get started.</small></div>
        </article>
        <article class="role-card">
          <div class="role-heading role-heading--supplier"><p class="eyebrow">For AV Suppliers</p><h2>What can I do here?</h2><p>Find AV RFP opportunities, access event details, and submit proposals to event planners.</p></div>
          <div class="role-content"><ul><?php foreach ($supplierBenefits as $benefit): ?><li><?= escape($benefit['title']) ?></li><?php endforeach; ?></ul><p class="commission">AVRFP receives no commission on business awarded.</p><a class="button button--secondary" href="/for-av-suppliers/">Browse RFP Opportunities <span aria-hidden="true">→</span></a><small>Create your account and get started.</small></div>
        </article>
      </div>
    </section>

    <section class="home-associations" aria-label="Industry associations">
      <div class="container"><h2>Member of these industry associations</h2><div class="association-logos"><img src="/assets/images/home/MPI-logo.png" alt="MPI"><img src="/assets/images/home/pcma-logo.png" alt="PCMA"><img src="/assets/images/home/IAEE-logo.png" alt="IAEE"><img src="/assets/images/home/AVIXA-LOGO.png" alt="AVIXA"></div></div>
    </section>

    <section class="home-cta" id="signup">
      <div class="container"><img src="/assets/images/home/last-icon-box.png" alt="" width="110" height="110"><div><p class="eyebrow">Get Started Today</p><h2><?= escape($content->text('CTA title')) ?></h2><?= $content->html('CTA copy') ?></div><a class="button button--primary" href="#signup">Create Your Account <span aria-hidden="true">→</span></a></div>
    </section>
  </main>
<?php require __DIR__ . '/includes/footer.php'; ?>
