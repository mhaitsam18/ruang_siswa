<?php 

function base_url2($value='')
{
    return "http://".$_SERVER['HTTP_HOST']."/ruang_siswa/siswa/".$value;
}

function base_url3($value='')
{
    return "http://".$_SERVER['HTTP_HOST']."/ruang_siswa/guru/".$value;
}