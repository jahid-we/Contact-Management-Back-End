<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6 center-screen">
            <div class="card animated fadeIn w-90  p-4">
                <div class="card-body">
                    <h4>ENTER OTP CODE</h4>
                    <br />
                    <label>6 Digit Code Here</label>
                    <input id="otp" placeholder="Code" class="form-control" type="text" />
                    <br />
                    <button onclick="VerifyOtp()" class="btn w-100 float-end bg-gradient-primary">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function VerifyOtp() {
        let otp = document.getElementById('otp').value;
        if (otp.length === 0) {
            errorToast('OTP is required');
        } else if (otp.length !== 6) {
            errorToast('Invalid OTP');
        } else {
            let formData = {
                email:sessionStorage.getItem('email'),
                otp: otp

            };
            let URL = "/api/verify-otp";
            showLoader();
            try {
                let res = await axios.post(URL, formData);
                hideLoader();
                if (res.status === 200 && res.data['msg'] === true) {
                    successToast('OTP Verified Successfully'); // Login Success message
                    setTimeout(() => {
                        window.location.href = "/api/resetPassword";
                    }, 1000);
                }
            }catch (error) {
                hideLoader();
                errorToast('An unexpected error occurred. Please try again.');
            }
        }
    }
</script>
