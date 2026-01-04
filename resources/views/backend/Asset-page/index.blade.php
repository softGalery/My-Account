@extends('backend.layouts.app')
@section('content')
    <!--breadcrumb-->
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Tables</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Asset Table</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('asset.addPage') }}" class="btn btn-primary">Add Asset</a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Asset list</h6>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                    <table id="myTable" class="display table table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>1</td>
                            <td>iPhone 15 Pro</td>
                            <td>1,50,000</td>
                            <td>10</td>
                            <td>Apple's latest flagship smartphone.</td>
                            <td class="d-flex gap-2">
                                <a href="product-edit.html" class="btn btn-primary btn-small">edit</a>
                                <button type="submit" class="btn btn-danger btn-small">delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Samsung S23 Ultra</td>
                            <td>1,40,000</td>
                            <td>8</td>
                            <td>High-end Android phone with S-Pen.</td>
                            <td class="d-flex gap-2">
                                <a href="product-edit.html" class="btn btn-primary btn-small">edit</a>
                                <button type="submit" class="btn btn-danger btn-small">delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Xiaomi 13 Pro</td>
                            <td>90,000</td>
                            <td>15</td>
                            <td>Flagship phone with Leica camera.</td>
                            <td class="d-flex gap-2">
                                <a href="product-edit.html" class="btn btn-primary btn-small">edit</a>
                                <button type="submit" class="btn btn-danger btn-small">delete</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
