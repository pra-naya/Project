@props(['ingredientsCsv'])

@php
    $ingredients = explode(',', $ingredientsCsv);
@endphp

<h3>Ingredients:</h3>
<ul>
    @foreach ($ingredients as $ingredient)
        <li>
            {{$ingredient}}
        </li>
    @endforeach
</ul>