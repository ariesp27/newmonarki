<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Jakarta");
include "../config/koneksi.php";

if( ! isset($_SESSION["level"])) header("location:login.php?noakses");

if(isset($_GET["delete-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-ai"]));
    $idE = mysql_real_escape_string(trim($_GET["delete-ang"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?ai&sukseshapus");
}
else if(isset($_GET["delete-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-ao"]));
    $idE = mysql_real_escape_string(trim($_GET["delete-ango"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?ao&sukseshapus");
}
else if(isset($_GET["delete-approve-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-approve-ai"]));
    $idE = mysql_real_escape_string(trim($_GET["delete-approve-ang"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-approve&sukseshapus");
}
else if(isset($_GET["delete-approve-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-approve-ao"]));
    $idE = mysql_real_escape_string(trim($_GET["delete-approve-ango"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-approve-ao&sukseshapus");
}
else if(isset($_GET["delete-evaluasi-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-evaluasi-ai"]));
    $idE = mysql_real_escape_string(trim($_GET["delete-evaluasi-ang"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-evaluasi-ai&sukseshapus");
}
else if(isset($_GET["delete-evaluasi-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-evaluasi-ao"]));
    $idE = mysql_real_escape_string(trim($_GET["delete-evaluasi-ango"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-evaluasi-ai&sukseshapus");
}
else if(isset($_GET["delblm-penetapan-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["delblm-penetapan-ai"]));
    $idE = mysql_real_escape_string(trim($_GET["delblm-penetapan-ang"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?belum-penetapan-ai&sukseshapus");
}
else if(isset($_GET["delblm-penetapan-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delblm-penetapan-ao"]));
    $idE = mysql_real_escape_string(trim($_GET["delblm-penetapan-ango"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?belum-penetapan-ao&sukseshapus");
}
else if(isset($_GET["delsdh-penetapan-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["delsdh-penetapan-ai"]));
    $idE = mysql_real_escape_string(trim($_GET["delsdh-penetapan-ang"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?sudah-penetapan-ai&sukseshapus");
}
else if(isset($_GET["delsdh-penetapan-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delsdh-penetapan-ao"]));
    $idE = mysql_real_escape_string(trim($_GET["delsdh-penetapan-ango"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?sudah-penetapan-ao&sukseshapus");
}
else if(isset($_GET["delete-rab-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-rab-ai"]));
    $idE = mysql_real_escape_string(trim($_GET["delete-rab-ang"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?data-rab-ai&sukseshapus");
}
else if(isset($_GET["delete-rab-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-rab-ao"]));
    $idE = mysql_real_escape_string(trim($_GET["delete-rab-ango"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?data-rab-ao&sukseshapus");
}
else if(isset($_GET["delete-apprab-ai"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-apprab-ai"]));
    $idE = mysql_real_escape_string(trim($_GET["delete-apprab-ang"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-approve&sukseshapus");
}
else if(isset($_GET["delete-apprab-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-apprab-ao"]));
    $idE = mysql_real_escape_string(trim($_GET["delete-apprab-ango"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-approve-ao&sukseshapus");
}
else if(isset($_GET["del-eva-rabai"])){
    $idD = mysql_real_escape_string(trim($_GET["del-eva-rabai"]));
    $idE = mysql_real_escape_string(trim($_GET["del-eva-rabang"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-eva-rabai&sukseshapus");
}
else if(isset($_GET["del-eva-rabao"])){
    $idD = mysql_real_escape_string(trim($_GET["del-eva-rabao"]));
    $idE = mysql_real_escape_string(trim($_GET["del-eva-rabango"]));
    
    mysql_query("DELETE FROM headeranggaran WHERE kodeanggaran ='$idE'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idD'") or die(mysql_error());
    header("location:../index.php?monitor-eva-rabao&sukseshapus");
}
else if(isset($_GET["delete-realisasi"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-realisasi"]));
    $idE = mysql_real_escape_string(trim($_GET["del-redetail"]));

    mysql_query("DELETE FROM realisasi WHERE koderealisasi ='$idD'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idE'") or die(mysql_error());
    header("location:../index.php?realisasi&sukseshapus");
}
else if(isset($_GET["delete-realisasi-ao"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-realisasi-ao"]));
    $idE = mysql_real_escape_string(trim($_GET["del-redetail-ao"]));

    mysql_query("DELETE FROM realisasi WHERE koderealisasi ='$idD'") or die(mysql_error());
    mysql_query("DELETE FROM newdetailanggaran WHERE kodedetail ='$idE'") or die(mysql_error());
    header("location:../index.php?realisasi-ao&sukseshapus");








else if(isset($_GET["delete-fungsi"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-fungsi"]));

    mysql_query("DELETE FROM fungsi WHERE kodefungsi ='$idD'") or die(mysql_error());
    header("location:../index.php?fungsi&sukseshapus");
}
else if(isset($_GET["delete-pos-anggaran"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-pos-anggaran"]));

    mysql_query("DELETE FROM pos_anggaran WHERE kode_posanggaran ='$idD'") or die(mysql_error());
    header("location:../index.php?pos-anggaran&sukseshapus");
}
else if(isset($_GET["delete-satuan"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-satuan"]));

    mysql_query("DELETE FROM satuan WHERE kodesatuan ='$idD'") or die(mysql_error());
    header("location:../index.php?satuan&sukseshapus");
}
else if(isset($_GET["delete-listuser"])){
    $idD = mysql_real_escape_string(trim($_GET["delete-listuser"]));

    mysql_query("DELETE FROM user_login WHERE kodelogin ='$idD'") or die(mysql_error());
    header("location:../index.php?listuser&sukseshapus");
}

}