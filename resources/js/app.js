require('./bootstrap');

window.Echo.private(`notifications.${Id}`).notification(function(e){
    var count = Number($('#unreadNotificationsCount').text());
    count++;
    $('#unreadNotificationsCount').text(count);

    $('#notification-div').prepend(`
        <a href="${e.url}" class="dropdown-item unread">
            <span>${e.title}</span>
            <small class="float-right text-muted time">${e.time}</small>
            <p class="pl-1 pr-1">${e.body}</p>
        </a>
        <div class="dropdown-divider m-0" style="border-top: 2px solid white !important"></div>
    `);

    Command: toastr["info"](`${e.title}`);
});
