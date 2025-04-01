<!DOCTYPE html>
<html>
<head><title>PHP Method Overriding</title></head>
<body>
    <?php
    class Animal {
        public function speak() {
            return "Animal makes a sound.";}}

    class Dog extends Animal {
        public function speak() {
            return "Dog barks: Woof!";}}

    $animal = new Animal();
    $dog = new Dog();
    ?>

    <h1>Method Overriding in PHP</h1>
    <p><strong>Animal:</strong> <?php echo $animal->speak(); ?></p>
    <p><strong>Dog:</strong> <?php echo $dog->speak(); ?></p>
</body>
</html>
