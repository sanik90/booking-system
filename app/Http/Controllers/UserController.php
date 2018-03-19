<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {

    }

    public function postLogin(Request $request)
    {
        $rules = array(
          'email'    => 'required|email',
          'password' => 'required|alphaNum|min:6'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));
        } else {
            $userdata = array(
                'email'     => $request->email,
                'password'  => $request->password
              );
            if (Auth::attempt($userdata)) {
                return redirect()->route('home');
            } else {
                return Redirect::to('login');
            }
        }
    }
}
