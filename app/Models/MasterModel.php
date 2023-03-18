<?php

namespace App\Models;

use CodeIgniter\Model;


class MasterModel extends Model
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
        if ($slug==false){
            return $data;
        }
    }

    public function save_category($isi=false)
    {
            // $data = [
            //     'CategoryID'=>trim($this->request->getvar('category_id')),
            //     'CategoryName'=>trim($this->request->getvar('category_name')),
            //     'InputDate'=>date('Y-m-d H:i:s'),
            //     'UserInput'=>user()->username,
            // ];
            // if (empty($isi)){
            //     $this->builder = $this->db->table('tb_category');
            //     $this->builder->insert($data);
            // }else{
            //     $where=['CategoryID'=>$isi];
            //     $this->builder = $this->db->table('tb_category');
            //     $this->builder->update($data,$where);
            // }
        // echo $data;
        
        // $this->builder = $this->db->table('tb_category');
        // $this->builder->select('*');
        // $this->builder->where('Status',1);
        // $query = $this->builder->get();
        // $data=$query->getResultArray();
        // if ($slug==false){
        //     return $data;
        // }
        // $this->builder = $this->db->table('tb_category');
        // $this->builder->insert($data);
        echo $isi;
    }

    
}