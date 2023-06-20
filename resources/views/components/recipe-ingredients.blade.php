@props(['ingredientsCsv'])

@php
$ingredients = explode(',', $ingredientsCsv);
@endphp

<h3>Ingredients:</h3>
<table class="table">


    <tbody>
        @foreach ($ingredients as $ingredient)
        <td>

            {{$ingredient}}
        </td>
        @endforeach
        </ul>
    </tbody>
</table>