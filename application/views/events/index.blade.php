@layout('templates.main')
@section('title')活动 - 农网 - 分享村里村外的哪些事儿@endsection
@section('description')活动 - 农网 - 分享村里村外的哪些事儿@endsection
@section('keywords')活动 - 农网 - 分享村里村外的哪些事儿@endsection

@section('content')
 
	@foreach ($events->results as $event)
	    
		<div class="eventlist">
			<h1>{{ HTML::link('event/view/'.$event->id, $event->title) }}</h1>
			<p>{{ $event->description.' [..]' }}</p>
			<p>
			{{ $event->author->username }} {{ $event->created_at }}
			@if ( !Auth::guest() )
			    @if(Auth::user()->id == $event->author->id)
			        {{ HTML::link('event/edit/'.$event->id, '编辑') }}
			    @endif   
			@endif  
			</p>
			<p>{{ HTML::link('event/view/'.$event->id, '阅读更多 &rarr;') }}</p>
		</div>
		
    @endforeach
	{{ $events->links()  }}


@endsection