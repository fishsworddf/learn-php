<?php
class SimpleFactory
{
    public function factory()
    {
        return new Animal(); // 只需要修改这里 可以切换不同的实例
    }
}

class Person
{
    public function eat()
    {
        return __CLASS__ . ' ' . __FUNCTION__;
    }
}

class Animal
{
    public function eat()
    {
        return __CLASS__ . ' ' . __FUNCTION__;
    }
}

$factory = new SimpleFactory();
$a = $factory->factory()->eat();
var_dump($a);
