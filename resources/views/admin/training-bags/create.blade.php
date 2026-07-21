@extends('layouts.admin')

@section('title', 'إضافة حقيبة تدريبية')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-3xl">
    <form action="{{ route('admin.training-bags.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.training-bags._form')
    </form>
</div>
@endsection
