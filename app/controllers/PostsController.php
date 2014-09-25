<?php

class PostsController extends \BaseController {

    /**
     * Display a listing of the resource.
     * GET /posts
     *
     * @return Response
     */
    public function index()
    {
        try {
 
            $json = array('error'=>0, 'message'=>'success', 'data'=>array());

            $posts = Post::take(10)->orderBy('id', 'desc')->get();

            // get user info, from performance consider, don't use JOIN and ORM
            $userIds = array();
            foreach ($posts as $k => $v) {
                $userIds[$v['user_id']] = $v['user_id'];
            }
            $users = User::whereIn('id', $userIds)->get();
            $tmp = array();
            foreach ($users as $v) {
                $tmp[$v['id']] = $v;
            }

            foreach ($posts as &$v) {
                $v['user_name'] = $tmp[$v['user_id']]['name'];
                $v['user_username'] = $tmp[$v['user_id']]['username'];
            }

            $json['data'] = $posts;

        } catch(\Exception $e) {

            $json['message'] = $e->getMessage();

        } finally {

            return $this->_renderJson($json);
        }
    }

    /**
     * Store a newly created resource in storage.
     * POST /posts
     *
     * @return Response
     */
    public function store()
    {
        try {

            $json = array('error'=>1, 'message'=>'post failed');

            if (!$this->data->loggedIn) {
                throw new Exception('unauthorized');
            }

            $rules = array(
                'body' => 'required|min:2|max:140',
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                throw new Exception($validation->messages());
            }

            $body = strip_tags(Input::get('body'));
            $user = Session::get('user');
            $postData = array(
                'user_id' => $user['id'],
                'body'     => $body
            );

            if (Post::create($postData)) {

                $json = array('error'=>0, 'message'=>'post success');

            }

        } catch(\Exception $e) {

            $json['message'] = $e->getMessage();

        } finally {

            return $this->_renderJson($json);
        }
    }

    /**
     * Display the specified resource.
     * GET /posts/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /posts/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

}
