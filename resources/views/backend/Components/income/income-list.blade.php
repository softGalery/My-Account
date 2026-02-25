<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Tables</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Income Table</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addIncomeModal">Add Income</a>
        </div>
    </div>
</div>
<!--end breadcrumb-->
<h6 class="mb-0 text-uppercase">Income list</h6>
<hr>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                <table id="incomeTable" class="display table table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Receive by</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="incomeTableBody">


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    getIncomeList();

    async function getIncomeList(){
        let res=await axios.get("/income-list");

        let incomeTable = $('#incomeTable');
        let incomeTableBody = $('#incomeTableBody');

        incomeTableBody.empty();
        res.data.forEach(function (item, index) {
            let row =`<tr>
                        <td>${index+1}</td>
                        <td>${item['name']}</td>
                        <td>${item['description']}</td>
                        <td>${item['type']}</td>
                        <td>${item['amount']}</td>
                         <td class="d-flex gap-2">
                             <button data-id="${item['id']}" class="btn editAsset btn-primary btn-small">edit</button>
                             <button data-id="${item['id']}" class="btn deleteAsset btn-danger btn-small">delete</button>
                         </td>
                      </tr>`

            incomeTableBody.append(row);


        })

        incomeTable.dataTable();

        // $('.editAsset').on('click',async function (){
        //     let id = $(this).data('id');
        //     await fillUPAssetUpdateForm(id);
        //     $("#updateAssetModal").modal('show');
        // })
        //
        //
        // $('.deleteAsset').on('click', function (){
        //     let id = $(this).data('id');
        //     $("#deleteAssetModal").modal('show');
        //     $("#assetDeleteID").val(id);
        // })
    }

</script>
