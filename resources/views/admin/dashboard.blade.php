@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')

@component('common-components.breadcrumb')
@slot('pagetitle') Admin @endslot
@slot('title') Dashboard @endslot
@endcomponent

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Blog Posts</p>
                        <h4 class="mb-2">{{ $totalBlogs }}</h4>
                        <p class="text-muted mb-0">
                            <span class="text-success fw-bold font-size-12">{{ $publishedBlogs }} Published</span>
                        </p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-success rounded-3">
                            <i class="ri-article-line font-size-24"></i>  
                        </span>
                    </div>
                </div>                                              
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Portfolio Items</p>
                        <h4 class="mb-2">{{ $totalPortfolio }}</h4>
                        <p class="text-muted mb-0">
                            <a href="{{ route('admin.portfolio.events.index') }}" class="text-muted">View All <i class="mdi mdi-arrow-right"></i></a>
                        </p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-info rounded-3">
                            <i class="ri-folder-image-line font-size-24"></i>  
                        </span>
                    </div>
                </div>                                              
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Team Members</p>
                        <h4 class="mb-2">{{ $totalTeamMembers }}</h4>
                        <p class="text-muted mb-0">
                            <a href="{{ route('admin.team-members.index') }}" class="text-muted">Manage Team <i class="mdi mdi-arrow-right"></i></a>
                        </p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-warning rounded-3">
                            <i class="ri-team-line font-size-24"></i>  
                        </span>
                    </div>
                </div>                                              
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="text-truncate font-size-14 mb-2">Testimonials</p>
                        <h4 class="mb-2">{{ $totalTestimonials }}</h4>
                        <p class="text-muted mb-0">
                            <a href="{{ route('admin.testimonials.index') }}" class="text-muted">View All <i class="mdi mdi-arrow-right"></i></a>
                        </p>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-primary rounded-3">
                            <i class="ri-star-line font-size-24"></i>  
                        </span>
                    </div>
                </div>                                              
            </div><!-- end cardbody -->
        </div><!-- end card -->
    </div><!-- end col -->
</div><!-- end row -->

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Content Overview (Last 6 Months)</h4>
            </div>
            <div class="card-body">
                <canvas id="lineChart" data-colors='["--bs-success-rgb, 0.2", "--bs-success", "--bs-info-rgb, 0.2", "--bs-info", "--bs-warning-rgb, 0.2", "--bs-warning"]' height="60"></canvas>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Recent Blog Posts</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentBlogs as $blog)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}">{{ Str::limit($blog->title, 50) }}</a>
                                </td>
                                <td><span class="badge bg-primary-subtle text-primary">{{ $blog->category->name ?? 'N/A' }}</span></td>
                                <td>
                                    @if($blog->status === 'published')
                                        <span class="badge bg-success-subtle text-success">Published</span>
                                    @else
                                        <span class="badge bg-warning-subtle text-warning">Draft</span>
                                    @endif
                                </td>
                                <td>{{ $blog->created_at->format('M d, Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No blog posts yet</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Blog Status</h4>
            </div>
            <div class="card-body">
                <canvas id="doughnut" data-colors='["--bs-success", "--bs-warning"]' height="200"></canvas>
                <div class="mt-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span><i class="mdi mdi-circle text-success me-1"></i>Published</span>
                        <span class="fw-bold">{{ $blogsByStatus['published'] }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span><i class="mdi mdi-circle text-warning me-1"></i>Draft</span>
                        <span class="fw-bold">{{ $blogsByStatus['draft'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Quick Stats</h4>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                    <div>
                        <p class="mb-1 text-muted">Messages</p>
                        <h5 class="mb-0">{{ $totalContactMessages }}</h5>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-primary rounded">
                            <i class="mdi mdi-email-outline font-size-20"></i>
                        </span>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                    <div>
                        <p class="mb-1 text-muted">Unread Messages</p>
                        <h5 class="mb-0 text-danger">{{ $unreadMessages }}</h5>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-danger rounded">
                            <i class="mdi mdi-email-alert-outline font-size-20"></i>
                        </span>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="mb-1 text-muted">Testimonials</p>
                        <h5 class="mb-0">{{ $totalTestimonials }}</h5>
                    </div>
                    <div class="avatar-sm">
                        <span class="avatar-title bg-light text-success rounded">
                            <i class="mdi mdi-star-outline font-size-20"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Quick Actions</h4>
            </div>
            <div class="card-body">
                <div class="d-grid gap-1">
                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-success">
                        <i class="ri-article-line me-2"></i>Create Blog Post
                    </a>
                    <a href="{{ route('admin.portfolio.events.create') }}" class="btn btn-info">
                        <i class="ri-image-add-line me-2"></i>Add Portfolio Item
                    </a>
                    <a href="{{ route('admin.team-members.create') }}" class="btn btn-warning">
                        <i class="ri-team-line me-2"></i>Add Team Member
                    </a>
                    <a href="{{ route('admin.contact.messages.index') }}" class="btn btn-primary">
                        <i class="ri-mail-line me-2"></i>View Messages
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ URL::asset('/assets/libs/chart-js/chart-js.min.js') }}"></script>
<script>
    function getChartColorsArray(chartId) {
        if (document.getElementById(chartId) !== null) {
            var colors = document.getElementById(chartId).getAttribute("data-colors");
            if (colors) {
                colors = JSON.parse(colors);
                return colors.map(function (value) {
                    var newValue = value.replace(" ", "");
                    if (newValue.indexOf(",") === -1) {
                        var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
                        if (color) return color;
                        else return newValue;
                    } else {
                        var val = value.split(',');
                        if (val.length == 2) {
                            var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
                            rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
                            return rgbaColor;
                        } else {
                            return newValue;
                        }
                    }
                });
            }
        }
    }

    // Line Chart - Content Overview
    var LinechartColors = getChartColorsArray("lineChart");
    if (LinechartColors) {
        var lineChart = {
            labels: {!! json_encode($months) !!},
            datasets: [
                {
                    label: "Blog Posts",
                    fill: true,
                    lineTension: 0.5,
                    backgroundColor: LinechartColors[0],
                    borderColor: LinechartColors[1],
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: LinechartColors[1],
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: LinechartColors[1],
                    pointHoverBorderColor: "#fff",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: {!! json_encode($blogsByMonth) !!}
                },
                {
                    label: "Portfolio Items",
                    fill: true,
                    lineTension: 0.5,
                    backgroundColor: LinechartColors[2],
                    borderColor: LinechartColors[3],
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: LinechartColors[3],
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: LinechartColors[3],
                    pointHoverBorderColor: "#eef0f2",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: {!! json_encode($portfolioByMonth) !!}
                },
                {
                    label: "Testimonials",
                    fill: true,
                    lineTension: 0.5,
                    backgroundColor: LinechartColors[4],
                    borderColor: LinechartColors[5],
                    borderCapStyle: 'butt',
                    borderDash: [],
                    borderDashOffset: 0.0,
                    borderJoinStyle: 'miter',
                    pointBorderColor: LinechartColors[5],
                    pointBackgroundColor: "#fff",
                    pointBorderWidth: 1,
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: LinechartColors[5],
                    pointHoverBorderColor: "#eef0f2",
                    pointHoverBorderWidth: 2,
                    pointRadius: 1,
                    pointHitRadius: 10,
                    data: {!! json_encode($testimonialsByMonth) !!}
                }
            ]
        };

        var lineOpts = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        };

        var ctx = document.getElementById("lineChart").getContext("2d");
        new Chart(ctx, {type: 'line', data: lineChart, options: lineOpts});
    }

    // Doughnut Chart - Blog Status
    var DoughnutchartColors = getChartColorsArray("doughnut");
    if (DoughnutchartColors) {
        var donutChart = {
            labels: ["Published", "Draft"],
            datasets: [{
                data: [{{ $blogsByStatus['published'] }}, {{ $blogsByStatus['draft'] }}],
                backgroundColor: DoughnutchartColors,
                hoverBackgroundColor: DoughnutchartColors,
                hoverBorderColor: "#fff"
            }]
        };
        var ctx = document.getElementById("doughnut").getContext("2d");
        new Chart(ctx, {type: 'doughnut', data: donutChart});
    }
</script>
@endsection