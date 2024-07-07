<pre>
    <?php

/*
public class abc{

    //function __construct() {}
    public $a=10;
    protected $b=10;
    private $c=["hello"];

     
    
}


class xyz extends abc{
     public $a=20;
    // protected $y=2;
    // private $z=["abc"];
}

class pqr extends abc{
    // public $a="abc1";
    // protected $b=3;
    // private $c=["abc2"];
}
$obj=new abc();
$obj1=new xyz();
$obj2=new pqr();
print_r($obj2->a);
print_r($obj1->a);
print_r($obj->a);
//print_r($obj->b);
//print_r($obj->c);
//$this ->a=$a;
?>
*/

    class A
    {
        public $i = 0;
        public function inc()
        {
            $this->i++;
        }
        public function reset()
        {
            $this->i = 10;
        }
    }

    $obj1 = new A();
    print_r($obj1);
    $obj1->inc();
    print_r($obj1);
    $obj1->reset();
    $obj1->i = 50;

    $obj2 = new A();
    $obj2->inc();

    print_r($obj1);
    $obj1->inc();
    print_r($obj1);

    $obj1->reset();
    print_r($obj1);
    print_r($obj2); 
?> 