<?php
namespace App\Controllers;
use Core\Controller;
use Core\Auth;
use App\Models\Blog;

class BlogAdminController extends Controller {
    public function __construct() {
        Auth::requirePermission('blog');
        $role = $_SESSION['user_role'] ?? '';
        if (in_array($role, ['admin', 'owner']) && empty($_SESSION['admin_pin_verified'])) {
            header("Location: " . APP_URL . "/admin/verify");
            exit;
        }
    }

    public function index() {
        $model = new Blog();
        $blogs = $model->all();
        $this->view('admin/layout', [
            'title' => 'Bloq İdarəedilməsi',
            'contentView' => 'admin/blog/index',
            'blogs' => $blogs
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['csrf_token'] ?? '';
            if (!\Core\Security::verifyCsrfToken($token)) {
                $_SESSION['error'] = 'Təhlükəsizlik xətası (CSRF).';
                $this->redirect('/admin/blog');
                exit;
            }

            $data = [
                'title' => $_POST['title_az'] ?? '',
                'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title_az']))),
                'title_en' => $_POST['title_en'] ?? '',
                'title_ru' => $_POST['title_ru'] ?? '',
                'content' => $_POST['content_az'] ?? '',
                'content_en' => $_POST['content_en'] ?? '',
                'content_ru' => $_POST['content_ru'] ?? '',
                'cover_image' => '',
                'thumbnail_image' => ''
            ];

            $allowedExts = ['jpg', 'jpeg', 'png', 'webp', 'svg'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $allowedExts)) {
                    $filename = 'blog_' . uniqid() . '.' . $ext;
                    $uploadDir = UPLOAD_PATH . '/';
                    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $filename)) {
                        $data['cover_image'] = $filename;
                    }
                }
            }
            
            if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
                $ext = strtolower(pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $allowedExts)) {
                    $filename = 'blog_thumb_' . uniqid() . '.' . $ext;
                    $uploadDir = UPLOAD_PATH . '/';
                    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                    if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploadDir . $filename)) {
                        $data['thumbnail_image'] = $filename;
                    }
                }
            }

            $model = new Blog();
            $model->create($data);
            $this->redirect('/admin/blog');
        }

        $this->view('admin/layout', [
            'title' => 'Yeni Bloq Yazısı',
            'contentView' => 'admin/blog/create'
        ]);
    }

    public function edit($id) {
        $model = new Blog();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['csrf_token'] ?? '';
            if (!\Core\Security::verifyCsrfToken($token)) {
                $_SESSION['error'] = 'Təhlükəsizlik xətası (CSRF).';
                $this->redirect('/admin/blog');
                exit;
            }

            $data = [
                'title' => $_POST['title_az'] ?? '',
                'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title_az']))),
                'title_en' => $_POST['title_en'] ?? '',
                'title_ru' => $_POST['title_ru'] ?? '',
                'content' => $_POST['content_az'] ?? '',
                'content_en' => $_POST['content_en'] ?? '',
                'content_ru' => $_POST['content_ru'] ?? ''
            ];

            $allowedExts = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
            $oldBlog = $model->find($id);

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $allowedExts)) {
                    $filename = 'blog_' . uniqid() . '.' . $ext;
                    $uploadDir = UPLOAD_PATH . '/';
                    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $filename)) {
                        if ($oldBlog && $oldBlog['cover_image'] && file_exists($uploadDir . $oldBlog['cover_image'])) {
                            unlink($uploadDir . $oldBlog['cover_image']);
                        }
                        $data['cover_image'] = $filename;
                    }
                }
            }

            if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
                $ext = strtolower(pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $allowedExts)) {
                    $filename = 'blog_thumb_' . uniqid() . '.' . $ext;
                    $uploadDir = UPLOAD_PATH . '/';
                    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                    if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploadDir . $filename)) {
                        if ($oldBlog && $oldBlog['thumbnail_image'] && file_exists($uploadDir . $oldBlog['thumbnail_image'])) {
                            unlink($uploadDir . $oldBlog['thumbnail_image']);
                        }
                        $data['thumbnail_image'] = $filename;
                    }
                }
            }

            $model->update($id, $data);
            $this->redirect('/admin/blog');
        }

        $blog = $model->find($id);
        $this->view('admin/layout', [
            'title' => 'Bloqu Redaktə Et',
            'contentView' => 'admin/blog/edit',
            'blog' => $blog
        ]);
    }

    public function delete($id) {
        $token = $_GET['token'] ?? '';
        if (!\Core\Security::verifyCsrfToken($token)) {
            $_SESSION['error'] = 'Təhlükəsizlik xətası (CSRF).';
            $this->redirect('/admin/blog');
            exit;
        }

        $model = new Blog();
        $oldBlog = $model->find($id);
        if ($oldBlog) {
            $uploadDir = UPLOAD_PATH . '/';
            if ($oldBlog['cover_image'] && file_exists($uploadDir . $oldBlog['cover_image'])) {
                unlink($uploadDir . $oldBlog['cover_image']);
            }
            if ($oldBlog['thumbnail_image'] && file_exists($uploadDir . $oldBlog['thumbnail_image'])) {
                unlink($uploadDir . $oldBlog['thumbnail_image']);
            }
        }
        $model->delete($id);
        $this->redirect('/admin/blog');
    }
}
