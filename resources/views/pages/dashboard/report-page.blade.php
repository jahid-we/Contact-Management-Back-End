@extends('layout.sidenav-layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>All Contacts</h4>

                    <!-- Heading for the download button -->
                    <h5 class="mt-4">Download Report</h5>

                    <button onclick="contacts()" class="btn mt-3 bg-gradient-primary">Download</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    async function contacts() {
        window.open('/api/getPdfContact');
    }
</script>

