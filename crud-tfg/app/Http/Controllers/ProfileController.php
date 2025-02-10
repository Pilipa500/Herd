<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Nuevosalumnos;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $nuevosalumno = Nuevosalumnos::find(Auth::id());
        return view('profile.edit', [
            'nuevosalumno' => $nuevosalumno,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $nuevosalumno = Nuevosalumnos::find(Auth::id());
        $nuevosalumno->fill($request->validated());

        if ($nuevosalumno->isDirty('email')) {
            $nuevosalumno->email_verified_at = null;
        }

        $nuevosalumno->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    //método para mostrar el perfil
    public function show($id)
{
    $nuevosalumno = Nuevosalumnos::find($id);
    if (!$nuevosalumno) {
        abort(404, 'Perfil no encontrado.');
    }
    return view('profile.show', [
        'nuevosalumno' => $nuevosalumno,
    ]);
}



    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $nuevosalumno = Nuevosalumnos::find(Auth::id());

        Auth::logout();

        $nuevosalumno->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('home');
    }
}
