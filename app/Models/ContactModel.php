<?php

namespace App\Models;

use CodeIgniter\Model;


class ContactModel extends Model
{
    protected $table      = 'tb_contact';
    protected $primaryKey = 'id_kontak';
    protected $useTimestamps = true;

    public function getMaps($slug=false){
        if ($slug==false){
            return $this->where(['StatusDel'=>'0'])->findAll();
        }
    return $this->where(['Slug'=>$slug])->first();
    }


}