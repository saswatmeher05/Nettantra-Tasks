<?php
function generate_pdf()
{



























    
    //ob_end_clean();
    // use Dompdf\Dompdf;
//     require('pdf/fpdf.php');
//     global $wpdb;
//     $table_name = $wpdb->prefix . 'expense_manager';
//     $sql = $wpdb->get_results("SELECT * FROM $table_name");


//     //generate pdf 
//     $pdf = new FPDF(); 
//     $pdf->AddPage();

//     $width_cell=array(20,50,40,40,40);
// $pdf->SetFont('Arial','B',16);

// //Background color of header//
// $pdf->SetFillColor(193,229,252);

// // Header starts /// 
// //First header column //
// $pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
// //Second header column//
// $pdf->Cell($width_cell[1],10,'ITEM',1,0,'C',true);
// //Third header column//
// $pdf->Cell($width_cell[2],10,'QUANTITY',1,0,'C',true); 
// //Fourth header column//
// $pdf->Cell($width_cell[3],10,'PRICE',1,0,'C',true);
// //Third header column//
// $pdf->Cell($width_cell[4],10,'CATAGORY',1,1,'C',true); 
// //// header ends ///////

// $pdf->SetFont('Arial','',14);
// //Background color of header//
// $pdf->SetFillColor(235,236,236); 
// //to give alternate background fill color to rows// 
// $fill=false;

// /// each record is one row  ///
// foreach ($sql as $row) {
// $pdf->Cell($width_cell[0],10,$row->id,1,0,'C',$fill);
// $pdf->Cell($width_cell[1],10,$row->item,1,0,'L',$fill);
// $pdf->Cell($width_cell[2],10,$row->quantity,1,0,'C',$fill);
// $pdf->Cell($width_cell[3],10,$row->price,1,0,'C',$fill);
// $pdf->Cell($width_cell[4],10,$row->catagory,1,1,'C',$fill);
// //to give alternate background fill  color to rows//
// $fill = !$fill;
// }
// /// end of records /// 
// $pdf->Output();

}
?>
