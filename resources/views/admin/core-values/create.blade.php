@extends('layouts.admin')

@section('title', 'إضافة قيمة')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-3xl">
    <form action="{{ route('admin.core-values.store') }}" method="POST">
        @include('admin.core-values._form')
    </form>
</div>
@endsection
