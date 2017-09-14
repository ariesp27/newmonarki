<?php
$sql = mysql_query("SELECT
anggarandetail.*,
realisasi.*
FROM
anggarandetail 
LEFT JOIN realisasi ON anggarandetail.kodeangdetail
WHERE jenis = 'AO' AND anggarandetail.status = '3'") or die (mysql_error());
?>

<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Data Realisasi AO</h2>
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
                             Tabel Data Realisasi AO
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <br />
                                <table class="table table-striped table-bordered table-hover" id="datatabel">
                                    <thead>
                                        <tr>
                                            <th width="2%">No</th>
                                            <th width="10%">Nama Kegiatan</th>
                                            <th width="8%">Nilai Anggaran</th>
                                            <th width="8%">Nominal Realisasi</th>
                                            <th width="8%">Vendor</th>
                                            <th width="5%">Tanggal Kontrak</th>
                                            <th width="3%">Aksi</th>
                               			</tr>
                                    </thead>
                                    <tbody>
                                    <?php

                            				$no=1;
                                            while($row=mysql_fetch_array($sql))
                            				{
                            				    
                            				?>
                            					<tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $row['namakegiatan'];?></td>
                                                    <td><?php echo $row['nilaianggaran'];?></td>
                                                    <!-- <td><?php echo $penjumlahan = $row["volumesebelum"] * $row["harsatmatbelum"] ;?></td> -->
                                                    <?php $sql1 = mysql_query ("SELECT * FROM realisasi where koderealisasi = '$row[koderealisasi]'");?>
                                                    <td><?php echo $row['nilaikontrak'];?></td>
                                                    <td><?php echo $row['namavendor'];?></td>
                                                    <td><?php echo $row['tglkontrak'];?></td>
                                                    
                                                    <td class="center">
                                                        </a>
                                                        <a href="index.php?tambah-realisasi-ao" type="button"><i class="fa fa-plus fa-2x"></i></a>
                                                         <a href="index.php?update-realisasi-ao=<?php echo $row["koderealisasi"]?>" type="button"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                                         <a href="#" id="delete-realisasi-ao=<?php echo $row["koderealisasi"]?>" class="delete">
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
<!--
<script>
 $(document).on('click','.detail',function(e){
    e.preventDefault();
    $("#myModal1").modal('show');
    $.post('page/ai/detail.php',
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
            <h4 class="modal-title">Detail Data Anggaran Investasi</h4>
       </div>
      <div class="modal-body"></div>
      
      <div class="modal-footer">
      <button class="btn btn-default"data-dismiss="modal" aria-hidden="true">Tutup</button>
    </div>
  </div>
</div>
</div> -->
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
