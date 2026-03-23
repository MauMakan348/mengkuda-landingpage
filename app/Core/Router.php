<?php

class Router {

    public static $routes = [];

    public static function get($url, $callback){
        self::$routes[$url] = $callback;
    }

    public static function run(){

        $request = $_SERVER['REQUEST_URI'];
        $request = parse_url($request, PHP_URL_PATH);

        // hapus nama folder project
        $base = '/bootstrap5';
        $request = str_replace($base, '', $request);

        if($request == ''){
            $request = '/';
        }

        if(isset(self::$routes[$request])){
            call_user_func(self::$routes[$request]);
        } else {
            echo "404 - Halaman tidak ditemukan";
        }

    }

}