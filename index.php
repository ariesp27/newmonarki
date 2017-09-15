<?php
    ob_start();
	session_start();

    date_default_timezone_set("Asia/Jakarta");
    if( ! isset($_SESSION["level"])) header("location:login.php");
	include    "page/beranda/headadmin.php";
    include    "page/beranda/menuAdmin.php";
    include    "page/beranda/menuUser.php";
    include    "page/beranda/menuMAPP.php";
    include    "page/beranda/menuAssmen.php";
    include    "page/beranda/menuKI.php";
    include     "config/koneksi.php";
    include     "config/utility.php";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo headadmin(); ?>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<script type="text/javascript" >
$(document).ready(function()
{
$("#notificationLink").click(function()
{
$("#notificationContainer").fadeToggle(300);
$("#notification_count").fadeOut("slow");
return false;
});

//Document Click
$(document).click(function()
{
$("#notificationContainer").hide();
});
//Popup Click
$("#notificationContainer").click(function()
{
return false
});

});

$( "" ).click(function( eventObject ) {
    var elem = $( this );
    if ( elem.attr( "href" ).match( /evil/ ) ) {
        eventObject.preventDefault();
        elem.addClass( "evil" );
    }
});

</script>
<div class="main">
  <header class="header-main">
  <br /><br />
    <nav class="navbar navbar-default navbar-cls-top navbar-fixed-top" role="navigation" style="margin-bottom: 0">

    <div class="page-wrapper">
            <div class="navbar-header">
                <button class="button-nav-toggle navbar-toggle"  >
                <span class="icon">&#9776;</span> Menu</button>
                <a class="navbar-brand" href="index.php?dashboard">
                   <!-- <img class="img-responsive" src="images/kp3.png" />--><i>MONANGINOP</i>
                </a>
            </div>

       <!--
        <div style="color: white; padding: 12px 11px 5px; float: right;font-size: 16px;">
        <strong style="padding: 2px 0;"><?php echo $_SESSION["level"];?></strong> &nbsp;
        <a href="#" class="btn btn-danger square-btn-adjust logoutK"><i class="fa fa-power-off"></i></a>
        <button class="button-nav-toggle hdbtn"><span class="icon">&#9776;</span></button>
        </div>
     -->

     <ul class="nav navbar-top-links navbar-right">

             <li class="dropdown">
                    <a  title="Panel Pengaturan Akun" class="dropdown-toggle putih" data-toggle="dropdown" href="#">
                        <strong style="padding: 2px 0;"><?php echo $_SESSION["nama"];?></strong> &nbsp;
                    </a>
                    <!--
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="index.php?password"><i class="fa fa-cogs"></i> Ganti Password</a>
                        </li>
                        <li>
                            <a href="#" class="logoutK"><i class="fa fa-power-off"></i> Log out</a>
                        </li>
                    </ul>
                    -->
                    <!-- /.dropdown-user -->
                </li>
             <li class="dropdown">
                <button title="Tombol Menu" class="button-nav-toggle hdbtn" style="float: none;"><span class="icon">&#9776;</span></button>
             </li>
     </ul>


 </div>
 </nav>

  </header>

    <div id="wrapper">

        <!-- /. NAV SIDE  -->
         <!-- /. Content Page  -->
        <?php
            if(isset($_GET["dashboard"])){ include "page/dashboard/index.php";}
            //data master
            else if (isset($_GET["fungsi"])){include "page/fungsi/data.php";}
            else if (isset($_GET["tambah-fungsi"])){include "page/fungsi/tambah.php";}
            else if (isset($_GET["update-fungsi"])){include "page/fungsi/update.php";}
            
            else if (isset($_GET["pos-anggaran"])){include "page/posanggaran/data.php";}
            else if (isset($_GET["tambah-pos-anggaran"])){include "page/posanggaran/tambah.php";}
            else if (isset($_GET["update-pos-anggaran"])){include "page/posanggaran/update.php";}
            
            else if (isset($_GET["satuan"])){include "page/satuan/data.php";}
            else if (isset($_GET["tambah-satuan"])){include "page/satuan/tambah.php";}
            else if (isset($_GET["update-satuan"])){include "page/satuan/update.php";}
            //proses usulan anggaran
            else if (isset($_GET["ai"])){include "page/ai/data.php";}
            else if (isset($_GET["tambah-ai"])){include "page/ai/tambah.php";}
            else if (isset($_GET["update-ai"])){include "page/ai/update.php";}
            
            else if (isset($_GET["ao"])){include "page/ao/data.php";}
            else if (isset($_GET["tambah-ao"])){include "page/ao/tambah.php";}
            else if (isset($_GET["update-ao"])){include "page/ao/update.php";}
            //proses approve mapp
            else if (isset($_GET["monitor-approve"])) require_once("page/request/pro-approve.php");
            else if (isset($_GET["form-monitorapprove"])) require_once("page/request/pro-approve-form.php");
            
            else if (isset($_GET["monitor-approve-ao"])) require_once("page/request/pro-approve-ao.php");
            else if (isset($_GET["form-monitorapprove-ao"])) require_once("page/request/pro-approve-form-ao.php");
            //proses evaluasi assman
            else if (isset($_GET["monitor-evaluasi-ai"])){include "page/evaluasi/ai/pro-updated-ai.php";}
            else if (isset($_GET["form-monitorevaluasi-ai"])) require_once("page/evaluasi/ai/pro-updated-form-ai.php");
            else if (isset($_GET["detail-evaluasi-ai"])) require_once("page/evaluasi/ai/detail-ai.php");
            
            else if (isset($_GET["monitor-evaluasi-ao"])){include "page/evaluasi/ao/pro-updated-ao.php";}
            else if (isset($_GET["form-monitorevaluasi-ao"])) require_once("page/evaluasi/ao/pro-updated-form-ao.php");
            else if (isset($_GET["detail-evaluasi-ao"])) require_once("page/evaluasi/ao/detail-ao.php");
            //proses penetapan KI
            else if (isset($_GET["belum-penetapan-ai"])){include "page/penetapan/ai/belum-penetapan-ai.php";}
            else if (isset($_GET["penetapan-ai"])){include "page/penetapan/ai/penetapan.php";}
            else if (isset($_GET["sudah-penetapan-ai"])){include "page/penetapan/ai/sudah-penetapan-ai.php";}
            
            else if (isset($_GET["belum-penetapan-ao"])){include "page/penetapan/ao/belum-penetapan-ao.php";}
            else if (isset($_GET["penetapan-ao"])){include "page/penetapan/ao/penetapan-ao.php";}
            else if (isset($_GET["sudah-penetapan-ao"])){include "page/penetapan/ao/sudah-penetapan-ao.php";}
            //input RAB user
            else if (isset($_GET["rab-ai"])){include "page/rab/ai/data-penetapan.php";}
            else if (isset($_GET["tambah-rab-ai"])){include "page/rab/ai/tambah.php";}
            else if (isset($_GET["update-rab-ai"])){include "page/rab/ai/update.php";}
            else if (isset($_GET["data-rab-ai"])){include "page/rab/ai/data-rab-ai.php";}
            
            else if (isset($_GET["rab-ao"])){include "page/rab/ao/data-penetapan-ao.php";}
            else if (isset($_GET["tambah-rab-ao"])){include "page/rab/ao/tambah.php";}
            else if (isset($_GET["update-rab-ao"])){include "page/rab/ao/update.php";}
            else if (isset($_GET["data-rab-ao"])){include "page/rab/ao/data-rab-ao.php";}
            //approve RAB mapp
            else if (isset($_GET["monitor-rab-ai"])) require_once("page/request/pro-approve-rab.php");
            else if (isset($_GET["approve-rab"])) require_once("page/request/form-app-rab.php");
            
            else if (isset($_GET["monitor-rab-ao"])) require_once("page/request/pro-approve-rab-ao.php");
            else if (isset($_GET["approve-rabao"])) require_once("page/request/form-app-rabao.php");
            //evaluasi RAB assman
            else if (isset($_GET["monitor-eva-rabai"])){include "page/evaluasi/ai/pro-eva-rabai.php";}
            else if (isset($_GET["form-moneva-rabai"])) require_once("page/evaluasi/ai/form-eva-rabai.php");
            else if (isset($_GET["detail-eva-rabai"])) require_once("page/evaluasi/ai/detail-eva-rabai.php");
            
            else if (isset($_GET["monitor-eva-rabao"])){include "page/evaluasi/ao/pro-eva-rabao.php";}
            else if (isset($_GET["form-moneva-rabao"])) require_once("page/evaluasi/ao/form-eva-rabao.php");
            else if (isset($_GET["detail-eva-rabao"])) require_once("page/evaluasi/ao/detail-eva-rabao.php");
            //input realisasi user
            else if (isset($_GET["realisasi"])){include "page/realisasi/ai/data.php";}
            else if (isset($_GET["tambah-realisasi-ai"])){include "page/realisasi/ai/tambah.php";}
            else if (isset($_GET["update-realisasi-ai"])){include "page/realisasi/ai/update.php";}
            
            else if (isset($_GET["realisasi-ao"])){include "page/realisasi/ao/data.php";}
            else if (isset($_GET["tambah-realisasi-ao"])){include "page/realisasi/ao/tambah.php";}
            else if (isset($_GET["update-realisasi-ao"])){include "page/realisasi/ao/update.php";}
            
            else if (isset($_GET["password"])){include "page/changepassnew.php";}
            
            else if (isset($_GET["listuser"])){include "page/listuser.php";}
            else if (isset($_GET["update-listuser"])){include "page/update-listuser.php";}
            else if (isset($_GET["tambah-listuser"])){include "page/tambah-listuser.php";}
            else if (isset($_GET["change-passuser"])){include "page/change-passuser.php";}

            else if (isset($_GET["penyerapan"])){include "page/penyerapan/ai/data.php";}
            
            else if (isset($_GET["lap-ai"])){include "page/lap/lapai.php";}
            else if (isset($_GET["lap-ao"])){include "page/lap/lapao.php";}
            
            
            
            else{include "page/notfound.php";}
        ?>
          <?php /* PAGE WRAPPER */ ?>
    </div>
     <!-- /. WRAPPER  -->
  <!-- menu -->
        <div class="menu">
          <nav class="nav-main">
            <div class="nav-container">

                <?php
                if($_SESSION["jenisuser"]=="app")
                {
                    if($_SESSION["level"]=="manajer")
                    {
                        echo menumapp();
                    }
                    else if($_SESSION["level"]=="asman")
                    {
                        echo menuAssmen();
                    }
                    else
                    {
                        echo menuUs();
                    }
                }
                else if($_SESSION["jenisuser"]=="administrator")
                {
                    echo menuAdmin();
                }
                else if($_SESSION["jenisuser"]=="ki")
                {
                    echo menuKI();
                }
                ?>

            </div>
          </nav>
        </div>
</div>

    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- konfirmasi -->
    <script src="assets/js/custom.js"></script>
    <!-- confirm -->

    <script src="assets/confirmdell/jquery.confirm/jquery.confirm.js"></script>
    <script src="assets/confirmdell/js/script2.js"></script>

</body>
</html>
<?php ob_end_flush(); ?>
