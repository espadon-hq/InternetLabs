<?php

// Інтерфейс
interface AnimalInterface {
    public function sayHello();
}

// Трейт
trait InfoTrait {
    public function showSpeciesInfo() {
        echo "Vulpes vulpes\n";
        echo "Linnaeus, 1758\n";
        echo "В Україні лисиця руда зустрічається по всій території.\n\n";
    }
}

// Загальний клас тварини
class Animal {
    protected $name;

    public function __construct($name) {
        $this->name = $name;
    }
    
    public function getName() {
        return $this->name;
    }
}

// Клас кота
class Cat extends Animal implements AnimalInterface {
    use InfoTrait;

    private $color;

    public function __construct($name, $color) {
        parent::__construct($name);
        $this->color = $color;
    }

    // Геттер
    public function getColor() {
        return $this->color;
    }

    // Сетер (не обов'язковий, але доданий за умовою)
    public function setColor($color) {
        $this->color = $color;
    }

    public function sayHello() {
        echo "Мяу! Мене звати {$this->name}, я {$this->color} котик.\n";
    }
}

// Створення котів
$snowball = new Cat("Сніжок", "білий");
$barsik = new Cat("Барсик", "рудий");

// Виведення інформації
$snowball->sayHello();
$barsik->sayHello();

// Виведення видової інформації (з трейт)
$snowball->showSpeciesInfo();
$barsik->showSpeciesInfo();
