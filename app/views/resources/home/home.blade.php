@extends('layouts.master')

@section('content')
<div class="row">
	<div id="postList" class="col-lg-10">
	  <div class="post">
	  </div>
	</div>

	<div class="col-lg-2">
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
    var ctrl = new $app.HomeController();
    ctrl.run();
});
</script>
@stop
