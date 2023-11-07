<?php
class Config {
    private static $_config = [];

    public static function loadEnv($path) {
        $env = file_get_contents($path);
        $lines = explode(PHP_EOL, $env);

        foreach($lines as $line) {
            if(!empty($line) && strpos($line,"=") !== false) {
                list($key, $value) = explode("=", $line,2);

                $key = str_replace("_", " ", $key);

                $key = ucwords(strtolower($key));

                return self::$_config[$key] = $value;
            }
        }

    }

    public static function set($name, $value) {
        $name = str_replace("_", " ", $name);
        $name = ucwords(strtolower($name));
        return self::$_config[$name] = $value;
    }

    public static function get($name) {
        return isset(self::$_config[$name]) ? self::$_config[$name] : null;

    }
}