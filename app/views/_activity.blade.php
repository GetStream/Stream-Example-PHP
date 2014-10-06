@if ($activity['content_type'] == 'pin')
    @include('_pin_activity', array('activity'=>$activity))
@elseif ($activity['content_type'] == 'follow')
    @include('_follow_activity', array('activity'=>$activity))
@endif
