<?php

if(isset($_POST["submit"])){
        
        $a      = mysql_real_escape_string(strip_tags($_POST["noprk"]));
        $b      = mysql_real_escape_string(strip_tags($_POST["kode_posanggaran"]));
        $c      = mysql_real_escape_string(strip_tags($_POST["kodefungsi"]));
        $d      = mysql_real_escape_string(strip_tags($_POST["kodesatuan"]));
        $e      = mysql_real_escape_string(strip_tags($_POST["uraiankegiatan"]));
        $f      = mysql_real_escape_string(strip_tags($_POST["durasi"]));
        $g      = tglformataction($_POST["tartglmulai"]);
        $h      = mysql_real_escape_string(strip_tags($_POST["prioritas"]));
        $l      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanmaterial"]));
        $m      = mysql_real_escape_string(strip_tags($_POST["volumematerial"]));
        $n      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanjasa"]));
        $o      = mysql_real_escape_string(strip_tags($_POST["volumejasa"]));
        $p      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        $q      = mysql_real_escape_string(strip_tags($_POST["jan"]));
        $r      = mysql_real_escape_string(strip_tags($_POST["feb"]));
        $s      = mysql_real_escape_string(strip_tags($_POST["mar"]));
        $t      = mysql_real_escape_string(strip_tags($_POST["apr"]));
        $u      = mysql_real_escape_string(strip_tags($_POST["mei"]));
        $v      = mysql_real_escape_string(strip_tags($_POST["jun"]));
        $w      = mysql_real_escape_string(strip_tags($_POST["jul"]));
        $i      = mysql_real_escape_string(strip_tags($_POST["agu"]));
        $j      = mysql_real_escape_string(strip_tags($_POST["sep"]));
        $k      = mysql_real_escape_string(strip_tags($_POST["okt"]));
        $aa      = mysql_real_escape_string(strip_tags($_POST["nov"]));
        $ab      = mysql_real_escape_string(strip_tags($_POST["des"]));
        $ac      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        $ad      = mysql_real_escape_string(strip_tags($_POST["status"]));        
        
        mysql_query ("UPDATE newdetailanggaran SET hrgsatuanmaterial='$l', volumematerial='$m', hrgsatuanjasa='$n', 
        volumejasa='$o'
        WHERE randomid='$p' AND status='$ad'");
        
        mysql_query ("UPDATE disburst SET jan='$q', feb='$r', mar='$s', apr='$t', mei='$u', jun='$v', jul='$w', agu='$i', 
        sep='$j', okt='$k', nov='$aa', des='$ab' 
        WHERE randomid='$ac'");
        
        header("location:index.php?rab-ai&suksesedit");
        
}
$idA = mysql_real_escape_string(trim($_GET["update-rab-ai"]));
$idB = mysql_real_escape_string(trim($_GET["status"]));
$sqlA= mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*,
disburst.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
INNER JOIN fungsi ON headeranggaran.kodefungsi = fungsi.kodefungsi
INNER JOIN pos_anggaran ON headeranggaran.kode_posanggaran = pos_anggaran.kode_posanggaran
INNER JOIN satuan ON headeranggaran.kodesatuan = satuan.kodesatuan 
INNER JOIN disburst ON newdetailanggaran.randomid = disburst.randomid 
WHERE newdetailanggaran.randomid = '$idA'") or die (mysql_error());
if(mysql_num_rows($sqlA)==0);
$rowA = mysql_fetch_array($sqlA); 
?>
 <script type="text/javascript">
    function isNumberKeyTgl(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
    //     if (charCode > 31 && (charCode < 47 || charCode > 57))
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
<div id="wrapper">
                <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Ubah Anggaran Investasi</h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <!-- content -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Ubah Anggaran Investasi
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
                                <input type="hidden" name="kodedetail" value="<?php echo $idA; ?>" />
                                <input type="hidden" name="status" value="<?php echo $idB; ?>" />
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Nomor PRK</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="noprk" disabled="" type="text" data-rule-required="true" value="<?php echo $rowA["noprk"]; ?>" data-msg-required="Mohon masukkan nomor PRK." placeholder="masukkan nomor PRK" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"> <label>Pos Anggaran</label></div>
                                                <div class="col-md-8">
                                                    <?php $sqlA = mysql_query("SELECT * FROM pos_anggaran") or die (mysql_error()); ?>
                                                    <select name="kode_posanggaran" id="kode_posanggaran" disabled="" class="form-control"  data-msg-required="Mohon masukkan kode pos anggaran.">
                                                        <option value="">- Pilih -</option>
                                                        <?php while ($data = mysql_fetch_array($sqlA)) { ?>
                                                        <option value="<?php echo $data["kode_posanggaran"] ; ?>" <?php if ($rowA['kode_posanggaran']==$data['kode_posanggaran']){ ?>selected="selected"<?php } ?>><?php echo $data["posanggaran"]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"> <label>Fungsi</label></div>
                                                <div class="col-md-8">
                                                    <?php $sqlA = mysql_query("SELECT * FROM fungsi") or die (mysql_error()); ?>
                                                    <select name="kodefungsi" id="kodefungsi" disabled="" class="form-control"  data-msg-required="Mohon masukkan kode fungsi.">
                                                        <option value="">- Pilih -</option>
                                                        <?php while ($data = mysql_fetch_array($sqlA)) { ?>
                                                        <option value="<?php echo $data["kodefungsi"] ; ?>" <?php if ($rowA['kodefungsi']==$data['kodefungsi']){ ?>selected="selected"<?php } ?>><?php echo $data["fungsi"]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"> <label>Satuan</label></div>
                                                <div class="col-md-8">
                                                    <?php $sqlA = mysql_query("SELECT * FROM satuan") or die (mysql_error()); ?>
                                                    <select name="kodesatuan" id="kodesatuan" disabled="" class="form-control"  data-msg-required="Mohon masukkan kode satuan.">
                                                        <option value="">- Pilih -</option>
                                                        <?php while ($data = mysql_fetch_array($sqlA)) { ?>
                                                        <option value="<?php echo $data["kodesatuan"] ; ?>" <?php if ($rowA['kodesatuan']==$data['kodesatuan']){ ?>selected="selected"<?php } ?>><?php echo $data["namasatuan"]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Uraian Kegiatan</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="uraiankegiatan" disabled="" type="text" data-rule-required="true" value="<?php echo $rowA["uraiankegiatan"]; ?>" data-msg-required="Mohon masukkan uraian kegiatan." placeholder="masukkan uraian kegiatan" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Durasi</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="durasi" disabled="" type="text" data-rule-required="true" value="<?php echo $rowA["durasi"]; ?>" data-msg-required="Mohon masukkan durasi." placeholder="masukkan durasi" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Tanggal Mulai</label></div>
                                                <div class="col-md-8">
                                                    <input  type="text" onKeyPress="return isNumberKeyTgl(event)" disabled="" class="form-control" id="datepicker" name="tartglmulai" value="<?php if($rowA["tartglmulai"]=="0000-00-00"){}else{ echo format_tgl($rowA["tartglmulai"]); } ?>" data-rule-required="true" data-rule-date="true" data-msg-date="format yang benar dd/mm/yyyy" data-msg-required="mohon masukkan data Target tanggal mulai." placeholder="masukkan Target tanggal mulai" /></div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                </div>
                                <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Prioritas</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="prioritas" disabled="" type="text" data-rule-required="true" value="<?php echo $rowA["prioritas"]; ?>" data-msg-required="Mohon masukkan prioritas." placeholder="masukkan prioritas" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Volume Jasa</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="volumejasa" type="text" data-rule-required="true" value="<?php echo $rowA["volumejasa"]; ?>" data-msg-required="Mohon masukkan volume jasa." placeholder="masukkan volume jasa" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Volume Material</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="volumematerial" type="text" data-rule-required="true" value="<?php echo $rowA["volumematerial"]; ?>" data-msg-required="Mohon masukkan volume material." placeholder="masukkan volume material" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Harga Satuan Material</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="hrgsatuanmaterial" type="text" data-rule-required="true" value="<?php echo $rowA["hrgsatuanmaterial"]; ?>" data-msg-required="Mohon masukkan harga satuan material." placeholder="masukkan harga satuan material" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-4"><label>Harga Satuan Jasa</label></div>
                                                <div class="col-md-8">
                                                    <input class="form-control" name="hrgsatuanjasa" type="text" data-rule-required="true" value="<?php echo $rowA["hrgsatuanjasa"]; ?>" data-msg-required="Mohon masukkan harga satuan jasa." placeholder="masukkan harga satuan jasa" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-8">
                                                    <input class="form-control" name="randomid" type="hidden"  data-rule-required="true" value="<?php echo $rowA["randomid"]; ?>" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
            <!-- awal disurst -->
                                    <div class="col-md-8">
                                            <h3>DISBURST ANGGARAN</h3> <br />
                                        </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Januari</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["jan"]; ?>" required="required" data-format=" 0,0[.]00" name='jan' id="jan" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Februari</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["feb"]; ?>"  required="required" data-format=" 0,0[.]00" name='feb' id="feb" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Maret</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["mar"]; ?>"  required="required" data-format=" 0,0[.]00" name='mar' id="mar" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>April</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["apr"]; ?>"  required="required" data-format=" 0,0[.]00" name='apr' id="apr" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Mei</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["mei"]; ?>"  required="required" data-format=" 0,0[.]00" name='mei' id="mei" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Juni</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["jun"]; ?>"  required="required" data-format=" 0,0[.]00" name='jun' id="jun" onKeyPress="return isNumberKey(event)" /></div>
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
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["jul"]; ?>"  required="required" data-format=" 0,0[.]00" name='jul' id="jul" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Agustus</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["agu"]; ?>"  required="required" data-format=" 0,0[.]00" name='agu' id="agu" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>September</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["sep"]; ?>"  required="required" data-format=" 0,0[.]00" name='sep' id="sep" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Oktober</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["okt"]; ?>"  required="required" data-format=" 0,0[.]00" name='okt' id="okt" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>November</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["nov"]; ?>"  required="required" data-format=" 0,0[.]00" name='nov' id="nov" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-2"><label>Desember</label></div>
                                                        <div class="col-md-8">
                                                            <input class="form-control" type="text"  value="<?php echo $rowA["des"]; ?>"  required="required" data-format=" 0,0[.]00" name='des' id="des" onKeyPress="return isNumberKey(event)" /></div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                            <div class="col-md-9">
                                                <div class="col-md-8">
                                                    <input class="form-control" name="randomid" type="hidden"  data-rule-required="true" value="<?php echo $rowA["randomid"]; ?>" />
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                                <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                                <a href="index.php?rab-ai" class="btn btn-large btn-warning">Kembali</a>
                                        </div>
                          </div>
                                        
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
$('#fileToUpload').filestyle();
 $('#fileToUpload').change(function(){
      var file = $('#fileToUpload').val();
      var exts = ['jpg','jpeg'];
      if ( file ) {
        var get_ext = file.split('.');
        get_ext = get_ext.reverse();
        if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
          return true;
        } else {
          alert('Hanya boleh jpg ');
          $('#fileToUpload').filestyle('clear');
        }
      }

    });

$('#validate-me-plz').validate({
      rules: {
        field: {
          required: true,
          date: true
        },
        alamat: {
                required: true
                }
        },
        messages: {
            alamat: {
            required: ""
                }
            }

    });
</script>
