<?php

class A {
  public function foo() {
      static $x = 0;
      echo ++$x;
  }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo();

//Здесь класс В наследует свойсва класса А
//Посколку первый объект вызывает метод класса А где происходит увеличение на единицу и вывод на экран
//Далее вотрой обект вызывает класс В который просто наледует информацию метода класса А
//То получается что второй метод просто скопировал информацию первого
//От сюда ответ первые две единицы
//Далее объекты повторно вызывают метод класса А где была уже записана единица, увеличивают её и выводят двойку на экран
//И потом последний объект вновь вызывает класс В котрый в свою очередь унаследует информацию класса А 