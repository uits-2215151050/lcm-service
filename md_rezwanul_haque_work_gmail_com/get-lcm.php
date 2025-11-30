<?php
// Set content type to plain text
header('Content-Type: text/plain');

// Get parameters from query string
$x = $_GET['x'] ?? null;
$y = $_GET['y'] ?? null;

// Validate that both parameters are set and are non-negative integers
if (!is_numeric($x) || !is_numeric($y) || 
    $x < 0 || $y < 0 || 
    $x != (int)$x || $y != (int)$y) {
    echo "NaN";
    exit;
}

// Convert to integers
$x = (int)$x;
$y = (int)$y;

// Calculate LCM using the formula: LCM(a,b) = |a*b| / GCD(a,b)
function gcd($a, $b) {
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

if ($x == 0 && $y == 0) {
    $lcm = 0;
} else {
    $gcd = gcd($x, $y);
    $lcm = abs($x * $y) / $gcd;
}

// Output result as plain string
echo (string)$lcm;
?>