<form class="pin-bottom" method="POST" action="{{ URL::route('pin.store') }}">
    {{ Form::token() }}
    <textarea class="form-control" name="message" placeholder="Comment..."></textarea>
    <div class="media">
        <div class="pull-left">
            <input class="btn btn-primary btn-sm" type="submit" value="Pin">
        </div>
        <div class="media-body">
            <div class="input-group input-group-sm">
                <span class="input-group-addon text-muted">in</span>
                <input class="form-control" name="board_name" placeholder="Board name" type="text" value="My favourite things">
            </div>
        </div>
    </div>
    <input name="influencer" type="hidden" value="{{{ $pin->item->user_id }}}">
    <input name="item" type="hidden" value="{{{ $pin->item->id }}}">
    <input name="next" type="hidden" value="{{{ Request::url() }}}">
</form>