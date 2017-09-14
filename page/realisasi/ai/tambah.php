<?php
    $a = "abcdefghijklmnopqrstuvwxyz";
	$b = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$c = "1234567890";
	$d = $a."".$b."".$c;
	$number = substr((str_shuffle($d)), 0, 10);
    
    if(isset($_POST["submit"]))
    {
        
        $a      = mysql_real_escape_string(strip_tags($_POST["nilaikontrak"]));
        $b      = mysql_real_escape_string(strip_tags($_POST["namavendor"])); 
        $c      = tglformataction($_POST["tglkontrak"]);
        $d      = mysql_real_escape_string(strip_tags($_POST["status"]));
        $e      = mysql_real_escape_string(strip_tags($_POST["randomid"]));
        $filerks  = $_FILES["fileToUpload"]["name"];
        $newfilerks     = time() . '_' . rand(100, 999) . '.' . end(explode(".",$filerks));
        $file_tmp_rks = $_FILES["fileToUpload"]["tmp_name"];
        copy($file_tmp_rks,"foto/".$newfilerks);

        
        mysql_query("INSERT INTO realisasi (koderealisasi, nilaikontrak, namavendor, tglkontrak, status, fileToUpload) VALUES 
        ('','$a','$b','$c','9','$filerks')");
        
        mysql_query ("INSERT INTO newdetailanggaran (kodedetail, kodeanggaran, hrgsatuanmaterial, volumematerial, hrgsatuanjasa, 
        volumejasa, randomid, status) VALUES ('','$x','$l','$m','$n','$o','$p','9')");
        header("location:index.php?realisasi&suksestambah");
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
                        
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6"> <br />
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
                                                        <div class="col-md-4"><label>Uplod Doc</label></div>
                                                        <div class="col-md-8">
                                                            <input type="file" name="fileToUpload" id="fileToUpload"/>
                                                        </div>
                                                            <!-- <label> &nbsp;&nbsp;&nbsp;&nbsp;Size gambar Max. 5MB</label> -->
                                                        </div>
                                                    </div>
                                                </div>
                            
                                            <div class="row">
                                            <div class="col-md-1"></div>
                                                <button type="submit" name="submit" class="btn btn-large btn-success">Simpan</button>
                                                <a href="index.php?realisasi" class="btn btn-large btn-warning">Kembali</a>
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
