<?php

namespace App\Controllers;

// use App\Models\HomeModel;
// use App\Models\ProductModel;
// use App\Models\AboutModel;
use App\Models\HrdModel;

class Hrd extends BaseController
{
    protected $HrdModel;
    protected $db,$builder;

     public function __construct()
     {
             $this-> hrdModel=new HrdModel();
          $this->db      = \Config\Database::connect();
        //   $this->builder = $this->db->table('users');
     }
    public function index()
    {
        if(empty(user()->username)){
            return redirect()->to('/');
        }else{
            $data=[
                'title'=>"HRD",
                // 'products'=>$this->productModel->getProductAll(),
                // 'abouts'=>$this->aboutModel->About(),
            ];
            // dd($data);
            return view('/product/product',$data);
        }
    }

    public function rekap_absen()
    {
        if (has_permission('rekap-absen')){     

            if(empty(user()->username)){
                return redirect()->to('/');
            }else{
                $this->builder = $this->db->table('tb_product_jual');
                $this->builder->select('tb_product_jual.*,tb_material.*');
                $this->builder->join('tb_material', 'tb_product_jual.MaterialID=tb_material.MaterialID');
                $this->builder->where('tb_product_jual.Status',1);
                $this->builder->orderBy("tb_product_jual.ProductID asc");
                $query = $this->builder->get(); 

                $this->builder = $this->db->table('tb_material');
                $query2 = $this->builder->get(); 
                $data=[
                    'title'=>'Product List',
                    'breadcrumb'=>[
                    'control'=>'HRD',
                    'menu'=>'Rekap_absen',
                    ],
                    'list'=>$query->getResult(),
                    'material'=>$query2->getResult(),
                ];
                // dd($data);
                return view('hrd/rekap_absen',$data);
            }
        }else{
            return redirect()->to('user/index');
       }
    }

    
}