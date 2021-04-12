<?php
  $server = "localhost";
  $user = "root";
  $password = "";
  $database = "aaabashon";

  $connect = mysqli_connect($server, $user, $password, $database);

  if (!$connect) {
    die("তথ্য সংরক্ষণাগার খুলতে পারছি না। <br> কারণ: " . mysqli_connect_error());
  }
  
  class BanglaConverter {
    public static $bn = array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারি", "ফেব্রুয়ারি", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টেম্বর", "অক্টোবর", "নভেম্বর", "ডিসেম্বর");
    public static $en = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
    
    
    public static function en2bn($number) {
        return str_replace(self::$en, self::$bn, $number);
    }
  }

?>