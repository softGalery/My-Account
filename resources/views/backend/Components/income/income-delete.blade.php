<!-- Modal -->
<div class="modal fade" id="deleteAssetModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Asset Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{--// This is main content area--}}
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="mb-4">Delete Asset</h5>
                                <p class="md-3">Once delete, you can't get it back!</p>
                                <input class="d-none" id="assetDeleteID">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- // End of main area--}}
            </div>

            <div class="modal-footer">
                <button type="button" id="assetDelete-modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="assetDeleteBTN()" id="assetDelete-modal-save" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>


<script>

    async function assetDeleteBTN(){
        let id = document.getElementById('assetDeleteID').value
        document.getElementById('assetDelete-modal-close').click();
        let res = await axios.post("/asset-delete", {id:id})

        if (res.data===1){
            successToast("Asset Delete Successfully");
            await getAssetsList();
        }
        else {
            errorToast("Asset isn't Deleted!")
        }

    }

</script>
