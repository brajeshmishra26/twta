<?php
if (!function_exists('load_env')) {
    function load_env($envFilePath)
    {
        static $envCache = [];

        if (!is_string($envFilePath) || !file_exists($envFilePath) || !is_readable($envFilePath)) {
            return;
        }

        $lines = file($envFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || $line[0] === '#' || $line[0] === ';') {
                continue;
            }
            $parts = explode('=', $line, 2);
            if (count($parts) !== 2) {
                continue;
            }
            $key = trim($parts[0]);
            $value = trim($parts[1]);
            if ($value !== '' && (($value[0] === '"' && substr($value, -1) === '"') || ($value[0] === "'" && substr($value, -1) === "'"))) {
                $value = substr($value, 1, -1);
            }
            if ($key === '') {
                continue;
            }

            if (function_exists('putenv')) {
                @putenv($key . '=' . $value);
            }

            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
            $envCache[$key] = $value;
        }
        $GLOBALS['__twta_env_cache'] = $envCache;
    }
}

if (!function_exists('env_value')) {
    function env_value($key, $default = null)
    {
        if ($key === null || $key === '') {
            return $default;
        }

        $value = getenv($key);
        if ($value !== false) {
            return $value;
        }

        if (isset($_ENV[$key])) {
            return $_ENV[$key];
        }

        if (isset($_SERVER[$key])) {
            return $_SERVER[$key];
        }

        if (isset($GLOBALS['__twta_env_cache'][$key])) {
            return $GLOBALS['__twta_env_cache'][$key];
        }

        return $default;
    }
}
?>
