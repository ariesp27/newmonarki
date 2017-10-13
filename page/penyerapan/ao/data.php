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
    WHERE headeranggaran.kodeapp = '$_SESSION[kodeapp]' AND newdetailanggaran.status = '9'
    AND headeranggaran.jenis = 'AO'
");



?>

<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Penyerapan AO</h2>
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
                             Tabel Penyerapan AO
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <br />
                                <table class="table table-striped table-bordered table-hover" id="datatabel1">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="2%">No</th>
                                            <th class="text-center" width="10%">Uraian Kegiatan</th>
                                            <th class="text-center" width="5%">Nomor Kontrak</th>
                                            <th class="text-center" width="6%">Nilai Kontrak</th>
                                            <th class="text-center" width="6%">Vendor</th>
                                            <th class="text-center" width="5%">Tanggal Kontrak</th>
                                            <th class="text-center" width="9%">Nilai Penyerapan</th>
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
                                                    <td>
                                                    <?php 
                                                        
                                                        $tahap = mysql_query("SELECT * FROM pembayaran
                                                        WHERE randomid = '".$rowA['randomid']."'");
                                                        while($rowB=mysql_fetch_array($tahap)) {
                                                        ?>Tahap ke-<?php echo "Rp ".number_format($rowB['tahap']); ?>: &nbsp;<?php echo "Rp ".number_format($rowB['jmlpym']); ?><br /><?php }?>
                                                        
                                                    </td>
                                                    
                                                    <td class="text-center">
                                                        <!--
                                                         <a href="#" class="detail" data-id="<?php echo $permintaan['kodedetail']; ?>" role="button" data-toggle="modal fade"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                                         -->
                                                         <a title="tambah" href="index.php?tambah-penyerapan-ao=<?php echo $rowA["randomid"]?>" type="button"><i class="fa fa-plus fa-2x"></i></a>
                                                         <a title="update" href="index.php?update-penyerapan-ao=<?php echo $rowA["randomid"]?>" type="button"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                                         <?php $delete = mysql_query("SELECT * FROM pembayaran WHERE randomid = '".$rowA['randomid']."'");
                                                         $rowC = mysql_fetch_array($delete);?>
                                                         <a title="delete" href="#" id="delete-penyerapan-ao=<?php echo $rowC["kodepym"]?>&delete-detail-ao=<?php echo $rowA["kodedetail"]?>" class="delete">
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
    $.post('page/penyerapan/ao/detail.php',
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
            <h4 class="modal-title">Detail Penyerapan AO</h4>
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
