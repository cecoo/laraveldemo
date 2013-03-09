@layout('templates.main')
@section('title')群组 - 农网 - 分享村里村外的哪些事儿@endsection
@section('description')群组 - 农网 - 分享村里村外的哪些事儿@endsection
@section('keywords')群组 - 农网 - 分享村里村外的哪些事儿@endsection

@section('content')
 
	@foreach ($groups->results as $group)
	    
		<div class="grouplist">
			<h1>{{ HTML::link('group/view/'.$group->id, $group->title) }}</h1>
			<p>{{ $group->description.' [..]' }}</p>
			<p>
			{{ $group->author->username }} {{ $group->created_at }}
			@if ( !Auth::guest() )
			    @if(Auth::user()->id == $group->author->id)
			        {{ HTML::link('group/edit/'.$group->id, '编辑') }}
			    @endif   
			@endif  
			</p>
			<p>{{ HTML::link('group/view/'.$group->id, '阅读更多 &rarr;') }}</p>
		</div>
		
    @endforeach
	{{ $groups->links()  }}


@endsection