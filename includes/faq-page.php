<?php

$pageTitle = $content->meta('title');
$pageDescription = $content->meta('description');
$activeNav = $content->meta('active-nav');
$audience = $content->meta('audience');
$categories = $content->items('Categories');
$questions = $content->items('Questions');

require __DIR__ . '/header.php';
?>
  <main id="top">
    <section class="page-hero page-hero--faq">
      <div class="container">
        <p class="eyebrow">FAQ</p>
        <h1><?= escape($content->text('Hero title')) ?></h1>
        <p class="lead"><?= escape($content->text('Hero lead')) ?></p>
        <hr>
        <p><?= escape($content->text('Hero copy')) ?></p>
      </div>
    </section>

    <section class="faq-page section">
      <div class="container">
        <aside>
          <nav aria-label="FAQ categories">
            <?php foreach ($categories as $index => $category): ?>
              <a href="#questions"<?= $index === 0 ? ' aria-current="page"' : '' ?>><span aria-hidden="true"><?= $index === 0 ? '?' : '○' ?></span><?= escape($category['title']) ?></a>
            <?php endforeach; ?>
          </nav>
          <div class="support-box">
            <span class="icon" aria-hidden="true">?</span>
            <h2>Still have questions?</h2>
            <p>Our team is here to help.</p>
            <p>Contact us at<br><a href="mailto:support@avr-fp.com">support@avr-fp.com</a><br>or use our contact form.</p>
            <a class="button button--primary" href="mailto:support@avr-fp.com">Contact Us <span aria-hidden="true">→</span></a>
          </div>
        </aside>
        <div id="questions" class="faq-content">
          <header><div><p class="eyebrow"><?= escape($audience) ?> FAQs</p><h2>Frequently Asked Questions.</h2><p>Find answers to common questions from <?= escape(strtolower($audience)) ?> using AVRFP.</p></div><span>Collapse All&nbsp; −</span></header>
          <ol>
            <?php foreach ($questions as $question): ?>
              <li>
                <details>
                  <summary><strong><?= escape($question['title']) ?></strong></summary>
                  <?= $question['html'] ?>
                </details>
              </li>
            <?php endforeach; ?>
          </ol>
        </div>
      </div>
    </section>

    <section class="wide-cta">
      <div class="container">
        <span class="icon" aria-hidden="true">↗</span>
        <div><p class="eyebrow"><?= escape($content->text('CTA eyebrow')) ?></p><h2><?= escape($content->text('CTA title')) ?></h2><p><?= escape($content->text('CTA copy')) ?></p></div>
        <a class="button button--primary" href="#signup">Create Your Account <span aria-hidden="true">→</span></a>
      </div>
    </section>
  </main>
<?php require __DIR__ . '/footer.php'; ?>
