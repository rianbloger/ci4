<?php
namespace App\Controllers;
use App\Models\OrangModel;

class Orang extends BaseController
{
    protected $orangModel;
    public function __construct()
    {
        $this->orangModel = new OrangModel();
    }

    public function index()
    {
//        $data['orang'] = $this->orangModel->findAll();
        $data = [
            'orang' => $this->orangModel->paginate(6),
            'pager' => $this->orangModel->pager
        ];
        return view('orang/index',$data);

    }

}