@extends('admin.master')

@section('content')


<div class="container py-4">

    {{-- ============================================================
        Salary Grade Prediction
    ============================================================= --}}
    <div class="card shadow-sm">

        <div class="card-header">
            <h4 class="mb-0">
                <i class="fas fa-user-check"></i>
                Employee Salary Grade Prediction (KNN)
            </h4>
        </div>

        <div class="card-body">

            <form method="GET" action="{{ route('reports.classifications') }}">

                <div class="row g-3">

                    {{-- Employee --}}
                    <div class="col-md-5">

                        <label class="form-label">
                            Employee
                        </label>

                        <select
                            class="form-control"
                            name="employee"
                            required
                        >

                            <option value="">
                                Select Employee
                            </option>

                            @foreach ($employees as $emp)

                                <option
                                    value="{{ $emp->id }}"
                                    {{ request('employee') == $emp->id ? 'selected' : '' }}
                                >
                                    {{ $emp->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- Month --}}
                    <div class="col-md-3">

                        <label class="form-label">
                            Month
                        </label>

                        <input
                            type="month"
                            class="form-control"
                            name="month"
                            value="{{ request('month', now()->format('Y-m')) }}"
                            required
                        >

                    </div>

                    {{-- K Value --}}
                    <div class="col-md-2">

                        <label class="form-label">
                            K Value
                        </label>

                        <input
                            type="number"
                            class="form-control"
                            name="k"
                            value="{{ request('k', 3) }}"
                            min="1"
                            required
                        >

                    </div>

                    {{-- Submit --}}
                    <div class="col-md-2 d-flex align-items-end">

                        <button
                            type="submit"
                            class="btn btn-primary w-100"
                        >
                            <i class="fas fa-brain"></i>
                            Predict
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- ============================================================
        Prediction Result
    ============================================================= --}}
    @if ($employee)

        <div class="card mt-4 shadow-sm">

            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-chart-line"></i>
                    Salary Grade Prediction
                </h5>
            </div>

            <div class="card-body">

                @if ($predicted_label)

                    <table class="table table-bordered mb-0">

                        <tr>
                            <th width="250">
                                Employee
                            </th>

                            <td>
                                {{ $employee->name }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Predicted Salary Grade
                            </th>

                            <td>
                                <span class="badge bg-primary fs-6">
                                    {{ $predicted_label->salary_class }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th>
                                K Value
                            </th>

                            <td>
                                {{ $k }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Basic Salary
                            </th>

                            <td>
                                Rs. {{ number_format($predicted_label->basic_salary, 2) }}
                            </td>
                        </tr>

                        <tr>
                            <th>
                                Total Salary
                            </th>

                            <td>
                                <strong>
                                    Rs. {{ number_format($predicted_label->total_salary, 2) }}
                                </strong>
                            </td>
                        </tr>

                    </table>

                @else

                    <div class="alert alert-warning mb-0">
                        <i class="fas fa-exclamation-triangle"></i>
                        Unable to predict a salary grade for this employee.
                    </div>

                @endif

            </div>

        </div>

    @endif

</div>


@endsection
