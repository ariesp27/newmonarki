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
    header("Content-disposition: attachment; filename=laporan_usulan_AI.xls");
    
    //$key     = $_GET['keycetak1'] ? $_GET['keycetak1'] : $_GET['keycetak1'];
    //$key2     = $_GET['keycetak2'] ? $_GET['keycetak2'] : $_GET['keycetak2'];

    //if (! $key=="" && !$key2==""){ $q = " headeranggaran.tartglmulai >= '$key' and date_sub(headeranggaran.tartglmulai, INTERVAL 1 day) <= '$key2'";  }

    $sql=mysql_query("SELECT
        headeranggaran.*,
        newdetailanggaran.*
        FROM
        newdetailanggaran
        INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
        WHERE headeranggaran.jenis = 'AI' AND status IN ('0','1','2','3')
    ") or die (mysql_error());
?>

<h2>Laporan Usulan AI</h2>
<br /><br />
<h3>History Usulan AI</h3>
<table border="1" >
    <thead>
        <tr>
            <th class="text-center" width="2%">No</th>
                                                <th class="text-center" width="8%">Nomor PRK</th>
                                                <th class="text-center" width="14%">Nama Kegiatan</th>
                                                <th class="text-center" width="9%">Target Tgl Mulai</th>
                                                <th class="text-center" width="13%">Jasa (usulan)</th>
                                                <th class="text-center" width="13%">Material (usulan)</th>
                                                <th class="text-center" width="13%">Hrg. Satuan Jasa (usulan)</th>
                                                <th class="text-center" width="13%">Hrg. Satuan Material (usulan)</th>
                                                <th class="text-center" width="13%">Unit APP</th>
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
                                                            <td><?php echo $row['noprk'];?></td>
                                                            <td><?php echo $row['uraiankegiatan'];?></td>
                                                            <td><?php echo tglindonesia($row['tartglmulai']);?></td>
                                                            <td class="text-center"><?php echo $row['volumejasa'];?></td>
                                                            <td class="text-center"><?php echo $row['volumematerial'];?></td>
                                                            <td><?php echo "Rp ".number_format ($row['hrgsatuanjasa']);?></td>
                                                            <td><?php echo "Rp ".number_format ($row['hrgsatuanmaterial']);?></td>
                                                            <td>
                                                                <?php 
                                                                    if ($row['kodeapp'] == '1') {echo "APP Bogor";}
                                                                    else if ($row['kodeapp'] == '2') {echo "APP Bandung";}
                                                                    else if ($row['kodeapp'] == '3') {echo "APP Karawang";}
                                                                    else if ($row['kodeapp'] == '4') {echo "APP Cirebon";}
                                                                    else if ($row['kodeapp'] == '5') {echo "APP Purwokerto";}
                                                                    else if ($row['kodeapp'] == '6') {echo "APP Salatiga";}
                                                                    else if ($row['kodeapp'] == '7') {echo "APP Semarang";}
                                                                    else if ($row['kodeapp'] == '99') {echo "Kantor Induk";}
                                                                ?>
                                                            </td>
        </tr>
        <?php $no++; } } else { ?>
        <tr><td colspan="9" class="text-center"><i>Tabel data AI kosong</i></td></tr>
        <?php } ?>
    </tbody>
</table>
<?php ob_end_flush(); ?>