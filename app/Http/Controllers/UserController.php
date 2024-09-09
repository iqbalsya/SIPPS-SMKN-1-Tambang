<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Ambil role dari request jika ada
        $role = $request->input('role');
    
        // Query untuk mendapatkan data users
        $users = User::with('roles', 'siswa')
            ->when($role, function ($query, $role) {
                // Jika ada role yang dipilih, filter berdasarkan role
                return $query->whereHas('roles', function ($query) use ($role) {
                    $query->where('name', $role);
                });
            })
            ->get();
    
        return view('components.user-management.index', compact('users'));
    }
    

    public function create()
    {
        $roles = Role::all();
        $siswas = Siswa::all();
        $gurus = Guru::all(); // Menambahkan ini
        return view('components.user-management.create', compact('roles', 'siswas', 'gurus'));
    }
    

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required|exists:roles,name',
        'siswa_id' => 'nullable|exists:siswas,id',
        'guru_id' => 'nullable|exists:gurus,id', // Validasi guru_id
    ], [
        'name.required' => 'Nama wajib diisi.',
        'email.unique' => 'Email yang dimasukkan sudah terdaftar.',
        'email.required' => 'Email wajib diisi.',
        'role.required' => 'Role wajib diisi.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
        'password.confirmed' => 'Pastikan password dan konfirmasi password sama.',
        'siswa_id.exists' => 'Siswa ini sudah mempunyai akun.',
        'guru_id.exists' => 'Guru ini sudah mempunyai akun.',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => $validated['password'],
        'siswa_id' => $request->input('siswa_id'), // Menggunakan input jika ada
        'guru_id' => $request->input('guru_id'), // Menggunakan input jika ada
    ]);

    $user->assignRole($validated['role']);

    return redirect()->route('users.index')->with('success', 'User telah ditambahkan');
}


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('components.user-management.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|exists:roles,name',
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.unique' => 'Email yang dimasukkan sudah terdaftar.',
            'email.required' => 'Email wajib diisi.',
            'role.required' => 'Role wajib diisi.',
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
            'password.confirmed' => 'Pastikan password dan konfirmasi password sama.',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = $request->password;
        }

        $user->save();

        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'User telah diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User telah dihapus');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ], [
            'file.required' => 'File wajib diunggah.',
            'file.mimes' => 'Format file harus .xls atau .xlsx.',
        ]);
    
        try {
            Excel::import(new UserImport, $request->file('file'));
            return redirect()->route('users.index')->with('success', 'Import user berhasil.');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Gagal mengimpor user: ' . $e->getMessage());
        }
    }

    public function downloadTemplate()
    {
        $file = public_path('templates/Template_Input_User.xlsx');
        return response()->download($file);
    }
}
