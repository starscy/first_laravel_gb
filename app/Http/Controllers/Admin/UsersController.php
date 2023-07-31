<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Queries\UserQueryBuilder;
use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class UsersController extends Controller
{
    public function __construct(
        protected UserQueryBuilder $userQueryBuilder
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $users = $this->userQueryBuilder->getAll();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $roles = Role::all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $newUser = new CreateNewUser();
        $user = $newUser->create($request->only(['name', 'email', 'password', 'password_confirmation']));
        $user->roles()->sync($request->roles);

        Password::sendResetLink($request->only(['email']));

        $request->session()->flash('success', 'You created a new user');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): View
    {
        $user->update($request->validated());
        $user->roles()->sync($request->roles);

        $request->session()->flash('success', 'User updated');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, Request $request): RedirectResponse
    {
        User::destroy($id);

        $request->session()->flash('success', 'User deleted');

        return redirect(route('admin.users.index'));

    }
}
