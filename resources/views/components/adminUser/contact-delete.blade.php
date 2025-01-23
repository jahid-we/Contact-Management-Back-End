<div class="modal animated zoomIn" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input class="d-none" id="deleteId" />

            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn mx-2 bg-gradient-primary"
                        data-bs-dismiss="modal">Cancel</button>
                    <button onclick="itemDelete()" type="button" id="confirmDelete"
                        class="btn  bg-gradient-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async  function  itemDelete(){
        let id=$("#deleteId").val();
        $("#delete-modal-close").click();

        let formData={
            contact_id:id
        };
        let URL="/api/delete-contact";
        showLoader2();
        let res=await axios.post(URL,formData);
        hideLoader2();
        if(res.status===200 && res.data["msg"]===true){
            successToast(res.data['data']);
            await getList();
        }else{
            errorToast(res.data['data']);
        }

    }
</script>
