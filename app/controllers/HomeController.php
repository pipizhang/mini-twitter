<?php

class HomeController extends BaseController {

    public function home() {
        $this->data->page['title'] = "Tweets";
        $this->data->nav = 'home';
        return $this->_renderHtml('resources.home.home');
    }

    public function user() {
        $this->data->page['title'] = "User";
        $this->data->nav = 'user';
        return $this->_renderHtml('resources.home.user');
    }

    public function login() {
        try {
            $json = array('error'=>1, 'message'=>'login failed');

            $rules = array(
                'username' => array('required', 'min:3', 'regex:/^[a-zA-Z0-9\_]{3,}$/'),
                'password' => array('required', 'min:6', 'regex:/^\S{6,}$/'),
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                throw new Exception($validation->all());
            }

            // create our user data for the authentication
            $userdata = array(
                'username'     => Input::get('username'),
                'password'     => Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {

                $json = array('error'=>0, 'message'=>'login success');
                $user = User::where('username', Input::get('username'))->first()->toArray();
                Session::put('user', $user);
                $json['data'] = $user['name'];

            } else {

                throw new Exception("username and password do not match");
            }

        } catch(\Exception $e) {

            $json['message'] = $e->getMessage();

        } finally {

            return $this->_renderJson($json);
        }
    }

    public function logout() {
        Session::forget('user');
        return Redirect::to('/user');
    }

    public function language() {
        $lan = Input::get('l');
        $list = array('en','se');
        if (in_array($lan, $list)) {
            Session::set('language', $lan);
        } else {
            Session::set('language', 'en');
        }
        return Redirect::to('/');
    }

}
