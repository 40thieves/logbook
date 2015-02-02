<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Contracts\Auth\Guard as Auth;
use Illuminate\Contracts\Auth\PasswordBroker as PasswordResetter;
use Illuminate\Contracts\Foundation\Application as App;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AccountsController extends Controller {

	/**
	 * @var App
	 */
	private $app;

	/**
	 * @var Factory
	 */
	private $view;

	/**
	 * @var Auth
	 */
	private $auth;

	/**
	 * @var PasswordResetter
	 */
	private $resetter;

	/**
	 * @var Hasher
	 */
	private $hasher;

	/**
	 * @param App              $app
	 * @param Factory          $view
	 * @param Auth             $auth
	 * @param PasswordResetter $resetter
	 * @param Hasher           $hasher
	 */
	public function __construct(App $app, Factory $view, Auth $auth, PasswordResetter $resetter, Hasher $hasher)
	{
		$this->app = $app;
		$this->view = $view;
		$this->auth = $auth;
		$this->resetter = $resetter;
		$this->hasher = $hasher;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getLogin()
	{
		return $this->view->make('auth.login');
	}

	/**
	 * @param LoginRequest $request
	 * @return Response
	 */
	public function postLogin(LoginRequest $request)
	{
		$credentials = $request->only('email', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			return $this->redirect()->intended();
		}

		return $this->redirect()
			->to('/auth/login')
			->withInput($request->only('email'))
			->withErrors([
				'email' => 'Login credentials are incorrect'
			]);
	}

	/**
	 * @return Response
	 */
	public function getLogout()
	{
		$this->auth->logout();

		return $this->redirect()->to('/');
	}

	/**
	 * @return Response
	 */
	public function getForgot()
	{
		return $this->view->make('auth.forgot');
	}

	/**
	 * @param ForgotPasswordRequest $request
	 * @return Response
	 */
	public function postForgot(ForgotPasswordRequest $request)
	{
		$response = $this->resetter->sendResetLink($request->only('email'), function($m)
		{
			$m->subject('Your Password Reset Link');
		});

		switch ($response)
		{
			case PasswordResetter::RESET_LINK_SENT:
				return $this->redirect()->back();
			case PasswordResetter::INVALID_USER:
				return $this->redirect()->back()->withErrors(['email' => 'Invalid email']);
		}
	}

	/**
	 * @param null $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token))
		{
			throw new NotFoundHttpException;
		}

		return $this->view->make('auth.reset')->with('token', $token);
	}

	public function postReset(ResetPasswordRequest $request)
	{
		$credentials = $request->only('email', 'password', 'password_confirmation', 'token');

		$response = $this->resetter->reset($credentials, function($user, $password)
		{
			$user->password = $this->hasher->make($password);
			$user->save();

			$this->auth->login($user);
		});

		switch ($response)
		{
			case PasswordResetter::PASSWORD_RESET:
				return $this->redirect()->to('/');
			default:
				return $this->redirect()->back()
					->withInput($request->only('email'))
					->withErrors(['email' => 'Invalid email']);
		}
	}

	/**
	 * @return Redirector
	 */
	protected function redirect()
	{
		$redirect = $this->app->make('redirect');
		return $redirect;
	}

}
