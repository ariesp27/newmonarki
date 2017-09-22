<?php

    $a = "abcdefghijklmnopqrstuvwxyz";
	$b = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$c = "1234567890";
	$d = $a."".$b."".$c;
	$number = substr((str_shuffle($d)), 0, 10);
        
    if(isset($_POST["submit"]))
    {
        
        $a      = mysql_real_escape_string(strip_tags($_POST["noprk"]));
        $b      = mysql_real_escape_string(strip_tags($_POST["kode_posanggaran"]));
        $c      = mysql_real_escape_string(strip_tags($_POST["kodefungsi"]));
        $d      = mysql_real_escape_string(strip_tags($_POST["kodesatuan"]));
        $e      = mysql_real_escape_string(strip_tags($_POST["uraiankegiatan"]));
        $f      = mysql_real_escape_string(strip_tags($_POST["durasi"]));
        $g      = tglformataction($_POST["tartglmulai"]);
        $h      = mysql_real_escape_string(strip_tags($_POST["prioritas"]));
        $k      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        $x      = mysql_real_escape_string(strip_tags($_POST["kodeanggaran"]));
        $l      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanmaterial"]));
        $m      = mysql_real_escape_string(strip_tags($_POST["volumematerial"]));
        $n      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanjasa"]));
        $o      = mysql_real_escape_string(strip_tags($_POST["volumejasa"]));
        $p      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        
        $filekko  = $_FILES["uploadkko"]["name"];
        $newfilekko     = time() . '_' . rand(100, 999) . '.' . end(explode(".",$filekko));
        $file_tmp_kko = $_FILES["uploadkko"]["tmp_name"];
        copy($file_tmp_kko,"foto/".$newfilekko);
        
        $filekkf  = $_FILES["uploadkkf"]["name"];
        $newfilekkf     = time() . '_' . rand(100, 999) . '.' . end(explode(".",$filekkf));
        $file_tmp_kkf = $_FILES["uploadkkf"]["tmp_name"];
        copy($file_tmp_kkf,"foto/".$newfilekkf);
        
        mysql_query("INSERT INTO headeranggaran (kodeanggaran, noprk, kode_posanggaran, kodefungsi, kodesatuan, 
        uraiankegiatan, durasi, tartglmulai, prioritas, jenis, kko, kkf, randomid)
        VALUES ('','$a','$b','$c','$d','$e','$f','$g','$h','AI','$newfilekko','$newfilekkf','$number')");
        
        mysql_query ("INSERT INTO newdetailanggaran (kodedetail, kodeanggaran, hrgsatuanmaterial, volumematerial, hrgsatuanjasa, 
        volumejasa, randomid) VALUES ('','$x','$l','$m','$n','$o','$number')");
        header("location:index.php?ai&suksestambah");
    }
?>

<script type="text/javascript">
    function isNumberKeyTgl(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        return false;
        return true;
    }
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 47 || charCode > 57))
        return false;
        return true;
    }
</script>

<script type="text/javascript" src="assets/js/bootstrap-filestyle.js"></script>

<link rel="stylesheet" href="assets/pickday/css/pikaday.css" />
<link rel="stylesheet" href="assets/css/style.css" />
<div id="wrapper">
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Tambah Anggaran Investasi</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <!--<?php if($_SESSION["sessionsim"] == 1){?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-warning">Data Gagal di tambah, saldo tidak cukup...
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        </div>
                    </div>
                </div>
                <?php } ?> -->
                <!-- /. content  -->
                <hr />
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Tambah Anggaran Investasi
                    </div> 
                    <table class="table table-striped text-center" >
                    <form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
                        
                        <div class="col-lg-6">
                        
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10"> </br>
                                                <div class="col-md-4"><label>Nomor PRK</label></div>
                                                <div class="col-md-8">
                                                    <input type="text"   name='noprk' class="form-control"  data-msg-required="Mohon masukkan nomor PRK" placeholder="masukkan nomor PRK" />
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                
                               <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10"> 
                                            <div class="col-md-4"><label>Pos Anggaran</label></div>
                                            <div class="col-md-8">
                                                <?php $sql = mysql_query("SELECT * FROM pos_anggaran") or die (mysql_error()); ?>
                                                <select name="kode_posanggaran" id="kode_posanggaran" class="form-control"  data-msg-required="Mohon masukkan kode pos anggaran.">
                                                <option value="">- Pilih -</option>
                                                <?php while ($data = mysql_fetch_array($sql)) { ?>
                                                <option value="<?php echo $data["kode_posanggaran"]; ?>"><?php echo $data["posanggaran"]; ?></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                                <div class="col-md-4"><label>Fungsi</label></div>
                                                <div class="col-md-8">
                                                    <?php $sql = mysql_query("SELECT * FROM fungsi") or die (mysql_error()); ?>
                                                    <select name="kodefungsi" id="kodefungsi" class="form-control"  data-msg-required="Mohon masukkan kode fungsi.">
                                                    <option value="">- Pilih -</option>
                                                    <?php while ($data = mysql_fetch_array($sql)) { ?>
                                                    <option value="<?php echo $data["kodefungsi"]; ?>"><?php echo $data["fungsi"]; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10"> 
                                                <div class="col-md-4"><label>Satuan</label></div>
                                                <div class="col-md-8">
                                                    <?php $sql = mysql_query("SELECT * FROM satuan") or die (mysql_error()); ?>
                                                    <select name="kodesatuan" id="kodesatuan" class="form-control"  data-msg-required="Mohon masukkan kode satuan.">
                                                    <option value="">- Pilih -</option>
                                                    <?php while ($data = mysql_fetch_array($sql)) { ?>
                                                    <option value="<?php echo $data["kodesatuan"]; ?>"><?php echo $data["namasatuan"]; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                    </div>
                                </div>
                                </div>
                            
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                                <div class="col-md-4"><label>Uraian Kegiatan</label></div>
                                                <div class="col-md-8">
                                                    <textarea name="uraiankegiatan" cols="22" rows="5" class="form-control"  data-msg-required="Mohon masukkan uraian kegiatan" placeholder="masukkan uraian kegiatan"></textarea>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                          
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                                <div class="col-md-4"><label>Durasi</label></div>
                                                <div class="col-md-8">
                                                    <input type="text"   name='durasi' class="form-control"  data-msg-required="Mohon masukkan durasi" placeholder="masukkan durasi" />
                                                </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                                <div class="col-md-4"><label>Target Tgl Mulai</label></div>
                                                <div class="col-md-8">
                                                    <input  type="text" onKeyPress="return isNumberKeyTgl(event)" class="form-control" id="datepicker" name="tartglmulai" placeholder="masukkan target tanggal mulai" />
                                                </div>
                                    </div>
                                </div>
                            </div>
                            
                          </div>
                          
                          <div class="col-lg-6">
                            
                              <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10"><br />
                                                <div class="col-md-4"><label>Prioritas</label></div>
                                                <div class="col-md-8">
                                                    <input type="text"   name='prioritas' class="form-control"  data-msg-required="Mohon masukkan prioritas " placeholder="masukkan prioritas " />
                                                </div>
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                                <div class="col-md-4"><label>Harga Satuan Material</label></div>
                                                <div class="col-md-8">
                                                    <input type="text"   name='hrgsatuanmaterial' class="form-control"  onKeyPress="return isNumberKey(event)" data-msg-required="Mohon masukkan Harga satuan material " placeholder="masukkan Harga satuan material " />
                                                </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                                <div class="col-md-4"><label>Volume Material</label></div>
                                                <div class="col-md-8">
                                                    <input type="text"   name='volumematerial' class="form-control"  onKeyPress="return isNumberKey(event)" data-msg-required="Mohon masukkan Volume material " placeholder="masukkan Volume material " />
                                                </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                                <div class="col-md-4"><label>Harga Satuan Jasa</label></div>
                                                <div class="col-md-8">
                                                    <input type="text"   name='hrgsatuanjasa' class="form-control" onKeyPress="return isNumberKey(event)" data-msg-required="Mohon masukkan Harga satuan jasa " placeholder="masukkan Harga satuan jasa " />
                                                </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                                <div class="col-md-4"><label>Volume Jasa</label></div>
                                                <div class="col-md-8">
                                                    <input type="text"   name='volumejasa' class="form-control" onKeyPress="return isNumberKey(event)" data-msg-required="Mohon masukkan Volume jasa " placeholder="masukkan Volume jasa " />
                                                </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10"><br />
                                        <div class="col-md-4"><label>KKO</label></div>
                                            <div class="col-md-8">
                                                <input type="file" name="uploadkko" id="uploadkko" onchange="checkextension()"/>
                                            </div>
                                    </div>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="col-md-4"><label>KKF</label></div>
                                            <div class="col-md-8">
                                                <input type="file" name="uploadkkf" id="uploadkkf" onchange="checkextension2()"/>
                                            </div>
                                    </div>
                                </div>
                              </div>
                        </div>
                    
                            <div class="row">
                            <div class="col-md-1"></div>
                                <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                <a href="index.php?ai" class="btn btn-large btn-warning">Kembali</a>
                            </div>
                    </form>
                </table>
            </div>
        </div> 
    </div>  
</div>
<script src="assets/pickday/moment.js"></script>
<script src="assets/pickday/pikaday.js"></script>
<script>
    var picker = new Pikaday({
        field: document.getElementById('datepicker'),
        firstDay: 1,
        minDate: new Date(1960, 0, 1),
        maxDate: new Date(2020, 12, 31),
        yearRange: [1960, 2020],
        format: 'DD/MM/YYYY'
    });
</script>

<script type="text/javascript" src="assets/validasi/jquery.validate.min.js"></script>
<script type="text/javascript">
$('#input01').filestyle();
  $('#validasi').validate({
      rules: {
        field: {
          required: true,
          date: true
        }
      }
    });
</script>

<script>
//style upload
$('#input01').filestyle();

function checkextension() {
  var file = document.querySelector("#uploadkko");
  
  if ( /\.(doc)$/i.test(file.files[0].name) === false ) { 
    //alert("maaf file harus .pdf!");
    if ( /\.(pdf)$/i.test(file.files[0].name) === false ) { 
            $('#myModal').modal('show') 
            eraseText() 
        }
    
    }
}
function checkextension2() {
  var file = document.querySelector("#uploadkkf");
  
  if ( /\.(doc)$/i.test(file.files[0].name) === false ) { 
    //alert("maaf file harus .pdf!");
    if ( /\.(pdf)$/i.test(file.files[0].name) === false ) { 
            $('#myModal').modal('show') 
            eraseText2() 
        }
    
    }
}
function eraseText2() {
    document.getElementById("uploadkkf").value = "";
}
function eraseText() {
    document.getElementById("uploadkko").value = "";
}
</script>

<!-- Modal Popup upload-->
    <div class="modal fade " id="myModal">
      <div class="modal-dialog">
        <div class="modal-content " style="margin-top:100px; border-radius: 0px;">
          <div class="modal-header bg-warning">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center; ">File upload hanya .pdf & .doc</h4>
          </div>

          <div class="modal-footer bg-warning" style="margin:0px; border-top:0px; ">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
