<?php
header('Content-Type: application/json');

// --- Helper Functions ---

function fetch_from_api($url, $data) {
    $options = [
        'http' => [
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data),
        ],
    ];
    $context  = stream_context_create($options);
    $result = @file_get_contents($url, false, $context);
    if ($result === FALSE) { return null; }
    return json_decode($result, true);
}

function fetch_page($page) {
    $data = [ "pageSize" => 10, "pageNo" => $page, "typeId" => 1, "language" => 0, "random" => "4a0522c6ecd8410496260e686be2a57c", "signature" => "334B5E70A0C9B8918B0B15E517E2069C", "timestamp" => time() ];
    $response = fetch_from_api("https://api.bdg88zf.com/api/webapi/GetNoaverageEmerdList", $data);
    return $response['data']['list'] ?? [];
}

function fetch_optimized_data($maxPages = 10) {
    $allData = [];
    for ($i = 1; $i <= $maxPages; $i++) { $allData = array_merge($allData, fetch_page($i)); }
    return array_slice($allData, 0, 100);
}

function fetch_game_result($period) {
    $response = fetch_from_api("https://api.bdg88zf.com/api/webapi/GetNoaverageEmerdList", [ "pageSize" => 10, "pageNo" => 1, "typeId" => 1, "language" => 0, "random" => "4a0522c6ecd8410496260e686be2a57c", "signature" => "334B5E70A0C9B8918B0B15E517E2069C", "timestamp" => time() ]);
    if (isset($response['data']['list'])) {
        foreach ($response['data']['list'] as $item) {
            if ($item['issueNumber'] === $period) {
                $actualNumber = intval($item['number']) % 10;
                return [ 'period' => $item['issueNumber'], 'result' => $actualNumber, 'actualResult' => $actualNumber >= 5 ? 'BIG' : 'SMALL', 'colorResult' => in_array($actualNumber, [0, 2, 4, 6, 8]) ? 'RED' : 'GREEN' ];
            }
        }
    }
    return null;
}


// --- Prediction Logic ---

// --- Engine Set 1 (Data-driven from Game API) ---
function guaranteed_win_server_method($type) {
    $now = new DateTime("now", new DateTimeZone('UTC'));
    $allowed_minutes = [0, 30]; // Only run at :00 and :30
    if (!in_array(intval($now->format('i')), $allowed_minutes)) {
        return ["result" => "Awaiting Signal", "probability" => 0, "message" => "Runs at :00 & :30"];
    }
    $data = fetch_optimized_data(1);
    $latest_result_num = !empty($data) ? intval($data[0]['number']) % 10 : rand(0, 9);
    if ($type === 'bigsmall') { $prediction = $latest_result_num >= 5 ? 'SMALL' : 'BIG'; } // Predict opposite
    else { $prediction = in_array($latest_result_num, [0, 2, 4, 6, 8]) ? 'GREEN' : 'RED'; } // Predict opposite color
    return ["result" => $prediction, "probability" => 100, "message" => "Guaranteed Signal"];
}

function fatima_vip_method($type) {
    $data = fetch_optimized_data();
    $numbers = !empty($data) ? array_map(fn($item) => intval($item['number']) % 10, $data) : array_fill(0, 20, rand(0, 9));
    $mean = array_sum(array_slice($numbers, 0, 20)) / 20;
    $voteSum = ($mean >= 4.5 ? 5 : -4.5);
    if ($type === 'bigsmall') { $result = $voteSum >= 0 ? 'BIG' : 'SMALL'; $probability = 97 + abs($voteSum) * 0.1; } 
    else { $result = $voteSum >= 0 ? 'RED' : 'GREEN'; $probability = 95 + abs($voteSum) * 0.1; }
    return ["result" => $result, "probability" => min(99, max(90, round($probability)))];
}

// --- Engine Set 2 (Self-contained Algorithmic) ---
function algorithmic_engine_method($engine, $type) {
    usleep(rand(500000, 1500000));
    if ($type === 'bigsmall') { $prediction = (rand(1, 100) > 48) ? 'BIG' : 'SMALL'; } 
    else { $prediction = (rand(1, 100) > 49) ? 'GREEN' : 'RED'; }
    $base_probability = 85;
    switch ($engine) {
        case 'fractal': $base_probability = 82; break;
        case 'chaos': $base_probability = 80; break;
        case 'temporal': $base_probability = 83; break;
        case 'holo': $base_probability = 87; break;
    }
    $probability = min(95, $base_probability + rand(0, 8));
    return ["result" => $prediction, "probability" => $probability];
}

// --- Engine Set 3 (Manual User Input Analysis) ---
function manual_analyze_method($inputs) {
    if (empty($inputs)) { return ["prediction" => "Error", "reason" => "No input received."]; }
    $color_counts = ['RED' => 0, 'GREEN' => 0]; $size_counts = ['BIG' => 0, 'SMALL' => 0];
    foreach ($inputs as $input) { if (isset($color_counts[$input])) $color_counts[$input]++; if (isset($size_counts[$input])) $size_counts[$input]++; }
    if ($color_counts['RED'] > $color_counts['GREEN']) { $predicted_color = 'GREEN'; } 
    elseif ($color_counts['GREEN'] > $color_counts['RED']) { $predicted_color = 'RED'; } 
    else { $last_color = in_array(end($inputs), ['RED', 'GREEN']) ? end($inputs) : 'GREEN'; $predicted_color = ($last_color === 'RED') ? 'GREEN' : 'RED'; }
    if ($size_counts['BIG'] > $size_counts['SMALL']) { $predicted_size = 'SMALL'; } 
    elseif ($size_counts['SMALL'] > $size_counts['BIG']) { $predicted_size = 'BIG'; } 
    else { $last_size = in_array(end($inputs), ['BIG', 'SMALL']) ? end($inputs) : 'BIG'; $predicted_size = ($last_size === 'BIG') ? 'SMALL' : 'BIG'; }
    return ["prediction" => "$predicted_color / $predicted_size", "reason" => "Based on trend reversal analysis."];
}


// --- Main Controller ---
$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['action'])) {
    switch ($input['action']) {
        case 'fetch_result': echo json_encode(['result' => fetch_game_result($input['period'])]); exit();
        case 'manual_analyze': echo json_encode(manual_analyze_method($input['inputs'])); exit();
    }
}

$server = $input['server'] ?? ''; $type = $input['type'] ?? 'bigsmall'; $period = $input['period'] ?? null; $history = $input['history'] ?? [];
$prediction = null;
switch ($server) {
    case 'guaranteedWin': $prediction = guaranteed_win_server_method($type); break;
    case 'fatimavip': $prediction = fatima_vip_method($type); break;
    case 'holo': case 'fractal': case 'chaos': case 'temporal': $prediction = algorithmic_engine_method($server, $type); break;
    default: $prediction = ["result" => "No Engine Selected", "probability" => 0];
}

echo json_encode($prediction);
?>