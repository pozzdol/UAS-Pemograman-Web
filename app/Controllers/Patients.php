<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PatientModel;

class Patients extends Controller
{
    public function all()
    {
        $patientModel = new PatientModel();
        $data['patients'] = $patientModel->findAll();

        return view('all_patients', $data);
    }

    public function add()
    {
        return view('add_patient');
    }

    public function addProcess()
    {
        $patientModel = new PatientModel();

        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'nik' => $this->request->getPost('nik'),
            'disease' => $this->request->getPost('disease')
        ];

        $patientModel->insert($data);

        return redirect()->to('/all-patients')->with('success', 'Patient added successfully');
    }

    public function edit($id)
    {
        $patientModel = new PatientModel();
        $data['patient'] = $patientModel->find($id);

        return view('edit_patient', $data);
    }

    public function update($id)
    {
        $patientModel = new PatientModel();

        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'nik' => $this->request->getPost('nik'),
            'disease' => $this->request->getPost('disease')
        ];

        $patientModel->update($id, $data);

        return redirect()->to('/all-patients')->with('success', 'Patient updated successfully');
    }

    public function delete($id)
    {
        $patientModel = new PatientModel();
        $patientModel->delete($id);

        return redirect()->to('/all-patients')->with('success', 'Patient deleted successfully');
    }
}
