@extends('layout.home')

@section('content')
<!-- page title -->
<section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb mb-2">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="/">Home</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted">School Ratings</li>
        </ul>
        <p class="text-lighten mb-0">Private schools ratings based on parents feedback</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- school cards -->
<section class="section">
  <div class="container">
    <!-- school list -->
    <div class="row justify-content-center">
      @foreach($schools as $school)
      <!-- school item -->
      <div class="col-lg-4 col-sm-6 mb-5 d-flex align-items-stretch">
        <div class="card p-0 border-primary rounded-0 hover-shadow w-100">
          <div class="card-img-top-container" style="height: 200px; overflow: hidden;">
            <img class="img-fluid w-100 h-100" src="{{ asset($school->image ?? 'images/courses/course-1.jpg') }}" alt="{{ $school->name }}" style="object-fit: cover;">
          </div>
          <div class="card-body d-flex flex-column">
            <h4 class="card-title">{{ $school->name }}</h4>
            <ul class="list-inline mb-2">
              <li class="list-inline-item"><i class="ti-location-pin mr-1"></i>{{ $school->location }}</li>
            </ul>
            <div class="mb-3">
    <div class="mb-3">
    @if($school->ratings_count > 0)
        @for($i = 1; $i <= 5; $i++)
            @if($i <= round($school->average_rating))
                <i class="ti-star text-warning"></i>
            @else
                <i class="ti-star text-secondary"></i>
            @endif
        @endfor
        <span class="ml-2">{{ number_format($school->average_rating, 1) }} ({{ $school->ratings_count }} reviews)</span>
    @else
        <span class="text-muted">No ratings yet</span>
    @endif
</div>
              <span class="ml-2">({{ $school->ratings_count }} reviews)</span>
            </div>
            <p class="card-text mb-4 flex-grow-1">{{ Str::limit($school->description, 100) }}</p>
            <div class="mt-auto">
              @auth
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ratingModal{{ $school->id }}">Rate Now</button>
              @else
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#loginModal">Rate Now</button>
              @endauth
            </div>
          </div>
        </div>
      </div>

      <!-- Rating Modal for each school -->
      @auth
      <div class="modal fade" id="ratingModal{{ $school->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Rate {{ $school->name }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('schools.ratings.store', $school) }}" method="POST" id="ratingForm{{ $school->id }}">
              @csrf
              <div class="modal-body">
                <!-- School Info -->
                <div class="row mb-4">
                  <div class="col-md-3">
                    <img src="{{ asset($school->image ?? 'images/courses/course-1.jpg') }}" class="img-fluid rounded" alt="{{ $school->name }}">
                  </div>
                  <div class="col-md-9">
                    <h4>{{ $school->name }}</h4>
                    <p class="text-muted"><i class="ti-location-pin mr-1"></i>{{ $school->location }}</p>
                    <div class="mb-2">
                      @for($i = 1; $i <= 5; $i++)
                        @if($i <= round($school->average_rating))
                          <i class="ti-star text-warning"></i>
                        @else
                          <i class="ti-star text-secondary"></i>
                        @endif
                      @endfor
                      <span class="ml-2">{{ number_format($school->average_rating, 1) }} ({{ $school->ratings_count }} reviews)</span>
                    </div>
                  </div>
                </div>

                <!-- Previous Ratings (if any) -->
                @if($school->ratings->count() > 0)
                <div class="previous-ratings mb-4">
                  <h6 class="mb-3">Recent Reviews</h6>
                  @foreach($school->ratings->take(3) as $rating)
                  <div class="card mb-2">
                    <div class="card-body p-3">
                      <div class="d-flex justify-content-between">
                        <div>
                          <strong>{{ $rating->user->name ?? 'Anonymous' }}</strong>
                          <div class="text-warning">
                            @for($i = 1; $i <= 5; $i++)
                              @if($i <= round($rating->overall_rating))
                                <i class="fas fa-star"></i>
                              @else
                                <i class="far fa-star"></i>
                              @endif
                            @endfor
                          </div>
                        </div>
                        <small class="text-muted">{{ $rating->created_at->format('M d, Y') }}</small>
                      </div>
                      @if($rating->comment)
                        <p class="mb-0 mt-2">{{ $rating->comment }}</p>
                      @endif
                    </div>
                  </div>
                  @endforeach
                </div>
                @endif

                <!-- Rating Form -->
                <div class="rating-form">
                  {{-- <div class="form-group">
                    <label class="d-block">Your Overall Rating</label>
                    <div class="rating-stars">
                      @for($i = 5; $i >= 1; $i--)
                        <input type="radio" id="star{{ $i }}-{{ $school->id }}" name="overall_rating" value="{{ $i }}" required>
                        <label for="star{{ $i }}-{{ $school->id }}"><i class="ti-star"></i></label>
                      @endfor
                    </div>
                  </div> --}}
                  <div class="form-group">
  <label>Teaching Quality</label>
  <select name="teaching_quality" class="form-control" required>
    @for($i=1; $i<=5; $i++)
      <option value="{{ $i }}">{{ $i }}</option>
    @endfor
  </select>
</div>
<div class="form-group">
  <label>Facilities</label>
  <select name="facilities" class="form-control" required>
    @for($i=1; $i<=5; $i++)
      <option value="{{ $i }}">{{ $i }}</option>
    @endfor
  </select>
</div>
<div class="form-group">
  <label>Administration</label>
  <select name="administration" class="form-control" required>
    @for($i=1; $i<=5; $i++)
      <option value="{{ $i }}">{{ $i }}</option>
    @endfor
  </select>
</div>
<div class="form-group">
  <label>Safety</label>
  <select name="safety" class="form-control" required>
    @for($i=1; $i<=5; $i++)
      <option value="{{ $i }}">{{ $i }}</option>
    @endfor
  </select>
</div>

                  
                  <div class="form-group">
                    <label>Your Comment (optional)</label>
                    <textarea name="comment" class="form-control" rows="3" maxlength="500" placeholder="Share your experience with this school..."></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit Rating</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      @endauth
      @endforeach
    </div>
    <!-- /school list -->
    <div class="row justify-content-center">
      {{ $schools->links() }}
    </div>
  </div>
</section>
<!-- /school cards -->

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Login to Rate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" required autofocus>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
          </div>
        </div>
        <div class="modal-footer d-flex justify-content-between">
          <a href="{{ route('register') }}">Don't have an account?</a>
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('styles')
<style>
  .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
  }
  .rating-stars {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
  }
  .rating-stars input {
    display: none;
  }
  .rating-stars label {
    font-size: 24px;
    color: #ddd;
    cursor: pointer;
    padding: 0 2px;
  }
  .rating-stars input:checked ~ label,
  .rating-stars input:hover ~ label {
    color: #ffc107;
  }
  .rating-stars label:hover,
  .rating-stars label:hover ~ label {
    color: #ffc107;
  }
  .previous-ratings {
    max-height: 300px;
    overflow-y: auto;
    padding: 10px;
    border: 1px solid #eee;
    border-radius: 5px;
  }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
  // AJAX form submission for ratings
  $('[id^=ratingForm]').on('submit', function(e) {
    e.preventDefault();
    var form = $(this);
    var modalId = form.attr('id').replace('ratingForm', '#ratingModal');
    
    $.ajax({
      type: form.attr('method'),
      url: form.attr('action'),
      data: form.serialize(),
      success: function(response) {
        $(modalId).modal('hide');
        // Show success message
        toastr.success('Rating submitted successfully!');
        // Refresh the page after a short delay
        setTimeout(function() {
          location.reload();
        }, 1500);
      },
      error: function(xhr) {
        toastr.error('An error occurred. Please try again.');
      }
    });
  });
});
</script>
@endpush