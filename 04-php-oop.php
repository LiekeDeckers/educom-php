<!DOCTYPE html>
<html>
    <body>
        <?php
// Classes and objects
class Fruit {
  // Properties (variables)
  public $name;
  public $color;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}
  // Objects --> new 
$apple = new Fruit();
$banana = new Fruit();
$apple->set_name('Apple');
$banana->set_name('Banana');

echo $apple->get_name();
echo "<br>";
echo $banana->get_name();

// $this
class Fruit {
  public $name;
  function set_name($name) {
    $this->name = $name;
  }
}
$apple = new Fruit();
$apple->set_name("Apple");

echo $apple->name; 


// Constructor 
class Fruit {
  public $name;
  public $color;

  function __construct($name) {     // __construct has 2 underscores
    $this->name = $name;            // set_name is niet meer nodig
  }
  function get_name() {
    return $this->name;
  }
}

$apple = new Fruit("Apple");
echo $apple->get_name();


// Destructor
class Fruit {
    public $name;
    public $color;
  
    function __construct($name, $color) {
      $this->name = $name;
      $this->color = $color;
    }
    function __destruct() {         // __construct has 2 underscores
      echo "The fruit is {$this->name} and the color is {$this->color}.";
    }                               // automatically called at the end of the script
  }
  $apple = new Fruit("Apple", "red");


// Access Modifiers
    // public - the property or method can be accessed from everywhere --> default
    // protected - the property or method can be accessed within the class and by classes derived from that class
    // private - the property or method can ONLY be accessed within the class
 class Fruit {
    public $name;
    protected $color;
    private $weight;    // kunnen ook voor functies staan: protected function set_color($n) {
      }
      
    $mango = new Fruit();
    $mango->name = 'Mango'; // OK
    $mango->color = 'Yellow'; // ERROR
    $mango->weight = '300'; // ERROR


// Inheritance 
      // when a class derives from another class
      // extends keyword
class Fruit {
    public $name;
    public $color;
    public function __construct($name, $color) {
        $this->name = $name;
        $this->color = $color;
    }
    public function intro() {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }}
      
    class Strawberry extends Fruit {            // Strawberry is inherited from Fruit
    public function message() {
        echo "Am I a fruit or a berry? ";
        }
      }
    $strawberry = new Strawberry("Strawberry", "red");  // can use the public $name and $color properties 
    $strawberry->intro();                               // as well as the public __construct() and intro() methods from the Fruit class
    $strawberry->message();

    // final keyword --> prevents class inheritance or method overriding


// Class constants
class Goodbye {                          // recommended to name the constants in all uppercase letters
    const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";    
  }
  
  echo Goodbye::LEAVING_MESSAGE;         // outside ::
                                         // inside self::



// Abstract classes and methods --> parent class a method, but need its child class(es) to fill out the tasks
abstract class Car {                                // abstract parent class
    public $name;
    public function __construct($name) {
      $this->name = $name;
    }
    abstract public function intro() : string;      // abstract method
  }
  
  // Child classes
  class Audi extends Car {
    public function intro() : string {              // methods has to have the same name as the abstract method
      return "Choose German quality! I'm an $this->name!";
    }
  }
  
  class Volvo extends Car {
    public function intro() : string {
      return "Proud to be Swedish! I'm a $this->name!";
    }
  }
  
  class Citroen extends Car {
    public function intro() : string {
      return "French extravagance! I'm a $this->name!";
    }
  }
  
  // Create objects from the child classes
  $audi = new audi("Audi");
  echo $audi->intro();
  echo "<br>";
  
  $volvo = new volvo("Volvo");
  echo $volvo->intro();
  echo "<br>";
  
  $citroen = new citroen("Citroen");
  echo $citroen->intro();



// Interfaces --> specify what methods a class should implement
// Interface definition
interface Animal {
  public function makeSound();
}

// Class definitions
class Cat implements Animal {
  public function makeSound() {
    echo " Meow ";
  }
}

class Dog implements Animal {
  public function makeSound() {
    echo " Bark ";
  }
}

class Mouse implements Animal {
  public function makeSound() {
    echo " Squeak ";
  }
}

// Create a list of animals
$cat = new Cat();
$dog = new Dog();
$mouse = new Mouse();
$animals = array($cat, $dog, $mouse);

// Tell the animals to make a sound
foreach($animals as $animal) {
  $animal->makeSound();
}


// Traits --> keywords: trait, use
trait message1 {
public function msg1() {
    echo "OOP is fun! ";
    }
    }
    
class Welcome {
    use message1;
    }
    
$obj = new Welcome();
$obj->msg1();


// Static methods
class greeting {
    public static function welcome() {
      echo "Hello World!";
    }
  }
  
greeting::welcome();    // Call static method with ::


// Static properties
class pi {
    public static $value = 3.14159;
  }
  
echo pi::$value;        // Get static property


// Namespaces
namespace Html;         // A namespace declaration must be the first thing in the PHP file
class Table {
  public $title = "";
  public $numRows = 0;
  public function message() {
    echo "<p>Table '{$this->title}' has {$this->numRows} rows.</p>";
  }
}
$table = new Table();
$table->title = "My table";
$table->numRows = 5;

$table->message();


// Iterable = any value that can be looped with a foreach() loop
    // Create an Iterator
    class MyIterator implements Iterator {
        private $items = [];
        private $pointer = 0;
  
    public function __construct($items) {
    
    // array_values() makes sure that the keys are numbers
    $this->items = array_values($items);
    }
  
    public function current() {                 // current() returns the current item
      return $this->items[$this->pointer];
    }
  
    public function key() {                     // key() returns the key of the current item
      return $this->pointer;
    }
  
    public function next() {                    //next() advances to the next item
      $this->pointer++;
    }
  
    public function rewind() {                  //rewind() repositions the Iterator to the first item
      $this->pointer = 0;
    }
  
    public function valid() {                   //valid() returns true if the Iterator is pointing to a valid item
      
    // count() indicates how many items are in the list
    return $this->pointer < count($this->items);
    }
  }
  
    // A function that uses iterables
    function printIterable(iterable $myIterable) {
    foreach($myIterable as $item) {
      echo $item;
    }
  }
  
    // Use the iterator as an iterable
    $iterator = new MyIterator(["a", "b", "c"]);
    printIterable($iterator);


        ?>
    </body>
</html>
