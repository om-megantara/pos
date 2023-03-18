<?php

namespace App\Models;

use CodeIgniter\Model;


class MarketingModel extends Model
{
    protected $db,$builder;
    protected $useTimestamps = true;
    
    public function __construct()
    {
        $this->db      = \Config\Database::connect();

    }

    public function getDO($slug=false){
        $this->builder = $this->db->table('tb_do_customer');
        $this->builder->select('tb_do_customer.*,tb_login_customer.CustomerName');
        $this->builder->join('tb_login_customer', 'tb_login_customer.CustomerID = tb_do_customer.CustomerID');
        $query = $this->builder->get();
        $data=$query->getResultArray();
        if ($slug==false){
            return $data;
        }
    }

    public function getSCR($slug=false){
        $this->builder = $this->db->table('tb_sales_contract');
        $this->builder->select('tb_sales_contract.*,tb_login_customer.CustomerName');
        $this->builder->join('tb_login_customer', 'tb_login_customer.CustomerID = tb_sales_contract.CustomerID');
        $query = $this->builder->get();
        $data=$query->getResultArray();
        if ($slug==false){
            return $data;
        }
    }

    public function scr_save($data)
    {
        $this->builder = $this->db->table('tb_sales_contract');
        $this->builder->insert($data);
    }

    public function getCustomer($slug=false)
    {
        $this->builder = $this->db->table('tb_login_customer');
        $this->builder->select('*');
        $query = $this->builder->get();
        $data=$query->getResultArray();
        // dd($data);
        if ($slug==false){
            return $data;
        }
    }

    public function getSaranCustomer($slug=false)
    {
        $this->builder = $this->db->table('tb_customer');
        // $idcus=$this->input->get('customer'); 
        // // $idcus=$idcus;
        // if (is_null($idcus)) {
        //     $this->db->select('*');//->result();
        //     $this->db->from('tb_saran');
        //     $this->db->group_by('Customer');
        //     $query = $this->db->get(); 
        //     return $query->result();
        //  }else{
            
    //     $this->db->from('tb_po');
    //     // $this->db->join('tb_login_customer', 'tb_login_customer.CustomerID=tb_do_customer.CustomerID','left');
    //     // $this->db->order_by("tb_do_customer.AmbilID desc");
    //     $query = $this->db->get(); 

            $this->builder->select('tb_saran.*,tb_customer.CustomerName');
            // $this->builder->from('tb_saran');
            $this->builder->join('tb_saran','tb_saran.Customer=tb_customer.CustomerID');
            // $this->builder->groupBy('tb_saran.Customer');

        // $this->builder = $this->db->table('tb_login_customer');
        // $this->builder->select('*');
        $query = $this->builder->get();
        $data=$query->getResultArray();
        // dd($data);
        if ($slug==false){
            return $data;
        }
    }

}