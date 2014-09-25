@extends('layouts.master')

@section('content')
<div class="row">

	<div class="col-lg-5">

		<div id="loginPanel" class="panel panel-default {{ $loggedIn?'dn':'' }}">
		  <div class="panel-heading">
		    <h3 class="panel-title">Login</h3>
		  </div>
		  <div class="panel-body">
			{{ Form::open(array('method'=>'POST', 'id'=>'loginForm')) }}
			  <div class="form-group">
			    <label for="username">User Name</label>
			    <input type="text" class="form-control" name="username" placeholder="Enter username" value="lily">
			  </div>
			  <div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="password" placeholder="Password" value="123456">
			  </div>
			  <button id="loginButton" type="button" class="btn btn-default">Submit</button>
			{{ Form::close() }}
		  </div>
		</div>

		<div id="postPanel" class="panel panel-default {{ $loggedIn?'':'dn' }}">
		  <div class="panel-heading">
		    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> <span id="userName">{{{ isset($_user['name'])?$_user['name']:'' }}}</span></h3>
		  </div>
		  <div class="panel-body">
			{{ Form::open(array('method'=>'POST', 'id'=>'postForm')) }}
			  <div class="form-group">
			    <textarea id="postBody" name="body" class="form-control" rows="3" placeholder="{{{ Lang::get('my.compose_new_twitter') }}}" maxlength="140"></textarea>
			  </div>
			  <button id="postButton" type="button" class="btn btn-primary">Submit</button>
			</form>
		  </div>
		</div>

	</div>
</div>

<script type="text/html" id='postTemplate'>
<% _.each(items,function(item,key,list){ %>
	  <div class="post">
		  <div>
		  	<span class="name"><span class="glyphicon glyphicon-user"></span> <%= item.user_name %></span> <span class="username">@<%= item.user_username %></span>
		  	<span class="pubtime"><%= item.created_at %><span>
		  </div>
		  <p><%= item.body %></p>
	  </div>
<% }) %>
</script>


<script type="text/javascript">
$(function(){
    var ctrl = new $app.UserController();
    ctrl.run();
});
</script>
@stop
