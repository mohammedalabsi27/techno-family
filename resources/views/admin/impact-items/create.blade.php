@extends('layouts.admin')

@section('title', 'إضافة عنصر أثر')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-3xl">
    <form action="{{ route('admin.impact-items.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.impact-items._form')
    </form>
</div>
@endsection
