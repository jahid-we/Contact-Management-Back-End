<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>User Profile</h4>
                    <hr />
                    <div class="img-div max-width-100  ">
                        <img id="imgPreview" class="img-fluid   rounded mx-2"
                            src="" alt="">
                    </div>
                    <form id="save-form">
                        <div class="container-fluid m-0 p-0">
                            <div class="row m-0 p-0">

                                <div class="col-md-4 p-2">
                                    <label>Name</label>
                                    <input id="name" placeholder="Name" class="form-control" type="text" />
                                </div>

                                <div class="col-md-4 p-2">
                                    <label>Email</label>
                                    <input id="email" placeholder="User Email" class="form-control"
                                        type="email" />
                                </div>

                                <div class="col-md-4 p-2">
                                    <label>Phone</label>
                                    <input id="phone" placeholder="User Phone" class="form-control"
                                        type="number" />
                                </div>

                                <div class="col-md-4 p-2">
                                    <label>Present Address</label>
                                    <input id="presentAddress" placeholder="Present Address" class="form-control"
                                        type="text" />
                                </div>

                                <div class="col-md-4 p-2">
                                    <label>Permanent Address</label>
                                    <input id="permanentAddress" placeholder="Permanent Address" class="form-control"
                                        type="text" />
                                </div>

                                <div class="col-md-4 p-2">
                                    <label>About</label>
                                    <input id="about" placeholder="About" class="form-control" type="text" />
                                </div>

                                <div class="col-md-4 p-2">
                                    <label>Image Link</label>
                                    <input
                                        id="image" placeholder="Image Link" class="form-control" type="text" />
                                </div>
                            </div>
                            <div class="row m-0 p-0">
                                <div class="col-md-4 p-2">
                                    <button id="createBtn" onclick="createProfile()"
                                        class="btn mt-3 w-100  bg-gradient-primary">Create</button>
                                </div>
                                <div class="col-md-4 p-2">
                                    <button onclick="updateProfile()"
                                        class="btn mt-3 w-100  bg-gradient-primary">Update</button>
                                </div>
                                <div class="col-md-4 p-2">
                                    <button onclick="deleteProfile()"
                                        class="btn mt-3 w-100  bg-gradient-primary">Delete</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

getList();

async function getList() {
    showLoader2();
    try {
        let res = await axios.get("/api/get-profile");
        hideLoader2();
        if (res.status === 200 && res.data["msg"] === true) {
            let data = res.data["data"];
            document.getElementById("name").value = data["name"];
            document.getElementById("email").value = data["email"];
            document.getElementById("phone").value = data["phone"];
            document.getElementById("presentAddress").value = data["present_address"];
            document.getElementById("permanentAddress").value = data["permanent_address"];
            document.getElementById("about").value = data["about"];
            document.getElementById("image").value = data["image"];
            document.getElementById("imgPreview").src = data["image"];
            document.getElementById("createBtn").classList.add("d-none");
        } else {
            errorToast("Data not found, Create profile first.");
            document.getElementById("createBtn").classList.remove("d-none");
        }
    } catch (error) {
        hideLoader2();
        errorToast("Something went wrong. Please try again.");
        console.error(error);
    }
}

async function createProfile() {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const presentAddress = document.getElementById("presentAddress").value;
    const permanentAddress = document.getElementById("permanentAddress").value;
    const about = document.getElementById("about").value;
    const image = document.getElementById("image").value;

    if (name.length === 0) {
        errorToast("Name Required");
    } else if (email.length === 0) {
        errorToast("Email Required");
    } else if (phone.length === 0) {
        errorToast("Phone Required");
    } else if (presentAddress.length === 0) {
        errorToast("Present Address Required");
    } else if (permanentAddress.length === 0) {
        errorToast("Permanent Address Required");
    } else if (about.length === 0) {
        errorToast("About Required");
    } else if (image.length === 0) {
        errorToast("Image Url Required");
    } else {
        showLoader2();
        try {
            let formData = {
                name: name,
                email: email,
                phone: phone,
                present_address: presentAddress,
                permanent_address: permanentAddress,
                about: about,
                image: image,
            };
            let URL = "/api/create-profile";
            let res = await axios.post(URL, formData);
            hideLoader2();
            if (res.status === 200 && res.data["msg"] === true) {
                successToast(res.data["data"]);
                setTimeout(() => {
                    getList();
                }, 1000);
            } else {
                errorToast(res.data["data"]);
            }
        } catch (error) {
            hideLoader2();
            errorToast("Something went wrong. Please try again.");
            console.error(error);
        }
    }
}

async function updateProfile() {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const phone = document.getElementById("phone").value;
    const presentAddress = document.getElementById("presentAddress").value;
    const permanentAddress = document.getElementById("permanentAddress").value;
    const about = document.getElementById("about").value;
    const image = document.getElementById("image").value;

    if (name.length === 0) {
        errorToast("Name Required");
    } else if (email.length === 0) {
        errorToast("Email Required");
    } else if (phone.length === 0) {
        errorToast("Phone Required");
    } else if (presentAddress.length === 0) {
        errorToast("Present Address Required");
    } else if (permanentAddress.length === 0) {
        errorToast("Permanent Address Required");
    } else if (about.length === 0) {
        errorToast("About Required");
    } else if (image.length === 0) {
        errorToast("Image Url Required");
    } else {
        showLoader2();
        try {
            let formData = {
                name: name,
                email: email,
                phone: phone,
                present_address: presentAddress,
                permanent_address: permanentAddress,
                about: about,
                image: image,
            };
            let URL = "/api/update-profile";
            let res = await axios.post(URL, formData);
            hideLoader2();
            if (res.status === 200 && res.data["msg"] === true) {
                successToast(res.data["data"]);
                setTimeout(() => {
                    getList();
                }, 2000);
            } else {
                errorToast(res.data["data"]);
            }
        } catch (error) {
            hideLoader2();
            errorToast("Something went wrong. Please try again.");
            console.error(error);
        }
    }
}

async function deleteProfile() {
    showLoader2();
    try {
        let URL = "/api/delete-profile";
        let res = await axios.get(URL);
        hideLoader2();
        if (res.status === 200 && res.data["msg"] === true) {
            successToast(res.data["data"]);
            setTimeout(() => {
                getList();
            }, 10000);
        } else {
            errorToast(res.data["data"]);
        }
    } catch (error) {
        hideLoader2();
        errorToast("Something went wrong. Please try again.");
        console.error(error);
    }
}


</script>
