<?php
header('Content-Type: application/xml');

echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
$pages = [
    ['loc' => 'https://www.drbianchi.ch/', 'lastmod' => '2025-01-09', 'priority' => '1.0'],
    ['loc' => 'https://www.drbianchi.ch/about', 'lastmod' => '2025-01-09', 'priority' => '0.8'],
    ['loc' => 'https://www.drbianchi.ch/contact', 'lastmod' => '2025-01-09', 'priority' => '0.8'],
];
foreach ($pages as $page) {
    echo '<url>';
    echo '<loc>' . $page['loc'] . '</loc>';
    echo '<lastmod>' . $page['lastmod'] . '</lastmod>';
    echo '<priority>' . $page['priority'] . '</priority>';
    echo '</url>';
}
echo '</urlset>';
?>