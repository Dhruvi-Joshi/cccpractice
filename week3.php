<?php

//simple calculator

public class calculator{
    public function add($a,$b){
        return $a+$b;
    }

    public function sub($a,$b){
        return $a-$b;
    }

    public function mul($a,$b){
        return $a*$b;
    }

    public function div($a,$b){
        if($b!=0){
            return $a/$b;
        }
        else{
            return "division is not possible";
        }
    }

}

$calculator=new calculator();
echo $calculator->add(5,3);echo"<br>";
echo $calculator->div(4,0);echo"<br>";
echo $calculator->div(10,5);echo"<br>";

//student information
class student{
    public $name;
    public $age;
    public $grade;

    public function displayinfo(){
        
        echo "Name:$this->name,Age:$this->age,Grade:$this->grade";
        
    }
}
$student=new student();
$student->name="John";
$student->age=18;
$student->grade="A";
$student->displayinfo();echo"<br>";

//point in 2D sapace
class point{
    public $x;
    public $y;
    public function calculatedistance(point $other){
        return sqrt(pow($this->x-$other->x,2)+pow($this->y-$other->y,2));
    }
}

$point1=new point();
$point1->x=1;
$point1->y=2;

$point2=new point();
$point2->x=4;
$point2->y=6;

echo $point1->calculatedistance($point2);echo"<br>";

//library system
class book{
    public $title;
    public $author;

    public function displayinfo(){
        echo "title:$this->title,Author:$this->author";
    }
}
class library{
    private $books=[];
    public function addbook(book $book){
        $this->books[]=$book;
    }
    public function displayallbook(){
        foreach($this->books as $book){
            $book->displayinfo();
            echo"<br>";
        }
    }
}
$book1=new book();
$book1->title="the catcher";
$book1->author="j.d.salinger";

$book2=new book();
$book2->title="to kill a mockingbird";
$book2->author="harper lee";

$library=new library();
$library->addbook($book1);
$library->addbook($book2);
$library->displayallbook();echo"<br>";

//employee management
class employee{
    public $name;
    public $position;
    public $salary;

    public function calculateyearlybouns(){
        return $this->salary*0.1;
    }
}
$employee=new employee();
$employee->name="alice";
$employee->position="manager";
$employee->salary=50000;

echo $employee->calculateyearlybouns();echo"<br>";

//blog system
class post{
    public $title;
    public $content;

    public function displayinfo(){
        echo "Title:$this->title<br>content:$this->content";
    }
}

class blog{
    private $posts=[];
    public function addpost(post $post){
        $this->posts[]=$post;
    }
    public function displayallpost(){
        foreach($this->posts as $post){
            $post->displayinfo();
            echo "<br><br>";
        }
    }
}
$post1=new post();
$post1->title="introduction to PHP";
$post1->content="this is a blog post about PHP";

$post2=new post();
$post2->title="object-oriented programming";
$post2->content="An overview of OOP pronciples";

$blog=new blog();
$blog->addpost($post1);echo"<br>";
$blog->addpost($post2);echo"<br>";

$blog->displayallpost();echo"<br>";

//shape hierarchy
class shape{

}
class circle extends shape{
    public $radius;

    public function calculatearea(){
        return pi()*pow($this->radius,2);
    }

    public function calculateperimeter(){
        return 2*pi()*$this->radius;
    }
}
class rectangle extends shape{
    public $length;
    public$width;

    public function calculatearea(){
        return $this->length*$this->width;
    }

    public function calculateperimeter(){
        return 2*($this->length+$this->width);
    }
}
    $circle = new circle();
    $circle->radius = 5;

    $rectangle = new rectangle();
    $rectangle->length = 4;
    $rectangle->width = 6;

    echo "Circle Area: " . $circle->calculatearea() . "<br>";
    echo "Rectangle Perimeter: " . $rectangle->calculateperimeter();echo"<br>";


//file management
class file{
    public $filename;
    public $size;

    public function getfileextension(){
        $parts=explode(".",$this->filename);
        return end($parts);
    }
    public function displayfileinfo(){
        echo "Filename:$this->filename,size:$this->size KB";
    }
}
$file = new File();
    $file->filename = "document.txt";
    $file->size = 1024;

    echo "File Extension: " . $file->getfileextension() . "<br>";
    $file->displayfileinfo();


//bank account
class bankaccount{
    private $accountno;
    private $accountholder;
    private $balance;

    public function __construct($accountno,$accountholder,$initialbalance){
        $this->accountno=$accountno;
        $this->accountholder=$accountholder;
        $this->balance=$initialbalance;
    }

    public function deposit($amount){
        $this->balance+=$amount;
    }

    public function withdraw($amount){
        if($amount <= $this->balance){
            $this->balance-=$amount;
        }
        else{
            echo "insufficient funds for withdrawal";echo"<br>";
        }
    }
    public function displayinfo(){
        echo "Account number:{$this->accountno},Account holder:{$this->accountholder},balance:{$this->balance}USD";
    }
}
$account1=new bankaccount("123456","john",1000);

$account1->deposit(500);
$account1->withdraw(200);

$account1->displayinfo();echo"<br>";
echo"<br>";
////online shop

class Product {
    private $productId;
    private $name;
    private $price;

    public function __construct($productId, $name, $price) {
        $this->productId = $productId;
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}

class ShoppingCart {
    private $items = [];

    public function addItem(Product $product) {
        $this->items[] = $product;
    }

    public function calculateTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getPrice();
        }
        return $total;
    }

    public function displayItems() {
        echo "Shopping Cart Items:\n";
        foreach ($this->items as $item) {
            echo "{$item->getPrice()} - {$item->getPrice()} USD\n";
        }
    }
}

$product1 = new Product(1, "Laptop", 800);
$product2 = new Product(2, "Smartphone", 400);

$cart = new ShoppingCart();
$cart->addItem($product1);
$cart->addItem($product2);


$cart->displayItems();
echo "Total Price: " . $cart->calculateTotal() . " USD";


?>