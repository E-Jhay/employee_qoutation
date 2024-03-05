<?php

use Core\PDFGenerator;

// dd('PDF');
// $action = $_POST['action'];
// $file = $_POST['file'];
// Get the HTML content sent from the client
$htmlContent = $_POST['htmlContent'];

// Example usage:
$pdfGenerator = new PDFGenerator();

// $htmlContent = file_get_contents('../views/mail/disapprovedQoutation.html');

// $content = '<h1>Hello, World!</h1><p>This is a sample PDF document.</p>';
$pdfGenerator->addContent($htmlContent);

// Save the PDF to a file
// $pdfGenerator->saveToFile('generated_pdf.pdf');

// Output the PDF to the browser
$pdfContent = $pdfGenerator->outputToBrowser('generated_pdf.pdf');// Return the PDF content
// header('Content-Type: application/pdf');
// header('Content-Disposition: inline; filename=example.pdf');
// echo $pdfContent;