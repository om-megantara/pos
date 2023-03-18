<?php
namespace App\Controllers;

class HomeAdmin extends BaseController
{
    public function __construct()

    {

    // $this->session = service('session');

    // $this->auth = service('authentication');

    }
public function index(){
    //jika belum login jangan diberi akses

    if(empty(user()->username)){
        return redirect()->to('/');
    }else{
        $data=[
             'title'=>"Welcome ",
        ];
        return view('templates/home',$data);
        // echo "dsdfdf";
    }  

}
}