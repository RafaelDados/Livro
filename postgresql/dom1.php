<?php
 $doc = new DOMDocument();
 $doc->load('bases.xml');
 
 $bases = $doc->getElementsByTagName("base");
// var_dump($bases);
 foreach ($bases as $base){
     print 'ID: '.$base->getAttribute('id')."<br>";
     
     $names = $base->getElementsByTagName('name');
     $hosts = $base->getElementsByTagName('host');
     $types = $base->getElementsByTagName('type');
     $users = $base->getElementsByTagName('user');
     
     $name = $names->item(0)->nodeValue;
     $host = $hosts->item(0)->nodeValue;
     $type = $types->item(0)->nodeValue;
     $user = $users->item(0)->nodeValue;
     
     print 'Name: '.$name."<br>";
     print 'Host: '.$host."<br>";
     print 'Type: '.$type."<br>";
     print 'User: '.$user."<br>";
     echo "<br>";
 }
