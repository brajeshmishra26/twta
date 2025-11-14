<?php
/**
 * Configuration file for path handling
 * This handles both localhost and server environments automatically
 */

// Detect if we're on localhost or a server
$is_localhost = (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || 
                 strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false);

// Set the base directory depending on environment
if ($is_localhost) {
    // For localhost (usually has project in a subfolder)
    $dir_parts = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
    $base_dir = '/' . $dir_parts[0] . '/'; // This gets 'twta/'
} else {
    // For production server (usually at root)
    $base_dir = '/';
}

// Site configuration
$config = array(
    'base_url'      => 'http' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 's' : '') . 
                       '://' . $_SERVER['HTTP_HOST'] . $base_dir,
    'base_path'     => $base_dir,
    'cms_path'      => $base_dir . 'CMS/',
    'admin_path'    => $base_dir . 'admin/',
    'images_path'   => $base_dir . 'images/',
    'css_path'      => $base_dir . 'css/',
    'js_path'       => $base_dir . 'js/'
);

/**
 * Helper function to get correct URL for a resource
 * @param string $path Relative path from site root
 * @return string Full URL to the resource
 */
function site_url($path = '') {
    global $config;
    return $config['base_url'] . ltrim($path, '/');
}

/**
 * Helper function to get the correct local path for includes
 * @param string $path Relative path from site root
 * @return string Path suitable for PHP includes
 */
function site_path($path = '') {
    global $config;
    
    // Get the document root path
    $doc_root = rtrim($_SERVER['DOCUMENT_ROOT'], '/\\');
    
    // For localhost with subfolder
    if (strpos($config['base_path'], '/') !== 0 && $config['base_path'] != '/') {
        return $doc_root . '/' . trim($config['base_path'], '/') . '/' . ltrim($path, '/');
    }
    
    // For production server
    return $doc_root . '/' . ltrim($path, '/');
}

/**
 * Helper function to get an image path, with fallback
 * @param string $image_path Path to the image
 * @param string $fallback Path to fallback image if original doesn't exist
 * @return string Full URL to the image
 */
function image_url($image_path, $fallback = 'images/no-image.jpg') {
    global $config;

    // Normalize input path (relative to site root)
    $relative_path = ltrim($image_path, '/');

    // Build filesystem path taking into account subfolder deployments (e.g., /twta)
    $doc_root = rtrim($_SERVER['DOCUMENT_ROOT'], "/\\");
    $base_rel = trim($config['base_path'], '/'); // e.g., 'twta' or ''
    $fs_path = $doc_root . '/' . ($base_rel !== '' ? $base_rel . '/' : '') . $relative_path;

    // Helper to URL-encode each path segment for safe URLs (handles spaces, unicode, etc.)
    $encode_path = function ($p) {
        $parts = explode('/', trim($p, '/'));
        $parts = array_map('rawurlencode', $parts);
        return implode('/', $parts);
    };

    if (file_exists($fs_path)) {
        // Return an encoded URL for the resource
        return site_url($encode_path($relative_path));
    }

    // Fallback image
    return site_url($fallback);
}

/**
 * Resolve the first existing path from a list of relative paths and return its URL.
 * Each candidate is checked on the filesystem taking into account subfolder deployments.
 * @param array $candidates List of relative paths from site root
 * @param string $fallback Path to fallback image if none exists
 * @return string Full URL to the resolved resource
 */
function resource_url(array $candidates, $fallback = 'images/no-image.jpg') {
    global $config;

    $doc_root = rtrim($_SERVER['DOCUMENT_ROOT'], "/\\");
    $base_rel = trim($config['base_path'], '/');

    $encode_path = function ($p) {
        $parts = explode('/', trim($p, '/'));
        $parts = array_map('rawurlencode', $parts);
        return implode('/', $parts);
    };

    foreach ($candidates as $rel) {
        if (!$rel) continue;
        $rel = ltrim($rel, '/');
        $fs_path = $doc_root . '/' . ($base_rel !== '' ? $base_rel . '/' : '') . $rel;
        if (file_exists($fs_path)) {
            return site_url($encode_path($rel));
        }
    }

    return site_url($fallback);
}
?>