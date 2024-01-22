<?php

#data type
/*

$num=5;
var_dump($num);
echo "<br>";

$float=10.5;
var_dump($float);
echo "<br>";

$str="hello world";
var_dump($str);
echo "<br>";

$bool=true;
var_dump($bool);
echo "<br>";

$arr=array(1,3,"abc");
var_dump($bool);
echo "<br>";

$nothing=NULL;
var_dump($nothing); 
$x="hello";
$x=NULL;
var_dump($x);
echo "<br>";

$a=5;
var_dump($a);
echo "<br>";
$b="5";
var_dump($b);
echo "<br>";
$a="5rs.";
var_dump($a);
*/

#type casting

//cast to int
/*
$num=5;
$float=10.5;
$str="hello world";
$str1="5rs.";
$str2="rs 5";
$bool=true;
$nothing=NULL;

var_dump($a=(int)$num);echo "<br>";
var_dump($b=(int)$float);echo "<br>";
var_dump($c=(int)$str);echo "<br>";
var_dump($d=(int)$str1);echo "<br>";
var_dump($e=(int)$str2);echo "<br>";
var_dump($f=(int)$bool);echo "<br>";
var_dump($g=(int)$nothing);echo "<br>";
*/

//cast to float
/*
$num=5;
$float=10.5;
$str="hello world";
$str1="5rs.";
$str2="rs 5";
$bool=true;
$nothing=NULL;

var_dump($a=(float)$num);echo "<br>";
var_dump($b=(float)$float);echo "<br>";
var_dump($c=(float)$str);echo "<br>";
var_dump($d=(float)$str1);echo "<br>";
var_dump($e=(float)$str2);echo "<br>";
var_dump($f=(float)$bool);echo "<br>";
var_dump($g=(float)$nothing);echo "<br>";

*/

//cast of string
/*$num=5;
$float=10.5;
$str="hello world";
$bool=true;
$nothing=NULL;

var_dump($a=(string)$num);echo "<br>";
var_dump($b=(string)$float);echo "<br>";
var_dump($c=(string)$str);echo "<br>";
var_dump($d=(string)$bool);echo "<br>";
var_dump($e=(string)$nothing);echo "<br>";
*/

//casting of boolean
/*
$num=5;
$num1=0;
$num2=-5;
$float=10.5;
$float1=0.0;
$str="hello world";
$str1="";
$bool=true;
$nothing=NULL;

var_dump($a=(bool)$num);echo "<br>";
var_dump($a=(bool)$num1);echo "<br>";
var_dump($c=(bool)$num2);echo "<br>";
var_dump($d=(bool)$float);echo "<br>";
var_dump($e=(bool)$float1);echo "<br>";
var_dump($f=(bool)$str);echo "<br>";
var_dump($g=(bool)$str1);echo "<br>";
var_dump($h=(bool)$bool);echo "<br>";
var_dump($i=(bool)$nothing);echo "<br>";
*/

#casting of NULL
/*
$num=5;
//$num=(unset)$num;  //not suport in new version
*/

#math_function

/*
#1.basic arithmatic
//absolute value
echo(abs(3.5)."<br>");
echo(abs(-3.5)."<br>");
echo(abs(0)."<br>"."<br>");

//rounds number up to
echo(ceil(0.60)."<br>");
echo(ceil(0.40)."<br>");
echo(ceil(0.50)."<br>");
echo(ceil(0.20)."<br>");
echo(ceil(-1.60)."<br>");
echo(ceil(-1.40)."<br>");
echo(ceil(-1.50)."<br>"."<br>");

//rounds number down to
echo(floor(0.60)."<br>");
echo(floor(0.40)."<br>");
echo(floor(0.50)."<br>");
echo(floor(0.20)."<br>");
echo(floor(-1.60)."<br>");
echo(floor(-1.40)."<br>");
echo(floor(-1.50)."<br>"."<br>");

//round a number nearest
echo(round(0.60)."<br>");
echo(round(0.40)."<br>");
echo(round(0.50)."<br>");
echo(round(0.20)."<br>");
echo(round(-1.60)."<br>");
echo(round(-1.40)."<br>");
echo(round(-1.50)."<br>"."<br>");


#2.power function

//power(base,exponent)
echo(pow(2,4)."<br>");
echo(pow(2,9)."<br>");
echo(pow(-2,-4)."<br>"."<br>");

//square root of no
echo(sqrt(121)."<br>");
echo(sqrt(22)."<br>");
echo(sqrt(-121)."<br>"."<br>");


#3.random number generation
echo(rand(100,1000)."<br>"."<br>");

#4. number formatting
echo(number_format("500000")."<br>");
echo(number_format("50000000",2)."<br>");
echo(number_format("5000000",2,".",","));
*/

#php operators
/*
#1.arithmetic operators

$a=5;
$b=20;
$c=8;
//addition
echo $a+$b."<br>";
//subtraction
echo $a-$b."<br>";
//multiplication
echo $a*$b."<br>";
//division
echo $b/$a."<br>";
//modulus
echo $c%$a."<br>";
//exponention
echo $b**$a."<br>"."<br>";

#2.assignment operators

//assignment
echo $a=10;
echo "<br>";
echo $b=5;
echo "<br>";
//additional assignment
echo $a+=$b;
echo "<br>";
//subtraction assi
echo $a-=$b;
echo "<br>";
//multiplication assi
echo $a*=$b;
echo "<br>";
//division assi
echo $a/=$b;
echo "<br>";
//modulus assi
echo $a%=$b;
echo "<br>";
echo "<br>";

#3.comparison operator
$a=10;
$b=4;
$c=10;

var_dump($a==$c);
echo "<br>";
var_dump($a==$b);
echo "<br>";
var_dump($a===$c);
echo "<br>";
var_dump($a===$b);
var_dump($a!=$c);
echo "<br>";
var_dump($a!=$b);
echo "<br>";
var_dump($a<>$c);
echo "<br>";
var_dump($a<>$b);
echo "<br>";
var_dump($a!==$c);
echo "<br>";
var_dump($a!==$b);
echo "<br>";
var_dump($a>$c);
echo "<br>";
var_dump($a<$c);
echo "<br>";
var_dump($a>=$c);
echo "<br>";
var_dump($a<=$c);
echo "<br>";
var_dump($c>=$a);
echo "<br>";
var_dump($c<=$a);
echo "<br>";
echo($a<=>$b)."<br>";
echo($a<=>$c)."<br>";
echo($b<=>$a)."<br>"."<br>";

#4. logical operators
$a=10;
$b=40;
//AND
if($a==10 && $b==40){
    echo "AND:a and b is true"."<br>";
}
//OR
if($a==10 || $b==40){
    echo "OR:a and b is true"."<br>";
}
if($a==10 || $b==50){
    echo "OR:a is true and b is false"."<br>";
}
if($a==8 || $b==40){
    echo "OR:a is false and b is true"."<br>";
}
if($a==8 || $b==9){
    echo "OR:a is false and b is false"."<br>";
}
//NOT
if(!($a==8)){
    echo "NOT:a is false"."<br>";
}
if(!($a==10)){
    echo "NOT:a is true"."<br>"."<br>";
}

#5 increment and decrement

//increment
$a=10;
$b=15;
//post
echo "a=".$a."<br>";
echo "a++=".$a++;
echo "<br>";
//post
echo "a=".$a."<br>";
echo "++a=".++$a;
echo "<br>";

//decrement
//post
echo "b=".$b."<br>";
echo "b--=".$b--;
echo "<br>";
//pre
echo "b=".$b."<br>";
echo "--b=".--$b;
echo "<br>"."<br>";

#6. string operator
//concatenation
$x="Dhruvi";
$y="Joshi";
echo $x.$y."<br>";
echo $x." ".$y."<br>";

//concatenation assignment
$a="hello";
$a.=" world";
echo $a."<br>";

#7.conditional(ternary) operator
$p=10;$q=12;
echo ($p>$q)?$p:$q;
echo "<br>"."<br>";

*/

#statement
/*
//1.if

$a=10;
$b=50;

if($a<$b){
    echo"a is less than b<br>";
}

//2. if-else

$a=10;
$b=50;

if($a<$b){
    echo"a is less than <br>";
}
else{
    echo"b is less than a<br>";
}

//3.if-elseif-else

$a=10;
if($a>0){
    echo"number is positive<br>";
}
elseif($a<0){
    echo"number is negative<br>";
}
else{
    echo"number is zero<br>";
}

//4.nested if statement

$a=10;
if($a>0){
    if($a>9){
        echo "a is positive 2 digit number<br>";
    }
    else{
        echo "a is positive 1 digit number<br>";
    }
}
else{
    echo "a is negative number<br>";
}

//5.switch case

$marks="70";
switch(true){
    case ($marks>90):
        echo "grade A+";
        break;
    case($marks<=90 && $marks>80):
        echo "grade A";
        break;
    case($marks<=80 && $marks>70):
        echo "grade B+";
        break;
    case($marks<=70 && $marks>60):
        echo "grade B";
        break;
    case($marks<=60 && $marks>50):
        echo "grade C+";
        break;
    case($marks<=50 && $marks>40):
        echo "grade C";
        break;
    case($marks<=45 && $marks>40):
        echo "grade D";
        break;
    case($marks<=39):
        echo"better luck next time";
        break;
    default:
        echo "AB";

}
*/

#Loop
/*
//1.for

for($i=0;$i<=10;$i++)
{
    echo $i."<br>";
}

//break
echo"break<br>";
for($i=0;$i<=10;$i++)
{
    if ($i == 3) 
    break;
    echo $i."<br>";
}

//continue
echo"continue<br>";
for($i=0;$i<=10;$i++)
{
    if ($i == 3) 
    continue;
    echo $i."<br>";
}

for ($x = 0; $x <= 100; $x+=10) {
    echo "The number is: $x <br>";
  }
//2.while

$i=1;
while($i<6){
    echo $i."<br>";
    $i++;
}

//break
echo"break<br>";
$i=1;
while($i<6){
    if($i==3)
    break;
    echo $i."<br>";
    $i++;
}
//continue
echo"continue<br>";
$i=0;
while($i<6){
    $i++;
    if($i==3)
    continue;
    echo $i."<br>";
}

//3.foreach

$color=array("red","pink","blue","yellow");
foreach($color as $x){
    echo "$x<br>";
}
echo"<br>";
$member=array("peter"=>"35","ben"=>"37","joe"=>"43");
foreach($member as $x=>$y){
    echo "$x:$y<br>";
}
echo"<br>";
$col=array("red","green","blue","yellow");
foreach($col as $x):
    echo "$x<br>";
endforeach;

*/
#array function

//1.creation and initialization


//create
$arr=array("mi","vivo","oppo");
print_r ($arr);echo"<br>";
echo $arr[0];echo"<br>";

//merge
$arr1=array("raj","riya","mira");
$arr2=array("jay","maharsh","kupa","payal");
print_r(array_merge($arr1,$arr2));echo"<br>";

//key and value
$name=array("maharsh","vivek","pari","swity");
$city=array("jamnagar","rajkot","bharuch","ahemdabad");
$detail=array_combine($name,$city);
print_r($detail);echo"<br>";

//range
$range=range(0,100,10);
print_r($range);echo"<br>";

//2.array modification


//push
$add=array("ram","krishna","shiva","dev");
$a="sita";
$b="radha";
$c="uma";
array_push($add,$a,$b,$c);
print_r($add);echo "<br>";


//pop
$remove=array("ram","krishna","shiva","dev");
array_pop($remove);
print_r($remove);
echo "<br>";

//add to beginning
$first=array(0=>"laptop",1=>"TV",2=>"AC");
array_unshift($first,"mobile");
print_r($first);echo"<br>";

//remove first
$last=array(0=>"laptop",1=>"TV",2=>"AC",3=>"mobile");
array_shift($last);
print_r($last);echo"<br>";

//remove portion and replace
$a22=array("pink","yellow","orange","green");
$a01=array("red","white","black","gray");
print_r(array_splice($a22,0,3,$a01));echo "<br>";
print_r($a22);echo "<br>";echo "<br>";


//3.array access

//count
echo count($remove);echo "<br>";
echo count($first);echo "<br>";
echo count($last);echo "<br>";

//alias count
echo sizeof($arr);echo"<br>";

//exist or not
if(array_key_exists("maharsh",$detail)){
    echo "key exists";echo "<br>";
}
else{
    echo "key not exist";echo "<br>";
}
if(array_key_exists("dhruvi",$detail)){
    echo "key exists";echo "<br>";
}
else{
    echo "key not exist";echo "<br>";
}
//return key
print_r(array_keys($detail));echo "<br>";
//return value
print_r(array_values($detail));echo"<br>";

//4.array search


//value is exist
if(in_array("rohit",$name)){
    echo "match found";echo "<br>";
}
else{
    echo "match not found";echo "<br>";
}
//search value and return key
echo array_search("bharuch",$detail);echo "<br>";
//reverse
$rev=array_reverse($last);
print_r($rev);echo "<br>";

//5.array sorting


//sort
$no=array(5,76,34,22,7,67,87,87);
sort($no);
$sort=count($no);
for($x=0;$x<$sort;$x++){
    echo $no[$x];
    echo "<br>";
}
echo "<br>";

//reverse sort
rsort($no);
$rsort=count($no);
for($x=0;$x<$rsort;$x++){
    echo $no[$x];
    echo "<br>";
}
echo "<br>";

//sort associative by value
asort($detail);
print_r($detail);echo "<br>";
foreach($detail as $x=>$x_value)
{
    echo "key=".$x." , value=".$x_value;
    echo "<br>";
}echo "<br>";

//sort associative by keys
ksort($detail);
print_r($detail);echo "<br>";
foreach($detail as $x=>$x_value)
{
    echo "key=".$x." , value=".$x_value;
    echo "<br>";
}echo "<br>";

//sort array in reverse by value
arsort($detail);
print_r($detail);echo "<br>";
foreach($detail as $x=>$x_value)
{
    echo "key=".$x." , value=".$x_value;
    echo "<br>";
}echo "<br>";

//sort array in reverse by keys
krsort($detail);
print_r($detail);echo "<br>";
foreach($detail as $x=>$x_value)
{
    echo "key=".$x." , value=".$x_value;
    echo "<br>";
}echo "<br>";


//6.array filtering

//filter using callback
function odd($var){
    return($var & 1);
}
$number=array(1,3,2,3,4);
print_r(array_filter($number,"odd"));echo "<br>";

//apply callback to each element
function same($data1,$data2){
    if($data1===$data2){
        return "same";
    }
    return "different";
}

$data1=array("ritika","shana","priya","diya");
$data2=array("rohit","jiya","priya","diya");
print_r(array_map("same",$data1,$data2));
echo "<br>";

//reduces array
function add($val1,$val2){
    return $val1+$val2;
}
$value=array(10,15,20);
print_r(array_reduce($value,"add",5));
echo "<br>";echo "<br>";
//7.array slicing
//extract portion of array
print_r(array_slice($add,0,2));echo "<br>";
print_r(array_slice($add,-3,3,true));echo "<br>";

//remove portion of array
$a22=array("pink","yellow","orange","green");
$a01=array("red","white","black","gray");
print_r(array_splice($a22,0,3,$a01));echo "<br>";
print_r($a22);echo "<br>";
?>
