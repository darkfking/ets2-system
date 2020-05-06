<div class="sidenav">
    <a href="{{route('home')}}">Start</a>
    @if(Auth::user()->ranga == 'Admin')
        <a href="{{route('admin')}}">Administracja</a>
    @endif
    <a href="{{route('rozpiski.index')}}">Rozpiski</a>
    <a href="{{route('karta')}}">Karta kierowcy</a>
    <a href="{{route('cars.index')}}">Garaż</a>
    <a href="{{route('firms.index')}}">Firma</a>
    <p href="hf">Created by <font color="#00ffff">eqqiz</font></p>
</div>