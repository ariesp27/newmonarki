<?php
include "config/imgset.php";
include "config/konfigurasi.php";

$sqluser = mysql_query("SELECT * FROM user_login WHERE username ='$_SESSION[username]'") or die (mysql_error());
$rowpass = mysql_fetch_array($sqluser);



if(isset($_POST["submit"])){
    $us         = mysql_real_escape_string(strip_tags($_POST["username"]));
    $passlama   = mysql_real_escape_string(strip_tags(md5($_POST["passlama"])));
    $passbaru   = mysql_real_escape_string(strip_tags(md5($_POST["passbaru"])));
    $kode       = mysql_real_escape_string(strip_tags($_POST["kode"]));

    $cekuser = mysql_query("SELECT * FROM user_login WHERE password = '$passlama' AND kodelogin='$kode'") or die (mysql_error());
    $count = mysql_num_rows($cekuser);
     if($count==0){
        header("location:index.php?password&pasX");
    }else {
            mysql_query("UPDATE user_login
            set  password = '$passbaru'
            WHERE kodelogin = '$kode' ");


            header("location:index.php?password&passB");
    }
    }
?>
<!-- Pick Day -->
<link rel="stylesheet" href="assets/pickday/css/pikaday.css" />
<script>
 function isNumberKeyTgl(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
     //    if (charCode > 31 && (charCode < 47 || charCode > 57))
            return false;

         return true;
      }
</script>
<div id="wrapper">
        <!-- /. NAV SIDE  -->
       <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2 style="margin: 0;">Form profile user</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
       <!-- content -->
    <div class="row">
                    <div class="col-xs-12">
                        <?php if(isset($_GET["pasX"])){?>
                        <div class="alert alert-danger">Password lama salah...!!!
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        </div>
                        <?php }else if(isset($_GET["passB"])){ ?>
                        <div class="alert alert-success">Password telah di perbaharui...!!!
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="row">
                    <form role="form"  action="" method="post" enctype="multipart/form-data" id="validate">

                    <div class="col-lg-12">
                            <input type="hidden" name="kode" value="<?php echo $rowpass["kodelogin"];?>" />

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Username</label></div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="username" value="<?php echo $rowpass["username"]; ?>" type="text" />
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Email</label></div>
                                    <div class="col-md-8">
                                        <input class="form-control" name="email" value="<?php echo $rowpass["email"]; ?>" type="text"/>
                                    </div>
                                </div>
                            </div>-->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Password Lama</label></div>
                                    <div class="col-md-8">
                                        <input class="form-control" id="passlama" name="passlama" type="password" data-rule-required="true"  data-msg-required="untuk keamanan password lama wajib di isi"  />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3"><label>Password Baru</label></div>
                                    <div class="col-md-8">
                                        <input class="form-control" id="passbaru" name="passbaru" type="password" data-rule-required="true"  data-msg-required="untuk keamanan password baru wajib di isi"  />
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-8">
                                        <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                        <a href="index.php?dashboard" class="btn btn-large btn-warning">Kembali</a>
                                    </div>
                                </div>
                    </div>
                </form>
            </div>
        </div>
       </div>

    </div>
<script type="text/javascript" src="assets/validasi/jquery.validate.min.js"></script>
<script src="assets/pickday/moment.js"></script>
<script src="assets/pickday/pikaday.js"></script>
<script>
    var picker = new Pikaday({
        field: document.getElementById('datepck'),
        firstDay: 1,
        minDate: new Date(1960, 0, 1),
        maxDate: new Date(2020, 12, 31),
        yearRange: [1960, 2020],
        format: 'DD/MM/YYYY'
    });
    jQuery.validator.methods["date"] = function (value, element) { return true; }
</script>
<script type="text/javascript">
$('#validate').validate({
      rules: {
        field: {
          required: true,
          date: true
        }
      }
    });
function goBack() {
    window.history.back();
}
</script>
