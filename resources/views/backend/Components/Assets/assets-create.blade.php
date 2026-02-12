<!-- Modal -->
<div class="modal fade" id="addAssetModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            {{--// This is main content area--}}
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="mb-4">Add Asset</h5>
                                <form id="save-asset">
{{--                                    @csrf--}}
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-3 col-form-label">Asset Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" value="" id="assetName" placeholder="Enter Asset Name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="description" rows="3" id="assetDescription" placeholder="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="quantity" class="col-sm-3 col-form-label">Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-select"  id="assetType" name="type" value="" aria-label="Default select example">
                                                <option selected>current</option>
                                                <option value="2">fixed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="price" class="col-sm-3 col-form-label">Asset price</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="assetPrice" name="price" value="" placeholder="Product price">
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
                <button type="button" id="asset-modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="asset-modal-save" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>

    axios.defaults.headers.common['X-CSRF-TOKEN'] =
        document.querySelector('meta[name="csrf-token"]').getAttribute('content');


    document.getElementById("asset-modal-save").addEventListener('click', async function () {

        let assetName = document.getElementById('assetName').value;
        let assetDescription = document.getElementById('assetDescription').value;
        let assetType = document.getElementById('assetType').value;
        let assetPrice = document.getElementById('assetPrice').value;

        if (assetName.length === 0){
            errorToast("Asset Name Required !");
        }
        else if(assetDescription.length === 0) {
            errorToast("Description is required !");
        }
        else if (assetType.length === 0){
            errorToast("Select asset type");
        }
        else if (assetPrice.length === 0 ){
            errorToast("Enter Asset price !");
        }
        else {

            let formData = {
                name: assetName,
                description: assetDescription,
                type: assetType,
                price: assetPrice
            }

            try {
                let res = await axios.post("/asset-add", formData);

                if (res.status === 201){
                    successToast('Asset Added Successfully');

                    document.getElementById("save-asset").reset();
                    document.getElementById('asset-modal-close').click();

                    await getAssetsList();
                }
            } catch (error) {
                errorToast("Asset isn't added");
            }
        }
    });
</script>
