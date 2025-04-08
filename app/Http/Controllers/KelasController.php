<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    function index(){
        // $arum = 15;
        // $galang = 7;
        // $mereka = $arum + $galang;
        // return 'Umur Galang dan Arum adalah '.$mereka;

        //bisa juga return view manggil halaman lain
        return view('kelas');
    }
}
