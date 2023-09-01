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
    require_once '../src/VCL/TComputerServer.php';
    
    require_once '../src/VCL/TScreen.php';
    require_once '../src/VCL/TApplication.php';

    require_once '../src/VCL/TComponent.php';
    require_once '../src/VCL/TButton.php';
}

try {
    AutoLoader();
    //$server = new TComputerServer();
    
    //$screen = new TScreen(1024,728);
    //$app    = new TApplication($screen);
    
    
    // Set time limit to indefinite execution
    set_time_limit (0);
    
    // Set the ip and port we will listen on
    $address     = '127.0.0.1';
    $port        = 10001;
    $max_clients = 10;

    $sock = \socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    \socket_set_option($sock, SOL_SOCKET, SO_REUSEADDR,1);
    \socket_bind($sock, $address, $port) or die('Could not bind to address');
    \socket_listen($sock);

    do {
        $client = \socket_accept($sock);
        echo "ok<br>";

        \socket_write($client, "no noobs, but ill make an exception :)\n".
        "There are client(s) connected to the server\n");
            
        \socket_getpeername($client, $ip);
        echo "New client connected: {$ip}\n";
        
        $data = \socket_read($client, 1024, PHP_NORMAL_READ);
        echo $data;
        
        //break;
    } while (true);

    // close the listening socket
    \socket_close($client);
    \socket_close($sock);


    echo "<pre>";
    //print_r($app);
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
