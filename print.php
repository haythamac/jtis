<?php
require_once('tcpdf/tcpdf.php'); // Include the TCPDF library

// Get the score and other details from the session
session_start();
$score = isset($_SESSION['score']) ? $_SESSION['score'] : 0;
$correct_answers = isset($_SESSION['correct_answers']) ? $_SESSION['correct_answers'] : array();
$questions = isset($_SESSION['questions']) ? $_SESSION['questions'] : array();
$attempts = isset($_SESSION['attempts']) ? $_SESSION['attempts'] : array();

// Create a new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information and metadata
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Test Results');
$pdf->SetSubject('Results of the test taken on ' . date('Y-m-d'));

// Add a new page
$pdf->AddPage();

// Define the HTML content
$html = "<h1>Test Results</h1>";
$html .= "<p><b>Your Score:</b> $score</p>";
$html .= "<table border='1'>";
$html .= "<tr><th>Question</th><th>Attempt</th><th>Correct Answer</th></tr>";

foreach ($questions as $key => $question) {
    $attempt = isset($attempts[$key]) ? $attempts[$key] : '';
    $correct_answer = isset($correct_answers[$key]) ? $correct_answers[$key] : '';
    $html .= "<tr><td>$question</td><td>$attempt</td><td>$correct_answer</td></tr>";
}

$html .= "</table>";

// Write the HTML content to the PDF document
$pdf->writeHTML($html, true, false, true, false, '');

// Output the PDF document to the browser or save it to a file
$pdf->Output('test_results.pdf', 'I');
?>