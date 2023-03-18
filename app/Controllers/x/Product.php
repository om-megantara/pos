<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\ProductModel;
use App\Models\AboutModel;

class Product extends BaseController
{
    protected $homeModel;
    protected $productModel;
    protected $aboutModel;

    public function __construct()
    {
        $this->homeModel=new HomeModel();
        $this->productModel=new ProductModel();
        $this->aboutModel=new AboutModel();
    }

    public function index()
    {
        $data=[
            'title'=>"Product",
            'products'=>$this->productModel->getProductAll(),
            'abouts'=>$this->aboutModel->About(),
        ];
        // dd($data);
        return view('/product/product',$data);
    }

    public function detail($slug)
    {
        $data=[
            'title'=>"Product",
            'products'=>$this->productModel->getProductAll($slug),
            'abouts'=>$this->aboutModel->About(),
        ];
        // dd($data);
        return view('/product/product_detail',$data);
    }
}