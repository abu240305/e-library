<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
class AuthController extends Controller
{
    public function index(){
        $user = Auth::user(); 
        if($user){
            if($user->role =='admin'){
                return redirect()->intended('admin/dashboard');
            }
            else if($user->role =='user'){
                return redirect()->intended('home');
            }
        }
        return view('from.login');
    }

    public function prosesLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
    
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect('/')->withInput()->withErrors(['email' => 'Email tidak terdaftar']);
        }
    
        // Lanjutkan dengan autentikasi jika user ada
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->role == 'admin') {
                return redirect()->intended('admin/dashboard');
            } elseif ($user->role == 'user') {
                return redirect()->intended('home');
            }
    
            Auth::logout();
            return redirect('/');
        }
    
        // Jika autentikasi gagal, password salah
        return redirect('/')->withInput()->withErrors(['password' => 'Password salah']);
    }
    



    public function register(){
        return view('from.register');
    }

    public function prosesRegister(Request $request){ 
                $validator =  Validator::make($request->all(),[
                    'nama' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'jenis_kelamin' => 'required',
                    'tanggal_lahir' => 'required|date',
                    'alamat' => 'required',
                    'asal' => 'required',
                    'no_hp' => 'required|numeric|digits_between:10,13',
                    'password' => 'required|min:4|confirmed',

                ]);
                
                if($validator ->fails()){
                    return redirect('/register')
                    ->withErrors($validator)
                    ->withInput();
                }

                $request['role']='user';
                $request['password'] = bcrypt($request->password);
        

                User::create($request->all());


        
                return redirect()->route('login')
                ->with('success','Akun berhasil dibuat, silahkan login');

    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }
}