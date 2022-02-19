<?php

namespace App\Controllers;

class Panel extends BaseController
{
    function maintenancepagesidesa()
    {
        $data['title'] = 'Maintenance';
        return view('errors/maintenancepage/sidesa', $data);
    }

    function maintenancepagesitkd()
    {
        $this->session->remove('keyword');
        $builder = $this->db->table('sitkd_user');
        $data = [
            'title' => 'Maintenance | SITKD JATENG',
            'myprofile' => 'Menu management',
            'user' => $builder->getWhere(['email' => $this->session->get('email')])->getRowArray(),
        ];

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('errors/maintenancepage/sitkd', $data);
        echo view('sitkd/templates/footer');
    }

    function maintenancepagesitkd1()
    {
        $this->session->remove('keyword');
        $builder = $this->db->table('sitkd_user');
        $data = [
            'title' => 'Maintenance | SITKD JATENG',
            'myprofile' => 'Submenu management',
            'user' => $builder->getWhere(['email' => $this->session->get('email')])->getRowArray(),
        ];

        echo view('sitkd/templates/header', $data);
        echo view('sitkd/templates/sidebar', $data);
        echo view('sitkd/templates/topbar', $data);
        echo view('errors/maintenancepage/sitkd', $data);
        echo view('sitkd/templates/footer');
    }
}
