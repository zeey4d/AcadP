<?php
namespace core\Middleware ;
class Registered {
    public function handle(){
        if( (!$_SESSION['user']) ?? false){
            header('location:/');
            exit();
        }
    }

}