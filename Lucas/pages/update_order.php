<?php
// Session
session_start();
require_once '../class/classMenu.php';

// Hardcoded for testing, replace with $_SESSION['klant_id'] when login is done
$customerId = 2;

// Get data from request
$data = json_decode(file_get_contents('php://input'), true);
$itemId = (int)($data['item_id'] ?? 0);
$aantal = (int)($data['aantal'] ?? 0);

// Update order
$cart = new ShoppingCart();
$cart->deleteAllOfItem($customerId, $itemId);

// Re-add item the correct number of times
for ($i = 0; $i < $aantal; $i++) {
    $cart->addToOrder($customerId, $itemId);
}

header('Content-Type: application/json');
echo json_encode(['success' => true]);