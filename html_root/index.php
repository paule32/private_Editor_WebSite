<?php
// ----------------------------------------------------------------------------
// File   : index.php
// Author : Jens Kallup (c) 2023 non-profit Software
// License: MIT - all rights reserved.
// ----------------------------------------------------------------------------

// ----------------------------------------------------------------------------
// autoload register function
// ----------------------------------------------------------------------------
//spl_autoload_register( 'VCL_AutoLoader' );

namespace VCL;
/**                                        q
 * A autoloader function for outsourced classes
 *
 * @param string $class The fully-qualified class name.
 * @return void
 */
function AutoLoader()
{
    require_once '../src/VCL/Exceptions.php';
    
    require_once '../src/VCL/TObject.php';
    require_once '../src/VCL/TString.php';
    
    require_once '../src/VCL/TScreen.php';
    require_once '../src/VCL/TApplication.php';

    require_once '../src/VCL/TComponent.php';
    require_once '../src/VCL/TButton.php';
}

try {
    AutoLoader();
    $screen = new TScreen(1024,728);
    $app    = new TApplication($screen);
    
    echo "<pre>";
    print_r($app);
}
catch (EDivisionByZero $E) {
    echo "Error Message: " . $E->getMessage() . "<br>";
    echo "Error code: "    . §E->getCode()    . "<br>";
}
catch (EDivisionByZero $E) { echo "A divison through null Exception occur:<br>" . $E->getMessage(); }
catch (Exception $E)       { echo "A generall Exception occur:<br>"             . $E->getMessage(); }

finally {
}

?>
