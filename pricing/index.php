<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/content.php';
$content = page_content('pricing');
$pageTitle = $content->meta('title');
$pageDescription = $content->meta('description');
$activeNav = $content->meta('active-nav');
$heroPoints = $content->items('Hero points');
$plans = $content->items('Plans');
$benefits = $content->items('Benefits');
require dirname(__DIR__) . '/includes/header.php';
?>
  <main id="top">
    <section class="page-hero page-hero--pricing"><div class="container"><p class="eyebrow"><?= escape($content->text('Hero eyebrow')) ?></p><h1><?= escape($content->text('Hero title')) ?></h1><div class="lead"><?= $content->html('Hero copy') ?></div><hr><ul class="hero-points"><?php foreach ($heroPoints as $point): ?><li>✓ <?= escape($point['title']) ?></li><?php endforeach; ?></ul></div></section>

    <section class="pricing section"><div class="container">
      <header class="centered-heading"><p class="eyebrow"><?= escape($content->text('Pricing eyebrow')) ?></p><h2><?= escape($content->text('Pricing title')) ?></h2><?= $content->html('Pricing copy') ?></header>
      <div class="pricing-grid">
        <?php foreach ($plans as $index => $plan): ?><article><p class="eyebrow"><?= $index === 0 ? 'For Event Planners' : 'For AV Suppliers' ?></p><h2><?= escape($plan['title']) ?></h2><?= $plan['html'] ?><div class="price"><strong><?= $index === 0 ? '$0' : '$50' ?></strong><span><?= $index === 0 ? 'Always free.' : 'per RFP' ?><br>No commission on<br>business awarded.</span></div><a class="button button--primary" href="<?= $index === 0 ? '#signup' : '/for-av-suppliers/' ?>"><?= $index === 0 ? 'Create Your Account' : 'Browse RFP Opportunities' ?> <span>→</span></a></article><?php endforeach; ?>
      </div>
    </div></section>

    <section class="values section"><div class="container"><header class="centered-heading"><p class="eyebrow">Why Our Pricing Works</p><h2>Maximum value. Minimum complexity.</h2></header><div class="benefit-grid">
      <?php foreach ($benefits as $index => $benefit): ?><article><span class="icon"><?= ['◎', '♢', '$', '↗'][$index] ?></span><h3><?= escape($benefit['title']) ?></h3><?= $benefit['html'] ?></article><?php endforeach; ?>
    </div></div></section>
    <section class="image-cta"><div class="container"><div><h2><?= escape($content->text('CTA title')) ?></h2><?= $content->html('CTA copy') ?></div><a class="button button--primary" href="#signup">Create Your Account <span>→</span></a></div></section>
  </main>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
