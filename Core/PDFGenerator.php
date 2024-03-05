<?php

namespace Core;

use TCPDF;

class PDFGenerator
{
    private $pdf;

    public function __construct()
    {
        $this->pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
        $this->pdf->SetCreator('PMC');
        $this->pdf->SetAuthor('PMC');
        $this->pdf->SetTitle('Generated PDF');
        // $this->pdf->SetHeaderData('', 0, 'Generated PDF', 'Header');
        // $this->pdf->SetFooterData('', 0, 'Footer', 'Page {PAGENO}');
        $this->pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $this->pdf->SetMargins(10, 10, 10);
        $this->pdf->SetAutoPageBreak(TRUE, 10);
        $this->pdf->SetFont('dejavusans', '', 12);
    }

    public function addContent($content)
    {
        $this->pdf->AddPage();
        $this->pdf->writeHTML($content, true, false, true, false, '');
    }

    public function saveToFile($filename)
    {
        $this->pdf->Output($filename, 'F');
    }

    public function outputToBrowser($filename)
    {
        $this->pdf->Output($filename, 'D');
    }

    public function printPDF()
    {
        $this->pdf->Output('Print.pdf', 'I');
        echo '<script type="text/javascript">window.print();</script>';
    }
}