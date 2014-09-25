    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="{{ $nav=='home'?'active':'' }}"><a href="/"><span class="glyphicon glyphicon-home"></span> {{ Lang::get('my.home') }}</a></li>
            <li class="{{ $nav=='user'?'active':'' }}"><a href="/user">{{ Lang::get('my.user') }}</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Lang::get('my.language') }} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/language?l=en">{{ Lang::get('my.english') }}</a></li>
                <li><a href="/language?l=se">{{ Lang::get('my.swedish') }}</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
