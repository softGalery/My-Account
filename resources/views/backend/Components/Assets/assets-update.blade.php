<!-- Modal -->
<div class="modal fade" id="updateAssetModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Asset Update</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{--// This is main content area--}}
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="mb-4">Edit Asset</h5>
                                <form id="update-asset">
                                    {{--                                    @csrf--}}
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-3 col-form-label">Asset Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" value="" id="assetNameUpdate" placeholder="Enter Asset Name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="description" rows="3" id="assetDescriptionUpdate" placeholder="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="quantity" class="col-sm-3 col-form-label">Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-select"  id="assetTypeUpdate" name="type" value="" aria-label="Default select example">
                                                <option selected>current</option>
                                                <option value="2">fixed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="price" class="col-sm-3 col-form-label">Asset price</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="assetPriceUpdate" name="price" value="" placeholder="Product price">
                                        </div>

                                    </div>

                                    <input id="updateAssetID">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- // End of main area--}}
            </div>

            <div class="modal-footer">
                <button type="button" id="asset-update-modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="updateAsset()" id="asset-update-modal-save" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
   async function fillUPAssetUpdateForm(id){
        document.getElementById('updateAssetID').value=id;
        let res =await axios.post("/asset-list-by-id", {id:id});
       document.getElementById('assetNameUpdate').value=res.data['name'];
       document.getElementById('assetDescriptionUpdate').value=res.data['description'];
       document.getElementById('assetTypeUpdate').value=res.data['type'];
       document.getElementById('assetPriceUpdate').value=res.data['price'];
    }


    async function updateAsset(){
        let assetNameUpdate = document.getElementById('assetNameUpdate').value;
        let assetDescriptionUpdate = document.getElementById('assetDescriptionUpdate').value;
        let assetTypeUpdate = document.getElementById('assetTypeUpdate').value;
        let assetPriceUpdate = document.getElementById('assetPriceUpdate').value;
        let updateAssetID = document.getElementById('updateAssetID').value;

        if (assetNameUpdate.length === 0){
            errorToast("Asset Name Required !");
        }
        else if(assetDescriptionUpdate.length === 0) {
            errorToast("Description is required !");
        }
        else if(assetTypeUpdate.length === 0) {
            errorToast("Description is required !");
        }
        else if(assetPriceUpdate.length === 0) {
            errorToast("Description is required !");
        }

    else {
            let formData = {
                name: assetNameUpdate,
                description: assetDescriptionUpdate,
                type: assetTypeUpdate,
                price: assetPriceUpdate,
                id:updateAssetID
            }

            try {
                let res = await axios.post("/asset-update", formData);

                if (res.status === 200 && res.data===1){
                    successToast('Asset Added Successfully');

                    document.getElementById("update-asset").reset();
                    document.getElementById('asset-update-modal-close').click();

                    await getAssetsList();
                }
            } catch (error) {
                errorToast("Asset isn't added");
            }
        }
    }

</script>
