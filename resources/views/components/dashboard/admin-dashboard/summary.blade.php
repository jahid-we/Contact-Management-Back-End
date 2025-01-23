<div class="container-fluid">
    <div class="row">

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 animated fadeIn p-3">
            <div class="card card-plain h-100 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white shadow-lg rounded-3xl">
                <div class="card-body d-flex justify-content-between align-items-center p-5">
                    <div>
                        <h3 class="mb-0 text-capitalize font-weight-bold display-3">
                            <span id="contact">0</span> <!-- Placeholder for dynamic data -->
                        </h3>
                        <p class="mb-0 text-sm opacity-75">Total Contacts</p>
                    </div>
                    <div class="icon-container">
                        <div class="icon icon-shape bg-white text-dark rounded-circle p-4 shadow-lg">
                            <img class="w-100" src="{{ asset('images/icon.svg') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<script>
    getList();
    async function getList() {
        showLoader2();
        let res = await axios.get("/api/contact-count");

        document.getElementById('contact').innerText = res.data['data'];

        hideLoader2();
    }
</script>
<style>
   /* Card Styles */
    .card {
        border: none;
        border-radius: 30px; /* Increased border-radius for a more modern look */
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-15px);
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 40px; /* Increased padding for larger design */
    }

    h3 {
        font-size: 4rem; /* Larger font for the contact number */
        font-weight: bold;
        color: #000000;
    }

    p {
        font-size: 1.25rem; /* Slightly larger text for the description */
        color: rgba(0, 0, 0, 0.75);
    }

    /* Icon Container */
    .icon-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .icon {
        background: linear-gradient(135deg, #ff007f, #7928ca);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        width: 100px; /* Larger icon */
        height: 100px; /* Larger icon */
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .icon:hover {
        background: linear-gradient(135deg, #7928ca, #ff007f);
        transform: scale(1.1);
        box-shadow: 0 12px 45px rgba(0, 0, 0, 0.3);
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .col-xl-4, .col-lg-4 {
            padding: 10px;
        }

        h3 {
            font-size: 3rem; /* Adjusted for smaller screens */
        }
    }
</style>
