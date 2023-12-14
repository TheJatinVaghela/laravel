<h1>our post page .  = {{$postPage}}</h1>
{!!$script!!}
<h2>empty = {{!empty($empty) ? $empty : 'NO CITY'}}</h2> <!-- this says if $empty is not empty use $empty else
                                                             use NO CITY -->
<ul>

    <li></li>
</ul>
<a href="{{route("postPage")}}">anotherPage</a>
