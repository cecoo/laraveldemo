@layout('templates.main')
@section('title')登录页面 - 农网 - 分享村里村外的哪些事儿@endsection
@section('description')登录页面 - 农网 - 分享村里村外的哪些事儿@endsection
@section('keywords')登录页面 - 农网 - 分享村里村外的哪些事儿@endsection

@section('content')
	{{ Form::open('account/login') }}

		<!-- check for login errors flash var -->
		@if (Session::has('login_errors'))
			<span class="error">用户名密码错误！</span>
		@endif

		<!-- username field -->
		<p>{{ Form::label('username', '用户名') }}</p>
		<p>{{ Form::text('username') }}</p>

		<!-- password field -->
		<p>{{ Form::label('password', '密码') }}</p>
		<p>{{ Form::password('password') }}</p>

		<!-- submit button -->
		<p>{{ Form::submit('登录') }}</p>

	{{ Form::close() }}
@endsection