<?Php
require('fpdf186/fpdf.php');

$pdf = new FPDF('p', 'mm', "A4");
$pdf->AddPage();

$pdf->SetFont('Arial','B',20);

$pdf->Cell(50,10,'',0,0);
$pdf->Cell(59,5,'MONTHLY STOCK REPORT',0,0);
$pdf->Cell(59, 10,'',0,1);
$pdf->Cell(50, 10,'',0,1);
$pdf->Cell(50, 10,'',0,1);
$pdf->Cell(50, 10,'',0,1);


$pdf->SetFont('Arial','B',15);
$pdf->Cell(71,5,'Pupz Vet Clinic',0,0);
$pdf->Cell(59,5,'',0,0);
$pdf->Cell(59, 5,'Details',0,1);


$pdf->SetFont('Arial','',10);

$pdf->Cell(130,5,'No,12/1,Main Street,',0,0);
$pdf->Cell(25,5,'Stock ID:',0,0);
$pdf->Cell(35, 5,'S0012',0,1);


$pdf->Cell(130,5,'Kegalle, SriLanka',0,0);
$pdf->Cell(25,5,'Invoice date:',0,0);
$pdf->Cell(34, 5,'30th Dec 2023',0,1);

$pdf->Cell(130,5,'',0,0);
$pdf->Cell(25,5,'Invoive No:',0,0);
$pdf->Cell(34, 5,'OSD001',0,1);


$pdf->SetFont('Arial','B',15);
$pdf->Cell(130,5,'Bill To: july',0,0);
$pdf->Cell(59,5,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(189, 10,'',0,1);

$pdf->Cell(50, 10,'',0,1);

$pdf->SetFont('Arial','B',10);
/*hedling of the tabe*/
$pdf->Cell(10,6,'S1',1,0,'C');
$pdf->Cell(80,6,'Description',1,0,'C');
$pdf->Cell(23, 6,'Qty',1,0,'C');
$pdf->Cell(30,6,'Unit price',1,0,'C');
$pdf->Cell(20,6,'Sales Tax',1,0,'C');
$pdf->Cell(25, 6,'Total',1,1,'C');/*end of line*/
/*head of the table end*/


$pdf->SetFont('Arial','',10);

    $pdf->Cell(10,6,'$i',1,0);
    $pdf->Cell(80,6,'Anti-Rabies',1,0);
    $pdf->Cell(23, 6,'100',1,0);
    $pdf->Cell(30,6,'1500.00',1,0,'LKR');
    $pdf->Cell(20,6,'100.00',1,0,'R');
    $pdf->Cell(25, 6,'150100.00',1,1,'LKR');
    
    $pdf->Cell(10,6,'$2',1,0);
    $pdf->Cell(80,6,'Worm pill',1,0);
    $pdf->Cell(23, 6,'50',1,0);
    $pdf->Cell(30,6,'500.00',1,0,'LKR');
    $pdf->Cell(20,6,'100.00',1,0,'R');
    $pdf->Cell(25, 6,'25000.00',1,1,'LKR');

    $pdf->Cell(10,6,'$3',1,0);
    $pdf->Cell(80,6,'Vitamins',1,0);
    $pdf->Cell(23, 6,'500',1,0,'LKR');
    $pdf->Cell(30,6,'2500.00',1,0,'LKR');
    $pdf->Cell(20,6,'100.00',1,0,'R');
    $pdf->Cell(25, 6,'1250,000.00',1,1,'LKR');

    $pdf->Cell(10,6,'$4',1,0);
    $pdf->Cell(80,6,'Suppliments',1,0);
    $pdf->Cell(23, 6,'250',1,0,'LKR');
    $pdf->Cell(30,6,'3000.00',1,0,'LKR');
    $pdf->Cell(20,6,'100.00',1,0,'R');
    $pdf->Cell(25, 6,'750,000.00',1,1,'LKR');


    $pdf->Cell(118,6,'',0,0);
    $pdf->Cell(25,6,'Subtotal',0,0);
    $pdf->Cell(45, 6,'2,175,100',1,1,'LKR');

    $pdf->Cell(50, 10,'',0,1);
    $pdf->Cell(50, 10,'',0,1);

    $pdf->SetFont('Arial','B',15);

    $pdf->Cell(71,5,'TEl:',0,0);
    $pdf->Cell(59,5,'',0,0);
    $pdf->Cell(59, 5,'',0,1);
       

    $pdf->SetFont('Arial','',10);

    $pdf->Cell(130,5,'+94769262717/0352262485',0,0);
    $pdf->Cell(25,5,'',0,0);
    $pdf->Cell(35, 5,'',0,1);
    $pdf->SetFont('Arial','B',15);

    $pdf->Cell(71,5,'Emai:',0,0);
    $pdf->Cell(59,5,'',0,0);
    $pdf->Cell(59, 5,'',0,1);

    $pdf->SetFont('Arial','',10);

    $pdf->Cell(130,5,'pupz@vetclinic.com',0,0);
    $pdf->Cell(25,5,'',0,0);
    $pdf->Cell(35, 5,'',0,1);

    $pdf->Cell(50, 10,'',0,1);
    $pdf->Cell(50, 10,'',0,1);
    $pdf->Cell(50, 10,'',0,1);
    $pdf->Cell(50, 10,'',0,1);
    $pdf->Cell(50, 10,'',0,1);
    $pdf->Cell(50, 10,'',0,1);
    $pdf->Cell(50, 10,'',0,1);
    $pdf->Cell(50, 10,'',0,1);
   
    
    

    $pdf->SetFont('Arial','B',13);

    $pdf->Cell(71,5,'Our Vision',0,0);
    $pdf->Cell(59,5,'',0,0);
    $pdf->Cell(59, 5,'',0,1);

    $pdf->SetFont('Arial','',10);

    $pdf->Cell(130,5,'To be the leading professional and quality veterinary care provider in Sri Lanka.',0,0);
    $pdf->Cell(25,5,'',0,0);
    $pdf->Cell(35, 5,'',0,1);


    
   
   
    $pdf->SetFont('Arial','B',13);

    $pdf->Cell(71,5,'Our Mission',0,0);
    $pdf->Cell(59,5,'',0,0);
    $pdf->Cell(59, 5,'',0,1);

    $pdf->SetFont('Arial','',10);

    $pdf->Cell(130,5,'To assist you and your four-legged friends with love, care and respect.',0,0);
    $pdf->Cell(25,5,'',0,0);
    $pdf->Cell(35, 5,'',0,1);

    $pdf->SetFont('Arial','',10);

    $pdf->Cell(130,5,'At Best Care we are dedicated and bound to provide the best service for all your pets needs.',0,0);
    $pdf->Cell(25,5,'',0,0);
    $pdf->Cell(35, 5,'',0,1);


$pdf->Output();
?>