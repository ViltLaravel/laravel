<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}

    {{-- <meta content="" name="keywords">
    <meta content="" name="description"> --}}

    <!-- Favicon -->

    <link href="{{ asset('backend_1/img/preloading.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('backend_1/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_1/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('backend_1/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('backend_1/css/style.css') }}" rel="stylesheet">

    <!-- Slider start -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">



<style>
    /* Define the typing animation */
    @keyframes typing {
        from { width: 0; }
        to { width: 100%; }
    }

    /* Apply the animation to the text */
    #typewriter {
        overflow: hidden;
        border-right: 2px solid;
        white-space: nowrap;
        animation: typing 3s steps(30,end) forwards infinite;
        animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    }


    .cssbuttons-io-button {
  background: #a3b18a;
  color: white;
  font-family: inherit;
  padding: 0.35em;
  padding-left: 1.2em;
  font-size: 17px;
  font-weight: 500;
  border-radius: 50px;
  border: none;
  letter-spacing: 0.05em;
  display: flex;
  align-items: center;
  box-shadow: inset 0 0 1.6em -0.6em #a3b18a;
  overflow: hidden;
  position: relative;
  height: 2.8em;
  padding-right: 3.3em;
}

.cssbuttons-io-button .icon {
  background: white;
  margin-left: 1em;
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 2.2em;
  width: 2.2em;
  border-radius: 50px;
  box-shadow: 0.1em 0.1em 0.6em 0.2em #a3b18a;
  right: 0.3em;
  transition: all 0.3s;
}

.cssbuttons-io-button:hover .icon {
  width: calc(100% - 0.6em);
}

.cssbuttons-io-button .icon svg {
  width: 1.1em;
  transition: transform 0.3s;
  color: #a3b18a;
}

.cssbuttons-io-button:hover .icon svg {
  transform: translateX(0.1em);
}

.cssbuttons-io-button:active .icon {
  transform: scale(0.95);
}

</style>


</head>

<style>
    .limitfl:nth-child(n+3) {
        display: none;
    }
</style>

<style>
    .btn-outline-primary:hover {
        color: #fff;
    }
</style>
<body>
    <div class="container-xxl bg-white p-0">

            <!-- loading -->
                @include('backend_home.loading')
            <!-- /.loading -->

            <!-- corousel -->
                @include('backend_home.navbar')
            <!-- /.carousel -->

            <!-- Navbar -->
                {{-- @include('backend_home.carousel') --}}
            <!-- /.navbar -->

            {{-- dashboard --}}
                @yield('content')

             <!-- Footer -->
                @include('backend_home.footer')
             <!-- /.Footer -->

        <!-- Back to Top -->
        <a href="#" style="border-radius: 50%; border-color: white" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('backend_1/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('backend_1/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('backend_1/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('backend_1/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('backend_1/js/main.js') }}"></script>

    {{-- SWEETALERT START --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('success'))
    <script>
        swal("Success!", "{{ session('success') }}", "success");
    </script>
    @endif

    @if (session('warning'))
        <script>
            swal("Warning!", "{{ session('warning') }}", "warning");
        </script>
    @endif
    {{-- SWEETALERT END --}}

    {{-- MODAL EMPLOYER --}}
    {{-- <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
        })
    </script> --}}
    {{-- MODAL EMPLOYER --}}

    <!-- Slider JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    <script>
        $(document).ready(function(){
        $('#image-slider').slick({
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            arrows: false
        });
        });
    </script>

    {{-- RATING UI --}}
    <script>
        function updateRating(value) {
        var stars = document.querySelectorAll('#star-rating label');
        for (var i = 0; i < stars.length; i++) {
            if (i < value) {
            stars[i].classList.add('selected');
            } else {
            stars[i].classList.remove('selected');
            }
        }
        }
    </script>
    {{-- RATING UI --}}



{{-- FREELANCER LIST SECTION --}}
<script>
    // START OF CLICK CATEGORY JOBTITLE
    $(document).ready(function() {
    $('.fetch-data-btn').click(function() {
        const categoryId = $(this).val();
        // alert(categoryId)
        $.ajax({
            url: `http://127.0.0.1:8000/freelancer/category/${categoryId}`, // Modified URL with categoryId parameter
            type: 'GET',
            success: function(data) {
                $('.samplc').empty();
                // Loop through the data and create the HTML elements
                $.each(data, function(index, category) {
                    $.each(category.freelancerlists, function(index, freelancer) {
                        console.log(freelancer);
                        const profilePic = freelancer.profile_pic == null ? "{{ asset('backend/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg') }}" : "{{ asset('uploads/') }}/" + freelancer.profile_pic;
                        const emphiring = freelancer.hstatus == 1 ? "Contracted" : "Hire me";
                        const disabledAttr = freelancer.hstatus == 1 ? "disabled" : "";
                        const colorAttr = freelancer.hstatus == 1 ? "danger" : "primary";
                        const contractAttr = freelancer.contract_period == null ? "Available" : freelancer.contract_period;
                        const disabledAtt = freelancer.hstatus == 1 ? "pointer-events: none; opacity: 1;" : "";
                        const salary = freelancer.salary == null ? `<span style="color: red; font-weight: bold;">₱</span> Negotiable` : `<span style="color: red; font-weight: bold;">₱ ${freelancer.salary}.00</span>/per hour`;


                        const html = `
                            <div  style="background-color: #ccd5ae; border-radius: 10px;" id="freelancer${category.id}" class="tab-pane fade show p-0 limitfl">
                                <div class="job-item p-4 mb-4">
                                    <div class="row g-4">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">

                                            <button style="border: none; background-color: transparent;" id="btnModal" value="${freelancer.user_id}">
                                                    <a data-toggle="modal"><img style="with: 5em; height: 5em;" src="${profilePic}" alt="Profile Picture" style="width: 80px; height: 80px;"></a>
                                            </button>

                                            <div class="text-start ps-4">
                                                <h5 class="mb-3">${freelancer.name}</h5>
                                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>${freelancer.address}, Bohol</span>
                                                <span class="text-truncate me-3"><i class="fa fa-user text-primary me-2"></i>${category.categoryname}</span>
                                                <span class="text-truncate me-0">${ salary }</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="d-flex mb-3">

                                            <button style="border-style: none; background-color: transparent;" value="${freelancer.user_id},${category.id}">
                                                    <a style="color: black;" href="{{ route('rating.index') }}?freelancer_id=${freelancer.user_id}&job_title_id=${category.id}">
                                                        <i class="fa fa-star text-warning me-2"></i>${freelancer.avg_rating}/5 rating (${freelancer.feedback_count})
                                                    </a>
                                            </button>

                                            <button style="border-style: none; background-color: transparent;" value="${freelancer.user_id},${category.id}">
                                                <a href="all/rating/${freelancer.user_id}" style="background-color: transparent; border-color: #ccd5ae;" class="btn btn-light btn-square me-3">
                                                    <i class="fa fa-comments text-primary"></i>
                                                </a>
                                            </button>

                                            <button style="border-style: none; background-color: transparent;" value="${freelancer.user_id}" ${disabledAttr}>
                                                    <a style="border-radius: 50px; ${disabledAtt}" class="btn btn-outline-${colorAttr}" href="{{ route('hiring.index') }}?freelancer_id=${freelancer.user_id}">${ emphiring }</a>
                                            </button>
                                            </div>
                                            <div style="dislay: flex;">
                                                <small class="text-truncate"><i class="fa fa-calendar-alt text-dark me-2"></i>Contract : ${contractAttr}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                        console.log(freelancer.id)
                        // Append the HTML to the tabcontent
                        $('.samplc').append(html);
                    });
                });
            }, // Added closing bracket for the success property
            error: function(xhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });
});
// END OF CLICK JOBTITLE


 // START OF FREELANCER MODAL
  $('.samplc').on('click', '#btnModal', function() {
    var modalId = $(this).val();
    // console.log("Freelancer ID:", freelancerId);
    // alert(modalId)
    // Use the freelancerId value in your AJAX request, if needed
    $.ajax({
                url: `http://127.0.0.1:8000/freelancer/modal/${modalId}`, // Modified URL with categoryId parameter
                type: 'GET',
                success: function(data) {
                    // console.log(data)
                    $('#modalView').empty();
                    // console.log(data[0].name)
                    var skillsString = '';
                    // Loop through the data and create the HTML elements
                    $.each(data[0].freelancer_skills, function(index, skills) {
                        console.log(skills.skills_name) //jobtitle

                        // $.each(freelancer.freelancer_skills, function(index, skills) {
                        //     console.log(skills.skills_name) //skills
                        //     // console.log(freelancer)// Freelancers
                        skillsString += `<span style="font-size:.7em; margin-bottom: .5rem; margin-right: 2rem;" class="btn btn-primary">${skills.skills_name}</span>`;
                        // });

                    });

                       var resumeBtn;
                        if (data[0].resume === null) {
                            resumeBtn = '<button class="btn btn-danger">No Resume</button>';
                        } else {
                            resumeBtn = '<a href="{{ asset('resume/') }}/' + data[0].resume + '"><button class="btn btn-primary">Download CV</button></a>';
                        }

                    const profilePic = data[0].profile_pic == null ? "{{ asset('backend/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg') }}" : "{{ asset('uploads/') }}/" + data[0].profile_pic;
                            $('#modalView').append(`
                            <div class="container py-5">
                            <div class="row">
                            <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img
                                    src="${profilePic}
                                        "alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">${data[0].name}</h5>
                                <p class="text-muted mb-1">${data[0].freelancerlists.categoryname}</p>
                                <p class="text-muted mb-4">${data[0].address},Bohol</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="{{ route('hiring.index') }}?freelancer_id=${data[0].freelancerlists.user_id}">
                                    <button type="button" class="btn btn-primary">Hire me</button>
                                    </a>
                                    <a href="all/rating/${data[0].freelancerlists.user_id}">
                                    <button type="button" class="btn btn-outline-primary ms-1">Reviews</button>
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="card mb-4 mb-lg-0">
                                <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-envelope fa-lg text-warning"></i>
                                    <p class="mb-0">${data[0].email}</p>
                                    </li>
                                </ul>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">${data[0].name}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">${data[0].email}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">${data[0].phone}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">${data[0].gender}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Date of Birth</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">${data[0].dob}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Job Title</p>
                                    </div>
                                    <div class="col-sm-9">
                                            <p class="text-muted mb-0">${data[0].freelancerlists.categoryname}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Role</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">${data[0].role}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">${data[0].address},Bohol</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">Role</span>${data[0].role}
                                    </p>
                                    <p class="mb-1" style="font-size: .77rem;">Skills</p>
                                   ${skillsString}
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><span class="text-primary font-italic me-1">Download</span> Resume
                                        </p>
                                        <p class="mb-1" style="font-size: .77rem;">Resume/CV</p>

                                    ${resumeBtn}

                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                            </div>
                            `);
                            $('#modalContent').modal('show');


                }, // Added closing bracket for the success property
                error: function(xhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
  });
    // END OF FREELANCER MODAL
</script>


{{-- START OF SHOW BUTTON --}}
<script>
     $(".limitfl:nth-child(n+3)").hide();
$(document).ready(function() {
  $("#show-more-btn").click(function() {
    var buttonText = $(this).text();

    if (buttonText === "Show More") {
      $(".limitfl:nth-child(n+3)").show();
      $(this).removeClass("btn-outline-primary").addClass("btn-outline-danger").text("Show Less");
    } else {
      $(".limitfl:nth-child(n+3)").hide();
      $(this).removeClass("btn-outline-danger").addClass("btn-outline-primary").text("Show More");
    }
  });
});

</script>
{{-- END OF SHOW BUTTON --}}


{{-- START OF SEARCH ENDPOINT --}}
<script>
        $(document).ready(function() {
        $('#myButton').click(function() {
            var selectedValue = $('#mySelect').val();
            // alert(categoryId)
            $.ajax({
                url: `http://127.0.0.1:8000/freelancerss/${selectedValue}`, // Modified URL with categoryId parameter
                type: 'GET',
                success: function(data) {
                    // console.log(data);
                    // Clear the tabcontent before appending the new data
                    // console.log(data[0].freelancerlists)
                    $('.freelancer').empty();
                    // Loop through the data and create the HTML elements
                    $.each(data, function(index, category) {
                        $.each(category.freelancerlists, function(index, freelancer) {
                            // console.log(freelancer);
                            const profilePic = freelancer.profile_pic == null ? "{{ asset('backend/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg') }}" : "{{ asset('uploads/') }}/" + freelancer.profile_pic;
                            const emphiring = freelancer.hstatus == 1 ? "Contracted" : "Hire me";
                            const disabledAttr = freelancer.hstatus == 1 ? "disabled" : "";
                            const colorAttr = freelancer.hstatus == 1 ? "danger" : "primary";
                            const contractAttr = freelancer.contract_period == null ? "Available" : freelancer.contract_period;
                            const disabledAtt = freelancer.hstatus == 1 ? "pointer-events: none; opacity: 1;" : "";
                            const salary = freelancer.salary == null ? `<span style="color: red; font-weight: bold;">₱</span> Negotiable` : `<span style="color: red; font-weight: bold;">₱ ${freelancer.salary}.00</span>/per hour`;

                            const html = `
                                <div style="background-color: #ccd5ae; border-radius: 10px;" id="freelancer${category.id}" class="tab-pane fade show p-0 limitfl">
                                    <div class="job-item p-4 mb-4">
                                        <div class="row g-4">
                                            <div class="col-sm-12 col-md-8 d-flex align-items-center">

                                                <button style="border: none; background-color: transparent;" id="btnModal" value="${freelancer.user_id}">
                                                    <a data-toggle="modal"><img style="with: 5em; height: 5em;" src="${profilePic}" alt="Profile Picture" style="width: 80px; height: 80px;"></a>
                                                </button>

                                                <div class="text-start ps-4">
                                                    <h5 class="mb-3">${freelancer.name}</h5>
                                                    <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>${freelancer.address}, Bohol</span>
                                                    <span class="text-truncate me-3"><i class="fa fa-user text-primary me-2"></i>${category.categoryname}</span>
                                                    <span class="text-truncate me-0">${ salary }</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                <div class="d-flex mb-3">

                                                <button style="border-style: none; background-color: transparent;" value="${freelancer.user_id},${category.id}">
                                                    <a style="color: black;" href="{{ route('rating.index') }}?freelancer_id=${freelancer.user_id}&job_title_id=${category.id}">
                                                        <i class="fa fa-star text-warning me-2"></i>${freelancer.avg_rating}/5 rating (${freelancer.feedback_count})
                                                    </a>
                                                </button>

                                                <button style="border-style: none; background-color: transparent;" value="${freelancer.user_id},${category.id}">
                                                    <a href="all/rating/${freelancer.user_id}" style="background-color: transparent; border-color: #ccd5ae;" class="btn btn-light btn-square me-3">
                                                        <i class="fa fa-comments text-primary"></i>
                                                    </a>
                                                </button>

                                                <button style="border-style: none; background-color: transparent;" value="${freelancer.user_id}" ${disabledAttr}>
                                                    <a style="border-radius: 50px; ${disabledAtt}" class="btn btn-outline-${colorAttr}" href="{{ route('hiring.index') }}?freelancer_id=${freelancer.user_id}">${ emphiring }</a>
                                                </button>
                                                </div>
                                                <div style="dislay: flex;">
                                                <small class="text-truncate"><i class="fa fa-calendar-alt text-dark me-2"></i>Contract : ${contractAttr}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            console.log(freelancer.id)
                            // Append the HTML to the tabcontent
                            $('.freelancer').append(html);
                        });
                    });
                }, // Added closing bracket for the success property
                error: function(xhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
        });

        // Use event delegation to attach a click event handler to the dynamically-appended .btnModal button
  $('.freelancer').on('click', '#btnModal', function() {
    var modalId = $(this).val();
    // console.log("Freelancer ID:", freelancerId);
    // alert(modalId)
    // Use the freelancerId value in your AJAX request, if needed
    $.ajax({
                url: `http://127.0.0.1:8000/freelancer/modal/${modalId}`, // Modified URL with categoryId parameter
                type: 'GET',
                success: function(data) {
                    // console.log(data)
                    $('#modalView').empty();
                    // console.log(data[0].name)
                    var skillsString = '';
                    // Loop through the data and create the HTML elements
                    $.each(data[0].freelancer_skills, function(index, skills) {
                        console.log(skills.skills_name) //jobtitle
                        skillsString += `<span style="font-size:.7em; margin-bottom: .5rem; margin-right: 2rem;" class="btn btn-primary">${skills.skills_name}</span>`;

                    });

                       var resumeBtn;
                        if (data[0].resume === null) {
                            resumeBtn = '<button class="btn btn-danger">No Resume</button>';
                        } else {
                            resumeBtn = '<a href="{{ asset('resume/') }}/' + data[0].resume + '"><button class="btn btn-primary">Download CV</button></a>';
                        }

                    const profilePic = data[0].profile_pic == null ? "{{ asset('backend/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg') }}" : "{{ asset('uploads/') }}/" + data[0].profile_pic;
                            $('#modalView').append(`
                            <div class="container py-5">
                            <div class="row">
                            <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img
                                    src="${profilePic}
                                        "alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">${data[0].name}</h5>
                                <p class="text-muted mb-1">${data[0].freelancerlists.categoryname}</p>
                                <p class="text-muted mb-4">${data[0].address},Bohol</p>
                                <div class="d-flex justify-content-center mb-2">

                                    <a href="{{ route('hiring.index') }}?freelancer_id=${data[0].freelancerlists.user_id}">
                                        <button type="button" class="btn btn-primary">Hire me</button>
                                    </a>
                                    <a href="all/rating/${data[0].freelancerlists.user_id}">
                                        <button type="button" class="btn btn-outline-primary ms-1">Reviews</button>
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="card mb-4 mb-lg-0">
                                <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <i class="fas fa-envelope fa-lg text-warning"></i>
                                    <p class="mb-0">${data[0].email}</p>
                                    </li>
                                </ul>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">${data[0].name}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">${data[0].email}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">${data[0].phone}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">${data[0].gender}</p>
                                    </div>http://127.0.0.1:8000/
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Date of Birth</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">${data[0].dob}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Job Title</p>
                                    </div>
                                    <div class="col-sm-9">
                                            <p class="text-muted mb-0">${data[0].freelancerlists.categoryname}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Role</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">${data[0].role}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                    <p class="text-muted mb-0">${data[0].address},Bohol</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">Role</span>${data[0].role}
                                    </p>
                                    <p class="mb-1" style="font-size: .77rem;">Skills</p>
                                   ${skillsString}
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><span class="text-primary font-italic me-1">Download</span> Resume
                                        </p>
                                        <p class="mb-1" style="font-size: .77rem;">Resume/CV</p>

                                    ${resumeBtn}

                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                            </div>
                            `);
                            $('#modalContent').modal('show');


                }, // Added closing bracket for the success property
                error: function(xhr, textStatus, errorThrown) {
                    console.log(errorThrown);
                }
            });
  });
});


</script>
{{-- END OF SEARCH ENDPOINT --}}


{{-- MODAL PLUGINS --}}
 <script src="backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
{{-- MODAL PLUGINS --}}


{{-- HIDE THE MODAL  --}}
<script>
$(document).ready(function() {
    $('.close').click(function() {
        $('#modalContent').modal('hide');
    });
});
</script>
{{-- HIDE THE MODAL  --}}



<!-- Messenger Chat Plugin Code -->

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "102702951941118");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v16.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
</body>

</html>
