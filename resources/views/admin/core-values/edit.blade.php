@extends('layouts.admin')

@section('title', 'تعديل قيمة')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-3xl">
    <form action="{{ route('admin.core-values.update', $value) }}" method="POST">
        @method('PUT')
        @include('admin.core-values._form')
    </form>
</div>
@endsection
