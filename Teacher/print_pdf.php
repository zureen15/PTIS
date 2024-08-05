<?php
	function generateRow(){
		$contents = '';
		$id =$_GET['id'];
		include_once('../config.php');
		$sql = "SELECT * FROM acad_track WHERE `id`= '.$id' ";

		//use for MySQLi OOP
		$query = $conn->mysqli_query($sql);
		while($row = $query->fetch_assoc()){
			$contents .= "
			<tr>
				<td>".$row['stud_name']."</td>
				<td>".$row['gender']."</td>
				<td>".$row['BM']."</td>
				<td>".$row['BI']."</td>
				<td>".$row['SEJ']."</td>
				<td>".$row['PI']."</td>
				<td>".$row['MATH']."</td>
				<td>".$row['PJK']."</td>
				<td>".$row['PSV']."</td>
			</tr>
			";
		}
		return $contents;
	}

	require_once('tcpdf/tcpdf.php');
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle("Generated PDF using TCPDF");
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont('helvetica');
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $pdf->SetFont('helvetica', '', 11);
    $pdf->AddPage();
    $content = '';
    $content .= '
      	<h2 align="center">Generated PDF using TCPDF</h2>
      	<h4>Members Table</h4>
      	<table border="1" cellspacing="0" cellpadding="3">
           <tr>
        <th width="5%">ID</th>
				<th width="15%">Student Name</th>
				<th width="15%">Gender</th>
				<th width="15%">BM</th>
				<th width="15%">BI</th>
				<th width="15%">SEJ</th>
				<th width="15%">PI</th>
				<th width="15%">MATH</th>
				<th width="15%">PJK</th>
				<th width="15%">PSV</th>
           </tr>
      ';
			 
    $content .= generateRow();
    $content .= '</table>';
    $pdf->writeHTML($content);
    $pdf->Output('PTIS.pdf', 'I');


?>
