@extends('layouts.admin')

@section('title', 'إضافة مرحلة')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-3xl">
    <form action="{{ route('admin.roadmap-items.store') }}" method="POST">
        @include('admin.roadmap-items._form')
    </form>
</div>
@endsection
