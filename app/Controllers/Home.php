<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$faker = \Faker\Factory::create();
		return view('pages/home');
	}

    public function test()
    {
        return view('pages/test');
    }

	//--------------------------------------------------------------------

}