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
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAssetModal">Add Asset</a>
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
                <table id="assetTable" class="display table table-striped">
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
                    <tbody id="assetTableBody">


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    getAssetsList();

    async function getAssetsList(){
        let res=await axios.get("/asset-list");

        let assetTable = $('#assetTable');
        let assetTableBody = $('#assetTableBody');


        res.data.forEach(function (item, index) {
            let row =`<tr>
                        <td>${index+1}</td>
                        <td>${item['name']}</td>
                        <td>${item['description']}</td>
                        <td>${item['type']}</td>
                        <td>${item['price']}</td>
                         <td class="d-flex gap-2">
                             <a href="product-edit.html" class="btn btn-primary btn-small">edit</a>
                             <button type="submit" class="btn btn-danger btn-small">delete</button>
                         </td>
                      </tr>`

            assetTableBody.append(row);

        })

        assetTable.dataTable();
    }

</script>
