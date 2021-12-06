
    @foreach ($messages as $message)
    @if(Illuminate\Support\Facades\Auth::user()->email === $message->email)
    <li  class="container">
    @else
    <li  class="container darck">
    @endif
    <div class="perenos">{{ $message->message }}</div>
    <span class="time-right">{{ $message->email }}({{$message->date}})</span>
     </li>
    @endforeach

