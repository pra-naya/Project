@props(['steps'])

@php
$steps = explode("\n", $steps);
@endphp

<h3>Steps:</h3>
<table class="table">
    <tbody>

        {{!($index=1)}}
        @foreach ($steps as $step)
        <tr>

            <th scope="row">{{$index++}}</th>
            <td> {{$step}}</td>

        </tr>
        @endforeach

    </tbody>
</table>