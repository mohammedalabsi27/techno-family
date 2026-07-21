@extends('layouts.admin')

@section('title', 'إضافة برنامج')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-3xl">
    <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.programs._form')
    </form>
</div>
@endsection
