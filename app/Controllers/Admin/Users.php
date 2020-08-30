<?php 
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Users extends BaseController
{
	public function index()
	{
		echo "Ini class Users yang ada di folder Admin";
	}

	
	public function about($nama = '', $umur = 0)
	{
		echo "nama sana $nama umur $umur tahun";
	}

	//--------------------------------------------------------------------

}
