@props(['steps'])

@php
    $steps = explode("\n", $steps);
@endphp

<h3>Steps:</h3>
<ul>
    @foreach ($steps as $step)
        <li>
            {{$step}}
        </li>
    @endforeach
</ul>