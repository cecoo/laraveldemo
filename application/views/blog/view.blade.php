@layout('templates.main')
@section('title'){{ $blog->title }} - 农网 - 分享村里村外的哪些事儿@endsection
@section('description'){{ $blog->title }} - 农网 - 分享村里村外的哪些事儿@endsection
@section('keywords'){{ $blog->title }}@endsection

@section('content')
	<div class="bloslist">
		<h1>{{ $blog->title }}</h1>
		<span>作者：{{ $blog->author->username }} 发表时间：{{ $blog->created_at }} 阅读次数：{{ $blog->views }}</span>
		<p>{{ $blog->body }}</p>
		<p>{{ HTML::link('blog/all', '返回博客首页') }}</p>
	</div>
@endsection

