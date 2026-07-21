@extends('layouts.admin')

@section('title', 'تعديل عنصر أثر')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-3xl">
    <form action="{{ route('admin.impact-items.update', $item) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.impact-items._form')
    </form>
</div>
@endsection
