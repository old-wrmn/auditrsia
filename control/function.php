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

//nambah user
function add_user($nomor,$nama){
	$pwd=md5('12345');
	$query=
	"INSERT into
		pegawai
	values (
		 $nomor,
		'$nama')";
	return pg_query($query);
}

//fungsi cek admin atau ketua
function perm_audit(){
	if ($_SESSION['user']['pegawai_jabatan']==1||$_SESSION['user']['pegawai_jabatan']==0) {
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

//ganti jabatan
function update_jab($pegawai,$jabatan){
	$query=
	"UPDATE pegawai set pegawai_jabatan=$jabatan where pegawai_nomor=$pegawai";
	return pg_query($query);
}

//fungsi select alatpelindung
function get_alatpelindung($unit=null,$audit=null){
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
	else if(!is_null($audit)){
		$alatpelindung.=
			" where
				unit.audit_id=".$audit;
	}
	$alatpelindung.=
	" order by
		alatpelindung.alatpelindung_id";
	return pg_query($alatpelindung);
}

//fungsi get disst alatpelindung
function get_dist_alatpelindung($record){
	$query=
	"SELECT DISTINCT 
		hasiltipe2.alatpelindung_id,
		alatpelindung.alatpelindung_nama,
		alatpelindung.unit_id
	from hasiltipe2
		join
			alatpelindung
			on
			hasiltipe2.alatpelindung_id=alatpelindung.alatpelindung_id
	where hasiltipe2.record_id='".$record."'";
	return pg_query($query);
}

//select audit
function get_audit($id=null){
	$audit=
		"SELECT 
			*
		from 
			audit";
	if(!is_null($id)){
		$audit.=" where audit_id=".$id;
	}
	return pg_query($audit);
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
	return pg_query($komponen);
}

//select pegawai
function get_pegawai($jabatan=null){
	$pegawai=
		"SELECT 
			*
		from 
			pegawai";
	if(!is_null($jabatan)){
		$pegawai.=" where pegawai_jabatan=$jabatan";
	}
	$pegawai.="
	order by
	pegawai_jabatan";
	return pg_query($pegawai);
}

//select pegawai ipcn/surveyor
function get_surveyor(){
	$pegawai=
		"SELECT 
			*
		from 
			pegawai
		where
			pegawai_jabatan=2
		order by
			pegawai_jabatan";
	return pg_query($pegawai);
}

//select PJ unit
function get_pj($record){
	$query=
		"SELECT distinct 
			unit.pegawai_nomor
		from hasiltipe2 
		join alatpelindung
			on hasiltipe2.alatpelindung_id=alatpelindung.alatpelindung_id
		join unit
			on alatpelindung.unit_id=unit.unit_id
		where record_id='2019-04anggrek33209'";
	return pg_fetch_array(pgquery($query));
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
	return pg_query($ruang);
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
		if(!is_null($komponen)){
			$subkomponen.=" and komponen.komponen_id=".$komponen;
		}
	}
	else if(!is_null($komponen)){
		$subkomponen.=" where komponen.komponen_id=".$komponen;
	}
	$subkomponen.=
		" order by
			subkomponen_id";
	return pg_query($subkomponen);
}

//select tipe ruang
function get_tipe($ruang=null){
	$tipe=
	"SELECT 
		*
	from 
	tiperuang
	inner join
		pegawai
		on
			pegawai.pegawai_nomor=tiperuang.pegawai_nomor";
		if(!is_null($ruang)){
			$tipe.=" inner join
			ruang
			on
				tiperuang.tiperuang_nama=ruang.tiperuang_nama
			where ruang.ruang_nama='".$ruang."'";
		}
	return pg_query($tipe);
}

//select unit
function get_unit($pegawai=null,$audit=null){
	$unit=
	"SELECT
		*
	from 
		unit 
	join
		pegawai
	on
		pegawai.pegawai_nomor=unit.pegawai_nomor
	";
	if(!is_null($pegawai)){
		$unit.=" where pegawai.pegawai_nomor=".$pegawai;
	}
	else if(!is_null($audit)){
		$unit.=" where unit.audit_id=".$audit;
	}
	return pg_query($unit);
}

//select record
function get_record($pegawai=null,$id=null,$ruang=null){
	$record="SELECT 
            *
        from 
            record
		inner join
			audit
				on audit.audit_id=record.audit_id
		inner join 
			pegawai
				on pegawai.pegawai_nomor=record.pegawai_nomor";
	if(!is_null($pegawai)){
	$record.=
		" where 
			record.pegawai_nomor=".$pegawai;
		if(!is_null($id)){
			$record.=
				" and 
					record_id='".$id."'";
			}	
	}
	else if(!is_null($id)){
	$record.=
		" where 
			record_id='".$id."'";
	}	
	else if(!is_null($ruang)){
	$record.=
		" 
		inner join 
			ruang 
				on ruang.ruang_nama=record.ruang_nama
		inner join 
			tiperuang 
				on tiperuang.tiperuang_nama=ruang.tiperuang_nama
		where 
			ruang.ruang_nama=".$ruang;
	}
	return pg_query($record);
}

//select update on from record
function record_time($count,$id){
	$query=
	"SELECT 
		record_updateon[$count] as tgl 
	from 
		record 
	where
		record_id='$id'
	LIMIT 1";
	return pg_query($query);
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

//get url
function get_url(){
	$url=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	return $url;
}

//get month now
function monthnow(){
	return date("Y-m");
}

//new record
function new_record($ruang,$bulan,$pegawai,$audit){
	if(is_null($ruang)){
		$ruangan="null";
	}
	else{
		$ruangan="'".$ruang."'";
	}
	$query="insert into record values('".$bulan.$ruang.$audit."','".$bulan."',".$ruangan.",'{}','".$pegawai."',".$audit.")";
	return pg_query($query);
}

//make hasil
function new_hasil($ruang,$bulan,$audit){
	$tipe=pg_query("select audit_tipe from audit where audit_id=$audit");
	$tipean=pg_fetch_array($tipe);
	if($tipean['audit_tipe']==1){
		$audit_1=
		"SELECT 
			* 
		from 
			komponen 
		where 
			audit_id=$audit";
		$audit_1_R=pg_query($audit_1);
		while($audit_1an=pg_fetch_array($audit_1_R)){
			$insert1=
			"INSERT into 
				hasiltipe1 
			values ( 
				'".$bulan.$ruang.$audit_1an['komponen_id']."',
				".$audit_1an['komponen_id'].",
				'{}',
				'".$bulan.$ruang.$audit."')";
			pg_query($insert1);
		}
		return true;
	}
	else if($tipean['audit_tipe']==2){
		$audit_2=
		"SELECT 
			*
		from 
			subkomponen 
		join 
			komponen on
				komponen.komponen_id=subkomponen.komponen_id
		join 
			audit on 
				komponen.audit_id=audit.audit_id
		join 
			unit on
				audit.audit_id=unit.audit_id
		join
			alatpelindung on
				alatpelindung.unit_id=unit.unit_id
		where 
			komponen.audit_id=$audit";
		$audit_2_R=pg_query($audit_2);
		while($audit_2an=pg_fetch_array($audit_2_R)){
			$insert2=
			"INSERT into 
				hasiltipe2
			values (
				'".$bulan.$ruang.$audit_2an['subkomponen_id'].$audit_2an['alatpelindung_id']."',
				".$audit_2an['subkomponen_id'].",
				".$audit_2an['alatpelindung_id'].",
				'{}',
				'".$bulan.$ruang.$audit."')";
			pg_query($insert2);
		}
		return true;
	}
	else if($tipean['audit_tipe']==3){
		$audit_3=
		"SELECT 
			*
		from 
			subkomponen 
		join 
			komponen on
				komponen.komponen_id=subkomponen.komponen_id
		join 
			audit on 
				komponen.audit_id=audit.audit_id
		where 
			komponen.audit_id=$audit";
		$audit_3_R=pg_query($audit_3);
		while($audit_3an=pg_fetch_array($audit_3_R)){
			$insert3=
			"INSERT into 
				hasiltipe3
			values (
				'".$bulan.$audit_3an['subkomponen_id']."',
				".$audit_3an['subkomponen_id'].",
				'{}',
				'".$bulan.$ruang.$audit."')";
			pg_query($insert3);
		}
		return true;
	}
}

//array leght
function count_ar($id=null){
	$count="
        SELECT 
            array_length(record_updateon, 1) as array
        FROM 
            record
        where 
			record_id='".$id."'";
	$count_R=pg_fetch_array(pg_query($count));
	return $count_R['array'];
}

//buat nambahin date pada record
function new_update($c,$id){
	$query=
	"UPDATE 
		record
	set
		record_updateon[$c]=now()
	where
		record_id='".$id."'";
	pg_query($query);
}

//buat nambahin result hasiltipe1
function result1($res,$r,$c){
	$query=
	"UPDATE
		hasiltipe1
	set
		hasiltipe1_hasil[$c]=$r
	where
		hasiltipe1_id='".$res."'";
	pg_query($query);
}

//buat nambahin result hasiltipe2
function result2($res,$r,$c){
	$query=
	"UPDATE
		hasiltipe2
	set
		hasiltipe2_hasil[$c]=$r
	where
		hasiltipe2_id='".$res."'";
	pg_query($query);
}

//buat nambahin result hasiltipe3
function result3($res,$r,$c){
	$query=
	"UPDATE
		hasiltipe3
	set
		hasiltipe3_hasil[$c]=$r
	where
		hasiltipe3_id='".$res."'";
	pg_query($query);
}

//select tipe1
function get_tipe1($id=null){
	$hasil_1=
	"SELECT
		* 
	from
		hasiltipe1";
	if(!is_null($id)){
		$hasil_1.="
			where
				record_id='".$id."'";
	}
	return pg_query($hasil_1);
}
//select tipe1 result
function get_tipe1_R($cunt,$id,$komponen){
	$query=
	"SELECT 
		hasiltipe1_hasil[$cunt] as res
	from 
		hasiltipe1
	where
		hasiltipe1.komponen_id=$komponen
	and
		hasiltipe1.record_id='$id'";
	$r=pg_fetch_array(pg_query($query));
	return $r['res'];
}

//select tipe2
function get_tipe2($id=null){
	$hasil_2=
	"SELECT
		* 
	from
		hasiltipe2";
	if(!is_null($id)){
		$hasil_2.="
			where
				record_id='".$id."'";
	}
	return pg_query($hasil_2);
}

//select tipe1 result
function get_tipe2_R($cunt,$id,$subkomponen,$alpel){
	$query=
	"SELECT 
		hasiltipe2_hasil[$cunt] as res
	from 
		hasiltipe2
	where
		hasiltipe2.subkomponen_id=$subkomponen
	and
		hasiltipe2.record_id='$id'
	and
		hasiltipe2.alatpelindung_id=$alpel";
	$r=pg_fetch_array(pg_query($query));
	return $r['res'];
}

//select tipe3
function get_tipe3($id=null){
	$hasil_3=
	"SELECT
		* 
	from
		hasiltipe3";
	if(!is_null($id)){
		$hasil_3.="
			where
				record_id='".$id."'";
	}
	return pg_query($hasil_3);
}

//select tipe3 result
function get_tipe3_R($cunt,$id,$subkomponen){
	$query=
	"SELECT 
		hasiltipe3_hasil[$cunt] as res
	from 
		hasiltipe3
	where
		hasiltipe3.subkomponen_id=$subkomponen
	and
		hasiltipe3.record_id='$id'";
	$r=pg_fetch_array(pg_query($query));
	return $r['res'];
}


?>