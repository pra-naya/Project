@props(['steps'])

@php
$steps = explode("\n", $steps);
@endphp

<h3>Steps:</h3>
<table class="table">
    <tbody>

        <tr>
            {{!($index=1)}}
            @foreach ($steps as $step)

            <th scope="row">{{$index++}}</th>
            <td> {{$step}}</td>

            @endforeach

    </tbody>
</table>
<tr>

</tr>