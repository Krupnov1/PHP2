<h3>4. Дан код:                            <br/>
    class A {                              <br/>
        public function foo() {            <br/>
            static $x = 0;                 <br/>
            echo ++$x;                     <br/>
        }                                  <br/>
    }                                      <br/>
    class B extends A {                    <br/>
    }                                      <br/>
    $a1 = new A;                           <br/>
    $b1 = new B;                           <br/>
    $a1->foo();                            <br/> 
    $b1->foo();                            <br/> 
    $a1->foo();                            <br/> 
    $b1->foo();                            <br/> 
    Что он выведет на каждом шаге? Почему? <br/>
</h3>

<p>В данном коде отсутствуют () в строке создания нового объекта $a1 = new A или $b1 = new B. Как и в предыдущей задаче создается объект А
и в результате наследования объект B. Два разных объекта с методами foo. В результате вызова методов получим 1, 1 для объектов А и В и 2, 2 в результате повторного вызова. </p>

<?php
class A { 
    public function foo() { 
        static $x = 0; 
        echo ++$x . '<br/>'; 
    } 
} 

class B extends A {
}

$a1 = new A; 
$b1 = new B; 

$a1->foo();
$b1->foo(); 

$a1->foo(); 
$b1->foo(); 



