<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = User::find(Auth::user()->id);

        return view('account.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): RedirectResponse
    {
        return redirect()->route('account.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $user = User::find(Auth::user()->id);

        return view('account.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {

        $user = User::find(Auth::user()->id);

        $user->update($request->validated());

        return redirect()->route('account.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
    }
}
