<?php

namespace App\Controllers;

use App\Models\UserModel;

class PenggunaController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->select('id, username, role')->findAll();

        return view('master_pengguna', $data);
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        return view('master_edit_pengguna', $data);
    }

    public function update($id)
    {
        $userModel = new UserModel();
    
        $data = [
            'username' => $this->request->getPost('username'),
            'role' => $this->request->getPost('role')
        ];
    
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = md5($password); // Hash password with MD5
        }
    
        $userModel->update($id, $data);
    
        return redirect()->to('/pengguna');
    }
    

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('/pengguna');
    }

    public function create()
    {
        return view('master_add_pengguna');
    }

    public function store()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password')),  // Hash password with MD5
            'role' => $this->request->getPost('role')
        ];

        $userModel->insert($data);

        return redirect()->to('/pengguna');
    }
}

