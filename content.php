<?php
// সরাসরি ফাইল রান করা আটকানোর অতিরিক্ত নিরাপত্তা
if (basename($_SERVER['PHP_SELF']) === 'content.php') {
    http_response_code(403);
    exit('Direct access forbidden.');
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>মূল পেজ</title>
</head>
<body>
    <h1>স্বাগতম! আপনার ভেরিফিকেশন সফল হয়েছে।</h1>
    <p>এখানে আপনার আসল HTML কনটেন্ট বসান।</p>
</body>
</html>
