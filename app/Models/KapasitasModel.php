<?php

namespace App\Models;

use CodeIgniter\Model;

class KapasitasModel extends Model
{
    protected $table      = 'tb_kapasitas_produksi';
    protected $primaryKey = 'KapasitasID';
    protected $useTimestamps = true;

    public function Kapasitas($slug=false){
        
        if ($slug==false){
            return $this->where(['StatusDel'=>'0'])->findAll();
            // return $this->findAll();
        }
        return $this->where(['Slug'=>$slug,'StatusDel'=>0])->first();
    }
        
    


}