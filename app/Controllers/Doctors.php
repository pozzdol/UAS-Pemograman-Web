<?php

namespace App\Controllers;

use App\Models\DoctorModel;
use CodeIgniter\Controller;

class Doctors extends Controller
{
    public function all()
    {
        $doctorModel = new DoctorModel();
        $data['doctors'] = $doctorModel->findAll();

        return view('all_doctors', $data);
    }

    public function add()
    {
        return view('add_doctors');
    }

    public function addProcess()
    {
        $doctorModel = new DoctorModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'specialist' => $this->request->getPost('specialist'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone')
        ];

        $doctorModel->insert($data);

        return redirect()->to('/all-doctors')->with('success', 'Doctor added successfully');
    }

    public function edit($id)
    {
        $doctorModel = new DoctorModel();
        $data['doctor'] = $doctorModel->find($id);

        return view('edit_doctor', $data);
    }

    public function update($id)
    {
        $doctorModel = new DoctorModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'specialist' => $this->request->getPost('specialist'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone')
        ];

        $doctorModel->update($id, $data);

        return redirect()->to('/all-doctors')->with('success', 'Doctor updated successfully');
    }

    public function delete($id)
    {
        $doctorModel = new DoctorModel();
        $doctorModel->delete($id);

        return redirect()->to('/all-doctors')->with('success', 'Doctor deleted successfully');
    }
}
