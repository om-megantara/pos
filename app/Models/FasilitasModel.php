<?php

namespace App\Models;

use CodeIgniter\Model;


class FasilitasModel extends Model
{
    protected $table      = 'tb_fasilitas';
    protected $primaryKey = 'FasilitasID';
    protected $useTimestamps = true;

    public function Fasilitas($slug=false){
        
        if ($slug==false){
            return $this->where(['StatusDel'=>'0'])->findAll();
            // return $this->findAll();
        }
        return $this->where(['Slug'=>$slug])->first();
    }
        
    


}