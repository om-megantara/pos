<?php

namespace App\Controllers;

// use App\Models\HomeModel;
// use App\Models\ProductModel;
// use App\Models\AboutModel;
use App\Models\MasterModel;

class Master extends BaseController
{
    protected $MasterModel;
    protected $db,$builder;

     public function __construct()
     {
             $this-> masterModel=new MasterModel();
          $this->db      = \Config\Database::connect();
        //   $this->builder = $this->db->table('users');
     }
    public function index()
    {
        if(empty(user()->username)){
            return redirect()->to('/');
        }else{
            $data=[
                'title'=>"Product",
                'products'=>$this->productModel->getProductAll(),
                'abouts'=>$this->aboutModel->About(),
            ];
            // dd($data);
            return view('/product/product',$data);
        }
    }

    public function product_list()
    {
        if (has_permission('product-list')){     

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
                    'control'=>'Master',
                    'menu'=>'Product-List',
                    ],
                    'list'=>$query->getResult(),
                    'material'=>$query2->getResult(),
                ];
                // dd($data);
                return view('master/product_list',$data);
            }
        }else{
            return redirect()->to('user/index');
       }
    }

    public function product_save($isi=null)
    {
        if (empty($isi)){
            $data=[
                'ProductName'=>trim(strtoupper($this->request->getvar('product_name'))),
                'Code'=>trim(strtoupper($this->request->getvar('code'))),
                'MaterialID'=>trim(strtoupper($this->request->getvar('material'))),
                'Type'=>trim(strtoupper($this->request->getvar('type'))),
                'Hp'=>trim(strtoupper($this->request->getvar('hp'))),
                'HargaJual'=>trim(strtoupper($this->request->getvar('harga'))),
                'Status'=>'1',
                'DateInput'=>date("Y-m-d H:i:s"),
                'UserInput'=>user()->username,
            ];
            $this->builder = $this->db->table('tb_product_jual');
            $this->builder->insert($data);
        }else{
            $data=[
                'ProductName'=>trim(strtoupper($this->request->getvar('product_name'))),
                'Code'=>trim(strtoupper($this->request->getvar('code'))),
                'MaterialID'=>trim(strtoupper($this->request->getvar('material'))),
                'Type'=>trim(strtoupper($this->request->getvar('type'))),
                'Hp'=>trim(strtoupper($this->request->getvar('hp'))),
                'HargaJual'=>trim(strtoupper($this->request->getvar('harga'))),
                'Status'=>'1',
                'DateUpdate'=>date("Y-m-d H:i:s"),
                'UserUpdate'=>user()->username,
            ];
            $where=['ProductID'=>$isi];
            $this->builder = $this->db->table('tb_product_jual');
            $this->builder->update($data,$where);
        }
		return redirect()->to('master/product-list');
    }

    public function product_delete($isi=null)
    {
        $data=[
            'Status'=>'0',
            'DateUpdate'=>date("Y-m-d H:i:s"),
            'UserUpdate'=>user()->username,
        ];
        $where=['ProductID'=>$isi];
        $this->builder = $this->db->table('tb_product_jual');
        $this->builder->update($data,$where);
		return redirect()->to('master/product-list');

    }
    // public function product_detail($id=0)
    // {
    //     if (has_permission('product-detail')){     
    //         $this->builder = $this->db->table('tb_product');
    //         $where=[
    //             'StatusDel'=>0,
    //             'ProductId'=>$id,
    //         ];
    //         $this->builder->select('*')->where($where);
    //         $query = $this->builder->get();
    //         $data=[
    //             'title'=>'Product List',
    //             'breadcrumb'=>[
    //             'control'=>'Master',
    //             'menu'=>'Product-List',
    //         ],
    //             'list'=>$query->getResult(),
    //         ];
    //         // dd($data);
    //         return view('master/product_list',$data);
    //     }else{
    //         return redirect()->to('user/index');
    //     }
    // }

    //Master Material
    public function material_list()
    {
        if (has_permission('material-list')){     

            if(empty(user()->username)){
                return redirect()->to('/');
            }else{
                $this->builder = $this->db->table('tb_material');
                $this->builder->select('*');
                $this->builder->where('Status',1);
                $query = $this->builder->get();
                $data=[
                    'title'=>'Material List',
                    'breadcrumb'=>[
                    'control'=>'Master',
                    'menu'=>'Material-List',
                    ],
                    'list'=>$query->getResult(),
                ];
                // dd($data);
                return view('master/material_list',$data);
            }
        }else{
            return redirect()->to('user/index');
       }
    }

    public function material_detail($id=0)
    {
        if (has_permission('material-detail')){     
            $this->builder = $this->db->table('tb_material');
            $where=[
                'StatusDel'=>0,
                'MaterialId'=>$id,
            ];
            $this->builder->select('*')->where($where);
            $query = $this->builder->get();
            $data=[
                'title'=>'Product List',
                'breadcrumb'=>[
                'control'=>'Master',
                'menu'=>'Product-List',
            ],
                'list'=>$query->getResult(),
            ];
            // dd($data);
            return view('master/material_list',$data);
        }else{
            return redirect()->to('user/index');
        }
    }

    public function material_save($isi=null)
    {
        if (empty($isi)){
            $data=[
                'MaterialName'=>trim(strtoupper($this->request->getvar('material_name'))),
                'Color'=>trim($this->request->getvar('color')),
                'Status'=>'1',
                'DateInput'=>date("Y-m-d H:i:s"),
                'UserInput'=>user()->username,
            ];
            $this->builder = $this->db->table('tb_material');
            $this->builder->insert($data);
        }else{
            $data=[
                'MaterialName'=>trim(strtoupper($this->request->getvar('material_name'))),
                'Color'=>trim($this->request->getvar('color')),
                'Status'=>'1',
                'DateUpdate'=>date("Y-m-d H:i:s"),
                'UserUpdate'=>user()->username,
            ];
            $where=['MaterialID'=>$isi];
            $this->builder = $this->db->table('tb_material');
            $this->builder->update($data,$where);
        }
		return redirect()->to('master/material-list');
    }

    public function material_delete($isi=null)
    {
        $data=[
            'Status'=>'0',
            'DateUpdate'=>date("Y-m-d H:i:s"),
            'UserUpdate'=>user()->username,
        ];
        $where=['MaterialID'=>$isi];
        $this->builder = $this->db->table('tb_material');
        $this->builder->update($data,$where);
		return redirect()->to('master/material-list');

    }

    //Master Customer
    public function customer_list()
    {
        if (has_permission('customer-list')){     
            if(empty(user()->username)){
                return redirect()->to('/');
            }else{
                $this->builder = $this->db->table('tb_customer');
                $this->builder->select('*');
                $this->builder->where('Status',1);
                $query = $this->builder->get();
                $data=[
                    'title'=>'Customer List',
                    'breadcrumb'=>[
                    'control'=>'Master',
                    'menu'=>'Customer-List',
                    ],
                    'list'=>$query->getResult(),
                ];
                // dd($data);
                return view('master/customer_list',$data);
            }
        }else{
            return redirect()->to('user/index');
       }
    }

    public function customer_save($isi=null)
    {
        if (empty($isi)){
            $data=[
                'CustomerName'=>trim(strtoupper($this->request->getvar('customer_name'))),
                'CustomerAddress'=>trim($this->request->getvar('customer_address')),
                'CustomerPhone'=>trim(strtoupper($this->request->getvar('no_hp'))),
                'Status'=>'1',
                'DateInput'=>date("Y-m-d H:i:s"),
                'UserInput'=>user()->username,
            ];
            $this->builder = $this->db->table('tb_customer');
            $this->builder->insert($data);
        }else{
            $data=[
                'CustomerName'=>trim(strtoupper($this->request->getvar('customer_name'))),
                'CustomerAddress'=>trim($this->request->getvar('customer_address')),
                'CustomerPhone'=>trim(strtoupper($this->request->getvar('no_hp'))),
                'Status'=>'1',
                'DateUpdate'=>date("Y-m-d H:i:s"),
                'UserUpdate'=>user()->username,
            ];
            $where=['CustomerID'=>$isi];
            $this->builder = $this->db->table('tb_customer');
            $this->builder->update($data,$where);
        }
		return redirect()->to('master/customer-list');
    }

    public function customer_delete($isi=null)
    {
        $data=[
            'Status'=>'0',
            'DateUpdate'=>date("Y-m-d H:i:s"),
            'UserUpdate'=>user()->username,
        ];
        $where=['CustomerID'=>$isi];
        $this->builder = $this->db->table('tb_customer');
        $this->builder->update($data,$where);
		return redirect()->to('master/customer-list');

    }

    //Master Sales
    public function sales_list()
    {
        if (has_permission('sales-list')){     
            if(empty(user()->username)){
                return redirect()->to('/');
            }else{
                $data=[
                    'title'=>'Sales List',
                    'breadcrumb'=>[
                    'control'=>'Master',
                    'menu'=>'Sales-List',
                    ],
                    'list'=>$this->masterModel->sales_list(),
                ];
                // dd($data);
                return view('master/sales_list',$data);
            }
        }else{
            return redirect()->to('user/index');
       }
    }

    public function sales_save($isi=null)
    {
        if (empty($isi)){
            $data=[
                'SalesName'=>trim(strtoupper($this->request->getvar('sales_name'))),
                'Hp'=>trim($this->request->getvar('no_hp')),
                'Area'=>trim(strtoupper($this->request->getvar('area'))),
                'Status'=>'1',
                'DateInput'=>date("Y-m-d H:i:s"),
                'UserInput'=>user()->username,
            ];
            $this->builder = $this->db->table('tb_sales');
            $this->builder->insert($data);
        }else{
            $data=[
                'SalesName'=>trim(strtoupper($this->request->getvar('sales_name'))),
                'Hp'=>trim($this->request->getvar('no_hp')),
                'Area'=>trim(strtoupper($this->request->getvar('area'))),
                'Status'=>'1',
                'DateUpdate'=>date("Y-m-d H:i:s"),
                'UserUpdate'=>user()->username,
            ];
            $where=['SalesID'=>$isi];
            $this->builder = $this->db->table('tb_sales');
            $this->builder->update($data,$where);
        }
		return redirect()->to('master/sales-list');
    }

    public function sales_delete($isi=null)
    {
        $data=[
            'Status'=>'0',
            'DateUpdate'=>date("Y-m-d H:i:s"),
            'UserUpdate'=>user()->username,
        ];
        $where=['SalesID'=>$isi];
        $this->builder = $this->db->table('tb_sales');
        $this->builder->update($data,$where);
		return redirect()->to('master/sales-list');
    }
}