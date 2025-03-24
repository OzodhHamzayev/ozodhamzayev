<?php

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Http\RedirectResponse;

class ModeratorServices
{

    /**
     * @return array
     */
    public function moderators(): array
    {
        return [
            'moderators' => User::query()->where('role', '2')->paginate(10),
        ];
    }

    /**
     * @param $validated
     * @return RedirectResponse
     */
    public function moderatorStore($validated): RedirectResponse
    {
        $validated += ['role' => "2"];
        $asd = 12;  
        $validated['password'] = bcrypt($validated['password']);
        User::query()->create($validated);
        return redirect()->route('admin.moderators.index');
    }

    /**
     * @param $user
     * @param $validated
     * @return mixed
     */
    public function moderatorUpdate($user, $validated)
    {
        $user->update($validated);
        return $user;
    }

}
