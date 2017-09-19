<?php
    if(isset($_POST["cari"])){
        $key     = (tglformataction($_POST['tglAwal'])) ? tglformataction($_POST['tglAwal']) : tglformataction($_GET['tglAwal']);
        $key2     = (tglformataction($_POST['tglAkhir'])) ? tglformataction($_POST['tglAkhir']) : tglformataction($_GET['tglAkhir']);

        if (! $key=="" && !$key2==""){ $q = " headeranggaran.tartglmulai >= '$key' and date_sub(headeranggaran.tartglmulai, INTERVAL 1 day) <= '$key2'";  }

        $sql=mysql_query("SELECT
        headeranggaran.*,
        newdetailanggaran.*
        FROM
        newdetailanggaran
        INNER JOIN headeranggaran ON newdetailanggaran.randomid = headeranggaran.randomid 
        WHERE jenis = 'AI' AND status IN ('0','1','2','3')
        ") or die (mysql_error());
    }
?>

<!-- autocomplete-->
<link rel="stylesheet" href="assets/pickday/css/pikaday.css" />
<link rel="stylesheet" href="assets/Actextbox/jquery-ui.css">
<script src="assets/Actextbox/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#skills" ).autocomplete({
            source: 'assets/Actextbox/search.php'
        });
    });
</script>

<div id="wrapper">
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Laporan Usulan AI</h2>
                    <hr />
                </div>
            </div>
            <form method="POST" action="" id="validate-cari">
                <div class="row">
                    <div class="col-md-2"><p style="padding: 0;" class="">Periode </p></div>
                    <div class="col-md-3">
                        <input  type="text" onKeyPress="return isNumberKeyTgl(event)" value="<?php  echo $_POST["tglAwal"];?>" class="form-control" id="datepicker" name="tglAwal" data-rule-required="true" data-rule-date="true" data-msg-date="format yang benar dd/mm/yyyy" data-msg-required="mohon masukkan data Tanggal." placeholder="masukkan Tanggal" />
                    </div>
                    <div class="col-md-1">S / D</div>
                    <div class="col-md-3">
                        <input  type="text" onKeyPress="return isNumberKeyTgl(event)" value="<?php  echo $_POST["tglAkhir"];?>" class="form-control" id="datepicker2" name="tglAkhir" data-rule-required="true" data-rule-date="true" data-msg-date="format yang benar dd/mm/yyyy" data-msg-required="mohon masukkan data Tanggal." placeholder="masukkan Tanggal" />
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary" type="submit" name="cari">Cari</button>
                    </div>
                    <div class="col-md-1">
                        <?php if(isset($_POST["cari"])){ ?>
                            <a href="page/lap/cetak/cetak-lap-ai.php?act=excel&tglawal=<?php echo $_POST["tglawal"]; ?>&tglakhir=<?php echo $_POST["tglakhir"]; ?>"><img src="images/excel.png" /></a> &nbsp;
                            <a href="page/lap/cetak/print-ai.php?act=print&tglawal=<?php echo $_POST["tglawal"]; ?>&tglakhir=<?php echo $_POST["tglakhir"]; ?>" target="_blank"><img src="images/print.png" title="cetak dokumen" /></a>
                        <?php } ?>
                    </div>
                    <!-- <div class="col-md-1">
                        <?php if(isset($_POST["cari"])){ ?>
                            <a target="_blank" href="page/lap/cetak/cetak-lap-ai.php?keycetak1=<?php echo $key; ?>&keycetak2=<?php echo $key2; ?>"><img class="img-responsive" src="images/excel.png" /></a>
                        <?php } ?>
                    </div> -->
                </div>
            </form>
            <br /><br />

            <?php if(isset($_POST["cari"])) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Tabel data usulan AI</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="datatabel">
                                        <thead>
                                            <tr>
                                                <th width="2%">No</th>
                                                <th width="8%">Nomor PRK</th>
                                                <th width="14%">Nama Kegiatan</th>
                                                <th width="9%">Target Tgl Mulai</th>
                                                <th width="13%">Jasa (usulan)</th>
                                                <th width="13%">Material (usulan)</th>
                                                <th width="13%">Hrg. Satuan Material (usulan)</th>
                                                <th width="13%">Hrg. Satuan Jasa (usulan)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if(mysql_num_rows($sql)>0){
                                                    $no=1;
                                                    while($row=mysql_fetch_array($sql)){
                                            ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $row['noprk'];?></td>
                                                            <td><?php echo $row['uraiankegiatan'];?></td>
                                                            <td><?php echo $row['tartglmulai'];?></td>
                                                            <td><?php echo $row['volumejasa'];?></td>
                                                            <td><?php echo $row['volumematerial'];?></td>
                                                            <td><?php echo $row['hrgsatuanjasa'];?></td>
                                                            <td><?php echo $row['hrgsatuanmaterial'];?></td>
                                                        </tr>
                                                    <?php $no++; } } else { ?>
                                                    <tr><td colspan="9" class="text-center"><i>Tabel data AI kosong</i></td></tr>
                                                    <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
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

<script type="text/javascript" src="assets/validasi/jquery.validate.min.js"></script>
<script type="text/javascript">
    $('#validate-cari').validate({
        rules: {
            field: {
                required: true,
            date: true
            }
        }
    });
    jQuery.validator.methods["date"] = function (value, element) { return true; }
</script>

<script src="assets/confirmdell/js/script.js"></script>
<script src="assets/datatables/jquery.dataTables.js"></script>
<script src="assets/datatables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready( function () {
        $('#datatabel').dataTable( {
            "paging":   true,
            "ordering": false,
            "bInfo": false,
            "dom": '<"pull-left"f><"pull-right"l>tip'
        });
    });
</script>
