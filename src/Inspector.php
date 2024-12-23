<?php

namespace HEXagonTool\Inspector;

class InspectorConfig {
    public $status = 'inactive'; 
    public $templates_path = __DIR__ . '/templates';
    public $can_see = [];

    public function __construct($options = []){
        $this->templates_path = $options['templates_path'] ?? $this->templates_path;
    }
}

class Inspector {
    public static $config;

    public static function init($options = []) {
        self::$config = new InspectorConfig($options);
    }

    public static function start() {
        self::$config->status = 'active';
    }

    public static function stop() {
        self::$config->status = 'inactive';
    }

    public static function isActive() {
        return self::$config->status === 'active';
    }

    public static function canSee($userId) {
        return self::$config->status === 'active';
    }

    public static function __callStatic($name, $arguments) {
        if (self::isActive()) {
            if (method_exists(self::class, $name)) {
                return call_user_func_array([self::class, $name], $arguments);
            }
        }
    }

    public static function message($data) {
        echo $data;
    }

    public static function dump($data, $title = null, $options = []) {
        include self::$config->templates_path . '/dump.php'; 
    }
}
