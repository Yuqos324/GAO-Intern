<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InternModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->internModel = new InternModel();
    }

    public function index()
    {
        $interns = $this->internModel->findAll();

        $data = [
            "interns" => $interns,
        ];

        echo view('admin/index', $data);
    }

    public function input()
    {
        echo view ('admin/input');
    }

    public function internTable() {
        $interns = $this->internModel->findAll();

        $data = [
            "interns" => $interns,
            "intern_count" => $this->internModel->internCount(),
        ];

        echo view('admin/table', $data);
    }

    public function create()
    {
        $data = [
            "name" => $this-> request->getpost('name'),
            "cof" => $this-> request->getpost('cof'),
            "current_edu" => $this-> request->getpost('current_edu'),
            "edu_status" => $this-> request->getpost('edu_status'),
        ];

        $this->internModel->insert($data);
        return redirect()->to('/admin');
    }

    public function edit($id = null)
    {
        $intern = $this->internModel->find($id);

        if (!$intern){
            throw new \Exception("Data not found!");
        }

        echo view('admin/edit', ["data" => $intern]);
    }

    public function update($id = null)
    {
        $data = [
            "name" => $this-> request->getpost('name'),
            "cof" => $this-> request->getpost('cof'),
            "current_edu" => $this-> request->getpost('current_edu'),
            "edu_status" => $this-> request->getpost('edu_status'),
        ];

        $this->internModel->update($id, $data);
        return redirect()->to('/admin');
    }

    public function delete($id = null)
    {
        $this->internModel->delete($id);
        return redirect()->to('/admin');
    }

    public function export()
    {
        $interns = $this->internModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Name');
        $sheet->setCellValue('B1', 'Country of Residence');
        $sheet->setCellValue('C1', 'Current Education');
        $sheet->setCellValue('D1', 'Education Status');

        $column = 2;
        foreach($interns as $item ){
            $sheet->setCellValue('A'.$column, $item['name']);
            $sheet->setCellValue('B'.$column, $item['cof']);
            $sheet->setCellValue('C'.$column, $item['current_edu']);
            $sheet->setCellValue('D'.$column, $item['edu_status']);
            $column++;
        }

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition : attachment;filename=gao-interns-list.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}
