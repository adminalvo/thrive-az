<?php
namespace App\Controllers;
use Core\Controller;
use Core\Auth;
use App\Models\Course;

class CourseAdminController extends Controller {
    public function __construct() {
        Auth::requirePermission('courses');
        
        $role = $_SESSION['user_role'] ?? '';
        if (in_array($role, ['admin', 'owner']) && empty($_SESSION['admin_pin_verified'])) {
            header("Location: " . APP_URL . "/admin/verify");
            exit;
        }
    }

    public function index() {
        $model = new Course();
        $courses = $model->all();
        $this->view('admin/layout', [
            'title' => 'Kursların İdarəedilməsi',
            'contentView' => 'admin/courses/index',
            'courses' => $courses
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['csrf_token'] ?? '';
            if (!\Core\Security::verifyCsrfToken($token)) {
                $_SESSION['error'] = 'Təhlükəsizlik xətası (CSRF).';
                $this->redirect('/admin/courses');
                exit;
            }

            $data = [
                'title' => $_POST['title_az'] ?? '',
                'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title_az']))),
                'title_en' => $_POST['title_en'] ?? '',
                'title_ru' => $_POST['title_ru'] ?? '',
                'short_desc' => $_POST['short_desc_az'] ?? '',
                'short_desc_en' => $_POST['short_desc_en'] ?? '',
                'short_desc_ru' => $_POST['short_desc_ru'] ?? '',
                'content' => $_POST['content_az'] ?? '',
                'content_en' => $_POST['content_en'] ?? '',
                'content_ru' => $_POST['content_ru'] ?? '',
                'image' => ''
            ];

            $allowedExts = ['jpg', 'jpeg', 'png', 'webp'];

            // Media Upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $allowedExts)) {
                    $filename = 'course_' . uniqid() . '.' . $ext;
                    $uploadDir = UPLOAD_PATH . '/';
                    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                    if ($this->resizeImage($_FILES['image']['tmp_name'], $uploadDir . $filename)) {
                        $data['image'] = $filename;
                    }
                }
            }

            $model = new Course();
            $model->create($data);
            $this->redirect('/admin/courses');
        }

        $this->view('admin/layout', [
            'title' => 'Yeni Kurs Əlavə Et',
            'contentView' => 'admin/courses/create'
        ]);
    }

    public function edit($id) {
        $model = new Course();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['csrf_token'] ?? '';
            if (!\Core\Security::verifyCsrfToken($token)) {
                $_SESSION['error'] = 'Təhlükəsizlik xətası (CSRF).';
                $this->redirect('/admin/courses');
                exit;
            }

            $data = [
                'title' => $_POST['title_az'] ?? '',
                'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['title_az']))),
                'title_en' => $_POST['title_en'] ?? '',
                'title_ru' => $_POST['title_ru'] ?? '',
                'short_desc' => $_POST['short_desc_az'] ?? '',
                'short_desc_en' => $_POST['short_desc_en'] ?? '',
                'short_desc_ru' => $_POST['short_desc_ru'] ?? '',
                'content' => $_POST['content_az'] ?? '',
                'content_en' => $_POST['content_en'] ?? '',
                'content_ru' => $_POST['content_ru'] ?? ''
            ];

            $allowedExts = ['jpg', 'jpeg', 'png', 'webp'];
            $oldCourse = $model->find($id);

            // Media Upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $allowedExts)) {
                    $filename = 'course_' . uniqid() . '.' . $ext;
                    $uploadDir = UPLOAD_PATH . '/';
                    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                    if ($this->resizeImage($_FILES['image']['tmp_name'], $uploadDir . $filename)) {
                        if ($oldCourse && $oldCourse['image'] && file_exists($uploadDir . $oldCourse['image'])) {
                            unlink($uploadDir . $oldCourse['image']);
                        }
                        $data['image'] = $filename;
                    }
                }
            }

            $model->update($id, $data);
            $this->redirect('/admin/courses');
        }

        $course = $model->find($id);
        $this->view('admin/layout', [
            'title' => 'Kursu Redaktə Et',
            'contentView' => 'admin/courses/edit',
            'course' => $course
        ]);
    }

    public function delete($id) {
        $token = $_GET['token'] ?? '';
        if (!\Core\Security::verifyCsrfToken($token)) {
            $_SESSION['error'] = 'Təhlükəsizlik xətası (CSRF).';
            $this->redirect('/admin/courses');
            exit;
        }

        $model = new Course();
        $oldCourse = $model->find($id);
        if ($oldCourse) {
            $uploadDir = UPLOAD_PATH . '/';
            if ($oldCourse['image'] && file_exists($uploadDir . $oldCourse['image'])) {
                unlink($uploadDir . $oldCourse['image']);
            }
        }
        $model->delete($id);
        $this->redirect('/admin/courses');
    }

    public function duplicate($id) {
        $model = new Course();
        $course = $model->find($id);
        if ($course) {
            unset($course['id']); // Remove the ID so it creates a new record
            $course['title'] = $course['title'] . ' (Kopya)';
            if(isset($course['title_az'])) $course['title_az'] = $course['title_az'] . ' (Kopya)';
            $course['slug'] = $course['slug'] . '-kopya-' . time(); // Make slug unique
            $model->create($course);
        }
        $this->redirect('/admin/courses');
    }

    private function resizeImage($tmpName, $destination) {
        $targetWidth = 800;
        $targetHeight = 600;
        list($origWidth, $origHeight, $type) = getimagesize($tmpName);
        $sourceImage = null;
        switch ($type) {
            case IMAGETYPE_JPEG: $sourceImage = imagecreatefromjpeg($tmpName); break;
            case IMAGETYPE_PNG: $sourceImage = imagecreatefrompng($tmpName); break;
            case IMAGETYPE_GIF: $sourceImage = imagecreatefromgif($tmpName); break;
            case IMAGETYPE_WEBP: $sourceImage = imagecreatefromwebp($tmpName); break;
        }
        
        if (!$sourceImage) {
            return move_uploaded_file($tmpName, $destination);
        }

        $targetRatio = $targetWidth / $targetHeight;
        $origRatio = $origWidth / $origHeight;

        if ($targetRatio > $origRatio) {
            $newWidth = $origWidth;
            $newHeight = $origWidth / $targetRatio;
        } else {
            $newHeight = $origHeight;
            $newWidth = $origHeight * $targetRatio;
        }

        $srcX = ($origWidth - $newWidth) / 2;
        $srcY = ($origHeight - $newHeight) / 2;

        $targetImage = imagecreatetruecolor($targetWidth, $targetHeight);
        
        if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_WEBP) {
            imagecolortransparent($targetImage, imagecolorallocatealpha($targetImage, 0, 0, 0, 127));
            imagealphablending($targetImage, false);
            imagesavealpha($targetImage, true);
        }

        imagecopyresampled($targetImage, $sourceImage, 0, 0, $srcX, $srcY, $targetWidth, $targetHeight, $newWidth, $newHeight);

        $result = false;
        switch ($type) {
            case IMAGETYPE_JPEG: $result = imagejpeg($targetImage, $destination, 90); break;
            case IMAGETYPE_PNG: $result = imagepng($targetImage, $destination); break;
            case IMAGETYPE_GIF: $result = imagegif($targetImage, $destination); break;
            case IMAGETYPE_WEBP: $result = imagewebp($targetImage, $destination, 90); break;
        }

        imagedestroy($sourceImage);
        imagedestroy($targetImage);
        
        if (!$result) {
            return move_uploaded_file($tmpName, $destination);
        }
        return true;
    }
}
