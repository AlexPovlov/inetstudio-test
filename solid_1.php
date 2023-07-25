<?php

interface ObjectHandler {
    public function handle($object);
}

class SomeObject { 
    protected $name; 

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function getObjectName() {
        return $this->name;
    }
}

class Object1Handler implements ObjectHandler {
    public function handle($object) {
        // Обработка объекта типа 'object_1'
        // Можно добавить нужную логику обработки
        return 'handle_object_1';
    }
}

class Object2Handler implements ObjectHandler {
    public function handle($object) {
        // Обработка объекта типа 'object_2'
        // Можно добавить нужную логику обработки
        return 'handle_object_2';
    }
}

class SomeObjectsHandler {
    protected $handlers = [];

    public function __construct() {
        // Добавляем обработчики объектов в конструкторе
        $this->handlers['object_1'] = new Object1Handler();
        $this->handlers['object_2'] = new Object2Handler();
    }

    public function handleObjects(array $objects): array {
        $handlers = [];

        foreach ($objects as $object) {
            $objectName = $object->getObjectName();
            if (isset($this->handlers[$objectName])) {
                $handlers[] = $this->handlers[$objectName]->handle($object);
            }
        }

        return $handlers;
    }
}

$objects = [ 
    new SomeObject('object_1'), 
    new SomeObject('object_2') 
];

$soh = new SomeObjectsHandler();
$handlers = $soh->handleObjects($objects);

print_r($handlers);
