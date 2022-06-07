<?php
session_start();
?>
<?php
require('fpdf.php');

class PDF_Rotate extends FPDF
{
var $angle=0;

function Rotate($angle,$x=-1,$y=-1)
{
    if($x==-1)
        $x=$this->x;
    if($y==-1)
        $y=$this->y;
    if($this->angle!=0)
        $this->_out('Q');
    $this->angle=$angle;
    if($angle!=0)
    {
        $angle*=M_PI/180;
        $c=cos($angle);
        $s=sin($angle);
        $cx=$x*$this->k;
        $cy=($this->h-$y)*$this->k;
        $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
    }
}

function _endpage()
{
    if($this->angle!=0)
    {
        $this->angle=0;
        $this->_out('Q');
    }
    parent::_endpage();
}
}

class PDF extends PDF_Rotate
{
function Header()
{
    /* Put the watermark */
    $this->SetFont('Arial','B',50);
    $this->SetTextColor(255,192,203);
    $this->RotatedText(35,190,'W a t e r m a r k   d e m o',45);
}

function RotatedText($x, $y, $txt, $angle)
{
    /* Text rotated around its origin */
    $this->Rotate($angle,$x,$y);
    $this->Text($x,$y,$txt);
    $this->Rotate(0);
}
}
    // require('fpdf.php');
    $total =  $_SESSION["total"];
    $acc_num = $_SESSION["acc_num"];
    $adharuid = $_SESSION["adharuid"];
    $bank_name = strtoupper($_SESSION["bank_name"]);
    $ifsc =  strtoupper($_SESSION["ifsc"]);
    $fn = $_SESSION["first_name"];
    $ln = $_SESSION["last_name"];
    $amount_sanctioned = $_SESSION['amount_sanctioned'];
    $name = strtoupper($fn." ".$ln);
    $pdf = new FPDF('p','mm','A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','B',30);
    $pdf->SetY(10);
    $pdf->SetX(60);
    $pdf->Image("brand.jpg",10,10,20,20,'JPG');
    $pdf->SetY(13);
    $pdf->SetX(60);
    $pdf->Cell(100,10,"Subsidy Sanction Confirmation Bill",0,0,'C');
    $pdf->SetFont('Times','B',20);
    $pdf->SetY(40);
    $pdf->Cell(100,20,"Name",1,0,'C');
    $pdf->SetX(110);
    $pdf->Cell(85,20,"$name",1,0,'C');
    $pdf->SetY(60);
    $pdf->SetX(10);
    $pdf->Cell(100,20,"Adharuid",1,0,'C');
    $pdf->SetX(110);
    $pdf->Cell(85,20,"$adharuid",1,0,'C');  
    $pdf->SetY(80);
    $pdf->SetX(10); 
    $pdf->Cell(100,20,"Bank Name",1,0,'C');
    $pdf->SetX(110);
    $pdf->Cell(85,20,"$bank_name",1,0,'C'); 
    $pdf->SetY(100);
    $pdf->SetX(10); 
    $pdf->Cell(100,20,"Account Number",1,0,'C');
    $pdf->SetX(110);
    $pdf->Cell(85,20,"$acc_num",1,0,'C'); 
    $pdf->SetY(120);
    $pdf->SetX(10); 
    $pdf->Cell(100,20,"IFSC Code",1,0,'C');
    $pdf->SetX(110);
    $pdf->Cell(85,20,"$ifsc",1,0,'C'); 
    $pdf->SetY(140);
    $pdf->SetX(10); 
    $pdf->Cell(100,20,"Bill Amount",1,0,'C');
    $pdf->SetX(110);
    $pdf->Cell(85,20,"$total",1,0,'C'); 
    $pdf->SetY(160);
    $pdf->SetX(10); 
    $pdf->Cell(100,20,"Amount Sanctioned",1,0,'C');
    $pdf->SetX(110);
    $pdf->Cell(85,20,"$amount_sanctioned",1,0,'C');
    $pdf->SetY(180); 
    $pdf->Image("sign.png",140,190,30,0,'PNG');
    $pdf->SetY(210);
    $pdf->SetX(90);
    $pdf->Cell(100,10,"Regional Agriculture Officer",0,0,'C');
    $pdf->Output("bill.pdf",'D');
?>