@layout('templates.main')
@section('title')用户注册 - 农网 - 分享村里村外的哪些事儿@endsection
@section('description')用户注册 - 农网 - 分享村里村外的哪些事儿@endsection
@section('keywords')用户注册- 农网 - 分享村里村外的哪些事儿@endsection

@section('content')
	{{ Form::open('account/register') }}

		<!-- check for login errors flash var -->
		@if (Session::has('register_errors'))
			<span class="error">注册失败，请重新注册！</span>
		@endif

		<!-- username field -->
		<p>{{ Form::label('username', '用户名') }}</p>
		{{ $errors->first('username', '<p class="error">:message</p>') }}
		<p>{{ Form::text('username') }}</p>
        <!-- email field -->
		<p>{{ Form::label('email', '电子邮箱') }}</p>
		{{ $errors->first('email', '<p class="error">:message</p>') }}
		<p>{{ Form::email('email') }}</p>
		<!-- password field -->
		<p>{{ Form::label('password', '密码') }}</p>
		{{ $errors->first('password', '<p class="error">:message</p>') }}
		<p>{{ Form::password('password') }}</p>
        
		<!-- submit button -->
		<p>{{ Form::submit('注册') }}</p>

	{{ Form::close() }}
@endsection