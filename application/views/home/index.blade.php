@layout('templates.main')
@section('title')农网 - 分享村里村外的哪些事儿@endsection
@section('description')农网 - 分享村里村外的哪些事儿@endsection
@section('keywords')农网 - 分享村里村外的哪些事儿@endsection

@section('content')
<div class="bloglist">
<span>最新博客</span>
	@foreach ($blogs as $blog)
		<div class="blog">
			<h1>{{ HTML::link('blog/view/'.$blog->id, $blog->title) }}</h1>
			<p>{{ $blog->description.' [..]' }}</p>
			<p>
			{{ $blog->author->username }} {{ $blog->created_at }}
			@if ( !Auth::guest() )
			    @if(Auth::user()->id == $blog->author->id)
			        {{ HTML::link('blog/edit/'.$blog->id, '编辑') }}
			    @endif   
			@endif  
			</p>
			<p>{{ HTML::link('blog/view/'.$blog->id, '阅读更多 &rarr;') }}</p>
		</div>
		
	@endforeach
</div>
@endsection