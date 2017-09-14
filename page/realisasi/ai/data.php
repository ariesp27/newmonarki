<?php
$sql = mysql_query("SELECT
newdetailanggaran.*,
headeranggaran.*,
realisasi.*
FROM
newdetailanggaran 
LEFT JOIN realisasi ON newdetailanggaran.randomid = realisasi.randomid
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
WHERE jenis = 'AI' AND newdetailanggaran.status = '8'");

$sqlA = mysql_query("SELECT
newdetailanggaran.*,
headeranggaran.*,
realisasi.*
FROM
newdetailanggaran 
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
LEFT JOIN realisasi ON newdetailanggaran.randomid = realisasi.randomid
WHERE jenis = 'AI' AND newdetailanggaran.status = '4'")
?>

<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Realisasi AI</h2>
                        <hr />
                    </div>
                </div>
                <!-- /. ROW  -->
           <div class="row">
                <div class="col-md-10">
                    <?php if(isset($_GET["sukseshapus"])){?>
                                     <div class="alert alert-success">Data Berhasil Di Hapus...
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                     </div>
                                     <?php }else if(isset($_GET["suksesedit"])){ ?>
                                     <div class="alert alert-success">Data Berhasil Di Ubah...
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                     </div>
                                     <?php }else if(isset($_GET["suksesbalaskomen"])){ ?>
                                     <div class="alert alert-success">Komentar Berhasil Di balas...
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                     </div>
                                     <?php }else if(isset($_GET["suksestambah"])){?>
                                     <div class="alert alert-success" id="alertupload">Data  berhasil Ditambah,
                                     <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                                     </div>
                                    <?php } ?>
                </div>
                <!-- 
                <div class="col-md-2">
                    <a href="index.php?tambah-realisasi-ai" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-plus"></i>Input Realisasi</a>
                    <br /><br />
                </div>
                -->
           </div>
           <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Realisasi AI
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <br />
                                <table class="table table-striped table-bordered table-hover" id="datatabel">
                                    <thead>
                                        <tr>
                                            <th width="2%">No</th>
                                            <th width="10%">Uraian Kegiatan</th>
                                            <th width="8%">Nilai Anggaran</th>
                                            <th width="8%">Nilai Kontrak</th>
                                            <th width="8%">Vendor</th>
                                            <th width="5%">Tanggal Kontrak</th>
                                            <th width="3%">Aksi</th>
                               			</tr>
                                    </thead>
                                    <tbody>
                                    <?php

                            				$no=1;
                                            
                                            while($rowA=mysql_fetch_array($sqlA))
                                            while($row=mysql_fetch_array($sql))
                            				
                            				{
                            				    
                            				?>
                            					<tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['uraiankegiatan'];?></td>
                                                    <td>
                                                        Penetapan : <?php 
                                                        $penetapan = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status = '4' AND randomid = '".$rowA['randomid']."'"));
                                                        echo $rowA["volumejasa"] * $rowA["hrgsatuanjasa"] + $rowA["volumematerial"] * $rowA["hrgsatuanmaterial"]; ?>
                                                        <br />
                                                        
                                                        RAB : <?php
                                                        $rab = mysql_fetch_array(mysql_query("SELECT * FROM newdetailanggaran
                                                        WHERE status IN ('5','6','7','8') AND randomid = '".$rowA['randomid']."'"));
                                                        echo $row["volumejasa"]*$row["volumematerial"]*$row["hrgsatuanjasa; ?>
                                                    </td>
                                                    <!--
                                                    <td><?php echo $rowA["volumejasa"] * $rowA["hrgsatuanjasa"] + $rowA["volumematerial"] * $rowA["hrgsatuanmaterial"];?></td>
                                                    -->
                                                    <?php $sqlD = mysql_query ("SELECT * FROM realisasi where realisasi.randomid = '$row[randomid]'");?>
                                                    <td><?php echo $row['nilaikontrak'];?></td>
                                                    <td><?php echo $row['namavendor'];?></td>
                                                    <td><?php echo $row['tglkontrak'];?></td>
                                                    
                                                    <td class="center">
                                                        <!--
                                                         <a href="#" class="detail" data-id="<?php echo $permintaan['kodedetail']; ?>" role="button" data-toggle="modal fade"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                                         -->
                                                         <a href="index.php?tambah-realisasi-ai" type="button"><i class="fa fa-plus fa-2x"></i></a>
                                                         <a href="index.php?update-realisasi-ai=<?php echo $row["koderealisasi"]?>" type="button"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                                         <a href="#" id="delete-realisasi=<?php echo $row["koderealisasi"]?>&del-redetail=<?php echo $row["kodedetail"]?>" class="delete">
                                                            <i class="fa fa-trash-o fa-2x"></i>
                                                         </a>
                                                    </td>
                            					</tr>
                            				<?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!--End Advanced Tables -->
                </div>
            </div>

        </div>
       </div>
    </div>
<script>
 $(document).on('click','.detail',function(e){
    e.preventDefault();
    $("#myModal1").modal('show');
    $.post('page/realisasi/ai/detail.php',
    {id:$(this).attr('data-id')},
    function(html){
    $(".modal-body").html(html);
    }
    );
 });
</script>

<div id="myModal1" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content" style="border-radius: 0;">
      
       <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Detail Realisasi AI</h4>
       </div>
      <div class="modal-body"></div>
      
      <div class="modal-footer">
      <button class="btn btn-default"data-dismiss="modal" aria-hidden="true">Tutup</button>
    </div>
  </div>
</div>
</div>
<!-- confirm dell -->
<script src="assets/confirmdell/js/script.js"></script>
<!-- DATA TABLE SCRIPTS -->
    <script src="assets/datatables/jquery.dataTables.js"></script>
    <script src="assets/datatables/dataTables.bootstrap.js"></script>
    <script>
    $(document).ready( function () {
      $('#datatabel').dataTable( {
        "paging":   true,
        "ordering": false,
        "bInfo": false,
        "dom": '<"pull-left"f><"pull-right"l>tip'
      } );
    } );

    </script>
