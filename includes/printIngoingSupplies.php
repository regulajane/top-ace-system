<?php
    require_once('../php-classes/TCPDF-6.2.10/tcpdf.php');
    // Extend the TCPDF class to create custom Header and Footer
    class MYPDF extends TCPDF {
        //Page header
        public function Header() {
            // Position at 15 mm from top
            $this->SetY(15);
            // Set font
            $this->SetFont('FreeSerif', 'B', 12);
            // Set Cell FillColor
            $this->SetFillColor(232, 232, 232);
            // Date
            // $this->Cell(0, 10, date('Y-m-d') , 0, 1, 'R', 0, '', 0, false, 'M', 'M');
            // Title
            $this->Cell(0, 10, 'Ingoing Supplies' , 0, 1, 'C', 0, '', 0, false, 'M', 'M');
            $this->Cell(0, 10, '' , 0, 1, 'C', 0, '', 0, false, 'M', 'M');
            // Table Header
            $this->Cell(26.7, 1, 'Date', 'TB', 0, 'C', 1);
            $this->Cell(26.7, 1, 'Time', 'TB', 0, 'C', 1);
            $this->Cell(66.75, 1, 'Item', 'TB', 0, 'L', 1);
            $this->Cell(93.45, 1, 'Description', 'TB', 0, 'L', 1);
            $this->Cell(13.35, 1, 'Qty', 'TB', 0, 'C', 1);
            $this->Cell (40.05, 0, 'Entered By', 'TB', 1, 'C', 1);       
        }
        // Page footer
        public function Footer() {
            // Position at 15 mm from bottom
            $this->SetY(-15);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
            // Page number
            $this->Cell(0, 0, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
        }
    }
    $pdf = & new MYPDF("L", "mm", "A4", true, "UTF-8", false);
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Rej&Trish');
    $pdf->SetTitle('Ingoing Supplies');
    $pdf->SetSubject('Inventory Tracking');
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    $conn = mysql_connect('localhost','root','');
    if (!$conn)
    {   
        die('Could not connect: ' . mysql_error()); 
    }
    mysql_select_db('pma_tmc_db', $conn);
    $result = mysql_query('SELECT * from ingoingsupplies NATURAL JOIN supplies ORDER BY isDate desc, isTime desc', $conn);
    $pdf->SetMargins(15, 30, 15, 25);
    $pdf->AddPage();    
    $pdf->SetFont('FreeSerif', 'B', 11);    
    $pdf->SetFillColor(255, 255, 255);
    $i = 0;
    while($row = mysql_fetch_array($result))
    {
        $isDate = $row['isDate']; 
        $isTime = $row['isTime'];
        $item = $row['item'];
        $description = $row['description'];
        $isQty = $row['isQty'];
        $enteredBy = $row['enteredBy'];
        if (!empty($row)) {
            $pdf->SetFont('FreeSerif', '', 12);
            $tbl = 
                '<table style = "border-bottom: 1px solid black; padding: 10px 0px 10px 0px;">
                    <tr>
                        <td width="10%" align="center">'.$isDate.'</td>
                        <td width="10%" align="center">'.$isTime.'</td>
                        <td width="25%">'.$item.'</td>
                        <td width="35%">'.$description.'</td>
                        <td width="5%" align="center">'.$isQty.'</td>
                        <td width="15%" align="center">'.$enteredBy.'</td>
                    </tr>
                </table>';
        }
        $i++;
        //writeHTML ($html, $ln, $fill, $reseth, $cell, $align)       
        $pdf->writeHTML($tbl, false, false, true, false, '');
    }
    mysql_close($conn);
    ob_end_clean();
    $pdf->Output('Ingoing-Supplies.pdf', 'I');
?>