<!-- Modal -->
<div class="modal fade" id="addIncomeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            {{--// This is main content area--}}
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="mb-4">Add Income</h5>
                                <form id="save-income">
{{--                                    @csrf--}}
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-3 col-form-label">Income Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" value="" id="incomeName" placeholder="Enter Asset Name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="description" rows="3" id="incomeDescription" placeholder="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="quantity" class="col-sm-3 col-form-label">Receive By</label>
                                        <div class="col-sm-9">
                                            <select class="form-select"  id="incomeType" name="type" value="" aria-label="Default select example">
                                                <option selected>cash</option>
                                                <option value="2">bank</option>
                                                <option value="account_receivable">account_receivable</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="price" class="col-sm-3 col-form-label">Income amount</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="incomePrice" name="amount" value="" placeholder="Product price">
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- // End of main area--}}
            </div>

            <div class="modal-footer">
                <button type="button" id="income-modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="income-modal-save" class="btn btn-primary">Create</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="accountReceivableModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Account Receivable Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control mb-2" placeholder="Customer Name">
                <input type="number" class="form-control" placeholder="Due Amount">
            </div>
        </div>
    </div>
</div>

<script>

      document.getElementById("income-modal-save").addEventListener('click', async function () {

        let incomeName = document.getElementById('incomeName').value;
        let incomeDescription = document.getElementById('incomeDescription').value;
        let incomeType = document.getElementById('incomeType').value;
        let incomePrice = document.getElementById('incomePrice').value;

        if (incomeName.length === 0){
            errorToast("Income Name Required !");
        }
        else if(incomeDescription.length === 0) {
            errorToast("Description is required !");
        }
        else if (incomeType.length === 0){
            errorToast("Select Income type");
        }
        else if (incomePrice.length === 0 ){
            errorToast("Enter Income price !");
        }
        else {

            let formData = {
                name: incomeName,
                description: incomeDescription,
                type: incomeType,
                amount: incomePrice
            }

            try {
                let res = await axios.post("/income-create", formData);

                if (res.status === 201){
                    successToast('Income Added Successfully');

                    document.getElementById("save-income").reset();
                    document.getElementById('income-modal-close').click();

                    await getIncomeList();
                }
            } catch (error) {
                errorToast("Income isn't added");
            }
        }
    });

      document.getElementById('incomeType').addEventListener('change', function () {

          if (this.value === 'account_receivable') {
              var firstModal = bootstrap.Modal.getInstance(
                  document.getElementById('addIncomeModal')
              );

              firstModal.hide();

              var receivableModal = new bootstrap.Modal(
                  document.getElementById('accountReceivableModal')
              );

              receivableModal.show();
          }
      });

      document.getElementById('accountReceivableForm').addEventListener('submit', function(e) {

          e.preventDefault(); // prevent page reload

          // 👉 Do your AJAX / Axios request here

          // After successful submit:

          var secondModal = bootstrap.Modal.getInstance(
              document.getElementById('accountReceivableModal')
          );
          secondModal.hide();

          var firstModal = new bootstrap.Modal(
              document.getElementById('addIncomeModal')
          );
          firstModal.show();

      });
</script>
