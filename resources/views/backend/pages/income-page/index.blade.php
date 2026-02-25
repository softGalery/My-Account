{{--This is Asset index page--}}

@extends('backend.layouts.app')
@section('content')
    <!--breadcrumb-->
    @include('backend.Components.income.income-list')
    @include('backend.Components.income.income-create')
    @include('backend.Components.income.income-delete')
    @include('backend.Components.income.income-update')

@endsection
