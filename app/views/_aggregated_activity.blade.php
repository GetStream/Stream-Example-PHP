<div class="aggregation media">
    <div class="media-body">
        <div class="media-heading">
            <div class="aggregation-header">
                <div class="aggregation-time pull-right">
                    <i class="glyphicon glyphicon-time"></i> {{{ $aggregated_activity['updated_at']->diffForHumans() }}} ago
                </div>
            </div>
        </div>
        @foreach ($aggregated_activity['activities'] as $activity)
            @include('_activity', array('activity'=>$activity))
        @endforeach
    </div>
</div>