<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->get('logged_in')) {
            $role = $session->get('role');
            if ($role == 1) {
                return redirect()->to('/dashboard_master');
            } elseif ($role == 2) {
                return redirect()->to('/dashboard_admin');
            }
        }
        return view('login');
    }

    public function login()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data = $model->where('username', $username)->first();

        if ($data) {
            $hashedPassword = $data['password'];
            $role = $data['role'];

            // Verify password using password_verify
            if (password_verify($password, $hashedPassword)) {
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'role' => $data['role'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);

                if ($role == 1) {
                    return redirect()->to('/dashboard_master');
                } elseif ($role == 2) {
                    return redirect()->to('/dashboard_admin');
                }
            } else {
                $session->setFlashdata('msg', 'Password salah!');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username tidak ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}