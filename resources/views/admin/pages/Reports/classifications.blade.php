@extends('admin.master')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card-header">
            <h4 class="mb-0">
                <i class="fas fa-user-check"></i>
                Employee Classification (KNN)
            </h4>
        </div>

        <div class="card-body">

            <form method="GET" action="{{ route('reports.classifications') }}">

                <div class="row g-3">

                    <div class="col-md-5">
                        <label class="form-label">Employee</label>

                        <select class="form-control" name="employee">

                            @foreach($employees as $emp)

                                <option value="{{ $emp->id }}"
                                    {{ request('employee') == $emp->id ? 'selected' : '' }}>

                                    {{ $emp->name }}

                                </option>

                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Month</label>

                        <input
                            type="month"
                            class="form-control"
                            name="month"
                            value="{{ request('month', now()->format('Y-m')) }}">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">K Value</label>

                        <input
                            type="number"
                            class="form-control"
                            name="k"
                            value="{{ request('k', 3) }}"
                            min="1">
                    </div>

                    <div class="col-md-2 d-flex align-items-end">

                        <button type="submit" class="btn btn-primary w-100">
                            Classify
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    @isset($predicted_label)

        <div class="card mt-4 shadow-sm">

            <div class="card-header">
                Prediction Result
            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="250">Employee</th>
                        <td>{{ $employee->name }}</td>
                    </tr>

                    <tr>
                        <th>Predicted Class</th>
                        <td>{{ $predicted_label }}</td>
                    </tr>

                    <tr>
                        <th>K Value</th>
                        <td>{{ $k }}</td>
                    </tr>

                </table>

            </div>

        </div>

    @endisset

</div>

@endsection
