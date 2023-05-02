<?php

// Every change restart the server on the terminal within this folder: php -S localhost:8000 
// Then go to: http://localhost:8000/test

// Project:
// We want to create a package
// 1) Idea, 2) Write code, 3) Prepare the package, 4) Publish

// 1) We want something like this:
// Router::handle('methodtype', 'path', 'filename');

// We also want it to work like this
// Router::get('path', 'filename');

// 3* Also: 
// Router::get('path', function(){
//     echo "hello world";
// })

// We will copy the router.php we developed from 15-1EX and change the root variable to '' 
// We will also copy here the .htaccess file and modify its root directory to /
// Because we won't use XAMPP to serve our files, we will start the server directly from this folder
// Let's require our router: 

//require_once "./router.php"; CHANGED TO:
require 'src/router.php';

//echo "we are in index.php" . PHP_EOL;

//Router::handle("GET",'test','test.php');

// Instead of using XAMPP we are going to use the PHP server FROM THIS FOLDER (C:\xampp\htdocs\php_course\19-1EXCreatePkgAndPublish): php -S localhost:8000  
// Go to browser: http://localhost:8000/ and http://localhost:8000/test it works

// Now we are going to add more functionality to our router.php
// We just added our ::get method, let's try it: remember to restart the php server

//Router::get('test','test.php');

// Let's add the other methods as well: POST, PUT, PATCH & DELETE
// Ok now the idea (3* on line 13) is to make it work not only with files but with anonymous functions as well

/*Router::get('/test', function(){
    echo "I'm in the function";
});*/

// It gives an error, let's fix it on router.php lines marked with 3* (lines 6 and 14-20) and try it again:

// Router::get('/test', function(){
//     echo "I'm in the function";
// });

// Now it works but we want to be sure it also works with named functions


function testMe(){
    echo "named functions work as well";
}

//Router::get('/test', 'testMe'); // ERROR: Failed to open stream: No such file or directory


// Let's fix it as well on router.php line 15 we go from:
// if($filename instanceof Closure){ //If the file is actually an anonymous function then let's call it
// To: if(is_callable($filename)){ // If the file is callable: a function, then let's call it no matter if anonymous of named function

// Let's try again:
//Router::get('/test', 'testMe'); // Now it works

Davidbc\PhpRouter\Router::get('test','test.php');

// ------------------------------------------//
// Ok now we want to prepare the code and publish it
// We want to create a package it's kind of a good idea to put your files in this kind of structure:
// /src             folder for main files
// /tests           folder for tests
// composer.json    
// readme
// license

// Within this folder (C:\xampp\htdocs\php_course\19-1EXCreatePkgAndPublish) we run: composer init
// It asks what you want to name this package: davidbc/php-router
// Description: this is a simple router built during the php course
// Author: David Bocanegra
// Minimum stability: dev
// Package type: skip (enter)
// License: MIT
// Define your dependencies (require) interactively?: yes
// Search for a package: php
// Enter the version to require: ^7.3
// Search for a package: skip (enter)
// Would you like to define your dev dependencies interactively: skip (enter)
// Search for a package: skip (enter)
// Add PSR-4 autoload mapping? Yes (just hit enter)
// Do you confirm generation? Yes (enter)
// Would you like to install dependencies now? no

// It replies with:
// PSR-4 autoloading configured. Use "namespace Davidbc\PhpRouter;" in src/
// Include the Composer autoloader with: require 'vendor/autoload.php';

// We are going to move the router.php into the src/ folder and add to router.php at the start: namespace Davidbc\PhpRouter

// Now we type in the terminal: git push origin master

?>