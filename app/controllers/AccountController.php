<?php

class AccountController extends BaseController {

    public function getLogin()
    {
        return View::make('account.login');
    }

    public function postLogin()
    {
        $validation = new Services\Validators\User();

        if ( $validation->onLogin()->fails() )
        {
            return Redirect::back()->withErrors($validation->getErrors());
        }

        $user = User::where('username', Input::get('username'))->first();

        if ( isset($user) )
        {
            if ( $user->hasCredentials(Input::get('password')) ) 
            {
                $remember = Input::get('remember') ? true : false;

                Auth::login($user, $remember);
                
                return Redirect::to('/');
            }
        }
        return Redirect::back()->with('error', 'Wrong credentials.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validation = new Services\Validators\User();

        if ( $validation->onRegister()->fails() )
        {
            return Redirect::back()->withErrors($validation->getErrors());
        }

        $attributes = [
            'username' => Input::get('username'),
            'email'    => Input::get('email'),
            'password' => Hash::make(Input::get('password')),    
        ];

        $user = new User($attributes);

        if ( $user->save() ) 
        {
            // $mailer = new Services\Mailers\UserMailer($user);
            // $mailer->accountActivation()->deliver();

            return Redirect::to('/account/create')->with('success', 'Your account has been made.');
        }
        return Redirect::back()->with('error', 'An error occurred. Please try again.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        return View::make('account.edit');
    }

    public function updatePassword()
    {
        $validation = new Services\Validators\User();

        if ( $validation->onUpdatePassword()->fails() )
        {
            return Redirect::back()->withErrors($validation->getErrors());

        }

        if ( Auth::user()->hasCredentials(Input::get('current')) ) 
        {
            Auth::user()->password = Hash::make( Input::get('new') );
            Auth::user()->save();

            return Redirect::to('/account/settings')->with('success', 'Password updated.');
        }
        return Redirect::to('/account/settings')->with('error', 'Wrong credentials.');
    }

    public function updateEmail()
    {
        $validation = new Services\Validators\User();

        if ( $validation->onUpdateEmail()->fails() )
        {
            return Redirect::back()->withErrors($validation->getErrors());

        }

        Auth::user()->email = Input::get('email');
        Auth::user()->save();

        return Redirect::to('/account/settings')->with('success', 'Email updated.');

    }

    public function logout()
    {
        Auth::logout();

        return Redirect::to('/login');
    }

}
