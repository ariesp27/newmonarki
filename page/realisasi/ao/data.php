<?php
$sql = mysql_query("
SELECT
    ((volumejasa*hrgsatuanjasa)+(volumematerial*hrgsatuanmaterial)) 'rab',
    headeranggaran.*,
    newdetailanggaran.*,
    realisasi.*,
    newdetailanggaran.randomid
    FROM
    newdetailanggaran 
    LEFT JOIN realisasi ON newdetailanggaran.randomid = realisasi.randomid
    INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
    WHERE headeranggaran.kodeapp = '$_SESSION[kodeapp]' AND 
    newdetailanggaran.status = 8 AND 
    newdetailanggaran.tglapprove != ''
    AND headeranggaran.jenis = 'AO'
");



?>

<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Realisasi AO</h2>
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
                             Tabel Realisasi AO
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <br />
                                <table class="table table-striped table-bordered table-hover" id="datatabel1">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="2%" >No</th>
                                            <th class="text-center" width="10%">Uraian Kegiatan</th>
                                            <th class="text-center" width="8%">Nilai Anggaran</th>
                                            <th class="text-center" width="8%">Nomor Kontrak</th>
                                            <th class="text-center" width="8%">Nilai Kontrak</th>
                                            <th class="text-center" width="8%">Vendor</th>
                                            <th class="text-center" width="5%">Tanggal Kontrak</th>
                                            <th class="text-center" width="3%">Aksi</th>
                               			</tr>
                                    </thead>
                                    <tbody>
                                    <?php

                            				$no=1;
                                            
                            				while($rowA=mysql_fetch_array($sql)) {
                                            //$row=mysql_fetch_array($sqlA) 
                            				    
                            				?>
                            					<tr>
                                                    <td class="text-center"><?php echo $no; ?></td>
                                                    <td><?php echo $rowA['uraiankegiatan'];?></td>
                                                    <td>
                                                        RAB : <?php  echo "Rp ".number_format("$rowA[rab]"); ?>
                                                    </td>
                                                    <td><?php echo $rowA['nokontrak'];?></td>
                                                    <?php $sqlD = mysql_query ("SELECT * FROM realisasi where realisasi.randomid = '$rowA[randomid]'");?>
                                                    <td>
                                                        <?php 
                                                        $kontrak = mysql_fetch_array(mysql_query("SELECT * FROM realisasi
                                                        WHERE status = '9' AND randomid = '".$rowA['randomid']."'"));
                                                        echo "Rp ".number_format($kontrak['nilaikontrak']); ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        $vendor = mysql_fetch_array(mysql_query("SELECT * FROM realisasi
                                                        WHERE status = '9' AND randomid = '".$rowA['randomid']."'"));
                                                        echo $vendor['namavendor']; ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        $tgl = mysql_fetch_array(mysql_query("SELECT * FROM realisasi
                                                        WHERE status = '9' AND randomid = '".$rowA['randomid']."'"));
                                                        echo $tgl['tglkontrak']; ?>
                                                    </td>
                                                    <!--
                                                    <td><?php echo $rowA['nilaikontrak'];?></td> 
                                                    <td><?php echo $rowA['namavendor'];?></td>
                                                    <td><?php echo $rowA['tglkontrak'];?></td>
                                                    -->
                                                    
                                                    <td class="text-center">
                                                        <!--
                                                         <a href="#" class="detail" data-id="<?php echo $permintaan['kodedetail']; ?>" role="button" data-toggle="modal fade"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                                         -->
                                                         <?php 
                                                                $sqlA = mysql_query("SELECT * FROM realisasi WHERE randomid = '".$rowA['randomid']."' ORDER BY nilaikontrak");
                                                                $rowB = mysql_fetch_array($sqlA);
                                                         if ($rowB['nilaikontrak'] == '') {?>
                                                         <a title="tambah" href="index.php?tambah-realisasi-ao=<?php echo $rowA["randomid"]?>" type="button"><i class="fa fa-plus fa-2x"></i></a>
                                                         <?php } ?>
                                                         <a title="update" href="index.php?update-realisasi-ao=<?php echo $rowA["randomid"]?>" type="button"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                                         <?php $delete = mysql_query("SELECT * FROM realisasi WHERE status = '9' AND randomid = '".$rowA['randomid']."'");
                                                         $rowC = mysql_fetch_array($delete);?>
                                                         <a title="delete" href="#" id="delete-realisasi-ao=<?php echo $rowC["koderealisasi"]?>&delete-ango=<?php echo $rowA["kodedetail"]?>" class="delete">
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
    $.post('page/realisasi/ao/detail.php',
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
            <h4 class="modal-title">Detail Realisasi AO</h4>
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
      $('#datatabel1').dataTable( {
        "paging":   true,
        "ordering": false,
        "bInfo": false,
        "dom": '<"pull-left"f><"pull-right"l>tip'
      } );
    } );

    </script>
