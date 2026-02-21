<!-- Modal -->
<div class="modal fade" id="updateLiabilityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <form id="update-liability">
                                    {{--                                    @csrf--}}
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-3 col-form-label">Asset Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" value="" id="liabilityNameUpdate" placeholder="Enter Asset Name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="description" rows="3" id="liabilityDescriptionUpdate" placeholder="description"></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="quantity" class="col-sm-3 col-form-label">Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-select"  id="liabilityTypeUpdate" name="type" value="" aria-label="Default select example">
                                                <option selected>current</option>
                                                <option value="2">logn-term</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="price" class="col-sm-3 col-form-label">Asset price</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="liabilityPriceUpdate" name="amount" value="" placeholder="Product price">
                                        </div>

                                    </div>

                                    <input class="d-none" id="updateLiabilityID">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- // End of main area--}}
            </div>

            <div class="modal-footer">
                <button type="button" id="liability-update-modal-close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button onclick="updateLiability()" id="liability-update-modal-save" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
   async function fillUPLiabilityUpdateForm(id){
        document.getElementById('updateLiabilityID').value=id;
        let res =await axios.post("/liabilities-byID", {id:id});
       document.getElementById('liabilityNameUpdate').value=res.data['name'];
       document.getElementById('liabilityDescriptionUpdate').value=res.data['description'];
       document.getElementById('liabilityTypeUpdate').value=res.data['type'];
       document.getElementById('liabilityPriceUpdate').value=res.data['amount'];
    }


   async function updateLiability(){

       let liabilityNameUpdate = document.getElementById('liabilityNameUpdate').value;
       let liabilityDescriptionUpdate = document.getElementById('liabilityDescriptionUpdate').value;
       let liabilityTypeUpdate = document.getElementById('liabilityTypeUpdate').value;
       let liabilityPriceUpdate = document.getElementById('liabilityPriceUpdate').value;
       let updateLiabilityID = document.getElementById('updateLiabilityID').value;

       if (liabilityNameUpdate.length === 0){
           errorToast("Liability Name Required !");
       }
       else if(liabilityDescriptionUpdate.length === 0) {
           errorToast("Description is required !");
       }
       else if(liabilityTypeUpdate.length === 0) {
           errorToast("Type is required !");
       }
       else if(liabilityPriceUpdate.length === 0) {
           errorToast("Price is required !");
       }
       else {

           let formData = {
               name: liabilityNameUpdate,
               description: liabilityDescriptionUpdate,
               type: liabilityTypeUpdate,
               amount: liabilityPriceUpdate,
               id: updateLiabilityID
           }

           try {
               let res = await axios.post("/liabilities-update", formData);

               if (res.status === 200){
                   successToast('Liability Updated Successfully');

                   document.getElementById("update-liability").reset();
                   document.getElementById('liability-update-modal-close').click();

                   await getLiabilityList();
               }
           } catch (error) {
               errorToast("Liability update failed");
           }
       }
   }


</script>
