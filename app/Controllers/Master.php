<?php

namespace App\Controllers;
use App\Models\MasterModel;

class Master extends BaseController
{
    protected $MasterModel;
    protected $db,$builder,$session;

    public function __construct()
    {
          // $this-> masterModel=new MasterModel();
          $this->db      = \Config\Database::connect();
          $this->builder = $this->db->table('users');
          $session = \Config\Services::session();
    }

    public function index()
    {
          if(empty(user()->username)){
               return redirect()->to('/');
          }else{
               $this->builder = $this->db->table('tb_logo');
               $this->builder->select('*');
               $pt = $this->builder->get()->getResult();
               $data=[
                    'title'=>"Welcome, ",
                    'logo_pt'=>$pt[0]->Logo,
                    'nama_pt'=>$pt[0]->CompanyName,
               ];
               return view('templates/home',$data);
          }  
    }
   
    public function list_product()
    {
          if (has_permission('list-product')){     
               $this->builder = $this->db->table('tb_product');
               $this->builder->select('*');
               $this->builder->join('tb_category', 'tb_category.CategoryID = tb_product.CategoryID','left');
               $where=[
                    // 'tb_category.Status'=>'1',
                    'tb_product.Status'=>'1',
               ];
               $this->builder->where($where);

               // $this->builder->where(['Status'=>1]);
               $query = $this->builder->get();

               $this->builder = $this->db->table('tb_category');
               $this->builder->select('*');
               $where=[
                    'Status'=>'1',
                    // 'tb_product.Status'=>'1',
               ];
               $this->builder->where($where);
               // $this->builder->join('tb_category', 'tb_category.CategoryID = tb_product.CategoryID');
               $query2 = $this->builder->get();

               $this->builder = $this->db->table('tb_supplier');
               $this->builder->select('*');
               $where=[
                    'Status'=>'1',
                    // 'tb_product.Status'=>'1',
               ];
               $this->builder->where($where);
               // $this->builder->join('tb_category', 'tb_category.CategoryID = tb_product.CategoryID');
               $query3 = $this->builder->get();

               $this->builder = $this->db->table('tb_logo');
               $this->builder->select('*');
               $pt = $this->builder->get()->getResult();
               // $data=[
               //      'title'=>"Welcome, ",
               //      'logo_pt'=>$pt[0]->Logo,
               //      'nama_pt'=>$pt[0]->CompanyName,
               // ];

               $data=[
                    'logo_pt'=>$pt[0]->Logo,
                    'nama_pt'=>$pt[0]->CompanyName,
                    'title'=>'Products List',
                    'breadcrumb'=>[
                    'control'=>'Master',
                    'menu'=>'product-list',
                    ],
                    'list'=>$query->getResult(),
                    'category'=>$query2->getResult(),
                    'supplier'=>$query3->getResult(),

               ];
               // dd($data);
               return view('master/list_product',$data);
          }else{
               return redirect()->to('home/index');
          }
    }

     public function save_product($isi=false)
     {
        
          if (empty($isi)){
               $data = [
                    // 'CategoryID'=>trim($this->request->getvar('category_id')),
                    'ProductID'=>trim($this->request->getvar('product_id')),
                    'CategoryID'=>trim($this->request->getvar('category')),
                    'SupplierID'=>trim($this->request->getvar('supplier')),
                    'ProductName'=>trim($this->request->getvar('product_name')),
                    'Brand'=>trim($this->request->getvar('brand')),
                    'PurchasePrice'=>trim($this->request->getvar('purchase_price')),
                    'SellingPrice'=>trim($this->request->getvar('selling_price')),
                    'Unit'=>trim($this->request->getvar('unit')),
                    'Stock'=>'0',//trim($this->request->getvar('stock')),
                    // 'ProductID'=>trim($this->request->getvar('stock')),
                    'Status'=>'1',
                    'InputDate'=>date('Y-m-d H:i:s'),
                    'UserInput'=>strtoupper(user()->username),
               ];
               $this->builder = $this->db->table('tb_product');
               $this->builder->insert($data);
               return redirect()->to('master/list-product');

          }else{
               // $status=$this->request->getvar('category_status');
               // echo $status;
               // if ($status=='0'){
               //      $this->builder = $this->db->table('tb_product');
               //      $this->builder->select('*');
               //      $this->builder->where(['CategoryID'=>$isi]);
               //      $query = $this->builder->countAllResults();
               //      // echo $query;
               //      if ($query>0){
               //           session()->setFlashdata('error', " * It Cant be Deactivated, because this Category used on other Products");
               //           return redirect()->to('master/list-product');
                         
               //      }else{
                         $data = [
                              // 'ProductID'=>trim($this->request->getvar('product_id')),
                              'CategoryID'=>trim($this->request->getvar('category')),
                              'SupplierID'=>trim($this->request->getvar('supplier')),
                              'ProductName'=>trim($this->request->getvar('product_name')),
                              'Brand'=>trim($this->request->getvar('brand')),
                              'PurchasePrice'=>trim($this->request->getvar('purchase_price')),
                              'SellingPrice'=>trim($this->request->getvar('selling_price')),
                              'Unit'=>trim($this->request->getvar('unit')),
                              //'Stock'=>trim($this->request->getvar('stock')),
                              'UpdateDate'=>date('Y-m-d H:i:s'),
                              'UserUpdate'=>strtoupper(user()->username),
                              ];
     
                              $where=['ProductID'=>$isi];
                              $this->builder = $this->db->table('tb_product');
                              $this->builder->update($data,$where);
                              return redirect()->to('master/list-product');
     
                    }
               // }else{
               //      $data = [
               //           'CategoryName'=>trim($this->request->getvar('category_name')),
               //           'Status'=>$this->request->getvar('category_status'),
               //           'UpdateDate'=>date('Y-m-d H:i:s'),
               //           'UserUpdate'=>user()->username,
               //           ];
               //           $where=['CategoryID'=>$isi];
               //           $this->builder = $this->db->table('tb_category');
               //           $this->builder->update($data,$where);
               //           return redirect()->to('master/list-product');

               // }
              
          // }
     
     }

     public function delete_product($isi=false)
     {
          $data = [
               // 'CategoryID'=>trim($this->request->getvar('category_id')),
               // 'CategoryName'=>trim($this->request->getvar('category_name')),
               'Status'=>'0',
               'UpdateDate'=>date('Y-m-d H:i:s'),
               'UserUpdate'=>user()->username,
          ];
          $where=['ProductID'=>$isi];
          $this->builder = $this->db->table('tb_product');
          $this->builder->update($data,$where);
          return redirect()->to('master/list-product');
     }

     public function list_category()
    {
          if (has_permission('list-category')){     
               $this->builder = $this->db->table('tb_category');
               $this->builder->select('*');
               $this->builder->where(['Status'=>1]);
               $query = $this->builder->get();
               $data=[
                    'title'=>'Categories List',
                    'breadcrumb'=>[
                    'control'=>'Master',
                    'menu'=>'category-list',
                    ],
                    'list'=>$query->getResult(),
               ];
               // dd($data);
               return view('master/list_category',$data);
          }else{
               return redirect()->to('home/index');
          }
    }

     public function save_category($isi=false)
     {
        //Validasi input
     //    if(!$this->validate([
     //        'cst_id'=>'required',
     //        'no_scr'=>'required|is_unique[tb_sales_contract.NoSalesContract]',            
     //    ])){
     //        // return redirect()->to('marketing/scr-list/')->openmodal('#list_scr');
     //        return redirect()->to('master/list-category');

     //    }

     
          if (empty($isi)){
               $data = [
                    // 'CategoryID'=>trim($this->request->getvar('category_id')),
                    'CategoryName'=>trim($this->request->getvar('category_name')),
                    'Status'=>'1',
                    'InputDate'=>date('Y-m-d H:i:s'),
                    'UserInput'=>user()->username,
               ];
               $this->builder = $this->db->table('tb_category');
               $this->builder->insert($data);
               return redirect()->to('master/list-category');

          }else{
               $status=$this->request->getvar('category_status');
               // echo $status;
               if ($status=='0'){
                    $this->builder = $this->db->table('tb_product');
                    $this->builder->select('*');
                    $this->builder->where(['CategoryID'=>$isi]);
                    $query = $this->builder->countAllResults();
                    // echo $query;
                    if ($query>0){
                         session()->setFlashdata('error', " * It Cant be Deactivated, because this Category used on other Products");
                         return redirect()->to('master/list-category');
                         // echo "It Can't be Deactivated, because this Category used on other Products";
                         // $this->session->set('info', "It Cant be Deactivated, because this Category used on other Products");
                         // $session->setFlashdata('item', 'value');
                    }else{
                         $data = [
                              // 'CategoryID'=>trim($this->request->getvar('category_id')),
                              'CategoryName'=>trim($this->request->getvar('category_name')),
                              'Status'=>trim($this->request->getvar('category_status')),
                              'UpdateDate'=>date('Y-m-d H:i:s'),
                              'UserUpdate'=>user()->username,
                              ];
     
                              $where=['CategoryID'=>$isi];
                              $this->builder = $this->db->table('tb_category');
                              $this->builder->update($data,$where);
                              return redirect()->to('master/list-category');
     
                    }
               }else{
                    $data = [
                         // 'CategoryID'=>trim($this->request->getvar('category_id')),
                         'CategoryName'=>trim($this->request->getvar('category_name')),
                         'Status'=>$this->request->getvar('category_status'),
                         'UpdateDate'=>date('Y-m-d H:i:s'),
                         'UserUpdate'=>user()->username,
                    ];
                    $where=['CategoryID'=>$isi];
                    $this->builder = $this->db->table('tb_category');
                    $this->builder->update($data,$where);
                    return redirect()->to('master/list-category');

               }
               // $data = [
               //      // 'CategoryID'=>trim($this->request->getvar('category_id')),
               //      'CategoryName'=>trim($this->request->getvar('category_name')),
               //      'Status'=>trim($this->request->getvar('category_status')),
               //      'UpdateDate'=>date('Y-m-d H:i:s'),
               //      'UserUpdate'=>user()->username,
               // ];

               // $where=['CategoryID'=>$isi];
               // $this->builder = $this->db->table('tb_category');
               // $this->builder->update($data,$where);
          }
     //    $this->masterModel->save_category($isi);
     //    return redirect()->to('master/list-category');
     }

     public function delete_category($isi=false)
     {
          $this->builder = $this->db->table('tb_product');
                    $this->builder->select('*');
                    $this->builder->where(['CategoryID'=>$isi]);
                    $ada = $this->builder->countAllResults();
          if ($ada>=1){
               session()->setFlashdata('error', " * It Cant be Deactivated, because this Category used on other Products");
               return redirect()->to('master/list-category');
          }else{
               $data = [
                    // 'CategoryID'=>trim($this->request->getvar('category_id')),
                    // 'CategoryName'=>trim($this->request->getvar('category_name')),
                    'Status'=>'0',
                    'UpdateDate'=>date('Y-m-d H:i:s'),
                    'UserUpdate'=>user()->username,
               ];
               $where=['CategoryID'=>$isi];
               $this->builder = $this->db->table('tb_category');
               $this->builder->update($data,$where);
               return redirect()->to('master/list-category');
          }
     }

     public function list_customer()
     {
          if (has_permission('list-customer')){     
               $this->builder = $this->db->table('tb_customer');
               $this->builder->select('*');
               // $this->builder->join('tb_category', 'tb_category.CategoryID = tb_product.CategoryID');
               $where=[
                    // 'tb_category.Status'=>'1',
                    'tb_customer.Status'=>'1',
               ];
               $this->builder->where($where);

               // $this->builder->where(['Status'=>1]);
               $query = $this->builder->get();

               $data=[
                    'title'=>'Customers List',
                    'breadcrumb'=>[
                    'control'=>'Master',
                    'menu'=>'customer-list',
                    ],
                    'list'=>$query->getResult(),
               ];
               // dd($data);
               return view('master/list_customer',$data);
          }else{
               return redirect()->to('home/index');
          }
     }

     public function save_customer($isi=false)
     {
        //Validasi input
     //    if(!$this->validate([
     //        'cst_id'=>'required',
     //        'no_scr'=>'required|is_unique[tb_sales_contract.NoSalesContract]',            
     //    ])){
     //        // return redirect()->to('marketing/scr-list/')->openmodal('#list_scr');
     //        return redirect()->to('master/list-category');

     //    }

          if (empty($isi)){
               $data = [
                    'FullName'=>strtoupper(trim($this->request->getvar('customer_name'))),
                    'Address'=>strtoupper(trim($this->request->getvar('address'))),
                    'Village'=>strtoupper(trim($this->request->getvar('village'))),
                    'SubDistricts'=>strtoupper(trim($this->request->getvar('subdistricts'))),
                    'City'=>strtoupper(trim($this->request->getvar('city'))),
                    'Province'=>strtoupper(trim($this->request->getvar('province'))),
                    'ZipCode'=>trim($this->request->getvar('zip_code')),
                    'Phone'=>'0310000000',
                    'MobilePhone'=>trim($this->request->getvar('hp_phone')),
                    'Photo'=>'0',
                    'Status'=>'1',
                    'InputDate'=>date('Y-m-d H:i:s'),
                    'UserInput'=>user()->username,
               ];
               // echo json_encode($data);
               $this->builder = $this->db->table('tb_customer');
               $this->builder->insert($data);
               return redirect()->to('master/list-customer');

          }else{
               $data = [
                    'FullName'=>strtoupper(trim($this->request->getvar('customer_name'))),
                    'Address'=>strtoupper(trim($this->request->getvar('address'))),
                    'Village'=>strtoupper(trim($this->request->getvar('village'))),
                    'SubDistricts'=>strtoupper(trim($this->request->getvar('subdistricts'))),
                    'City'=>strtoupper(trim($this->request->getvar('city'))),
                    'Province'=>strtoupper(trim($this->request->getvar('province'))),
                    'ZipCode'=>trim($this->request->getvar('zip_code')),
                    'Phone'=>'0310000000',
                    'MobilePhone'=>trim($this->request->getvar('hp_phone')),
                    'Status'=>'1',
                    'UpdateDate'=>date('Y-m-d H:i:s'),
                    'UserUpdate'=>user()->username,
               ];

               $where=['CustomerID'=>$isi];
               $this->builder = $this->db->table('tb_customer');
               $this->builder->update($data,$where);
               return redirect()->to('master/list-customer');
          }
    
     }

     public function delete_customer($isi=false)
     {
          $data = [
               // 'CategoryID'=>trim($this->request->getvar('category_id')),
               // 'CategoryName'=>trim($this->request->getvar('category_name')),
               'Status'=>'0',
               'UpdateDate'=>date('Y-m-d H:i:s'),
               'UserUpdate'=>user()->username,
          ];
          $where=['CustomerID'=>$isi];
          $this->builder = $this->db->table('tb_customer');
          $this->builder->update($data,$where);
          return redirect()->to('master/list-customer');
     }

//Supplier
     public function list_supplier()
     {
          if (has_permission('list-supplier')){     
               $this->builder = $this->db->table('tb_supplier');
               $this->builder->select('*');
               // $this->builder->join('tb_category', 'tb_category.CategoryID = tb_product.CategoryID');
               $where=[
                    // 'tb_category.Status'=>'1',
                    'tb_supplier.Status'=>'1',
               ];
               $this->builder->where($where);

               // $this->builder->where(['Status'=>1]);
               $query = $this->builder->get();

               $data=[
                    'title'=>'Supplier List',
                    'breadcrumb'=>[
                    'control'=>'Master',
                    'menu'=>'supplier-list',
                    ],
                    'list'=>$query->getResult(),
               ];
               // dd($data);
               return view('master/list_supplier',$data);
          }else{
               return redirect()->to('home/index');
          }
     }

     public function save_supplier($isi=false)
     {
        //Validasi input
     //    if(!$this->validate([
     //        'cst_id'=>'required',
     //        'no_scr'=>'required|is_unique[tb_sales_contract.NoSalesContract]',            
     //    ])){
     //        // return redirect()->to('marketing/scr-list/')->openmodal('#list_scr');
     //        return redirect()->to('master/list-category');

     //    }

          if (empty($isi)){
               $data = [
                    'SupplierName'=>strtoupper(trim($this->request->getvar('supplier_name'))),
                    'Address'=>strtoupper(trim($this->request->getvar('address'))),
                    'Village'=>strtoupper(trim($this->request->getvar('village'))),
                    'SubDistricts'=>strtoupper(trim($this->request->getvar('subdistricts'))),
                    'City'=>strtoupper(trim($this->request->getvar('city'))),
                    'Province'=>strtoupper(trim($this->request->getvar('province'))),
                    'ZipCode'=>trim($this->request->getvar('zip_code')),
                    'Phone'=>'0310000000',
                    'MobilePhone'=>trim($this->request->getvar('hp_phone')),
                    'Photo'=>'0',
                    'Status'=>'1',
                    'InputDate'=>date('Y-m-d H:i:s'),
                    'UserInput'=>user()->username,
               ];
               // echo json_encode($data);
               $this->builder = $this->db->table('tb_supplier');
               $this->builder->insert($data);
               return redirect()->to('master/list-supplier');

          }else{
               $data = [
                    'SupplierName'=>strtoupper(trim($this->request->getvar('supplier_name'))),
                    'Address'=>strtoupper(trim($this->request->getvar('address'))),
                    'Village'=>strtoupper(trim($this->request->getvar('village'))),
                    'SubDistricts'=>strtoupper(trim($this->request->getvar('subdistricts'))),
                    'City'=>strtoupper(trim($this->request->getvar('city'))),
                    'Province'=>strtoupper(trim($this->request->getvar('province'))),
                    'ZipCode'=>trim($this->request->getvar('zip_code')),
                    'Phone'=>'0310000000',
                    'MobilePhone'=>trim($this->request->getvar('hp_phone')),
                    'Status'=>'1',
                    'UpdateDate'=>date('Y-m-d H:i:s'),
                    'UserUpdate'=>user()->username,
               ];

               $where=['SupplierID'=>$isi];
               $this->builder = $this->db->table('tb_supplier');
               $this->builder->update($data,$where);
               return redirect()->to('master/list-supplier');
          }
    
     }

     public function delete_supplier($isi=false)
     {
          $data = [
               // 'CategoryID'=>trim($this->request->getvar('category_id')),
               // 'CategoryName'=>trim($this->request->getvar('category_name')),
               'Status'=>'0',
               'UpdateDate'=>date('Y-m-d H:i:s'),
               'UserUpdate'=>user()->username,
          ];
          $where=['SupplierID'=>$isi];
          $this->builder = $this->db->table('tb_supplier');
          $this->builder->update($data,$where);
          return redirect()->to('master/list-supplier');
     }
    
}