<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthController extends Controller {

	use AuthenticatesAndRegistersUsers;

	/**
	 * Redirect path
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * @param Guard $auth
	 * @param Registrar $registrar
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Override to disable registration
	 */
	public function getRegister()
	{
		throw new NotFoundHttpException;
	}

	/**
	 * Override to disable registration
	 */
	public function postRegister()
	{
		throw new NotFoundHttpException;
	}

}
