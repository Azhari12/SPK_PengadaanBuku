<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

class Login extends BaseController
{
	protected $PenggunaModel;

	public function __construct()
	{
		$this->penggunaModel = new PenggunaModel();
	}

	public function index()
	{
		return view('login');
	}


	public function auth_()
	{
		$session = session();
		$model = new PenggunaModel();
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$data = $model->where('username', $username)->first();

		if ($data) {
			$pass = $data['password'];
			$verify_pass = ($pass);
			if ($verify_pass == $password) {
				$ses_data = [
					'username'  	=> $data['username'],
					'level_akses'   => $data['level'],
					'logged_in'     => TRUE
				];

				$session = $session->set($ses_data);

				return redirect()->to('/home');
			} else {
				$session->setFlashdata('msg', 'Username atau Password Anda Salah!');
				return redirect()->to(base_url());
			}
		} else {
			$session->setFlashdata('msg', '<b>Username</b> atau <b>Password</b> Anda Salah!');
			return redirect()->to(base_url());
		}
	}

	public function logout()
	{
		$session = session();

		$session->destroy();

		return redirect()->to(base_url());
	}

	//--------------------------------------------------------------------

}
