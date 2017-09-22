<?php
$idA = mysql_real_escape_string(trim($_GET["tambah-penyerapan-ao"]));
$sqlA= mysql_query("SELECT 
headeranggaran.*,
newdetailanggaran.randomid,
realisasi.nokontrak,
pembayaran.*
from newdetailanggaran
inner join pembayaran on newdetailanggaran.randomid = pembayaran.randomid != ''
inner join headeranggaran on newdetailanggaran.randomid = headeranggaran.randomid
inner join realisasi on newdetailanggaran.randomid = realisasi.randomid
where newdetailanggaran.status = '9' and newdetailanggaran.randomid =  '$idA'");

$sqlB= mysql_query("SELECT *,(SELECT uraiankegiatan from headeranggaran b where a.randomid=b.randomid) 
as uraiankegiatan FROM realisasi a where randomid = '$idA'");
//if(mysql_num_rows($sqlA)==0);
$rowB = mysql_fetch_array($sqlB);
?>

<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Input Penyerapan AO</h2>
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
                <div class="col-md-2">
                    <a href="index.php?form-penyerapan-ao=<?php echo $idA;?>" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-plus"></i>Tambah Penyerapan</a>
                    <br /><br />
                </div>
                
                <div class="col-md-12" >
                <th class="right">
                        <td>Uraian Kegiatan <b> : <?php echo $rowB["uraiankegiatan"]?></b></td>
                        <br />
                        <br />
                        <td>Nomor Kontrak <b> &nbsp;&nbsp;: <?php echo $rowB["nokontrak"]?></b></td>
                        <br />
                        <br />
                </th>
                </div>
                
                <br />
           </div>
           <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Input Penyerapan AO
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <br />
                                <table class="table table-striped table-bordered table-hover" id="datatabel">
                                    <thead>
                                        <tr>
                                            <th width="2%">No</th>
                                            <th width="8%">Jumlah Penyerapan</th>
                                            <th width="8%">Tahap</th>
                                            <th width="8%">Tanggal Penyerapan</th>
                               			</tr>
                                    </thead>
                                    <tbody>
                                    <?php
                            				$no=1;
                            				while($rowA=mysql_fetch_array($sqlA)) 
                                            {    
                            				?>
                            					<tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo "Rp ".number_format ($rowA["jmlpym"]);?></td>
                                                    <td><?php echo $rowA["tahap"];?></td>
                                                    <td><?php echo $rowA["tglinput"];?></td>   
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