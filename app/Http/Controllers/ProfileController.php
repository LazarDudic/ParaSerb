<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UpdateUserProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * Display the specified profile.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.profile.show', [
            'user' => $user
        ]);
    }


    /**
     * Show the form for editing the specified user.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(auth()->user()->id !== $user->id, 403);

        return view('admin.users.profile.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified user in storage.
     *
     * @param UpdateUserProfileRequest $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserProfileRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect(route('profile.show', $user->id))
            ->withSuccess('Profile updated');
    }

}
