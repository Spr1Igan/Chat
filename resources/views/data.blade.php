
<ul>
    @foreach ($massages as $massage)
    <li>{{ $massage->email }}: {{ $massage->massage }} </li>
    @endforeach
</ul>