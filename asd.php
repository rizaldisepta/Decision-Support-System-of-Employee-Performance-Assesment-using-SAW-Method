<table>
  <tr>
    <td class="head">No</td>
    <td class="head">Ket nilai</td>
    <td class="head">Jumlah Nilai</td>
  </tr>
  
  <?php 
  include('includes/koneksi.php');
  $table=mysql_query('SELECT * FROM `nilai`');
  while($row=mysql_fetch_array($table))
  {
      $id=$row['id_nilai'];
      $ket=$row['ket_nilai'];
      $jum=$row['jum_nilai'];
  ?>
  <tr>
    <td class="no"><?php echo $id ?></td>
    <td class="ket_nilai"><?php echo $ket ?></td>
    <td class="jum_nilai"><?php echo $jum ?></td>
  </tr>
  <?php } ?>
  
  <?php 
  $add=mysql_query('SELECT SUM(jum_nilai) from `nilai`');
  while($row1=mysql_fetch_array($add))
  {
    $jum_nilai=$row1['SUM(jum_nilai)']; 
 ?>
  <tr>
    <td class="foot">Total</td>
    <td class="foot"><?php echo $jum_nilai ?></td>
  </tr>
  <?php } ?>
</table>