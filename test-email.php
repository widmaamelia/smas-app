<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    \Illuminate\Support\Facades\Mail::raw('Test Email', function($m) {
        $m->to('labpnp8@gmail.com')->subject('Test Email');
    });
    echo "✅ Email terkirim!\n";
} catch (\Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "Code: " . $e->getCode() . "\n";
    echo "\nStack Trace:\n" . $e->getTraceAsString();
}
