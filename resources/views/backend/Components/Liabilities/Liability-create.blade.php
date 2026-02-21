<!-- Modal -->
<div class="modal fade" id="addLiabilityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Liability</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            {{--// This is main content area--}}
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="mb-4">Add Liability</h5>
                                <form id="save-liability">
{{--                                    @csrf--}}
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-3 col-form-label">Liability Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" value="" id="liabilityName" placeholder="Enter Asset Name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="description" class="col-sm-3 col-form-label">Liability's Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="description" rows="3" id="liabilityDescription" placeholder="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="quantity" class="col-sm-3 col-form-label">Liability's Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-select"  id="liabilityType" name="type" value="" aria-label="Default select example">
                                                <option selected>current</option>
                                                <option value="2">logn-term</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="price" class="col-sm-3 col-form-label">Liability's Amount</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="liabilityPrice" name="amount" value="" placeholder="Product price">
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
                <button type="button" id="liability-modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="liability-modal-save" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>

      document.getElementById("liability-modal-save").addEventListener('click', async function () {

        let liabilityName = document.getElementById('liabilityName').value;
        let liabilityDescription = document.getElementById('liabilityDescription').value;
        let liabilityType = document.getElementById('liabilityType').value;
        let liabilityPrice = document.getElementById('liabilityPrice').value;

        if (liabilityName.length === 0){
            errorToast("liability Name Required !");
        }
        else if(liabilityDescription.length === 0) {
            errorToast("Description is required !");
        }
        else if (liabilityType.length === 0){
            errorToast("Select liability type");
        }
        else if (liabilityPrice.length === 0 ){
            errorToast("Enter liability Amount !");
        }
        else {

            let formData = {
                name: liabilityName,
                description: liabilityDescription,
                type: liabilityType,
                amount: liabilityPrice
            }

            try {
                let res = await axios.post("/liabilities-create", formData);

                if (res.status === 201){
                    successToast('liability Added Successfully');

                    document.getElementById("save-liability").reset();
                    document.getElementById('liability-modal-close').click();

                    await getLiabilityList();
                }
            } catch (error) {
                errorToast("liability isn't added");
            }
        }
    });
</script>
