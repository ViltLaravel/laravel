@extends('backend_home.app')

@section('content')
<section style="background-color: #fff;">
    <div class="container my-5 py-5 text-dark">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <div style="border-radius: 5px; background-color: #ccd5ae;" class="card">
                    <div class="card-body p-4">
                        <div class="d-flex flex-start w-100">
                            @if(auth()->user()->profile_pic)
                                <img style="border: 3px solid #fff;" class="rounded-circle shadow-1-strong me-3" src="{{ asset('uploads/'.auth()->user()->profile_pic) }}" alt="avatar" width="65" height="65" />
                            @else
                                <img style="border: 3px solid #fff;" class="rounded-circle shadow-1-strong me-3" src="{{ asset('backend/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg') }}" alt="avatar" width="65" height="65" />
                            @endif

                            <div class="w-100">
                                <h5>Provide a review of this freelancer</h5>
                                <form action="{{ route('rating.freelancer') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ request('freelancer_id') }}" name="modalId">
                                    <input type="hidden" value="{{ request('job_title_id') }}" name="jobId">
                                    <div class="rating mb-3" id="star-rating">
                                        <input type="radio" name="rating" id="star5" value="1" onchange="updateRating(this.value)">
                                        <label for="star5" title="Bad"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star4" value="2" onchange="updateRating(this.value)">
                                        <label for="star4" title="Poor"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star3" value="3" onchange="updateRating(this.value)">
                                        <label for="star3" title="OK"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star2" value="4" onchange="updateRating(this.value)">
                                        <label for="star2" title="Good"><i class="fas fa-star"></i></label>
                                        <input type="radio" name="rating" id="star1" value="5" onchange="updateRating(this.value)">
                                        <label for="star1" title="Excellent"><i class="fas fa-star"></i></label>
                                    </div>
                                    <div class="form-outline">
                                        <textarea style="border: 2px solid #d8e2dc; border-radius: 10px;" class="form-control" id="textAreaExample" name="feedback" rows="4" placeholder="Can you provide your feedback on this freelancer?" required></textarea>
                                    </div>
                                    <div class="d-flex justify-content-between mt-3">
                                        <a href="/">
                                            <button style="border-radius: 20px;" type="button" class="btn btn-danger">Return</button>
                                        </a>
                                        <button style="border-radius: 20px;" type="submit" class="btn btn-success">Send Feedback</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <style>
        input[type="radio"] {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }
        .rating label.selected {
            color: #ffcc00;
        }
    </style>
@endsection
