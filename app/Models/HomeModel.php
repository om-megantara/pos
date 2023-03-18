<?php

namespace App\Models;

use CodeIgniter\Model;


class HomeModel extends Model
{
    protected $table      = 'tb_product,tb_fasilitas';
    protected $primaryKey = 'ProductID,FasilitasID';
    protected $useTimestamps = true;

    // protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    // protected $allowedFields = ['name', 'email'];

    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    public function Fasilitas($slug=false){
        
        if ($slug==false){
            return $this->findAll();
        }
        return $this->where(['Slug'=>$slug])->first();
    }
        
    public function getProduct($slug=false){
        if ($slug==false){
            return $this->findAll();
        }
    return $this->where(['Slug'=>$slug])->first();
    }


}