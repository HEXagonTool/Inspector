<?php

namespace HEXagonTool\Inspector;

class InspectorConfig {
    public $status = 'inactive'; 
    public $templates_path = __DIR__ . '/templates';
    // public $can_see = [];

    public function __construct($options = []){
        $this->templates_path = $options['templates_path'] ?? $this->templates_path;
    }
}
