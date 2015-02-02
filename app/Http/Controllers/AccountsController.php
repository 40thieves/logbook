<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\Auth\Guard as Auth;
use Illuminate\Contracts\Foundation\Application as App;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

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
	 * @param App     $app
	 * @param Factory $view
	 * @param Auth    $auth
	 */
	public function __construct(App $app, Factory $view, Auth $auth)
	{
		$this->app = $app;
		$this->view = $view;
		$this->auth = $auth;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getLogin()
	{
		return $this->view->make('auth.login');
	}

	/**
	 * @param LoginRequest $request
	 * @return RedirectResponse
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

	public function getLogout()
	{
		$this->auth->logout();

		return $this->redirect()->to('/');
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
