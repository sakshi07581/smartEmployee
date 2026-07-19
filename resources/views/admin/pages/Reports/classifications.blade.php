@extends('admin.master')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card-header">
            <h4>
                <i class="fas fa-user-check"></i>
                KNN Employee Classification
            </h4>
        </div>

        <div class="card-body">

            <form id="classificationForm" class="row g-3">

                <div class="col-md-5">

                    <label class="form-label">Employee</label>

                    <select class="form-control" id="employee">

                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">
                                {{ $employee->name }}
                            </option>
                        @endforeach

                    </select>

                </div>

                <div class="col-md-3">

                    <label class="form-label">Month</label>

                    <input type="month"
                           class="form-control"
                           id="month"
                           value="2026-07">

                </div>

                <div class="col-md-2">

                    <label class="form-label">K Value</label>

                    <input type="number"
                           class="form-control"
                           id="k"
                           value="3"
                           min="1">

                </div>

                <div class="col-md-2 d-flex align-items-end">

                    <button class="btn btn-primary w-100">
                        Classify
                    </button>

                </div>

            </form>

        </div>

    </div>

    <div class="card mt-4 shadow-sm">

        <div class="card-header">
            Prediction Result
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">Employee</th>
                    <td id="employeeName">-</td>
                </tr>

                <tr>
                    <th>Predicted Class</th>
                    <td id="prediction">-</td>
                </tr>

                <tr>
                    <th>K Value</th>
                    <td id="kvalue">-</td>
                </tr>

            </table>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

$('#classificationForm').submit(function(e){

    e.preventDefault();

    let id = $('#employee').val();

    $.get('/reports/classify/' + id, {

        month: $('#month').val(),
        k: $('#k').val()

    }, function(response){

        $('#employeeName').text(response.name);
        $('#prediction').text(response.predicted_label);
        $('#kvalue').text(response.k);

    });

});

</script>

@endpush
