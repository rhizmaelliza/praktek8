<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style>
		.warning {color:#FF0000;}
		body{
			display: center;
			position: center;
			background-color: lightgrey;
			font-family: consolas;
		}
		h1{
			font-weight: 1000;
		}
		h2{
			font-weight: 1000;
		}
	</style>
</head>
<body>
<?php
include "koneksidatabase.php";
//Deklarasi variabel
$error_id="";
$error_tanggal="";
$error_jenis_pendaftaran="";
$error_tanggal_masuk_sekolah="";
$error_nis="";
$error_nomor_peserta_ujian="";
$error_pernah_paud="";
$error_pernah_tk="";
$error_skhun="";
$error_ijazah="";
$error_hobi="";
$error_citacita="";
$error_nama="";
$error_jenis_kelamin="";
$error_nisn="";
$error_nik="";
$error_tempat_lahir="";
$error_tanggal_lahir="";
$error_agama="";
$error_berkebutuhan_khusus="";
$error_alamat="";
$error_rt="";
$error_rw="";
$error_dusun="";
$error_desa="";
$error_kecamatan="";
$error_kode_pos="";
$error_tempat_tinggal="";
$error_transportasi="";
$error_hp="";
$error_email="";
$error_telp="";
$error_penerima_kps="";
$error_no_kps="";
$error_kewarganegaraan="";
$error_nama_negara="";
$error_nama_ayah="";
$error_tahun_ayah="";
$error_pendidikan_ayah="";
$error_pekerjaan_ayah="";
$error_penghasilan_ayah="";
$error_berkebutuhan_khusus_ayah="";
$error_nama_ibu="";
$error_tahun_ibu="";
$error_pendidikan_ibu="";
$error_pekerjaan_ibu="";
$error_penghasilan_ibu="";
$error_berkebutuhan_khusus_ibu="";

$id="";
$tanggal="";
$jenis_pendaftaran="";
$tanggal_masuk_sekolah="";
$nis="";
$nomor_peserta_ujian="";
$pernah_paud="";
$pernah_tk="";
$skhun="";
$ijazah="";
$hobi="";
$citacita="";
$nama="";
$jenis_kelamin="";
$nisn="";
$nik="";
$tempat_lahir="";
$tanggal_lahir="";
$agama="";
$berkebutuhan_khusus="";
$alamat="";
$rt="";
$rw="";
$dusun="";
$desa="";
$kecamatan="";
$kode_pos="";
$tempat_tinggal="";
$transportasi="";
$hp="";
$email="";
$telp="";
$penerima_kps="";
$no_kps="";
$kewarganegaraan="";
$nama_negara="";
$nama_ayah="";
$tahun_ayah="";
$pendidikan_ayah="";
$pekerjaan_ayah="";
$penghasilan_ayah="";
$berkebutuhan_khusus_ayah="";
$nama_ibu="";
$tahun_ibu="";
$pendidikan_ibu="";
$pekerjaan_ibu="";
$penghasilan_ibu="";
$berkebutuhan_khusus_ibu="";


//Jika method POST dijalankan
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	//ID Pendaftaran
	if(empty($_POST["id"])){
		$error_id="*Data wajib diisi";
	}
	else{
		$id=cek_input($_POST["id"]);
		if(!is_numeric($id)){
			$error_id="ID hanya boleh berupa angka";
		}
	}

	//Tanggal pendaftaran
	if(empty($_POST["tanggal"])){
		$error_tanggal="*Data wajib diisi";
	}
	else{
		$tanggal=cek_input($_POST["tanggal"]);
		$tanggal=date('Y-m-d', strtotime($tanggal));
	}

	//Jenis pendaftaran
	if(empty($_POST["jenis_pendaftaran"])){
		$error_jenis_pendaftaran="*Data wajib diisi";
	}
	else{
		$jenis_pendaftaran=cek_input($_POST["jenis_pendaftaran"]);
		if($jenis_pendaftaran == "01"){
			$jenis_pendaftaran="Siswa Baru";	
		}
		elseif($jenis_pendaftaran == "02"){
			$jenis_pendaftaran="Pindahan";	
		}
		else{
			$error_jenis_pendaftaran="Masukkan pilihan jenis pendaftaran dengan benar";
		}
	}

	//Tanggal masuk sekolah
	if(empty($_POST["tanggal_masuk_sekolah"])){
		$error_tanggal_masuk_sekolah="*Data wajib diisi";
	}
	else{
		$tanggal_masuk_sekolah=cek_input($_POST["tanggal_masuk_sekolah"]);
		$tanggal_masuk_sekolah=date('Y-m-d', strtotime($tanggal_masuk_sekolah));
	}

	//NIS
	if(empty($_POST["nis"])){
		$error_nis="*Data wajib diisi";
	}
	else{
		$nis=cek_input($_POST["nis"]);
		if(!is_numeric($nis)){
			$error_nis="NIS hanya boleh berupa angka";
		}
	}

	//Nomor peserta ujian
	if(empty($_POST["nomor_peserta_ujian"])){
		$error_nomor_peserta_ujian="*Data wajib diisi";
	}
	else{
		$nomor_peserta_ujian=cek_input($_POST["nomor_peserta_ujian"]);
		if(!is_numeric($nomor_peserta_ujian)){
			$error_nomor_peserta_ujian="Nomor Peserta Ujian hanya boleh berupa angka";
		}
		elseif (strlen($nomor_peserta_ujian) != 20) {
			$error_nomor_peserta_ujian="Panjang Nomor Peserta Ujian harus berjumlah 20 digit";
		}
	}

	//Pernah PAUD
	if(empty($_POST["pernah_paud"])){
		$error_pernah_paud="*Data wajib diisi";
	}
	else{
		$pernah_paud=cek_input($_POST["pernah_paud"]);
	}

	//Pernah TK
	if(empty($_POST["pernah_tk"])){
		$error_pernah_tk="*Data wajib diisi";
	}
	else{
		$pernah_tk=cek_input($_POST["pernah_tk"]);
	}

	//SKHUN
	if(empty($_POST["skhun"])){
		$error_skhun="*Data wajib diisi";
	}
	else{
		$skhun=cek_input($_POST["skhun"]);
		if(!is_numeric($skhun)){
			$error_skhun="Nomor Seri SKHUN hanya boleh berupa angka";
		}
		elseif (strlen($skhun) != 16) {
			$error_skhun="Panjang Nomor Seri SKHUN harus berjumlah 16 digit";
		}
	}

	//Ijazah
	if(empty($_POST["ijazah"])){
		$error_ijazah="*Data wajib diisi";
	}
	else{
		$ijazah=cek_input($_POST["ijazah"]);
		if(!is_numeric($ijazah)){
			$error_ijazah="Nomor Seri Ijazah hanya boleh berupa angka";
		}
		elseif (strlen($ijazah) != 16) {
			$error_ijazah="Panjang Nomor Seri Ijazah harus 16 digit";
		}
	}

	//Hobi
	if(empty($_POST["hobi"])){
		$error_hobi="*Data wajib diisi";
	}
	else{
		$hobi=cek_input($_POST["hobi"]);
		if($hobi == "A"){
			$hobi="Olah Raga";	
		}
		elseif($hobi == "B"){
			$hobi="Kesenian";	
		}
		elseif($hobi == "C"){
			$hobi="Membaca";	
		}
		elseif($hobi == "D"){
			$hobi="Menulis";	
		}
		elseif($hobi == "E"){
			$hobi="Travelling";	
		}
		elseif($hobi == "F"){
			$hobi="Lainnya";	
		}
		else{
			$error_hobi="Masukkan pilihan dengan benar";
		}
	}

	//Cita-cita
	if(empty($_POST["citacita"])){
		$error_citacita="*Data wajib diisi";
	}
	else{
		$citacita=cek_input($_POST["citacita"]);
		if($citacita == "A"){
			$citacita="PNS";	
		}
		elseif($citacita == "B"){
			$citacita="TNI/POLRI";	
		}
		elseif($citacita == "C"){
			$citacita="Guru/Dosen";	
		}
		elseif($citacita == "D"){
			$citacita="Dokter";	
		}
		elseif($citacita == "E"){
			$citacita="Politikus";	
		}
		elseif($citacita == "F"){
			$citacita="Wiraswasta";	
		}
		elseif($citacita == "G"){
			$citacita="Seni/Lukis/Artis/Sejenis";	
		}
		elseif($citacita == "H"){
			$citacita="Lainnya";	
		}
		else{
			$error_citacita="Masukkan pilihan dengan benar";
		}
	}

	//Nama lengkap
	if(empty($_POST["nama"])){
		$error_nama="*Data wajib diisi";
	}
	else{
		$nama=cek_input($_POST["nama"]);
		if(!preg_match("/^[a-zA-z ]*$/", $nama)){
			$error_nama="Inputan hanya boleh berupa huruf dan spasi";
		}
	}

	//Jenis kelamin
	if(empty($_POST["jenis_kelamin"])){
		$error_jenis_kelamin="*Data wajib diisi";
	}
	else{
		$jenis_kelamin=cek_input($_POST["jenis_kelamin"]);
	}

	//NISN
	if(empty($_POST["nisn"])){
		$error_nisn="*Data wajib diisi";
	}
	else{
		$nisn=cek_input($_POST["nisn"]);
		if(!is_numeric($nisn)){
			$error_nisn="NISN hanya boleh berupa angka";
		}
	}

	//NIK
	if(empty($_POST["nik"])){
		$error_nik="*Data wajib diisi";
	}
	else{
		$nik=cek_input($_POST["nik"]);
		if(!is_numeric($nik)){
			$error_nik="NIK hanya boleh berupa angka";
		}
	}

	//Tempat lahir
	if(empty($_POST["tempat_lahir"])){
		$error_tempat_lahir="Data wajib diisi";
	}
	else{
		$tempat_lahir=cek_input($_POST["tempat_lahir"]);
		if(!preg_match("/^[a-zA-z ]*$/", $tempat_lahir)){
			$error_tempat_lahir="Inputan Hanya Boleh Huruf dan Spasi";
		}
	}

	//Tanggal lahir
	if(empty($_POST["tanggal_lahir"])){
		$error_tanggal_lahir="*Data wajib diisi";
	}
	else{
		$tanggal_lahir=cek_input($_POST["tanggal_lahir"]);
		$tanggal_lahir=date('Y-m-d', strtotime($tanggal_lahir));
	}

	//Agama
	if(empty($_POST["agama"])){
		$error_agama="*Data wajib diisi";
	}
	else{
		$agama=cek_input($_POST["agama"]);
		if($agama == "01"){
			$agama="Islam";	
		}
		elseif($agama == "02"){
			$agama="Kristen/Protestan";	
		}
		elseif($agama == "03"){
			$agama="Katholik";	
		}
		elseif($agama == "04"){
			$agama="Hindu";	
		}
		elseif($agama == "05"){
			$agama="Buddha";	
		}
		elseif($agama == "06"){
			$agama="Khong Hu Chu";	
		}
		elseif($agama == "99"){
			$agama="Lainnya";	
		}
		else{
			$error_agama="Masukkan pilihan agama dengan benar";
		}
	}

	//Berkebutuhan khusus
	if(empty($_POST["berkebutuhan_khusus"])){
		$error_berkebutuhan_khusus="*Data wajib diisi";
	}
	else{
		$berkebutuhan_khusus=cek_input($_POST["berkebutuhan_khusus"]);
		if($berkebutuhan_khusus == "01"){
			$berkebutuhan_khusus="Tidak";	
		}
		elseif($berkebutuhan_khusus == "02"){
			$berkebutuhan_khusus="Netra (A)";	
		}
		elseif($berkebutuhan_khusus == "03"){
			$berkebutuhan_khusus="Rungu (B)";	
		}
		elseif($berkebutuhan_khusus == "04"){
			$berkebutuhan_khusus="Grahita Ringan (C)";	
		}
		elseif($berkebutuhan_khusus == "05"){
			$berkebutuhan_khusus="Grahita Sedang (C1)";	
		}
		elseif($berkebutuhan_khusus == "06"){
			$berkebutuhan_khusus="Daksa Ringan (D)";	
		}
		elseif($berkebutuhan_khusus == "07"){
			$berkebutuhan_khusus="Daksa Sedang (D1)";	
		}
		elseif($berkebutuhan_khusus == "08"){
			$berkebutuhan_khusus="Laras (E)";	
		}
		elseif($berkebutuhan_khusus == "09"){
			$berkebutuhan_khusus="Wicara (F)";	
		}
		elseif($berkebutuhan_khusus == "10"){
			$berkebutuhan_khusus="Tuna Ganda (B)";	
		}
		elseif($berkebutuhan_khusus == "11"){
			$berkebutuhan_khusus="Hiper Aktif (H)";	
		}
		elseif($berkebutuhan_khusus == "12"){
			$berkebutuhan_khusus="Cerdas Istimewa (i)";	
		}
		elseif($berkebutuhan_khusus == "13"){
			$berkebutuhan_khusus="Bakat Istimewa (J)";	
		}
		elseif($berkebutuhan_khusus == "14"){
			$berkebutuhan_khusus="Kesulitan Belajar (K)";	
		}
		elseif($berkebutuhan_khusus == "15"){
			$berkebutuhan_khusus="Narkoba (N)";	
		}
		elseif($berkebutuhan_khusus == "16"){
			$berkebutuhan_khusus="Indigo (O)";	
		}
		elseif($berkebutuhan_khusus == "17"){
			$berkebutuhan_khusus="Down Sindrome (P)";	
		}
		elseif($berkebutuhan_khusus == "18"){
			$berkebutuhan_khusus="Autis (Q)";	
		}
		else{
			$error_berkebutuhan_khusus="Masukkan pilihan berkebutuhan khusus dengan benar";
		}
	}

	//Alamat 
	if(empty($_POST["alamat"])){
		$error_alamat="*Data wajib diisi";
	}
	else{
		$alamat=cek_input($_POST["alamat"]);
	}

	//RT
	if(empty($_POST["rt"])){
		$error_rt="*Data wajib diisi";
	}
	else{
		$rt=cek_input($_POST["rt"]);
		if(!is_numeric($rt)){
			$error_rt="RT hanya boleh berupa angka";
		}
	}

	//RW
	if(empty($_POST["rw"])){
		$error_rw="*Data wajib diisi";
	}
	else{
		$rw=cek_input($_POST["rw"]);
		if(!is_numeric($rw)){
			$error_rw="RW hanya boleh berupa angka";
		}
	}

	//Dusun
	if(empty($_POST["dusun"])){
		$error_dusun="*Data wajib diisi";
	}
	else{
		$dusun=cek_input($_POST["dusun"]);
		if(!preg_match("/^[a-zA-z ]*$/", $dusun)){
			$error_dusun="Inputan Hanya Boleh Huruf dan Spasi";
		}
	}	

	//Desa/Kelurahan
	if(empty($_POST["desa"])){
		$error_desa="*Data wajib diisi";
	}
	else{
		$desa=cek_input($_POST["desa"]);
		if(!preg_match("/^[a-zA-z ]*$/", $desa)){
			$error_desa="Inputan Hanya Boleh Huruf dan Spasi";
		}
	}

	//Kecamatan
	if(empty($_POST["kecamatan"])){
		$error_kecamatan="*Data wajib diisi";
	}
	else{
		$kecamatan=cek_input($_POST["kecamatan"]);
		if(!preg_match("/^[a-zA-z ]*$/", $kecamatan)){
			$error_kecamatan="Inputan Hanya Boleh Huruf dan Spasi";
		}
	}

	//Kode pos
	if(empty($_POST["kode_pos"])){
		$error_kode_pos="*Data wajib diisi";
	}
	else{
		$kode_pos=cek_input($_POST["kode_pos"]);
		if(!is_numeric($kode_pos)){
			$error_kode_pos="Kode Pos hanya boleh berupa angka";
		}
	}

	//Tempat Tinggal
	if(empty($_POST["tempat_tinggal"])){
		$error_tempat_tinggal="*Data wajib diisi";
	}
	else{
		$tempat_tinggal=cek_input($_POST["tempat_tinggal"]);
		if($tempat_tinggal == "01"){
			$tempat_tinggal="Bersama Orang Tua";	
		}
		elseif($tempat_tinggal == "02"){
			$tempat_tinggal="Wali";	
		}
		elseif($tempat_tinggal == "03"){
			$tempat_tinggal="Kos";	
		}
		elseif($tempat_tinggal == "04"){
			$tempat_tinggal="Asrama";	
		}
		elseif($tempat_tinggal == "05"){
			$tempat_tinggal="Panti Asuhan";	
		}
		elseif($tempat_tinggal == "99"){
			$tempat_tinggal="Lainnya";	
		}
		else{
			$error_tempat_tinggal="Masukkan pilihan tempat tinggal dengan benar";
		}
	}

	//Moda transportasi
	if(empty($_POST["transportasi"])){
		$error_transportasi="*Data wajib diisi";
	}
	else{
		$transportasi=cek_input($_POST["transportasi"]);
		if($transportasi == "01"){
			$transportasi="Jalan Kaki";	
		}
		elseif($transportasi == "02"){
			$transportasi="Kendaraan Pribadi";	
		}
		elseif($transportasi == "03"){
			$transportasi="Kendaraan Umum/Angkot/Pete-pete";	
		}
		elseif($transportasi == "04"){
			$transportasi="Jemputan Sekolah";	
		}
		elseif($transportasi == "05"){
			$transportasi="Kereta Api";	
		}
		elseif($transportasi == "06"){
			$transportasi="Ojek";	
		}
		elseif($transportasi == "07"){
			$transportasi="Andong/Bendi/Sado/Dokar/Delman/Becak";	
		}
		elseif($transportasi == "08"){
			$transportasi="Perahu Penyeberangan/Rakit/Getek";	
		}
		elseif($transportasi == "99"){
			$transportasi="Lainnya";	
		}
		else{
			$error_transportasi="Masukkan pilihan kendaraan dengan benar";
		}
	}

	//No Handphone
	if(empty($_POST["hp"])){
		$error_hp="*Data wajib diisi";
	}
	else{
		$hp=cek_input($_POST["hp"]);
		if(!is_numeric($hp)){
			$error_hp="Nomor HP hanya boleh angka";
		}
	}

	//Email
	if(empty($_POST["email"])){
		$error_email="*Data wajib diisi";
	}
	else{
		$email=cek_input($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error_email="Format Email Invalid";
		}
	}

	//No Telepon
	if(empty($_POST["telp"])){
		$error_telp="*Data wajib diisi";
	}
	else{
		$telp=cek_input($_POST["telp"]);
		if(!is_numeric($telp)){
			$error_telp="Nomor Telepon hanya boleh angka";
		}
	}

	//Penerima KPS/PKH/KIP
	if(empty($_POST["penerima_kps"])){
		$error_penerima_kps="*Data wajib diisi";
	}
	else{
		$penerima_kps=cek_input($_POST["penerima_kps"]);
	}

	//Nomor KPS/KKS/PKH/KIP
	$no_kps=cek_input($_POST["no_kps"]);
	if(!is_numeric($no_kps)){
		$error_no_kps="Nomor KPS/KKS/PKH/KIP hanya boleh angka";
	}

	//Kewarganegaraan
	if(empty($_POST["kewarganegaraan"])){
		$error_kewarganegaraan="*Data wajib diisi";
	}
	else{
		$kewarganegaraan=cek_input($_POST["kewarganegaraan"]);
	}	

	//Nama negara
	if ($kewarganegaraan == "WNA") {
		if(empty($_POST["nama_negara"])){
			$error_nama_negara="*Data wajib diisi";
		}
		else{
			$nama_negara=cek_input($_POST["nama_negara"]);
			if(!preg_match("/^[a-zA-z ]*$/", $nama_negara)){
				$error_nama_negara="Inputan Hanya Boleh Huruf dan Spasi";
			}
		}
	}
	elseif ($kewarganegaraan == "WNI") {
		$nama_negara="Indonesia";
	}

	//Nama lengkap ayah
	if(empty($_POST["nama_ayah"])){
		$error_nama_ayah="*Data wajib diisi";
	}
	else{
		$nama_ayah=cek_input($_POST["nama_ayah"]);
		if(!preg_match("/^[a-zA-z ]*$/", $nama_ayah)){
			$error_nama_ayah="Inputan Hanya Boleh Huruf dan Spasi";
		}
	}

	//Tahun lahir ayah
	if(empty($_POST["tahun_ayah"])){
		$error_tahun_ayah="*Data wajib diisi";
	}
	else{
		$tahun_ayah=cek_input($_POST["tahun_ayah"]);
		if(!is_numeric($tahun_ayah)){
			$error_tahun_ayah="Tahun lahir hanya boleh angka";
		}
	}

	//Pendidikan ayah
	if(empty($_POST["pendidikan_ayah"])){
		$error_pendidikan_ayah="*Data wajib diisi";
	}
	else{
		$pendidikan_ayah=cek_input($_POST["pendidikan_ayah"]);
		if($pendidikan_ayah == "01"){
			$pendidikan_ayah="Tidak sekolah";	
		}
		elseif($pendidikan_ayah == "02"){
			$pendidikan_ayah="Putus SD";	
		}
		elseif($pendidikan_ayah == "03"){
			$pendidikan_ayah="SD Sederajat";	
		}
		elseif($pendidikan_ayah == "04"){
			$pendidikan_ayah="SMP Sederajat";	
		}
		elseif($pendidikan_ayah == "05"){
			$pendidikan_ayah="SMA Sederajat";	
		}
		elseif($pendidikan_ayah == "06"){
			$pendidikan_ayah="D1";	
		}
		elseif($pendidikan_ayah == "07"){
			$pendidikan_ayah="D2";	
		}
		elseif($pendidikan_ayah == "08"){
			$pendidikan_ayah="D3";	
		}

		elseif($pendidikan_ayah == "09"){
			$pendidikan_ayah="D4/S1";	
		}
		elseif($pendidikan_ayah == "10"){
			$pendidikan_ayah="S2";	
		}
		elseif($pendidikan_ayah == "11"){
			$pendidikan_ayah="S3";	
		}
		else{
			$error_pendidikan_ayah="Masukkan pilihan pendidikan dengan benar";
		}
	}

	//Pekerjaan ayah
	if(empty($_POST["pekerjaan_ayah"])){
		$error_pekerjaan_ayah="*Data wajib diisi";
	}
	else{
		$pekerjaan_ayah=cek_input($_POST["pekerjaan_ayah"]);
		if($pekerjaan_ayah == "01"){
			$pekerjaan_ayah="Tidak bekerja";	
		}
		elseif($pekerjaan_ayah == "02"){
			$pekerjaan_ayah="Nelayan";	
		}
		elseif($pekerjaan_ayah == "03"){
			$pekerjaan_ayah="Petani";	
		}
		elseif($pekerjaan_ayah == "04"){
			$pekerjaan_ayah="Peternak";	
		}
		elseif($pekerjaan_ayah == "05"){
			$pekerjaan_ayah="PNS/TNI/POLRI";	
		}
		elseif($pekerjaan_ayah == "06"){
			$pekerjaan_ayah="Karyawan Swasta";	
		}
		elseif($pekerjaan_ayah == "07"){
			$pekerjaan_ayah="Pedagang Kecil";	
		}
		elseif($pekerjaan_ayah == "08"){
			$pekerjaan_ayah="Pedagang Besar";	
		}

		elseif($pekerjaan_ayah == "09"){
			$pekerjaan_ayah="Wiraswasta";	
		}
		elseif($pekerjaan_ayah == "10"){
			$pekerjaan_ayah="Wirausaha";	
		}
		elseif($pekerjaan_ayah == "11"){
			$pekerjaan_ayah="Buruh";	
		}
		elseif($pekerjaan_ayah == "12"){
			$pekerjaan_ayah="Pensiunan";	
		}
		elseif($pekerjaan_ayah == "99"){
			$pekerjaan_ayah="Lainnya";	
		}
		else{
			$error_pekerjaan_ayah="Masukkan pilihan pekerjaan dengan benar";
		}
	}

	//Penghasilan ayah
	if(empty($_POST["penghasilan_ayah"])){
		$error_penghasilan_ayah="*Data wajib diisi";
	}
	else{
		$penghasilan_ayah=cek_input($_POST["penghasilan_ayah"]);
		if($penghasilan_ayah == "01"){
			$penghasilan_ayah="Kurang dari 500.000";	
		}
		elseif($penghasilan_ayah == "02"){
			$penghasilan_ayah="500 ribu-999.999";	
		}
		elseif($penghasilan_ayah == "03"){
			$penghasilan_ayah="1 juta-1.999.999";	
		}
		elseif($penghasilan_ayah == "04"){
			$penghasilan_ayah="2 juta-4.999.999";	
		}
		elseif($penghasilan_ayah == "5"){
			$penghasilan_ayah="5 juta-20 juta";	
		}
		elseif($penghasilan_ayah == "06"){
			$penghasilan_ayah="Lebih dari 20 juta";	
		}
		else{
			$error_penghasilan_ayah="Masukkan pilihan pekerjaan dengan benar";
		}
	}

	//Berkebutuhan khusus ayah
	if(empty($_POST["berkebutuhan_khusus_ayah"])){
		$error_berkebutuhan_khusus_ayah="*Data wajib diisi";
	}
	else{
		$berkebutuhan_khusus_ayah=cek_input($_POST["berkebutuhan_khusus_ayah"]);
		if($berkebutuhan_khusus_ayah == "01"){
			$berkebutuhan_khusus_ayah="Tidak";	
		}
		elseif($berkebutuhan_khusus_ayah == "02"){
			$berkebutuhan_khusus_ayah="Netra (A)";	
		}
		elseif($berkebutuhan_khusus_ayah == "03"){
			$berkebutuhan_khusus_ayah="Rungu (B)";	
		}
		elseif($berkebutuhan_khusus_ayah == "04"){
			$berkebutuhan_khusus_ayah="Grahita Ringan (C)";	
		}
		elseif($berkebutuhan_khusus_ayah == "05"){
			$berkebutuhan_khusus_ayah="Grahita Sedang (C1)";	
		}
		elseif($berkebutuhan_khusus_ayah == "06"){
			$berkebutuhan_khusus_ayah="Daksa Ringan (D)";	
		}
		elseif($berkebutuhan_khusus_ayah == "07"){
			$berkebutuhan_khusus_ayah="Daksa Sedang (D1)";	
		}
		elseif($berkebutuhan_khusus_ayah == "08"){
			$berkebutuhan_khusus_ayah="Laras (E)";	
		}
		elseif($berkebutuhan_khusus_ayah == "09"){
			$berkebutuhan_khusus_ayah="Wicara (F)";	
		}
		elseif($berkebutuhan_khusus_ayah == "10"){
			$berkebutuhan_khusus_ayah="Tuna Ganda (B)";	
		}
		elseif($berkebutuhan_khusus_ayah == "11"){
			$berkebutuhan_khusus_ayah="Hiper Aktif (H)";	
		}
		elseif($berkebutuhan_khusus_ayah == "12"){
			$berkebutuhan_khusus_ayah="Cerdas Istimewa (i)";	
		}
		elseif($berkebutuhan_khusus_ayah == "13"){
			$berkebutuhan_khusus_ayah="Bakat Istimewa (J)";	
		}
		elseif($berkebutuhan_khusus_ayah == "14"){
			$berkebutuhan_khusus_ayah="Kesulitan Belajar (K)";	
		}
		elseif($berkebutuhan_khusus_ayah == "15"){
			$berkebutuhan_khusus_ayah="Narkoba (N)";	
		}
		elseif($berkebutuhan_khusus_ayah == "16"){
			$berkebutuhan_khusus_ayah="Indigo (O)";	
		}
		elseif($berkebutuhan_khusus_ayah == "17"){
			$berkebutuhan_khusus_ayah="Down Sindrome (P)";	
		}
		elseif($berkebutuhan_khusus_ayah == "18"){
			$berkebutuhan_khusus_ayah="Autis (Q)";	
		}
		else{
			$error_berkebutuhan_khusus_ayah="Masukkan pilihan berkebutuhan khusus dengan benar";
		}
	}

	//Nama lengkap ibu
	if(empty($_POST["nama_ibu"])){
		$error_nama_ibu="*Data wajib diisi";
	}
	else{
		$nama_ibu=cek_input($_POST["nama_ibu"]);
		if(!preg_match("/^[a-zA-z ]*$/", $nama_ibu)){
			$error_nama_ibu="Inputan Hanya Boleh Huruf dan Spasi";
		}
	}

	//Tahun lahir ibu
	if(empty($_POST["tahun_ibu"])){
		$error_tahun_ibu="*Data wajib diisi";
	}
	else{
		$tahun_ibu=cek_input($_POST["tahun_ibu"]);
		if(!is_numeric($tahun_ibu)){
			$error_tahun_ibu="Tahun lahir hanya boleh angka";
		}
	}

	//Pendidikan ibu
	if(empty($_POST["pendidikan_ibu"])){
		$error_pendidikan_ibu="*Data wajib diisi";
	}
	else{
		$pendidikan_ibu=cek_input($_POST["pendidikan_ibu"]);
		if($pendidikan_ibu == "01"){
			$pendidikan_ibu="Tidak sekolah";	
		}
		elseif($pendidikan_ibu == "02"){
			$pendidikan_ibu="Putus SD";	
		}
		elseif($pendidikan_ibu == "03"){
			$pendidikan_ibu="SD Sederajat";	
		}
		elseif($pendidikan_ibu == "04"){
			$pendidikan_ibu="SMP Sederajat";	
		}
		elseif($pendidikan_ibu == "05"){
			$pendidikan_ibu="SMA Sederajat";	
		}
		elseif($pendidikan_ibu == "06"){
			$pendidikan_ibu="D1";	
		}
		elseif($pendidikan_ibu == "07"){
			$pendidikan_ibu="D2";	
		}
		elseif($pendidikan_ibu == "08"){
			$pendidikan_ibu="D3";	
		}

		elseif($pendidikan_ibu == "09"){
			$pendidikan_ibu="D4/S1";	
		}
		elseif($pendidikan_ibu == "10"){
			$pendidikan_ibu="S2";	
		}
		elseif($pendidikan_ibu == "11"){
			$pendidikan_ibu="S3";	
		}
		else{
			$error_pendidikan_ibu="Masukkan pilihan pendidikan dengan benar";
		}
	}

	//Pekerjaan ibu
	if(empty($_POST["pekerjaan_ibu"])){
		$error_pekerjaan_ibu="*Data wajib diisi";
	}
	else{
		$pekerjaan_ibu=cek_input($_POST["pekerjaan_ibu"]);
		if($pekerjaan_ibu == "01"){
			$pekerjaan_ibu="Tidak bekerja";	
		}
		elseif($pekerjaan_ibu == "02"){
			$pekerjaan_ibu="Nelayan";	
		}
		elseif($pekerjaan_ibu == "03"){
			$pekerjaan_ibu="Petani";	
		}
		elseif($pekerjaan_ibu == "04"){
			$pekerjaan_ibu="Peternak";	
		}
		elseif($pekerjaan_ibu == "05"){
			$pekerjaan_ibu="PNS/TNI/POLRI";	
		}
		elseif($pekerjaan_ibu == "06"){
			$pekerjaan_ibu="Karyawan Swasta";	
		}
		elseif($pekerjaan_ibu == "07"){
			$pekerjaan_ibu="Pedagang Kecil";	
		}
		elseif($pekerjaan_ibu == "08"){
			$pekerjaan_ibu="Pedagang Besar";	
		}

		elseif($pekerjaan_ibu == "09"){
			$pekerjaan_ibu="Wiraswasta";	
		}
		elseif($pekerjaan_ibu == "10"){
			$pekerjaan_ibu="Wirausaha";	
		}
		elseif($pekerjaan_ibu == "11"){
			$pekerjaan_ibu="Buruh";	
		}
		elseif($pekerjaan_ibu == "12"){
			$pekerjaan_ibu="Pensiunan";	
		}
		elseif($pekerjaan_ibu == "99"){
			$pekerjaan_ibu="Lainnya";	
		}
		else{
			$error_pekerjaan_ibu="Masukkan pilihan pekerjaan dengan benar";
		}
	}

	//Penghasilan ibu
	if(empty($_POST["penghasilan_ibu"])){
		$error_penghasilan_ibu="*Data wajib diisi";
	}
	else{
		$penghasilan_ibu=cek_input($_POST["penghasilan_ibu"]);
		if($penghasilan_ibu == "01"){
			$penghasilan_ibu="Kurang dari 500.000";	
		}
		elseif($penghasilan_ibu == "02"){
			$penghasilan_ibu="500 ribu-999.999";	
		}
		elseif($penghasilan_ibu == "03"){
			$penghasilan_ibu="1 juta-1.999.999";	
		}
		elseif($penghasilan_ibu == "04"){
			$penghasilan_ibu="2 juta-4.999.999";	
		}
		elseif($penghasilan_ibu == "05"){
			$penghasilan_ibu="5 juta-20 juta";	
		}
		elseif($penghasilan_ibu == "06"){
			$penghasilan_ibu="Lebih dari 20 juta";	
		}
		else{
			$error_penghasilan_ibu="Masukkan pilihan pekerjaan dengan benar";
		}
	}

	//Berkebutuhan khusus ibu
	if(empty($_POST["berkebutuhan_khusus_ibu"])){
		$error_berkebutuhan_khusus_ibu="*Data wajib diisi";
	}
	else{
		$berkebutuhan_khusus_ibu=cek_input($_POST["berkebutuhan_khusus_ibu"]);
		if($berkebutuhan_khusus_ibu == "01"){
			$berkebutuhan_khusus_ibu="Tidak";	
		}
		elseif($berkebutuhan_khusus_ibu == "02"){
			$berkebutuhan_khusus_ibu="Netra (A)";	
		}
		elseif($berkebutuhan_khusus_ibu == "03"){
			$berkebutuhan_khusus_ibu="Rungu (B)";	
		}
		elseif($berkebutuhan_khusus_ibu == "04"){
			$berkebutuhan_khusus_ibu="Grahita Ringan (C)";	
		}
		elseif($berkebutuhan_khusus_ibu == "05"){
			$berkebutuhan_khusus_ibu="Grahita Sedang (C1)";	
		}
		elseif($berkebutuhan_khusus_ibu == "06"){
			$berkebutuhan_khusus_ibu="Daksa Ringan (D)";	
		}
		elseif($berkebutuhan_khusus_ibu == "07"){
			$berkebutuhan_khusus_ibu="Daksa Sedang (D1)";	
		}
		elseif($berkebutuhan_khusus_ibu == "08"){
			$berkebutuhan_khusus_ibu="Laras (E)";	
		}
		elseif($berkebutuhan_khusus_ibu == "09"){
			$berkebutuhan_khusus_ibu="Wicara (F)";	
		}
		elseif($berkebutuhan_khusus_ibu == "10"){
			$berkebutuhan_khusus_ibu="Tuna Ganda (B)";	
		}
		elseif($berkebutuhan_khusus_ibu == "11"){
			$berkebutuhan_khusus_ibu="Hiper Aktif (H)";	
		}
		elseif($berkebutuhan_khusus_ibu == "12"){
			$berkebutuhan_khusus_ibu="Cerdas Istimewa (i)";	
		}
		elseif($berkebutuhan_khusus_ibu == "13"){
			$berkebutuhan_khusus_ibu="Bakat Istimewa (J)";	
		}
		elseif($berkebutuhan_khusus_ibu == "14"){
			$berkebutuhan_khusus_ibu="Kesulitan Belajar (K)";	
		}
		elseif($berkebutuhan_khusus_ibu == "15"){
			$berkebutuhan_khusus_ibu="Narkoba (N)";	
		}
		elseif($berkebutuhan_khusus_ibu == "16"){
			$berkebutuhan_khusus_ibu="Indigo (O)";	
		}
		elseif($berkebutuhan_khusus_ibu == "17"){
			$berkebutuhan_khusus_ibu="Down Sindrome (P)";	
		}
		elseif($berkebutuhan_khusus_ibu == "18"){
			$berkebutuhan_khusus_ibu="Autis (Q)";	
		}
		else{
			$error_berkebutuhan_khusus_ibu="Masukkan pilihan berkebutuhan khusus dengan benar";
		}
	}



	//Jika tidak ada error maka data akan disimpan
	
	include 'koneksidatabase.php';

	if(isset($_POST['submit'])){

	//Memasukkan data ke tabel pendaftaran
	$query="INSERT INTO pendaftaran VALUES ('$_POST[id]', '$_POST[tanggal]', '$_POST[jenis_pendaftaran]', '$_POST[tanggal_masuk_sekolah]', '$_POST[nis]', '$_POST[nomor_peserta_ujian]', '$_POST[pernah_paud]', 
    '$_POST[pernah_tk]', '$_POST[skhun]', '$_POST[ijazah]', '$_POST[hobi]', '$_POST[citacita]', '$_POST[nama]', '$_POST[jenis_kelamin]', '$_POST[nisn]', '$_POST[nik]', '$_POST[tempat_lahir]', '$_POST[tanggal_lahir]', 
    '$_POST[agama]', '$_POST[berkebutuhan_khusus]', '$_POST[alamat]', '$_POST[rt]', '$_POST[rw]', '$_POST[dusun]', '$_POST[desa]', '$_POST[kecamatan]', '$_POST[kode_pos]', '$_POST[tempat_tinggal]', '$_POST[transportasi]', 
    '$_POST[hp]', '$_POST[telp]', '$_POST[email]', '$_POST[penerima_kps]', '$_POST[no_kps]', '$_POST[kewarganegaraan]', '$_POST[nama_negara]', '$_POST[nama_ayah]', '$_POST[tahun_ayah]', '$_POST[pendidikan_ayah]', '$_POST[pekerjaan_ayah]', '$_POST[penghasilan_ayah]', '$_POST[berkebutuhan_khusus_ayah]', '$_POST[nama_ibu]', '$_POST[tahun_ibu]', '$_POST[pendidikan_ibu]', '$_POST[pekerjaan_ibu]', '$_POST[penghasilan_ibu]', '$_POST[berkebutuhan_khusus_ibu]')";
		mysqli_query($conn, $query);

		if(mysqli_query($conn, $query)){
			echo "Pendaftarran berhasil dilakukan";
		} 
		else{
			echo "Error: ". $query ."<br>". mysqli_error($conn);
		}
	}
	
}
	
function cek_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<div class="row">
	<div class="col-md-9">
		<div class="card">
			<div class="card-header">
				<h1><center>Formulir Peserta Didik</center></h1>
			</div>
			<div class="card-body">
				<!-- Mengarahkan action ke halaman itu sendiri -->
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<div class="form-group row">
						<label for="id" class="col-sm-3 col-form-label">ID Pendaftaran</label>
						<div class="col-sm-9">
							<input type="text" name="id" class="form-control <?php echo ($error_id!="" ? 
                            "is_invalid" : ""); ?>" id="id" placeholder="ID Pendaftaran" value="<?php echo 
                            $id; ?>"><label>Tanyakan ID Pendaftaran pada pihak sekolah</label><span class="warning"><?php echo 
                            $error_id; ?></span>
						</div>
					</div>
					<div class="form-group row">
						<label for="tanggal" class="col-sm-3 col-form-label">Tanggal Pendaftaran</label>
						<div class="col-sm-9">
							<input type="date" name="tanggal" class="form-control <?php echo ($error_tanggal !="" ? 
                            "is_invalid" : ""); ?>" id="tanggal" placeholder="Tanggal Pendaftaran" value="<?php echo 
                            $tanggal; ?>"><label>Contoh: 18-05-2022</label><span class="warning"><?php echo 
                            $error_tanggal; ?></span>
						</div>
					</div>
					<div class="card-header">
						<h5>Registrasi Peserta Didik</h5>
					</div>
					<br>
					<div class="form-group row">
						<label for="jenis_pendaftaran" class="col-sm-3 col-form-label">Jenis Pendaftaran</label>
						<div class="col-sm-9">
							<input type="text" name="jenis_pendaftaran" class="form-control <?php echo ($error_jenis_pendaftaran !="" ? 
                            "is_invalid" : ""); ?>" id="jenis_pendaftaran" placeholder="Jenis Pendaftaran" value="<?php echo $jenis_pendaftaran; 
                            ?>"><label>01=Siswa Baru, 02=Pindahan</label><span class="warning"><?php echo $error_jenis_pendaftaran; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="tanggal_masuk_sekolah" class="col-sm-3 col-form-label">Tanggal Masuk Sekolah</label>
						<div class="col-sm-9">
							<input type="date" name="tanggal_masuk_sekolah" class="form-control <?php echo ($error_tanggal_masuk_sekolah !="" ? 
                            "is_invalid" : ""); ?>" id="tanggal_masuk_sekolah" placeholder="Tanggal Masuk Sekolah" value="<?php echo 
                            $tanggal_masuk_sekolah; ?>"><label>Contoh: 02-02-2022</label><span class="warning"><?php echo 
                            $error_tanggal_masuk_sekolah; ?></span>
						</div>
					</div>	


					<div class="form-group row">
						<label for="nis" class="col-sm-3 col-form-label">NIS</label>
						<div class="col-sm-9">
							<input type="text" name="nis" class="form-control <?php echo ($error_nis !="" ? "is_invalid" : ""); ?>" id="nis" 
                            placeholder="NIS" value="<?php echo $nis; ?>"><span class="warning"><?php echo $error_nis; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="nomor_peserta_ujian" class="col-sm-3 col-form-label">Nomor Peserta Ujian</label>
						<div class="col-sm-9">
							<input type="text" name="nomor_peserta_ujian" class="form-control <?php echo ($error_nomor_peserta_ujian !="" ? 
                            "is_invalid" : ""); ?>" id="nomor_peserta_ujian" placeholder="Nomor Peserta Ujian" value="<?php echo 
                            $nomor_peserta_ujian; ?>"><label>*Nomor peserta wajib berjumlah 20 digit</label><span class="warning"><?php echo $error_nomor_peserta_ujian; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="pernah_paud" class="col-sm-3 col-form-label">Apakah Pernah PAUD?</label>
						<div class="col-sm-9">
							<input type="radio" name="pernah_paud" value="Ya">Ya
							<input type="radio" name="pernah_paud" value="Tidak">Tidak
							<span class="warning"><?php echo $error_pernah_paud; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="pernah_tk" class="col-sm-3 col-form-label">Apakah Pernah TK?</label>
						<div class="col-sm-9">
							<input type="radio" name="pernah_tk" value="Ya">Ya
							<input type="radio" name="pernah_tk" value="Tidak">Tidak
							<span class="warning"><?php echo $error_pernah_tk; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="skhun" class="col-sm-3 col-form-label">No. Seri SKHUN Sebelumnya</label>
						<div class="col-sm-9">
							<input type="text" name="skhun" class="form-control <?php echo ($skhun !="" ? "is_invalid" : ""); ?>" 
                            id="skhun" placeholder="No. Seri SKHUN Sebelumnya" value="<?php echo $skhun; ?>"><label>*Nomor seri SKHUN berjumlah 16 digit</label><span class="warning"><?php 
                            echo $error_skhun; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="ijazah" class="col-sm-3 col-form-label">No. Seri Ijazah Sebelumnya</label>
						<div class="col-sm-9">
							<input type="text" name="ijazah" class="form-control <?php echo ($ijazah !="" ? "is_invalid" : ""); ?>" 
                            id="ijazah" placeholder="No. Seri Ijazah Sebelumnya" value="<?php echo $ijazah; ?>"><label>*Nomor seri ijazah wajib berjumlah 16 digit</label><span class="warning">
                            <?php echo $error_ijazah; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="hobi" class="col-sm-3 col-form-label">Hobi</label>
						<div class="col-sm-9">
							<input type="text" name="hobi" class="form-control <?php echo ($error_hobi !="" ? "is_invalid" : ""); ?>" 
                            id="hobi" placeholder="Hobi" value="<?php echo $hobi; ?>"><label>A=Olah Raga, B=Kesenian, C=Membaca, D=Menulis, 
                            E=Travelling, F=Lainnya</label><span class="warning"><?php echo $error_hobi; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="citacita" class="col-sm-3 col-form-label">Cita-cita</label>
						<div class="col-sm-9">
							<input type="text" name="citacita" class="form-control <?php echo ($error_citacita !="" ? "is_invalid" : ""); 
                            ?>" id="citacita" placeholder="Cita-cita" value="<?php echo $citacita; ?>"><label>A=PNS, B=TNI/POLRI, C=Guru/Dosen, 
                            D=Dokter, E=Politikus, F=Wiraswasta, G=Seni/Lukis/Artis/Sejenis, H=Lainnya</label><span class="warning"><?php 
                            echo $error_citacita; ?></span>
						</div>
					</div>

					<div class="card-header">
						<h5>Data Pribadi</h5>
					</div>
					<br>
					<div class="form-group row">
						<label for="nama" class="col-sm-3 col-form-label">Nama Lengkap</label>
						<div class="col-sm-9">
							<input type="text" name="nama" class="form-control <?php echo ($error_nama !="" ? "is_invalid" : ""); ?>" 
                            id="nama" placeholder="Nama" value="<?php echo $nama; ?>"><span class="warning"><?php echo $error_nama; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-9">
							<input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki
							<input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
							<span class="warning"><?php echo $error_jenis_kelamin; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="nisn" class="col-sm-3 col-form-label">NISN</label>
						<div class="col-sm-9">
							<input type="text" name="nisn" class="form-control <?php echo ($error_nisn !="" ? "is_invalid" : ""); ?>
                            " id="nisn" placeholder="NISN" value="<?php echo $nisn; ?>"><span class="warning"><?php echo $error_nisn; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="nik" class="col-sm-3 col-form-label">NIK</label>
						<div class="col-sm-9">
							<input type="text" name="nik" class="form-control <?php echo ($error_nik !="" ? "is_invalid" : ""); ?>" 
                            id="nik" placeholder="NIK" value="<?php echo $nik; ?>"><span class="warning"><?php echo $error_nik; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
						<div class="col-sm-9">
							<input type="text" name="tempat_lahir" class="form-control <?php echo 
                            ($error_tempat_lahir !="" ? "is_invalid" : ""); ?>" id="tempat_lahir" placeholder="Tempat Lahir" 
                            value="<?php echo $tempat_lahir; ?>"><span class="warning"><?php echo $error_tempat_lahir; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
						<div class="col-sm-9">
							<input type="date" name="tanggal_lahir" class="form-control <?php echo ($error_tanggal_lahir !="" ? 
                            "is_invalid" : ""); ?>" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>">
                            <label>Contoh: 02-02-2002</label><span class="warning"><?php echo $error_tanggal_lahir; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="agama" class="col-sm-3 col-form-label">Agama</label>
						<div class="col-sm-9">
							<input type="text" name="agama" class="form-control <?php echo ($error_agama !="" ? "is_invalid" : ""); ?>" 
                            id="agama" placeholder="Agama" value="<?php echo $agama; ?>"><label>01=Islam, 02=Kristen/Protestan, 03=Katholik, 
                            04=Hindu, 05=Buddha, 06=Khong Hu Chu, 99=Lainnya</label><span class="warning"><?php echo $error_agama; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="berkebutuhan_khusus" class="col-sm-3 col-form-label">Berkebutuhan Khusus</label>
						<div class="col-sm-9">
							<input type="text" name="berkebutuhan_khusus" class="form-control <?php echo ($error_berkebutuhan_khusus !="" ? 
                            "is_invalid" : ""); ?>" id="berkebutuhan_khusus" placeholder="Berkebutuhan Khusus" value="<?php echo 
                            $berkebutuhan_khusus; ?>"><label>01=Tidak, 02=Netra (A), 03=Rungu (B), 04=Grahita Ringan (C), 
                            05=Grahita Sedang (C1), 06=Daksa Ringan (D), 07=Daksa Ringan (D1), 08=Laras (E), 09=Wicara (F), 10=Tuna Ganda (G), 
                            11=Hiper Aktif (H), 12=Cerdas Istimewa (i), 13=Bakat Istimewa (J), 14=Kesulitan Belajar (K), 15=Narkoba (N), 16=Indigo 
                            (O), 17=Down Sindrome (P), 18=Autis (Q)</label><span class="warning"><?php echo $error_berkebutuhan_khusus; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="alamat" class="col-sm-3 col-form-label">Alamat Jalan</label>
						<div class="col-sm-9">
							<input type="text" name="alamat" class="form-control <?php echo ($error_alamat !="" ? "is_invalid" : ""); ?>" 
                            id="alamat" placeholder="Alamat Jalan" value="<?php echo $alamat; ?>"><span class="warning"><?php echo 
                            $error_alamat; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="rt" class="col-sm-3 col-form-label">RT</label>
						<div class="col-sm-9">
							<input type="text" name="rt" class="form-control <?php echo ($error_rt !="" ? "is_invalid" : ""); ?>" 
                            id="rt" placeholder="RT" value="<?php echo $rt; ?>"><span class="warning"><?php echo $error_rt; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="rw" class="col-sm-3 col-form-label">RW</label>
						<div class="col-sm-9">
							<input type="text" name="rw" class="form-control <?php echo ($error_rw !="" ? "is_invalid" : ""); ?>" 
                            id="rw" placeholder="RW" value="<?php echo $rw; ?>"><span class="warning"><?php echo $error_rw; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="dusun" class="col-sm-3 col-form-label">Dusun</label>
						<div class="col-sm-9">
							<input type="text" name="dusun" class="form-control <?php echo ($error_dusun !="" ? "is_invalid" : ""); ?>" 
                            id="dusun" placeholder="Dusun" value="<?php echo $dusun; ?>"><span class="warning"><?php echo $error_dusun; 
                            ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="desa" class="col-sm-3 col-form-label">Desa/Kelurahan</label>
						<div class="col-sm-9">
							<input type="text" name="desa" class="form-control <?php echo ($error_desa !="" ? "is_invalid" : ""); ?>" 
                            id="desa" placeholder="Desa/Kelurahan" value="<?php echo $desa; ?>"><span class="warning"><?php echo $error_desa; 
                            ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
						<div class="col-sm-9">
							<input type="text" name="kecamatan" class="form-control <?php echo ($error_kecamatan !="" ? "is_invalid" : ""); ?>"
                             id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>"><span class="warning"><?php 
                             echo $error_kecamatan; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="kode_pos" class="col-sm-3 col-form-label">Kode Pos</label>
						<div class="col-sm-9">
							<input type="text" name="kode_pos" class="form-control <?php echo ($error_kode_pos !="" ? "is_invalid" : ""); ?>" 
                            id="kode_pos" placeholder="Kode Pos" value="<?php echo $kode_pos; ?>"><span class="warning"><?php 
                            echo $error_kode_pos; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="tempat_tinggal" class="col-sm-3 col-form-label">Tempat Tinggal</label>
						<div class="col-sm-9">
							<input type="text" name="tempat_tinggal" class="form-control <?php echo ($error_tempat_tinggal !="" ? "is_invalid" 
                            : ""); ?>" id="tempat_tinggal" placeholder="Tempat Tinggal" value="<?php echo $tempat_tinggal; ?>">
                            <label>01=Bersama Orang Tua, 02=Wali, 03=Kos, 04=Asrama, 05=Panti Asuhan, 99=Lainnya</label><span class="warning"><?php 
                            echo $error_tempat_tinggal; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="transportasi" class="col-sm-3 col-form-label">Transportasi</label>
						<div class="col-sm-9">
							<input type="text" name="transportasi" class="form-control <?php echo ($error_transportasi !="" ? "is_invalid" : ""); 
                            ?>" id="transportasi" placeholder="Transportasi" value="<?php echo $transportasi; ?>"><label>01=Jalan Kaki, 
                            02=Kendaraan Pribadi, 03=Kendaraan Umum/Angkot/Pete-pete, 04=Jemputan Sekolah, 05=Kereta Api, 06=Ojek, 
                            07=Andong/Bendi/Sado/Dokar/Delman/Becak, 08=Perahu Penyeberangan/Rakit/Getek, 99=Lainnya</label><span 
                            class="warning"><?php echo $error_transportasi; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="hp" class="col-sm-3 col-form-label">No. HP</label>
						<div class="col-sm-9">
							<input type="text" name="hp" class="form-control <?php echo ($error_hp !="" ? "is_invalid" : ""); ?>" 
                            id="hp" placeholder="No. HP" value="<?php echo $hp; ?>"><span class="warning"><?php echo $error_hp; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="email" class="col-sm-3 col-form-label">E-mail Pribadi</label>
						<div class="col-sm-9">
							<input type="text" name="email" class="form-control <?php echo ($error_email !="" ? "is_invalid" : ""); ?>" 
                            id="email" placeholder="Email" value="<?php echo $email; ?>"><span class="warning"><?php echo $error_email; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="telp" class="col-sm-3 col-form-label">No. Telepon</label>
						<div class="col-sm-9">
							<input type="text" name="telp" class="form-control <?php echo ($error_telp !="" ? "is_invalid" : ""); ?>" 
                            id="telp" placeholder="No. Telp" value="<?php echo $telp; ?>"><span class="warning"><?php echo $error_telp; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="penerima_kps" class="col-sm-3 col-form-label">Penerima KPS/PKH/KIP</label>
						<div class="col-sm-9">
							<input type="radio" name="penerima_kps" value="Ya">Ya
							<input type="radio" name="penerima_kps" value="Tidak">Tidak
							<span class="warning"><?php echo $error_penerima_kps; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="no_kps" class="col-sm-3 col-form-label">Nomor KPS/KKS/PKH/KIP</label>
						<div class="col-sm-9">
							<input type="text" name="no_kps" class="form-control <?php echo ($error_no_kps !="" ? "is_invalid" : ""); ?>" 
                            id="no_kps" placeholder="Nomor KPS/KKS/PKH/KIP" value="<?php echo $no_kps; ?>"><label>* 
                            Apabila Menerima (Ketikkan 0 jika tidak menerima)</label><span class="warning"><?php echo $error_no_kps; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="kewarganegaraan" class="col-sm-3 col-form-label">Kewarganegaraan</label>
						<div class="col-sm-9">
							<input type="radio" name="kewarganegaraan" value="WNI">WNI
							<input type="radio" name="kewarganegaraan" value="WNA">WNA
							<span class="warning"><?php echo $error_kewarganegaraan; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="nama_negara" class="col-sm-3 col-form-label">Nama Negara</label>
						<div class="col-sm-9">
							<input type="text" name="nama_negara" class="form-control <?php echo ($error_nama_negara !="" ? 
                            "is_invalid" : ""); ?>" id="nama_negara" placeholder="Nama Negara" value="<?php echo $nama_negara; ?>"><span 
                            class="warning"><?php echo $error_nama_negara; ?></span>
						</div>
					</div>

					<div class="card-header">
						<h5>Data Ayah Kandung</h5>
					</div>
					<br>
					<div class="form-group row">
						<label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
						<div class="col-sm-9">
							<input type="text" name="nama_ayah" class="form-control <?php echo ($error_nama_ayah !="" ? "is_invalid" : ""); ?>" 
                            id="nama_ayah" placeholder="Nama ayah" value="<?php echo $nama_ayah; ?>"><span class="warning"><?php echo $error_nama_ayah; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="tahun_ayah" class="col-sm-3 col-form-label">Tahun Lahir Ayah</label>
						<div class="col-sm-9">
							<input type="text" name="tahun_ayah" class="form-control <?php echo ($error_tahun_ayah !="" ? "is_invalid" : ""); ?>" 
                            id="tahun_ayah" placeholder="Tahun Lahir Ayah" value="<?php echo $tahun_ayah; ?>"><label>Contoh: 1980</label><span class="warning"><?php echo $error_tahun_ayah; ?></span>
						</div>
					</div>

					<div class="form-group row">
						<label for="pendidikan_ayah" class="col-sm-3 col-form-label">Pendidikan Ayah</label>
						<div class="col-sm-9">
							<input type="text" name="pendidikan_ayah" class="form-control <?php echo ($error_pendidikan_ayah !="" ? "is_invalid" : ""); ?>" 
                            id="pendidikan_ayah" placeholder="Pendidikan Ayah" value="<?php echo $pendidikan_ayah; ?>"><label>01=Tidak sekolah, 02=Putus SD, 03=SD Sederajat, 04=SMP Sederajat, 05=SMA Sederajat, 06=D1, 07=D2, 08=D3, 09=D4/S1, 10=S2, 11=S3</label><span class="warning"><?php echo $error_pendidikan_ayah; ?></span>
						</div>
					</div>

					<div class="form-group row">
                        <label for="pekerjaan_ayah" class="col-sm-3 col-form-label">Pekerjaan Ayah</label>
                        <div class="col-sm-9">
                            <input type="text" name="pekerjaan_ayah" class="form-control <?php echo ($error_pekerjaan_ayah !="" ? "is_invalid" : ""); ?>" 
                            id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" value="<?php echo $pekerjaan_ayah; ?>"><label>01=Tidak bekerja, 02=Nelayan, 03=Petani, 04=Peternak, 05=PNS/TNI/POLRI, 06=Karyawan Swasta, 07=Pedagang Kecil, 08=Pedagang Besar, 09=Wiraswasta, 10=Wirausaha, 11=Buruh, 12=Pensiunan, 99=Lainnya</label><span class="warning"><?php echo $error_pekerjaan_ayah; ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="penghasilan_ayah" class="col-sm-3 col-form-label">Penghasilan Ayah</label>
                        <div class="col-sm-9">
                            <input type="text" name="penghasilan_ayah" class="form-control <?php echo ($error_penghasilan_ayah !="" ? "is_invalid" : ""); ?>" 
                            id="penghasilan_ayah" placeholder="Penghasilan Ayah" value="<?php echo $penghasilan_ayah; ?>"><label>01=Kurang dari 500rb, 02=500rb-999.999, 03=1jt-1.999.999, 04=2jt-4.999.999, 05=5jt-20jt, 06=lebih dari 20 jt</label><span class="warning"><?php echo $error_penghasilan_ayah; ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="berkebutuhan_khusus_ayah" class="col-sm-3 col-form-label">Berkebutuhan Khusus (Ayah)</label>
                        <div class="col-sm-9">
                            <input type="text" name="berkebutuhan_khusus_ayah" class="form-control <?php echo ($error_berkebutuhan_khusus_ayah !="" ? "is_invalid" : ""); ?>" 
                            id="berkebutuhan_khusus_ayah" placeholder="Berkebutuhan Khusus" value="<?php echo $berkebutuhan_khusus_ayah; ?>"><label>01=Tidak, 02=Netra (A), 03=Rungu (B), 04=Grahita Ringan (C), 
                            05=Grahita Sedang (C1), 06=Daksa Ringan (D), 07=Daksa Ringan (D1), 08=Laras (E), 09=Wicara (F), 10=Tuna Ganda (G), 
                            11=Hiper Aktif (H), 12=Cerdas Istimewa (i), 13=Bakat Istimewa (J), 14=Kesulitan Belajar (K), 15=Narkoba (N), 16=Indigo 
                            (O), 17=Down Sindrome (P), 18=Autis (Q)</label><span class="warning"><?php echo $error_berkebutuhan_khusus_ayah; ?></span>
                        </div>
                    </div>

                    <div class="card-header">
						<h5>Data Ibu Kandung</h5>
					</div>
					<br>
                    <div class="form-group row">
                        <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama_ibu" class="form-control <?php echo ($error_nama_ibu !="" ? "is_invalid" : ""); ?>" 
                            id="nama_ibu" placeholder="Nama Ibu" value="<?php echo $nama_ibu; ?>"><span class="warning"><?php echo $error_nama_ibu; ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tahun_ibu" class="col-sm-3 col-form-label">Tahun Lahir Ibu</label>
                        <div class="col-sm-9">
                            <input type="text" name="tahun_ibu" class="form-control <?php echo ($error_tahun_ibu !="" ? "is_invalid" : ""); ?>" 
                            id="tahun_ibu" placeholder="Tahun Lahir Ibu" value="<?php echo $tahun_ibu; ?>"><label>Contoh: 1980</label><span class="warning"><?php echo $error_tahun_ibu; ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pendidikan_ibu" class="col-sm-3 col-form-label">Pendidikan Ibu</label>
                        <div class="col-sm-9">
                            <input type="text" name="pendidikan_ibu" class="form-control <?php echo ($error_pendidikan_ibu !="" ? "is_invalid" : ""); ?>" 
                            id="pendidikan_ibu" placeholder="Pendidikan Ibu" value="<?php echo $pendidikan_ibu; ?>"><label>01=Tidak sekolah, 02=Putus SD, 03=SD Sederajat, 04=SMP Sederajat, 05=SMA Sederajat, 06=D1, 07=D2, 08=D3, 09=D4/S1, 10=S2, 11=S3</label><span class="warning"><?php echo $error_pendidikan_ibu; ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pekerjaan_ibu" class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
                        <div class="col-sm-9">
                            <input type="text" name="pekerjaan_ibu" class="form-control <?php echo ($error_pekerjaan_ibu !="" ? "is_invalid" : ""); ?>" 
                            id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" value="<?php echo $pekerjaan_ibu; ?>"><label>01=Tidak bekerja, 02=Nelayan, 03=Petani, 04=Peternak, 05=PNS/TNI/POLRI, 06=Karyawan Swasta, 07=Pedagang Kecil, 08=Pedagang Besar, 09=Wiraswasta, 10=Wirausaha, 11=Buruh, 12=Pensiunan, 99=Lainnya</label><span class="warning"><?php echo $error_pekerjaan_ibu; ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="penghasilan_ibu" class="col-sm-3 col-form-label">Penghasilan Ibu</label>
                        <div class="col-sm-9">
                            <input type="text" name="penghasilan_ibu" class="form-control <?php echo ($error_penghasilan_ibu !="" ? "is_invalid" : ""); ?>" 
                            id="penghasilan_ibu" placeholder="Penghasilan Ibu" value="<?php echo $penghasilan_ibu; ?>"><label>01=Kurang dari 500rb, 02=500rb-999.999, 03=1jt-1.999.999, 04=2jt-4.999.999, 05=5jt-20jt, 06=lebih dari 20 jt</label><span class="warning"><?php echo $error_penghasilan_ibu; ?></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="berkebutuhan_khusus_ibu" class="col-sm-3 col-form-label">Berkebutuhan Khusus (Ibu)</label>
                        <div class="col-sm-9">
                            <input type="text" name="berkebutuhan_khusus_ibu" class="form-control <?php echo ($error_berkebutuhan_khusus_ibu !="" ? "is_invalid" : ""); ?>" 
                            id="berkebutuhan_khusus_ibu" placeholder="Berkebutuhan Khusus" value="<?php echo $berkebutuhan_khusus_ibu; ?>"><label>01=Tidak, 02=Netra (A), 03=Rungu (B), 04=Grahita Ringan (C), 
                            05=Grahita Sedang (C1), 06=Daksa Ringan (D), 07=Daksa Ringan (D1), 08=Laras (E), 09=Wicara (F), 10=Tuna Ganda (G), 
                            11=Hiper Aktif (H), 12=Cerdas Istimewa (i), 13=Bakat Istimewa (J), 14=Kesulitan Belajar (K), 15=Narkoba (N), 16=Indigo 
                            (O), 17=Down Sindrome (P), 18=Autis (Q)</label><span class="warning"><?php echo $error_berkebutuhan_khusus_ibu; ?></span>
                        </div>
                    </div>

					<div class="form-group row">
						<div class="col-sm-9">
							<button name="submit" type="submit" class="btn btn-primary">Daftarkan Diri Saya</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
//Menampilkan hasil
echo "<br>";
echo "<center><h2>Data yang Anda Masukkan:</h2></center>";
echo "<br>";
echo "ID Pendaftaran= ". $id;
echo "<br>";
echo "Tanggal Pendaftaran= ". $tanggal;
echo "<br>";
echo "<br>";
echo "Jenis Pendaftaran= ". $jenis_pendaftaran;
echo "<br>";
echo "Tanggal Masuk Sekolah= ". $tanggal_masuk_sekolah;
echo "<br>";
echo "NIS= ". $nis;
echo "<br>";
echo "Nomor Peserta Ujian= ". $nomor_peserta_ujian;
echo "<br>";
echo "Pernah PAUD= ". $pernah_paud;
echo "<br>";
echo "Pernah TK= ". $pernah_tk;
echo "<br>";
echo "No. Seri SKHUN Sebelumnya= ". $skhun;
echo "<br>";
echo "No. Seri Ijazah Sebelumnya= ". $ijazah;
echo "<br>";
echo "Hobi= ". $hobi;
echo "<br>";
echo "Cita-cita= ", $citacita;
echo "<br>";
echo "<br>";
echo "Nama Lengkap= ". $nama;
echo "<br>";
echo "Jenis Kelamin= ". $jenis_kelamin;
echo "<br>";
echo "NISN= ". $nisn;
echo "<br>";
echo "NIK= ". $nik;
echo "<br>";
echo "Tempat Lahir= ". $tempat_lahir;
echo "<br>";
echo "Tanggal Lahir= ". $tanggal_lahir;
echo "<br>";
echo "Agama= ". $agama;
echo "<br>";
echo "Berkebutuhan Khusus= ". $berkebutuhan_khusus;
echo "<br>";
echo "Alamat Jalan= ". $alamat;
echo "<br>";
echo "RT= ". $rt;
echo "<br>";
echo "RW= ". $rw;
echo "<br>";
echo "Dusun= ". $dusun;
echo "<br>";
echo "Desa/Kelurahan= ". $desa;
echo "<br>";
echo "Kecamatan= ". $kecamatan;
echo "<br>";
echo "Kode Pos= ". $kode_pos;
echo "<br>";
echo "Tempat Tinggal= ". $tempat_tinggal;
echo "<br>";
echo "Transportasi= ". $transportasi;
echo "<br>";
echo "No. HP= ". $hp;
echo "<br>";
echo "E-mail Pribadi= ". $email;
echo "<br>";
echo "No. Telepon= ". $telp;
echo "<br>";
echo "Penerima KPS/PKH/KIP= ". $penerima_kps;
echo "<br>";
echo "Nomor KPS/KKS/PKH/KIP= ". $no_kps;
echo "<br>";
echo "Kewarganegaraan= ". $kewarganegaraan;
echo "<br>";
echo "Nama Negara= ". $nama_negara;
echo "<br>";
echo "<br>";
echo "Nama Ayah= ". $nama_ayah;
echo "<br>";
echo "Tahun Lahir Ayah= ". $tahun_ayah;
echo "<br>";
echo "Pendidikan Ayah= ". $pendidikan_ayah;
echo "<br>";
echo "Pekerjaan Ayah= ". $pekerjaan_ayah;
echo "<br>";
echo "Penghasian Ayah= ". $penghasilan_ayah;
echo "<br>";
echo "Berkebutuhan Khusus (Ayah)= ". $berkebutuhan_khusus_ayah;
echo "<br>";
echo "<br>";
echo "Nama Ibu= ". $nama_ibu;
echo "<br>";
echo "Tahun Lahir Ibu= ". $tahun_ibu;
echo "<br>";
echo "Pendidikan Ibu= ". $pendidikan_ibu;
echo "<br>";
echo "Pekerjaan Ibu= ". $pekerjaan_ibu;
echo "<br>";
echo "Penghasian Ibu= ". $penghasilan_ibu;
echo "<br>";
echo "Berkebutuhan Khusus (Ibu)= ". $berkebutuhan_khusus_ibu;
echo "<br>";
echo "<br>";

?>
<br> 

</body>
</html>
