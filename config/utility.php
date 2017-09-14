<?php
	function tglindonesia ($thedate) {
		//untuk dapatkan hari yg di posisi 11 sbnyk 2 krktr
		$jam=substr($thedate,11,2);
		//untuk dapatkan hari yg di posisi 14 sbnyk 2 krktr
		$menit=substr($thedate,14,2);
		//untuk dapatkan hari yg di posisi 8 sbnyk 2 krktr
		$hari=substr($thedate,8,2);
		//untuk dapatkan hari yg di posisi 5 sbnyk 2 krktr
		$bulan=get_namabulan(substr($thedate,5,2));
		//untuk dapatkan hari yg di posisi 0 sbnyk 4 krktr
		$tahun=substr($thedate,0,4);
		//pengabungan variabel $hari $bulan $tahun
		$tanggal="$hari $bulan $tahun";
		//fungsi hasil output variabel $tanggal
		return $tanggal;
	}
    	function waktuindo ($thedate) {
		//untuk dapatkan hari yg di posisi 11 sbnyk 2 krktr
		$jam=substr($thedate,11,2);
		//untuk dapatkan hari yg di posisi 14 sbnyk 2 krktr
		$menit=substr($thedate,14,2);
		//untuk dapatkan hari yg di posisi 8 sbnyk 2 krktr
		$hari=substr($thedate,8,2);
		//untuk dapatkan hari yg di posisi 5 sbnyk 2 krktr
		$bulan=get_namabulan(substr($thedate,5,2));
		//untuk dapatkan hari yg di posisi 0 sbnyk 4 krktr
		$tahun=substr($thedate,0,4);
		//pengabungan variabel $hari $bulan $tahun
		$tanggal="$hari $bulan $tahun - $jam:$menit";
		//fungsi hasil output variabel $tanggal
		return $tanggal;
	}
	function ambilbulan ($thedate) {
		$bulan=get_namabulan(substr($thedate,5,2));
		$tanggal="$bulan";
		return $tanggal;
	}
	//konversi angka bulan jadi huruf
	function get_namabulan($bulan) {
		//cek bulan isinya apa?
		switch($bulan) {
		//jika isinya 1 berarti nama bulan januari
			case 1 :
				$namabulan="Januari";
				break;
			case 2 :
				$namabulan="Februari";
				break;
			case 3 :
				$namabulan="Maret";
				break;
			case 4 :
				$namabulan="April";
				break;
			case 5 :
				$namabulan="Mei";
				break;
			case 6 :
				$namabulan="Juni";
				break;
			case 7 :
				$namabulan="Juli";
				break;
			case 8 :
				$namabulan="Agustus";
				break;
			case 9 :
				$namabulan="September";
				break;
			case 10 :
				$namabulan="Oktober";
				break;
			case 11 :
				$namabulan="November";
				break;
			case 12 :
				$namabulan="Desember";
				break;
		}
		return $namabulan;
	}
 
	function get_tanggalsekarang($selection) {
		date_default_timezone_set('Asia/Jakarta'); // set standar waktu jakarta
		$thedate=getdate();
		$years=$thedate["year"];	
		$months=$thedate["mon"];
		$days=$thedate["mday"];
		$hours=$thedate["hours"];
		$minutes=$thedate["minutes"];
		$seconds=$thedate["seconds"];
		
		switch ($selection) {
			case "year" :
				return $years;
				break;
			case "month" :
				return $months;
				break;
			case "day" :
				return $days;
				break;
			case "hour" :
				return $hours;
				break;
			case "minute" :
				return $minutes;
				break;
			case "second" :
				return $seconds;
				break;	
		}
	}

function format_tgl($tgl) {
	$tgl_ind=substr($tgl,8,2)."-".substr($tgl,5,2)."-".substr($tgl,0,4);
	return $tgl_ind;
}
function tglformataction($tgl){
        $thn=substr($tgl,6,4);
        $bulan=substr($tgl,3,2);
        $hari=substr($tgl,0,2);
        $tanggal = "$thn-$bulan-$hari";
        return $tanggal;
    }

function thumbnail($src, $dist, $dis_width = 100 ){

	$img = '';
	$extension = strtolower(strrchr($src, '.'));
	switch($extension)
	{
		case '.jpg':
		case '.jpeg':
			$img = @imagecreatefromjpeg($src);
			break;
		case '.gif':
			$img = @imagecreatefromgif($src);
			break;
		case '.png':
			$img = @imagecreatefrompng($src);
			break;
	}
	$width = imagesx($img);
	$height = imagesy($img);




	$dis_height = $dis_width * ($height / $width);

	$new_image = imagecreatetruecolor($dis_width, $dis_height);
	imagecopyresampled($new_image, $img, 0, 0, 0, 0, $dis_width, $dis_height, $width, $height);


	$imageQuality = 100;

	switch($extension)
	{
		case '.jpg':
		case '.jpeg':
			if (imagetypes() & IMG_JPG) {
				imagejpeg($new_image, $dist, $imageQuality);
			}
			break;

		case '.gif':
			if (imagetypes() & IMG_GIF) {
				imagegif($new_image, $dist);
			}
			break;

		case '.png':
			$scaleQuality = round(($imageQuality/100) * 9);
			$invertScaleQuality = 9 - $scaleQuality;

			if (imagetypes() & IMG_PNG) {
				imagepng($new_image, $dist, $invertScaleQuality);
			}
			break;
	}
	imagedestroy($new_image);
}

