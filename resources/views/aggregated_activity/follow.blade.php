<div class="aggregation media">
    <div class="media-body">
        <div class="media-heading">
            <div class="aggregation-header">
                <div class="aggregation-time pull-right">
                    <i class="glyphicon glyphicon-time"></i> {{{ $activity['updated_at']->diffForHumans() }}} ago
                </div>
            </div>
        </div>
        @foreach ($activity['activities'] as $_activity)
            @include('stream-laravel::render_activity', array('activity'=>$_activity))
        @endforeach
    </div>
</div>