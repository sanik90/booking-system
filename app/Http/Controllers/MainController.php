<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class MainController extends Controller
{
    public function __construct()
    {

    }

    public function getLogin()
    {
        return view('admin/login');
    }

    public function postLogin(Request $request)
    {
        return redirest('dashboard');
    }

    public function newBooking()
    {
        return view('bookings/new');
    }

    public function createBooking(Request $request)
    {
        return redirect('home');
    }
}
