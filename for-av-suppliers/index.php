<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/content.php';
$content = page_content('for-av-suppliers');
$pageTitle = $content->meta('title');
$pageDescription = $content->meta('description');
$activeNav = $content->meta('active-nav');
$heroPoints = $content->items('Hero points');
$features = $content->items('Features');
$benefits = $content->items('Benefits');
require dirname(__DIR__) . '/includes/header.php';
?>
  <main id="top">
    <section class="page-hero page-hero--suppliers"><div class="container"><p class="eyebrow"><?= escape($content->text('Hero eyebrow')) ?></p><h1><?= escape($content->text('Hero title')) ?></h1><div class="lead"><?= $content->html('Hero copy') ?></div><a class="button button--primary button--large" href="#signup">Browse RFP Opportunities <span>→</span></a><ul class="hero-points"><?php foreach ($heroPoints as $point): ?><li>◎ <?= escape($point['title']) ?></li><?php endforeach; ?></ul></div></section>

    <section class="section"><div class="container"><header class="section-heading"><p class="eyebrow">For AV Suppliers</p><h2>What can I do here?</h2><p>Get access to AV RFP opportunities, event details, and a streamlined way to submit competitive proposals.</p></header><div class="feature-grid">
      <?php foreach ($features as $index => $feature): ?><article><div class="icon"><?= ['⌕', '▤', '◇', '➤'][$index] ?></div><h3><?= escape($feature['title']) ?></h3><?= $feature['html'] ?></article><?php endforeach; ?>
    </div></div></section>

    <section class="supplier-benefits section"><div class="container"><header class="section-heading"><p class="eyebrow">Why AV Suppliers Choose AVRFP</p><h2>More opportunities. Less hassle.</h2></header><div class="benefit-grid"><?php foreach ($benefits as $index => $benefit): ?><article><span><?= ['♜', '◷', '⚙', '♙'][$index] ?></span><div><h3><?= escape($benefit['title']) ?></h3><?= $benefit['html'] ?></div></article><?php endforeach; ?></div></div></section>

    <section class="event-cta"><div aria-hidden="true"></div><div class="container"><figure><blockquote><?= escape($content->text('Testimonial')) ?></blockquote><figcaption>AV Supplier</figcaption></figure><div><p>Ready to find<br>your next opportunity?</p><a class="button button--light" href="#signup">Create Your Account <span>→</span></a></div></div></section>
  </main>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
