<?php
include 'conn.php';

//fungsi cekk Login
function isLoggedIn(){
    if (isset($_SESSION['user'])) {
        return true;
    }else{
        return false;
    }
}

//fungsi login
function login($nmr,$pwd){
    $login =
		"SELECT 
			* 
		FROM 
			pegawai 
		WHERE 
			pegawai_nomor='$nmr' 
		AND 
			pegawai_password='$pwd' 
		LIMIT 1";
    $login_R = pg_query($login);
	return $login_R;
}

//select nama audit
function namaaud($nomor,$req){
	$query=
		"SELECT 
			* 
		FROM 
			audit 
		where 
			audit.audit_id=$nomor 
		LIMIT 1";
	$runq = pg_query($query);
	$reslt=pg_fetch_array($runq);
	switch ($req){
		case 'nama':
			return $reslt['audit_nama'];
		break;
		case 'id':
			return $reslt['audit_id'];
		break;
	}
}

//select nama org
function namaorg($nomor,$req){
	$query=
		"SELECT 
			* 
		FROM 
			pegawai 
		where 
			pegawai.pegawai_nomor=$nomor 
		LIMIT 1";
	$runq = pg_query($query);
	$reslt=pg_fetch_array($runq);
	switch ($req){
		case 'nama':
			return $reslt['pegawai_nama'];
		break;
		case 'nomor':
			return $reslt['pegawai_nomor'];
		break;
	}
}

//jabatan
function jabatan($jabatan){
	switch($jabatan){
		case 0:		return 'Admin';					break;
		case 1:		return 'Kepala';				break;
		case 2:		return 'IPCN / Surveyor';		break;
		case 3:		return 'PJ Unit';				break;
		case 4:		return 'PJ Ruangan';			break;
		default:	return '-';						break;
	}
}

//password
function password(){
	$password = $_SESSION['user']['pegawai_password'];
	$a = strlen($password);
	$b=1;
	$c='';
	while($b<=$a){
		$c=$c.'•';
		$b++;
	}
	return $c;
}

//fungsi select alatpelindung
function get_alatpelindung($unit=null){
	$alatpelindung=
		"SELECT 
			*
		from 
			alatpelindung 
		inner join
			unit
		on
			alatpelindung.unit_id=unit.unit_id";
	if(!is_null($unit)){
		$alatpelindung.=
			" where
				unit.unit_id=".$unit;
	}
	$alatpelindung.=
	" order by
		alatpelindung.alatpelindung_id";
	$alatpelindung_R = pg_query($alatpelindung);
	return $alatpelindung_R;
}

//select audit
function get_audit(){
	$audit=
		"SELECT 
			*
		from 
			audit";
	$audit_R=pg_query($audit);
	return $audit_R;
}

//select komponen
function get_komponen($audit=null){
	$komponen=
		"SELECT 
			*
		from 
			komponen
		inner join
			audit
		on
			komponen.audit_id=audit.audit_id";
	if(!is_null($audit)){
		$komponen.=
			" where
				audit.audit_id=".$audit;
		}
	$komponen.=
	" order by 
		komponen.komponen_id";
	$komponen_R = pg_query($komponen);
	return $komponen_R;
}

//select pegawai
function get_pegawai(){
	$pegawai=
		"SELECT 
			*
		from 
			pegawai
		order by
			pegawai_jabatan";
	$pegawai_R=pg_query($pegawai);
	return $pegawai_R;
}

//select ruangan
function get_ruang($pegawai=null,$tipe=null){
	$ruang=
		"SELECT 
			*
		from 
			ruang 
		inner join 
			tiperuang 
		on 
			tiperuang.tiperuang_nama=ruang.tiperuang_nama";
	if(!is_null($pegawai)){
		$ruang.=" where tiperuang.pegawai_nomor='".$pegawai."'";
	}
	if(!is_null($tipe)){
		$ruang.=" where tiperuang.tiperuang_nama='".$tipe."'";
	}
	$ruang.=
		" order by
			ruang_nama";
	$ruang_R=pg_query($ruang);
	return $ruang_R;
}

//select sub-komponen
function get_subkomponen($audit=null,$komponen=null){
	$subkomponen=
		"SELECT 
			*
		from 
			subkomponen
		inner join
			komponen
		on
			subkomponen.komponen_id=komponen.komponen_id";
	if(!is_null($audit)){
		$subkomponen.=" where komponen.audit_id=".$audit;
	}
	if(!is_null($komponen)){
		$subkomponen.=" and komponen.komponen_id=".$komponen;
	}
	$subkomponen.=
		" order by
			subkomponen_id";
	$subkomponen_R=pg_query($subkomponen);
	return $subkomponen_R;
}

//select tipe ruang
function get_tipe($pegawai=null){
	$tipe=
	"SELECT 
		*
	from 
		tiperuang
	inner join
		pegawai
	on
		pegawai.pegawai_nomor=tiperuang.pegawai_nomor";
	$tipe_R = pg_query($tipe);
	return $tipe_R;
}

//select unit
function get_unit($pegawai=null){
	$unit=
	"SELECT
		*
	from 
		unit 
	join
		pegawai
	on
		pegawai.pegawai_nomor=unit.pegawai_nomor";
	if(!is_null($pegawai)){
		$unit.=" where pegawai.pegawai_nomor=".$pegawai;
	}
	$unit_R=pg_query($unit);
	return $unit_R;
}

//aktifasi audit
function audit_act($view){
	if(
		$_GET['view']=='audit_c'||
		$_GET['view']=='audit_f'||
		$_GET['view']=='audit_r'
		){
			return 1;
		}
	else if(
		$_GET['view']=='alatpelindung'||
		$_GET['view']=='audit'||
		$_GET['view']=='komponen'||
		$_GET['view']=='pegawai'||
		$_GET['view']=='ruang'||
		$_GET['view']=='subkomponen'||
		$_GET['view']=='tiperuang'||
		$_GET['view']=='unit'
	){
		return 2;
	}
}
?>