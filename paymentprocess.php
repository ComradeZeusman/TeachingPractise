<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Function to format a monetary value as X,XXX,XXX.XX
    function formatMonetaryValue($value) {
        $value = str_replace(',', '', $value); // Remove commas
        $value = number_format(floatval($value), 2, '.', ''); // Format as X,XXX,XXX.XX
        return $value;
    }

    // Function to extract a specific format of a monetary value
    function extractMonetaryValue($text, $format) {
        $pattern = '/' . preg_quote($format, '/') . '\s*(\d+(?:,\d{3})*(?:\.\d{2})?)/';
        $matches = [];
        if (preg_match_all($pattern, $text, $matches)) {
            $values = $matches[1];
            return $values;
        }
        return [];
    }

    // Get the extracted text from the POST request
    $extractedText = $_POST['extractedText'];

    // Format the text and extract MWK 300,000 values
    $formattedText = formatMonetaryValue($extractedText);
    $mwkValues = extractMonetaryValue($formattedText, 'MWK 300,000');

    //echo formatted text
    echo 'Formatted Text: ' . $formattedText . '<br>';


    if (!empty($mwkValues)) {
        foreach ($mwkValues as $value) {
            echo 'MWK 300,000 Value: ' . $value . '<br>';
        }
    } else {
        echo 'MWK 300,000 Value: Not Found<br>';
    }
} else {
    echo 'Invalid request method';
}
?>
