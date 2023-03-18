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

     public function home()
     {
          if(empty(user()->username)){
               return redirect()->back();
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
   
     public function manage_shop()
     {
          if (has_permission('manage-shop')){     
               $this->builder = $this->db->table('tb_cp');
               $this->builder->select('*');
               $query = $this->builder->get();
               $data=[
                    'title'=>'Company Profile',
                    'breadcrumb'=>[
                    'control'=>'Admin',
                    'menu'=>'Company-Profile',
                    ],
                    'list'=>$query->getResult(),
               ];
               // dd($data);
               return view('admin/list_about',$data);
          }else{
               return redirect()->to('user/index');
          }
     }

     public function save_about($isi)
     {
          // echo $data;
          switch ($isi) {
               // case 'about':
               //      $data = [
               //           'contents_about'=>trim($this->request->getvar('about')),
               //      ];
               //      $this->builder = $this->db->table('tb_about');
               //      $this->builder->update($data);
               //      return redirect()->to('admin/list-about');
               //      break;

               // case 'visi':
               //      $data = [
               //           'Visi'=>trim($this->request->getvar('visi')),
               //      ];
               //      $this->builder = $this->db->table('tb_about');
               //      $this->builder->update($data);
               //      return redirect()->to('admin/list-about');
               //      break;

               // case 'misi':
               //      $data = [
               //           'Misi'=>trim($this->request->getvar('misi')),
               //      ];
               //      $this->builder = $this->db->table('tb_about');
               //      $this->builder->update($data);
               //      return redirect()->to('admin/list-about');
               //      break;
               
               case 'name':
                    $data = [
                         'name'=>trim($this->request->getvar('name')),
                         'address'=>trim($this->request->getvar('address')),
                         'phone'=>trim($this->request->getvar('phone')),
                         'email'=>trim($this->request->getvar('email')),
                         'owner'=>trim($this->request->getvar('owner')),

                    ];
                    $this->builder = $this->db->table('tb_cp');
                    $this->builder->update($data);
                    return redirect()->to('admin/list-about');
                    break;
                         
               default:
                    return redirect()->to('admin/list-about');
          } 

     }

     
}