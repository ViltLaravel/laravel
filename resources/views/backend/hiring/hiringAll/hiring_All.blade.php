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
                                <h5>Submit a work proposal to this freelancer</h5>
                                <form action="{{ route('send.message') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ request('freelancer_id') }}" name="modalId">

                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Attachments:</label>
                                        <input style="border: 2px solid #d8e2dc; border-radius: 10px;" type="file" class="form-control" name="emp_attachment" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Message:</label>
                                        <textarea style="border: 2px solid #d8e2dc; border-radius: 10px;" name="message" class="form-control" id="message-text" placeholder="Enter your message here." required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="start_contract" class="col-form-label">Start Contract:</label>
                                        <input style="border: 2px solid #d8e2dc; border-radius: 10px;" type="date" class="form-control" name="start" value="{{ date('Y-m-d') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_contract" class="col-form-label">End Contract:</label>
                                        <input style="border: 2px solid #d8e2dc; border-radius: 10px;" type="date" class="form-control" value="{{ date('Y-m-d') }}" name="end" required>
                                    </div>

                                    <div class="d-flex justify-content-between mt-3">
                                        <a href="/">
                                            <button style="border-radius: 20px;" type="button" class="btn btn-danger">Return</button>
                                        </a>
                                        <button style="border-radius: 20px;" type="submit" class="btn btn-success">Send Request</button>
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
@endsection
