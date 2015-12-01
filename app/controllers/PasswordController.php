<?php

class PasswordController extends BaseController {
 
    public function remind()
    {
        return View::make('password.remind');
    }

    public function request()
    {
        $validation = new Services\Validators\User();

        if ( $validation->onPasswordRequest()->fails() )
        {
            return Redirect::back()->withErrors($validation->getErrors());
        }

          $credentials = array('email' => Input::get('email'));
     
          return Password::remind($credentials)->with('success', 'Password reminder sent.');
    }

    public function reset($token)
    {
        $created_at = DB::table('password_reminders')->where('token', $token)->pluck('created_at');
        
        $age = abs(strtotime(date("Y-m-d H:i:s")) - strtotime($created_at)); 

        if ( $age > 86400)
        {
            return Redirect::to('login')->with('error', 'Password reset link has expired.');
        }

        return View::make('password.reset')->with('token', $token);
    }

    public function update()
    {

        $validation = new Services\Validators\User();

        if ( $validation->onPasswordReset()->fails() )
        {
            return Redirect::back()->withErrors($validation->getErrors());
        }

        $email = DB::table('password_reminders')->where('token', Input::get('token'))->pluck('email');

          $credentials = array('email' => $email);
     
          return Password::reset($credentials, function($user, $password)
          {
            $user->password = Hash::make($password);
     
            $user->save();
     
            return Redirect::to('login')->with('success', 'Your password has been reset');
          });
    }
}