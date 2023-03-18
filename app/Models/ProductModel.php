<?php

namespace App\Models;

use CodeIgniter\Model;


class ProductModel extends Model
{
    protected $table      = 'tb_product';
    protected $primaryKey = 'ProductID';
    protected $useTimestamps = true;

    public function getProduct($slug=false){
        if ($slug==false){
            return $this->where(['StatusDel'=>'0'])->findAll($limit=8);
        }
        return $this->where(['Slug'=>$slug])->first();
    }

    public function getProductAll($slug=false){
        if ($slug==false){
            return $this->where(['StatusDel'=>'0'])->findAll();
        }
        return $this->where(['Slug'=>$slug])->first();
    }
}