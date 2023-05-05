<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

// LANDING PAGE
Route::get('/', [MainController::class, 'index'])->name('landingpage');
Route::get('/freelancer/modal/{modalId}', [App\Http\Controllers\Home\MainController::class, 'show_modal'])->name('show.modal');
Route::post('/all-freelancer', [App\Http\Controllers\Home\MainController::class, 'show_freelancer'])->name('freelancer.all');
Route::get('/freelancerss/{id}', [App\Http\Controllers\Home\MainController::class, 'showFreelancers'])->name('search.result');
Route::get('/freelancer/category/{categoryId}', [App\Http\Controllers\Home\MainController::class, 'getFreelancersByCategory']);

// USER MANAGEMENT
Route::get('/all-user', [App\Http\Controllers\backend\UserController::class, 'Alluser'])->name('alluser');
Route::get('/add-user-index', [App\Http\Controllers\backend\UserController::class, 'AllUserIndex'])->name('AllUserIndex');
Route::post('/insert-user', [App\Http\Controllers\backend\UserController::class, 'InsertUserIndex'])->name('InsertUser');
Route::get('/edit-user/{id}', [App\Http\Controllers\backend\UserController::class, 'EditUserIndex'])->name('EditUser');
Route::post('/update-user/{id}', [App\Http\Controllers\backend\UserController::class, 'UpdateUserIndex'])->name('UpdateUser');
Route::get('/delete-user/{id}', [App\Http\Controllers\backend\UserController::class, 'DeleteUserIndex'])->name('DeleteUser');

// JOB TITLE MANAGEMENT
Route::get('/all-jobtitle', [App\Http\Controllers\admin\CategoryController::class, 'all'])->name('allcategory');
Route::get('/add-jobtitle-index', [App\Http\Controllers\admin\CategoryController::class, 'index'])->name('index_jobtitle');
Route::post('/insert-jobtitle', [App\Http\Controllers\admin\CategoryController::class, 'insert'])->name('insert_jobtitle');
Route::get('/edit-jobtitle/{id}', [App\Http\Controllers\admin\CategoryController::class, 'edit'])->name('edit_jobtitle');
Route::post('/update-jobtitle/{id}', [App\Http\Controllers\admin\CategoryController::class, 'update'])->name('update_jobtitle');
Route::get('/delete-jobtitle/{id}', [App\Http\Controllers\admin\CategoryController::class, 'delete'])->name('delete_jobtitle');

// ADDRESS MANAGEMENT
Route::get('/all-address', [App\Http\Controllers\admin\LocationController::class, 'all'])->name('all.address');
Route::get('/add-address-index', [App\Http\Controllers\admin\LocationController::class, 'index'])->name('index.address');
Route::post('/insert-address', [App\Http\Controllers\admin\LocationController::class, 'insert'])->name('insert.address');
Route::get('/edit-address/{id}', [App\Http\Controllers\admin\LocationController::class, 'edit'])->name('edit.address');
Route::post('/update-address/{id}', [App\Http\Controllers\admin\LocationController::class, 'update'])->name('update.address');
Route::get('/delete-address/{id}', [App\Http\Controllers\admin\LocationController::class, 'delete'])->name('delete.address');

// SKILLS MANAGEMENT
Route::get('/all-skills', [App\Http\Controllers\admin\SkillsController::class, 'all'])->name('all.skills');
Route::get('/add-skills-index', [App\Http\Controllers\admin\SkillsController::class, 'index'])->name('index.skills');
Route::post('/insert-skills', [App\Http\Controllers\admin\SkillsController::class, 'insert'])->name('insert.skills');
Route::get('/edit-skills/{id}', [App\Http\Controllers\admin\SkillsController::class, 'edit'])->name('edit.skills');
Route::post('/update-skills/{id}', [App\Http\Controllers\admin\SkillsController::class, 'update'])->name('update.skills');
Route::get('/delete-skills/{id}', [App\Http\Controllers\admin\SkillsController::class, 'delete'])->name('delete.skills');

// LOGO MANAGEMENT
Route::get('/logos', [App\Http\Controllers\admin\LogoController::class, 'index'])->name('logo.index');
Route::post('/logo-update', [App\Http\Controllers\admin\LogoController::class, 'update_logo'])->name('update-logo');

// PROFILE PAGE MANAGEMENT
Route::get('/profile', [App\Http\Controllers\admin\ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/profile', [App\Http\Controllers\backend\UserController::class, 'show'])->name('profile.update');
Route::post('/update/profile', [App\Http\Controllers\backend\UserController::class, 'updateProfile'])->name('update.profile');
Route::post('/update/profile-info', [App\Http\Controllers\admin\ProfileController::class, 'update'])->name('update.profile.info');
Route::post('/update/setting', [App\Http\Controllers\admin\ProfileController::class, 'setting'])->name('update.setting');
Route::post('/update/resume', [App\Http\Controllers\admin\ProfileController::class, 'resume'])->name('update.resume');

// LANDING PAGE
Route::get('/about', [App\Http\Controllers\Home\PageController::class, 'index'])->name('admin.about');
Route::get('/employer', [App\Http\Controllers\Home\PageController::class, 'indexss'])->name('admin.employer');
Route::get('/developer', [App\Http\Controllers\Home\PageController::class, 'developer'])->name('admin.developer');
Route::post('/employer', [App\Http\Controllers\Home\PageController::class, 'show_employer'])->name('employer');

Route::get('/employer/{id}', [App\Http\Controllers\Home\PageController::class, 'modal_employer'])->name('modal.employer');

// VERIFY BY ADMIN MANAGEMENT
Route::middleware(['verify'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// VERIFY MESSAGE
Route::patch('/admin/users/{user}', [App\Http\Controllers\backend\UserController::class, 'verify'])->name('admin.verify');
Route::get('/message', [App\Http\Controllers\backend\UserController::class, 'messagev'])->name('admin.verify.message');


// HIRING MANAGEMENT
Route::get('hiring', [App\Http\Controllers\HiringController::class, 'get_freelancer'])->name('hiring.freelancer');
Route::get('hiring/admin', [App\Http\Controllers\HiringController::class, 'get_admin'])->name('hiring.admin.transaction');
Route::get('hiring/employeer', [App\Http\Controllers\HiringController::class, 'get_employeer'])->name('hiring.employeer');
Route::get('hiring/freelancer', [App\Http\Controllers\HiringController::class, 'index'])->name('hiring.index');
Route::post('hiring', [App\Http\Controllers\HiringController::class, 'sendMessage'])->name('send.message');
Route::post('hiring/accept', [App\Http\Controllers\HiringController::class, 'acceptEmployeer'])->name('accept.employer');
Route::post('hiring/declined', [App\Http\Controllers\HiringController::class, 'delete'])->name('delete.employer');

// RATING OF FREELANCER
Route::get('rating', [App\Http\Controllers\FreelancerController::class, 'rating'])->name('rating.index');
Route::get('all/rating/{id}', [App\Http\Controllers\FreelancerController::class, 'reviews'])->name('rating.all_rating');
Route::post('rating/freelancer', [App\Http\Controllers\FreelancerController::class, 'sendRating'])->name('rating.freelancer');

// RATING OF EMPLOYER
Route::get('rating/employer/{id}', [App\Http\Controllers\EmployerCommentController::class, 'employerRating'])->name('rating.employer');
Route::post('rating/employer', [App\Http\Controllers\EmployerCommentController::class, 'sendEmployer'])->name('rating.send.employer');
Route::get('all/rating/employer/{id}', [App\Http\Controllers\EmployerCommentController::class, 'reviews_employer'])->name('rating.all_rating_employer');

// MAIL SMTP
Route::get('/contact', [App\Http\Controllers\MailSendController::class, 'index'])->name('admin.contact');
Route::post('/contact', [App\Http\Controllers\MailSendController::class, 'sendEmail'])->name('admin.send.email');

// LOCKSCREEN
Route::get('/lockscreen', function () {
    return view('auth.user_login');
})->name('lockscreen')->middleware('auth');

Route::post('/unlock', function (Request $request) {
    $request->validate([
        'password' => 'required',
    ]);

    $user = Auth::user();

    if (password_verify($request->password, $user->password)) {
        session()->put('unlocked', true);
        session()->flash('success', 'Successfully logged in!');
        return redirect()->intended('/');
    }

    session()->flash('notification', [
        'message' => 'Wrong credentials',
        'alert-type' => 'error'
    ]);
    
    return redirect()->back();
})->name('unlock');


?>
