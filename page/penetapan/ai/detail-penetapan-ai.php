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
INNER JOIN satuan ON headeranggaran.kodesatuan = satuan.kodesatuan 
WHERE newdetailanggaran.kodedetail = '$detail'") or die (mysql_error());
$rowDetail     = mysql_fetch_array($sqldetail);

$sql = mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
WHERE status = '3' AND newdetailanggaran.randomid = '$rowDetail[randomid]'");

$sqlA = mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
WHERE status = '4' AND newdetailanggaran.randomid = '$rowDetail[randomid]'");
?>
<div class="row">
    
    <!-- <div class="col-md-3">
        <img src="<?php echo $rowDetail["images"] == "" ? "images/no-images.png" : "".$rowDetail["images"] ?>" width="188" height="272" class="img-responsive img-rounded center-block" />
        <p class="text-center"><?php echo $rowDetail["images"]; ?></p>
    </div> -->
    <div class="col-md-9">
    <!--
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
    -->
          <div class="row">
            <div class="col-md-5"><label>No. Usulan</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["nousulan"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Jenis Anggaran</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["jenis"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Uraian Kegiatan</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["uraiankegiatan"]; ?></div>
          </div>
          <div class="row">
            <div class="col-md-5"><label>Bulan Mulai</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["blnmulai"]; ?></div>
          </div>
        <!--
          <div class="row">
            <div class="col-md-5"><label>Tanggal Usulan</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php if($rowDetail["tartglmulai"]=="0000-00-00"){ }else{  echo tglindonesia($rowDetail["tartglmulai"]); } ?></div>
          </div>
        -->
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
          -->
    </div>
</div>
<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="datatabel">
            <thead>
                <tr>
                  <th class="text-center" width="1%">No</th>
                  <th class="text-center" width="1%">Vol. Jasa </th>
                  <th class="text-center" width="1%">Vol. Material </th>
                  <th class="text-center" width="3%">Harga Satuan Meterial </th>
                  <th class="text-center" width="3%">Harga Satuan Jasa </th>
                <!--
                  <th class="text-center" width="1%">Jml. Biaya Material</th>
                  <th class="text-center" width="1%">Jml. Biaya Jasa</th>
                -->
                  <th class="text-center" width="1%">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
                            				$no=1;
                                            while($row=mysql_fetch_array($sql))
                            				{
                            				?>
                            					<tr>
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td class="text-center"><?php echo $row['volumejasa'];?></td>
                                                    <td class="text-center"><?php echo $row['volumematerial'];?></td>
                                                    <td class="text-center"><?php echo "Rp ".number_format($row['hrgsatuanjasa'],0,'','.'); ?></td>
                                                    <td class="text-center"><?php echo "Rp ".number_format($row['hrgsatuanmaterial'],0,'','.'); ?></td>
                                                <!--
                                                    <td><?php echo $row['volumejasa']*$row['hrgsatuanjasa'];?></td>
                                                    <td><?php echo $row['volumematerial']*$row['hrgsatuanmaterial'];?></td>
                                                -->
                                                    <td class="text-center">
                                                        <?php   
                                                            if ($row['status'] == '2') {echo "Reject";}
                                                            else if ($row['status'] == '3') {echo "Terevaluasi";}
                                                        ?>
                                                    </td>
                                                </tr>
        <?php $no++; } ?>
                           
        <?php
                            				$no=1;
                                            while($row=mysql_fetch_array($sqlA))
                            				{
                            				?>
                            					<tr>
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td class="text-center"><?php echo $row['volumejasa'];?></td>
                                                    <td class="text-center"><?php echo $row['volumematerial'];?></td>
                                                    <td class="text-center"><?php echo "Rp ".number_format($row['hrgsatuanjasa'],0,'','.'); ?></td>
                                                    <td class="text-center"><?php echo "Rp ".number_format($row['hrgsatuanmaterial'],0,'','.'); ?></td>
                                                <!--
                                                    <td><?php echo $row['volumejasa']*$row['hrgsatuanjasa'];?></td>
                                                    <td><?php echo $row['volumematerial']*$row['hrgsatuanmaterial'];?></td>
                                                -->
                                                    <td class="text-center">
                                                        <?php   
                                                            if ($row['status'] == '2') {echo "Reject";}
                                                            else if ($row['status'] == '3') {echo "Terevaluasi";}
                                                            else if ($row['status'] == '4') {echo "Penetapan";}
                                                        ?>
                                                    </td>
                                                </tr>
        <?php $no++; } ?>
        </tbody>
        </table>
    </div>
</div>