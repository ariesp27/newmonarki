<?php
    ob_start();
	session_start();
    
    include "../../../config/koneksi.php";
    include "../../../config/utility.php";

    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Cache-control: private");
    header("Content-Type: application/vnd.ms-excel; name='excel'");
    header("Content-disposition: attachment; filename=laporan_realisasi_AO.xls");
    
    //$key     = $_GET['keycetak1'] ? $_GET['keycetak1'] : $_GET['keycetak1'];
    //$key2     = $_GET['keycetak2'] ? $_GET['keycetak2'] : $_GET['keycetak2'];

    //if (! $key=="" && !$key2==""){ $q = " headeranggaran.tartglmulai >= '$key' and date_sub(headeranggaran.tartglmulai, INTERVAL 1 day) <= '$key2'";  }

    $sql=mysql_query("SELECT
        headeranggaran.*,
        newdetailanggaran.*,
        realisasi.*
        FROM
        newdetailanggaran
        INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
        INNER JOIN realisasi ON newdetailanggaran.randomid = realisasi.randomid 
        WHERE headeranggaran.kodeapp = '$_SESSION[kodeapp]' AND newdetailanggaran.status = '9'
        AND headeranggaran.jenis = 'AO'
    ") or die (mysql_error());
?>

<h2>Laporan Realisasi AO</h2>
<br /><br />
<h3>History Realisasi AO</h3>
<table border="1" >
    <thead>
        <tr>
            <th class="text-center" width="2%">No</th>
            <th class="text-center" width="15%">Nama Kegiatan</th>
            <th class="text-center" width="4%">Vol. Jasa (RAB)</th>
            <th class="text-center" width="4%">Vol. Material (RAB)</th>
            <th class="text-center" width="8%">Hrg. Satuan Material (RAB)</th>
            <th class="text-center" width="8%">Hrg. Satuan Jasa (RAB)</th>
            <th class="text-center" width="4%">No. Kontrak </th>
            <th class="text-center" width="6%">Nilai Kontrak </th>
            <th class="text-center" width="6%">Nama Vendor </th>
            <th class="text-center" width="4%">Tanggal Kontrak </th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(mysql_num_rows($sql) > 0){
                $no=1;
                while($row=mysql_fetch_array($sql))
            {
        ?>
        <tr>
            <td class="text-center"><?php echo $no; ?></td>
            <td><?php echo $row['uraiankegiatan'];?></td>
            <td class="text-center"><?php echo $row['volumejasa'];?></td>
            <td class="text-center"><?php echo $row['volumematerial'];?></td>
            <td><?php echo "Rp ".number_format ($row['hrgsatuanjasa']);?></td>
            <td><?php echo "Rp ".number_format ($row['hrgsatuanmaterial']);?></td>
            <td><?php echo $row['nokontrak'];?></td>
            <td><?php echo "Rp ".number_format ($row['nilaikontrak']);?></td>
            <td><?php echo $row['namavendor'];?></td>
            <td><?php echo tglindonesia($row['tglkontrak']);?></td>
        </tr>
        <?php $no++; } } else { ?>
        <tr><td colspan="9" class="text-center"><i>Tabel realisasi AO kosong</i></td></tr>
        <?php } ?>
    </tbody>
</table>
<?php ob_end_flush(); ?>