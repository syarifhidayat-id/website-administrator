<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Request method view
     *
     * @return View
     */
    public function index() : View
    {
        return view('auth.register');
    }

    /**
     * Request method post
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request) : RedirectResponse
    {
        $valid = Validator::make($request->all(), [
            'no_identitas' => ['required', 'max:20', 'unique:users'],
            'name' => ['required', 'max:255'],
            'no_hp' => ['required', 'max:13'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'username' => ['required', 'max:50', 'unique:users'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            'foto' => ['required', 'mimes:jpeg,png', 'max:1000'],
        ], [
            'no_identitas.required' => 'NIK tidak boleh kosong !',
            'no_identitas.max' => 'NIK lebih dari 20 karakter !',
            'no_identitas.unique' => 'NIK sudah digunakan !',
            'name.required' => 'Nama tidak boleh kosong !',
            'name.max' => 'Nama lebih dari 255 karakter !',
            'no_hp.required' => 'Nomor hp tidak boleh kosong !',
            'no_hp.max' => 'Nomor hp lebih dari 13 karakter !',
            'tanggal_lahir.required' => 'Tanggal lahir tidak boleh kosong !',
            'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong !',
            'username.required' => 'Username tidak boleh kosong !',
            'username.max' => 'Username lebih dari 20 karakter !',
            'username.unique' => 'Username sudah digunakan !',
            'email.required' => 'Email tidak boleh kosong !',
            'email.max' => 'Email lebih dari 255 karakter !',
            'email.unique' => 'Email sudah digunakan !',
            'password.required' => 'Password tidak boleh kosong !',
            'password.min' => 'Password minimal 8 karakter !',
            'foto.required' => 'Foto tidak boleh kosong !',
            'foto.mimes' => 'Foto harus bentuk format jpeg/png !',
            'foto.max' => 'Ukuran foto maksimal 1 MB !',
        ]);

        if ($valid->fails()) {
            return redirect(route('register'))->withErrors($valid)->withInput();
        }

        if($request->hasfile('foto')) {
            $file = $request->file('foto');
            $fileori = $file->getClientOriginalName();
            $fotoName = time().' - Foto - '.$fileori;
            Storage::putFileAs('public/images', $file, $fotoName);
        }

        User::create([
            'no_identitas' => $request->no_identitas,
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto' => $fotoName ?? NULL,
        ]);

        return redirect(route('register'))->with('success', 'Registrasi berhail, silahkan login.');
    }
}
