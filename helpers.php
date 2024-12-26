<?php

/** 
 *  Get the base path
 * @param string $path
 * @return string
 */

function basePath($path = '')
{
    return __DIR__ . ($path ? DIRECTORY_SEPARATOR . $path : $path);
}

/**
 * Load a view
 * @param string $name
 * @return void  
 */

function loadView($name)
{
    $viewPath = basePath("views/{$name}.view.php");
    if (!file_exists($viewPath)) {
        throw new Exception("View {$name} not found at {$viewPath}");
    }
    require $viewPath;
}


/**
 * Load a partial
 * @param string $name
 * @return void  
 */

function loadPartial($name)
{
    $partialPath = basePath("views/partials/{$name}.php");
    if (!file_exists($partialPath)) {
        throw new Exception("Partial {$name} not found at {$partialPath}");
    }
    require  $partialPath;
}
