<div class="modal fade" id="view-modal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content shadow-lg border-0 rounded">
            <div class="modal-header bg-primary text-white rounded-top">
                <h5 class="modal-title" id="viewModalLabel">View Your Contact</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row g-3">
                        <div class="col-12">
                            <p class="mb-1"><strong>Name:</strong></p>
                            <div class="card p-2 border-0 shadow-sm">
                                <span id="NameViewText">John Doe</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="mb-1"><strong>Email:</strong></p>
                            <div class="card p-2 border-0 shadow-sm">
                                <span id="EmailViewText">johndoe@example.com</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="mb-1"><strong>Phone:</strong></p>
                            <div class="card p-2 border-0 shadow-sm">
                                <span id="MobileViewText">123-456-7890</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="mb-1"><strong>Address:</strong></p>
                            <div class="card p-2 border-0 shadow-sm">
                                <span id="AddressViewText">123 Main St, Cityville</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="mb-1"><strong>About:</strong></p>
                            <div class="card p-2 border-0 shadow-sm">
                                <span id="AboutViewText">Software Developer</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <p class="mb-1"><strong>Profession:</strong></p>
                            <div class="card p-2 border-0 shadow-sm">
                                <span id="ProfessionViewText">Engineer</span>
                            </div>
                        </div>
                        <input type="hidden" id="viewId">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="view-modal-close" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    async function FillViewForm(id) {
        document.getElementById("viewId").value = id;

        const formData = {
            contact_id: id
        };
        const URL = "/api/contactById";

        showLoader2();
        try {
            const res = await axios.post(URL, formData);
            hideLoader2();

            if (res.status === 200 && res.data.msg === true) {
                const data = res.data.data;
                document.getElementById("NameViewText").textContent = data.name;
                document.getElementById("EmailViewText").textContent = data.email;
                document.getElementById("MobileViewText").textContent = data.phone;
                document.getElementById("AddressViewText").textContent = data.address;
                document.getElementById("AboutViewText").textContent = data.about;
                document.getElementById("ProfessionViewText").textContent = data.profession;
            } else {
                errorToast(res.data.data);
            }
        } catch (error) {
            hideLoader2();
            console.error(error);
            errorToast("Failed to load contact details.");
        }
    }
</script>

<style>
    .modal-content {
        border-radius: 10px;
        overflow: hidden;
    }

    .card {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 5px;
    }

    .btn {
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #6c757d;
        color: #fff;
    }
</style>
