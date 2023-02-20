<h2>{{__('menu.Category')}}</h2>
<a class="btn btn-success" href="{{ route('categories.index') }}">{{__('fa.Back')}}</a>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (isset($category))
    <form action="{{ route('categories.update', $category->id)}}" method="post">1
    @method('PUT')
@else
    <form action="{{ route('categories.store')}}" method="post">2
    @endif
    @csrf
    <label>{{__('fa.Title')}}</label><input name="title" value="{{ old('title', $category->title ?? '') }}"><br>
    <label>{{__('fa.Comment')}}</label><input name="comment"  value="{{ old('comment', $category->comment ?? '') }}"><br>
    <label>{{__('fa.isActive')}}</label><input name="is_active"  value="{{ old('is_active', $category->is_active ?? '') }}"><br>
    <label>{{__('fa.hasPrivate')}}</label><input name="has_private"  value="{{ old('has_private', $category->has_private ?? '') }}"><br>
    <input type="submit" value="{{__('fa.Save')}}">
</form>
