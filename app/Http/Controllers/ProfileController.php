<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit($id): View
    {
        $user = User::findOrFail($id);
        $selected = old('learning_methods', $user->learning_methods ?? []);

        if (is_string($selected)) {
            $decoded = json_decode($selected, true);
            $selected = is_array($decoded) ? $decoded : [];
        }

        $options = [
            'paper' => 'مهام ورقية',
            'movement' => 'مهام حركية',
            'auditory' => 'مهام سمعية',
            'visual' => 'مهام بصرية',
            'creative' => 'مهام فكرية وإبداعية',
            'imagination' => 'خيال',
            'electronic' => 'مهام إلكترونية',
            'practical' => 'مهام عملية',
        ];
        return view('profile.edit', [
            'user' => $user,
            'selected' => $selected,
            'options' => $options,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'      => ['required', 'string', 'max:255', 'unique:'.User::class.',name,'.$user->id],
            'birthdate' => ['required', 'date'],
            'gender'    => ['required', 'in:male,female'],
            'password'  => ['nullable'],
        ]);

        // نجهز البيانات
        $data = [
            'name'             => $request->name,
            'birthdate'        => $request->birthdate,
            'gender'           => $request->gender,
            'learning_methods' => json_encode($request->learning_methods),
            'child_skills'     => $request->child_skills,
        ];

        // فقط لو المستخدم كتب باسورد جديد نضيفه
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return Redirect::route('profile.edit', $user->id)
        ->with('success', 'تم تحديث الملف الشخصي بنجاح');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
