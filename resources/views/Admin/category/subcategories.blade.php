@foreach ($subcategories as $sub)
    <option value="{{ $sub->id }}">{{ $parent}} -> {{ $sub->title }}</option>

    @if (count($sub->childs) > 0)
        @php
            $parents = $parent . '->' . $sub->title;
        @endphp
        @include('Admin.category.subcategories', ['subcategories' => $sub->childs, 'parent' => $parents])
    @endif
@endforeach