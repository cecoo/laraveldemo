<!DOCTYPE HTML>
<html lang="en-GB">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="description" content="@yield('description')">
	<meta name="keywords" content="@yield('keywords')">
	{{ HTML::style('css/style.css') }}
</head>
<body>
<div class="logo">

		<h2>农网 - 分享村里村外的哪些事儿</h2>
	
 </div>
	<div class="header">
		@if ( Auth::guest() )
		    {{ HTML::link('/', '首页') }} | {{ HTML::link('blog/all', '博客') }}  {{ HTML::link('photo/all', '相册') }}  {{ HTML::link('group/all', '群组') }}  {{ HTML::link('events/all', '活动') }} | {{ HTML::link('account/login', '登录') }} | {{ HTML::link('account/register', '注册') }} |{{ HTML::image('img/login_with_douban_18.png', '豆瓣登录', array('id' => 'douban')) }}
		@else
			{{ HTML::link('/', '首页') }} | {{ HTML::link('blog/all', '博客') }}  {{ HTML::link('photo/all', '相册') }}  {{ HTML::link('group/all', '群组') }}  {{ HTML::link('events/all', '活动') }} | {{ HTML::link('account/home', '个人中心') }} | {{ HTML::link('account/setting/'.Auth::user()->id, '设置') }} | {{ HTML::link('blog/add', '发表博客') }} | 
		@if ( Auth::guest() )
			游客！您好！
		@else
			{{ Auth::user()->username }}！您好！
		@endif
		{{ HTML::link('account/logout', '退出') }}
		@endif
		<hr />
	
	</div>

	<div class="content">
		@yield('content')
	</div>
</body>
</html>