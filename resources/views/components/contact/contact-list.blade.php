<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Contact</h4>
                    </div>
                    <div class="align-items-center col">
                        <button data-bs-toggle="modal" data-bs-target="#create-modal"
                            class="float-end btn m-0 bg-gradient-primary">Add Contact</button>
                    </div>
                </div>
                <hr class="bg-dark " />
                <div class="table-responsive">
                    <table class="table" id="tableData">
                        <thead>
                            <tr class="bg-light">
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tableList">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    getList();

    async function getList() {

        showLoader2();
        let res = await axios.get("/api/contact-list");
        hideLoader2();
        let tableList = $("#tableList");
        let tableData = $("#tableData");
        tableData.DataTable().destroy();
        tableList.empty();

        res.data["data"].forEach(function(item, index) {
            let row =
                `<tr>
            <td>${index+1}</td>
            <td>${item["name"]}</td>
            <td>${item["email"]}</td>
             <td class="text-center">
            <button data-id="${item['id']}" class="btn viewBtn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="View Details">
            <i style="font-size: 16px" class="fas fa-eye"></i>
            </button>
            <button data-id="${item['id']}" class="btn pdfBtn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Download PDF">
            <i style="font-size: 16px" class="fas fa-file-pdf"></i>
            </button>
            <button data-id="${item['id']}" class="btn editBtn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Details">
            <i style="font-size: 16px" class="fas fa-edit"></i>
            </button>
            <button data-id="${item['id']}" class="btn deleteBtn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Contact">
            <i style="font-size: 16px" class="fas fa-trash"></i>
            </button>


             </td>
        </tr>`

            tableList.append(row);
        });


        $(".viewBtn").on("click", async function() {
            let id = $(this).data("id");
            await FillViewForm(id);
            $("#view-modal").modal("show");

        });


        $(".pdfBtn").on("click", async function() {
            let id = $(this).data("id");
            $("#contactId").val(id);
            $("#pdf-modal").modal("show");

        });


        $(".editBtn").on("click", async function() {
            let id = $(this).data("id");
            await FillUpUpdateForm(id);
            $("#update-modal").modal("show");

        });

        $(".deleteBtn").on("click", async function() {
            let id = $(this).data("id");
            $("#delete-modal").modal("show");
            $("#deleteId").val(id);

        });

        tableData.DataTable({
            order: [
                [0, "asc"]
            ],
            lengthMenu: [10, 15, 20, 25, 50],
            responsive: true // Enable responsiveness
        });



    }
</script>
