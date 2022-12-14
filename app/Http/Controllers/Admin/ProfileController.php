<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
Use App\Http\Requests\UserProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
Use App\Models\User;
Use App\Models\Post;


class ProfileController extends Controller
{
    public function index() {
        $user = auth()->user();
        if(!$user->profile()->count()) {
            $user->profile()->create();
        }
        return view('profile.index',compact('user'));
    }

    public function update(UserProfileRequest $request) {
        $userData = $request->get('user');
        $profileData = $request->get('profile');
        try {
            if ($userData['password']) {
                $validator = Validator::make(
                    $request->all(),
                    [
                        'user.password' => ['min:8']
                    ],
                    [
                        'min' => 'A senha devera ter pelo menos :min carateres!'
                    ]
                );
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator);
                }
                $userData['password'] = bcrypt($userData['password']);
            } else {
                unset($userData['password']);
            }
            $user = auth()->user();
            if ($request->hasfile('avatar')) {
                Storage::disk('public')->delete($user->avatar);
                $profileData['avatar'] = $request->file('avatar')->store('avatars','public');
            } else {
                unset($profileData['avatar']);
            }
            $user->update($userData);
            $user->profile()->update($profileData);
            flash('Perfil atualizado com Sucesso!')->success();
            return redirect()->route('profile.index');
        } catch (\Exception $e) {
            $message = 'Erro ao atualizar dados do usuario';
            if(env('APP_DEBUG')) {
                $message = $e->getMessage();
            }
            flash($message)->warning();
            return redirect()->back();
        }
    }
}
