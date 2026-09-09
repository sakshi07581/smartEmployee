@extends('admin.master')

@section('content')

<div class="container py-4">

    {{-- PAGE HEADER --}}

    <div class="mb-4">

        <h3 class="mb-1">
            <i class="fas fa-chart-line text-primary"></i>
            Z-Score Outlier Detection
        </h3>

        <p class="text-muted mb-0">
            Statistical analysis tool for identifying employees
            with unusually high or low values.
        </p>

    </div>


    {{-- EXPLANATION --}}

    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <div class="row">

                <div class="col-md-8">

                    <h5>
                        <i class="fas fa-info-circle text-primary"></i>
                        What is Z-Score?
                    </h5>

                    <p class="text-muted mb-2">

                        Z-Score measures how far an employee's value
                        is from the average of all employees,
                        expressed in standard deviations.

                    </p>

                    <div class="bg-light rounded p-3">

                        <strong>
                            Z = (X − μ) / σ
                        </strong>

                        <div class="small text-muted mt-2">

                            X = Employee value
                            &nbsp; | &nbsp;
                            μ = Mean
                            &nbsp; | &nbsp;
                            σ = Standard deviation

                        </div>

                    </div>

                </div>


                <div class="col-md-4">

                    <div class="alert alert-info mb-0">

                        <strong>
                            Interpretation
                        </strong>

                        <ul class="small mb-0 mt-2">

                            <li>
                                Z near 0 → close to average
                            </li>

                            <li>
                                Positive Z → above average
                            </li>

                            <li>
                                Negative Z → below average
                            </li>

                            <li>
                                Larger |Z| → more unusual
                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- CONFIGURATION --}}

    <div class="card shadow-sm">

        <div class="card-header">

            <h5 class="mb-0">

                <i class="fas fa-sliders-h"></i>

                Statistical Analysis

            </h5>

        </div>

        <div class="card-body">

            <form
                method="GET"
                action="{{ route('reports.outliers') }}"
            >

                <div class="row g-3">


                    {{-- FIELD --}}

                    <div class="col-md-4">

                        <label class="form-label">
                            Metric
                        </label>

                        <select
                            class="form-control"
                            name="field"
                        >

                            <option
                                value="0"
                                {{ request('field', 0) == 0 ? 'selected' : '' }}
                            >
                                Attendance Rate
                            </option>

                            <option
                                value="1"
                                {{ request('field') == 1 ? 'selected' : '' }}
                            >
                                Average Working Hours
                            </option>

                            <option
                                value="2"
                                {{ request('field') == 2 ? 'selected' : '' }}
                            >
                                Salary
                            </option>

                        </select>

                    </div>


                    {{-- MONTH --}}

                    <div class="col-md-3">

                        <label class="form-label">
                            Month
                        </label>

                        <input
                            type="month"
                            class="form-control"
                            name="month"
                            value="{{ request('month', now()->format('Y-m')) }}"
                        >

                    </div>


                    {{-- THRESHOLD --}}

                    <div class="col-md-2">

                        <label class="form-label">

                            Z-Score Threshold

                        </label>

                        <input
                            type="number"
                            step="0.1"
                            min="0.5"
                            class="form-control"
                            name="threshold"
                            value="{{ request('threshold', 1.5) }}"
                        >

                    </div>


                    {{-- BUTTON --}}

                    <div class="col-md-3 d-flex align-items-end">

                        <button
                            type="submit"
                            class="btn btn-primary w-100"
                        >

                            <i class="fas fa-search"></i>

                            Analyze

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- RESULTS --}}

    <div class="card mt-4 shadow-sm">

        <div class="card-header">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="mb-0">
                        <i class="fas fa-exclamation-triangle text-warning"></i>
                        Detected Outliers
                    </h5>

                    <small class="text-muted">

                        Employees whose absolute Z-Score
                        meets the selected threshold.

                    </small>

                </div>


                @if(isset($outliers))

                    <span class="badge bg-warning text-dark">

                        {{ count($outliers) }} Outlier(s)

                    </span>

                @endif

            </div>

        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-bordered table-hover mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="100">
                                ID
                            </th>

                            <th>
                                Employee
                            </th>

                            <th>
                                Value
                            </th>

                            <th>
                                Z-Score
                            </th>

                            <th>
                                Interpretation
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                    @if(empty($outliers))

                        <tr>

                            <td
                                colspan="5"
                                class="text-center py-5"
                            >

                                <i
                                    class="fas fa-check-circle fa-2x text-success mb-3"
                                ></i>

                                <h6>
                                    No Outliers Detected
                                </h6>

                                <p class="text-muted mb-0">

                                    No employee reached the selected
                                    Z-Score threshold.

                                </p>

                            </td>

                        </tr>

                    @else

                        @foreach($outliers as $item)

                            <tr>

                                <td>
                                    {{ $item['id'] }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $item['name'] }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $item['value'] }}
                                </td>

                                <td>

                                    @if($item['z'] >= 0)

                                        <span class="badge bg-primary">
                                            +{{ $item['z'] }}
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            {{ $item['z'] }}
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    @if($item['z'] > 0)

                                        <span class="text-primary">

                                            <i class="fas fa-arrow-up"></i>

                                            Above Average

                                        </span>

                                    @else

                                        <span class="text-danger">

                                            <i class="fas fa-arrow-down"></i>

                                            Below Average

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @endforeach

                    @endif

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    {{-- STATISTICAL GUIDE --}}

    <div class="card mt-4 shadow-sm">

        <div class="card-header">

            <h5 class="mb-0">

                <i class="fas fa-graduation-cap text-primary"></i>

                Statistical Interpretation Guide

            </h5>

        </div>

        <div class="card-body">

            <div class="row g-3">

                <div class="col-md-3">

                    <div class="border rounded p-3 h-100">

                        <strong>
                            Z ≈ 0
                        </strong>

                        <p class="text-muted small mb-0 mt-2">

                            Employee is close to the overall
                            employee average.

                        </p>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="border rounded p-3 h-100">

                        <strong>
                            Z > 0
                        </strong>

                        <p class="text-muted small mb-0 mt-2">

                            Employee's value is above the
                            overall average.

                        </p>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="border rounded p-3 h-100">

                        <strong>
                            Z < 0
                        </strong>

                        <p class="text-muted small mb-0 mt-2">

                            Employee's value is below the
                            overall average.

                        </p>

                    </div>

                </div>


                <div class="col-md-3">

                    <div class="border rounded p-3 h-100">

                        <strong>
                            |Z| ≥ 1.5
                        </strong>

                        <p class="text-muted small mb-0 mt-2">

                            Employee is flagged as statistically
                            unusual for exploratory analysis.

                        </p>

                    </div>

                </div>

            </div>


            <div class="alert alert-warning mt-4 mb-0">

                <strong>
                    Important:
                </strong>

                An outlier is not automatically a bad performer.
                It simply means that the employee's value is
                unusually far from the overall group average.

            </div>

        </div>

    </div>

</div>

@endsection
