<?php 
function is_logged_in()
{
	$ci = get_instance();
	if (!$ci->session->userdata('username')) {
		redirect('auth');
	} else{
	}
}

function base_url2($value='')
{
    return "http://".$_SERVER['HTTP_HOST']."/ruang_siswa/siswa/".$value;
}

function base_url3($value='')
{
    return "http://".$_SERVER['HTTP_HOST']."/ruang_siswa/admin/".$value;
}

function cari_tanggal($tanggal)
{
    $bulan = '';
    switch (date('n',strtotime($tanggal))) {
        case 1: $bulan = 'Januari'; break;
        case 2: $bulan = 'Februari'; break;
        case 3: $bulan = 'Maret'; break;
        case 4: $bulan = 'April'; break;
        case 5: $bulan = 'Mei'; break;
        case 6: $bulan = 'Juni'; break;
        case 7: $bulan = 'Juli'; break;
        case 8: $bulan = 'Agustus'; break;
        case 9: $bulan = 'September'; break;
        case 10: $bulan = 'Okteber'; break;
        case 11: $bulan = 'November'; break;
        case 12: $bulan = 'Desember'; break;
    }

    return date('j',strtotime($tanggal))." $bulan ".date('Y',strtotime($tanggal));
}

function cari_waktu($tanggal)
{
    $bulan = '';
    switch (date('n',strtotime($tanggal))) {
        case 1: $bulan = 'Januari'; break;
        case 2: $bulan = 'Februari'; break;
        case 3: $bulan = 'Maret'; break;
        case 4: $bulan = 'April'; break;
        case 5: $bulan = 'Mei'; break;
        case 6: $bulan = 'Juni'; break;
        case 7: $bulan = 'Juli'; break;
        case 8: $bulan = 'Agustus'; break;
        case 9: $bulan = 'September'; break;
        case 10: $bulan = 'Okteber'; break;
        case 11: $bulan = 'November'; break;
        case 12: $bulan = 'Desember'; break;
    }

    return date('j',strtotime($tanggal))." $bulan ".date('Y H:i:s',strtotime($tanggal));
}