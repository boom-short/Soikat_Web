<?php
session_start();
header('Content-Type: application/json');

// শুধুমাত্র POST রিকোয়েস্ট গ্রহণ করবে
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method Not Allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

// চ্যালেঞ্জ উত্তর যাচাই (7 * 5 + 3 = 38)
if (isset($input['answer']) && (int)$input['answer'] === 38) {
    $_SESSION['verified'] = true;
    $_SESSION['token'] = bin2hex(random_bytes(16));
    $_SESSION['expires_at'] = time() + 600; // ১০ মিনিট (৬০০ সেকেন্ড) মেয়াদ থাকবে

    echo json_encode(['status' => 'ok']);
} else {
    http_response_code(403);
    echo json_encode(['status' => 'error', 'message' => 'Invalid challenge']);
}
?>
