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
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
//            'sampul' => [
//                'rules' => 'uploaded[sampul]|max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
//                'errors' => [
//                    'upload ed' => 'Pilih gambar sampul terlebih dahulu',
//                    'max_size' => 'Ukuran gambar terlalu besar',
//                    'is_image' => 'Yang anda pilih bukan gambar',
//                    'mime_in' => 'Yang anda pilih bukan gambar'
//                ]
//            ]
        ])){
//            gak perlu karena datanya sudah kita kirim lewat withInput()
//            $validation = \Config\Services::validation();
//            $data['validation'] = $validation;
            // return view('komik/create',$data);
//            return redirect()->to('/komik/create')->withInput()->with('validation',$validation);
            return redirect()->to('/komik/create')->withInput();
        }
//        dd($this->request->getVar());
//        ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        if($fileSampul->getError() == 4){
            $namaSampul = 'default.jpg';
        }else{
            //        generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
//        pindahkan file ke folder img
            $fileSampul->move('img',$namaSampul );
        }
//        ambil nama file
//        $namaSampul = $fileSampul->getName();
        $slug = url_title($this->request->getVar('judul'),'-',true);
        $this->komikModel->save(
            [
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'penulis' => $this->request->getVar('penulis'),
                'penerbit' => $this->request->getVar('penerbit'),
                'sampul' => $namaSampul
            ]
            );

        session()->setFlashdata('pesan','Data berhasil di tambahkan');

        return redirect()->to('/komik');
    }

    public function delete($id)
    {
//        cari gambar berdasarkan id
        $komik = $this->komikModel->find($id);
// cek jika gambarnya deault
        if($komik['sampul'] != 'default.jpg'){
            unlink('img/'.$komik['sampul']);
        }
//        hapus gambar
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
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])){
//            $validation = \Config\Services::validation();
//            $data['validation'] = $validation;
//            return view('komik/create',$data);
//            return redirect()->to('/komik/edit/'.$this->request->getVar('slug'))->withInput()->with('validation',$validation);
            return redirect()->to('/komik/edit/'.$this->request->getVar('slug'))->withInput();
        }
        $fileSampul = $this->request->getFile('sampul');
//        cek gambar , apakah tetpa gambar lama
        if($fileSampul->getError() == 4){
            $namaSampul = $this->request->getVar('sampulLama');
        }else{
            //        generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
//        pindahkan file ke folder img
            $fileSampul->move('img',$namaSampul );
//            hapus file yang lama
            $sampulLama = $this->request->getVar('sampulLama');
            if($sampulLama != 'default.jpg'){
                unlink('img/'.$sampulLama);
            }
        }

        $slug = url_title($this->request->getVar('judul'),'-',true);
        $this->komikModel->save(
            [
                'id' => $id,
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
                'penulis' => $this->request->getVar('penulis'),
                'penerbit' => $this->request->getVar('penerbit'),
                'sampul' => $namaSampul
            ]
        );

        session()->setFlashdata('pesan','Data berhasil di ubah');
        return redirect()->to('/komik');
    }


}