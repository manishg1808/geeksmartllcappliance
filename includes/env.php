<?php
/**
 * Lightweight .env loader (no Composer dependency).
 */

if (!function_exists('load_env')) {
    /**
     * Parse a .env file into $_ENV / putenv (does not overwrite existing values).
     */
    function load_env(string $path): void
    {
        if (!is_readable($path)) {
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            return;
        }

        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || $line[0] === '#') {
                continue;
            }

            if (strpos($line, '=') === false) {
                continue;
            }

            [$name, $value] = explode('=', $line, 2);
            $name  = trim($name);
            $value = trim($value);

            if ($name === '') {
                continue;
            }

            if (
                (str_starts_with($value, '"') && str_ends_with($value, '"')) ||
                (str_starts_with($value, "'") && str_ends_with($value, "'"))
            ) {
                $value = substr($value, 1, -1);
            }

            if (!array_key_exists($name, $_ENV)) {
                $_ENV[$name] = $value;
                putenv($name . '=' . $value);
            }
        }
    }
}

if (!function_exists('env')) {
    /**
     * Read an environment value with optional default.
     *
     * @param mixed $default
     * @return mixed
     */
    function env(string $key, $default = null)
    {
        $value = $_ENV[$key] ?? getenv($key);
        if ($value === false || $value === null || $value === '') {
            return $default;
        }

        $lower = strtolower((string) $value);
        if (in_array($lower, ['true', '1', 'yes', 'on'], true)) {
            return true;
        }
        if (in_array($lower, ['false', '0', 'no', 'off'], true)) {
            return false;
        }

        return $value;
    }
}

if (!function_exists('env_required')) {
    /**
     * Read a required environment value or throw.
     */
    function env_required(string $key): string
    {
        $value = env($key);
        if ($value === null || $value === '') {
            throw new RuntimeException('Missing required environment variable: ' . $key);
        }
        return (string) $value;
    }
}
