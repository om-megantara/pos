<?php

namespace App\Models;

use CodeIgniter\Model;


class HrdModel extends Model
{
    protected $db,$builder;
    protected $useTimestamps = true;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
    }

    public function sales_list($slug=false){
        
        $this->builder = $this->db->table('tb_sales');
        $this->builder->select('*');
        $this->builder->where('Status',1);
        $query = $this->builder->get();
        $data=$query->getResultArray();
// dd($data);
        if ($slug==false){
            return $data;
        }
    }

    
}