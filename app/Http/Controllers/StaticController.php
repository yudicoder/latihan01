<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function hello()
    {
        $kata = "Hello saya Riku dan saya saat ini akan lulus dari kuliah, salam kenal ya. 
        Berikut contoh dari hasil design grafik yang saya buat :).";
        $profil = [
            'Facebook' => 'riku@gmail.com',
            'Twitter' => 'riku@gmail.com',
            'Telepon' => '022-232392',
            'Alamat' => 'Jl. Harapan Bangsa No.23, Bandung, Indonesia'
        ];
        return view('index')->with('profil', $profil)->with('kalimat', $kata);
    }
}
