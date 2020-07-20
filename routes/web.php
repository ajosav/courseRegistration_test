<?php
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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/recommendation', 'RecommendationController');
Route::post('/course_registration', 'RecommendationController@findCourses');
Route::get('{path}', 'HomeController@index')->where('[path]', '/([A-z\d-\/_.]+)?/');


// Route::get('/productrec', function () {
//     $products        = json_decode(file_get_contents(storage_path('data/products-data.json')));
//     $selectedId      = intval(app('request')->input('id') ?? '8');
//     $selectedProduct = $products[0];

//     $selectedProducts = array_filter($products, function ($product) use ($selectedId) { return $product->id === $selectedId; });
//     if (count($selectedProducts)) {
//         $selectedProduct = $selectedProducts[array_keys($selectedProducts)[0]];
//     }

//     $productSimilarity = new App\ProductSimilarity($products);
//     $similarityMatrix  = $productSimilarity->calculateSimilarityMatrix();
//     $products          = $productSimilarity->getCoursesSortedBySimularity($selectedId, $similarityMatrix);
    
//     return view('productrec', compact('selectedId', 'selectedProduct', 'products'));
// });

Route::get('/courserec', function () {
    $courses         = json_decode(file_get_contents(storage_path('data/electives-data.json')));
    $selectedId      = intval(app('request')->input('id') ?? '8');
    $elective        = DB::table('electives')->max('reg_count');
    $selectedCourse  = DB::table('electives')->where('reg_count', '=', $elective)->first();
    $selectedCourses = array_filter($courses, function ($course) use ($selectedId) { return $course->id === $selectedId; });
    if (count($selectedCourses)) {
        $selectedcourse = $selectedCourses[array_keys($selectedCourses)[0]];
    }

    $courseSimilarity = new App\electiveSimilarity($courses);
    $similarityMatrix  = $courseSimilarity->calculateSimilarityMatrix();
    $courses          = $courseSimilarity->getcoursesSortedBySimularity($selectedId, $similarityMatrix);
    $semester         = 2;
    return view('courserec', compact('selectedId', 'selectedCourse', 'courses', 'semester'));
});