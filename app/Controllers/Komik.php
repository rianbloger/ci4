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
        if(empty($data['komik'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Judul komik ".$slug." tidak di temukan");
        }
        return view('komik/detail',$data);
    }

    public function create()
    {
        // session();
        $data = [
            'validation' => \Config\Services::validation()
        ];
       return view('komik/create',$data);
    }

    public function save()
    {
        // untuk satu satu
        // $this->request->getPost();
        // $this->request->getGet();
        // kalau satu satu
        // $data = $this->request->getVar('judul');
        // untuk semua
        // $data = $this->request->getVar();
        // validasi input
        if(!$this->validate([
//            langsung dengan banyak validation
//            'judul' => 'required|is_unique[komik.judul]'
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus di isi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            $data['validation'] = $validation;
            // return view('komik/create',$data);
            return redirect()->to('/komik/create')->withInput()->with('validation',$validation);
        }
        $slug = url_title($this->request->getVar('judul'),'-',true);
        $this->komikModel->save(
            [
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'penulis' => $this->request->getVar('penulis'),
                'penerbit' => $this->request->getVar('penerbit'),
                'sampul' => $this->request->getVar('sampul')
            ]
            );

        session()->setFlashdata('pesan','Data berhasil di tambahkan');

        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        $this->komikModel->delete($id);
        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to('/komik');
    }

    public function edit($slug)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];
        return view('komik/edit',$data);
    }

    public function update($id)
    {
//        dd($this->request->getVar());
//        cek judul
        $komiklama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if($komiklama['judul'] == $this->request->getVar('judul') ){
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[komik.judul]';
        }
        if(!$this->validate([
//            langsung dengan banyak validation
//            'judul' => 'required|is_unique[komik.judul]'
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus di isi',
                    'is_unique' => '{field} komik sudah terdaftar'
                ]
            ]
        ])){
            $validation = \Config\Services::validation();
            $data['validation'] = $validation;
            // return view('komik/create',$data);
            return redirect()->to('/komik/edit/'.$this->request->getVar('slug'))->withInput()->with('validation',$validation);
        }
        $slug = url_title($this->request->getVar('judul'),'-',true);
        $this->komikModel->save(
            [
                'id' => $id,
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'penulis' => $this->request->getVar('penulis'),
                'penerbit' => $this->request->getVar('penerbit'),
                'sampul' => $this->request->getVar('sampul')
            ]
        );

        session()->setFlashdata('pesan','Data berhasil di ubah');
        return redirect()->to('/komik');
    }


}