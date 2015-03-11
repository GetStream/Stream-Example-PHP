<article class="pin">
    <figure>
        <div class="pin-image-holder">
            @if ($item->image)
                <img class="pin-image" src="{{ URL::asset($item->image) }}">
            @elseif ($item->item)
                <img class="pin-image" src="{{ URL::asset($item->item->image) }}">
            @endif
        </div>
        @if ($item->message)
            <figcaption class="pin-caption">
                {{{ $item->message }}}
            </figcaption>
        @endif
    </figure>
    @include('_pin_form', array('item'=>$item))
    <footer class="pin-attribution">
        by <a href="{!! URL::route('profile', $item->user->username) !!}">{{{ $item->user->username }}}</a>@if ($item->created_at) {{{ $item->created_at->diffForHumans() }}} ago @endif
    </footer>
</article>
