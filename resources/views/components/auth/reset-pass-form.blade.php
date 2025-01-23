<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6 center-screen">
            <div class="card animated fadeIn w-90 p-4">
                <div class="card-body">
                    <h4>SET NEW PASSWORD</h4>
                    <br/>
                    <label>New Password</label>
                    <input id="password" placeholder="New Password" class="form-control" type="password"/>
                    <br/>
                    <label>Confirm Password</label>
                    <input id="cpassword" placeholder="Confirm Password" class="form-control" type="password"/>
                    <br/>
                    <button onclick="ResetPass()" class="btn w-100 bg-gradient-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function ResetPass() {
        let password = document.getElementById('password').value;
        let cpassword = document.getElementById('cpassword').value;

        if(password.length===0){
            errorToast('Password is required')
        }else if(cpassword.length===0){
            errorToast('Confirm Password is required')
        }else if(password!==cpassword){
            errorToast('New Password and Confirm Password does not match')
        }else{
            $formData = {
                password: password,
            }
            let URL = "/api/reset-password";
            showLoader();
            try {
                let res = await axios.post(URL, $formData);
                hideLoader();
                if (res.status === 200 && res.data['msg'] === true) {
                    successToast('Password Reset Successfully'); // Login Success message
                    setTimeout(() => {
                        window.location.href = "/userLogin";
                    }, 1000);
                }
            } catch (error) {
                hideLoader();
                errorToast('Something went wrong')
            }
        }
    }
</script>
