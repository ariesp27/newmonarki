<?php
$no = 0;

$sqlth = mysql_fetch_array(mysql_query("SELECT * from headeranggaran WHERE jenis = 'AI' ORDER BY 'date'"));
$d = DATE('Y', strtotime($sqlth['tartglmulai']));

if(isset($_POST['kode'])) {
// deklarasikan variabel
	$kode      = $_POST['kode'];
	$status    = $_POST['status'];
    $alasan    = $_POST['alasan'];
    
    mysql_query("UPDATE newdetailanggaran SET status='$status', tglapprove=now(), alasan='$alasan' WHERE kodedetail = '$kode'");
	header("location: index.php?monitor-approve");
}

?>
<br />
<body>
<form name="bulk_action_form" action="pro-approve-form.php" method="post" onSubmit="return delete_confirm();"/>
          <div class="col-md-8">
                <?php if(isset($_GET["sukseshapus"])){?>
                    <div class="alert alert-warning close-alert">Data Berhasil Di Hapus...
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    </div>
                <?php }else if(isset($_GET["suksesedit"])){ ?>
                    <div class="alert alert-success close-alert">Data Berhasil Di Ubah...
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    </div>
                <?php }else if(isset($_GET["suksestambah"])){?>
                    <div class="alert alert-success close-alert" id="alertupload">Data Permintaan Berhasil Ditambah,  
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                    </div>
                <?php } ?>
          </div>
          
                <div class="col-md-12">
                        <!-- table data -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <br />
                                <table class="table table-striped table-bordered table-hover" id="datatable">
                                <div class="col-md-12 text-center">
                                    <h4>MONITORING APPROVAL ANGGARAN INVESTASI<br /></h4> 
                                    <span><em> &nbsp;Tahun Anggaran : <?php echo $d; ?> </em></span> 
                                </div>  
                                
                                    <thead>
                                        <tr >
                                            <th width="2%">No</th>
                                            <th width="4%">Uraian Kegiatan</th>
                                            <th width="2%">Nomor PRK</th>
                                            <th width="3%">Vol. Jasa (Usulan)</th>
                                            <th width="3%">Vol. Material (Usulan)</th>
                                            <th width="5%">Harga Satuan Meterial (Usulan)</th>
                                            <th width="4%">Harga Satuan Jasa (Usulan)</th>
                                            <th width="4%">Jml. Biaya Material</th>
                                            <th width="3%">Jml. Biaya Jasa</th>
                                            <th width="1%">Status</th>
                    						<th width="1%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php	

                                        $sqlangg = mysql_query("SELECT 
                                            newdetailanggaran.*, 
                                            headeranggaran.*
                                            FROM newdetailanggaran
                                            INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid
                                            WHERE jenis = 'AI'  AND status = '0' OR jenis = 'AI' AND status = '1' OR jenis = 'AI' AND status = '2'
                                            ");
                                        $num = mysql_num_rows($sqlangg);
                                                
                                                while($permintaan = mysql_fetch_array($sqlangg)) {
                                                $no++;
                                    
                                    ?>
                                    <tr >
                                        
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $permintaan['uraiankegiatan'];?></td>
                                        <td><?php echo $permintaan['noprk'];?></td>
                                        <td><?php echo $permintaan['volumejasa'];?></td>
                                        <td><?php echo $permintaan['volumematerial'];?></td>
                                        <td><?php echo $permintaan['hrgsatuanmaterial'];?></td>
                                        <td><?php echo $permintaan['hrgsatuanjasa'];?></td>
                                        <td><?php echo $permintaan['volumematerial']*$permintaan['hrgsatuanmaterial'];?></td>
                                        <td><?php echo $permintaan['volumejasa']*$permintaan['hrgsatuanjasa'];?></td>
                                        <td>
                                            <?php   
                                                    if ($permintaan['status'] == '0') {echo "Usulan";}
                                                    else if ($permintaan['status'] == '1') {echo "Approve";}
                                                    else if ($permintaan['status'] == '2') {echo "Reject";}
                                            ?>
                                        </td>
                                        
                                        <td hidden="status" align="center"><strong><?php echo strtoupper($permintaan["status"]); ?></strong></td>
                                        <td align="center">
                                           <a href="#" class="detail" data-id="<?php echo $permintaan['kodedetail']; ?>" role="button" data-toggle="modal fade"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
                                           <?php if ($permintaan['status'] == '0') {?><a href="#" class="approve" id="<?php echo $permintaan['kodedetail']; ?>" role="button" data-toggle="modal"><i class="fa fa-sign-in" aria-hidden="true"></i></a><?php } else{echo "";}?>
                                           <a href="#" id="delete-approve-ai=<?php echo $row["kodedetail"]?>&delete-approve-ang=<?php echo $row["kodeanggaran"]?>" class="delete">
                                            <i class="fa fa-trash-o fa-2x"></i>
                                           </a>
                                        </td>
                                    </tr>
                                    <?php }  ?>
                                </table>
                            </div>
                        </div>
                </div>
                  <!--End Advanced Tables -->
</form>

<script type="text/javascript">
$(".close-alert").fadeTo(3000, 500).slideUp(2000, function(){
    $(".close-alert").alert('close');
});
</script>
<!-- DATA TABLE SCRIPTS --> 
<script src="assets/datatables/jquery.dataTables.js"></script>
<script src="assets/datatables/dataTables.bootstrap.js"></script>
<script>
$(document).ready( function () {
      $('#datatable').datatable( {
        "paging":   true,
        "ordering": false,
        "bInfo": false,
        "dom": '<"top pull-left"f><"top pull-right"p>'
      } );
    } );
 $(document).on('click','.detail',function(e){
    e.preventDefault();
    $("#detail").modal('show');
    $.post('page/request/detail.php',
    {id:$(this).attr('data-id')},
    function(html){
    $(".modal-body").html(html);
    }   
    );
 });
 $(document).on('click','.approve',function(e){
    e.preventDefault();
    $("#approve").modal('show');
    $.post('page/request/pro-approve-form.php',
    {id:$(this).attr('id')},
    function(html){
    $(".modal-body").html(html).show();
    }   
    );
 });

 $(function() {
    //twitter bootstrap script
    var status = $('input:text[name=status]').val();
    $("#simpan-approve").click(function(){
        $.ajax({
                type: "POST",
                url: "page/request/pro-approve-form.php",
                data: $('form#form_approve').serialize(),
                success: function(msg){
                    $("#approve").modal('hide');
                    alert("Data Berhasil Di Ubah");
                      location.reload();
                },
                error: function(){
                    alert("failure");
                }
       });
    });
});

</script>
</body>
<div id="detail" class="modal fade">
  <div class="modal-dialog ">
    <div class="modal-content wrap-dialog" style="border-radius: 0;">
      <!-- dialog body -->
       <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">Detail Usulan AI</h4>
       </div>
      <div class="modal-body"></div>
      <!-- dialog buttons -->
      <div class="modal-footer">
      <button class="btn btn-default"data-dismiss="modal" aria-hidden="true">Tutup</button>
    </div>
  </div>
</div>
</div>

<div id="approve" class="modal">
  <div class="modal-dialog ">
    <div class="modal-content wrap-dialog" style="border-radius: 0;">
      <!-- dialog body -->
       <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">Monitoring Status Usulan AI</h4>
       </div>
      <div class="modal-body" style="overflow: hidden;"></div>
      <!-- dialog buttons 
      <div class="modal-footer">
		<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
	</div>-->
  </div>
</div>
</div>