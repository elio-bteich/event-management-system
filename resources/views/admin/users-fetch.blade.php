@foreach($users as $user)
    <tr>
        <td width="22%">{{ $user->fname }}</td>
        <td width="22%">{{ $user->lname }}</td>
        <td width="35%">{{ $user->email }}</td>
        <td style="white-space: nowrap" width="21%">
            @if($user->hasRole('admin'))
                <form action="/admin/demote/{{$user->id}}" method="POST" onsubmit="event.preventDefault();">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="submit" name="action" class="btn btn-danger demote-btn" value="Demote">
                </form>
            @else
                <form action="/admin/promote/{{$user->id}}" method="POST" onsubmit="event.preventDefault();">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <input type="submit" name="action" class="btn btn-primary promote-btn" value="Promote">
                </form>
            @endif
        </td>
    </tr>
@endforeach

<script>
    $(document).on('click', '.promote-btn', function (e){
        $.ajax({
            url: $(e.target).parent('form').attr('action'),
            type: 'GET',
            success: function (data) {
                let user_id = $($(e.target).parent('form').children('input[name="user_id"]')).val()
                updatePromoteBtn(e.target, user_id)
            }
        })
    })

    $(document).on('click', '.demote-btn', function (e){
        $.ajax({
            url: $(e.target).parent('form').attr('action'),
            type: 'GET',
            success: function (data) {
                let user_id = $($(e.target).parent('form').children('input[name="user_id"]')).val()
                updatePromoteBtn(e.target, user_id)
            }
        })
    })

    function updatePromoteBtn(button, user_id) {
        if ($(button).val() === 'Promote'){
            let promote_form = $(button).parent('form')
            let form_parent = promote_form.parent()
            $(form_parent).append(`<form action="/admin/demote/`+user_id+`" method="POST" onsubmit="event.preventDefault();">
                @csrf
            <input type="hidden" name="user_id" value="`+user_id+`">
                <input type="submit" name="action" class="btn btn-danger demote-btn" value="Demote">
                </form>`)
            promote_form.remove()
        }else {
            let demote_form = $(button).parent('form')
            let form_parent = demote_form.parent()
            $(form_parent).append(`<form action="/admin/promote/`+user_id+`" method="POST" onsubmit="event.preventDefault();">
                @csrf
            <input type="hidden" name="user_id" value="`+user_id+`">
            <input type="submit" name="action" class="btn btn-primary promote-btn" value="Promote">
            </form>`)
            demote_form.remove()
        }
    }
</script>
