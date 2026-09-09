@extends('admin.master')

@section('content')

<div class="container py-4">


{{-- ============================================================
    K-Means Configuration
============================================================= --}}
<div class="card shadow-sm">

    <div class="card-header">
        <h4 class="mb-0">
            <i class="fas fa-project-diagram"></i>
            Employee Clustering Analysis (K-Means)
        </h4>
    </div>

    <div class="card-body">

        <form action="{{ url('/reports/clusters') }}" method="GET" class="row g-3">

            {{-- Month --}}
            <div class="col-md-4">

                <label class="form-label">
                    Month
                </label>

                <input
                    type="month"
                    name="month"
                    class="form-control"
                    value="{{ request('month', now()->format('Y-m')) }}"
                    required
                >

            </div>

            {{-- K --}}
            <div class="col-md-3">

                <label class="form-label">
                    Number of Groups (K)
                </label>

                <input
                    type="number"
                    name="k"
                    class="form-control"
                    value="{{ request('k', 3) }}"
                    min="2"
                    max="10"
                    required
                >

            </div>

            {{-- Submit --}}
            <div class="col-md-5 d-flex align-items-end">

                <button
                    type="submit"
                    class="btn btn-success w-100"
                >
                    <i class="fas fa-project-diagram"></i>
                    Analyze Employees
                </button>

            </div>

        </form>

    </div>

</div>


{{-- ============================================================
    Cluster Results
============================================================= --}}
@if(isset($clusters))

    <div class="card mt-4 shadow-sm">

        <div class="card-header d-flex justify-content-between">

            <strong>
                Employee Grouping Results
            </strong>

            <strong>
                Inertia:
                {{ $inertia }}
            </strong>

        </div>

        <div class="card-body">

            @forelse($clusters as $cluster => $employees)

                <div class="card mb-4">

                    {{-- Cluster Name --}}
                    <div class="card-header bg-primary text-white">

                        <strong>
                            {{ $clusterNames[$cluster] ?? 'Employee Group' }}
                        </strong>

                        <span class="float-end">
                            {{ count($employees) }} Employees
                        </span>

                    </div>

                    <div class="card-body p-0">

                        <table class="table table-bordered table-hover mb-0">

                            <thead class="table-light">

                                <tr>
                                    <th width="80">ID</th>
                                    <th>Employee</th>
                                    <th>Attendance Rate</th>
                                    <th>Avg. Working Hours</th>
                                    <th>Salary</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach($employees as $employee)

                                    <tr>

                                        <td>
                                            {{ $employee['id'] }}
                                        </td>

                                        <td>
                                            {{ $employee['name'] }}
                                        </td>

                                        <td>
                                            {{ number_format($employee['features'][0], 2) }}%
                                        </td>

                                        <td>
                                            {{ number_format($employee['features'][1], 2) }}
                                            hours
                                        </td>

                                        <td>
                                            Rs.
                                            {{ number_format($employee['features'][2], 2) }}
                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            @empty

                <div class="alert alert-warning text-center">
                    No employee groups found.
                </div>

            @endforelse

        </div>

    </div>

@endif


</div>

@endsection
