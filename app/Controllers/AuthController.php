<?php
namespace App\Controllers;
use Core\Controller;
use Core\Database;
use Core\Auth;

class AuthController extends Controller {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                $error = "Məlumatları tam doldurun.";
            } else {
                $db = Database::getInstance();
                $stmt = $db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
                $stmt->execute(['email' => $email]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password'])) {
                    Auth::login($user);
                    $this->redirect('/');
                } else {
                    $error = "E-mail və ya şifrə yanlışdır.";
                }
            }
        }

        $this->view('layout', [
            'title' => 'Giriş | ' . APP_NAME,
            'contentView' => 'pages/login',
            'error' => $error ?? null
        ]);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $surname = $_POST['surname'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $password = $_POST['password'] ?? '';
            $idSerial = strtoupper(trim($_POST['id_serial'] ?? ''));
            $dob = $_POST['dob'] ?? null;

            if (empty($finCode) || !preg_match('/^[A-Z0-9]{7}$/', $finCode)) {
                $error = "FİN Kod düzgün formatda deyil (7 simvol).";
            } elseif (empty($idSerial) || !preg_match('/^(AZE\d{8}|AA\d{7})$/', $idSerial)) {
                $error = "Seriya nömrəsi düzgün formatda deyil (məs: AA1234567).";
            } elseif (empty($dob)) {
                $error = "Doğum tarixi daxil edilməlidir.";
            } else {
                if ($role === 'parent') {
                    // Check age >= 18
                    try {
                        $birthDate = new \DateTime($dob);
                        $today = new \DateTime('today');
                        $age = $birthDate->diff($today)->y;
                        if ($age < 18) {
                            $error = "Valideyn qeydiyyatı üçün yaşınız 18-dən yuxarı olmalıdır.";
                        }
                    } catch (\Exception $e) {
                        $error = "Doğum tarixi düzgün deyil.";
                    }
                }
            }
            
            if (!isset($error)) {
                $db = Database::getInstance();
                $stmt = $db->prepare("SELECT id FROM users WHERE email = :email LIMIT 1");
                $stmt->execute(['email' => $email]);
                if ($stmt->fetch()) {
                    $error = "Bu e-mail artıq mövcuddur.";
                } else {
                    $hashed = password_hash($password, PASSWORD_BCRYPT);
                    $stmt = $db->prepare("INSERT INTO users (name, surname, email, phone, password, role, dob, fin_code, id_serial) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    if ($stmt->execute([$name, $surname, $email, $phone, $hashed, $role, $dob, $finCode, $idSerial])) {
                        $user_id = $db->lastInsertId();
                        Auth::login(['id' => $user_id, 'role' => $role, 'name' => $name]);
                        $this->redirect('/');
                    } else {
                        $error = "Qeydiyyat zamanı xəta baş verdi.";
                    }
                }
            }
        }

        $this->view('layout', [
            'title' => 'Qeydiyyat | ' . APP_NAME,
            'contentView' => 'pages/register',
            'error' => $error ?? null
        ]);
    }

    public function adminLogin() {
        if (!isset($_SESSION['admin_lang_selected'])) {
            if (isset($_GET['lang_select']) && in_array($_GET['lang_select'], ['az', 'ru'])) {
                \Core\Language::setLang($_GET['lang_select']);
                $_SESSION['admin_lang_selected'] = true;
                $this->redirect('/admin/login');
                return;
            }
            $this->view('admin/select_lang');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $db = Database::getInstance();
            $stmt = $db->prepare("SELECT * FROM users WHERE email = :email AND role IN ('admin', 'owner', 'blog_writer', 'content_creator') LIMIT 1");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                Auth::login($user);
                $this->redirect('/admin/dashboard');
            } else {
                $error = "E-mail və ya şifrə yanlışdır.";
            }
        }

        $this->view('admin/login', ['error' => $error ?? null]);
    }

    public function logout() {
        Auth::logout();
        $this->redirect('/');
    }
}
