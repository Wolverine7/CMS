<?php 

    setcookie('flavor', 'chocolate chip');


    if(isset($_COOKIE['flavor'])){
        print "You ate a {$_COOKIE['flavor']} cookie.";
    }

foreach($_COOKIE as $cookie_name => $cookie_value){
    print "$cookie_name = $cookie_value <br />";
}
?>