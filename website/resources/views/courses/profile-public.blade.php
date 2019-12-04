<div class="amg">
    <div class="panel panel-default">
        <div class="panel-body">

            <img src="{{  
                    empty($course->photo_url)
                    ? 'https://www.gravatar.com/avatar/'.md5(strtolower($course->photo_url)).'.jpg?s=200&d=identicon' 
                    : url($course->photo_url) 
                    }}"
                class="m-r-xs pull-left">

            <div class="amg-course-profile-header">
				<div class="amg-headline">
					<a href="/courses/{{ $course->id }}">{{ $course->name }}</a>
				</div>

				<div class="amg-detail">
					<table>
						<tr>
							<td class="text-right">Last played:</td>
							<td>{{ empty($course->last_played_at) ? 'None' : $course->last_played_at }}</td>
						</tr>
						<tr>
							<td class="text-right">Rounds played:</td>
							<td>{{ $course->num_rounds }}</td>
						</tr>
					</table>
				</div>
			</div>
        </div>  
    </div>  
</div>
