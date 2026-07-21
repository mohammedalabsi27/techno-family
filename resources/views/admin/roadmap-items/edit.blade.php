@extends('layouts.admin')

@section('title', 'تعديل مرحلة')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-3xl">
    <form action="{{ route('admin.roadmap-items.update', $item) }}" method="POST">
        @method('PUT')
        @include('admin.roadmap-items._form')
    </form>
</div>
@endsection
