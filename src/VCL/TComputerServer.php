<?php
// ----------------------------------------------------------------------------
// File   : TComputerServer.php
// Author : Jens Kallup (c) 2023 non-profit Software
// License: MIT - all rights reserved.
// ----------------------------------------------------------------------------

// ----------------------------------------------------------------------------
// The VCL namespace implements an WebSocket Server. You must start the Server
// under the Console/Terminal to work with it.
// ----------------------------------------------------------------------------
namespace VCL {
    error_reporting(E_ALL);

    // wait for incoming connection request's
    set_time_limit(0);

    // set visible output on
    ob_implicit_flush();

    class TComputerServer extends TObject
    {
        // ----------------------------------------------
        // @brief This is the constructor of TComputer
        // ----------------------------------------------
        public function __construct()
        {
            $address = '127.0.0.1';
            $port    = 10000;
            
            if (($sock = \socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
                echo "socket_create() fehlgeschlagen: Grund: " .
                \socket_strerror(\socket_last_error()) .
                "\n";
            }
            
            if (\socket_bind($sock, $address, $port) === false) {
                echo "socket_bind() fehlgeschlagen: Grund: " .
                \socket_strerror(\socket_last_error($sock)) .
                "\n";
            }
            
            if (socket_listen($sock, 5) === false) {
                echo "socket_listen() fehlgeschlagen: Grund: " .
                \socket_strerror(\socket_last_error($sock)) .
                "\n";
            }
            
            while (true)
            {
                if (($msgsock = socket_accept($sock)) === false) {
                    echo "socket_accept() fehlgeschlagen: Grund: " .
                    \socket_strerror(\socket_last_error($sock)) .
                    "\n";
                    break;
                }
                
                /* Anweisungen senden. */
                $msg = "\nWillkommen auf dem PHP-Testserver.  \n" .
                "Um zu beenden, geben Sie 'quit' ein. Um den Server herunterzufahren, geben Sie 'shutdown' ein.\n";
                \socket_write($msgsock, $msg, strlen($msg));

                while (true)
                {
                    if (false === ($buf = socket_read($msgsock, 2048, PHP_NORMAL_READ))) {
                        echo "socket_read() fehlgeschlagen: Grund: " .
                        \socket_strerror(\socket_last_error($msgsock)) .
                        "\n";
                        break 2;
                    }
                    if (!$buf = trim ($buf)) {
                        continue;
                    }
                    if ($buf == 'quit') {
                        break;
                    }
                    if ($buf == 'shutdown') {
                        socket_close ($msgsock);
                        break 2;
                    }
                    $talkback = "PHP: Sie haben '$buf' eingegeben.\n";
                    \socket_write ($msgsock, $talkback, \strlen($talkback));
                    echo ">$buf\n";
                }
                socket_close($msgsock);
            }   socket_close($sock);
        }
    }
}   // namespace: VCL
