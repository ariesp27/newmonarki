<?php

    $a = "abcdefghijklmnopqrstuvwxyz";
	$b = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$c = "1234567890";
	$d = $a."".$b."".$c;
	$number = substr((str_shuffle($d)), 0, 10);
        
    if(isset($_POST["submit"]))
    {
        
        $a      = mysql_real_escape_string(strip_tags($_POST["nousulan"]));
        $b      = mysql_real_escape_string(strip_tags($_POST["kodesatuan"]));
        $c      = mysql_real_escape_string(strip_tags($_POST["uraiankegiatan"]));
        $f      = tglformataction($_POST["tartglmulai"]);
        $d      = mysql_real_escape_string(strip_tags($_POST["blnmulai"]));
        $e      = mysql_real_escape_string(strip_tags($_POST["prioritas"]));
        $h      = mysql_real_escape_string(strip_tags($_POST["volumejasa"]));
        $i      = mysql_real_escape_string(strip_tags($_POST["volumematerial"]));
        $j      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanjasa"]));
        $k      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanmaterial"]));
        $l      = mysql_real_escape_string(strip_tags($_POST["mitigasi"]));
        $n      = mysql_real_escape_string(strip_tags($_POST["jan"]));
        $o      = mysql_real_escape_string(strip_tags($_POST["feb"]));
        $p      = mysql_real_escape_string(strip_tags($_POST["mar"]));
        $q      = mysql_real_escape_string(strip_tags($_POST["apr"]));
        $r      = mysql_real_escape_string(strip_tags($_POST["mei"]));
        $s      = mysql_real_escape_string(strip_tags($_POST["jun"]));
        $t      = mysql_real_escape_string(strip_tags($_POST["jul"]));
        $u      = mysql_real_escape_string(strip_tags($_POST["agu"]));
        $v      = mysql_real_escape_string(strip_tags($_POST["sep"]));
        $w      = mysql_real_escape_string(strip_tags($_POST["okt"]));
        $x      = mysql_real_escape_string(strip_tags($_POST["nov"]));
        $y      = mysql_real_escape_string(strip_tags($_POST["des"]));
        
        $filekko  = $_FILES["uploadkko"]["name"];
        $newfilekko     = time() . '_' . rand(100, 999) . '.' . end(explode(".",$filekko));
        $file_tmp_kko = $_FILES["uploadkko"]["tmp_name"];
        copy($file_tmp_kko,"foto/".$newfilekko);
        
        $filekkf  = $_FILES["uploadkkf"]["name"];
        $newfilekkf     = time() . '_' . rand(100, 999) . '.' . end(explode(".",$filekkf));
        $file_tmp_kkf = $_FILES["uploadkkf"]["tmp_name"];
        copy($file_tmp_kkf,"foto/".$newfilekkf);
        
        mysql_query("INSERT INTO headeranggaran (kodeanggaran, nousulan, kodesatuan, 
        uraiankegiatan, tartglmulai, blnmulai, prioritas, kko, kkf, mitigasi, randomid, kodeapp)
        VALUES ('','$a','$b','$c','$f','$d','$e','$newfilekko','$newfilekkf','$l','$number','$_SESSION[kodeapp]')");
        
        mysql_query ("INSERT INTO newdetailanggaran (kodedetail, volumejasa, volumematerial, 
        hrgsatuanjasa, hrgsatuanmaterial, randomid) VALUES ('','$h','$i','$j','$k','$number')");
        
        mysql_query ("INSERT INTO disburst (kodedisburst, jan, feb, mar, apr, mei, jun, jul, 
        agu, sep, okt, nov, des, randomid) VALUES('','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$number')") ;
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
                        <h2>Tambah Usulan Anggaran</h2>
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
                        Form Tambah Usulan Anggaran
                    </div> 
                    <table class="table table-striped text-center" >
                    <form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
                        
                        <div class="col-lg-6">
                        
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10"> </br>
                                                <div class="col-md-4"><label>No. Usulan</label></div>
                                                <div class="col-md-8">
                                                    <input type="text"   name='nousulan' class="form-control"  data-msg-required="Mohon masukkan nomor PRK" placeholder="masukkan no. usulan" />
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <!--
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
                                -->
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
                                                    <div class="col-md-4"><label>Tanggal Usulan</label></div>
                                                    <div class="col-md-8">
                                                        <input  type="text" onKeyPress="return isNumberKeyTgl(event)" class="form-control" id="datepicker" name="tartglmulai" placeholder="masukkan tanggal usulan" />
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                                    <div class="col-md-4"><label>Bulan Mulai</label></div>
                                                    <div class="col-md-8">
                                                        <select name="blnmulai" id="blnmulai" class="form-control"  data-msg-required="Mohon masukkan bulan mulai.">
                                                            <option>- Pilih -</option>
                                                            <option>Januari</option>
                                                            <option>Februari</option>
                                                            <option>Maret</option>
                                                            <option>April</option>
                                                            <option>Mei</option>
                                                            <option>Juni</option>
                                                            <option>July</option>
                                                            <option>Agustus</option>
                                                            <option>September</option>
                                                            <option>Oktober</option>
                                                            <option>November</option>
                                                            <option>Desember</option>
                                                        </select>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                  <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                                    <div class="col-md-4"><label>Prioritas</label></div>
                                                    <div class="col-md-8">
                                                        <input type="text"   name='prioritas' class="form-control"  data-msg-required="Mohon masukkan prioritas " placeholder="masukkan prioritas " />
                                                    </div>
                                        </div>
                                    </div>
                                  </div> 
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-10"><br />
                                                    <div class="col-md-4"><label>Volume Jasa</label></div>
                                                    <div class="col-md-8">
                                                        <input type="text"   name='volumejasa' class="form-control" onKeyPress="return isNumberKey(event)" data-msg-required="Mohon masukkan Volume jasa " placeholder="masukkan Volume jasa " />
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
                                                    <div class="col-md-4"><label>Mitigasi</label></div>
                                                    <div class="col-md-8">
                                                        <input type="text"   name='mitigasi' class="form-control"  data-msg-required="Mohon masukkan mitigasi " placeholder="masukkan mitigasi " />
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
                                <div class="col-md-8">
                                    <h3>Disburst Anggaran</h3> <br />
                               </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Januari</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  required="required" data-format=" 0,0[.]00" name='jan' id="jan" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Februari</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  required="required" data-format=" 0,0[.]00" name='feb' id="feb" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Maret</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  required="required" data-format=" 0,0[.]00" name='mar' id="mar" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>April</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  required="required" data-format=" 0,0[.]00" name='apr' id="apr" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Mei</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  required="required" data-format=" 0,0[.]00" name='mei' id="mei" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Juni</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  required="required" data-format=" 0,0[.]00" name='jun' id="jun" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>July</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  required="required" data-format=" 0,0[.]00" name='jul' id="jul" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Agustus</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  required="required" data-format=" 0,0[.]00" name='agu' id="agu" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>September</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  required="required" data-format=" 0,0[.]00" name='sep' id="sep" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Oktober</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  required="required" data-format=" 0,0[.]00" name='okt' id="okt" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>November</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  required="required" data-format=" 0,0[.]00" name='nov' id="nov" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Desember</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  required="required" data-format=" 0,0[.]00" name='des' id="des" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                            <a href="index.php?ai" class="btn btn-large btn-warning">Kembali</a>
                                        </div>
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
  
  if ( /\.(docx)$/i.test(file.files[0].name) === false ) { 
    //alert("maaf file harus .pdf!");
    if ( /\.(xlsx)$/i.test(file.files[0].name) === false ) { 
            $('#myModal').modal('show') 
            eraseText() 
        }
    
    }
}
function checkextension2() {
  var file = document.querySelector("#uploadkkf");
  
  if ( /\.(docx)$/i.test(file.files[0].name) === false ) { 
    //alert("maaf file harus .pdf!");
    if ( /\.(xlsx)$/i.test(file.files[0].name) === false ) { 
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
            <h4 class="modal-title" style="text-align:center; ">File upload hanya .xlsx & .docx</h4>
          </div>

          <div class="modal-footer bg-warning" style="margin:0px; border-top:0px; ">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
