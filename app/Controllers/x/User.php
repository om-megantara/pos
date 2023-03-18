<?php

namespace App\Controllers;

class User extends BaseController
{
    // protected $MarketingModel;
    protected $db,$builder;

    public function __construct()
    {
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

    public function change_password()
    {
        if(has_permission('change-password')){
            return view('user/change_password');
        }else{
            return redirect()->to('/user');
        }
    }

    public function user_list()
    {
        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data=[
          'title'=>'User List',
          'breadcrumb'=>[
               'control'=>'User',
               'menu'=>'user-list',
           ],
           'list'=>$query->getResult(),

          ];
          // dd($data);
          return view('user/user_list',$data);
    }

    public function detail($id=null)
    {
       $this->builder = $this->db->table('vw_users_detail');
        // $this->builder->select('vw_users_detail.id as userid, username, email, fullname, user_image, name');
        $this->builder->select('*');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = vw_users_detail.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->join('users_detail', 'users_detail.UserID = vw_users_detail.id','left');
        $this->builder->where('vw_users_detail.id',$id);
        $query = $this->builder->get();

        $data=[
          'title'=>'Users Profile',
          'breadcrumb'=>[
               'control'=>'User',
               'menu'=>'user-profile',
           ],
           'list'=>$query->getRow(),
        ];
        // $user=$query->getRow()->username;
        // dd($data['list']);
        if (!empty($data['list'])){
            if(((user()->username)==($query->getRow()->username))||(in_groups('admin'))){
            // if (empty($data['list'])){
                return view('user/user_detail',$data);
                // return redirect()->to('/admin');
            }else{
                return redirect()->to('/homeadmin');
            }
        }else{
            return redirect()->to('/homeadmin');
        }

        // dd($data);
    }

    public function update_profile($id=null)
    {
        $this->builder = $this->db->table('vw_users_detail');
        // $this->builder->select('vw_users_detail.id as userid, username, email, fullname, user_image, name');
        $this->builder->select('*');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = vw_users_detail.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->join('users_detail', 'users_detail.UserID = vw_users_detail.id','left');
        $this->builder->where('vw_users_detail.id',$id);
        $query = $this->builder->get();

        $data=[
          'title'=>'Users Profile',
          'breadcrumb'=>[
               'control'=>'User',
               'menu'=>'user-profile',
           ],
           'list'=>$query->getRow(),
        ];
        // $user=$query->getRow()->username;
        // dd( $data['list']);
        if (!empty($data['list'])){
            if(((user()->username)==($query->getRow()->username))||(in_groups('admin'))){
            // if (empty($data['list'])){
                return view('user/user_update',$data);
                // return redirect()->to('/admin');
            }else{
                return redirect()->to('/homeadmin');
            }
        }else{
            return redirect()->to('/homeadmin');
        }
    }

    public function save_picture($isi)
    {
        $this->builder = $this->db->table('users');
		$dataBerkas = $this->request->getFile('foto');
		$fileName = $dataBerkas->getRandomName();

        $data=[
            'user_image'=>$fileName,
        ];
        
        $where=[
                'id'=>$isi,
        ];

        $data= $this->builder->update($data,$where);
		$dataBerkas->move('public/adm/img/foto', $fileName);
        $hal='user/'.$isi;
		return redirect()->to($hal);
    }

    public function save_profile($isi=null)
    {
        // echo $isi;
        $data=[
            'fullname'=>trim($this->request->getvar('name')),
            'email'=>trim($this->request->getvar('email')),
        ];
        $datad=[
            'UserID'=>$isi,
            'Phone'=>trim($this->request->getvar('phone')),
            'Mobile'=>trim($this->request->getvar('mobile')),
            'Address'=>trim($this->request->getvar('address')),
        ];
        
        $where=[
                'id'=>$isi,
        ];
        $whered=[
            'UserID'=>$isi,
        ];
        $this->builder = $this->db->table('users_detail');
        $this->builder->where('UserID',$isi);
        if (!empty($this->builder->get()->getResult())){
            $this->builder = $this->db->table('users');
            $this->builder->update($data,$where);
            $this->builder = $this->db->table('users_detail');
            $this->builder->update($datad,$whered);
    
        }else{
            $this->builder = $this->db->table('users');
            $this->builder->update($data,$where);
            $this->builder = $this->db->table('users_detail');
            $this->builder->insert($datad);
        }
        $hal='user/'.$isi;
		return redirect()->to($hal);
		// $dataBerkas = $this->request->getFile('foto');
		// $fileName = $dataBerkas->getRandomName();

        // $data=[
        //     'user_image'=>$fileName,
        // ];
        
        // $where=[
        //         'id'=>$isi,
        // ];

        // $data= $this->builder->update($data,$where);
		// $dataBerkas->move('public/adm/img/foto', $fileName);
        // $hal='user/'.$isi;
		// return redirect()->to($hal);
    }

    public function user_access()
    {
        if (has_permission('user-access')){ // $this->builder->select('SELECT
            $this->builder->select('users.id as userid, username, email, name, vw_auth_user_permission.user_permission_id');
            $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
            $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
            $this->builder->join('vw_auth_user_permission', 'vw_auth_user_permission.user_id = users.id','left');

            $query = $this->builder->get();

            $data=[
                'title'=>'User List',
                'breadcrumb'=>[
                    'control'=>'User',
                    'menu'=>'user-list',
                ],
                'list'=>$query->getResult(),
            ];
            // dd($data);
            return view('user/user_access',$data);
        }else{
            return redirect()->to('/user');
        }
    }
}