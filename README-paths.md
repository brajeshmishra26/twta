# TWTA Website Path Handling Guide

This document explains how the path handling system works in the TWTA website.

## Overview

The website now uses a centralized configuration system for handling paths, located in `include/config.php`. This system automatically detects whether the site is running on a local development server (e.g., XAMPP) or a production server, and adjusts paths accordingly.

## How It Works

1. The system detects the environment (localhost vs. production server)
2. It sets up appropriate path variables in the `$config` array
3. Helper functions like `site_url()` and `image_url()` make it easy to generate correct paths

## Helper Functions

- **site_url($path)**: Generates a full URL for any resource
- **site_path($path)**: Generates a filesystem path suitable for PHP includes
- **image_url($image_path, $fallback)**: Generates an image URL with fallback if the image doesn't exist

## Usage Examples

### In PHP Files

```php
// Include the configuration
include('include/config.php');

// Generate a URL to a CSS file
$css_url = site_url('css/style.css');

// Generate a URL to an image with fallback
$image_url = image_url('admin/topicimg/image.jpg');
```

### In HTML

```html
<link href="<?php echo $config['css_path']; ?>style.css" rel="stylesheet">
<img src="<?php echo image_url('images/logo.png'); ?>" alt="Logo">
```

## Diagnostic Tool

A diagnostic page has been created at `path-diagnostic.php` that shows all path configurations and tests various image URLs. Use this page to troubleshoot path issues.

## Best Practices

1. Always use the helper functions or `$config` array for paths
2. Avoid hardcoding absolute paths
3. For images that might not exist, use `image_url()` which provides a fallback

## Fallback Images

The system provides a fallback image at `images/no-image.jpg` that will be displayed if an image is not found. Additionally, all image tags now include an `onerror` attribute as a second fallback mechanism.

## Troubleshooting

If you're experiencing issues with paths:

1. Check the `path-diagnostic.php` page
2. Verify that the config file is being included properly
3. Make sure all paths are relative to the site root
4. Check file permissions on the server