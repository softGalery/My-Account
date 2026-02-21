<!-- Modal -->
<div class="modal fade" id="deleteLiabilityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <input class="" id="liabilityDeleteID">
                            </div>
                        </div>
                    </div>
                </div>
                {{-- // End of main area--}}
            </div>

            <div class="modal-footer">
                <button type="button" id="liabilityDelete-modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="liabilityDeleteBTN()" id="assetDelete-modal-save" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>


<script>

    async function liabilityDeleteBTN(){
        let id = document.getElementById('liabilityDeleteID').value
        document.getElementById('liabilityDelete-modal-close').click();
        let res = await axios.post("/liabilities-delete", {id:id})

        if (res.data===1){
            successToast("Liability Delete Successfully");
            await getLiabilityList();
        }
        else {
            errorToast("Liability isn't Deleted!")
        }

    }

</script>
