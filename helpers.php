<?php
// This will contain all the helpers function we are going to use all through the project
/**
 * Get the base path
 * 
 * @param string $path
 * @return  string
 */
function basePath($path = ''){
    // __DIR__ iS used to get the absolute path 
    return __DIR__.'/'. $path;
}