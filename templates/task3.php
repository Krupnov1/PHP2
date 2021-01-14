<h3>3. Немного изменим код из задачи 2: <br/>
    class A {                           <br/>
        public function foo() {         <br/>
            static $x = 0;              <br/>
            echo ++$x;                  <br/>
        }                               <br/>
    }                                   <br/>
    class B extends A {                 <br/>
    }                                   <br/>
    $a1 = new A();                      <br/>
    $b1 = new B();                      <br/>
    $a1->foo();                         <br/> 
    $b1->foo();                         <br/> 
    $a1->foo();                         <br/> 
    $b1->foo();                         <br/>
    Объясните результаты в этом случае. <br/>
</h3>

<p>В данном коде все так же, как и в задаче 2, за исключением того, что будет создано два совершенно разных объекта A1 и B1. B1 получается в результате наследования от класса А. Вызвали метод по 2 раза для каждого объекта и получили на выводе:</p>

<?php
class A { 
    public function foo() { 
        static $x = 0; 
        echo ++$x . '<br/>'; 
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
