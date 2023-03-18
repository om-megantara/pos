<?php

namespace App\Models;

use CodeIgniter\Model;


class AboutModel extends Model
{
    protected $table      = 'tb_about';
    protected $primaryKey = 'id_about';
    protected $useTimestamps = true;

    public function About($slug=false){
        if ($slug==false){
            return $this->findAll();
        }
    return $this->where(['Slug'=>$slug])->first();
    }


}