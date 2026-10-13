<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/content.php';
$content = page_content('about-us');
$pageTitle = $content->meta('title');
$pageDescription = $content->meta('description');
$activeNav = $content->meta('active-nav');
$story = $content->items('Story')[0];
$values = $content->items('Values');
require dirname(__DIR__) . '/includes/header.php';
?>
  <main id="top">
    <section class="page-hero page-hero--about">
      <div class="container"><p class="eyebrow"><?= escape($content->text('Hero eyebrow')) ?></p><h1><?= escape($content->text('Hero title')) ?></h1><hr><?= $content->html('Hero copy') ?></div>
    </section>

    <section class="mission section">
      <div class="container">
        <header class="centered-heading"><p class="eyebrow"><?= escape($content->text('Mission eyebrow')) ?></p><h2><?= escape($content->text('Mission title')) ?></h2><?= $content->html('Mission copy') ?></header>
        <div class="story"><div role="img" aria-label="Audience attending a professionally produced conference"></div><article><p class="eyebrow">Our Story</p><h2><?= escape($story['title']) ?></h2><?= $story['html'] ?></article></div>
      </div>
    </section>

    <section class="values section">
      <div class="container"><header class="centered-heading"><p class="eyebrow">Our Values</p><h2>What We Stand For.</h2></header><div class="benefit-grid"><?php foreach ($values as $index => $value): ?><article><span class="icon"><?= ['◎', '◇', '⚙', '↗'][$index] ?></span><h3><?= escape($value['title']) ?></h3><?= $value['html'] ?></article><?php endforeach; ?></div></div>
    </section>

    <section class="image-cta"><div class="container"><div><p class="eyebrow"><?= escape($content->text('CTA eyebrow')) ?></p><h2><?= escape($content->text('CTA title')) ?></h2><?= $content->html('CTA copy') ?></div><a class="button button--primary" href="#signup">Create Your Account <span aria-hidden="true">→</span></a></div></section>
  </main>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
