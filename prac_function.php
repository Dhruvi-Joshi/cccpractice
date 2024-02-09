<?php
// PHP String functions

#1 string length:

$name="dhruvi";
$user="dhruvi@122";
echo strlen($name);
echo "<br>";
echo strlen($user);


#2 string replace:

$sent="good morning";
echo "<br>".$sent ."<br>";
echo str_replace('morning','afternoon',$sent);


#3 string position
echo strpos('hello world','world');

#4 sub string

$string="jay hind";
echo substr ($string,4);
echo "<br>".substr($string,4,-2);
echo "<br>".substr($string,-3,3);


#5 uppercase
echo strtoupper("php");

#6 lowercase
echo strtolower("DhruviJoshi@122");

#7 remove space

$cut="dhruvir";
$space=" dhruvi ";
echo trim($cut,"r");
echo ltrim($space);
echo rtrim($space);

#8 join array with sting

$arr=array('whatsapp','facebook','instagram');
echo implode(" ",$arr);


#9 Splits a string into an array 
$string="i love india";
print_r(explode(" ",$string));


#10 special characters to HTML entities
$str = "This is some <b>bold</b> text.";
echo $str;
echo htmlspecialchars($str);


#11 all applicable characters to HTML entities
$str1='<a href="https://www.google.co.in/">google</a>';
echo $str1;
echo htmlentities($str1);


#12 repeats string 
echo str_repeat("hi",4);

#13 reverse string
echo strrev("nice");

#14 shuffles all characters in a string
echo str_shuffle("hello world");

#15 string to an array, breaking it into smaller chunks
print_r(str_split("hello world",2));

#16 Returns the number of words in a string
echo str_word_count("most welcome");

#17 Replaces a portion of a string with another
echo substr_replace("hello students","teacher",6);

#18 Pads a string to a certain length with another string
//echo str_pad("hello",10,"*",STR_PAD_BOTH);

#19 Locale based string comparison
//echo strcoll("hi","hi");
//echo strcoll("helo","hello");
//echo strcoll("hello","helo");

#20 Finds the length of the initial segment not matching a mask
//echo strcspn("good morning","n");
//echo strcspn("good morning","n",2,8);

#21 Case-insensitive search for the first occurrence of a string.

echo stristr("my name is bob","is");
echo stristr("my name is bob","is",true);

#22 Reverses a string.
//echo strrev("new");

#23  first character of a string to uppercase
//echo ucfirst("i am a student");

#24  first character of each word in a string to uppercase
echo ucwords("i am a student");
?>


