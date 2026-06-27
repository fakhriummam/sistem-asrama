<div class="navbar">
    <span style="margin-right: 20px;">Halo, <strong>{{ auth()->user()->name ?? 'Pengurus' }}</strong></span>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
