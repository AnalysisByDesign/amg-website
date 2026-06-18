<div class="{{ ( $highlight_round_id != "" 
									? $highlight_round_id == $round->round_id 
									: $loop->first ) 
								? "shadow-2xl bg-gray-300" 
								: "shadow-l bg-white" 
							}} round_summary_card hover:shadow-2xl hover:no-underline border border-gray-600 p-2 m-2 mb-3">

	<img src="{{  
				empty($round->photo_url)
				? 'https://www.gravatar.com/avatar/'.md5(strtolower($round->user_email)).'.jpg?s=200&d=identicon' 
				: url($round->photo_url) 
				}}"
			class="rounded-full float-left h-16 w-16 flex items-center justify-center m-1 mr-2">

			<div class="float-right">
				<a href="home?highlight_round={{ $round->round_id }}">
					{{ $round->theTime->format('d M \'y') }}
				</a>
			</div>

	<a href="/users/{{ $round->user_id }}">{{ $round->user_name }}</a>
			
	<div class="text-base">
		<a href="/courses/{{ $round->course_id }}">{{ $round->course_name }}</a>, 
			<a href="/venues/{{ $round->venue_id }}">{{ $round->venue_name }}</a>.
	</div>

@if($round->type == "round")

	<div class="text-s italic">
		Played {{ $highlight_round->arg1 }} holes
		in {{ $highlight_round->arg2 }} strokes 
		and scored {{ $highlight_round->arg3 }} points.
	</div>

@endif

</div>

</a>
