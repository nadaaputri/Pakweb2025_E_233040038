<?php
class Cat extends Animal {
    public function run() {
        return $this->name . " itu berlari.";
    }
}

$cat = new Cat();
echo $cat->run();
echo "<br>";
?>