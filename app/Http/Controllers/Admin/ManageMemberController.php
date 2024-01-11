<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ManageMemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('user-access');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = auth()->user()->type;
        $member= "";

        if ($role == 'admin') {
            $member = User::orderBy('no_identitas', 'asc')->get();
        } else {
            $member = User::orderBy('no_identitas', 'asc')->where('no_identitas', auth()->user()->no_identitas)->get();
        }

        return view('admin.manage-member.index', ['member' => $member]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage-member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'no_identitas' => ['required', 'max:20', 'unique:users'],
            'name' => ['required', 'max:255'],
            'no_hp' => ['required', 'max:13'],
            'tanggal_lahir' => ['required'],
            'type' => ['required'],
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
            'type.required' => 'Level pengguna tidak boleh kosong !',
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
            return redirect(route('admin.manage-member.create'))->withErrors($valid)->withInput();
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
            'type' => $request->type,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto' => $fotoName ?? NULL,
        ]);

        return redirect(route('admin.manage-member.create'))->with('status', 'Data member berhail disimpan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.manage-member.detail', ['member' => User::findOrFail(Crypt::decrypt($id))]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.manage-member.edit', ['member' => User::findOrFail(Crypt::decrypt($id))]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $member = User::findOrFail(Crypt::decrypt($id));
        $member->no_identitas = $request->no_identitas;
        $member->name = $request->name;
        $member->username = $request->username;
        $member->email = $request->email;
        $member->no_hp = $request->no_hp;
        $member->tanggal_lahir = $request->tanggal_lahir;
        $member->jenis_kelamin = $request->jenis_kelamin;

        if($request->hasfile('foto')) {
            $file = $request->file('foto');
            $fileori = $file->getClientOriginalName();
            $fotoName = time().' - Foto - '.$fileori;

            $member->foto = $fotoName;
            Storage::putFileAs('public/images', $file, $fotoName);
        }

        $member->save();

        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin.manage-member.index')->with('status', 'Data berhasil di perbaharui...');
        } else {
            return redirect()->route('user.manage-member.index')->with('status', 'Data berhasil di perbaharui...');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
