<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Main\Admin;
use Facades\PragmaRX\Google2FA\Google2FA;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function index()
    {
        return view('auth.token');
    }
    public function authenticate(Request $request)
    {
        $user = Admin::findOrFail($request->session()->get('user-id'));
        $token = $request->get('token');
        if (Google2FA::verifyKey($user->google_token, $token)) {
            $request->session()->remove('user-id');

            auth()->loginUsingId($user->id);
            return redirect('/home');
        }
        return redirect('/token')->withErrors(['error' => __('Invalid Token')]);
    }
}

