@extends('layouts.admin')

@section('title', 'تعديل حساب بنكي')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-3xl">
    <form action="{{ route('admin.bank-accounts.update', $account) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @include('admin.bank-accounts._form')
    </form>
</div>
@endsection
