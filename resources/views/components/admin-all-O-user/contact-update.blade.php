<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Your Contact</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Name *</label>
                                <input type="text" class="form-control" id="NameUpdate">

                                <label class="form-label mt-3">Email *</label>
                                <input type="text" class="form-control" id="EmailUpdate">

                                <label class="form-label mt-3">Phone *</label>
                                <input type="text" class="form-control" id="MobileUpdate">

                                <label class="form-label mt-3">Address *</label>
                                <input type="text" class="form-control" id="AddressUpdate">

                                <label class="form-label mt-3">About *</label>
                                <input type="text" class="form-control" id="AboutUpdate">

                                <label class="form-label mt-3">Profession *</label>
                                <input type="text" class="form-control" id="ProfessionUpdate">

                                <input type="text" class="d-none" id="updateId">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button type="button" onclick="Update()" id="update-btn"
                    class="btn bg-gradient-success">Update</button>

            </div>
        </div>
    </div>
</div>


<script>
    async function FillUpUpdateForm(id) {
        $("#updateId").val(id);

        let formData = {
            contact_id: id
        };

        let URL = "/api/contactById";

        showLoader2();
        let res = await axios.post(URL, formData);
        hideLoader2();
        if (res.status === 200 && res.data["msg"] === true) {
            $("#NameUpdate").val(res.data['data']['name']);
            $("#EmailUpdate").val(res.data['data']['email']);
            $("#MobileUpdate").val(res.data['data']['phone']);
            $("#AddressUpdate").val(res.data['data']['address']);
            $("#AboutUpdate").val(res.data['data']['about']);
            $("#ProfessionUpdate").val(res.data['data']['profession']);
        } else {
            errorToast(res.data['data']);
        }
    }


    async function Update() {

        let id = $("#updateId").val();
        let name = $("#NameUpdate").val();
        let email = $("#EmailUpdate").val();
        let phone = $("#MobileUpdate").val();
        let address = $("#AddressUpdate").val();
        let about = $("#AboutUpdate").val();
        let profession = $("#ProfessionUpdate").val();

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
                profession: profession,
                contact_id: id
            };

            let URL = "/api/update-contact";
            try {
                $("#update-modal-close").click();
                showLoader2();
                let res = await axios.post(URL, formData);
                hideLoader2();
                if (res.status === 200 && res.data["msg"] === true) {
                    successToast(res.data['data']);
                    document.getElementById("update-form").reset();
                    await getList();
                } else {
                    errorToast(res.data['data']);
                }
            } catch (error) {
                hideLoader2();
                errorToast("Something went wrong. Please try again.");
                console.error(error);
            }
        }
    }
</script>
