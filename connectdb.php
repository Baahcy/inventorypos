<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=pos_db','root','');
    //echo 'Connection Succeeded';

}catch(PDOExpection $f){
    echo $f->getmessage();
}
    
    
?>