<?php

require_once __DIR__ . '/config.php';

$pageTitle ??= 'AV RFPs for Event Planners | ' . SITE_NAME;
$pageDescription ??= 'Post your AV RFP, connect with qualified AV suppliers, manage communication, and review proposals in one place.';
$activeNav ??= '';
$headerTheme ??= 'dark';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= escape($pageTitle) ?></title>
  <meta name="description" content="<?= escape($pageDescription) ?>">
  <link rel="stylesheet" href="/assets/css/site.css">
  <script type="module" src="https://cdn.jsdelivr.net/gh/starfederation/datastar@<?= DATASTAR_VERSION ?>/bundles/datastar.js"></script>
</head>
<body>
  <header class="site-header site-header--<?= escape($headerTheme) ?>">
    <div class="container">
      <a class="brand" href="/" aria-label="<?= SITE_NAME ?> home">
        <img src="/assets/images/home/logo_transparent.png" alt="" width="180" height="50">
        <span><span>AV</span>RFP</span><small>Audio Visual Request for Proposal</small>
      </a>

      <div class="mobile-nav" data-signals='{"menuOpen": false}' data-class:open="$menuOpen">
        <button type="button" aria-label="Toggle navigation" data-attr:aria-expanded="$menuOpen" data-on:click="$menuOpen = !$menuOpen">
          <span></span><span></span><span></span>
        </button>
        <nav aria-label="Mobile primary navigation">
          <?php foreach ($primaryNavigation as $label => $href): ?>
            <a href="<?= escape($href) ?>" data-on:click="$menuOpen = false"><?= escape($label) ?></a>
          <?php endforeach; ?>
          <div class="actions">
            <a class="button button--secondary" href="#login">Log In</a>
            <a class="button button--primary" href="#signup">Sign Up</a>
          </div>
        </nav>
      </div>

      <nav class="primary-nav" aria-label="Primary navigation">
        <?php foreach ($primaryNavigation as $label => $href): ?>
          <a href="<?= escape($href) ?>"<?= $label === $activeNav ? ' aria-current="page"' : '' ?>><?= escape($label) ?></a>
        <?php endforeach; ?>
      </nav>

      <div class="actions">
        <a class="button button--secondary" href="#login">Log In</a>
        <a class="button button--primary" href="#signup">Sign Up</a>
      </div>
    </div>
  </header>
