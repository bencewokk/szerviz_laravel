<form action="{{ route('search') }}" method="get" class="navbar-form">
    <div class="input-group">
        <input type="text" class="form-control" id="clientName" name="clientName" placeholder="ügyfél neve" style="width: 200px;">
        @if ($errors->has('clientName'))
            <span class="text-danger">{{ $errors->first('clientName') }}</span>
        @endif

        <input type="text" class="form-control" id="clientId" name="clientId" placeholder="ügyfél okmányazonosítója" style="width: 200px;">
        @if ($errors->has('clientId'))
            <span class="text-danger">{{ $errors->first('clientId') }}</span>
        @endif

        <a href="{{ url('/clients') }}" class="btn btn-outline-secondary">otthon</a>

        <div class="input-group-append">
            <button type="submit" class="btn btn-outline-secondary">keresés</button>
        </div>
    </div>
</form>
