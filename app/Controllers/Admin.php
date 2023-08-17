<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\InternModel;

class Admin extends ResourceController
{
    public function __construct() {
        $this->internModel = new InternModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $interns = $this->internModel->findAll();

        $payload = [
            "products" => $interns
        ];

        echo view('admin/index');
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
        echo view('/admin/input');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $payload = [
            "name" => $this->request->getPost('name'),
            "cof" => $this->request->getPost('cof'),
            "current_edu" => $this->request->getPost('current_edu'),
            "edu_status" => $this->request->getPost('edu_status'),
        ];


        $this->internModel->insert($payload);
        return redirect()->to('/admin');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $interns = $this->internModel->find($id);
        
        if (!$interns) {
            throw new \Exception("Data not found!");   
        }
        
        echo view('admin/edit', ["data" => $interns]);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $payload = [
            "name" => $this->request->getPost('name'),
            "cof" => $this->request->getPost('cof'),
            "current_edu" => $this->request->getPost('current_edu'),
            "edu_status" => $this->request->getPost('edu_status'),
        ];

        $this->internModel->update($id, $payload);
        return redirect()->to('/admin');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->internModel->delete($id);
        return redirect()->to('/admin');
    }
}
