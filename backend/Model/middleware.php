<?php
 
class Middleware{
    public static function isAdmin($adminRole){
        return $adminRole==='admin';
    }
    public static function isUser($userRole){
        return $userRole==='user';
    }


}

?>