<?php ob_start(); ?>
<?php

	session_start();

include "../../../config/koneksi.php";
include "../../../config/utility.php";

if ($_GET['act']=='excel') {

	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	header("Cache-control: private");
	header("Content-Type: application/vnd.ms-excel; name='excel'");
	header("Content-disposition: attachment; filename=laporan_usulan_AO.xls");

}
else
{
echo '
<script>

	window.print();

</script>';
}

?>

<style type="text/css">

.style4 {font-family: Arial !important; font-size:18px !important;}
.style9 {font-family: Arial !important; font-size:12px !important; background-color:#99bbff !important; font-weight:bold !important; text-align:center !important; vertical-align: middle !important; width:auto !important; }
.style1 {font-family: Arial !important; font-size:12px !important;}
.style2 {font-family: Arial !important; font-size:12px !important; text-align: center !important; background-color: #ffd9b3 !important;}

</style>
<title>Laporan Usulan AO</title>
<body>
    <table width="98%"  border="0">
        <tr>
            <td>
                <fieldset>
                     <center>
						<legend class="style4">
							<b>History Usulan AO
							<?php
								$sql=mysql_query("SELECT
                                    headeranggaran.*,
                                    newdetailanggaran.*
                                    FROM
                                    newdetailanggaran
                                    INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
                                    WHERE jenis = 'AO' AND status IN ('0','1','2','3')") or die (mysql_error()); 
                            ?> 
                                </legend></center>
                    <br>

                    <table width="100%" border="1" cellpadding="1" cellspacing="0"  bordercolordark="#000000"  bordercolorlight="#FFFFFF">
                        <tr class="style9">
                            <th width="2%">No</th>
                            <th width="8%">Nomor PRK</th>
                            <th width="14%">Nama Kegiatan</th>
                            <th width="9%">Target Tgl Mulai</th>
                            <th width="13%">Jasa (usulan)</th>
                            <th width="13%">Material (usulan)</th>
                            <th width="13%">Hrg. Satuan Material (usulan)</th>
                            <th width="13%">Hrg. Satuan Jasa (usulan)</th>
                        </tr>
                        <?php
                            if(mysql_num_rows($sql) > 0){
                                $no=1;
                                while($row=mysql_fetch_array($sql))
                            {
                        ?>
                                <tr class="style1">
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['noprk'];?></td>
                                    <td><?php echo $row['uraiankegiatan'];?></td>
                                    <td><?php echo $row['tartglmulai'];?></td>
                                    <td><?php echo $row['volumejasa'];?></td>
                                    <td><?php echo $row['volumematerial'];?></td>
                                    <td><?php echo $row['hrgsatuanjasa'];?></td>
                                    <td><?php echo $row['hrgsatuanmaterial'];?></td>
                                </tr>
                        <?php $no++; } } else { ?>
                        <tr><td colspan="9" class="text-center"><i>Tabel data A kosong</i></td></tr>
                        <?php } ?>
                    </table>
                </fieldset>
                <br>
            </td>
        </tr>
    </table>
</body>
<?php ob_flush();  ?>
