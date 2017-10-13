<?php
    $a = "abcdefghijklmnopqrstuvwxyz";
	$b = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$c = "1234567890";
	$d = $a."".$b."".$c;
	$number = substr((str_shuffle($d)), 0, 10);
    
    if(isset($_POST["submit"]))
    {
        
        $a      = tglformataction($_POST["tglpym"]);
        $b      = mysql_real_escape_string(strip_tags($_POST["jmlpym"]));
        $c      = mysql_real_escape_string(strip_tags($_POST["tahap"]));
        $d      = tglformataction($_POST["tglinput"]);
        $e      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        
        
        mysql_query("INSERT INTO pembayaran (kodepym, tglpym, jmlpym, tahap, tglinput, randomid, kodeapp) VALUES 
        ('','$a','$b','$c','$d','$e','$_SESSION[kodeapp]')");
        header("location:index.php?tambah-penyerapan-ai=$e");
    
    }
$idA = mysql_real_escape_string(trim($_GET["form-penyerapan-ai"]));
$sqlA= mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*,
realisasi.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
INNER JOIN realisasi ON newdetailanggaran.randomid = realisasi.randomid 
WHERE newdetailanggaran.status = '9' AND newdetailanggaran.randomid = '$idA'") or die (mysql_error());
if(mysql_num_rows($sqlA)==0);
$rowA = mysql_fetch_array($sqlA);
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
                        <h2>Tambah Penyerapan AI</h2>
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
                        Form Tambah Penyerapan AI
                    </div> 
                    <table class="table table-striped text-center" >
                    <form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
                    <input type="hidden" name="kodedetail" value="<?php echo $idA; ?>" />
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6"> <br />
                                                                    <div class="col-md-4"><label>Uraian Kegiatan</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text"   disabled="" name='uraiankegiatan' class="form-control"  value="<?php echo $rowA["uraiankegiatan"]?>" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Nomor Kontrak</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text"   disabled="" name='nilaikontrak' class="form-control"  value="<?php echo $rowA["nokontrak"]?>" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                        <div class="col-md-4"><label>Tgl Pembayaran</label></div>
                                                                        <div class="col-md-8">
                                                                            <input  type="text" onKeyPress="return isNumberKeyTgl(event)" class="form-control" id="datepicker2" name="tglpym" placeholder="masukkan tanggal pembayaran" />
                                                                        </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Jumlah Pembayaran</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text"   name='jmlpym' class="form-control" onKeyPress="return isNumberKey(event)" data-msg-required="Mohon masukkan jumlah pembayaran" placeholder="masukkan jumlah pembayaran" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                        <div class="col-md-4"><label>Tahap</label></div>
                                                                        <div class="col-md-8">
                                                                            <input type="text"   name='tahap' class="form-control" onKeyPress="return isNumberKey(event)" data-msg-required="Mohon masukkan tahap" placeholder="masukkan tahap" />
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                        <div class="col-md-4"><label>Tgl Input Penyerapan</label></div>
                                                                        <div class="col-md-8">
                                                                            <input  type="disabled" onKeyPress="return isNumberKeyTgl(event)" class="form-control" id="datepicker" name="tglinput" placeholder="masukkan tanggal penyerapan" />
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
                            
                                                    <div class="row">
                                                    <div class="col-md-1"></div>
                                                        <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                                        <a href="index.php?penyerapan" class="btn btn-large btn-warning">Kembali</a>
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
<script>
    var picker = new Pikaday({
        field: document.getElementById('datepicker2'),
        firstDay: 1,
        minDate: new Date(1960, 0, 1),
        maxDate: new Date(2020, 12, 31),
        yearRange: [1960, 2020],
        format: 'DD/MM/YYYY'
    });
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="assets/validasi/jquery.validate.min.js"></script>
<script type="text/javascript">
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
                required: "Mohon masukkan data AI"
            }
        }
    });

</script>
