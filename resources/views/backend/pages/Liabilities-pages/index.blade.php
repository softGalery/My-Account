{{--// This is Liabilities index page--}}
@extends('backend.layouts.app')
@section('content')
    <!--breadcrumb-->
    @include('backend.Components.Liabilities.Liability-list')
    @include('backend.Components.Liabilities.Liability-create')
    @include('backend.Components.Liabilities.Liability-delete')
    @include('backend.Components.Liabilities.Liability-update')

@endsection
