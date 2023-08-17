<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AdminModel; 

class Login extends ResourceController
{
    protected $session;

    public function __construct() {
        $this->adminModel = new AdminModel();
        $this->session = \Config\Services::session();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        echo view('auth/login');
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        try{
            $validate = $this->validate([
                'email' => 'required',
                'password' => 'required',
            ], [
                "email" => [
                    "required" => "Email harus diisi!",
                ],
                "password" => [
                    "required" => "Anda harus mengisi kata sandi!",
                ],
            ]);

            if(!$validate){
                session()->setFlashdata('errors', $this->validator->listErrors());
                return redirect()->to(previous_url())->withInput();
            }

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
    
            $user = $this->adminModel
                    ->where('email', $email)
                    ->first();
    
            if(!$user) {
                session()->setFlashData("errors", "Email salah!");
                return redirect()->to(previous_url())->withInput();
            }
    
            if(md5($password) != $user['password']) {
                session()->setFlashData("errors", "Password salah!");
                return redirect()->to(previous_url())->withInput();
            }
    
            $this->session->set('id', $user['id']);
            $this->session->set('name', $user['first_name']);
            $this->session->set('loggedIn', true);
    
            return redirect()->to('/admin');
        }catch(\Exception $e){
            return redirect()->to(previous_url());
        }

    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}