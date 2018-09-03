<?php
/**
 * Created by PhpStorm.
 * User: Настя
 * Date: 03.09.2018
 * Time: 12:46
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	/**
	 * Create a new controller instance.
	 * https://laravel.ru/docs/v5/authentication#%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B5%D0%BD%D0%B8%D0%B5-8
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth:api');
	}

	/**
	 * Return user.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return  response()->json(['res' => 'user']);
	}

}