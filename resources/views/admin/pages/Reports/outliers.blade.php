@extends('admin.master')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">
                <i class="fas fa-chart-line"></i>
                Z-Score Outlier Detection
            </h4>
        </div>

        <div class="card-body">

            <form id="outlierForm" class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">Field</label>

                    <select class="form-select" id="field">
                        <option value="working_hours">Working Hours</option>
                        <option value="salary">Salary</option>
                        <option value="deduction">Deduction</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Month</label>

                    <input
                        type="month"
                        id="month"
                        class="form-control"
                        value="2026-07">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Threshold</label>

                    <input
                        type="number"
                        step="0.1"
                        class="form-control"
                        id="threshold"
                        value="3">
                </div>

                <div class="col-md-3 d-flex align-items-end">
                    <button class="btn btn-primary w-100">
                        Detect Outliers
                    </button>
                </div>

            </form>

        </div>
    </div>

    <div class="card mt-4 shadow-sm">

        <div class="card-header">
            Result
        </div>

        <div class="card-body p-0">

            <table class="table table-bordered table-hover mb-0">

                <thead class="table-light">
                <tr>
                    <th width="80">ID</th>
                    <th>Employee</th>
                    <th>Value</th>
                    <th>Z-Score</th>
                </tr>
                </thead>

                <tbody id="resultBody">

                <tr>
                    <td colspan="4" class="text-center text-muted py-4">
                        Click "Detect Outliers"
                    </td>
                </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection


@push('scripts')
<script>

$('#outlierForm').submit(function(e){

    e.preventDefault();

    let field = $('#field').val();
    let month = $('#month').val();
    let threshold = $('#threshold').val();

    $.get('/reports/outliers',{

        field:field,
        month:month,
        threshold:threshold

    },function(response){

        let html='';

        if(response.outliers.length===0){

            html=`
                <tr>
                    <td colspan="4" class="text-center">
                        No outliers detected.
                    </td>
                </tr>
            `;

        }else{

            response.outliers.forEach(function(item){

                html+=`
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.name}</td>
                        <td>${item.value}</td>
                        <td>${item.z}</td>
                    </tr>
                `;

            });

        }

        $('#resultBody').html(html);

    });
v
});

</script>
@endpush
