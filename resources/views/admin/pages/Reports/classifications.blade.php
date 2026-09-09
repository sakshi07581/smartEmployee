@extends('admin.master')

@section('content')

<div class="container-fluid py-4">

    {{-- ============================================================
        PAGE HEADER
    ============================================================= --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">

        <div>
            <div class="d-flex align-items-center gap-2 mb-2">

                <div class="page-icon">
                    <i class="fas fa-user-tie"></i>
                </div>

                <div>
                    <h2 class="fw-bold mb-0">
                        Employee Salary Grade Prediction
                    </h2>

                    <p class="text-muted mb-0">
                        K-Nearest Neighbors based salary grade recommendation
                    </p>
                </div>

            </div>
        </div>

        <div class="method-badge">
            <i class="fas fa-brain me-1"></i>
            KNN Classification
        </div>

    </div>


    {{-- ============================================================
        PURPOSE / INTRODUCTION
    ============================================================= --}}
    <div class="card analysis-card mb-4">

        <div class="card-body p-4">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <span class="section-label">
                        SALARY GRADE ANALYSIS
                    </span>

                    <h4 class="fw-bold mt-2 mb-3">
                        Determine the most suitable salary grade
                    </h4>

                    <p class="text-muted mb-2">
                        This analysis uses the
                        <strong>K-Nearest Neighbors (KNN)</strong>
                        algorithm to recommend a salary grade for an employee
                        based on similarities with existing employees.
                    </p>

                    <p class="text-muted mb-0">
                        The model compares the selected employee using
                        <strong>attendance rate</strong>,
                        <strong>average working hours</strong>, and
                        <strong>salary</strong>. Employees with similar
                        characteristics are identified and their salary grades
                        are used to determine the recommended grade.
                    </p>

                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">

                    <div class="objective-box">

                        <div class="objective-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>

                        <div>

                            <small class="text-muted text-uppercase">
                                Prediction Objective
                            </small>

                            <h6 class="fw-bold mb-0 mt-1">
                                Recommend the appropriate salary grade
                            </h6>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ============================================================
        CONFIGURATION
    ============================================================= --}}
    <div class="card analysis-card mb-4">

        <div class="card-header bg-white border-0 p-4 pb-2">

            <div class="d-flex align-items-center">

                <div class="header-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

                <div>

                    <h5 class="fw-bold mb-1">
                        Prediction Configuration
                    </h5>

                    <small class="text-muted">
                        Select an employee and prediction parameters.
                    </small>

                </div>

            </div>

        </div>

        <div class="card-body p-4">

            <form
                method="GET"
                action="{{ route('reports.classifications') }}"
            >

                <div class="row g-4">

                    {{-- Employee --}}
                    <div class="col-lg-5">

                        <label class="form-label fw-semibold">

                            Employee

                            <span
                                class="info-icon"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Select the employee whose most suitable salary grade will be predicted."
                            >
                                <i class="fas fa-question-circle"></i>
                            </span>

                        </label>

                        <select
                            class="form-select form-select-lg"
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
                                    {{ $emp->employee_id ?? '' }}
                                    {{ $emp->employee_id ? ' - ' : '' }}
                                    {{ $emp->name }}
                                </option>

                            @endforeach

                        </select>

                        <small class="text-muted">
                            The selected employee will be classified into
                            the most suitable salary grade.
                        </small>

                    </div>


                    {{-- Month --}}
                    <div class="col-lg-3">

                        <label class="form-label fw-semibold">

                            Analysis Month

                            <span
                                class="info-icon"
                                data-bs-toggle="tooltip"
                                title="Attendance and average working hours are calculated from attendance records for this month."
                            >
                                <i class="fas fa-question-circle"></i>
                            </span>

                        </label>

                        <input
                            type="month"
                            class="form-control form-control-lg"
                            name="month"
                            value="{{ request('month', now()->format('Y-m')) }}"
                            required
                        >

                        <small class="text-muted">
                            Performance metrics are calculated for this period.
                        </small>

                    </div>


                    {{-- K --}}
                    <div class="col-lg-2">

                        <label class="form-label fw-semibold">

                            K Value

                            <span
                                class="info-icon"
                                data-bs-toggle="tooltip"
                                title="K represents the number of most similar employees considered when recommending the salary grade."
                            >
                                <i class="fas fa-question-circle"></i>
                            </span>

                        </label>

                        <input
                            type="number"
                            class="form-control form-control-lg"
                            name="k"
                            value="{{ request('k', 3) }}"
                            min="1"
                            max="10"
                            required
                        >

                        <small class="text-muted">
                            Recommended: 3
                        </small>

                    </div>


                    {{-- Submit --}}
                    <div class="col-lg-2 d-flex align-items-end">

                        <button
                            type="submit"
                            class="btn btn-primary btn-lg w-100"
                        >
                            <i class="fas fa-brain me-2"></i>
                            Predict Grade
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- ============================================================
        HOW THE MODEL WORKS
    ============================================================= --}}
    <div class="card analysis-card mb-4">

        <div class="card-header bg-white border-0 p-4">

            <div class="d-flex align-items-center">

                <div class="header-icon">
                    <i class="fas fa-cogs"></i>
                </div>

                <div>

                    <h5 class="fw-bold mb-1">
                        How the Salary Grade Prediction Works
                    </h5>

                    <small class="text-muted">
                        The four stages used by the KNN classification process.
                    </small>

                </div>

            </div>

        </div>

        <div class="card-body px-4 pb-4">

            <div class="row g-3">

                {{-- Step 1 --}}
                <div class="col-lg-3 col-md-6">

                    <div class="process-card">

                        <div class="step-number">
                            1
                        </div>

                        <div class="process-icon">
                            <i class="fas fa-user"></i>
                        </div>

                        <h6 class="fw-bold">
                            Select Employee
                        </h6>

                        <p class="small text-muted mb-0">
                            The system selects an employee whose
                            appropriate salary grade needs to be determined.
                        </p>

                    </div>

                </div>


                {{-- Step 2 --}}
                <div class="col-lg-3 col-md-6">

                    <div class="process-card">

                        <div class="step-number">
                            2
                        </div>

                        <div class="process-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>

                        <h6 class="fw-bold">
                            Calculate Features
                        </h6>

                        <p class="small text-muted mb-0">
                            Attendance rate, average working hours,
                            and salary are calculated for the employee.
                        </p>

                    </div>

                </div>


                {{-- Step 3 --}}
                <div class="col-lg-3 col-md-6">

                    <div class="process-card">

                        <div class="step-number">
                            3
                        </div>

                        <div class="process-icon">
                            <i class="fas fa-users"></i>
                        </div>

                        <h6 class="fw-bold">
                            Find Similar Employees
                        </h6>

                        <p class="small text-muted mb-0">
                            Euclidean distance is used to identify
                            the K most similar employees.
                        </p>

                    </div>

                </div>


                {{-- Step 4 --}}
                <div class="col-lg-3 col-md-6">

                    <div class="process-card">

                        <div class="step-number">
                            4
                        </div>

                        <div class="process-icon">
                            <i class="fas fa-award"></i>
                        </div>

                        <h6 class="fw-bold">
                            Recommend Grade
                        </h6>

                        <p class="small text-muted mb-0">
                            The salary grade receiving the majority
                            vote becomes the recommended grade.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ============================================================
        FEATURES
    ============================================================= --}}
    <div class="card analysis-card mb-4">

        <div class="card-header bg-white border-0 p-4">

            <div class="d-flex align-items-center">

                <div class="header-icon">
                    <i class="fas fa-database"></i>
                </div>

                <div>

                    <h5 class="fw-bold mb-1">
                        Prediction Features
                    </h5>

                    <small class="text-muted">
                        Employee characteristics used by the model.
                    </small>

                </div>

            </div>

        </div>

        <div class="card-body p-4">

            <div class="row g-4">

                {{-- Attendance --}}
                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="feature-icon attendance-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>

                        <div>

                            <h6 class="fw-bold">
                                Attendance Rate
                            </h6>

                            <p class="text-muted small mb-2">
                                Measures how consistently the employee
                                attends work during the selected month.
                            </p>

                            <div class="formula">
                                Present Days ÷ Working Days × 100
                            </div>

                        </div>

                    </div>

                </div>


                {{-- Hours --}}
                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="feature-icon hours-icon">
                            <i class="fas fa-clock"></i>
                        </div>

                        <div>

                            <h6 class="fw-bold">
                                Average Working Hours
                            </h6>

                            <p class="text-muted small mb-2">
                                Represents the employee's average
                                daily working duration.
                            </p>

                            <div class="formula">
                                Average Minutes ÷ 60
                            </div>

                        </div>

                    </div>

                </div>


                {{-- Salary --}}
                <div class="col-md-4">

                    <div class="feature-card">

                        <div class="feature-icon salary-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>

                        <div>

                            <h6 class="fw-bold">
                                Salary
                            </h6>

                            <p class="text-muted small mb-2">
                                Represents the employee's existing
                                compensation level.
                            </p>

                            <div class="formula">
                                Basic Salary
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ============================================================
        NORMALIZATION EXPLANATION
    ============================================================= --}}
    <div class="card analysis-card mb-4">

        <div class="card-body p-4">

            <div class="row align-items-center">

                <div class="col-lg-2">

                    <div class="normalization-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>

                </div>

                <div class="col-lg-10">

                    <span class="section-label">
                        DATA PREPROCESSING
                    </span>

                    <h5 class="fw-bold mt-1">
                        Min-Max Normalization
                    </h5>

                    <p class="text-muted">
                        Before calculating similarity, the model normalizes
                        the employee features so that variables with larger
                        numerical values do not dominate the Euclidean
                        distance calculation.
                    </p>

                    <div class="formula-large">

                        x' =
                        <span class="fraction">
                            <span>x − x<sub>min</sub></span>
                            <span>x<sub>max</sub> − x<sub>min</sub></span>
                        </span>

                    </div>

                    <div class="alert alert-light border mb-0">

                        <i class="fas fa-info-circle text-primary me-1"></i>

                        <strong>Why is this important?</strong>

                        Salary may contain values in tens of thousands,
                        while attendance and working hours have much smaller
                        numerical ranges. Normalization places these features
                        on a comparable scale before distance calculation.

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ============================================================
        RESULT
    ============================================================= --}}
    @if ($employee)

        <div class="card result-card mb-4">

            {{-- Result Header --}}
            <div class="result-header">

                <div>

                    <small>
                        KNN SALARY GRADE RECOMMENDATION
                    </small>

                    <h3 class="fw-bold mb-0 mt-1">
                        Prediction Result
                    </h3>

                </div>

                <div class="result-icon">
                    <i class="fas fa-check"></i>
                </div>

            </div>


            <div class="card-body p-4">

                <div class="row g-4 align-items-center">

                    {{-- Employee --}}
                    <div class="col-lg-6">

                        <div class="employee-profile">

                            <div class="employee-avatar">

                                {{ strtoupper(
                                    substr($employee->name ?? 'E', 0, 1)
                                ) }}

                            </div>

                            <div>

                                <small class="text-muted text-uppercase">
                                    Target Employee
                                </small>

                                <h4 class="fw-bold mb-1">
                                    {{ $employee->name }}
                                </h4>

                                @if($employee->employee_id)

                                    <span class="employee-code">
                                        {{ $employee->employee_id }}
                                    </span>

                                @endif

                            </div>

                        </div>

                    </div>


                    {{-- Prediction --}}
                    <div class="col-lg-6">

                        @if ($predicted_label)

                            <div class="prediction-result">

                                <div class="prediction-heading">

                                    <span>
                                        Recommended Salary Grade
                                    </span>

                                    <span
                                        class="info-icon"
                                        data-bs-toggle="tooltip"
                                        title="The recommended grade is the salary grade receiving the majority vote among the selected employee's K nearest neighbors."
                                    >
                                        <i class="fas fa-question-circle"></i>
                                    </span>

                                </div>


                                <div class="salary-grade">

                                    {{ $predicted_label->salary_class }}

                                </div>


                                <div class="recommendation-text">

                                    <i class="fas fa-brain me-1"></i>

                                    Based on similarity with existing employees

                                </div>

                            </div>

                        @else

                            <div class="alert alert-warning mb-0">

                                <i class="fas fa-exclamation-triangle me-2"></i>

                                Unable to determine a recommended salary grade
                                for this employee using the available data.

                            </div>

                        @endif

                    </div>

                </div>


                @if ($predicted_label)

                    <hr class="my-4">


                    {{-- Salary information --}}
                    <div class="row g-3">

                        <div class="col-md-4">

                            <div class="result-stat">

                                <span>
                                    Recommended Grade
                                </span>

                                <strong>
                                    {{ $predicted_label->salary_class }}
                                </strong>

                            </div>

                        </div>


                        <div class="col-md-4">

                            <div class="result-stat">

                                <span>
                                    Basic Salary
                                </span>

                                <strong>
                                    Rs.
                                    {{ number_format(
                                        $predicted_label->basic_salary,
                                        2
                                    ) }}
                                </strong>

                            </div>

                        </div>


                        <div class="col-md-4">

                            <div class="result-stat">

                                <span>
                                    Total Salary
                                </span>

                                <strong>
                                    Rs.
                                    {{ number_format(
                                        $predicted_label->total_salary,
                                        2
                                    ) }}
                                </strong>

                            </div>

                        </div>

                    </div>

                @endif

            </div>

        </div>


        {{-- ============================================================
            WHAT THE RESULT MEANS
        ============================================================= --}}
        @if ($predicted_label)

            <div class="card analysis-card mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <div class="d-flex align-items-center">

                        <div class="header-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                What This Prediction Means
                            </h5>

                            <small class="text-muted">
                                Interpretation of the KNN classification.
                            </small>

                        </div>

                    </div>

                </div>


                <div class="card-body p-4">

                    <div class="interpretation-box">

                        <div class="interpretation-icon">
                            <i class="fas fa-user-check"></i>
                        </div>

                        <div>

                            <h6 class="fw-bold">
                                Salary Grade Recommendation
                            </h6>

                            <p class="text-muted mb-0">

                                Based on the selected employee's attendance
                                rate, average working hours, and salary,
                                the KNN algorithm identifies employees with
                                similar characteristics.

                                The salary grade that occurs most frequently
                                among those similar employees is recommended
                                as the employee's predicted salary grade.

                            </p>

                        </div>

                    </div>


                    <div class="row g-3 mt-3">

                        <div class="col-md-4">

                            <div class="meaning-card">

                                <i class="fas fa-user-friends"></i>

                                <strong>
                                    Similar Employees
                                </strong>

                                <small>
                                    Existing employees provide the reference
                                    examples for classification.
                                </small>

                            </div>

                        </div>


                        <div class="col-md-4">

                            <div class="meaning-card">

                                <i class="fas fa-ruler-combined"></i>

                                <strong>
                                    Distance
                                </strong>

                                <small>
                                    Smaller Euclidean distance indicates
                                    greater similarity.
                                </small>

                            </div>

                        </div>


                        <div class="col-md-4">

                            <div class="meaning-card">

                                <i class="fas fa-vote-yea"></i>

                                <strong>
                                    Majority Vote
                                </strong>

                                <small>
                                    The most common salary grade among the
                                    neighbors becomes the recommendation.
                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================================================
                MATHEMATICAL EXPLANATION
            ========================================================= --}}
            <div class="card analysis-card mb-4">

                <div class="card-header bg-white border-0 p-4">

                    <div class="d-flex align-items-center">

                        <div class="header-icon">
                            <i class="fas fa-square-root-alt"></i>
                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                KNN Mathematical Basis
                            </h5>

                            <small class="text-muted">
                                Distance calculation used for employee similarity.
                            </small>

                        </div>

                    </div>

                </div>


                <div class="card-body p-4">

                    <div class="distance-box">

                        <h6 class="fw-bold">
                            Euclidean Distance
                        </h6>

                        <p class="text-muted small">
                            After normalization, the distance between two
                            employees is calculated using their feature values.
                        </p>

                        <div class="euclidean-formula">

                            d =
                            √[
                            (A<sub>1</sub> − A<sub>2</sub>)² +
                            (H<sub>1</sub> − H<sub>2</sub>)² +
                            (S<sub>1</sub> − S<sub>2</sub>)²
                            ]

                        </div>

                        <p class="text-muted small mb-0">

                            Where <strong>A</strong> represents attendance,
                            <strong>H</strong> represents working hours,
                            and <strong>S</strong> represents salary.

                            A smaller distance means that two employees
                            have more similar characteristics.

                        </p>

                    </div>

                </div>

            </div>


            {{-- ========================================================
                ACADEMIC INTERPRETATION
            ========================================================= --}}
            <div class="card academic-card mb-4">

                <div class="card-body p-4">

                    <div class="row">

                        <div class="col-lg-1 text-center">

                            <div class="academic-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>

                        </div>

                        <div class="col-lg-11">

                            <span class="section-label">
                                ACADEMIC INTERPRETATION
                            </span>

                            <h5 class="fw-bold mt-2">
                                Why KNN is used for salary grade prediction
                            </h5>

                            <p class="text-muted">

                                The salary grade prediction problem is treated
                                as a supervised classification problem because
                                existing employees already have known salary
                                grade labels.

                                KNN uses these labelled employee records as
                                reference examples and determines the most
                                suitable class for the selected employee based
                                on feature similarity.

                            </p>

                            <div class="academic-points">

                                <div>
                                    <i class="fas fa-check-circle"></i>
                                    Salary grade is treated as the classification label.
                                </div>

                                <div>
                                    <i class="fas fa-check-circle"></i>
                                    Employee performance characteristics are used as input features.
                                </div>

                                <div>
                                    <i class="fas fa-check-circle"></i>
                                    Min-Max normalization prevents feature-scale dominance.
                                </div>

                                <div>
                                    <i class="fas fa-check-circle"></i>
                                    Euclidean distance determines employee similarity.
                                </div>

                                <div>
                                    <i class="fas fa-check-circle"></i>
                                    Majority voting determines the final predicted grade.
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ========================================================
                IMPORTANT LIMITATIONS
            ========================================================= --}}
            <div class="card limitation-card mb-4">

                <div class="card-body p-4">

                    <div class="d-flex align-items-start gap-3">

                        <div class="limitation-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>

                        <div>

                            <span class="section-label warning">
                                MODEL LIMITATIONS
                            </span>

                            <h5 class="fw-bold mt-2">
                                Important considerations
                            </h5>

                            <ul class="text-muted mb-0">

                                <li>
                                    The prediction depends on the selected
                                    <strong>K value</strong>.
                                </li>

                                <li>
                                    KNN requires appropriate feature scaling
                                    because it relies on distance calculations.
                                </li>

                                <li>
                                    The quality of the prediction depends on
                                    the number and quality of existing employee
                                    records.
                                </li>

                                <li>
                                    Salary is included as an input feature and
                                    is directly associated with salary grade,
                                    so it can strongly influence the result.
                                </li>

                                <li>
                                    The prediction should be treated as a
                                    <strong>data-driven recommendation</strong>,
                                    rather than an automatic HR decision.
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        @endif

    @endif

</div>


{{-- ================================================================
    CSS
================================================================ --}}
<style>

    .analysis-card,
    .academic-card,
    .limitation-card,
    .result-card {

        border: 0;
        border-radius: 18px;

        box-shadow:
            0 8px 30px rgba(0, 0, 0, 0.06);

    }


    /* PAGE HEADER */

    .page-icon {

        width: 50px;
        height: 50px;

        border-radius: 14px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #eef4ff;
        color: #2563eb;

        font-size: 21px;

    }


    .method-badge {

        padding: 9px 15px;

        border-radius: 50px;

        background: #eef4ff;
        color: #2563eb;

        font-size: 13px;
        font-weight: 700;

    }


    .section-label {

        font-size: 11px;
        font-weight: 800;

        letter-spacing: 1px;

        color: #2563eb;

    }


    .section-label.warning {

        color: #b7791f;

    }


    .header-icon {

        width: 42px;
        height: 42px;

        border-radius: 12px;

        background: #f1f5f9;
        color: #475569;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-right: 13px;

    }


    .info-icon {

        color: #94a3b8;

        cursor: help;

        margin-left: 4px;

    }


    .info-icon:hover {

        color: #2563eb;

    }


    /* OBJECTIVE */

    .objective-box {

        display: flex;
        align-items: center;

        gap: 15px;

        padding: 20px;

        border-radius: 14px;

        background: #f8fafc;

        border: 1px solid #e2e8f0;

    }


    .objective-icon {

        width: 46px;
        height: 46px;

        flex-shrink: 0;

        border-radius: 12px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #dbeafe;
        color: #2563eb;

    }


    /* PROCESS */

    .process-card {

        position: relative;

        height: 100%;

        padding: 23px 20px;

        border-radius: 15px;

        border: 1px solid #e5e7eb;

        background: #fff;

        transition: all .25s ease;

    }


    .process-card:hover {

        transform: translateY(-4px);

        box-shadow:
            0 12px 25px rgba(0, 0, 0, .08);

    }


    .step-number {

        position: absolute;

        top: 13px;
        right: 14px;

        width: 28px;
        height: 28px;

        border-radius: 50%;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #f1f5f9;

        color: #64748b;

        font-size: 12px;
        font-weight: 800;

    }


    .process-icon {

        width: 48px;
        height: 48px;

        margin-bottom: 15px;

        border-radius: 13px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #eef4ff;
        color: #2563eb;

        font-size: 19px;

    }


    /* FEATURES */

    .feature-card {

        display: flex;

        gap: 15px;

        height: 100%;

        padding: 20px;

        border-radius: 15px;

        background: #f8fafc;

        border: 1px solid #e2e8f0;

        transition: all .25s ease;

    }


    .feature-card:hover {

        transform: translateY(-3px);

        box-shadow:
            0 10px 25px rgba(0, 0, 0, .06);

    }


    .feature-icon {

        width: 45px;
        height: 45px;

        flex-shrink: 0;

        border-radius: 12px;

        display: flex;
        align-items: center;
        justify-content: center;

    }


    .attendance-icon {

        background: #e8f7ef;
        color: #198754;

    }


    .hours-icon {

        background: #fff4e5;
        color: #d97706;

    }


    .salary-icon {

        background: #eeeaff;
        color: #6d28d9;

    }


    .formula {

        display: inline-block;

        padding: 6px 9px;

        border-radius: 7px;

        background: #fff;

        border: 1px solid #e2e8f0;

        color: #64748b;

        font-size: 11px;

    }


    /* NORMALIZATION */

    .normalization-icon {

        width: 65px;
        height: 65px;

        margin: auto;

        border-radius: 18px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #eef4ff;
        color: #2563eb;

        font-size: 26px;

    }


    .formula-large {

        display: inline-block;

        padding: 15px 25px;

        margin: 5px 0 15px;

        border-radius: 10px;

        background: #f8fafc;

        border: 1px solid #e2e8f0;

        font-family: "Times New Roman", serif;

        font-size: 22px;

    }


    .fraction {

        display: inline-flex;

        flex-direction: column;

        text-align: center;

        vertical-align: middle;

        line-height: 1.1;

        margin: 0 5px;

    }


    .fraction span:first-child {

        border-bottom: 1px solid #334155;

        padding: 0 5px 3px;

    }


    .fraction span:last-child {

        padding-top: 3px;

    }


    /* RESULT */

    .result-card {

        overflow: hidden;

    }


    .result-header {

        padding: 23px 25px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        background: #2563eb;

        color: white;

    }


    .result-header small {

        font-size: 11px;

        letter-spacing: 1px;

        opacity: .85;

    }


    .result-icon {

        width: 48px;
        height: 48px;

        border-radius: 50%;

        display: flex;
        align-items: center;
        justify-content: center;

        background: rgba(255,255,255,.15);

        font-size: 20px;

    }


    .employee-profile {

        display: flex;

        align-items: center;

        gap: 15px;

    }


    .employee-avatar {

        width: 62px;
        height: 62px;

        border-radius: 17px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #eef4ff;
        color: #2563eb;

        font-size: 23px;
        font-weight: 800;

    }


    .employee-code {

        display: inline-block;

        padding: 4px 9px;

        border-radius: 6px;

        background: #f1f5f9;

        color: #64748b;

        font-size: 12px;

    }


    .prediction-result {

        padding: 24px;

        border-radius: 16px;

        background: #f8fafc;

        border: 1px solid #dbeafe;

    }


    .prediction-heading {

        display: flex;

        align-items: center;

        gap: 5px;

        color: #64748b;

        font-size: 12px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .6px;

    }


    .salary-grade {

        margin-top: 7px;

        color: #2563eb;

        font-size: 30px;

        font-weight: 900;

    }


    .recommendation-text {

        margin-top: 7px;

        color: #64748b;

        font-size: 12px;

    }


    .result-stat {

        padding: 18px;

        border-radius: 13px;

        background: #f8fafc;

        border: 1px solid #e2e8f0;

    }


    .result-stat span {

        display: block;

        color: #64748b;

        font-size: 12px;

        margin-bottom: 5px;

    }


    .result-stat strong {

        color: #1e293b;

        font-size: 18px;

    }


    /* INTERPRETATION */

    .interpretation-box {

        display: flex;

        gap: 15px;

        padding: 20px;

        border-radius: 14px;

        background: #eef4ff;

        border: 1px solid #dbeafe;

    }


    .interpretation-icon {

        width: 45px;
        height: 45px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 11px;

        background: #dbeafe;

        color: #2563eb;

    }


    .meaning-card {

        height: 100%;

        padding: 18px;

        border-radius: 13px;

        border: 1px solid #e5e7eb;

        display: flex;

        flex-direction: column;

        gap: 7px;

    }


    .meaning-card i {

        color: #2563eb;

        font-size: 19px;

    }


    .meaning-card strong {

        font-size: 14px;

    }


    .meaning-card small {

        color: #64748b;

        line-height: 1.5;

    }


    /* MATH */

    .distance-box {

        padding: 25px;

        border-radius: 15px;

        background: #f8fafc;

        border: 1px solid #e2e8f0;

    }


    .euclidean-formula {

        padding: 20px;

        margin: 15px 0;

        border-radius: 10px;

        text-align: center;

        background: #fff;

        border: 1px solid #e2e8f0;

        font-family: "Times New Roman", serif;

        font-size: 22px;

        color: #1e293b;

    }


    /* ACADEMIC */

    .academic-card {

        background: #f8fafc;

    }


    .academic-icon {

        width: 52px;
        height: 52px;

        border-radius: 14px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #dbeafe;

        color: #2563eb;

        font-size: 21px;

    }


    .academic-points > div {

        margin-bottom: 8px;

        color: #475569;

        font-size: 13px;

    }


    .academic-points i {

        margin-right: 7px;

        color: #198754;

    }


    /* LIMITATION */

    .limitation-card {

        background: #fffbeb;

        border: 1px solid #fef3c7;

    }


    .limitation-icon {

        width: 48px;
        height: 48px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background: #fef3c7;

        color: #b7791f;

    }


    .limitation-card li {

        margin-bottom: 8px;

    }


    /* RESPONSIVE */

    @media(max-width: 768px) {

        .salary-grade {

            font-size: 24px;

        }

        .formula-large,
        .euclidean-formula {

            font-size: 16px;

            overflow-x: auto;

        }

    }

</style>


{{-- ================================================================
    TOOLTIP INITIALIZATION
================================================================ --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    if (typeof bootstrap !== 'undefined') {

        document
            .querySelectorAll('[data-bs-toggle="tooltip"]')
            .forEach(function (element) {

                new bootstrap.Tooltip(element);

            });

    }

});

</script>

@endsection
