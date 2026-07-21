@extends('layouts.admin')

@section('title', 'تعديل حقيبة تدريبية')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-3xl">
    <form action="{{ route('admin.training-bags.update', $bag) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.training-bags._form')
    </form>
</div>
@endsection
