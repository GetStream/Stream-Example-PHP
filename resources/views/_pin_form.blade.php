@if (count($item->pinsFromMe) > 0)
    {!! Form::open(array('route' => array('pin.destroy', $item->pinsFromMe[0]->id), 'method' => 'delete', 'class' => 'pin-bottom')) !!}
        {!! Form::token() !!}
        <textarea class="form-control" name="message" placeholder="Comment..."></textarea>
        <div class="media">
            <div class="pull-left">
                <input class="btn btn-primary btn-sm btn-danger" type="submit" value="Unpin">
            </div>
            <div class="media-body">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon text-muted">in</span>
                    <input class="form-control" name="board_name" placeholder="Board name" type="text" value="My favourite things">
                </div>
            </div>
        </div>
        <input name="influencer" type="hidden" value="{{{ $item->user_id }}}">
        <input name="item" type="hidden" value="{{{ $item->id }}}">
        <input name="next" type="hidden" value="{{{ Request::url() }}}">
    {!! Form::close() !!}
@else
    {!! Form::open(array('route' => array('pin.store'), 'method' => 'post', 'class' => 'pin-bottom')) !!}
        {!! Form::token() !!}
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
        <input name="influencer" type="hidden" value="{{{ $item->user_id }}}">
        <input name="item" type="hidden" value="{{{ $item->id }}}">
        <input name="next" type="hidden" value="{{{ Request::url() }}}">
    {!! Form::close() !!}
@endif