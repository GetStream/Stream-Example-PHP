<article class="pin">
    <figure>
        <div class="pin-image-holder">
            <img class="pin-image" src="{{ URL::asset($activity['object']->item->image) }}">
        </div>
        @if ($activity['object']->message)
            <figcaption class="pin-caption">
                {{{ $activity['object']->message }}}
            </figcaption>
        @endif
    </figure>
    @include('_pin_form', array('item'=>$activity['object']->item))
    <footer class="pin-attribution">
        by <a href="{{ URL::route('profile', $activity['object']->item->user->username) }}">{{{ $activity['object']->item->user->username }}}</a>@if ($activity['object']->item->created_at) {{{ $activity['object']->item->created_at->diffForHumans() }}} ago @endif
    </footer>
</article>
