@extends('layouts.admin')

@section('title', 'إضافة حساب بنكي')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-3xl">
    <form action="{{ route('admin.bank-accounts.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.bank-accounts._form')
    </form>
</div>
@endsection
