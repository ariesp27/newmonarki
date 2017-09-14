<?php
    include "../../../config/koneksi.php";
    include "../../../config/utility.php";

    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Cache-control: private");
    header("Content-Type: application/vnd.ms-excel; name='excel'");
    header("Content-disposition: attachment; filename=laporanAI.xls");

    $key     = $_GET['keycetak1'] ? $_GET['keycetak1'] : $_GET['keycetak1'];
    $key2     = $_GET['keycetak2'] ? $_GET['keycetak2'] : $_GET['keycetak2'];

    if (! $key=="" && !$key2==""){ $q = " anggarandetail.tartglmulai >= '$key' and date_sub(anggarandetail.tartglmulai, INTERVAL 1 day) <= '$key2'";  }

    $sql=mysql_query("SELECT
        anggarandetail.*,
        fungsi.fungsi,
        pos_anggaran.kode_posanggaran,
        pos_anggaran.posanggaran,
        fungsi.kodefungsi
        FROM
        anggarandetail
        INNER JOIN fungsi ON anggarandetail.kodefungsi = fungsi.kodefungsi
        INNER JOIN pos_anggaran ON anggarandetail.kode_posanggaran = pos_anggaran.kode_posanggaran WHERE jenis = 'AI'
    ") or die (mysql_error());
?>

<h2>Laporan AI</h2>
<br /><br />
<h3>History AI</h3>
<table border="1" >
    <thead>
        <tr>
            <th width="2%">No</th>
            <th width="8%">Nomor PRK</th>
            <th width="14%">Nama Kegiatan</th>
            <th width="9%">Target Tgl Mulai</th>
            <th width="10%">Tangal Pengajuan</th>
            <th width="13%">Harga Material Sebelum</th>
            <th width="13%">Harga Jasa Sebelum</th>
            <th width="13%">Harga Material Sesudah</th>
            <th width="13%">Harga Jasa Sesudah</th>
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
            <td><?php echo $row['noprk'];?></td>
            <td><?php echo $row['namakegiatan'];?></td>
            <td><?php echo $row['tartglmulai'];?></td>
            <td><?php echo $row['datetime'];?></td>
            <td><?php echo $row['harsatmatbelum'];?></td>
            <td><?php echo $row['harsatjasbelum'];?></td>
            <td><?php echo $row['harsatmatsudah'];?></td>
            <td><?php echo $row['harsatjassudah'];?></td>
        </tr>
        <?php $no++; } } else { ?>
        <tr><td colspan="9" class="text-center"><i>Tabel data AI kosong</i></td></tr>
        <?php } ?>
    </tbody>
</table>
