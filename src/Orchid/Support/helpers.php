<?php
use Orchid\Log\Contracts\Utilities\LogLevels;
use Orchid\Log\Contracts\Utilities\LogMenu;
use Orchid\Log\Contracts\Utilities\LogStyler;
use Orchid\Log\Log;
use Orchid\Setting\Facades\Setting;

if (!function_exists('setting')) {
    /**
     * @param      $key
     * @param null $default
     *
     * @return mixed
     */
    function setting($key, $default = null)
    {
        return Setting::get($key, $default);
    }
}

if (!function_exists('alert')) {
    /**
     * Arrange for a flash message.
     *
     * @param string|null $message
     * @param string      $level
     *
     * @return \Orchid\Alert\Alert
     */
    function alert(string $message = null, string $level = 'info') : \Orchid\Alert\Alert
    {
        $notifier = app('alert');

        if (!is_null($message)) {
            return $notifier->message($message, $level);
        }

        return $notifier;
    }
}

if (!defined('REGEX_DATE_PATTERN')) {
    define('REGEX_DATE_PATTERN', '\d{4}(-\d{2}){2}'); // YYYY-MM-DD
}

if (!defined('REGEX_TIME_PATTERN')) {
    define('REGEX_TIME_PATTERN', '\d{2}(:\d{2}){2}'); // HH:MM:SS
}

if (!defined('REGEX_DATETIME_PATTERN')) {
    define(
        'REGEX_DATETIME_PATTERN',
        REGEX_DATE_PATTERN . ' ' . REGEX_TIME_PATTERN // YYYY-MM-DD HH:MM:SS
    );
}

if (!function_exists('log_viewer')) {
    /**
     * Get the Log instance.
     *
     * @return Orchid\Log\Contracts\LogViewer
     */
    function log_viewer()
    {
        return app(Log::class);
    }
}

if (!function_exists('log_levels')) {
    /**
     * Get the LogLevels instance.
     *
     * @return Orchid\Log\Contracts\Utilities\LogLevels
     */
    function log_levels()
    {
        return app(LogLevels::class);
    }
}

if (!function_exists('log_menu')) {
    /**
     * Get the LogMenu instance.
     *
     * @return Orchid\Log\Contracts\Utilities\LogMenu
     */
    function log_menu()
    {
        return app(LogMenu::class);
    }
}

if (!function_exists('log_styler')) {
    /**
     * Get the LogStyler instance.
     *
     * @return Orchid\Log\Contracts\Utilities\LogStyler
     */
    function log_styler()
    {
        return app(LogStyler::class);
    }
}

if (!function_exists('extract_date')) {
    /**
     * Extract date from string (format : YYYY-MM-DD).
     *
     * @param string $string
     *
     * @return string
     */
    function extract_date($string)
    {
        return preg_replace('/.*(' . REGEX_DATE_PATTERN . ').*/', '$1', $string);
    }
}
