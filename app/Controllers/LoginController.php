<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public function login()
    {
        $session = session();
        if ($session->get('logged_in')) {
            return $this->redirectUser();
        }
        return view('/login');
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();

        $nama_pengguna = $this->request->getVar('username');
        $sandi_pengguna = md5($this->request->getVar('password'));

        $user = $model->where('username', $nama_pengguna)
            ->where('password', $sandi_pengguna)
            ->first();

        if ($user) {
            $ses_data = [
                'username' => $user['username'],
                'password' => $user['password'],
                'role' => $user['role'],
                'logged_in' => TRUE
            ];
            $session->set($ses_data);
            return $this->redirectUser();
        } else {
            $session->setFlashdata('msg', 'Wrong Username or Password');
            return redirect()->to('/login');
        }
    }

    private function redirectUser()
    {
        $session = session();
        if ($session->get('role') == 1) {
            return redirect()->to('/dashboard_master');
        } elseif ($session->get('role') == 2) {
            return redirect()->to('/dashboard_admin');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
