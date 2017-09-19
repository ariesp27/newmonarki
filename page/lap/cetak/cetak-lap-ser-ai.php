<?php
    include "../../../config/koneksi.php";
    include "../../../config/utility.php";

    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Cache-control: private");
    header("Content-Type: application/vnd.ms-excel; name='excel'");
    header("Content-disposition: attachment; filename=laporan_penyerapan_AI.xls");
    
    //$key     = $_GET['keycetak1'] ? $_GET['keycetak1'] : $_GET['keycetak1'];
    //$key2     = $_GET['keycetak2'] ? $_GET['keycetak2'] : $_GET['keycetak2'];

    //if (! $key=="" && !$key2==""){ $q = " headeranggaran.tartglmulai >= '$key' and date_sub(headeranggaran.tartglmulai, INTERVAL 1 day) <= '$key2'";  }

    $sql=mysql_query("SELECT
        headeranggaran.*,
        newdetailanggaran.*,
        pembayaran.*
        FROM
        newdetailanggaran
        INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
        INNER JOIN pembayaran ON newdetailanggaran.randomid = pembayaran.randomid 
        WHERE jenis = 'AI' AND newdetailanggaran.status = '9'
    ") or die (mysql_error());
?>

<h2>Laporan Realisasi AI</h2>
<br /><br />
<h3>History Realisasi AI</h3>
<table border="1" >
    <thead>
        <tr>
            <th class="text-center" width="2%">No</th>
            <th class="text-center" width="15%">Nama Kegiatan</th>
            <th class="text-center" width="4%">Vol. Jasa (RAB)</th>
            <th class="text-center" width="4%">Vol. Material (RAB)</th>
            <th class="text-center" width="8%">Hrg. Satuan Material (RAB)</th>
            <th class="text-center" width="8%">Hrg. Satuan Jasa (RAB)</th>
            <th class="text-center" width="4%">Tanggal Pembayaran </th>
            <th class="text-center" width="6%">Jumlah Pembayaran</th>
            <th class="text-center" width="4%">Tanggal Input </th>
            
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
            <td><?php echo $no; ?></td>
            <td><?php echo $row['uraiankegiatan'];?></td>
            <td><?php echo $row['volumejasa'];?></td>
            <td><?php echo $row['volumematerial'];?></td>
            <td><?php echo $row['hrgsatuanjasa'];?></td>
            <td><?php echo $row['hrgsatuanmaterial'];?></td>
            <td><?php echo $row['tglpym'];?></td>
            <td><?php echo $row['jmlpym'];?></td>
            <td><?php echo $row['tglinput'];?></td>
        </tr>
        <?php $no++; } } else { ?>
        <tr><td colspan="9" class="text-center"><i>Tabel penyerapan AI kosong</i></td></tr>
        <?php } ?>
    </tbody>
</table>
