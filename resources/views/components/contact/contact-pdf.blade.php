<div class="modal animated zoomIn" id="pdf-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">PDF !</h3>
                <p class="mb-3">Do you want to download PDF. Click confirm to download</p>
                <input class="d-none" id="contactId" />

            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="pdf-modal-close" class="btn mx-2 bg-gradient-primary"
                        data-bs-dismiss="modal">Cancel</button>
                    <button onclick="pdfDownload()" type="button" id="confirmDelete"
                        class="btn  bg-gradient-danger">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   async  function  pdfDownload(){
        $("#pdf-modal-close").click();

        let id=$("#contactId").val();

        window.open('/api/getPdfContactById/'+id);

   }
</script>
