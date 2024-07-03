<?php
// Telegram user ID to send the message to
$tg_user = '1026116360';

// Telegram bot token
$bot_token = '7488111886:AAE_j5_To1sX37b2-XaLaHHG4dMBuArw8aE';

// Get form data
$name = $_POST['name'];
$phone = $_POST['phone'];

// Message text with HTML formatting
$text = "Ім'я: $name\nТелефон: $phone";

// Parameters to send to the Telegram API
$params = array(
    'chat_id' => $tg_user,
    'text' => $text,
    'parse_mode' => 'HTML',
);

// Initialize cURL session
$curl = curl_init();

// Set cURL options
curl_setopt($curl, CURLOPT_URL, 'https://api.telegram.org/bot'.$bot_token.'/sendMessage'); // Telegram API URL
curl_setopt($curl, CURLOPT_POST, true); // Send as POST request
curl_setopt($curl, CURLOPT_TIMEOUT, 10); // Timeout in seconds
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return response as string
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // Follow redirects
curl_setopt($curl, CURLOPT_POSTFIELDS, $params); // POST parameters

// Execute cURL session and capture response
$result = curl_exec($curl);

// Close cURL session
curl_close($curl);

// Output the result (optional, for debugging)
var_dump(json_decode($result));
?>
