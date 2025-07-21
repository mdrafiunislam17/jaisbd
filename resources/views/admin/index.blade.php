@extends("admin.layouts.master")
@section("title", "Dashboard")
@section("content")
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#"
           class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-sync fa-sm text-white-50"></i> Refresh
        </a>
    </div>

   <div class="container">
    <div class="row">
        <div class="col-12 mb-4">
            <form method="GET" action="#" class="row g-3">
                <!-- Start Date -->
                <div class="col-md-3">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input type="date" name="start_date" id="start_date"
                           value="{{ request('start_date') }}"
                           class="form-control">
                </div>

                <!-- End Date -->
                <div class="col-md-3">
                    <label for="end_date" class="form-label">End Date</label>
                    <input type="date" name="end_date" id="end_date"
                           value="{{ request('end_date') }}"
                           class="form-control">
                </div>

                <!-- Report Buttons - Horizontal -->
                <div class="col-md-6">
                    <label class="form-label d-block">Reports</label>
                    <div class="btn-group" role="group">
                        <button type="submit" name="report_type" value="tour" class="btn btn-primary">
                            <i class="fas fa-plane me-1"></i> Tour
                        </button>&nbsp;
                        <button type="submit" name="report_type" value="visa" class="btn btn-secondary">
                            <i class="fas fa-passport me-1"></i> Visa
                        </button>&nbsp;
                        <button type="submit" name="report_type" value="medical" class="btn btn-success">
                            <i class="fas fa-heartbeat me-1"></i> Medical
                        </button>&nbsp;
                        <button type="submit" name="report_type" value="study_abroad" class="btn btn-info">
                            <i class="fas fa-graduation-cap me-1"></i> Study
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
@endsection