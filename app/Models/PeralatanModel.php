<?php

namespace App\Models;

use CodeIgniter\Model;


class PeralatanModel extends Model
{
    protected $table      = 'tb_peralatan_produksi';
    protected $primaryKey = 'PeralatanID';
    protected $useTimestamps = true;

    public function Peralatan($slug=false){
        if ($slug==false){
            return $this->where(['StatusDel'=>'0'])->findAll();
        }
    return $this->where(['Slug'=>$slug])->first();
    }


}