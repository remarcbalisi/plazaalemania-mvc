<?php

class Globals{

    protected static $root_dir = "plazaalemania";
    protected static $http = "http://";
    protected static $host = "localhost";

    public static function baseUrl(){
        $root_dir = "plazaalemania";
        $http = "http://";
        $host = "localhost";
        $base_url = $http . $host . "/" . $root_dir;
        return $base_url;
    }

}

?>
