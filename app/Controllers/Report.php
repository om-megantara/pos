<?php

namespace App\Controllers;
use App\Models\MasterModel;
use Countable;
use PHPUnit\Framework\Constraint\Count;
use App\Libraries\Pdfgenerator;

class Report extends BaseController
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

    public function list_purchase_report()
    {
        if (has_permission('list-purchase-report')){    
            $this->builder = $this->db->table('tb_logo');
            $this->builder->select('*');
            $pt = $this->builder->get()->getResult();

            $this->builder = $this->db->table('tb_transaction_purchase');
            $this->builder->select('*');
            //  $this->builder->join('tb_transaction_detail', 'tb_transaction_detail.NotaID = tb_transaction.NotaID');
            $this->builder->join('tb_supplier', 'tb_transaction_purchase.SupplierID = tb_supplier.SupplierID');
            $this->builder->orderby('tb_transaction_purchase.POID','desc');
            $query = $this->builder->get();

            $this->builder = $this->db->table('tb_transaction_purchase');
            $this->builder->select('*');
            $this->builder->join('tb_transaction_detail_purchase', 'tb_transaction_detail_purchase.POID = tb_transaction_purchase.POID');
            $this->builder->join('tb_product', 'tb_product.ProductID = tb_transaction_detail_purchase.ProductID');
            $this->builder->join('tb_supplier', 'tb_transaction_purchase.SupplierID = tb_supplier.SupplierID');
            $this->builder->orderby('tb_transaction_detail_purchase.ProductID');
            $query2 = $this->builder->get();

            $data=[
                'logo_pt'=>$pt[0]->Logo,
                'nama_pt'=>$pt[0]->CompanyName,
                'title'=>'Purchase List',
                'breadcrumb'=>[
                    'control'=>'report',
                    'menu'=>'purchase-list',
                    ],
                'list'=>$query->getResult(),
                'detail'=>$query2->getResult(),

            ];
            // dd($data);
            return view('report/list_purchase_report',$data);
        }else{
            return redirect()->to('home/index');
        }
    }
    
    public function list_selling_report()
    {
        if (has_permission('list-selling-report')){    
            $this->builder = $this->db->table('tb_logo');
            $this->builder->select('*');
            $pt = $this->builder->get()->getResult();

            $this->builder = $this->db->table('tb_transaction');
            $this->builder->select('*');
            //  $this->builder->join('tb_transaction_detail', 'tb_transaction_detail.NotaID = tb_transaction.NotaID');
            $this->builder->join('tb_customer', 'tb_transaction.CustomerID = tb_customer.CustomerID');
            $this->builder->orderby('tb_transaction.NotaID','desc');
            $query = $this->builder->get();

            $this->builder = $this->db->table('tb_transaction');
            $this->builder->select('*');
            $this->builder->join('tb_transaction_detail', 'tb_transaction_detail.NotaID = tb_transaction.NotaID');
            $this->builder->join('tb_product', 'tb_product.ProductID = tb_transaction_detail.ProductID');
            $this->builder->join('tb_customer', 'tb_transaction.CustomerID = tb_customer.CustomerID');
            $this->builder->orderby('tb_transaction_detail.ProductID');
            $query2 = $this->builder->get();

            $data=[
                'logo_pt'=>$pt[0]->Logo,
                'nama_pt'=>$pt[0]->CompanyName,
                'title'=>'Selling List',
                'breadcrumb'=>[
                'control'=>'report',
                'menu'=>'selling-list',
                ],
                'list'=>$query->getResult(),
                'detail'=>$query2->getResult(),

            ];
            // dd($data);
            return view('report/list_selling_report',$data);
        }else{
            return redirect()->to('home/index');
        }
    }

    public function lost_profit()
    {
        if (has_permission('lost-profit')){    
            $this->builder = $this->db->table('tb_logo');
            $this->builder->select('*');
            $pt = $this->builder->get()->getResult();

            $this->builder = $this->db->table('tb_product');
               $this->builder->select('tb_product.*,sum(Qty) as Qty');
               $this->builder->join('tb_transaction_detail','tb_transaction_detail.ProductID=tb_product.ProductID');
               $this->builder->groupBy('tb_transaction_detail.ProductID');
            //    $this->builder->join('tb_category', 'tb_category.CategoryID = tb_product.CategoryID');
               $where=[
                    // 'tb_category.Status'=>'1',
                    'tb_product.Status'=>'1',
               ];
               $this->builder->where($where);
               $query = $this->builder->get();

            $this->builder = $this->db->table('tb_transaction');
            $this->builder->select('*');
            $this->builder->join('tb_transaction_detail', 'tb_transaction_detail.NotaID = tb_transaction.NotaID');
            $this->builder->join('tb_product', 'tb_product.ProductID = tb_transaction_detail.ProductID');
            $this->builder->join('tb_customer', 'tb_transaction.CustomerID = tb_customer.CustomerID');
            $query2 = $this->builder->get();

            $data=[
                'logo_pt'=>$pt[0]->Logo,
                'nama_pt'=>$pt[0]->CompanyName,
                'title'=>'Profit List',
                'breadcrumb'=>[
                'control'=>'report',
                'menu'=>'lost-profit',
                ],
                'list'=>$query->getResult(),
                'detail'=>$query2->getResult(),

            ];
            // dd($data);
            return view('report/lost-profit',$data);
        }else{
            return redirect()->to('home/index');
        }
    }
     
    public function report_selling_print($isi=null)
	{
		$Pdfgenerator = new Pdfgenerator();
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $nomor=$this->request->getvar($isi);
        $this->builder = $this->db->table('tb_logo');
        $this->builder->select('*');
        $pt = $this->builder->get()->getResult();

        $this->builder = $this->db->table('tb_transaction');
        $this->builder->select('*');
        //  $this->builder->join('tb_transaction_detail', 'tb_transaction_detail.NotaID = tb_transaction.NotaID');
        $this->builder->join('tb_customer', 'tb_transaction.CustomerID = tb_customer.CustomerID');
        $where=[
            'tb_transaction.NotaID'=>$isi,
        ];
        $this->builder->where($where);
        $query = $this->builder->get();

        $this->builder = $this->db->table('tb_transaction');
        $this->builder->select('*');
        $this->builder->join('tb_transaction_detail', 'tb_transaction_detail.NotaID = tb_transaction.NotaID');
        $this->builder->join('tb_product', 'tb_product.ProductID = tb_transaction_detail.ProductID');
        $this->builder->join('tb_customer', 'tb_transaction.CustomerID = tb_customer.CustomerID');
        $this->builder->where('tb_transaction_detail.NotaID',$isi);

        $query2 = $this->builder->get();

        $data=[
            'logo_pt'=>$pt[0]->Logo,
            'nama_pt'=>$pt[0]->CompanyName,
            'title'=>'Invoice',
            // 'breadcrumb'=>[
            // 'control'=>'report',
            // 'menu'=>'selling-list',
            // ],
            'list'=>$query->getResult(),
            'detail'=>$query2->getResult(),

        ];

        // title dari pdf
        // $data=[
        //     'title_pdf'=>'Laporan Penjualan Toko Kita',
        //     'nomor'=>$nomor,
        //     ] ;

        // filename dari pdf ketika didownload
        $file_pdf='Invoice_'.$isi;
        // $file_pdf = $namafile;
        // echo $file_pdf;        
        $html = view('cetak/report_invoice', $data);
        // return view('cetak/report_invoice', $data);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
		exit();
	}

//Stock
    public function list_stock()
    {
        if (has_permission('list-stock')){    
            $this->builder = $this->db->table('tb_logo');
            $this->builder->select('*');
            $pt = $this->builder->get()->getResult();

            $this->builder = $this->db->table('tb_product');
            $this->builder->select('*');
            $this->builder->where('Status','1');
            $query = $this->builder->get();

            $this->builder = $this->db->table('tb_stock');
            // $this->builder->select('*');
            $this->builder->select('tb_stock.*, tb_product.ProductName, concat_ws(";",concat("NOTA #",tb_transaction_detail.NotaID),concat("PO #",tb_transaction_detail_purchase.POID)) as Ket');
            $this->builder->join('tb_product', 'tb_product.ProductID = tb_stock.ProductID');
            $this->builder->join('tb_transaction_detail', 'tb_transaction_detail.ProductID = tb_stock.ProductID and tb_stock.Information=tb_transaction_detail.NotaID','left');
            $this->builder->join('tb_transaction_detail_purchase', 'tb_transaction_detail_purchase.ProductID = tb_stock.ProductID and tb_stock.Information=concat("#",tb_transaction_detail_purchase.POID)','left');
            // $this->builder->join('tb_transaction_detail_purchase', 'tb_transaction_detail_purchase.ProductID = tb_product.ProductID');
            // $this->builder->join('tb_transaction', 'tb_transaction_detail.NotaID = tb_transaction.NotaID');
            // $this->builder->join('tb_transaction_purchase', 'tb_transaction_detail_purchase.POID = tb_transaction_purchase.POID');
            // $this->builder->join('tb_customer', 'tb_transaction.CustomerID = tb_customer.CustomerID');
            // $this->builder->join('tb_supplier', 'tb_transaction_purchase.SupplierID = tb_supplier.SupplierID');
            $this->builder->orderBy('tb_stock.UpdateDate','ASC');
            // $this->builder->groupBy('tb_stock.UpdateDate');
            // $this->builder->where('tb_stock.ProductID','R3R005');

            $query2 = $this->builder->get();

            $data=[
                'logo_pt'=>$pt[0]->Logo,
                'nama_pt'=>$pt[0]->CompanyName,
                'title'=>'Stock List',
                'breadcrumb'=>[
                'control'=>'report',
                'menu'=>'stock-list',
                ],
                'list'=>$query->getResult(),
                'detail'=>$query2->getResult(),

            ];
            // dd($data);
            return view('report/list_stock',$data);
        }else{
            return redirect()->to('home/index');
        }
    }

    public function report_stoct_print($isi=null)
	{
		$Pdfgenerator = new Pdfgenerator();
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $nomor=$this->request->getvar($isi);
        $this->builder = $this->db->table('tb_logo');
            $this->builder->select('*');
            $pt = $this->builder->get()->getResult();

            $this->builder = $this->db->table('tb_product');
            $this->builder->select('*');
            $this->builder->where('Status','1','ProductID',$nomor);
            $query = $this->builder->get();

            $this->builder = $this->db->table('tb_stock');
            $this->builder->select('tb_stock.*,tb_product.ProductName,tb_transaction_detail.NotaID,tb_customer.FullName');
            $this->builder->join('tb_product', 'tb_stock.ProductID = tb_product.ProductID');
            $this->builder->join('tb_transaction_detail', 'tb_transaction_detail.ProductID = tb_product.ProductID');
            $this->builder->join('tb_transaction', 'tb_transaction_detail.NotaID = tb_transaction.NotaID');
            $this->builder->join('tb_customer', 'tb_transaction.CustomerID = tb_customer.CustomerID');
            $this->builder->where('tb_product.ProductID',$isi);
            $this->builder->orderBy('tb_stock.UpdateDate','ASC');
            $query2 = $this->builder->get();

            $data=[
                'logo_pt'=>$pt[0]->Logo,
                'nama_pt'=>$pt[0]->CompanyName,
                'title'=>'Stock List',
                'breadcrumb'=>[
                'control'=>'report',
                'menu'=>'stock-list',
                ],
                'list'=>$query->getResult(),
                'detail'=>$query2->getResult(),

            ];

        // filename dari pdf ketika didownload
        $file_pdf='Stock_'.$isi;
        // $file_pdf = $namafile;
        // echo $file_pdf;        
        // dd($data);
        $html = view('cetak/report_stock', $data);
        // return view('cetak/report_stock', $data);
        $Pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
		exit();
	}
     
}