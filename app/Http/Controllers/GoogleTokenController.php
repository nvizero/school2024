<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Facades\PragmaRX\Google2FA\Google2FA;

class GoogleTokenController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if (is_null($user->google_token)) {
            return $this->showEnableTokenForm($user);
        }
        return view('app.profile.token.disable', ['user' => $user]);
    }

    /**
     * Show Form with Key and QRCode for the User to enable it.
     *
     * @param $user
     * @return mixed
     */
    private function showEnableTokenForm($user)
    {
        $key = Google2FA::generateSecretKey(64);
        $google2fa_url = Google2FA::getQRCodeGoogleUrl(
            'Application Name',
            $user->email,
            $key
        );
        return view('app.profile.token.enable', [
            'user' => $user,
            'key' => $key,
            'QRCode' => $google2fa_url
        ]);
    }
}

