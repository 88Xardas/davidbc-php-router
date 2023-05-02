<?php
namespace Davidbc\PhpRouter;

class Router
{
    public static function handle(string $method = 'GET', string $path = '/', $filename = ''){ //3* remove string from filename
        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];
        if ($currentMethod != $method){
            return false;
        }
        $root = '';
        $pattern = '#'.$root.$path.'#';
        if (preg_match($pattern, $currentUri)){ //3*
            if(is_callable($filename)){ // If the file is callable: a function, then let's call it no matter if anonymous of named function
                $filename();
            }else{ // Otherwise we require it
                require_once $filename;
                exit();
            }
            
        }
        return false;
    }

    public static function get(string $path = '/', $filename = ''){
        self::handle('GET',$path, $filename);
    }

    public static function post(string $path = '/', $filename = ''){
        self::handle('POST',$path, $filename);
    }

    public static function put(string $path = '/', $filename = ''){
        self::handle('PUT',$path, $filename);
    }

    public static function patch(string $path = '/', $filename = ''){
        self::handle('PATCH',$path, $filename);
    }

    public static function delete(string $path = '/', $filename = ''){
        self::handle('DELETE',$path, $filename);
    }

}

?>