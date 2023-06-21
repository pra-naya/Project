@props(['ingredientsCsv'])

@php
$ingredients = explode(',', $ingredientsCsv);
@endphp

<h3>Ingredients:</h3>
<table class="table">


    <tbody>
        @foreach ($ingredients as $ingredient)
        <tr>

            <td>

                {{$ingredient}}
            </td>
        </tr>
        @endforeach

    </tbody>
</table>