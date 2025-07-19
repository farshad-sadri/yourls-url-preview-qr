<?php
/*
Plugin Name: URL Preview with QR Code and Thumbnail
Plugin URI: https://github.com/farshad-sadri/yourls-url-preview-qr
Description: Displays a preview page with QR code and thumbnail before redirecting, triggered by appending ~ to any short URL.
Version: 1.1
Author: Farshad Sadri
Author URI: https://farshadsadri.com
*/

// -----------------------------
// 🔧 Configuration (Edit Below)
// -----------------------------

define('YOURLS_PREVIEW_TRIGGER_CHAR', '~'); // Trigger character
define('YOURLS_THUMBNAIL_API_KEY', 'ab9e81a2037c82db66986950047a2246639a1e3810c9'); // Get it from https://thumbnail.ws
define('YOURLS_THUMBNAIL_WIDTH', 500); // Width in px

// ----------------------------------
// 🚫 DO NOT EDIT BELOW THIS LINE
// ----------------------------------

yourls_add_action('loader_failed', 'yourls_preview_handle_loader_failed');

function yourls_preview_handle_loader_failed($args) {
    $request = $args[0];
    $pattern = yourls_make_regexp_pattern(yourls_get_shorturl_charset());
    $trigger = YOURLS_PREVIEW_TRIGGER_CHAR;

    if (preg_match("@^([$pattern]+)$trigger$@", $request, $matches)) {
        $keyword = yourls_sanitize_keyword($matches[1]);
        yourls_preview_render($keyword);
        exit;
    }
}

function yourls_preview_render($keyword) {
    require_once YOURLS_INC . '/functions-html.php';

    $long_url = yourls_get_keyword_longurl($keyword);
    $title = yourls_get_keyword_title($keyword);
    $base_url = YOURLS_SITE;
    $short_url = "{$base_url}/{$keyword}";
    $qr_code_url = "https://quickchart.io/chart?chs=200x200&cht=qr&chld=M&chl=" . urlencode($short_url);
    $thumbnail_url = "https://api.thumbnail.ws/api/" . YOURLS_THUMBNAIL_API_KEY . "/thumbnail/get?url=" . urlencode($long_url) . "&width=" . YOURLS_THUMBNAIL_WIDTH;

    yourls_html_head('preview', 'Short URL Preview');
    yourls_html_logo();

    echo <<<HTML
        <h2>🔗 Link Preview</h2>
        <p><strong>Short URL:</strong> <a href="$short_url">$short_url</a></p>
        <p><strong>QR Code:</strong><br><img src="$qr_code_url" alt="QR Code for $short_url"></p>
        <p><strong>Destination:</strong><br><a href="$long_url" target="_blank" rel="noopener noreferrer">$title<br><small>$long_url</small><br><a href="$short_url"><img src="$thumbnail_url" width="{$YOURLS_THUMBNAIL_WIDTH}" alt="Website thumbnail"><a/></p>
HTML;

    yourls_html_footer();
}
