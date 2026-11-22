<?php
session_start();

// টোকেন ভ্যালিড এবং মেয়াদোত্তীর্ণ না হলে আসল কনটেন্ট দেখাবে
if (
    isset($_SESSION['verified']) && 
    $_SESSION['verified'] === true && 
    isset($_SESSION['expires_at']) && 
    time() < $_SESSION['expires_at']
) {
    // এককালীন অ্যাক্সেস চাইলে নিচের লাইনটি আনকমেন্ট করুন:
    // unset($_SESSION['verified']);
    
    include __DIR__ . '/content.php';
    exit;
}

// ভেরিফাই করা না থাকলে চ্যালেঞ্জ পেজ লোড হবে
header("Location: challenge.html");
exit;
?>
