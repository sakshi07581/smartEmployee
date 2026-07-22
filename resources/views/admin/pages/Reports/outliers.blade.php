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

            <form method="GET" action="{{ route('reports.outliers') }}">

                <div class="row g-3">

                    <div class="col-md-4">

                        <label class="form-label">Field</label>

                        <select class="form-control" name="field">

                            <option value="0"
                                {{ request('field', 0) == 0 ? 'selected' : '' }}>
                                Attendance Rate
                            </option>

                            <option value="1"
                                {{ request('field', 1) == 1 ? 'selected' : '' }}>
                                Working Hours
                            </option>

                            <option value="2"
                                {{ request('field') == 2 ? 'selected' : '' }}>
                                Salary
                            </option>

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

                        <label class="form-label">Threshold</label>

                        <input
                            type="number"
                            step="0.1"
                            min="0"
                            class="form-control"
                            name="threshold"
                            value="{{ request('threshold', 3) }}">

                    </div>

                    <div class="col-md-3 d-flex align-items-end">

                        <button type="submit" class="btn btn-primary w-100">
                            Detect Outliers
                        </button>

                    </div>

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

                <tbody>

                @if(empty($outliers))

                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">
                            No outliers detected.
                        </td>
                    </tr>

                @else

                    @foreach($outliers as $item)

                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['value'] }}</td>
                            <td>{{ $item['z'] }}</td>
                        </tr>

                    @endforeach

                @endif

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
