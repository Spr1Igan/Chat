<style>
/* Chat containers */
.container {
    border: 2px solid #dedede;
    background-color: #4e5e6d;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
    color: #ffffff;
    max-width: max-content;
    margin-left: auto; 
    margin-right: 0;
}

.darck{
    background-color: #212a33;
    margin-left: 0; 
    margin-right: auto;
}
/* Darker chat container */
.darker {
    border-color: #ccc;
    background-color: #ddd;
}

/* Clear floats */
.container::after {
    content: "";
    clear: both;
    display: table;
}

/* Style images */
.container img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

/* Style the right image */
.container img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
}

/* Style time text */
.time-right {
    float: right;
    color: #000000;
}

/* Style time text */
.time-left {
    float: left;
    color: #999;
}

.perenos {
margin:20px auto;
padding:10px;
width:170px;
word-break:break-all;
}

</style>



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

