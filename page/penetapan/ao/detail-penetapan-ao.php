<?php
include "../../../config/koneksi.php";
include "../../../config/utility.php";
session_start();

$detail     = $_POST['id'];

$sqldetail = mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
INNER JOIN fungsi ON headeranggaran.kodefungsi = fungsi.kodefungsi
INNER JOIN pos_anggaran ON headeranggaran.kode_posanggaran = pos_anggaran.kode_posanggaran
INNER JOIN satuan ON headeranggaran.kodesatuan = satuan.kodesatuan WHERE newdetailanggaran.kodedetail = '$detail'") or die (mysql_error());

$rowDetail     = mysql_fetch_array($sqldetail);
?>
<div class="row">
    
    <!-- <div class="col-md-3">
        <img src="<?php echo $rowDetail["images"] == "" ? "images/no-images.png" : "".$rowDetail["images"] ?>" width="188" height="272" class="img-responsive img-rounded center-block" />
        <p class="text-center"><?php echo $rowDetail["images"]; ?></p>
    </div> -->
    <div class="col-md-9">
            <div class="row">
              <div class="col-md-5"><label>Kode Anggaran</label></div>
              <div class="col-md-1"> : </div>
              <div class="col-md-2"><?php echo $rowDetail["kodeanggaran"]; ?></div>
            </div>
           <div class="row">
            <div class="col-md-5"><label>Kode Pos Anggaran</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["kode_posanggaran"]; ?></div>
           </div>
          <div class="row">
            <div class="col-md-5"><label>Kode Fungsi</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["kodefungsi"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Nomor PRK</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["noprk"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Jenis</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["jenis"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Uraian Kegiatan</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["uraiankegiatan"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Durasi</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["durasi"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Target Tanggal Mulai</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php if($rowDetail["tartglmulai"]=="0000-00-00"){ }else{  echo tglindonesia($rowDetail["tartglmulai"]); } ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Jasa Sebelum</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["volumejasa"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Material Sebelum</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["volumematerial"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Harga Satuan Material Sebelum</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["hrgsatuanmaterial"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Harga Satuan Jasa Sebelum</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["hrgsatuanjasa"]; ?></div>
          </div>
          <!--
          <div class="row">
            <div class="col-md-5"><label>Satuan Sesudah</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["satuansesudah"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Volume Sesudah</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["volumesesudah"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Harga Satuan Material Sesudah</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["harsatmatsudah"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Harga Satuan Jasa Sesudah</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["harsatjassudah"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Realisasi</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["realisasi"]; ?></div>
          </div>
          
          <div class="row">
            <div class="col-md-5"><label>Disburst Januari</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["jan"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst Februari</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["feb"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst Maret</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["mar"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disbursi April</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["apr"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disbursi Mei</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["mei"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disbursi Juni</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["jun"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disbursi Juli</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["jul"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disbursi Agustus</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["agu"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disbursi September</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["sep"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst Oktober</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["okt"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst November</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["nov"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Disburst Desember</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["des"]; ?></div>
          </div>
          -->
          <div class="row">
            <div class="col-md-5"><label>Status</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["status"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Alasan</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["alasan"]; ?></div>
          </div>
          <!--
          <div class="row">
            <div class="col-md-5"><label>Edit by</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["editby"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Date Time</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php if($rowDetail["datetime"]=="0000-00-00"){ }else{  echo tglindonesia($rowDetail["datetime"]); } ?></div>
          </div>
          -->
    </div>
</div>
