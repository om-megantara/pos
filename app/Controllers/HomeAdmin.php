<?php
namespace App\Controllers;

class HomeAdmin extends BaseController
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
    
    public function index(){
    //jika belum login jangan diberi akses

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
        //  echo "dsdfdf";
    }  

}
}