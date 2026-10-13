<?php

declare(strict_types=1);

const SITE_NAME = 'AVRFP';
const DATASTAR_VERSION = 'v1.0.2';

$primaryNavigation = [
    'For Event Planners' => '/for-event-planners/',
    'For AV Suppliers' => '/for-av-suppliers/',
    'Pricing' => '/pricing/',
    'About Us' => '/about-us/',
];

function escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
