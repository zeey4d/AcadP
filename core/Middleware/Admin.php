<?php
namespace core\Middleware ;
class Admin {
    public function handle(){
        if(($_SESSION['user']['type'] == ("admin") ?? false)){
            header('location:/');
            exit();
        }
    }

}