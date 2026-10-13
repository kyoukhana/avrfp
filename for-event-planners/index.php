<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/content.php';
$content = page_content('for-event-planners');
$pageTitle = $content->meta('title');
$pageDescription = $content->meta('description');
$activeNav ??= $content->meta('active-nav');
$features = $content->items('Features');
$faqs = $content->items('FAQs');

require dirname(__DIR__) . '/includes/header.php';
?>
  <main id="top">
    <section class="hero" id="event-planners">
      <div class="container">
        <div class="content">
          <p class="eyebrow">For Event Planners</p>
          <h1><?= escape($content->text('Hero title')) ?><br><span><?= escape($content->text('Hero highlight')) ?></span></h1>
          <div class="summary"><?= $content->html('Hero copy') ?></div>
          <a class="button button--primary button--large" href="#signup">Post an RFP for Free <span aria-hidden="true">→</span></a>
          <p class="note">
            <svg aria-hidden="true" viewBox="0 0 24 24"><ellipse cx="8" cy="6" rx="5" ry="2.5"/><path d="M3 6v4c0 1.4 2.2 2.5 5 2.5s5-1.1 5-2.5V6M3 10v4c0 1.4 2.2 2.5 5 2.5 1 0 2-.2 2.8-.5M3 14v4c0 1.4 2.2 2.5 5 2.5 1 0 1.9-.1 2.6-.4"/><ellipse cx="16" cy="13" rx="5" ry="2.5"/><path d="M11 13v4c0 1.4 2.2 2.5 5 2.5s5-1.1 5-2.5v-4M11 17v2c0 1.4 2.2 2.5 5 2.5s5-1.1 5-2.5v-2"/></svg>
            No commission on business awarded.
          </p>
        </div>
        <div class="media" role="img" aria-label="Event planner reviewing production details at a professionally lit conference venue">
          <span class="visually-hidden">Great events bring people together.</span>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <header class="section-heading">
          <p class="eyebrow">For Event Planners</p>
          <h2>What can I do here?</h2>
          <p>All the tools you need to manage your AV RFPs, from posting to final selection.</p>
        </header>
        <div class="feature-grid">
          <?php foreach ($features as $index => $feature): ?><article><div class="icon"><?= ['+', '◇', '▤', '◎'][$index] ?></div><h3><?= escape($feature['title']) ?></h3><?= $feature['html'] ?></article><?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="event-cta">
      <div aria-hidden="true"></div>
      <div class="container">
        <figure><blockquote><?= escape($content->text('Testimonial')) ?></blockquote><figcaption>Event Planner</figcaption></figure>
        <div><svg aria-hidden="true" viewBox="0 0 32 32"><rect x="4" y="7" width="24" height="21" rx="2"/><path d="M10 3v8M22 3v8M4 14h24M11 20h10M16 17v6"/></svg><p>Ready to post your<br>next AV RFP?</p><a class="button button--light" href="#signup">Get Started for Free <span aria-hidden="true">→</span></a></div>
      </div>
    </section>

    <section class="faq section" id="faq">
      <div class="container">
        <header><div class="section-heading"><p class="eyebrow">For Event Planners</p><h2>Frequently Asked Questions</h2></div><a class="text-link" href="#faq">View All FAQs <span aria-hidden="true">→</span></a></header>
        <div>
          <?php foreach (array_chunk($faqs, 3) as $column): ?><div><?php foreach ($column as $faq): ?><details><summary><?= escape($faq['title']) ?></summary><?= $faq['html'] ?></details><?php endforeach; ?></div><?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="community-cta" id="signup">
      <div class="container">
        <div class="icon"><svg aria-hidden="true" viewBox="0 0 32 32"><circle cx="11" cy="10" r="5"/><circle cx="23" cy="9" r="4"/><path d="M2 27v-4c0-4 4-7 9-7s9 3 9 7v4zM20 17c5 0 9 2.6 9 6v4h-6"/></svg></div>
        <div><h2><?= escape($content->text('CTA title')) ?></h2><?= $content->html('CTA copy') ?></div>
        <a class="button button--primary" href="#signup">Create Your Account <span aria-hidden="true">→</span></a>
      </div>
    </section>
  </main>
<?php require dirname(__DIR__) . '/includes/footer.php'; ?>
