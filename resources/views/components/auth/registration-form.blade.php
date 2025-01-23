<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h4 class="text-center">Sign Up</h4>
                <hr />
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input id="name" placeholder="Name" class="form-control" type="text" />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" placeholder="User Email" class="form-control" type="email" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" placeholder="User Password" class="form-control" type="password" />
                </div>
                <button onclick="onRegistration()" type="button" class="btn btn-primary w-100">
                    Complete
                </button>

            </div>
        </div>
    </div>
</div>


<script>
    async function onRegistration() {
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (name.length === 0) {
            errorToast('Name is required')
        } else if (email.length === 0) {
            errorToast('Email is required')
        } else if (password.length === 0) {
            errorToast('Password is required')
        } else {
            let formData = {
                name: name,
                email: email,
                password: password
            };
            let URL = "/api/user-registration";
            showLoader();
            try {

                let res = await axios.post(URL, formData);
                hideLoader();
                if (res.status === 200 && res.data['msg'] === true) {

                    successToast('Registration Success'); // Login Success message
                    setTimeout(() => {
                       window.location.href = "/userLogin";
                    }, 1000);

                }

            } catch (error) {
                hideLoader();


                errorToast(error.response.data['data']);

            }
        }
    }
</script>
