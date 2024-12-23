<?php

namespace HEXagonTool\Inspector;

class InspectorConfig {
    public $status = 'inactive'; 
    public $can_see = [];
}

class Inspector {
    public static $config;

    public static function init() {
        self::$config = new InspectorConfig();
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
        echo '<div class="Inspector-dump-window" style="border:2px solid black; margin-bottom:20px; background-color: aquamarine;">';
        echo $title ? "<div class='Inspector-dump-title' style='margin:10px 20px; font-size: 24px;'>{$title}</div>" : '';
        $maxHeight = $options['height-dump-window'] ?? '500px';
        echo "<div class='Inspector-dump-data' style=\"max-height: {$maxHeight}; overflow: scroll; background: #dedfe3; padding:10px 20px;\">";
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        echo '</div>';
        echo '</div>';
    }
}
