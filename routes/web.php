<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AchievementController;
// use App\Http\Controllers\Admin\AssignRoleController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AssignRoleController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TourCategoriesController;
use App\Http\Controllers\Admin\ToursController;
use App\Http\Controllers\Admin\VisaCategoriesController;
use App\Http\Controllers\Admin\VisaController;
use App\Http\Controllers\Admin\StudyAbroadCategoriesController;
use App\Http\Controllers\Admin\StudyAbroadControlle;
use App\Http\Controllers\Admin\ConsultancyMedicineCategoriesController;
use App\Http\Controllers\Admin\ConsultancyMedicineController;
use App\Http\Controllers\UserDashboardController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectInfoController;

use App\Http\Controllers\WorkProcessController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CareerApplicationController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ReportController;
use App\Models\Booking;
use App\Models\Tours;
use Illuminate\Support\Facades\Auth;





use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[FrontendController::class,'index'])->name('frontend.index');
Route::get('/tour/{slug}', [FrontendController::class, 'show'])->name('tourDetails');
Route::get('/visas/{slug}',[FrontendController::class,'VisaDetail'])->name('visaDetail');
Route::get('/MedicineConsultancy/{slug}',[FrontendController::class,'MedicineDetail'])->name('medicineDetail');
Route::get('/studyAbroa/{slug}',[FrontendController::class,'studyDetail'])->name('StudyDetail');
Route::get('/toursCategory/{name}', [FrontendController::class, 'toursByCategory'])->name('categoryTours');
Route::get('/visaCategory/{name}', [FrontendController::class, 'visaByCategory'])->name('categoryVisas');
Route::get('/consultancyMedicineCategory/{name}', [FrontendController::class, 'consultancyMedicineByCategory'])->name('categoryConsultancyMedicine');
Route::get('/studyAbroadCategory/{name}', [FrontendController::class, 'studyAbroadByCategory'])->name('categoryStudyAbroad');
Route::get('/aboutUs', [FrontendController::class, 'aboutUs'])->name('frontendAbout');
Route::get('/teamMember', [FrontendController::class, 'teamMember'])->name('frontendTeamMember');
Route::get('teamMember/details/{name}', [FrontendController::class, 'teamMemberDetails'])->name('teamMemberDetails');
Route::get('/blog', [FrontendController::class, 'blog'])->name('frontendBlog');
Route::get('/blog/Details/{title}', [FrontendController::class, 'blogDetails'])->name('blogDetails');
// Route::get('visa/category/{name}', [FrontendController::class, 'visaByCategory'])->name('visa.by.category');
Route::get('study-abroad/category/{name}', [FrontendController::class, 'studyAbroadByCategory'])->name('studyabroad.by.category');
Route::get('consultancy/category/{name}', [FrontendController::class, 'consultancyByCategory'])->name('consultancy.by.category');
Route::get('/consultancy/{slug}', [FrontendController::class, 'consultancyShow'])->name('consultancyShow');

Route::get('contacts',[FrontendController::class, 'contact'])->name('frontendContact');
Route::post('contacts', [FrontendController::class, 'store'])->name('frontend.contactstore');

Route::get('/search/{name}', [FrontendController::class, 'search'])->name('tour.search');



Auth::routes();

// Route::middleware(['role:user'])->group(function () {

// });

// Protected routes (requires authentication)
Route::middleware('auth')->group(function () {

    // Home Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');
     Route::get('/user', [UserDashboardController::class, 'index'])->name('user');
     Route::get('tourBookingsReport', [HomeController::class,'BookingsReport'])->name('admin.reports.tours');

    //  Route::get('tourBookingsReport', [ReportController::class,'tourBookingsReport'])->name('tourBookingsReport');
     Route::get('/admin/reports/tour-bookings/export', [ReportController::class, 'exportTourBookings'])
                ->name('admin.reports.tour-bookings.export');
    Route::resource('bookings',BookingController::class);

    // SliderController
    Route::resource("sliders", SliderController::class);

    Route::resource('tour-categorics',TourCategoriesController::class);

    Route::resource('tours', ToursController::class);
    // Route::post('/book/service', [BookingController::class, 'store'])->name('book.service');


    Route::resource('visa-categories', VisaCategoriesController::class);
    Route::resource('visa', VisaController::class);
    Route::resource('consultancy-medicine-categories', ConsultancyMedicineCategoriesController::class);
    Route::resource('consultancy-medicine', ConsultancyMedicineController::class);

    Route::resource('study-abroad-categories', StudyAbroadCategoriesController::class);
    Route::resource('study-abroad', StudyAbroadControlle::class);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');


    //AboutController
    Route::resource('abouts',AboutController::class);

    //ClientController

    Route::resource('clients',ClientController::class);


    //ServiceController

    Route::resource('services', ServiceController::class);
//WorkProcessController
    Route::resource('works',WorkProcessController::class);


    //AchievementController
    Route::resource('achievements',AchievementController::class);

    //ManagementController
    Route::resource('managements',ManagementController::class);

    //DesignationController

    Route::resource('designations',DesignationController::class);

    //TeamMemberController

    Route::resource('teams',TeamMemberController::class);

    Route::resource('project-categories', ProjectCategoryController::class);


    Route::resource('projectinfo', ProjectInfoController::class);

    Route::resource('project',ProjectController::class);

       // AdminBlogController
    Route::resource("blogs", AdminBlogController::class);

    // AdminEventController
    Route::resource("events", AdminEventController::class);

    Route::resource('career', CareerController::class);

    Route::resource('career-apply', CareerApplicationController::class);

    Route ::resource('contact', ContactController::class);


    // Role Route
    Route::get('/dashboard/role', [RoleController::class,'index'])->name('role.index');
    Route::get('/dashboard/role/create', [RoleController::class,'create'])->name('role.create');
    Route::post('/dashboard/role/store', [RoleController::class,'store'])->name('role.store');
    Route::get('/dashboard/role/edit/{id}', [RoleController::class,'edit'])->name('role.edit');
    Route::put('/dashboard/role/update/{id}', [RoleController::class,'update'])->name('role.update');
    // Route::get('/dashboard/role/delete/{id}', [RoleController::class,'delete'])->name('role.delete');
    Route::delete('/dashboard/role/delete/{id}', [RoleController::class,'destroy'])->name('role.delete');


    // ==============================
    // Assign Role Management Routes
    // ==============================
    Route::get('/dashboard/assign-role', [AssignRoleController::class, 'index'])->name('assignrole.index');
    Route::post('/dashboard/assign-role/store', [AssignRoleController::class, 'assignRole'])->name('assignrole.store');

    Route::get("settings", [SettingController::class, "index"])->name("setting.index");
    Route::put("settings", [SettingController::class, "update"])->name("setting.update");


    Route::get('/chatbot', function () {
    return view('chatbot');
});


});
