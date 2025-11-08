<?php
// ===================================================
//      MYSTIC JEWEL - TELEGRAM BOT CONTROLLER
// ===================================================

// --- CONFIGURATION ---
// Paste your Bot's API Token from BotFather here
define('BOT_TOKEN', 'YOUR_BOT_TOKEN_HERE');

// The full URL to your existing api.php file
define('API_URL', 'https://yourwebsite.com/api.php');

// Telegram API base URL
define('TELEGRAM_API', 'https://api.telegram.org/bot' . BOT_TOKEN . '/');


// --- HELPER FUNCTIONS ---

// Function to send a request to your prediction API
function getPrediction($server, $type) {
    $postData = json_encode([
        'server' => $server,
        'type' => $type
    ]);

    $opts = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => $postData
        ]
    ];

    $context = stream_context_create($opts);
    $result = @file_get_contents(API_URL, false, $context);

    if ($result === FALSE) {
        return null;
    }
    return json_decode($result, true);
}

// Function to send a message back to the user in Telegram
function sendMessage($chatId, $text, $keyboard = null) {
    $data = [
        'chat_id' => $chatId,
        'text' => $text,
        'parse_mode' => 'Markdown'
    ];
    if ($keyboard) {
        $data['reply_markup'] = json_encode($keyboard);
    }
    file_get_contents(TELEGRAM_API . "sendMessage?" . http_build_query($data));
}

// Function to edit a message (e.g., after a button is clicked)
function editMessage($chatId, $messageId, $text, $keyboard = null) {
    $data = [
        'chat_id' => $chatId,
        'message_id' => $messageId,
        'text' => $text,
        'parse_mode' => 'Markdown'
    ];
    if ($keyboard) {
        $data['reply_markup'] = json_encode($keyboard);
    }
    file_get_contents(TELEGRAM_API . "editMessageText?" . http_build_query($data));
}


// --- MAIN BOT LOGIC ---

// Get the update from Telegram
$update = json_decode(file_get_contents('php://input'), true);

if (isset($update['message'])) {
    $message = $update['message'];
    $chatId = $message['chat']['id'];
    $text = $message['text'];

    if ($text === '/start') {
        $welcomeMessage = "💎 *Welcome to the Mystic Jewel Predictor Bot!* 💎\n\n";
        $welcomeMessage .= "Get exclusive, real-time predictions right here in Telegram.\n\n";
        $welcomeMessage .= "Use the /predict command to start a new prediction.";
        sendMessage($chatId, $welcomeMessage);
    } 
    elseif ($text === '/predict') {
        $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => '🔴 RED / GREEN 🟢', 'callback_data' => 'type_redgreen'],
                    ['text' => '🔼 BIG / SMALL 🔽', 'callback_data' => 'type_bigsmall']
                ]
            ]
        ];
        sendMessage($chatId, "Please select the game type:", $keyboard);
    }
} 
elseif (isset($update['callback_query'])) {
    $callbackQuery = $update['callback_query'];
    $chatId = $callbackQuery['message']['chat']['id'];
    $messageId = $callbackQuery['message']['message_id'];
    $data = $callbackQuery['data'];

    // Data format is "action_value" or "action_value1_value2"
    $parts = explode('_', $data);
    $action = $parts[0];

    if ($action === 'type') {
        $gameType = $parts[1];
        $keyboard = [
            'inline_keyboard' => [
                [['text' => 'FatimaMods VIP', 'callback_data' => "server_fatimavip_{$gameType}"]],
                [['text' => 'Guaranteed Win', 'callback_data' => "server_guaranteedWin_{$gameType}"]],
                [['text' => 'Holographic Engine', 'callback_data' => "server_holo_{$gameType}"]],
                [['text' => 'Fractal Analysis', 'callback_data' => "server_fractal_{$gameType}"]],
                [['text' => 'Chaos Theory', 'callback_data' => "server_chaos_{$gameType}"]],
                [['text' => 'Temporal Shift', 'callback_data' => "server_temporal_{$gameType}"]],
            ]
        ];
        editMessage($chatId, $messageId, "Great! Now select a prediction server:", $keyboard);
    }
    elseif ($action === 'server') {
        $server = $parts[1];
        $type = $parts[2];
        
        // Show a "loading" message
        editMessage($chatId, $messageId, "🔮 Accessing the *{$server}* engine... Please wait.");
        
        // Get the prediction from your api.php
        $predictionData = getPrediction($server, $type);
        
        if ($predictionData) {
            $result = $predictionData['result'];
            $probability = $predictionData['probability'];
            $message = $predictionData['message'] ?? 'High Confidence';
            
            $responseText = "✅ *Prediction Ready!*\n\n";
            $responseText .= "Engine: *{$server}*\n";
            $responseText .= "Game Type: *{$type}*\n\n";
            $responseText .= "➡️ Prediction: *{$result}*\n";
            $responseText .= "📈 Confidence: *{$probability}%*\n";
            if($message) {
                 $responseText .= "ℹ️ Note: *{$message}*\n\n";
            }
            $responseText .= "Good luck! Use /predict for a new one.";

        } else {
            $responseText = "❌ *Error*\n\nCould not fetch prediction. The server might be busy. Please try again in a moment.";
        }
        
        // Send the final result by editing the "loading" message
        editMessage($chatId, $messageId, $responseText);
    }
}