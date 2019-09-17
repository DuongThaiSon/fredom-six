<form class="form-group" action="/admin/login" method="POST">
        @csrf
    @if ($errors->any())
        <div class="alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="E-mail" required>
    <input class="form-control" type="password" name="password" value="" placeholder="Password" required>
    <button type="submit" class="btn">Login</button>
    
</form>