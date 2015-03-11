  <div id="wrapper">
      @if ($full)
      <div class="col-lg-4">
      @else
      <div class="col-lg-12">
      @endif
          <img width='45' height='45' title='' alt='' src='data:image/jpg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDScUHBAWICkiIiAoHx8mKDIsJCYxJx8nLT03MTM0MS46LCs0RDM4NzQ5OjQBCgoKBQUFDgUFDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAC0ALQMBIgACEQEDEQH/xAAbAAACAgMBAAAAAAAAAAAAAAAEBQADAQYHAv/EACoQAAIBAwMCBAcBAAAAAAAAAAECAwAEEQUSMSFBIjJRYRUjYnGB0fAT/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/AOhVZDDJO+2JCx9qxBE08yRJyxxTe+kbTY4EtcAHO7Izu45oB00acjLSRqfTmq59KuYhlQJB9H6oj422B8gZ7+Kq5tZmdcRIsZ7nmgW1Kb6jaia1S7RQJNoZwO9KKBloKg3LseQnSvGtMxvSp4VRtrGjTCK8CtxINv57UdqVqt5LiNts6L5WGNw9qBHUqyeCS3fZKuGxnnNW2tjPcjdGF25xuLcUDXRj/rYMknVdxXHt/GkJGCR6VsgVNPsDg52KTk9zWt0E44prFdxXiotxI0M6eWVTjNKqlAZcx7Z7gM5lK4w7dc+EmjNMmhtllMjqgKRnB7+HrScEjg4qUBmo3xu2CqCsS8A9/vQdSpQf/9k='>
          <h2><a href="{{ URL::route('profile', $profile->username) }}">{{ $profile->username }}</a></h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          @if ($follow && $follow->id)
            {!! Form::open(array('route' => array('follow.destroy', $follow->id), 'method' => 'delete')) !!}
              <input name="next" type="hidden" value="{{{ Request::url() }}}">
              <button type="submit" href="{{ URL::route('follow.destroy', $follow->id) }}" class="btn btn-danger">Unfollow</button>
            {!! Form::close() !!}
          @else
            {!! Form::open(array('route' => array('follow.store'), 'method' => 'post')) !!}
              <input name="target" type="hidden" value="{{ $profile->id }}">
              <input name="next" type="hidden" value="{{{ Request::url() }}}">
              <button type="submit" href="{{ URL::route('follow.store') }}" class="btn btn-default">Follow</button>
            {!! Form::close() !!}
          @endif
      </div>
      @if ($full)
        <div class="col-lg-8">
            <div class="container-pins profile">
                @foreach ($activities as $activity)
                    @include('stream-laravel::render_activity', array('activity'=>$activity))
                @endforeach
            </div>
        </div>
      @endif
  </div>