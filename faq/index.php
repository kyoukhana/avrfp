<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/includes/content.php';
$content = page_content('faq');
require dirname(__DIR__) . '/includes/faq-page.php';
