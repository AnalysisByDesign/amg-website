<div class="amg">
    <div class="panel panel-default">
        <div class="panel-body">

            <img src="{{  
                    empty($venue->photo_url)
                    ? 'https://www.gravatar.com/avatar/'.md5(strtolower($venue->photo_url)).'.jpg?s=200&d=identicon' 
                    : url($venue->photo_url) 
                    }}"
                class="m-r-xs pull-left">

            <div class="amg-venue-profile-header">
                <div class="amg-headline">
                    <a href="/venues/{{ $venue->id }}">{{ $venue->name }}</a>
                </div>

                <div class="amg-detail">
                    <table>
                        <tr>
                            <td class="text-right">Last played:</td>
                            <td>{{ empty($venue->last_played_at) ? 'None' : $venue->last_played_at }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Rounds played:</td>
                            <td>{{ $venue->num_rounds }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>  
    </div>  
</div>
