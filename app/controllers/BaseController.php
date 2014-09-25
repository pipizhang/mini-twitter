<?php

class BaseController extends Controller {

    public $data;

    public function __construct() {
        $this->_init();
    }

    /**
     * Controller initializaion
     * @return void
     */
    public function _init() {
        // localization
        \App::setLocale('en');
        $lan = Session::get('language');
        if (!empty($lan)) {
            App::setLocale($lan);
        }

        // init view
        $this->data = new \stdClass;
        $this->data->page = array(
            'charset' => 'utf-8',
            'title' => 'Page Title',
            'siteName' => 'App'
        );

        $user = Session::get('user');
        if ($user && $user['id']>0) { 
            $this->data->loggedIn = true;
            $this->data->_user = $user;
        } else {
            $this->data->loggedIn = false;
            $this->data->_user = array();
        }
    }

    public function _renderHtml($tpl, $layout=null) {
        !is_null($layout) && $this->layout = $layout;
        return View::make($tpl, (array)$this->data);
    }

    public function _renderJson($json, $httpCode=200) {
        //@header("Content-type: application/json");
        return Response::json($json, $httpCode);
    }


}
