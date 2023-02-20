<h2>{{__('menu.Category')}}</h2>
<a class="btn btn-success" href="{{ route('categories.create') }}">{{__('fa.Create')}}</a>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table border="1">
    <thead>
    <tr>
        <th>#</th>
        <th>{{__('fa.Title')}}</th>
        <th>{{__('fa.Comment')}}</th>
        <th>{{__('fa.isActive')}}</th>
        <th>{{__('fa.hasPrivate')}}</th>
        <th>{{__('fa.Actions')}}</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->comment }}</td>
            <td>{{ $category->is_active }}</td>
            <td>{{ $category->has_private }}</td>
            <td>
                <form action="{{ route('categories.destroy',$category->id) }}" method="Post">
                    <a class="btn btn-primary" href="{{ route('categories.create').'/'.$category->id }}">{{__('fa.Edit')}}</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{__('fa.Delete')}}</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
