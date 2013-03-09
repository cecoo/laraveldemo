@layout('templates.main')
@section('title')编辑用户资料 - 农网 - 分享村里村外的哪些事儿@endsection
@section('description')编辑用户资料 - 农网 - 分享村里村外的哪些事儿@endsection
@section('keywords')编辑用户资料- 农网 - 分享村里村外的哪些事儿@endsection

@section('content')
	{{ Form::open('account/setting/'.$user->id) }}

		<!-- check for login errors flash var -->
		@if (Session::has('setting_errors'))
			<span class="error">编辑个人资料失败！</span>
		@endif

		<!-- username field -->
		<p>{{ Form::label('name', '显示名称') }}</p>
		{{ $errors->first('name', '<p class="error">:message</p>') }}
		<p>{{ Form::text('name', $user->name) }}</p>
        <!-- email field -->
        
		<!-- submit button -->
		<p>{{ Form::submit('保存') }}</p>

	{{ Form::close() }}
@endsection