@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('categories.store') }}" method="Post">
                @csrf
                <button type="submit" class="btn btn-danger">{{__('fa.Save')}}</button>
            </form>
        </div>
    </div>
@endsection
