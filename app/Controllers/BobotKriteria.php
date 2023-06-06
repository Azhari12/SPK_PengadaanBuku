<?php

namespace App\Controllers;

use App\Models\KriteriaPerpusModel;

class BobotKriteria extends BaseController
{

	//--------------------------------------------------------------------

	protected $kriteriaPerpusModel;

	public function __construct()
	{
		$this->kriteriaPerpusModel = new KriteriaPerpusModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Daftar Pengadaan',
			'validation' => \config\Services::validation(),
			'perpus_bobot' => $this->kriteriaPerpusModel->getKriteria(),
			// 'rangking'  => $this->p->getUrutan()
		];

		return view('/bobotkriteria', $data);
	}

	public function update($id)
	{
		$this->kriteriaPerpusModel->update($id, [
			'id_bku' => $id,
			'bobot_kriteria' => $this->request->getVar('bobot_kriteria'),

		]);

		session()->setFlashdata('pesan_ubah', 'Data Berhasil Di Ubah');

		return redirect()->to('/bobotkriteria');
	}
}
