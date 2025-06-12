@extends('dashboard.dashboard')
@section('contact')
      
     <div class="body-wrapper-inner">
    <div class="container-fluid">
        <!-- Row 1 -->
        <div class="row">
            <!-- Chart Column -->
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Top Rated Schools</h4>
                                <p class="card-subtitle">Schools with the highest ratings by parents</p>
                            </div>
                        </div>
                        <div id="top-schools-chart" class="mt-2" style="height: 300px;"></div>
                    </div>
                </div>
            </div>

            <!-- Table Column -->
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title">Schools List</h4>
                            <form method="GET" action="{{ route('dashboard.index') }}" class="w-50">
                                
                            </form>
                        </div>
                        <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                            <table class="table table-striped table-hover">
                                <thead class="sticky-top">
                                    <tr>
                                        <th>#</th>
                                        <th>School Name</th>
                                        <th>Rating</th>
                                        <th>Reviews</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schools as $index => $school)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $school->name }}</td>
                                        <td>
                                            @if($school->avg_rating)
                                                <div class="d-flex align-items-center">
                                                    <div class="me-2">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $school->avg_rating)
                                                                <i class="ti ti-star-filled text-warning" style="font-size: 0.9rem;"></i>
                                                            @elseif($i - 0.5 <= $school->avg_rating)
                                                                <i class="ti ti-star-half-filled text-warning" style="font-size: 0.9rem;"></i>
                                                            @else
                                                                <i class="ti ti-star text-warning" style="font-size: 0.9rem;"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <span>{{ number_format($school->avg_rating, 1) }}</span>
                                                </div>
                                            @else
                                                <span class="badge bg-secondary">No ratings</span>
                                            @endif
                                        </td>
                                        <td>{{ $school->ratings_count }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

          <div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="d-md-flex align-items-center">
                <div>
                    <h4 class="card-title">Parents Management</h4>
                    <p class="card-subtitle">
                        List of registered parents
                    </p>
                </div>
                <div class="ms-auto mt-3 mt-md-0">
                    <form method="GET" action="{{ route('dashboard.index') }}" class="d-flex">
                      
                    </form>
                </div>
            </div>
            <div class="table-responsive mt-4">
                <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                    <thead>
                        <tr>
                            <th scope="col" class="px-0 text-muted">#</th>
                            <th scope="col" class="px-0 text-muted">Parent Name</th>
                            <th scope="col" class="px-0 text-muted">Contact Info</th>
                            <th scope="col" class="px-0 text-muted text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($parents as $parent)
                        <tr>
                            <td class="px-0">{{ $loop->iteration }}</td>
                            <td class="px-0">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-md bg-light rounded-circle text-dark d-flex align-items-center justify-content-center">
                                        {{ substr($parent->name, 0, 1) }}
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-0 fw-bolder">{{ $parent->name }}</h6>
                                   
                                    </div>
                                </div>
                            </td>
                            <td class="px-0">
                                <div>
                                    <span class="d-block">{{ $parent->phone }}</span>
                                    <span class="text-muted">{{ $parent->email }}</span>
                                </div>
                            </td>
                            <td class="px-0 text-end">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('users.parents.edit', $parent->id) }}" 
                                       class="btn btn-sm btn-primary me-2">
                                        <i class="ti ti-edit"></i> Edit
                                    </a>
                                   
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Contact Messages</h5>

            <div class="ms-auto mt-3 mt-md-0">
                    <form method="GET" action="{{ route('dashboard.index') }}" class="d-flex">
                      
                    </form>
                </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">#</th>
                            <th class="border-bottom-0">Name</th>
                            <th class="border-bottom-0">Email</th>
                            <th class="border-bottom-0">Subject</th>
                            <th class="border-bottom-0">Sent Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td class="border-bottom-0">{{ $loop->iteration }}</td>
                            <td class="border-bottom-0">{{ $contact->name }}</td>
                            <td class="border-bottom-0">{{ $contact->mail }}</td>
                            <td class="border-bottom-0">{{ $contact->subject }}</td>
                            <td class="border-bottom-0">{{ $contact->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $contacts->links() }} {{-- للصفحات --}}
            </div>
        </div>
    </div>
</div>
            
          </div>

        </div>
      </div>
   <script>
document.addEventListener('DOMContentLoaded', function() {
  // Top schools data
  const topSchoolsData = {
    schools: @json($topSchools->pluck('name')),
    ratings: @json($topSchools->pluck('avg_rating')),
    reviews: @json($topSchools->pluck('ratings_count'))
  };

  // Chart options
  const chartOptions = {
    series: [{
      name: 'Average Rating',
      data: topSchoolsData.ratings
    }, {
      name: 'Number of Ratings',
      data: topSchoolsData.reviews
    }],
    chart: {
      type: 'bar',
      height: 350,
      toolbar: { show: false }
    },
    plotOptions: {
      bar: {
        horizontal: false,
        columnWidth: '55%',
        endingShape: 'rounded'
      },
    },
    dataLabels: {
      enabled: false
    },
    colors: ['#5D87FF', '#13DEB9'],
    xaxis: {
      categories: topSchoolsData.schools,
    },
    yaxis: {
      title: {
        text: 'Value'
      }
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val.toFixed(1);
        }
      }
    },
    legend: {
      position: 'top'
    }
  };

  const chart = new ApexCharts(document.querySelector("#top-schools-chart"), chartOptions);
  chart.render();
});
</script>

<style>
    .avatar {
        width: 40px;
        height: 40px;
        font-weight: 600;
    }
    .table tbody tr td {
        vertical-align: middle;
    }
    .delete-form {
        display: inline;
    }
</style>
@endsection