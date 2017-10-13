<?php

if(isset($_POST["submit"])){
        
        $a    = mysql_real_escape_string(strip_tags($_POST["koderealisasi"]));
        $j    = mysql_real_escape_string(strip_tags($_POST["nokontrak"]));
        $b    = mysql_real_escape_string(strip_tags($_POST["nilaikontrak"]));
        $c    = mysql_real_escape_string(strip_tags($_POST["namavendor"]));
        $d    = tglformataction($_POST["tglkontrak"]);
        $e      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        
         mysql_query("UPDATE realisasi SET nokontrak='$j', nilaikontrak='$b', namavendor='$c', tglkontrak='$d' WHERE randomid='$e'");
         header("location:index.php?realisasi-ao&suksesedit");

    }
$idA = mysql_real_escape_string(trim($_GET["update-realisasi-ao"]));
$sqlA= mysql_query("SELECT * FROM realisasi WHERE randomid = '$idA'") or die (mysql_error());
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
                        <h2>Ubah Data Realisasi AO</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
       <!-- content -->
       <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Form Update Realisasi AO
            </div>
            <div class="panel-body">
                            <div class="row">
                                <form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
                                <input type="hidden" name="koderealisasi" value="<?php echo $idA; ?>" />
                                    <div class="col-lg-6">
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label>Nomor Kontrak</label></div>
                                                <div class="col-md-7">
                                                    <input class="form-control" name="nokontrak" type="text" data-rule-required="true" value="<?php echo $rowA["nokontrak"]; ?>" data-msg-required="Mohon masukkan nomor kontrak." placeholder="masukkan nomor kontrak" />
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label>Nilai Kontrak</label></div>
                                                <div class="col-md-7">
                                                    <input class="form-control" name="nilaikontrak" type="text" onKeyPress="return isNumberKey(event)" data-rule-required="true" value="<?php echo $rowA["nilaikontrak"]; ?>" data-msg-required="Mohon masukkan nilai kontrak." placeholder="masukkan nilai kontrak" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label>Nama Vendor</label></div>
                                                <div class="col-md-7">
                                                    <input class="form-control" name="namavendor" type="text" data-rule-required="true" value="<?php echo $rowA["namavendor"]; ?>" data-msg-required="Mohon masukkan nama vendor." placeholder="masukkan nama vendor" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label>Tanggal Kontrak</label></div>
                                                <div class="col-md-7">
                                                    <input  type="text" onKeyPress="return isNumberKeyTgl(event)" class="form-control" id="datepicker" name="tglkontrak" value="<?php if($rowA["tglkontrak"]=="0000-00-00"){}else{ echo format_tgl($rowA["tglkontrak"]); } ?>" data-rule-required="true" data-rule-date="true" data-msg-date="format yang benar dd/mm/yyyy" data-msg-required="mohon masukkan data tanggal kontrak." placeholder="masukkan tanggal kontrak" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--
                                         <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4"><label>Upload File</label></div>
                                                <div class="col-md-7">
                                                <img src="<?php echo $rowA["fileToUpload"] == "" ? "images/foto/no-images.png" : "foto/".$rowA["fileToUpload"] ?>" width="88" class="img-responsive img-rounded" />
                                                <br />
                                                <input type="file" name="uploadfile" id="uploadfile"/>
                                                <input type="hidden" name="uploadfile1" id="uploadfile1"/>
                                             </div>
                                            </div>
                                        </div>
                                        -->
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
                            <div class="col-md-6"></div>
                            <div class="col-md-5">
                                <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                <a href="index.php?realisasi-ao" class="btn btn-large btn-warning">Kembali</a>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                    </form>
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
            required: "Mohon masukkan data alamat"
                }
            }

    });
</script>
