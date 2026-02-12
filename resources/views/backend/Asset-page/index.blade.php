@extends('backend.layouts.app')
@section('content')
    <!--breadcrumb-->
    @include('backend.Components.Assets.assets-list')
    @include('backend.Components.Assets.assets-create')
    @include('backend.Components.Assets.assets-delete')
    @include('backend.Components.Assets.assets-update')

@endsection
