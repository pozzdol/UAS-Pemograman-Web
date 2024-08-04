<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Controller;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Telegram;
use App\Models\PasswordResetModel;

class Auth extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess()
    {
        $adminModel = new AdminModel();

        $username = $this->request->getVar('username');
        $phone = $this->request->getVar('phone');
        $password = $this->request->getVar('password');
        $passwordConfirm = $this->request->getVar('password_confirm');

        // Check if password and confirm password match
        if ($password !== $passwordConfirm) {
            return redirect()->back()->with('error', 'Password and Confirm Password do not match.')->withInput();
        }

        // Check if username or phone already exists
        if ($adminModel->where('username', $username)->first()) {
            return redirect()->back()->with('error', 'Username already exists.')->withInput();
        }

        if ($adminModel->where('phone', $phone)->first()) {
            return redirect()->back()->with('error', 'Phone number already exists.')->withInput();
        }

        $data = [
            'username' => $username,
            'phone' => $phone,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'nama_lengkap' => $this->request->getVar('nama_lengkap')
        ];

        $adminModel->save($data);
        return redirect()->to('/auth/login')->with('success', 'Registration successful.');
    }

    public function login()
    {
        return view('auth/login');
    }

    public function loginProcess()
    {
        $adminModel = new AdminModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $admin = $adminModel->where('username', $username)->orWhere('phone', $username)->first();

        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                session()->set([
                    'username' => $admin['username'],
                    'nama_lengkap' => $admin['nama_lengkap'],
                    'logged_in' => true
                ]);
                return redirect()->to('/dashboard');
            } else {
                return redirect()->back()->with('error', 'Invalid Password');
            }
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }

    public function forgotPassword()
    {
        return view('auth/forgot_password');
    }

    public function forgotPasswordProcess()
    {
        $adminModel = new AdminModel();
        $passwordResetModel = new PasswordResetModel();

        $phone = $this->request->getVar('phone');
        $admin = $adminModel->where('phone', $phone)->first();

        if (!$admin) {
            return redirect()->back()->with('error', 'Phone number not found');
        }

        $token = bin2hex(random_bytes(50));
        $expires_at = Time::now()->addHours(1);

        $passwordResetModel->insert([
            'phone' => $phone,
            'token' => $token,
            'expires_at' => $expires_at
        ]);

        $resetLink = base_url("auth/resetPassword?token=$token");

        // Kirim pesan Telegram
        $telegram = new Telegram('7364439474:AAHicFDYEaV-yVCaYOTLndw6YBPLvhnfqoI', 'reserPassword_bot');
        $message = "Click this link to reset your password: $resetLink";

        $data = [
            'chat_id' => $phone, // Assume phone number is used as chat_id
            'text'    => $message,
        ];

        $result = Request::sendMessage($data);

        if ($result->isOk()) {
            return redirect()->back()->with('success', 'Password reset link has been sent to your Telegram.');
        } else {
            return redirect()->back()->with('error', 'Failed to send Telegram message. Please try again.');
        }
    }

    public function resetPassword()
    {
        $token = $this->request->getVar('token');
        return view('auth/reset_password', ['token' => $token]);
    }

    public function resetPasswordProcess()
    {
        $passwordResetModel = new PasswordResetModel();
        $adminModel = new AdminModel();

        $token = $this->request->getVar('token');
        $password = $this->request->getVar('password');
        $passwordConfirm = $this->request->getVar('password_confirm');

        // Check if password and confirm password match
        if ($password !== $passwordConfirm) {
            return redirect()->back()->with('error', 'Password and Confirm Password do not match.')->withInput();
        }

        $passwordReset = $passwordResetModel->where('token', $token)->first();

        if (!$passwordReset || Time::now()->isAfter($passwordReset['expires_at'])) {
            return redirect()->back()->with('error', 'Token is invalid or has expired');
        }

        $admin = $adminModel->where('phone', $passwordReset['phone'])->first();

        $adminModel->update($admin['id'], ['password' => password_hash($password, PASSWORD_DEFAULT)]);

        $passwordResetModel->where('phone', $passwordReset['phone'])->delete();

        return redirect()->to('/auth/login')->with('success', 'Password has been reset successfully.');
    }
}
