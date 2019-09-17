Dashboard
<button class="btn" onclick="event.preventDefault();document.getElementById('logout').submit();">Logout</button>
<form id="logout" method="POST" action="/admin/logout">
    @csrf
</form>
