<?php

namespace App\Controllers;
use App\Models\MarketingModel;

class Marketing extends BaseController
{
    protected $MarketingModel;
    protected $db,$builder;

    public function __construct()
    {
       $this-> marketingModel=new MarketingModel();
       
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
    public function do_list()
    {
        if(has_permission('do-list')){
            $data=[
                'title'=>'Delivery Order (DO) List',
                'breadcrumb'=>[
                    'control'=>'Marketing',
                    'menu'=>'do-list',
                ],
                'list'=>$this->marketingModel->getDO(),
            ];
            return view('marketing/do_list',$data);
        }else{
            return redirect()->to('/user');
        }
    }
    public function scr_list()
    {
        if(has_permission('scr-list')){
            $data=[
                'title'=>'Sales Contract (SCR) List',
                'breadcrumb'=>[
                    'control'=>'Marketing',
                    'menu'=>'scr-list',
                ],
                'list'=>$this->marketingModel->getSCR(),
            ];
            return view('marketing/scr_list',$data);
        }else{
            return redirect()->to('/user');
        }
    }

    public function scr_save()
    {
        //Validasi input
        if(!$this->validate([
            'cst_id'=>'required',
            'no_scr'=>'required|is_unique[tb_sales_contract.NoSalesContract]',            
        ])){
            // return redirect()->to('marketing/scr-list/')->openmodal('#list_scr');
            return redirect()->to('marketing/scr-list');

        }

        $data = [
            'CustomerID'=>trim($this->request->getvar('cst_id')),
            'NoSalesContract'=>trim($this->request->getvar('no_scr')),
            'Tgl_Input'=>date('Y-m-d H:i:s'),
            'InputBy'=>user()->username,
        ];
        $this->marketingModel->scr_save($data);
        return redirect()->to('marketing/scr-list');
    }

    public function customer_login()
    {
        if(has_permission('customer-login')){
            $data=[
                'title'=>'Customer Login',
                'breadcrumb'=>[
                    'control'=>'Marketing',
                    'menu'=>'customer-login',
                ],
                'list'=>$this->marketingModel->getCustomer(),
            ];
            // dd($data);
            return view('marketing/customer_login',$data);
        }else{
            return redirect()->to('/user');
        }
    }

    public function saran_customer()
    {
        if(has_permission('saran-customer')){
            $data=[
                'title'=>'Saran Customer',
                'breadcrumb'=>[
                    'control'=>'Marketing',
                    'menu'=>'saran-customer',
                ],
                'list'=>$this->marketingModel->getSaranCustomer(),
            ];
            // dd($data);
            return view('marketing/saran_customer',$data);
        }else{
            return redirect()->to('/user');
        }
    }
}