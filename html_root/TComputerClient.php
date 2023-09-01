<?php
// ----------------------------------------------------------------------------
// File   : TComputerServer.php
// Author : Jens Kallup (c) 2023 non-profit Software
// License: MIT - all rights reserved.
// ----------------------------------------------------------------------------

// ----------------------------------------------------------------------------
//namespace VCL {
    error_reporting(E_ALL);

echo "<h2>TCP/IP-Verbindung</h2>\n";

$service_port = '10000';
$address = '127.0.0.1';

/* Einen TCP/IP-Socket erzeugen. */
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    echo "socket_create() fehlgeschlagen: Grund: " . socket_strerror(socket_last_error()) . "\n";
} else {
    echo "OK.\n";
}

echo "Versuche, zu '$address' auf Port '$service_port' zu verbinden ...";
$result = socket_connect($socket, $address, $service_port);
if ($result === false) {
    echo "socket_connect() fehlgeschlagen.\nGrund: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
} else {
    echo "OK.\n";
}

$waitForServer = false;

while (true)
{
    //if ($waitForServer == false)
    {
        $in = "HEAD / HTTP/1.1\r\n";
        $in .= "Host: www.example.com\r\n";
        $in .= "Connection: Close\r\n\r\n";
        $out = '';

        echo "HTTP HEAD request senden ...";
        @socket_write($socket, $in, strlen($in));
        echo "OK.\n";

        echo "Serverantwort lesen:\n\n";
        $out = @socket_read($socket, 2048);
        echo $out;
        break;
        $waitForServer = true;
    }
}

echo "Socket schließen ...";
socket_close($socket);
echo "OK.\n\n";

?>