@extends('layouts.admin')

@section('title', 'إضافة تصنيف')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-2xl">
    <form action="{{ route('admin.training-bag-categories.store') }}" method="POST">
        @include('admin.training-bag-categories._form')
    </form>
</div>
@endsection
