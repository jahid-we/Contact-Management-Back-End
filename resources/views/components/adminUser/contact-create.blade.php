<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Name *</label>
                                <input type="text" class="form-control" id="contactName">
                                <label class="form-label">Email *</label>
                                <input type="text" class="form-control" id="contactEmail">
                                <label class="form-label">Phone *</label>
                                <input type="text" class="form-control" id="contactPhone">
                                <label class="form-label">Address *</label>
                                <input type="text" class="form-control" id="contactAddress">
                                <label class="form-label">About *</label>
                                <input type="text" class="form-control" id="contactAbout">
                                <label class="form-label">Profession *</label>
                                <input type="text" class="form-control" id="contactProfession">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="Save()" id="save-btn" class="btn bg-gradient-success">Save</button>
            </div>
        </div>
    </div>
</div>


<script>
    async function Save() {
        let name = $("#contactName").val();
        let email = $("#contactEmail").val();
        let phone = $("#contactPhone").val();
        let address = $("#contactAddress").val();
        let about = $("#contactAbout").val();
        let profession = $("#contactProfession").val();

        if (name.length === 0) {
            errorToast("Name Required");
        } else if (email.length === 0) {
            errorToast("Email Required");
        } else if (phone.length === 0) {
            errorToast("Mobile Number Required");
        } else if (address.length === 0) {
            errorToast("Address Required");
        } else if (about.length === 0) {
            errorToast("About Required");
        } else if (profession.length === 0) {
            errorToast("Profession Required");
        } else {
            let formData = {
                name: name,
                email: email,
                phone: phone,
                address: address,
                about: about,
                profession: profession
            };

            let URL = "/api/create-contact";
            try {
                showLoader2();
                let res = await axios.post(URL, formData);
                hideLoader2();

                if (res.status === 200 && res.data['msg'] === true) {
                    successToast(res.data['data']);
                    $("#save-form")[0].reset(); // Fix for resetting the form
                    $("#create-modal").modal('hide');
                    await getList();
                } else {
                    errorToast(res.data['data']);
                }
            } catch (error) {
                hideLoader2();
                errorToast("Email or Phone already exists, Please try again.");
                console.error(error); // Optional: Log the error for debugging
            }
        }
    }
</script>
