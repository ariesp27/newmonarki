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
WHERE status = '4' AND newdetailanggaran.randomid = '$detail'
order by newdetailanggaran.status asc");

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

$sqlB = mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
WHERE status IN ('5','6','7','8') AND newdetailanggaran.randomid = '$rowDetail[randomid]'");
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
            <div class="col-md-5"><label>Alasan</label></div>
            <div class="col-md-1"> : </div>
            <div class="col-md-6"><?php echo $rowDetail["alasan"]; ?></div>
          </div>
    </div>
</div>
<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="datatabel">
            <thead>
                <tr>
                  <th width="1%">Vol. Jasa </th>
                  <th width="1%">Vol. Material </th>
                  <th width="1%">Harga Satuan Meterial </th>
                  <th width="1%">Harga Satuan Jasa </th>
                  <th width="1%">Jml. Biaya Material</th>
                  <th width="1%">Jml. Biaya Jasa</th>
                  <th width="1%">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
                            				$no=1;
                                            while($row=mysql_fetch_array($sql))
                            				{
                            				?>
                            					<tr>
                                                    <td><?php echo $row['volumejasa'];?></td>
                                                    <td><?php echo $row['volumematerial'];?></td>
                                                    <td><?php echo "Rp ".number_format($row['hrgsatuanmaterial'],0,'','.'); ?></td>
                                                    <td><?php echo "Rp ".number_format($row['hrgsatuanjasa'],0,'','.'); ?></td>
                                                    <td><?php echo $row['volumematerial']*$row['hrgsatuanmaterial'];?></td>
                                                    <td><?php echo $row['volumejasa']*$row['hrgsatuanjasa'];?></td>
                                                    <td>
                                                    <?php if ($row['status'] == '2') {echo "Reject";}
                                                    else if ($row['status'] == '3') {echo "Terevaluasi";}
                                                    ?></td>
                                                </tr>
        <?php $no++; } ?>
                           
        <?php
                            				$no=1;
                                            while($row=mysql_fetch_array($sqlA))
                            				{
                            				?>
                            					<tr>
                                                    <td><?php echo $row['volumejasa'];?></td>
                                                    <td><?php echo $row['volumematerial'];?></td>
                                                    <td><?php echo "Rp ".number_format($row['hrgsatuanmaterial'],0,'','.'); ?></td>
                                                    <td><?php echo "Rp ".number_format($row['hrgsatuanjasa'],0,'','.'); ?></td>
                                                    <td><?php echo $row['volumematerial']*$row['hrgsatuanmaterial'];?></td>
                                                    <td><?php echo $row['volumejasa']*$row['hrgsatuanjasa'];?></td>
                                                    <td>
                                                    <?php if ($row['status'] == '3') {echo "Terevaluasi";}
                                                    else if ($row['status'] == '4') {echo "Penetapan";}
                                                    ?></td>
                                                </tr>
        <?php $no++; } ?>
        
        <?php
                            				$no=1;
                                            while($row=mysql_fetch_array($sqlB))
                            				{
                            				?>
                            					<tr>
                                                    <td><?php echo $row['volumejasa'];?></td>
                                                    <td><?php echo $row['volumematerial'];?></td>
                                                    <td><?php echo "Rp ".number_format($row['hrgsatuanmaterial'],0,'','.'); ?></td>
                                                    <td><?php echo "Rp ".number_format($row['hrgsatuanjasa'],0,'','.'); ?></td>
                                                    <td><?php echo $row['volumematerial']*$row['hrgsatuanmaterial'];?></td>
                                                    <td><?php echo $row['volumejasa']*$row['hrgsatuanjasa'];?></td>
                                                    <td>
                                                    <?php if ($row['status'] == '4') {echo "Penetapan";}
                                                    else if ($row['status'] == '5') {echo "RAB";}
                                                    else if ($row['status'] == '6') {echo "Approve (RAB)";}
                                                    else if ($row['status'] == '7') {echo "Reject (RAB)";}
                                                    else if ($row['status'] == '8') {echo "Evaluasi (RAB)";}
                                                    ?></td>
                                                </tr>
        <?php $no++; } ?>
                                    </tbody>
        </table>
    </div>
</div>