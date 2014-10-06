<article class="pin">
    <div id="wrapper">
      <div class="col-lg-12">
          <img width='45' height='45' title='' alt='' src='data:image/jpg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDScUHBAWICkiIiAoHx8mKDIsJCYxJx8nLT03MTM0MS46LCs0RDM4NzQ5OjQBCgoKBQUFDgUFDisZExkrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrKysrK//AABEIAC0ALQMBIgACEQEDEQH/xAAbAAACAgMBAAAAAAAAAAAAAAAEBQADAQYHAv/EACoQAAIBAwMCBAcBAAAAAAAAAAECAwAEEQUSMSFBIjJRYRUjYnGB0fAT/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/AOhVZDDJO+2JCx9qxBE08yRJyxxTe+kbTY4EtcAHO7Izu45oB00acjLSRqfTmq59KuYhlQJB9H6oj422B8gZ7+Kq5tZmdcRIsZ7nmgW1Kb6jaia1S7RQJNoZwO9KKBloKg3LseQnSvGtMxvSp4VRtrGjTCK8CtxINv57UdqVqt5LiNts6L5WGNw9qBHUqyeCS3fZKuGxnnNW2tjPcjdGF25xuLcUDXRj/rYMknVdxXHt/GkJGCR6VsgVNPsDg52KTk9zWt0E44prFdxXiotxI0M6eWVTjNKqlAZcx7Z7gM5lK4w7dc+EmjNMmhtllMjqgKRnB7+HrScEjg4qUBmo3xu2CqCsS8A9/vQdSpQf/9k='>
          <h2><a href="{{ URL::route('profile', $activity['object']->target->username) }}">{{ $activity['object']->target->username }}</a></h2>
          <p>and {{ $activity['object']->user->username }} are now friends</p>
      </div>
    </div>
</article>
