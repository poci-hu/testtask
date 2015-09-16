{{-- Uses the following:
 - $categories: The categories to list
 - $selected_category: The current category selected, if any
--}}
<div class="list-group">
    <a href="/" class="list-group-item{!! (isset($selected_category) && $selected_category === false ? ' active' : '' ) !!}">
        @if(\App\Models\Video::count())
        <span class="badge">{!! \App\Models\Video::count() !!}</span>
        @endif
        Minden videó
    </a>
    @forelse($categories as $category)
        <a href="/category/{!! $category->getKey() !!}" class="list-group-item{!! (!empty($selected_category) && $selected_category->getKey() == $category->getKey() ? ' active' : '' ) !!}">
            @if($category->count)
            <span class="badge">{!! $category->count !!}</span>
            @endif
            {!! $category->name !!}
        </a>
    @empty
    <p class="list-group-item">Nincsenek kategóriák</p>
    @endforelse
</div>
