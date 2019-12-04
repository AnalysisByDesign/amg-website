<div class="amg">
    <div class="panel panel-default">
        <div class="panel-body">

            <img src="{{  
                    empty($user->photo_url)
                    ? 'https://www.gravatar.com/avatar/'.md5(strtolower($user->photo_url)).'.jpg?s=200&d=identicon' 
                    : url($user->photo_url) 
                    }}"
                class="m-r-xs pull-left">

            <div class="amg-user-profile-header">
                <div class="amg-headline">
                    <a href="/users/{{ $user->id }}">{{ $user->name }}</a>
                </div>

                <div class="amg-detail">
                    <table>
                        <tr>
                            <td class="text-right">Official handicap:</td>
                            <td>{{ empty($user->official_handicap) ? 'None' : $user->official_handicap }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Last played:</td>
                            <td>{{ empty($user->last_played_at) ? 'None' : $user->last_played_at }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Rounds played:</td>
                            <td>{{ $user->num_rounds }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>  
    </div>  
</div>
