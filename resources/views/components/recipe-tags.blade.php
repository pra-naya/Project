@props(['tags'])

{{-- @php
    $tags = explode(',', $tagsCsv);
@endphp --}}

Tagged with: {{ implode(', ', $tags->pluck('name')->toArray()) }}

{{-- <ul>
    @foreach ($tags as $tag)
        <li>
            <a href="/?tag={{$tag->name}}">{{$tag->name}}</a>
        </li>
    @endforeach
</ul> --}}