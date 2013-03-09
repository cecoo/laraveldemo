@layout('templates.main')
@section('title')图片 - 农网 - 分享村里村外的哪些事儿@endsection
@section('description')图片 - 农网 - 分享村里村外的哪些事儿@endsection
@section('keywords')图片 - 农网 - 分享村里村外的哪些事儿@endsection

@section('content')
 
	@foreach ($photos->results as $photo)
	    
		<div class="photolist">
			<h1>{{ HTML::link('photo/view/'.$photo->id, $photo->title) }}</h1>
			<p>{{ $photo->description.' [..]' }}</p>
			<p>
			{{ $photo->author->username }} {{ $photo->created_at }}
			@if ( !Auth::guest() )
			    @if(Auth::user()->id == $photo->author->id)
			        {{ HTML::link('photo/edit/'.$photo->id, '编辑') }}
			    @endif   
			@endif  
			</p>
			<p>{{ HTML::link('photo/view/'.$photo->id, '阅读更多 &rarr;') }}</p>
		</div>
		
    @endforeach
	{{ $photos->links()  }}


@endsection