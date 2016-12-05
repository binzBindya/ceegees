<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=exceldata.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border='1' width="100%">
<tr>
 <td>Name</td>
  <td>Email</td>
 <td>Contact</td>
  <td>Marketing Experience</td>
<td>Familiarity with UAE</td>
<td>Whether holding a UAE driving license</td>
<td>Applied Date</td>
</tr>
<?
foreach($data1 as $key => $item) {
?>
<tr>
<td><?=$item['name']?></td>
<td><?=$item['email']?></td>
<td><?=$item['contact']?></td>
<td><?=$item['experience']?></td>
<td><?=$item['familiarity']?></td>
<td><?=$item['driving_license']?></td>
<td><?=$item['applied_date']?></td>
</tr>
<? } ?>
</table>