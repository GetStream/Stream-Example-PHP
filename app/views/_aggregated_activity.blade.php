<div class="aggregation media">
    <div class="pull-left">
        <img width='45' height='45' title='' alt='' src='data:image/jpg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDScUHBAWICkiIiAoHx8mKDIsJCYxJx8nLT03MTM0MS46LCs0RDM4NzQ5OjQBCgoKBQUFDgUFDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAC0ALQMBIgACEQEDEQH/xAAbAAACAgMBAAAAAAAAAAAAAAAEBQADAQYHAv/EACoQAAIBAwMCBAcBAAAAAAAAAAECAwAEEQUSMSFBIjJRYRUjYnGB0fAT/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/AOhVZDDJO+2JCx9qxBE08yRJyxxTe+kbTY4EtcAHO7Izu45oB00acjLSRqfTmq59KuYhlQJB9H6oj422B8gZ7+Kq5tZmdcRIsZ7nmgW1Kb6jaia1S7RQJNoZwO9KKBloKg3LseQnSvGtMxvSp4VRtrGjTCK8CtxINv57UdqVqt5LiNts6L5WGNw9qBHUqyeCS3fZKuGxnnNW2tjPcjdGF25xuLcUDXRj/rYMknVdxXHt/GkJGCR6VsgVNPsDg52KTk9zWt0E44prFdxXiotxI0M6eWVTjNKqlAZcx7Z7gM5lK4w7dc+EmjNMmhtllMjqgKRnB7+HrScEjg4qUBmo3xu2CqCsS8A9/vQdSpQf/9k='>
    </div>
    <div class="media-body">
        <div class="media-heading">
            <div class="aggregation-header">
                <div class="aggregation-time pull-right">
                    <i class="glyphicon glyphicon-time"></i> {{{ $aggregated_activity['updated_at']->diffForHumans() }}} ago
                </div>
                <div class="aggregation-title">
                    <span>{{ count($aggregated_activity['activities']) }} pins </span>
                </div>
            </div>
        </div>
        @foreach ($aggregated_activity['activities'] as $activity)
            @include('_activity', array('activity'=>$activity))
        @endforeach
    </div>
</div>