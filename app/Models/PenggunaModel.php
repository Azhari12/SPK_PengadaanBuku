<?php

namespace App\Models;

use CodeIgniter\Database\SQLite3\Table;
use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = "tb_user";
    protected $primaryKey = "username";
    protected $allowedFields = ['username', 'password', 'level'];

    public function hapus($username)
    {
        return $this->where(['username' => $username])->delete();
    }
}
