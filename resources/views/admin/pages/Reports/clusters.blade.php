@extends('admin.master')

@section('content')

<div class="container py-4">

{{-- ============================================================
    PAGE HEADER
============================================================= --}}
<div class="mb-4">

    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">

        <div>

            <h3 class="fw-bold mb-1">

                <i class="fas fa-project-diagram text-primary"></i>

                Employee Clustering Analysis

            </h3>

            <div class="text-muted">

                K-Means based employee grouping and similarity analysis

            </div>

        </div>

    </div>

</div>



{{-- ============================================================
    K-Means Configuration
============================================================= --}}
<div class="card shadow-sm configuration-card">

    <div class="card-header">

        <h4 class="mb-0">

            <i class="fas fa-sliders-h"></i>

            K-Means Configuration

        </h4>

    </div>


    <div class="card-body">

        <form
            action="{{ url('/reports/clusters') }}"
            method="GET"
            class="row g-3"
        >

            {{-- ====================================================
                Month
            ===================================================== --}}
            <div class="col-md-4">

                <label class="form-label fw-semibold">

                    Month

                    <span
                        class="stat-help"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="Select the month whose employee attendance, working hours and salary data will be used for clustering."
                    >

                        <i class="fas fa-question-circle"></i>

                    </span>

                </label>


                <input
                    type="month"
                    name="month"
                    class="form-control"
                    value="{{ request('month', now()->format('Y-m')) }}"
                    required
                >


                <small class="text-muted">

                    Employee data will be analyzed for this period.

                </small>

            </div>



            {{-- ====================================================
                K
            ===================================================== --}}
            <div class="col-md-3">

                <label class="form-label fw-semibold">

                    Number of Groups (K)

                    <span
                        class="stat-help"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="K represents the number of clusters that K-Means is asked to create. For example, K = 3 attempts to divide employees into three groups."
                    >

                        <i class="fas fa-question-circle"></i>

                    </span>

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


                <small class="text-muted">

                    Recommended for this dataset: K = 2–4

                </small>

            </div>



            {{-- ====================================================
                Analyze Button
            ===================================================== --}}
            <div class="col-md-5 d-flex align-items-end">

                <button
                    type="submit"
                    class="btn btn-success w-100 analyze-btn"
                >

                    <i class="fas fa-project-diagram"></i>

                    Analyze Employees

                </button>

            </div>

        </form>

    </div>

</div>



{{-- ============================================================
    HOW K-MEANS WORKS
============================================================= --}}
@if(isset($clusters))

<div class="card mt-4 shadow-sm methodology-card">

    <div class="card-body">

        <div class="d-flex align-items-start">

            <div class="methodology-icon">

                <i class="fas fa-brain"></i>

            </div>


            <div class="ms-3">

                <h5 class="fw-bold mb-2">

                    How K-Means Works

                </h5>


                <p class="text-muted mb-3">

                    K-Means is an unsupervised machine learning algorithm
                    that groups employees according to similarity in their
                    selected features.

                </p>


                <div class="row g-3">


                    {{-- Step 1 --}}
                    <div class="col-md-3">

                        <div class="method-step">

                            <div class="step-number">

                                1

                            </div>

                            <strong>

                                Select K

                            </strong>

                            <p>

                                The system determines how many employee
                                groups should be created.

                            </p>

                        </div>

                    </div>



                    {{-- Step 2 --}}
                    <div class="col-md-3">

                        <div class="method-step">

                            <div class="step-number">

                                2

                            </div>

                            <strong>

                                Initialize

                            </strong>

                            <p>

                                Initial centroids are selected from the
                                normalized employee data.

                            </p>

                        </div>

                    </div>



                    {{-- Step 3 --}}
                    <div class="col-md-3">

                        <div class="method-step">

                            <div class="step-number">

                                3

                            </div>

                            <strong>

                                Assign

                            </strong>

                            <p>

                                Each employee is assigned to the nearest
                                centroid using Euclidean distance.

                            </p>

                        </div>

                    </div>



                    {{-- Step 4 --}}
                    <div class="col-md-3">

                        <div class="method-step">

                            <div class="step-number">

                                4

                            </div>

                            <strong>

                                Recalculate

                            </strong>

                            <p>

                                Centroids are recalculated until the
                                cluster assignments stabilize.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endif



{{-- ============================================================
    FEATURE INFORMATION
============================================================= --}}
@if(isset($clusters))

<div class="card mt-3 shadow-sm feature-card">

    <div class="card-header">

        <strong>

            <i class="fas fa-database"></i>

            Features Used for Clustering

        </strong>

    </div>


    <div class="card-body">

        <div class="row g-3">


            {{-- Attendance --}}
            <div class="col-md-4">

                <div
                    class="feature-box"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Attendance rate represents the percentage of expected working days on which the employee was recorded as present."
                >

                    <div class="feature-icon attendance-icon">

                        <i class="fas fa-calendar-check"></i>

                    </div>


                    <div>

                        <strong>

                            Attendance Rate

                        </strong>

                        <div class="small text-muted">

                            Measures employee attendance consistency.

                        </div>

                    </div>

                </div>

            </div>



            {{-- Working Hours --}}
            <div class="col-md-4">

                <div
                    class="feature-box"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Average working hours represents the employee's average recorded working time during the selected period."
                >

                    <div class="feature-icon hours-icon">

                        <i class="fas fa-clock"></i>

                    </div>


                    <div>

                        <strong>

                            Average Working Hours

                        </strong>

                        <div class="small text-muted">

                            Measures average time spent working.

                        </div>

                    </div>

                </div>

            </div>



            {{-- Salary --}}
            <div class="col-md-4">

                <div
                    class="feature-box"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    title="Salary is included as a numerical employee feature. It is normalized before K-Means calculates distances."
                >

                    <div class="feature-icon salary-icon">

                        <i class="fas fa-money-bill-wave"></i>

                    </div>


                    <div>

                        <strong>

                            Salary

                        </strong>

                        <div class="small text-muted">

                            Represents the employee salary feature.

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="alert alert-light border mt-3 mb-0">

            <i class="fas fa-info-circle text-primary me-1"></i>

            <strong>Feature normalization:</strong>

            The selected numerical features are transformed to a
            0–1 range before clustering. This prevents a feature such
            as salary, which has a larger numerical scale, from
            dominating the Euclidean distance calculation.

        </div>

    </div>

</div>

@endif



{{-- ============================================================
    CLUSTER RESULTS
============================================================= --}}
@if(isset($clusters))


{{-- ============================================================
    RESULT SUMMARY
============================================================= --}}
<div class="row g-3 mt-3">


    {{-- ========================================================
        Clusters
    ========================================================= --}}
    <div class="col-md-4">

        <div class="card shadow-sm h-100 summary-card">

            <div class="card-body d-flex align-items-center">

                <div class="summary-icon bg-primary">

                    <i class="fas fa-layer-group"></i>

                </div>


                <div class="ms-3">

                    <div class="summary-label">

                        Clusters Generated

                        <span
                            class="stat-help"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="The number of non-empty employee groups produced by the K-Means algorithm."
                        >

                            <i class="fas fa-question-circle"></i>

                        </span>

                    </div>


                    <h4 class="mb-0 fw-bold">

                        {{ count($clusters) }}

                    </h4>


                    <small class="text-muted">

                        Employee groups

                    </small>

                </div>

            </div>

        </div>

    </div>



    {{-- ========================================================
        Employees
    ========================================================= --}}
    <div class="col-md-4">

        <div class="card shadow-sm h-100 summary-card">

            <div class="card-body d-flex align-items-center">

                <div class="summary-icon bg-success">

                    <i class="fas fa-users"></i>

                </div>


                <div class="ms-3">

                    <div class="summary-label">

                        Employees Analyzed

                        <span
                            class="stat-help"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="The number of employee records included in the dataset passed to the K-Means algorithm."
                        >

                            <i class="fas fa-question-circle"></i>

                        </span>

                    </div>


                    <h4 class="mb-0 fw-bold">

                        {{ collect($clusters)->flatten(1)->count() }}

                    </h4>


                    <small class="text-muted">

                        Employees included

                    </small>

                </div>

            </div>

        </div>

    </div>



    {{-- ========================================================
        Inertia
    ========================================================= --}}
    <div class="col-md-4">

        <div class="card shadow-sm h-100 summary-card">

            <div class="card-body d-flex align-items-center">

                <div class="summary-icon bg-dark">

                    <i class="fas fa-bullseye"></i>

                </div>


                <div class="ms-3">

                    <div class="summary-label">

                        Inertia

                        <span
                            class="stat-help"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Inertia is the total squared distance between employees and the centroids of their assigned clusters. Lower inertia means tighter grouping for the same dataset and the same K."
                        >

                            <i class="fas fa-question-circle"></i>

                        </span>

                    </div>


                    <h4 class="mb-0 fw-bold">

                        {{ number_format($inertia, 4) }}

                    </h4>


                    <small class="text-muted">

                        Within-cluster variation

                    </small>

                </div>

            </div>

        </div>

    </div>

</div>



{{-- ============================================================
    STATISTICAL INTERPRETATION
============================================================= --}}
<div class="card mt-4 shadow-sm interpretation-card">

    <div class="card-body">

        <div class="d-flex align-items-start">

            <div class="interpretation-icon">

                <i class="fas fa-chart-line"></i>

            </div>


            <div class="ms-3 flex-grow-1">

                <h5 class="fw-bold mb-2">

                    Understanding the Results

                </h5>


                <div class="row g-3">


                    {{-- Inertia --}}
                    <div class="col-md-6">

                        <div class="interpretation-box">

                            <strong>

                                <i class="fas fa-bullseye"></i>

                                Inertia

                            </strong>


                            <p class="mb-0">

                                Current inertia is

                                <strong>
                                    {{ number_format($inertia, 4) }}
                                </strong>.

                                It represents the total within-cluster
                                squared distance after normalization.

                            </p>

                        </div>

                    </div>



                    {{-- K --}}
                    <div class="col-md-6">

                        <div class="interpretation-box">

                            <strong>

                                <i class="fas fa-layer-group"></i>

                                Selected K

                            </strong>


                            <p class="mb-0">

                                The analysis was requested with

                                <strong>
                                    K = {{ request('k', 3) }}
                                </strong>.

                                K determines the target number of groups.

                            </p>

                        </div>

                    </div>

                </div>


                <div class="alert alert-warning mt-3 mb-0">

                    <i class="fas fa-exclamation-triangle me-1"></i>

                    <strong>Important:</strong>

                    Inertia normally decreases as K increases.
                    Therefore, a smaller inertia by itself does not
                    prove that a larger K is better. The Elbow Method
                    can be used to compare different K values and
                    identify a reasonable balance between compactness
                    and the number of clusters.

                </div>

            </div>

        </div>

    </div>

</div>



{{-- ============================================================
    CLUSTER VISUALIZATION
============================================================= --}}
<div class="card mt-4 shadow-sm">

    <div class="card-header">

        <div>

            <strong>

                <i class="fas fa-project-diagram"></i>

                Employee Cluster Groups

            </strong>


            <div class="text-muted small mt-1">

                Employees with relatively similar feature values are
                placed into the same group.

            </div>

        </div>

    </div>



    <div class="card-body">

        @if(count($clusters) > 0)

            <div class="row g-4">


                @foreach($clusters as $cluster => $employees)

                    <div class="col-md-6 col-xl-4">

                        <div class="cluster-card h-100">


                            {{-- =================================
                                Cluster Header
                            ================================== --}}
                            <div class="cluster-card-header">

                                <div>

                                    <div class="cluster-number">

                                        CLUSTER {{ $loop->iteration }}

                                        <span
                                            class="stat-help"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Cluster numbers are identifiers only. Cluster 1 is not necessarily better or worse than Cluster 2."
                                        >

                                            <i class="fas fa-question-circle"></i>

                                        </span>

                                    </div>


                                    <h5 class="mb-0 fw-bold">

                                        {{ $clusterNames[$cluster] ?? 'Employee Group' }}

                                    </h5>

                                </div>



                                <div
                                    class="cluster-count"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="This cluster contains {{ count($employees) }} employees."
                                >

                                    {{ count($employees) }}

                                    <small>

                                        employees

                                    </small>

                                </div>

                            </div>



                            {{-- =================================
                                Cluster Explanation
                            ================================== --}}
                            <div class="cluster-description">

                                <i class="fas fa-info-circle"></i>

                                Employees in this group have relatively
                                similar values for the features used
                                by K-Means.

                            </div>



                            {{-- =================================
                                Employee Pieces
                            ================================== --}}
                            <div class="cluster-body">

                                @foreach($employees as $employee)

                                    <div
                                        class="employee-piece"
                                        data-bs-toggle="tooltip"
                                        data-bs-placement="top"
                                        title="This employee was assigned to this cluster because their normalized feature vector is closer to this cluster's centroid than to the other centroids."
                                    >


                                        <div class="employee-avatar">

                                            <i class="fas fa-user"></i>

                                        </div>



                                        <div class="employee-details">

                                            <div class="employee-name">

                                                {{ $employee['name'] }}

                                            </div>



                                            <div class="employee-metrics">


                                                {{-- Attendance --}}
                                                <span
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom"
                                                    title="Attendance rate during the selected month."
                                                >

                                                    <i class="fas fa-calendar-check"></i>

                                                    {{ number_format($employee['features'][0], 2) }}%

                                                </span>



                                                {{-- Working Hours --}}
                                                <span
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="bottom"
                                                    title="Average working hours during the selected month."
                                                >

                                                    <i class="fas fa-clock"></i>

                                                    {{ number_format($employee['features'][1], 2) }} hrs

                                                </span>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="alert alert-warning text-center mb-0">

                <i class="fas fa-exclamation-triangle"></i>

                No employee groups found.

            </div>

        @endif

    </div>

</div>



{{-- ============================================================
    CLUSTER DISTRIBUTION
============================================================= --}}
<div class="card mt-4 shadow-sm">

    <div class="card-header">

        <strong>

            <i class="fas fa-chart-pie"></i>

            Cluster Distribution

            <span
                class="stat-help"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                title="This chart shows the number and percentage of employees assigned to each cluster. It describes cluster size, not employee performance."
            >

                <i class="fas fa-question-circle"></i>

            </span>

        </strong>

    </div>



    <div class="card-body">

        <div class="row align-items-center">


            {{-- ====================================================
                Pie Chart
            ===================================================== --}}
            <div class="col-md-6">

                <div class="chart-container">

                    <canvas id="clusterDistribution"></canvas>

                </div>

            </div>



            {{-- ====================================================
                Distribution Details
            ===================================================== --}}
            <div class="col-md-6">

                <div class="distribution-list">

                    @foreach($clusters as $cluster => $employees)

                        @php

                            $totalEmployees =
                                collect($clusters)
                                    ->flatten(1)
                                    ->count();

                            $percentage =
                                $totalEmployees > 0
                                    ? (count($employees) / $totalEmployees) * 100
                                    : 0;

                        @endphp


                        <div
                            class="distribution-item"
                            data-bs-toggle="tooltip"
                            data-bs-placement="left"
                            title="Cluster {{ $loop->iteration }} contains {{ count($employees) }} employees, representing {{ number_format($percentage, 1) }}% of the analyzed employees."
                        >

                            <div>

                                <strong>

                                    {{ $clusterNames[$cluster] ?? 'Cluster ' . $loop->iteration }}

                                </strong>


                                <div class="small text-muted">

                                    Cluster {{ $loop->iteration }}

                                </div>

                            </div>



                            <div class="text-end">

                                <strong>

                                    {{ count($employees) }}

                                </strong>


                                <div class="small text-muted">

                                    {{ number_format($percentage, 1) }}%

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


                <div class="alert alert-light border mt-3 mb-0">

                    <i class="fas fa-info-circle text-primary me-1"></i>

                    A larger cluster means more employees share similar
                    feature patterns. It does <strong>not</strong> mean
                    that the employees in that cluster are necessarily
                    higher-performing.

                </div>

            </div>

        </div>

    </div>

</div>



{{-- ============================================================
    ACADEMIC INTERPRETATION
============================================================= --}}
<div class="card mt-4 shadow-sm academic-card">

    <div class="card-header">

        <strong>

            <i class="fas fa-graduation-cap"></i>

            Academic Interpretation

        </strong>

    </div>


    <div class="card-body">

        <p class="text-muted">

            The K-Means algorithm identifies groups of employees based
            on similarity rather than predefined performance labels.
            Therefore, the resulting clusters should be interpreted
            by examining their feature characteristics rather than
            assuming that a particular cluster represents "good" or
            "bad" employees.

        </p>


        <div class="row g-3">


            <div class="col-md-4">

                <div class="academic-point">

                    <i class="fas fa-search"></i>

                    <strong>

                        Discover Patterns

                    </strong>

                    <p>

                        Identify naturally occurring groups within the
                        employee dataset.

                    </p>

                </div>

            </div>



            <div class="col-md-4">

                <div class="academic-point">

                    <i class="fas fa-users-cog"></i>

                    <strong>

                        Compare Groups

                    </strong>

                    <p>

                        Examine how employee groups differ in attendance,
                        working hours and salary.

                    </p>

                </div>

            </div>



            <div class="col-md-4">

                <div class="academic-point">

                    <i class="fas fa-chart-area"></i>

                    <strong>

                        Support Decisions

                    </strong>

                    <p>

                        Use discovered patterns as supporting information
                        for workforce analysis and management decisions.

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>


@endif

</div>



{{-- ================================================================
    STYLING
================================================================ --}}

<style>


/*
|--------------------------------------------------------------------------
| Configuration
|--------------------------------------------------------------------------
*/

.configuration-card {

    border: none;

    border-radius: 14px;

    overflow: hidden;

}


.analyze-btn {

    min-height: 42px;

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease;

}


.analyze-btn:hover {

    transform: translateY(-2px);

    box-shadow:
        0 7px 18px rgba(25, 135, 84, 0.25);

}



/*
|--------------------------------------------------------------------------
| Tooltip
|--------------------------------------------------------------------------
*/

.stat-help {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    margin-left: 3px;

    color: #6c757d;

    cursor: help;

    font-size: 12px;

    transition:
        color 0.2s ease,
        transform 0.2s ease;

}


.stat-help:hover {

    color: #0d6efd;

    transform: scale(1.15);

}



/*
|--------------------------------------------------------------------------
| Methodology
|--------------------------------------------------------------------------
*/

.methodology-card {

    border-left: 4px solid #0d6efd;

}


.methodology-icon {

    width: 48px;

    height: 48px;

    min-width: 48px;

    border-radius: 12px;

    background: #e7f1ff;

    color: #0d6efd;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 20px;

}


.method-step {

    height: 100%;

    padding: 14px;

    border: 1px solid #e9ecef;

    border-radius: 12px;

    background: #f8f9fa;

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease;

}


.method-step:hover {

    transform: translateY(-3px);

    box-shadow:
        0 7px 18px rgba(0, 0, 0, 0.06);

}


.step-number {

    width: 28px;

    height: 28px;

    border-radius: 50%;

    background: #0d6efd;

    color: white;

    display: flex;

    align-items: center;

    justify-content: center;

    font-weight: 700;

    font-size: 12px;

    margin-bottom: 8px;

}


.method-step strong {

    display: block;

    font-size: 13px;

}


.method-step p {

    margin: 5px 0 0;

    font-size: 11px;

    line-height: 1.5;

    color: #6c757d;

}



/*
|--------------------------------------------------------------------------
| Features
|--------------------------------------------------------------------------
*/

.feature-card {

    border-radius: 14px;

}


.feature-box {

    display: flex;

    align-items: center;

    gap: 12px;

    padding: 14px;

    border: 1px solid #e9ecef;

    border-radius: 12px;

    background: #ffffff;

    cursor: help;

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease;

}


.feature-box:hover {

    transform: translateY(-3px);

    box-shadow:
        0 7px 18px rgba(0, 0, 0, 0.06);

}


.feature-icon {

    width: 42px;

    height: 42px;

    min-width: 42px;

    border-radius: 10px;

    display: flex;

    align-items: center;

    justify-content: center;

}


.attendance-icon {

    background: #e7f1ff;

    color: #0d6efd;

}


.hours-icon {

    background: #e8f7ee;

    color: #198754;

}


.salary-icon {

    background: #f1eaff;

    color: #6f42c1;

}



/*
|--------------------------------------------------------------------------
| Summary Cards
|--------------------------------------------------------------------------
*/

.summary-card {

    border: none;

    border-radius: 14px;

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease;

}


.summary-card:hover {

    transform: translateY(-4px);

    box-shadow:
        0 12px 28px rgba(0, 0, 0, 0.10) !important;

}


.summary-icon {

    width: 48px;

    height: 48px;

    border-radius: 12px;

    display: flex;

    align-items: center;

    justify-content: center;

    color: white;

    font-size: 20px;

}


.summary-label {

    font-size: 13px;

    color: #6c757d;

    font-weight: 600;

}



/*
|--------------------------------------------------------------------------
| Interpretation
|--------------------------------------------------------------------------
*/

.interpretation-card {

    border-left: 4px solid #212529;

}


.interpretation-icon {

    width: 46px;

    height: 46px;

    min-width: 46px;

    border-radius: 12px;

    background: #f1f3f5;

    color: #212529;

    display: flex;

    align-items: center;

    justify-content: center;

    font-size: 19px;

}


.interpretation-box {

    height: 100%;

    padding: 14px;

    border: 1px solid #e9ecef;

    border-radius: 11px;

    background: #f8f9fa;

}


.interpretation-box strong {

    font-size: 13px;

}


.interpretation-box p {

    margin-top: 6px;

    font-size: 12px;

    color: #6c757d;

    line-height: 1.6;

}



/*
|--------------------------------------------------------------------------
| Cluster Cards
|--------------------------------------------------------------------------
*/

.cluster-card {

    background: #ffffff;

    border: 1px solid #e5e7eb;

    border-radius: 16px;

    overflow: hidden;

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease;

}


.cluster-card:hover {

    transform: translateY(-4px);

    box-shadow:
        0 12px 28px rgba(0, 0, 0, 0.10);

}



/*
|--------------------------------------------------------------------------
| Cluster Header
|--------------------------------------------------------------------------
*/

.cluster-card-header {

    display: flex;

    justify-content: space-between;

    align-items: center;

    padding: 18px;

    background: #f8f9fa;

    border-bottom: 1px solid #e5e7eb;

}


.cluster-number {

    font-size: 11px;

    font-weight: 700;

    letter-spacing: 0.8px;

    color: #6c757d;

    margin-bottom: 3px;

}


.cluster-count {

    width: 50px;

    height: 50px;

    border-radius: 50%;

    background: #0d6efd;

    color: #ffffff;

    display: flex;

    flex-direction: column;

    justify-content: center;

    align-items: center;

    font-size: 18px;

    font-weight: 700;

    line-height: 1;

    cursor: help;

    transition:
        transform 0.2s ease;

}


.cluster-count:hover {

    transform: scale(1.08);

}


.cluster-count small {

    font-size: 8px;

    font-weight: 400;

    margin-top: 3px;

}



/*
|--------------------------------------------------------------------------
| Cluster Description
|--------------------------------------------------------------------------
*/

.cluster-description {

    padding: 10px 14px;

    background: #fafafa;

    border-bottom: 1px solid #edf0f2;

    color: #6c757d;

    font-size: 11px;

    line-height: 1.5;

}


.cluster-description i {

    margin-right: 4px;

    color: #0d6efd;

}



/*
|--------------------------------------------------------------------------
| Employee Pieces
|--------------------------------------------------------------------------
*/

.cluster-body {

    padding: 14px;

    background: #ffffff;

}


.employee-piece {

    position: relative;

    display: flex;

    align-items: center;

    gap: 12px;

    padding: 12px;

    margin-bottom: 9px;

    background: #f8f9fa;

    border: 1px solid #edf0f2;

    border-radius: 11px;

    cursor: help;

    transition:
        transform 0.15s ease,
        box-shadow 0.15s ease,
        background 0.15s ease;

}


.employee-piece:last-child {

    margin-bottom: 0;

}


.employee-piece:hover {

    background: #f1f5f9;

    border-color: #d8dee5;

    transform: translateX(4px);

    box-shadow:
        0 5px 14px rgba(0, 0, 0, 0.06);

}



/*
|--------------------------------------------------------------------------
| Employee Avatar
|--------------------------------------------------------------------------
*/

.employee-avatar {

    width: 38px;

    height: 38px;

    min-width: 38px;

    border-radius: 10px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #e7f1ff;

    color: #0d6efd;

    transition:
        transform 0.2s ease;

}


.employee-piece:hover .employee-avatar {

    transform: scale(1.08);

}



/*
|--------------------------------------------------------------------------
| Employee Information
|--------------------------------------------------------------------------
*/

.employee-details {

    min-width: 0;

}


.employee-name {

    font-size: 14px;

    font-weight: 600;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;

}


.employee-metrics {

    display: flex;

    gap: 12px;

    margin-top: 3px;

    color: #6c757d;

    font-size: 11px;

}


.employee-metrics span {

    white-space: nowrap;

    cursor: help;

}


.employee-metrics i {

    margin-right: 3px;

}



/*
|--------------------------------------------------------------------------
| Pie Chart
|--------------------------------------------------------------------------
*/

.chart-container {

    position: relative;

    height: 320px;

    max-width: 420px;

    margin: auto;

}



/*
|--------------------------------------------------------------------------
| Distribution
|--------------------------------------------------------------------------
*/

.distribution-list {

    border: 1px solid #e5e7eb;

    border-radius: 12px;

    overflow: hidden;

}


.distribution-item {

    display: flex;

    justify-content: space-between;

    align-items: center;

    padding: 14px 16px;

    border-bottom: 1px solid #e5e7eb;

    cursor: help;

    transition:
        background 0.15s ease,
        padding-left 0.15s ease;

}


.distribution-item:last-child {

    border-bottom: none;

}


.distribution-item:hover {

    background: #f8f9fa;

    padding-left: 20px;

}



/*
|--------------------------------------------------------------------------
| Academic Section
|--------------------------------------------------------------------------
*/

.academic-card {

    border-left: 4px solid #6f42c1;

}


.academic-point {

    height: 100%;

    padding: 15px;

    border: 1px solid #e9ecef;

    border-radius: 11px;

    background: #f8f9fa;

    transition:
        transform 0.2s ease,
        box-shadow 0.2s ease;

}


.academic-point:hover {

    transform: translateY(-3px);

    box-shadow:
        0 7px 18px rgba(0, 0, 0, 0.06);

}


.academic-point > i {

    display: block;

    font-size: 20px;

    color: #6f42c1;

    margin-bottom: 8px;

}


.academic-point strong {

    font-size: 13px;

}


.academic-point p {

    margin: 5px 0 0;

    font-size: 11px;

    line-height: 1.5;

    color: #6c757d;

}

</style>



{{-- ================================================================
    CHART + TOOLTIPS
================================================================ --}}

@if(isset($clusters))

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>


/*
|--------------------------------------------------------------------------
| Bootstrap Tooltips
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', function () {

    const tooltipTriggerList =
        document.querySelectorAll(
            '[data-bs-toggle="tooltip"]'
        );


    tooltipTriggerList.forEach(function (tooltipTriggerEl) {

        new bootstrap.Tooltip(
            tooltipTriggerEl
        );

    });

});



/*
|--------------------------------------------------------------------------
| Cluster Labels
|--------------------------------------------------------------------------
*/

const clusterLabels = [

    @foreach($clusters as $cluster => $employees)

        @json(
            $clusterNames[$cluster]
            ?? 'Cluster ' . $loop->iteration
        ),

    @endforeach

];



/*
|--------------------------------------------------------------------------
| Cluster Counts
|--------------------------------------------------------------------------
*/

const clusterCounts = [

    @foreach($clusters as $cluster => $employees)

        {{ count($employees) }},

    @endforeach

];



/*
|--------------------------------------------------------------------------
| Cluster Distribution Chart
|--------------------------------------------------------------------------
*/

const chartElement =
    document.getElementById(
        'clusterDistribution'
    );


if (chartElement) {

    new Chart(
        chartElement,
        {

            type: 'pie',


            data: {

                labels: clusterLabels,


                datasets: [{

                    data: clusterCounts,

                    borderWidth: 2

                }]

            },


            options: {

                responsive: true,

                maintainAspectRatio: false,


                plugins: {

                    legend: {

                        position: 'bottom'

                    },


                    tooltip: {

                        callbacks: {

                            label: function(context) {

                                const total =
                                    context.dataset.data
                                        .reduce(
                                            (sum, value) =>
                                                sum + value,
                                            0
                                        );


                                const value =
                                    context.raw;


                                const percentage =
                                    total > 0
                                        ? (
                                            (value / total) * 100
                                        ).toFixed(1)
                                        : 0;


                                return (

                                    context.label +

                                    ': ' +

                                    value +

                                    ' employees (' +

                                    percentage +

                                    '%)'

                                );

                            }

                        }

                    }

                }

            }

        }

    );

}

</script>

@endif

@endsection
