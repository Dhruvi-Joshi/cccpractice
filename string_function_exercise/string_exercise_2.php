<?php
$text="Hello,World!How are you doing?";

#1
echo strlen($text);
echo "<br>";
#2
echo strtolower($text);
echo "<br>";
#3
echo strtoupper($text);
echo "<br>";
#4
echo str_replace("How are you doing?","Fine,thank you!",$text);
echo "<br>";
#5
echo substr($text,0,10);
echo "<br>";
#6
echo substr($text,8);

?>