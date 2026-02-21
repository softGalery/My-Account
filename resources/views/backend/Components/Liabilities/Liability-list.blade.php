<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Tables</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Liabilities Table</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLiabilityModal">Add Liability</a>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Liabilities list</h6>
<hr>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                <table id="liabilityTable" class="display table table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="liabilityTableBody">


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    getLiabilityList();

    async function getLiabilityList(){
        let res=await axios.get("/liabilities-list");

        let liabilityTable = $('#liabilityTable');
        let liabilityTableBody = $('#liabilityTableBody');

        liabilityTableBody.empty();
        res.data.forEach(function (item, index) {
            let row =`<tr>
                        <td>${index+1}</td>
                        <td>${item['name']}</td>
                        <td>${item['description']}</td>
                        <td>${item['type']}</td>
                        <td>${item['amount']}</td>
                         <td class="d-flex gap-2">
                             <button data-id="${item['id']}" class="btn editLiability btn-primary btn-small">edit</button>
                             <button data-id="${item['id']}" class="btn deleteLiability btn-danger btn-small">delete</button>
                         </td>
                      </tr>`

            liabilityTableBody.append(row);


        })

        liabilityTable.dataTable();

        $('.editLiability').on('click',async function (){
            let id = $(this).data('id');
            await fillUPLiabilityUpdateForm(id);
            $("#updateLiabilityModal").modal('show');
        })


        $('.deleteLiability').on('click', function (){
            let id = $(this).data('id');
            $("#deleteLiabilityModal").modal('show');
            $("#liabilityDeleteID").val(id);
        })
    }

</script>
