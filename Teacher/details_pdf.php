<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Pdf</title>
</head>
<body>
    <p style="text-align: center;">User Details</p>
    <table  width="100%" border="1">
        <tr>
            <td><b>Student Name:</b></td>
            <td><?=$row['stud_name']?></td>
            <td><b>Gender:</b></td>
            <td><?=$row['gender']?></td>
        </tr>
        <tr>
            <td><b>BM:</b></td>
            <td><?=$row['BM']?></td>
            <td><b>BI:</b></td>
            <td><?=$row['BI']?></td>
        </tr>
        <tr>
            <td><b>SEJ:</b></td>
            <td><?=$row['SEJ']?></td>
            <td><b>PI:</b></td>
            <td><?=$row['PI']?></td>
        </tr>
        <tr>
            <td><b>MATH:</b></td>
            <td><?=$row['MATH']?></td>
            <td><b>PJK:</b></td>
            <td><?=$row['PJK']?></td>
            <td><b>PSV:</b></td>
            <td><?=$row['PSV']?></td>
        </tr>
    </table>
</body>
</html>