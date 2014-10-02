@if ($activity['content_type']=='pin')
    @include('_pin_activity', array('activity'=>$activity))
@endif
