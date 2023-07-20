<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use App\Queries\UserQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
    public function create(): void
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UpdateUserRequest $request): RedirectResponse
    {
        $newUser = new CreateNewUser();
        $user = $newUser->create($request->only(['name', 'email', 'password', 'password_confirm']));
        $user->roles()->sync($request->roles);
        Password::sendResetLink($request->only(['email']));
        $request->session()->flash('succes', 'You created a new user');

        return redirect()->route('admin.user.index');
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
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): View
    {
        $user->update($request->validated());

        return view('admin.users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        $user = User::find($id);

        if ($user->delete()) {
            return response()->json([
                'data' => [
                    'id' => $id
                ],
                'status' => 'success',
            ]);
        } else {
            return response()->json([
                'data' => [
                    'id' => $id
                ],
                'status' => 'error',
                'message' => __("Couldn't Delete. Please Try Again!")
            ]);
        }
    }
}
