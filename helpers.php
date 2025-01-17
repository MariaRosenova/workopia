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

function loadView($name, $data = [])
{
    $viewPath = basePath("views/{$name}.view.php");
    extract($data);

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

/**
 * Inspect a value(s)
 * @param string $value
 * @return void  
 */

function inspect($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}


/**
 * Inspect a value(s) and die 
 * @param string $value
 * @return void  
 */

function inspectAndDie($value)
{
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}
