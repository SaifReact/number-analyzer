<?php
function promptInput(): string {
    echo "Enter a list of numbers separated by spaces (or type 'exit' to quit): ";
    return trim(fgets(STDIN));
}

function isValidNumberList(array $numbers): bool {
    foreach ($numbers as $num) {
        if (!is_numeric($num)) {
            return false;
        }
    }
    return true;
}

function analyzeNumbers(array $numbers): void {
    $numbers = array_map('floatval', $numbers); // Convert to float for accurate analysis
    $max = max($numbers);
    $min = min($numbers);
    $sum = array_sum($numbers);
    $average = $sum / count($numbers);

    echo "\n=== Results ===\n";
    echo "Maximum: $max\n";
    echo "Minimum: $min\n";
    echo "Sum: $sum\n";
    echo "Average: " . number_format($average, 2) . "\n\n";
}

while (true) {
    $input = promptInput();

    if (strtolower($input) === 'exit') {
        echo "Exiting Number Analyzer. Goodbye!\n";
        break;
    }

    $numbers = preg_split('/\s+/', $input);

    if (!isValidNumberList($numbers)) {
        echo "Invalid input. Please enter only numbers separated by spaces.\n\n";
        continue;
    }

    analyzeNumbers($numbers);
}
