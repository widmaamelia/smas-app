<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\Password;
use App\Models\User;

$user = User::find(1);
echo "User: {$user->name} ({$user->email})\n";
echo "APP_URL: " . env('APP_URL') . "\n\n";

// Generate reset token
$token = app('auth.password.broker')->createToken($user);
echo "Reset Token: " . substr($token, 0, 20) . "...\n";

// Generate reset link
$resetLink = Password::createUrlUsing(null);
$link = url(route('password.reset', [
    'token' => $token,
    'email' => $user->email,
], false));

echo "Reset Link:\n$link\n\n";

// Send email
try {
    $response = Password::sendResetLink(['email' => $user->email]);
    echo "✅ Email Terkirim: $response\n";
} catch (\Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
