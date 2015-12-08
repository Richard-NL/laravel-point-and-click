@if(Session::has('message'))
<div class="alert alert-info">
    {{Session::get('message')}}
</div>
@endif
<a href="{{ URL::action('ItemController@create') }}">new item</a>
<ul>
    @foreach ($items as $item)
        <li>{{ $item->name }}</li>
    @endforeach

</ul>