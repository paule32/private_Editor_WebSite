<?php
// ----------------------------------------------------------------------------
// File   : index.php
// Author : Jens Kallup (c) 2023 non-profit Software
// License: MIT - all rights reserved.
// ----------------------------------------------------------------------------

// ----------------------------------------------------------------------------
// autoload register function
// ----------------------------------------------------------------------------
spl_autoload_register( 'VCL_AutoLoader' );

/**
 * A autoloader function for outsourced classes
 *
 * @param string $class The fully-qualified class name.
 * @return void
 */
function VCL_AutoLoader($class) {
    $class_path = str_replace('\\', '/', $class);
    
    $file = __DIR__ . '/src/' . $class_path . '.php';
    echo $file . '<br>';
    
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
}

//$tst = new \VCL\TObject();

?>