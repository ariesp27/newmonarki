<?php
    $a = "abcdefghijklmnopqrstuvwxyz";
	$b = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$c = "1234567890";
	$d = $a."".$b."".$c;
	$number = substr((str_shuffle($d)), 0, 10);
    
    if(isset($_POST["submit"]))
    {
        $j      = mysql_real_escape_string(strip_tags($_POST["nokontrak"]));
        $a      = mysql_real_escape_string(strip_tags($_POST["nilaikontrak"]));
        $b      = mysql_real_escape_string(strip_tags($_POST["namavendor"])); 
        $c      = tglformataction($_POST["tglkontrak"]);
        $e      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        $o      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanmaterial"]));
        $p      = mysql_real_escape_string(strip_tags($_POST["volumematerial"]));
        $q      = mysql_real_escape_string(strip_tags($_POST["hrgsatuanjasa"]));
        $r      = mysql_real_escape_string(strip_tags($_POST["volumejasa"]));
        $s      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        
        mysql_query("INSERT INTO realisasi (koderealisasi, nokontrak, nilaikontrak, namavendor, tglkontrak, randomid,
        status) VALUES 
        ('','$j','$a','$b','$c','$e','9')");
        
        mysql_query ("INSERT INTO newdetailanggaran (kodedetail, hrgsatuanmaterial, volumematerial, hrgsatuanjasa, 
        volumejasa, randomid, status) VALUES ('','$o','$p','$q','$r','$s','9')");
        header("location:index.php?realisasi&suksestambah");
       
    }
$idA = mysql_real_escape_string(trim($_GET["tambah-realisasi-ai"]));
$sqlA= mysql_query("SELECT 
newdetailanggaran.*, 
headeranggaran.*
FROM newdetailanggaran
INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
WHERE status = '8' AND newdetailanggaran.randomid = '$idA'") or die (mysql_error());
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
                        <h2>Tambah Realisasi AI</h2>
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
                        Form Tambah Realisasi AI
                    </div> 
                    <table class="table table-striped text-center" >
                    <form id="validate-me-plz" name="form1" enctype="multipart/form-data" role="form" action="" method="post">
                    <input type="hidden" name="kodedetail" value="<?php echo $idA; ?>" />
                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6"> <br />
                                                                    <div class="col-md-4"><label>Uraian Kegiatan</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text" disabled=""  name='uraiankegiatan'  value="<?php echo $rowA['uraiankegiatan'];?>"class="form-control"  data-msg-required="Mohon masukkan uraian kegiatan" placeholder="masukkan uraian kegiatan" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Nomor Kontrak</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text"   name='nokontrak' class="form-control"  data-msg-required="Mohon masukkan nomor kontrak" placeholder="masukkan nomor kontrak" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Nilai Kontrak</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text"   name='nilaikontrak' class="form-control"  data-msg-required="Mohon masukkan nilai kontrak" placeholder="masukkan nilai kontrak" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Nama Vendor</label></div>
                                                                    <div class="col-md-8">
                                                                        <input type="text"   name='namavendor' class="form-control"  data-msg-required="Mohon masukkan nama vendor" placeholder="masukkan nama vendor" />
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                                    <div class="col-md-4"><label>Tanggal Kontrak</label></div>
                                                                    <div class="col-md-8">
                                                                        <input  type="text" onKeyPress="return isNumberKeyTgl(event)" class="form-control" id="datepicker" name="tglkontrak" placeholder="masukkan tanggal kontrak" />
                                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="col-md-8">
                                                        <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                                        <a href="index.php?realisasi" class="btn btn-large btn-warning">Kembali</a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-8">
                                                            <input class="form-control" name="volumejasa" type="hidden"  data-rule-required="true" value="<?php echo $rowA["volumejasa"]; ?>" data-msg-required="Mohon masukkan volume jasa." placeholder="masukkan volume jasa" />
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                
                                                <div class="form-group">
                                                    <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-8">
                                                            <input class="form-control" name="volumematerial" type="hidden"  data-rule-required="true" value="<?php echo $rowA["volumematerial"]; ?>" data-msg-required="Mohon masukkan volume material." placeholder="masukkan voluem material" />
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                       
                                                <div class="form-group">
                                                    <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-8">
                                                            <input class="form-control" name="hrgsatuanmaterial" type="hidden"  data-rule-required="true" value="<?php echo $rowA["hrgsatuanmaterial"]; ?>" data-msg-required="Mohon masukkan harga satuan material." placeholder="masukkan harga satuan material" />
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-8">
                                                            <input class="form-control" name="hrgsatuanjasa" type="hidden"  data-rule-required="true" value="<?php echo $rowA["hrgsatuanjasa"]; ?>" data-msg-required="Mohon masukkan harga satuan jasa." placeholder="masukkan harga satuan jasa" />
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="col-md-8">
                                                            <input class="form-control" name="status" hidden="" type="hidden"  data-rule-required="true" value="<?php echo $rowA["status"]; ?>" data-msg-required="Mohon masukkan status." placeholder="masukkan status" />
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

    $('#fileToUpload').filestyle();
    $('#fileToUpload').change(function(){
        var file = $('#fileToUpload').val();
        var exts = ['jpg','jpeg'];
        if ( file ) {
            var get_ext = file.split('.');
            get_ext = get_ext.reverse();
            if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
                return true;
            }
            else
            {
                alert('Hanya boleh jpg ');
                $('#fileToUpload').filestyle('clear');
            }
        }
    });
</script>
