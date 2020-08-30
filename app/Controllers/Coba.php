<?php namespace App\Controllers;

class Coba extends BaseController
{
	public function index()
	{
		echo "Ini class coba";
	}

    public function test()
    {
        return view('pages/test');
	}
	
	public function about($nama = '', $umur = 0)
	{
		echo "nama sana $nama umur $umur tahun";
	}

	//--------------------------------------------------------------------

}
