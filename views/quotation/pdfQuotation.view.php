<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');
require base_path("vendor/tecnickcom/tcpdf/examples/tcpdf_include.php");

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    public function Header() {
        // Set left margin
        $this->SetLeftMargin(15);
    
        // Logo 1 on the left side
        $image1_file = K_PATH_IMAGES . 'logo.png'; // Replace 'logo_left.png' with the actual image filename
        $this->Image($image1_file, 15, 10, 50, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    
        // Set right margin
        $this->SetRightMargin(15);
    
        // Logo 2 on the right side
        $image2_file = K_PATH_IMAGES . 'logo-right.jpg'; // Replace 'logo_right.png' with the actual image filename
        $image_width = 20; // Adjust the image width as needed
        $x_coordinate = $this->getPageWidth() - $this->rMargin - $image_width;
        $this->Image($image2_file, $x_coordinate, 10, $image_width, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    }

    // Page footer
    public function Footer() {
        // Set the width and height of the cell
        // $cellWidth = $columnWidths[0]; // Set the width according to your column width
        $cellHeight = 12; // Set the height according to your content
        $this->SetFont('', '', 8); // Set font to regular
        $this->SetDrawColor(200, 200, 200); // Set lighter color (adjust RGB values as needed)
        $this->SetTextColor(13, 71, 161);

        // Content for the cell
        $content = '<b>200 C. Raymundo Avenue, Caniogan, Pasig City 1606 Philippines
        </b>T +63 (2) 8656 6888 E info.pmc.ph ';
        $content2 = '<b>pmc.ph</b> ';

        // Output the cell with HTML-formatted content
        $this->writeHTMLCell(90, $cellHeight, '', '', $content, 'B', 0, false, true, 'L');
        $this->writeHTMLCell(90, $cellHeight, '', '', $content2, 'B', 0, false, true, 'R');
    }

    public function generateQuotation($quotation) {
        // Add a new page
        $this->AddPage('P', 'A4');
    
        // Set font
        $this->SetFont('dejavusans', '', 10);
    
        // Calculate the starting position for the second column
        $startX = ($this->getPageWidth() / 2) + 5; // Adjust the position as needed
    
        // Column 1
        $column1 = "<strong>Quotation for :</strong><br>" . 
                    ucwords($quotation['customer_name']) . "<br>" .
                    ucwords($quotation['customer_address_line_1']) . "<br>" .
                    ucwords($quotation['customer_address_line_2']) . "<br>" .
                    ucwords($quotation['customer_city']) . ", " . ucwords($quotation['customer_province']) . "<br><br>" .
                   "<strong>" .ucwords($quotation['customer_contact_person']) . "</strong><br>" .
                   ucwords($quotation['customer_position']) . "<br>" .
                   $quotation['customer_email'] . "<br>";
    
        // Column 2
        $on = $quotation['updated_at'] != NULL ? date('m-d-Y',strtotime($quotation['updated_at'])) : date('m-d-Y');
        $expires = date('m-d-Y',strtotime($quotation['expired_at'])) ?? date('m-d-Y', strtotime(date('Y-m-d'). " + 7 days"));
        // dd($expires);
        $column2 = "<strong>Quotation</strong><br>" .
                   "<strong>" . $quotation['control_no'] . "</strong><br>" .
                   "<strong>Quote created by :</strong><br>" .
                   $quotation['created_by'] . "<br>" .
                   $quotation['sales_email'] . "<br>" .
                   $quotation['sales_phone'] . "<br><br>" .
                   "<strong>On :</strong> " . $on . "<br>" .
                   "<strong>Expires :</strong> " . $expires . "<br>";
    
        // Output columns
        
        $this->SetXY(15, 30); // Set cursor to new position for second column
        $this->writeHTMLCell(($this->getPageWidth() / 2) - 10, 10, '', '', $column1, 0, 1, false, true, 'L', true);
        $this->writeHTMLCell(
            ($this->getPageWidth() / 2) - 10, // Width
            15, // Height
            '', // X position
            '', // Y position
            '<strong style="font-size: 16px;">Products</strong>', // HTML content
            0, // Border
            1, // Ln (0: next cell at the same line, 1: new line)
            false, // Fill
            true, // Reseth (reset cell border settings)
            'L', // Align
            true, // Autowidth
            '', // valign
            true, // ishtml
            5, // Cell margin (top, right, bottom, left)
            5, // Left margin
            true // Auto page break
        );
        $this->SetXY($startX, 27); // Set cursor to new position for second column
        $this->writeHTMLCell(($this->getPageWidth() / 2) - 18, 10, '', '', $column2, 0, 1, false, true, 'R', true); // 'R' specifies right alignment
        
    }

    public function generateQuotationFooter($quotation, $company) {
    
        // Set font
        $this->SetFont('dejavusans', '', 10);
    
        $labelHeader = "<strong>Terms & Conditions:</strong>";
        // Column 1
        $column1 =  $quotation['vat'] . "<br>".
                    "We reserve the right to modify the quotation if apparent errors were made in the process. <br>" . 
                    "Prices are subject to change without prior notice, even prior to the expiry indicated above. <br>" .
                    "Prices are NET of all discounts including Senior Citizen Discount (SCD) / Persons with Disability (PWD), etc. <br>" .
                    "No approved, signed Purchase Order received, no processing or delivery will be made. <br>" . 
                    "Items are subject to availability at the time of receipt of Purchase Order. <br>" .
                    "We reserve the right not to accept or process orders below P5,000.00. <br>";

        $labelHeader2 = "<strong>Validity</strong>";
        $column2 = $quotation['validity'] . "days<br>";
        $labelHeader3 = "<strong>Delivery</strong>";
        $column3 = $quotation['delivery'] . "<br>";
        $labelHeader4 = "<strong>Questions? Contact me</strong>";
        $column4 =  $quotation['created_by'] . "<br>" .
                    $quotation['sales_email'] . "<br>" .
                    $quotation['sales_phone'];
        $labelHeader5 = "<strong>Or contact the company</strong>";
        $column5 =  $company['name'] . "<br>" .
                    $company['address_line_1'] . $company['address_line_2'] . "<br>" .
                    $company['city'] . ", " . $company['province'] . "<br>" .
                    $company['email'] . "<br>" .
                    $company['tel_no'] . "<br>" .
                    $company['mobile_no'];

        // $this->SetXY(15, 30); // Set cursor to new position for second column
        $this->writeHTMLCell($this->getPageWidth(), 6, '', '', $labelHeader, 0, 1, false, true, 'L', true);
        // Set font
        $this->SetFont('dejavusans', '', 8);
        $this->writeHTMLCell($this->getPageWidth(), 6, '', '', $column1, 0, 1, false, true, 'L', true);
        // Set font
        $this->SetFont('dejavusans', '', 10);
        $this->writeHTMLCell($this->getPageWidth(), 6, '', '', $labelHeader2, 0, 1, false, true, 'L', true);
        $this->writeHTMLCell($this->getPageWidth(), 6, '', '', $column2, 0, 1, false, true, 'L', true);
        $this->writeHTMLCell($this->getPageWidth(), 6, '', '', $labelHeader3, 0, 1, false, true, 'L', true);
        $this->writeHTMLCell($this->getPageWidth(), 6, '', '', $column3, 0, 1, false, true, 'L', true);
        $this->writeHTMLCell($this->getPageWidth(), 6, '', '', $labelHeader4, 0, 1, false, true, 'L', true);
        $this->writeHTMLCell($this->getPageWidth(), 6, '', '', $column4, 0, 1, false, true, 'L', true);
        $this->writeHTMLCell($this->getPageWidth(), 6, '', '', $labelHeader5, 0, 1, false, true, 'L', true);
        $this->writeHTMLCell($this->getPageWidth(), 6, '', '', $column5, 0, 1, false, true, 'L', true);
        
    }

    public function generateInvoice($products, $grand_total) {
        // Add a new page
        // $this->AddPage();
        $this->SetY(70);
    
        // Set font
        $this->SetFont('dejavusans', '', 10);
    
        // Header of the table
        $header = array('Item', 'Quantity', 'UOM', 'Catalog Price', 'Quote Price', 'Discount (%)', 'Total');
    
        // Set table column widths
        $columnWidths = array(50, 15, 15, 25, 25, 25, 25);
    
        // Set table header style
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(0);
        $this->SetDrawColor(0);
        $this->SetLineWidth(0.1);
        $this->SetFont('', 'B', 8);
        $this->MultiCell(0, 10, '', 0, 'L', 1);
    
        // Add table header
        $this->Cell($columnWidths[0], 10, $header[0], 'B', 0, '', 1);
        $this->Cell($columnWidths[1], 10, $header[1], 'B', 0, 'C', 1);
        $this->Cell($columnWidths[2], 10, $header[2], 'B', 0, 'C', 1);
        $this->Cell($columnWidths[3], 10, $header[3], 'B', 0, 'C', 1);
        $this->Cell($columnWidths[4], 10, $header[4], 'B', 0, 'C', 1);
        $this->Cell($columnWidths[5], 10, $header[5], 'B', 0, 'C', 1);
        $this->Cell($columnWidths[6], 10, $header[6], 'B', 1, 'R', 1);
        $this->Ln(4); // Move to the next line to create a gap
    
        // Set table row style
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(0);
        $this->SetFont('');
    
        // Add table rows
        foreach ($products as $product) {
            // Set the width and height of the cell
            $cellWidth = $columnWidths[0]; // Set the width according to your column width
            $cellHeight = 18; // Set the height according to your content
            $this->SetFont('dejavusans', '', 8); // Set font to regular
            $this->SetDrawColor(200, 200, 200); // Set lighter color (adjust RGB values as needed)

            // Content for the cell
            $content = '<b>' . $product['description'] . '</b>' . "<br>". $product['code'] ."<br>" . $product['comment'] ?? '';

            // Output the cell with HTML-formatted content
            $this->writeHTMLCell($cellWidth, $cellHeight, '', '', $content, 'B', 0, false, true, 'L');
            
            $this->SetFont('dejavusans', '', 8); // Set font to regular
            $this->Cell($columnWidths[1], 18, $product['quantity'], 'B', 0, 'C', false);
            $this->Cell($columnWidths[2], 18, $product['uom'], 'B', 0, 'C', false);
            $this->Cell($columnWidths[3], 18, "₱" . number_format($product['wo_scd_price'], 2), 'B', 0, 'C', false);
            $this->Cell($columnWidths[4], 18, "₱" . number_format($product['proposed_price'], 2), 'B', 0, 'C', false);
            
            // Content for the cell
            $discount = "₱" . number_format($product['wo_scd_price'] - $product['proposed_price'], 2) .
            "<br>(" . number_format(($product['wo_scd_price'] - $product['proposed_price']) / $product['wo_scd_price'] * 100 , 2) . "%)";

            // Output the cell with HTML-formatted content
            $this->writeHTMLCell($columnWidths[5], 18, '', '', $discount, 'B', 0, false, true, 'C', 'M');
            $this->Cell($columnWidths[6], 18, "₱" . number_format($product['total'], 2), 'B', 1, 'R', false);
            $this->Ln(4); // Move to the next line to create a gap
        }
    
        $this->SetDrawColor(0);
        // Output the total
        $this->Cell($columnWidths[0], 12, '', 'B', 0, 'L', 1);
        $this->Cell($columnWidths[1], 12, '', 'B', 0, 'L', 1);
        $this->Cell($columnWidths[2], 12, '', 'B', 0, 'C', 1);
        $this->Cell($columnWidths[3], 12, '', 'B', 0, 'C', 1);
        $this->Cell($columnWidths[4], 12, '', 'B', 0, 'C', 1);
        
        $this->SetFont('', 'B', 10); // Set font to regular
        $this->Cell($columnWidths[5], 12, 'Total', 'B', 0, 'C', 1);
        $this->Cell($columnWidths[6], 12, "₱" . number_format($grand_total, 2), 'B', 1, 'R', 1);
        $this->Ln(4); // Move to the next line to create a gap
    }
    
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('E-Jhay Bumacod');
$pdf->setTitle('Pmc Quotation');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, quotation, invoice, guide');

// set default header data
// $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
// $pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
// $pdf->AddPage();
// Generate invoice
$pdf->generateQuotation($quotation);
$pdf->generateInvoice($products, $grand_total);
$pdf->generateQuotationFooter($quotation, $company);

// Output PDF
$pdf->Output('pmc-quotation.pdf', 'I');