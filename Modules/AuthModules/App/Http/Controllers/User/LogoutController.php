<?php

namespace Modules\AuthModules\App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;

class LogoutController extends Controller
{


    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        // request()->session()->regenerateToken());
        // Xóa cookie đăng nhập khỏi trình duyệt
        $cookie1 = Cookie::forget("laravel_session"); // Thay 'laravel_session' bằng tên cookie của bạn
        $cookie2 = Cookie::forget('login');

        $cookie = [$cookie1, $cookie2];
        return redirect('/')->withCookies($cookie);
    }
}
