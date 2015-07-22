<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LoginController extends Controller {

	public function index()
    {
        return view('auth.login');
    }

    public function admin()
    {
        return view('admin');
    }
}
