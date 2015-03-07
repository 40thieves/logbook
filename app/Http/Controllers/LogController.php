<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LogController extends Controller {

	/**
	 * @return View
	 */
	public function create()
	{
		return view('log.create');
	}

}
