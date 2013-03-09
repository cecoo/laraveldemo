@layout('templates.main')
@section('title')博客首页 - 农网 - 分享村里村外的哪些事儿@endsection
@section('description'博客首页 - 农网 - 分享村里村外的哪些事儿@endsection
@section('keywords')博客首页 - 农网 - 分享村里村外的哪些事儿@endsection

@section('content')
 
	@foreach ($blogs->results as $blog)
	    
		<div class="bloglist">
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
	{{ $blogs->links()  }}


@endsection