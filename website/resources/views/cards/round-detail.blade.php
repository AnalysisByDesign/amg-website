<a href="home?highlight_round={{ $highlight_round->round_id }}"
	class="round-detail-card">

<div class="{{ ( $highlight_round->round_id != "" 
									? $highlight_round->round_id == $highlight_round->round_id 
									: $loop->first ) 
								? "shadow-2xl bg-gray-300" 
								: "shadow-l bg-white" 
							}} round_summary_card hover:shadow-2xl border border-gray-600 p-2 m-2 mb-3">

	<img src="{{  
				empty($highlight_round->photo_url)
				? 'https://www.gravatar.com/avatar/'.md5(strtolower($highlight_round->user_email)).'.jpg?s=200&d=identicon' 
				: url($highlight_round->photo_url) 
				}}"
			class="rounded-full float-left h-16 w-16 flex items-center justify-center m-1 mr-2">

			<div class="float-right">
					{{ $highlight_round->theTime->format('d M \'y') }}
			</div>

	{{ $highlight_round->user_name }}
			
	<div class="text-base">
		{{ $highlight_round->course_name }}, {{ $highlight_round->venue_name }}.
	</div>

@if($highlight_round->type == "round")

	<div class="text-s italic">
		Played {{ $highlight_round->arg1 }} holes
		in {{ $highlight_round->arg2 }} strokes 
		and scored {{ $highlight_round->arg3 }} points.
	</div>

@endif

</div>

</a>
