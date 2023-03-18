<?php

namespace App\Controllers;
use App\Models\MasterModel;
use Countable;
use PHPUnit\Framework\Constraint\Count;

class Transaction extends BaseController
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
   
//proses halaman Selling / Penjualan
     public function selling($cst=null)
     {
        if (has_permission('list-selling')){     
               $this->builder = $this->db->table('tb_logo');
               $this->builder->select('*');
               $pt = $this->builder->get()->getResult();

               $this->builder = $this->db->table('tb_product');
               $this->builder->select('*');
               $this->builder->where(['Status'=>1]);
               $query = $this->builder->get();

               $this->builder = $this->db->table('tb_customer');
               $this->builder->select('*');
               $this->builder->where(['Status'=>1]);
               $query2 = $this->builder->get();

               $this->builder = $this->db->table('tb_customer');
               $this->builder->select('CustomerID');
               $where=[
                         'Status'=>1,
                         'CustomerID'=>$cst,
                    ];
               $this->builder->where($where);
               $query4 = $this->builder->get();

               $this->builder = $this->db->table('tb_transaction_tmp');
               $this->builder->select('tb_transaction_tmp.*,tb_product.ProductName');
               $this->builder->join('tb_product', 'tb_transaction_tmp.ProductID = tb_product.ProductID');
               $this->builder->where(['tb_transaction_tmp.UserInput'=>user()->username]);
               $query3 = $this->builder->get();
               // echo json_encode($query3->getResult());

               if (!empty($query4)){
                    $cst2= $query4->getResult();
               }else{
                    $cst2= ['CustomerID'=>'0'];
               }
          // echo json_encode($cst2);
               $data=[
                         'title'=>'Selling',
                         'logo_pt'=>$pt[0]->Logo,
                         'nama_pt'=>$pt[0]->CompanyName,
                         'breadcrumb'=>[
                         'control'=>'Master',
                         'menu'=>'transaction-selling',
                         ],
                         'list'=>$query->getResult(),
                         'customer'=>$query2->getResult(),
                         'trx'=>$query3->getResult(),
                         'cst' => json_encode($cst2),
                         
               ];
               // dd($data['cst']);
               // session()->setFlashdata
               return view('transaction/selling',$data);
          }else{
               return redirect()->to('home/index');
          }
     }

//List Penjualan
     public function list_selling()
     {
          if (has_permission('list-selling')){     
               $this->builder = $this->db->table('tb_logo');
               $this->builder->select('*');
               $pt = $this->builder->get()->getResult();

               $this->builder = $this->db->table('tb_transaction');
               $this->builder->select('*');
               $this->builder->join('tb_customer', 'tb_transaction.CustomerID = tb_customer.CustomerID');
               // $where=[
               //      // 'tb_category.Status'=>'1',
               //      'tb_product.Status'=>'1',
               // ];
               // $this->builder->where($where);

               // $this->builder->where(['Status'=>1]);
               $this->builder->orderBy('tb_transaction.NotaID','desc');
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
                    'title'=>'Selling List',
                    'breadcrumb'=>[
                    'control'=>'transaction',
                    'menu'=>'list-selling',
                    ],
                    'list'=>$query->getResult(),
                    'detail'=>$query2->getResult(),
               ];
               // dd($data);
               return view('transaction/list_selling',$data);
          }else{
               return redirect()->to('home/index');
          }
     }

     public function view_product($prod_id=null)
     {
          // if (!empty($this->session->userdata('authenticated'))){
          //     $user = $this->session->userdata();
          //     if (empty($user['UserID'])){
          //         redirect('auth');
          //     }else{
               $prod_id=$this->request->getVar('id');
                    if(!is_null($prod_id)){
                         $this->builder = $this->db->table('tb_product');
                         $this->builder->select('*');
                         $this->builder->where([
                              'ProductID'=>$prod_id,
                              'Status'=>1
                         ]);
                         $query = $this->builder->get();
                         foreach ($query->getResult() as $value) {
                         // $data .= "<option value='".$value->id."'>".$value->nama."</option>";
                         $data['product_id']=$value->ProductID;
                         $data['product_name']=$value->ProductName;
                         $data['merk']=$value->Brand;
                         $data['harga_beli']=$value->PurchasePrice;
                         $data['harga_jual']=$value->SellingPrice;
                         $data['unit']=$value->Unit;
                         $data['stok']=$value->Stock;
                         // $data['customer_address']=$value->CustomerAddress;
                         // $data['customer_phone']=$value->CustomerPhone;
                         }
                    // $data=[
                    //      'test'=>'lagi test',
                    // ];
                         echo json_encode($data);
                    }else{
                         redirect('home');
                    }	
          //     }
          // }else{
          //     redirect('auth');
          // }
     }

//Tampilkan pencarian Customer berdasarkan ID Customer untuk penjualan
     public function view_customer($customer_id=null)
     {
          $customer_id=$this->request->getVar('id');
          if(!is_null($customer_id)){
               $this->builder = $this->db->table('tb_customer');
               $this->builder->select('*');
               $this->builder->where([
                    'CustomerID'=>$customer_id,
                    'Status'=>1
               ]);
               $query = $this->builder->get();
               foreach ($query->getResult() as $value) {
               // $data .= "<option value='".$value->id."'>".$value->nama."</option>";
               $data['customer_id']=$value->CustomerID;
               $data['customer_name']=$value->FullName;
               $data['customer_address']=$value->Address;
               $data['customer_phone']=$value->MobilePhone;

               
               }
               // session()->setTempdata('cst',$query[0]->CustomerID);
               // $this->session->set('customer','satu');
               echo json_encode($data);
          }else{
               redirect('home');
          }	
          
     }

     //Temporary Penjualan
     public function save_selling_temp($cst=null)
     {
          if (!empty($this->request->getvar('product_qty'))){
               //Cek nota dan buat nomor nota
               $this->builder = $this->db->table('tb_transaction');
               $this->builder->select('*');
               $nomor = $this->builder->countAllResults();
               $nota=$nomor+1;
               $nota=str_pad($nota, 5, '0', STR_PAD_LEFT);
               
               //
               $ProductID=trim($this->request->getvar('product_id'));
               $this->builder = $this->db->table('tb_transaction_tmp');
               $this->builder->select('*');
               $where=[
                    'ProductID'=>$ProductID,
                    'UserInput'=>user()->username,
               ];
               $this->builder->where($where);
               $ada = $this->builder->get()->getResult();
               
               //Cek sudah ada kode barang di Tabel temporary, Jika sudah maka
               if (!empty($ada)){

                         $data = [
                         'NotaID'=>$nota,
                         'CustomerID'=>trim($this->request->getvar('customer_id')),
                         'ProductID'=>trim($this->request->getvar('product_id')),
                         'Qty'=>trim($this->request->getvar('product_qty'))+$ada[0]->Qty,
                         'SellingPrice'=>trim($this->request->getvar('product_price')),
                         'Total'=>(trim($this->request->getvar('product_qty'))+$ada[0]->Qty)*trim($this->request->getvar('product_price')),
                         'ReadyStock'=>trim($this->request->getvar('product_stock')),
                         'periode'=>'',
                         'DateInput'=>date('Y-m-d H:i:s'),
                         'UserInput'=>user()->username,
                    ];
                    $this->builder = $this->db->table('tb_transaction_tmp');
                    $this->builder->update($data,$where);
                    // return redirect()->to('transaction/selling');
                    $url='transaction/selling/'.trim($this->request->getvar('customer_id'));
                    // return redirect()->to('transaction/selling/');
                    return redirect()->to($url);
               }else{
                    $data = [
                         'NotaID'=>$nota,
                         'CustomerID'=>trim($this->request->getvar('customer_id')),
                         'ProductID'=>trim($this->request->getvar('product_id')),
                         'Qty'=>trim($this->request->getvar('product_qty')),
                         'Total'=>'',
                         'SellingPrice'=>trim($this->request->getvar('product_price')),
                         'ReadyStock'=>trim($this->request->getvar('product_stock')),
                         'periode'=>'',
                         'DateInput'=>date('Y-m-d H:i:s'),
                         'UserInput'=>user()->username,
                    ];
                    $this->builder = $this->db->table('tb_transaction_tmp');
                    $this->builder->insert($data);
                    $url='transaction/selling/'.trim($this->request->getvar('customer_id'));
                    // return redirect()->to('transaction/selling/');
                    return redirect()->to($url);
               }
          }else{
               // return redirect()->to('transaction/selling');
               $url='transaction/selling/'.trim($this->request->getvar('customer_id'));
                    // return redirect()->to('transaction/selling/');
                    return redirect()->to($url);
          }
          
     }  

     public function delete_selling_temp($isi=null)
     {
          $this->builder = $this->db->table('tb_transaction_tmp');
          $this->builder->select('*');
          $where=[
               'ProductID'=>$isi,
               'UserInput'=>user()->username,
          ];
          $this->builder->where($where);
          $this->builder->delete();
          return redirect()->to('transaction/selling');

     }


     //Proses penjualan / Masuk Nota
     public function save_selling()
     {
          $product_id= $this->request->getvar('product_id[]');
          $product_qty= $this->request->getvar('product_qty[]');
          $product_price= $this->request->getvar('product_price[]');
          $product_stotal= $this->request->getvar('product_stotal[]');

          $this->builder = $this->db->table('tb_transaction');
          $this->builder->select('*');
          $nomor = $this->builder->countAllResults();
          $nota=$nomor+1;
          $nota=str_pad($nota, 5, '0', STR_PAD_LEFT);
          $grand_total= $this->request->getvar('grand_total');
          $customer_id= $this->request->getvar('customer_id');

          //UNtuk Table Transaksi
          $jml= Count($product_id);
          $data1=[
               'NotaID'=>$nota,
               'CustomerID'=>$customer_id,
               'Total'=>$grand_total,
               'Item'=>$jml,
               'DateInput'=>date('Y-m-d H:i:s'),
               'UserInput'=>user()->username,
          ] ;         
          
          // echo json_encode($data1);
          $this->builder = $this->db->table('tb_transaction');
          $this->builder->insert($data1);
          //Untuk Tabel Detail Transaksi      
          // $jml= Count($product_id);
          for ($i=0; $i<$jml; $i++){
               $data2=[
                    'NotaID'=>$nota,
                    'ProductID'=> $product_id[$i],
                    'Qty'=> $product_qty[$i],
                    'SellingPrice'=> $product_price[$i],
                    'SubTotal'=> $product_stotal[$i],
                    'DateInput'=>date('Y-m-d H:i:s'),
                    'UserInput'=>user()->username,
                    // 'CustomerID'=> $customer_id[$i],

               ];
               // echo "<br>".json_encode($data2);
               $this->builder = $this->db->table('tb_transaction_detail');
               $this->builder->insert($data2);

               
               $this->builder = $this->db->table('tb_logo');
               $this->builder->select('*');
               $pt = $this->builder->get()->getResult();

               //Perhitungan Stock
               //Ambil Stock sekarang
               $this->builder = $this->db->table('tb_product');
               $this->builder->select('*');
               $whereid=[
                    'ProductID'=>$product_id[$i],
                    // 'UserInput'=>user()->username,
                    // 'CustomerID'=>$customer_id,
               ];
               $this->builder->where($whereid);
               $qstock = $this->builder->get()->getResult();

               $datastock=[
                    'ProductID'=>$product_id[$i],
                    'Stock_awal'=>$qstock[0]->Stock,
                    'StockMin'=>(-1*$product_qty[$i]),
                    'StockPlus'=>'0',
                    'StockUpdate'=>(-1*$product_qty[$i]),
                    'Stock_Sekarang'=>$qstock[0]->Stock-$product_qty[$i],
                    'UpdateDate'=>date('Y-m-d H:i:s'),
                    'UserUpdate'=>user()->username,
                    'Source'=>'1',
                    'Information'=>$nota,
               ];
               // echo json_encode($datastock);
               $this->builder = $this->db->table('tb_stock');
               $this->builder->insert($datastock);
          
               $this->builder = $this->db->table('tb_product');
               $datas=[
                    'Stock'=>$qstock[0]->Stock-$product_qty[$i],
                    'UpdateDate'=>date('Y-m-d H:i:s'),
                    'UserUpdate'=>user()->username,
               ];
               $this->builder->where($whereid);
               $this->builder->update($datas);
               // return redirect()->to('transaction/selling');

               //Hapus data di tabel temp
               $this->builder = $this->db->table('tb_transaction_tmp');
               $where=[
                    'ProductID'=>$product_id[$i],
                    'UserInput'=>user()->username,
                    // 'CustomerID'=>$customer_id,
               ];
               $this->builder->where($where);
               $this->builder->delete();
          
          }
          // $this->builder = $this->db->table('tb_transaction');
          // $this->builder->insert($data1);
          return redirect()->to('transaction/list_selling');


     }

//Pembelian Purchase purchasing
     public function list_purchase()
     {
          if (has_permission('list-purchase')){     
               $this->builder = $this->db->table('tb_logo');
               $this->builder->select('*');
               $pt = $this->builder->get()->getResult();

               $this->builder = $this->db->table('tb_transaction_purchase');
               $this->builder->select('*');
               $this->builder->join('tb_supplier', 'tb_transaction_purchase.SupplierID = tb_supplier.SupplierID');
               $this->builder->orderBy('tb_transaction_purchase.POID','desc');
               $query = $this->builder->get();

               $this->builder = $this->db->table('tb_transaction_purchase');
               $this->builder->select('*');
               $this->builder->join('tb_transaction_detail_purchase', 'tb_transaction_detail_purchase.POID = tb_transaction_purchase.POID');
               $this->builder->join('tb_product', 'tb_product.ProductID = tb_transaction_detail_purchase.ProductID');
               $this->builder->join('tb_supplier', 'tb_transaction_purchase.SupplierID = tb_supplier.SupplierID');
               $query2 = $this->builder->get();

               $data=[
                    'logo_pt'=>$pt[0]->Logo,
                    'nama_pt'=>$pt[0]->CompanyName,
                    'title'=>'Purchase List',
                    'breadcrumb'=>[
                    'control'=>'transaction',
                    'menu'=>'list-purchase',
                    ],
                    'list'=>$query->getResult(),
                    'detail'=>$query2->getResult(),

               ];
               // dd($data);
               return view('transaction/list_purchase',$data);
          }else{
               return redirect()->to('home/index');
          }
     }

//Pembelian Proses input Purchase
public function purchase($sup=null)
     {
        if (has_permission('list-purchase')){     
               $this->builder = $this->db->table('tb_logo');
               $this->builder->select('*');
               $pt = $this->builder->get()->getResult();

               $this->builder = $this->db->table('tb_product');
               $this->builder->select('*');
               $this->builder->where(['Status'=>1]);
               $query = $this->builder->get();

               $this->builder = $this->db->table('tb_supplier');
               $this->builder->select('*');
               $this->builder->where(['Status'=>1]);
               $query2 = $this->builder->get();

               $this->builder = $this->db->table('tb_supplier');
               $this->builder->select('SupplierID');
               $where=[
                         'Status'=>1,
                         'SupplierID'=>$sup,
                    ];
               $this->builder->where($where);
               $query4 = $this->builder->get();

               $this->builder = $this->db->table('tb_transaction_tmp_purchase');
               $this->builder->select('tb_transaction_tmp_purchase.*,tb_product.ProductName');
               // $this->builder->select('*');
               $this->builder->join('tb_product', 'tb_transaction_tmp_purchase.ProductID = tb_product.ProductID');
               $this->builder->where(['tb_transaction_tmp_purchase.UserInput'=>user()->username]);
               $query3 = $this->builder->get();
// echo json_encode($query3->getResult());
               if (!empty($query4)){
                    $sup2= $query4->getResult();
               }else{
                    $sup2= ['SupplierID'=>'0'];
               }
          // echo json_encode($sup2);
               $data=[
                         'title'=>'Selling',
                         'logo_pt'=>$pt[0]->Logo,
                         'nama_pt'=>$pt[0]->CompanyName,
                         'breadcrumb'=>[
                         'control'=>'Master',
                         'menu'=>'transaction-purchase',
                         ],
                         'list'=>$query->getResult(),
                         'supplier'=>$query2->getResult(),
                         'trx'=>$query3->getResult(),
                         'sup' => json_encode($sup2),
                         
               ];
               // dd($data);
               // session()->setFlashdata
               return view('transaction/purchase',$data);
          }else{
               return redirect()->to('home/index');
          }
     }

     //Tampilkan pencarian Supplier berdasarkan ID supplier untuk pembelian
     public function view_supplier($supplier_id=null)
     {
          // echo "sdgsdg";
          $supplier_id=$this->request->getVar('id');
          // echo supplier_id;
          if(!is_null($supplier_id)){
               $this->builder = $this->db->table('tb_supplier');
               $this->builder->select('*');
               $this->builder->where([
                    'SupplierID'=>$supplier_id,
                    'Status'=>1
               ]);
               $query = $this->builder->get();
               foreach ($query->getResult() as $value) {
               // $data .= "<option value='".$value->id."'>".$value->nama."</option>";
               $data['supplier_id']=$value->SupplierID;
               $data['supplier_name']=$value->SupplierName;
               $data['supplier_address']=$value->Address;
               $data['supplier_phone']=$value->MobilePhone;
               
               }
               // session()->setTempdata('cst',$query[0]->supplierID);
               // $this->session->set('supplier','satu');
               echo json_encode($data);
          }else{
               redirect('home');
          }	
     }

//Temporary Pembelian
     public function save_purchase_temp($cst=null)
     {
          if (!empty($this->request->getvar('product_qty'))){
               //Cek Po dan buat nomor PO
               $this->builder = $this->db->table('tb_transaction_purchase');
               $this->builder->select('*');
               $nomor = $this->builder->countAllResults();
               $po=$nomor+1;
               $po=str_pad($po, 5, '0', STR_PAD_LEFT);
               
               //
               $ProductID=trim($this->request->getvar('product_id'));
               $this->builder = $this->db->table('tb_transaction_tmp_purchase');
               $this->builder->select('*');
               $where=[
                    'ProductID'=>$ProductID,
                    'UserInput'=>user()->username,
               ];
               $this->builder->where($where);
               $ada = $this->builder->get()->getResult();
               
               //Cek sudah ada kode barang di Tabel temporary, Jika sudah maka
               if (!empty($ada)){
                    $data = [
                         'POID'=>$po,
                         'SupplierID'=>0,//trim($this->request->getvar('supplier_id')),
                         'ProductID'=>trim($this->request->getvar('product_id')),
                         'Qty'=>trim($this->request->getvar('product_Qty'))+$ada[0]->Qty,
                         'PurchasePrice'=>trim($this->request->getvar('product_price')),
                         'Total'=>'',
                         'ReadyStock'=>trim($this->request->getvar('product_stock')),
                         'periode'=>'',
                         'DateInput'=>date('Y-m-d H:i:s'),
                         'UserInput'=>user()->username,
                    ];
                    // dd($data);

                    $this->builder = $this->db->table('tb_transaction_tmp_purchase');
                    $this->builder->update($data,$where);
                    $url='transaction/purchase/'.trim($this->request->getvar('supplier_id'));
                    return redirect()->to($url);

               }else{
                    $data = [
                         'POID'=>$po,
                         'SupplierID'=>trim($this->request->getvar('supplier_id')),
                         'ProductID'=>trim($this->request->getvar('product_id')),
                         'Qty'=>trim($this->request->getvar('product_qty')),
                         'PurchasePrice'=>trim($this->request->getvar('product_price')),
                         'Total'=>'',
                         'ReadyStock'=>trim($this->request->getvar('product_stock')),
                         'periode'=>'',
                         'DateInput'=>date('Y-m-d H:i:s'),
                         'UserInput'=>user()->username,
                    ];
                    // dd($data);

                    $this->builder = $this->db->table('tb_transaction_tmp_purchase');
                    $this->builder->insert($data);
                    $url='transaction/purchase/'.trim($this->request->getvar('supplier_id'));
                    // return redirect()->to('transaction/selling/');
                    return redirect()->to($url);
               }
          }else{
               // return redirect()->to('transaction/selling');
               $url='transaction/purchase/'.trim($this->request->getvar('supplier_id'));
                    // return redirect()->to('transaction/selling/');
                    return redirect()->to($url);
          }
          
     }

     public function save_purchase()
     {
          $this->builder = $this->db->table('tb_transaction_purchase');
          $this->builder->select('*');
          // $nomor = $this->builder->countAllResults();
          $po=$this->builder->countAllResults()+1;
          $po=str_pad($po, 5, '0', STR_PAD_LEFT);
          
          // $product_id= $this->request->getvar('product_id[]');
          $Total=0;
          $jml= Count($this->request->getvar('product_id[]'));
          for ($i=0; $i<$jml; $i++){
               $data_det = [
                    'POID'=>$po,
                    // 'SupplierID'=>trim($this->request->getvar('supplier_id[]')),
                    'ProductID'=>trim($this->request->getvar('product_id[]')[$i]),
                    'Qty'=>trim($this->request->getvar('product_qty[]')[$i]),//+$ada[0]->Qty,
                    'Price'=>trim($this->request->getvar('product_price[]')[$i]),
                    'SubTotal'=>($this->request->getvar('product_qty[]')[$i])*$this->request->getvar('product_price[]')[$i],
                    // 'ReadyStock'=>trim($this->request->getvar('product_stock[]')[$i]),
                    // 'periode'=>'',
                    // $sub=
                    // 'Total'=>$Total,
                    'DateInput'=>date('Y-m-d H:i:s'),
                    'UserInput'=>user()->username,
               ];
               
               $Total=$Total+(($this->request->getvar('product_qty[]')[$i])*$this->request->getvar('product_price[]')[$i]);

                    // echo "<br>".json_encode($data1)."| Total".$data1['Total'];

               // //Untuk Tabel Detail Transaksi      
               $this->builder = $this->db->table('tb_transaction_detail_purchase');
               $this->builder->insert($data_det);
               // $jml= Count($product_id);
               // for ($i=0; $i<$jml; $i++){
               //      $data2=[
               //           'POID'=>$po,
               //           'ProductID'=> trim($this->request->getvar('product_id[]')[$i]),
               //           'Qty'=> trim($this->request->getvar('product_qty[]')[$i]),
               //           'Price'=> trim($this->request->getvar('product_price[]')[$i]),
               //           'SubTotal'=> trim($this->request->getvar('product_qty[]')[$i]) * trim($this->request->getvar('product_price[]')[$i]),
               //           'DateInput'=>date('Y-m-d H:i:s'),
               //           'UserInput'=>user()->username,
               //           // 'CustomerID'=> $customer_id[$i],

               //      ];
               //      echo "<br>".json_encode($data2);
               //      // $this->builder = $this->db->table('tb_transaction_detail_purchase');
               //      // $this->builder->insert($data2);
               //      // echo json_encode($data);

                    //      //Perhitungan Stock
                    //Ambil Stock sekarang
                    $this->builder = $this->db->table('tb_product');
                    $this->builder->select('*');
                    $whereid=[
                         'ProductID'=>trim($this->request->getvar('product_id[]')[$i]),
                         // 'UserInput'=>user()->username,
                         // 'CustomerID'=>$customer_id,
                    ];
                    $this->builder->where($whereid);
                    $qstock = $this->builder->get()->getResult();

                    $datastock=[
                         'ProductID'=>trim($this->request->getvar('product_id[]')[$i]),
                         'Stock_awal'=>$qstock[0]->Stock,
                         'StockMin'=>'0',//$product_qty[$i],
                         'StockPlus'=>trim($this->request->getvar('product_qty[]')[$i]),
                         'StockUpdate'=>trim($this->request->getvar('product_qty[]')[$i]),
                         'Stock_Sekarang'=>$qstock[0]->Stock + trim($this->request->getvar('product_qty[]')[$i]),
                         'UpdateDate'=>date('Y-m-d H:i:s'),
                         'UserUpdate'=>user()->username,
                         'Source'=>'2',
                         'Information'=>"#".$po,
                    ];
                    // echo json_encode($datastock);
                    $this->builder = $this->db->table('tb_stock');
                    $this->builder->insert($datastock);
               
                    $this->builder = $this->db->table('tb_product');
                    $datas=[
                         'Stock'=>$qstock[0]->Stock + trim($this->request->getvar('product_qty[]')[$i]),
                         'UpdateDate'=>date('Y-m-d H:i:s'),
                         'UserUpdate'=>user()->username,
                    ];
                    $this->builder->where($whereid);
                    $this->builder->update($datas);
                    // return redirect()->to('transaction/selling');

                    // Hapus data di tabel temp
                    $this->builder = $this->db->table('tb_transaction_tmp_purchase');
                    $where=[
                         'POID'=>$po,
                         'ProductID'=>trim($this->request->getvar('product_id[]')[$i]),
                         'UserInput'=>user()->username,
                         // 'CustomerID'=>$customer_id,
                    ];
                    $this->builder->where($where);
                    $this->builder->delete();
               
               // }

          }
          //Tabel Transaksi Pembelian/Purchase
          $data = [
               'POID'=>$po,
               'SupplierID'=>trim($this->request->getvar('supplier_id[]')),
               'Item'=>$jml,
               'Total'=>$Total,
               'DateInput'=>date('Y-m-d H:i:s'),
               'UserInput'=>user()->username,
          ];
          $this->builder = $this->db->table('tb_transaction_purchase');
          $this->builder->insert($data);
                    // echo "<br>".json_encode($data_det)."| Total".$Total;

          return redirect()->to('transaction/list_purchase');


     }

     public function delete_purchase_temp($isi=null)
     {
          $this->builder = $this->db->table('tb_transaction_tmp_purchase');
          $this->builder->select('*');
          $where=[
               'ProductID'=>$isi,
               'UserInput'=>user()->username,
          ];
          $this->builder->where($where);
          $this->builder->delete();
          return redirect()->to('transaction/purchase');

     }

}