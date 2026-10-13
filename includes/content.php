<?php

declare(strict_types=1);

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;

require_once dirname(__DIR__) . '/vendor/autoload.php';

final class PageContent
{
    private MarkdownConverter $markdown;
    private array $meta = [];
    private array $sections = [];

    public function __construct(string $path)
    {
        $source = file_get_contents($path);
        if ($source === false) {
            throw new RuntimeException("Unable to read content file: $path");
        }

        $environment = new Environment([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
        $environment->addExtension(new CommonMarkCoreExtension());
        $this->markdown = new MarkdownConverter($environment);
        $this->parse($source);
    }

    public function meta(string $key, string $fallback = ''): string
    {
        return $this->meta[$key] ?? $fallback;
    }

    public function text(string $section): string
    {
        return trim(strip_tags($this->html($section)));
    }

    public function html(string $section): string
    {
        return isset($this->sections[$section])
            ? (string) $this->markdown->convert($this->sections[$section])
            : '';
    }

    /** @return array<int, array{title: string, html: string, text: string}> */
    public function items(string $section): array
    {
        $source = $this->sections[$section] ?? '';
        preg_match_all('/^###\s+(.+?)\R(.*?)(?=^###\s+|\z)/ms', $source, $matches, PREG_SET_ORDER);

        return array_map(function (array $match): array {
            $html = (string) $this->markdown->convert(trim($match[2]));
            return ['title' => trim($match[1]), 'html' => $html, 'text' => trim(strip_tags($html))];
        }, $matches);
    }

    private function parse(string $source): void
    {
        if (preg_match('/\A---\R(.*?)\R---\R(.*)\z/s', $source, $parts)) {
            foreach (preg_split('/\R/', trim($parts[1])) as $line) {
                if (str_contains($line, ':')) {
                    [$key, $value] = array_map('trim', explode(':', $line, 2));
                    $this->meta[strtolower($key)] = $value;
                }
            }
            $source = $parts[2];
        }

        preg_match_all('/^##\s+(.+?)\R(.*?)(?=^##\s+|\z)/ms', $source, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $this->sections[trim($match[1])] = trim($match[2]);
        }
    }
}

function page_content(string $name): PageContent
{
    $safeName = preg_replace('/[^a-z0-9-]/', '', strtolower($name));
    return new PageContent(dirname(__DIR__) . "/content/$safeName.md");
}
