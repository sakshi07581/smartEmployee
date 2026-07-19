@extends('admin.master')

@section('content')

<div class="container py-4">

    <div class="card shadow-sm">

        <div class="card-header">
            <h4 class="mb-0">
                <i class="fas fa-project-diagram"></i>
                K-Means Employee Clustering
            </h4>
        </div>

        <div class="card-body">

            <form id="clusterForm" class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">Month</label>

                    <input
                        type="month"
                        id="month"
                        class="form-control"
                        value="2026-07">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Clusters (K)</label>

                    <input
                        type="number"
                        id="k"
                        class="form-control"
                        value="3"
                        min="2"
                        max="10">
                </div>

                <div class="col-md-5 d-flex align-items-end">

                    <button class="btn btn-success w-100">
                        Generate Clusters
                    </button>

                </div>

            </form>

        </div>

    </div>

    <div class="card mt-4 shadow-sm">

        <div class="card-header d-flex justify-content-between">

            <strong>Cluster Result</strong>

            <span>
                <strong>Inertia:</strong>
                <span id="inertia">-</span>
            </span>

        </div>

        <div class="card-body">

            <div id="clusterContainer">

                <div class="text-center text-muted py-4">
                    Click <strong>Generate Clusters</strong>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection


@push('scripts')

<script>

$('#clusterForm').submit(function(e){

    e.preventDefault();

    $.get('/reports/clusters/data',{

        month:$('#month').val(),
        k:$('#k').val()

    },function(response){

        $('#inertia').text(response.inertia);

        let html='';

        if(Object.keys(response.clusters).length===0){

            html=`
                <div class="alert alert-warning text-center">
                    No clustering data found.
                </div>
            `;

        }else{

            $.each(response.clusters,function(cluster,employees){

                html+=`

                <div class="card mb-4">

                    <div class="card-header bg-primary text-white">

                        <strong>Cluster ${parseInt(cluster)+1}</strong>

                    </div>

                    <div class="card-body p-0">

                        <table class="table table-bordered table-hover mb-0">

                            <thead class="table-light">

                                <tr>
                                    <th width="80">ID</th>
                                    <th>Employee</th>
                                    <th>Working Hours</th>
                                    <th>Salary</th>
                                    <th>Deduction</th>
                                </tr>

                            </thead>

                            <tbody>

                `;

                employees.forEach(function(emp){

                    html+=`

                        <tr>

                            <td>${emp.id}</td>

                            <td>${emp.name}</td>

                            <td>${emp.features.working_hours}</td>

                            <td>${emp.features.salary}</td>

                            <td>${emp.features.deduction}</td>

                        </tr>

                    `;

                });

                html+=`

                            </tbody>

                        </table>

                    </div>

                </div>

                `;

            });

        }

        $('#clusterContainer').html(html);

    });

});

</script>

@endpush
