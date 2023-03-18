<?php

namespace App\Controllers;
// use App\Models\MarketingModel;

class Admin extends BaseController
{
     // protected $MarketingModel;
     protected $db,$builder;

     public function __construct()
     {
          // $this-> marketingModel=new MarketingModel();
          $this->db      = \Config\Database::connect();
          $this->builder = $this->db->table('users');
     }

     public function index()
     {
          if(empty(user()->username)){
               return redirect()->to('/');
          }else{
               $data=[
                    'title'=>"Welcome ",
               ];
               return view('templates/home',$data);
          }  
     }

     public function home()
     {
          if(empty(user()->username)){
               return redirect()->back();
          }else{
               $data=[
                    'title'=>"Welcome ",
               ];
               return view('templates/home',$data);
          }  
    }
    
     public function register()
     {
          if (has_permission('register')){     
            return view('auth/register');
          }else{
          //      $data=[
            return redirect()->back();

          //           'title'=>"Welcome ",
          //      ];
               // return view('templates/home',$data);
               // return redirect()->to('/register');
          //   return redirect()->to('/register');
          }  
     }
   
     public function visi_misi()
     {
          return redirect()->to('user/index');
     }
     
     public function list_about()
     {
          if (has_permission('list-about')){     
               $this->builder = $this->db->table('tb_about');
               $this->builder->select('*');
               $query = $this->builder->get();
               $data=[
                    'title'=>'About',
                    'breadcrumb'=>[
                    'control'=>'Admin',
                    'menu'=>'About-List',
                    ],
                    'list'=>$query->getResult(),
               ];
               // dd($data);
               return view('admin/list_about',$data);
          }else{
               return redirect()->to('user/index');
          }
     }

     public function detail($id=null)
     {
          $this->builder = $this->db->table('tb_about');
          if ($id=='1'){
               echo '1. satu';
               
          }elseif($id=='2'){
               $this->builder->select('contents_about');
               $query = $this->builder->get();
               $data=[
                    'title'=>'Contents About',
                    'breadcrumb'=>[
                         'control'=>'Admin',
                         'menu'=>'About / Contents About',
                    ],
                    'list'=>$query->getResult(),
               ];
               if (empty($data['list'])){
                    return redirect()->to('/admin');
               }
               // dd($data);
               return view('admin/detail_about',$data);

          }elseif($id=='3'){
               $this->builder->select('Visi');
               $query = $this->builder->get();
               $data=[
                    'title'=>'Visi',
                    'breadcrumb'=>[
                         'control'=>'Admin',
                         'menu'=>'About / Visi',
                    ],
                    'list'=>$query->getResult(),
               ];
               if (empty($data['list'])){
                    return redirect()->to('/admin');
               }
               // dd($data);
               return view('admin/detail_visi',$data);
          }elseif($id=='4'){
               $this->builder->select('Misi');
               $query = $this->builder->get();

               $data=[
                    'title'=>'Visi',
                    'breadcrumb'=>[
                         'control'=>'Admin',
                         'menu'=>'About / Visi',
                    ],
                    'list'=>$query->getResult(),
               ];
               if (empty($data['list'])){
                    return redirect()->to('/admin');
               }
               // dd($data);
               return view('admin/detail_misi',$data);
          }else{
               return redirect()->to('/admin/list-about');
          }
     }

     public function list_facilities()
     {
          if (has_permission('list-facilities')){     
               $this->builder = $this->db->table('tb_facilities');
               $this->builder->select('*')->where('StatusDel',0);
               $query = $this->builder->get();
               $data=[
                    'title'=>'List Facilities',
                    'breadcrumb'=>[
                    'control'=>'Admin',
                    'menu'=>'Facilities-List',
                    ],
                    'list'=>$query->getResult(),
               ];
               // dd($data);
               return view('admin/list_facilities',$data);
          }else{
               return redirect()->to('user/index');
          }
     }

     public function save_facilities($isi)
     {
          if (!empty($isi)){
               $data = [
                    'Code'=>trim($this->request->getvar('code')),
                    'FacilitiesName'=>trim($this->request->getvar('name')),
               ];
               $where=['FasilitasID'=>$isi];
               $this->builder = $this->db->table('tb_facilities');
               $this->builder->update($data,$where);
               return redirect()->to('admin/list-facilities');

          }else{
               return redirect()->to('admin/list-facilities');
          }
     }

     public function delete_facilities($isi)
     {
          if (!empty($isi)){
               $data = [
                    'StatusDel'=>'1' //trim($this->request->getvar('1')),
                    // 'FacilitiesName'=>trim($this->request->getvar('name')),
               ];
               $where=['FasilitasID'=>$isi];
               $this->builder = $this->db->table('tb_facilities');
               $this->builder->update($data,$where);
               return redirect()->to('admin/list-facilities');

          }else{
               return redirect()->to('admin/list-facilities');
          }
     }

     // public function facilities_detail($id=0)
     // {
     //      if (has_permission('list-facilities')){     
     //           $this->builder = $this->db->table('tb_facilities');
     //           $where=[
     //                'StatusDel'=>0,
     //                'FasilitasId'=>$id,
     //           ];
     //           $this->builder->select('*')->where($where);
     //           $query = $this->builder->get();
     //           $data=[
     //                'title'=>'List Facilities',
     //                'breadcrumb'=>[
     //                'control'=>'Admin',
     //                'menu'=>'Facilities-List',
     //                ],
     //                'list'=>$query->getResult(),
     //           ];
     //           // dd($data);
     //           return view('admin/list_facilities',$data);
     //      }else{
     //           return redirect()->to('user/index');
     //      }
     // }

     public function list_capacity()
     {
          if (has_permission('list-capacity')){     
               $this->builder = $this->db->table('tb_kapasitas_produksi');
               $this->builder->select('*')->where('StatusDel',0);
               $query = $this->builder->get();
               $data=[
                    'title'=>'List Capacity',
                    'breadcrumb'=>[
                    'control'=>'Admin',
                    'menu'=>'Capacity-List',
                    ],
                    'list'=>$query->getResult(),
               ];
               // dd($data);
               return view('admin/list_capacity',$data);
          }else{
               return redirect()->to('user/index');
          }
     }

     public function capacity_detail($id=0)
     {
          if (has_permission('list-capacity')){     
               $this->builder = $this->db->table('tb_kapasitas_produksi');
               $where=[
                    'StatusDel'=>0,
                    'KapasitasId'=>$id,
               ];
               $this->builder->select('*')->where($where);
               $query = $this->builder->get();
               $data=[
                    'title'=>'List Capacity',
                    'breadcrumb'=>[
                    'control'=>'Admin',
                    'menu'=>'Capacity-List',
                    ],
                    'list'=>$query->getResult(),
               ];
               // dd($data);
               return view('admin/list_capacity',$data);
          }else{
               return redirect()->to('user/index');
          }
     }

     public function save_capacity($isi)
     {
          if (!empty($isi)){
               $data = [
                    // 'Code'=>trim($this->request->getvar('code')),
                    'KapasitasName'=>trim($this->request->getvar('name')),
                    'Kapasitas_thn'=>trim($this->request->getvar('kapasitas')),
                    'Satuan'=>trim($this->request->getvar('unit')),
               ];
               $where=['KapasitasID'=>$isi];
               $this->builder = $this->db->table('tb_kapasitas_produksi');
               $this->builder->update($data,$where);
               return redirect()->to('admin/list-capacity');

          }else{
               return redirect()->to('admin/list-capacity');
          }
     }

     public function delete_capacity($isi)
     {
          if (!empty($isi)){
               $data = [
                    'StatusDel'=>'1' //trim($this->request->getvar('1')),
                    // 'FacilitiesName'=>trim($this->request->getvar('name')),
               ];
               $where=['KapasitasID'=>$isi];
               $this->builder = $this->db->table('tb_kapasitas_produksi');
               $this->builder->update($data,$where);
               return redirect()->to('admin/list-capacity');

          }else{
               return redirect()->to('admin/list-capacity');
          }
     }
     
     public function list_project()
     {
          if (has_permission('list-project')){     
               $this->builder = $this->db->table('tb_projects');
               $this->builder->select('*')->where('StatusDel',0);
               $query = $this->builder->get();
               $data=[
                    'title'=>'List Project',
                    'breadcrumb'=>[
                    'control'=>'Admin',
                    'menu'=>'Project-List',
                    ],
                    'list'=>$query->getResult(),
               ];
               // dd($data);
               return view('admin/list_project',$data);
          }else{
               return redirect()->to('user/index');
          }
     }

     public function project_detail($id=0)
     {
          if (has_permission('list-project')){     
               $this->builder = $this->db->table('tb_projects');
               $where=[
                    'StatusDel'=>0,
                    'ProjectId'=>$id,
               ];
               $this->builder->select('*')->where($where);
               $query = $this->builder->get();
               $data=[
                    'title'=>'List Project',
                    'breadcrumb'=>[
                    'control'=>'Admin',
                    'menu'=>'Project-List',
                    ],
                    'list'=>$query->getResult(),
               ];
               // dd($data);
               return view('admin/list_project',$data);
          }else{
               return redirect()->to('user/index');
          }
     }

     public function list_product()
     {
          if (has_permission('list-product')){     
               $this->builder = $this->db->table('tb_product');
               $this->builder->select('*')->where('StatusDel',0);
               $query = $this->builder->get();
               $data=[
                    'title'=>'List Project',
                    'breadcrumb'=>[
                    'control'=>'Admin',
                    'menu'=>'Project-List',
                    ],
                    'list'=>$query->getResult(),
               ];
               // dd($data);
               return view('admin/list_product',$data);
          }else{
               return redirect()->to('user/index');
          }
     }

     public function product_detail($id=0)
     {
          if (has_permission('list-product')){     
               $this->builder = $this->db->table('tb_product');
               $where=[
                    'StatusDel'=>0,
                    'ProductId'=>$id,
               ];
               $this->builder->select('*')->where($where);
               $query = $this->builder->get();
               $data=[
                    'title'=>'List Product',
                    'breadcrumb'=>[
                    'control'=>'Admin',
                    'menu'=>'Product-List',
                    ],
                    'list'=>$query->getResult(),
               ];
               // dd($data);
               return view('admin/list_product',$data);
          }else{
               return redirect()->to('user/index');
          }
     }

     public function list_contact()
     {
          if (has_permission('list-contact')){     
               $this->builder = $this->db->table('tb_contact');
               $this->builder->select('*');
               $query = $this->builder->get();
               $data=[
                    'title'=>'List Contact',
                    'breadcrumb'=>[
                    'control'=>'Admin',
                    'menu'=>'Contact-List',
                    ],
                    'list'=>$query->getResult(),
               ];
               // dd($data);
               return view('admin/list_contact',$data);
          }else{
               return redirect()->to('user/index');
          }
     }

     public function save_about($isi)
     {
          // echo $data;
          switch ($isi) {
               case 'about':
                    $data = [
                         'contents_about'=>trim($this->request->getvar('about')),
                    ];
                    $this->builder = $this->db->table('tb_about');
                    $this->builder->update($data);
                    return redirect()->to('admin/list-about');
                    break;

               case 'visi':
                    $data = [
                         'Visi'=>trim($this->request->getvar('visi')),
                    ];
                    $this->builder = $this->db->table('tb_about');
                    $this->builder->update($data);
                    return redirect()->to('admin/list-about');
                    break;

               case 'misi':
                    $data = [
                         'Misi'=>trim($this->request->getvar('misi')),
                    ];
                    $this->builder = $this->db->table('tb_about');
                    $this->builder->update($data);
                    return redirect()->to('admin/list-about');
                    break;
               
               case 'name':
                    $data = [
                         'title_about'=>trim($this->request->getvar('name')),
                    ];
                    $this->builder = $this->db->table('tb_about');
                    $this->builder->update($data);
                    return redirect()->to('admin/list-about');
                    break;
                         
               default:
                    return redirect()->to('admin/list-about');
          } 

     }

     
}