<?php
// Routes

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/', \App\Controllers\Frontend\HomeController::class . ':index')->setName('home');

$app->get('/kategoriler/{category}/{type}', '')->setName('book-categories');

$app->get('/basili-kitaplar', \App\Controllers\Frontend\HardcopyController::class . ':index')->setName('hardcopies');
$app->get('/basili-kitaplar/{isbn}', \App\Controllers\Frontend\HardcopyController::class . ':show')->setName('hardcopies.show');

$app->get('/backend/login', \App\Controllers\AuthController::class . ':index')->setName('backend.login');
$app->post('/backend/authentication', \App\Controllers\AuthController::class . ':authentication')->setName('backend.authentication');
$app->get('/backend/logout', \App\Controllers\AuthController::class . ':logout')->setName('backend.logout');

$app->group('/backend', function () use ($app) {
    $app->get('[/]', function (Request $request, Response $response) {
        return $this->view->render($response, 'backend/index.twig');
    });

    $app->post('/uploads/image', \App\Controllers\UploadController::class . ':image')->setName('backend.uploads.image');
    $app->post('/uploads/video', \App\Controllers\UploadController::class . ':video')->setName('backend.uploads.video');
    $app->post('/uploads/ebook', \App\Controllers\UploadController::class . ':ebook')->setName('backend.uploads.ebook-preview');

    /**
     * Kullanıcılar
     */
    $app->get('/users', \App\Controllers\UserController::class . ':index')->setName('backend.users');
    $app->get('/users/{id}', \App\Controllers\UserController::class . ':show')->setName('backend.users.show');

    /**
     * Basılı Kitaplar
     */
    $app->get('/hardcopies', \App\Controllers\Hardcopycontroller::class . ':index')->setName('backend.hardcopies');

    /**
     * E-kitaplar
     */
    $app->get('/ebooks[/]', \App\Controllers\EbookController::class . ':index')->setName('backend.ebooks');
    $app->get('/ebooks/create[/]', \App\Controllers\EbookController::class . ':create')->setName('backend.ebooks.create');
    $app->post('/ebooks[/]', \App\Controllers\EbookController::class . ':store')->setName('backend.ebooks.store');
    $app->get('/ebooks/{isbn}', \App\Controllers\EbookController::class . ':show')->setName('backend.ebooks.show');
    $app->put('/ebooks/{isbn}', \App\Controllers\EbookController::class . ':update')->setName('backend.ebooks.update');
    $app->put('/ebooks/{isbn}/status', \App\Controllers\EbookController::class . ':status')->setName('backend.ebooks.status');
    $app->delete('/ebooks/{isbn}', \App\Controllers\EbookController::class . ':delete')->setName('backend.ebooks.delete');

    /**
     * Gardner kitapları
     */
    $app->get('/gardners[/]', \App\Controllers\GardnerController::class . ':index')->setName('backend.gardners');
    $app->get('/gardners/{isbn}', \App\Controllers\GardnerController::class . ':show')->setName('backend.gardners.show');
    $app->put('/gardners/{isbn}', \App\Controllers\GardnerController::class . ':update')->setName('backend.gardners.update');
    $app->put('/gardners/{isbn}/status', \App\Controllers\GardnerController::class . ':status')->setName('backend.gardners.status');

    /**
     * Street Lib kitapları
     */
    $app->get('/street-libs[/]', \App\Controllers\StreetLibController::class . ':index')->setName('backend.street-libs');
    $app->get('/street-libs/{isbn}', \App\Controllers\StreetLibController::class . ':show')->setName('backend.street-libs.show');
    $app->put('/street-libs/{isbn}', \App\Controllers\StreetLibController::class . ':update')->setName('backend.street-libs.update');
    $app->put('/street-libs/{isbn}/status', \App\Controllers\StreetLibController::class . ':status')->setName('backend.street-libs.status');

    /**
     * Kitap kategoriler
     */
    $app->get('/book-categories[/]', \App\Controllers\BookCategoryController::class . ':index')->setName('backend.book-categories');
    $app->get('/book-categories/create[/]', \App\Controllers\BookCategoryController::class . ':create')->setName('backend.book-categories.create');
    $app->post('book-categories[/]', \App\Controllers\BookCategoryController::class . ':store')->setName('backend.book-categories.store');
    $app->get('/book-categories/{id}', \App\Controllers\BookCategoryController::class . ':show')->setName('backend.book-categories.show');
    $app->put('/book-categories/{id}', \App\Controllers\BookCategoryController::class . ':update')->setName('backend.book-categories.update');
    $app->put('/book-categories/{id}/up', \App\Controllers\BookCategoryController::class . ':up')->setName('backend.book-categories.up');
    $app->put('/book-categories/{id}/down', \App\Controllers\BookCategoryController::class . ':down')->setName('backend.book-categories.down');
    $app->delete('/book-categories/{id}', \App\Controllers\BookCategoryController::class . ':delete')->setName('backend.book-categories.delete');

    /**
     * Alegori
     */
    $app->get('/allegories[/]', \App\Controllers\AllegoryController::class . ':index')->setName('backend.allegories');
    $app->get('/allegories/create[/]', \App\Controllers\AllegoryController::class . ':create')->setName('backend.allegories.create');
    $app->post('/allegories[/]', \App\Controllers\AllegoryController::class . ':store')->setName('backend.allegories.store');
    $app->get('/allegories/{id}', \App\Controllers\AllegoryController::class . ':show')->setName('backend.allegories.show');
    $app->put('/allegories/{id}', \App\Controllers\AllegoryController::class . ':update')->setName('backend.allegories.update');
    $app->put('/allegories/{id}/status', \App\Controllers\AllegoryController::class . ':status')->setName('backend.allegories.status');
    $app->delete('/allegories/{id}', \App\Controllers\AllegoryController::class . ':delete')->setName('backend.allegories.delete');

    /**
     * Yazılar
     */
    $app->get('/posts[/]', \App\Controllers\PostController::class . ':index')->setName('backend.posts');
    $app->get('/posts/create', \App\Controllers\PostController::class . ':create')->setName('backend.posts.create');
    $app->post('/posts[/]', \App\Controllers\PostController::class . ':store')->setName('backend.posts.store');
    $app->get('/posts/{id}', \App\Controllers\PostController::class . ':show')->setName('backend.posts.show');
    $app->put('/posts/{id}', \App\Controllers\PostController::class . ':update')->setName('backend.posts.update');
    $app->put('/posts/{id}/status', \App\Controllers\PostController::class . ':status')->setName('backend.posts.status');
    $app->put('/posts/{id}/up', \App\Controllers\PostController::class . ':up')->setName('backend.posts.up');
    $app->put('/posts/{id}/down', \App\Controllers\PostController::class . ':down')->setName('backend.posts.down');
    $app->delete('/posts/{id}', \App\Controllers\PostController::class . ':delete')->setName('backend.posts.delete');

    /**
     * Videolar
     */
    $app->get('/videos[/]', \App\Controllers\VideoController::class . ':index')->setName('backend.videos');
    $app->get('/videos/create[/]', \App\Controllers\VideoController::class . ':create')->setName('backend.videos.create');
    $app->post('/videos[/]', \App\Controllers\VideoController::class . ':store')->setName('backend.videos.store');
    $app->get('/videos/{id}', \App\Controllers\VideoController::class . ':show')->setName('backend.videos.show');
    $app->put('/videos/{id}', \App\Controllers\VideoController::class . ':update')->setName('backend.videos.update');
    $app->put('/videos/{id}/status', \App\Controllers\VideoController::class . ':status')->setName('backend.videos.status');

    /**
     * Video kategoriler
     */
    $app->get('/video-categories[/]', \App\Controllers\VideoCategoryController::class . ':index')->setName('backend.video-categories');
    $app->get('/video-categories/create[/]', \App\Controllers\VideoCategoryController::class . ':create')->setName('backend.video-categories.create');
    $app->post('/video-categories[/]', \App\Controllers\VideoCategoryController::class . ':store')->setName('backend.video-categories.store');
    $app->get('/video-categories/{id}', \App\Controllers\VideoCategoryController::class . ':show')->setName('backend.video-categories.show');
    $app->put('/video-categories/{id}', \App\Controllers\VideoCategoryController::class . ':update')->setName('backend.video-categories.update');
    $app->put('/video-categories/{id}/status', \App\Controllers\VideoCategoryController::class . ':status')->setName('backend.video-categories.status');

    /**
     * Siparişler
     */
    $app->get('/orders[/]', \App\Controllers\OrderController::class . ':index')->setName('backend.orders');
    $app->get('/orders/{orderId}', \App\Controllers\OrderController::class . ':show')->setName('backend.orders.show');
    $app->put('/orders/{orderId}/invoice', \App\Controllers\OrderController::class . ':invoice')->setName('backend.orders.invoice');

    /**
     * Yorumlar
     */
    $app->get('/comments[/]', \App\Controllers\CommentController::class . ':index')->setName('backend.comments');
    $app->put('/comments/{id}/status', \App\Controllers\CommentController::class . ':status')->setName('backend.comments.status');

    /**
     * İçerikler
     */
    $app->get('/contents[/]', \App\Controllers\ContentController::class . ':index')->setName('backend.contents');
    $app->get('/contents/create[/]', \App\Controllers\ContentController::class . ':create')->setName('backend.contents.create');
    $app->post('/contents[/]', \App\Controllers\ContentController::class . ':store')->setName('backend.contents.store');
    $app->get('/contents/{id}', \App\Controllers\ContentController::class . ':show')->setName('backend.contents.show');
    $app->put('/contents/{id}', \App\Controllers\ContentController::class . ':update')->setName('backend.contents.update');
})->add(new \App\Middleware\Auth($app->getContainer()));
