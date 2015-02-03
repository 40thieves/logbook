<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthController extends Controller {

	use AuthenticatesAndRegistersUsers;
	use ResetsPasswords;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param Guard $auth
	 * @param Registrar $registrar
	 * @param PasswordBroker $passwords
	 */
	public function __construct(Guard $auth, Registrar $registrar, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
		$this->passwords = $passwords;

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
