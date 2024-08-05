<?php                
include '../config.php'; 
include_once ('tcpdf/tcpdf.php');

//$MST_ID=$_GET['MST_ID'];
$id =$_GET['id'];


$sql = "SELECT * FROM `acad_track` WHERE `id`= '.$id' ";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
// $inv_mst_query = "SELECT T1.MST_ID, T1.INV_NO, T1.CUSTOMER_NAME, T1.CUSTOMER_MOBILENO, T1.ADDRESS FROM INVOICE_MST T1 WHERE T1.MST_ID='".$MST_ID."' ";             
// $inv_mst_results = mysqli_query($con,$inv_mst_query);   
// $count = mysqli_num_rows($inv_mst_results);  
if($count>0) 
{
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	//----- Code for generate pdf
	$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);  
	//$pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
	$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	$pdf->SetDefaultMonospacedFont('helvetica');  
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	$pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
	$pdf->setPrintHeader(false);  
	$pdf->setPrintFooter(false);  
	$pdf->SetAutoPageBreak(TRUE, 10);  
	$pdf->SetFont('helvetica', '', 12);  
	$pdf->AddPage(); //default A4
	//$pdf->AddPage('P','A5'); //when you require custome page size 
	
	$content = ''; 

	$content .= '
	<style>
	body{
	font-size:12px;
	line-height:24px;
	font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
	color:#000;
	}
	</style>    
	<table cellpadding="0" cellspacing="0" style="border:1px solid #ddc;width:100%;">
	<table style="width:100%;" >
    <tr>
            <td colspan="2">
            <b>Student Name: '.$row['stud_name'].' </b>
            </td>
            </tr>
            <tr>
            <td colspan="2">
            <b>Gender: '.$row['gender'].' </b>
            </td>
            </tr>
            <tr>
            <td colspan="2">
            <b>BM: '.$row['BM'].' </b>
            </td>
            </tr>
            <tr>
            <td colspan="2">
            <b>BI: '.$row['BI'].' </b>
            </td>
            </tr>
            <tr>
            <td colspan="2">
            <b>SEJ: '.$row['SEJ'].' </b>
            </td>
            </tr>
            <tr>
            <td colspan="2">
            <b>PI: '.$row['PI'].' </b>
            </td>
            </tr>
            <tr>
            <td colspan="2">
            <b>MATH: '.$row['MATH'].' </b>
            </td>
            </tr>
            <tr>
            <td colspan="2">
            <b>PJK: '.$row['PJK'].' </b>
            </td>
            </tr>
            <tr>
            <td colspan="2">
            <b>PSV: '.$row['PSV'].' </b>
            </td>
            </tr>
	</table>
</table>'; 

//$content .= generateRow();
//$content .= '</table>';
$pdf->writeHTML($content);

//$file_location = "/opt/lampp/htdocs/examples/generate_pdf/uploads/"; //for local xampp server

// $datetime=date('dmY_hms');
// $file_name = "INV_".$datetime.".pdf";
// ob_end_clean();

if($_GET['action']=='view') 
{
	$pdf->Output('PTIS.pdf', 'I'); // I means Inline view
} 
// else if($_GET['ACTION']=='DOWNLOAD')
// {
// 	$pdf->Output($file_name, 'D'); // D means download
// }
// else if($_GET['ACTION']=='UPLOAD')
// {
// $pdf->Output($file_location.$file_name, 'F'); // F means upload PDF file on some folder
// echo "Upload successfully!!";
// }

//----- End Code for generate pdf
	
}
else {
	echo 'Record not found for PDF.';
}

?>