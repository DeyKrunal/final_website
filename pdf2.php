<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');


// Extend TCPDF class to create custom header and footer
class CustomPDF extends TCPDF {
    
    
    // Header
    public function Header() {
        $date=date('Y-m-d');
        // Set logo image path
        $path='D:\xampp\htdocs\pro_edit\pro\assets\images\pro_logo.jpg';
        // $image_file = 'upload/pro.jpg'; // Adjust this path
        
        // Set header image width and height
        $image_width = 15; // Adjust logo width as needed
        $image_height = ''; // Height automatically adjusted based on aspect ratio
        
        // Output the logo image
        $this->Image($path, 15, 5, $image_width, $image_height, 'jpg', '', 'T', false, 300, 'Progress Pilot', false, false, 0, false, false, false);

        // Set font
        $this->SetFont('helvetica', 'B', 12);
        
        // Title
        $this->SetY(10);
    
        $this->Cell(100, 0, 'PROGRESS PILOT', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        
        $this->Cell(100, 50, 'Report Generated on '.$date, 0, false, 'C', 0, '', 0, false, 'M', 'M');

        // Move to the next line to avoid overlapping
        $this->Ln(10);

        // $this->tMargin=40;
        $this->Line(10, $this->getY(), 200, $this->getY());
    }
    
    // Footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15); // Move to 15 mm from the bottom
        $this->Line(10, $this->GetY(), 200, $this->GetY()); // Draw line
        
        // Position at 15 mm from bottom
        $this->SetY(-15);
        
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// Create new PDF document
$pdf = new CustomPDF();

// Set document properties
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Your PDF Title');
$pdf->SetSubject('Your PDF Subject');
$pdf->SetMargins(15, 5, 15);
// Add a page
$pdf->AddPage();

// Set some content to display
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(10, 20, '', 0, 1);
$pdf->Cell(10, 10, '', 0, 1);

// Output the PDF
$pdf->Output('PROGRESS_PILOT_REPORT.pdf', 'D');
?>
