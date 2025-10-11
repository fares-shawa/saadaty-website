<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name'      => ['required', 'string', 'max:255', 'unique:'.User::class],
            'birthdate' => ['required', 'date'],
            'gender'    => ['required', 'in:male,female'],
            'password'  => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name'              => $request->name,
            'birthdate'         => $request->birthdate,
            'gender'            => $request->gender,
            'learning_methods'  => json_encode($request->learning_methods),
            'child_skills'      => $request->child_skills,
            'password'          => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return redirect()->route('login')
        ->with('message', 'تم إنشاء حسابك. يُرجى انتظار موافقة فريق عمل أنا أتطور قبل تسجيل الدخول');
    }
}
