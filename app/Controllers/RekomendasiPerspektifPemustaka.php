<?php

namespace App\Controllers;

use App\Models\PengadaanModel;
use App\Models\UsulanModel;

class RekomendasiPerspektifPemustaka extends BaseController
{
    protected $pengadaanModel;
    protected $usulanModel;

    public function __construct()
    {
        $this->pengadaanModel = new PengadaanModel();
        $this->usulanModel = new UsulanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengadaan',
            'validation' => \config\Services::validation(),
            'rangking' => $this->pengadaanModel->getRangking(),
            'pemustaka' => $this->usulanModel->getRangking(),
            // 'rangking'  => $this->p->getUrutan()
        ];
        return view('rekomendasiperspektifpemustaka', $data);
    }

    //--------------------------------------------------------------------

}
