<?php
require(__DIR__ . "/config.php");
require(__DIR__ . "/core/function.php");
$parsedUrl = parse_url(SSL);
$scheme = $parsedUrl['scheme']; // http
$host = $parsedUrl['host'];
$port = $parsedUrl['port']!=null && !empty( $parsedUrl['port'])?$parsedUrl['port']:'80';
echo "PHP Development Server started on http://{$host}:{$port}\n";
echo "Press Ctrl+C to stop the server\n";

// รัน PHP Built-in Server
$command = sprintf('php -S %s:%d -t ./', $host, $port);
passthru($command);
