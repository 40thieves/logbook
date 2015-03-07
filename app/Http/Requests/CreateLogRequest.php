<?php namespace App\Http\Requests;

use Illuminate\Contracts\Auth\Guard as Auth;

class CreateLogRequest extends Request {

	/**
	 * @var Guard
	 */
	private $auth;

	public function __construct(Auth $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return $this->auth->check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'date' => 'required|date',
			'region' => 'required',
			'description' => 'required',
			'leader' => 'boolean',
			'status' => 'in:1,2,3',
		];
	}

}
