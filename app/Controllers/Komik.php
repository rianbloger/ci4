<?php
namespace App\Controllers;
use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
//        agar dapat di pakai di semua method
        $this->komikModel = new KomikModel();
    }
	public function index()
	{


	    //	    cara konek ke database tanpa model
//        $db = \Config\Database::connect();
//        $komik = $db->query("SELECT * FROM komik");
//        dd($komik->getResultArray());

//        bisa instansiasi disini atau di atas pake use
//        $komikModel = new \App\Models\KomikModel();
//        untuk di panggil per method
//        $komikModel = new KomikModel();
//        $komik = $this->komikModel->findAll();
        $komik = $this->komikModel->getKomik();
        $data['komik'] = $komik;
		return view('komik/index',$data);
	}

	public function detail($slug)
    {
//        $komik = $this->komikModel->where(['slug'=>$slug])->first();
//        $komik = $this->komikModel->getKomik($slug);
        $data = [
            'komik' => $this->komikModel->getKomik($slug)
        ];
        return view('komik/detail',$data);
    }


}
