<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Models\UserModel;

class Auth extends BaseController
{

    // Enabling features
    public function __construct()
    {
        helper(['url', 'form']);
    }


    /**
      *Register for login page view 
     */
    public function index()
    {
        return view('auth/login');
    }

    /**
      *Register for register page view 
     */
    public function register()
    {
        return view('auth/register');
    }

    /**
      *Save new user to database. 
     */

     public function registerUser()
     {
         // validate user input.

        //  $validated = $this->validate([
        //     'nameFirst'=> 'required',
        //     'nameLast'=> 'required',
        //     'email' =>  'required|valid_email',
        //     'password' => 'required|min_length[5]|max_length[20]',
        //     'passwordConfirm'=> 'required|min_length[5]|max_length[20]|matches[password]'
        //  ]);

        $validated = $this->validate([
            'firstname' => [
                'rules' => 'required',
                'error' => [
                    'required' => 'Nama awal anda dibutuhkan',
                ]
            ],
            'lastname'=> [
                'rules' => 'required',
                'error' => [
                    'required' => 'Nama akhir anda dibutuhkan',
                ]
            ],
            'email'=> [
                'rules' => 'required|valid_email',
                'error' => [
                    'required' => 'Nama email anda dibutuhkan',
                    'valid_email' => 'Email sudah ada.'
                ]
            ],
            'password'=> [
                'rules' => 'required|min_length[5]|max_length[20]',
                'error' => [
                    'required' => 'Password anda dibutuhkan',
                    'min_length' => 'Password harus 5 karakter.',
                    'max_length' => 'Password tidak bisa lebih dari 20 karakter'
                ]
            ],
            'passwordConfirm'=> [
                'rules' => 'required|min_length[5]|max_length[20]|matches[password]',
                'error' => [
                    'required' => 'Konfirmasi password anda dibutuhkan',
                    'min_length' => 'Password harus 5 karakter.',
                    'max_length' => 'Password tidak bisa lebih dari 20 karakter',
                    'matches' => 'Konfirmasi password harus sama dengan password',
                ]
            ],
        ]);

         if(!$validated)
         {
             return view('auth/register', ['validation' => $this->validator]);
         }

         // Here we save the user
         $firstname = $this->request->getPost('firstname');
         $lastname = $this->request->getPost('lastname');
         $email = $this->request->getPost('email');
         $password = $this->request->getPost('password');
         $passwordConfirm = $this->request->getPost('passwordConfirm');

         $data = [
             //'nameFirst' => $nameFirst,
             'firstname' => $firstname,
             //'nameLast' => $nameLast,
             'lastname' => $lastname,
             'email' => $email,
             'password' => Hash::encrypt($password)
         ];

         // Storing data
         $userModel = new \App\Models\UserModel();
         $query = $userModel->insert($data);

         if(!$query)
         {
            return redirect()->back()->with('fail', 'Saving user failed');
         }
         else
         {
            return redirect()->back()->with('success', 'Registered successfully');
         }

     }

     /**
      * User login method
      */
      public function loginUser()
      {
        // Validating user input

        $validated = $this->validate([
            // 'nameFirst' => [
            //     'rules' => 'required',
            //     'error' => [
            //         'required' => 'Nama awal anda dibutuhkan',
            //     ]
            // ],
            // 'nameLast'=> [
            //     'rules' => 'required',
            //     'error' => [
            //         'required' => 'Nama akhir anda dibutuhkan',
            //     ]
            // ],
            'email'=> [
                'rules' => 'required|valid_email',
                'error' => [
                    'required' => 'Nama email anda dibutuhkan',
                    'valid_email' => 'Email sudah ada.'
                ]
            ],
            'password'=> [
                'rules' => 'required|min_length[5]|max_length[20]',
                'error' => [
                    'required' => 'Password anda dibutuhkan',
                    'min_length' => 'Password harus 5 karakter.',
                    'max_length' => 'Password tidak bisa lebih dari 20 karakter'
                ]
            ],
        ]);

         if(!$validated)
         {
             return view('auth/login', ['validation' => $this->validator]);
         }
         else
         {
             // Checking user details in database.
             
             $email = $this->request->getPost('email');
             $password = $this->request->getPost('password');

             $userModel = new UserModel();
             $userInfo = $userModel->where('email', $email)->first();

             $checkPassword = Hash::check($password, $userInfo['password']);

             if(!$checkPassword)
             {
                 session()->setFlashdata('fail', 'Password yang dimasukan salah');
                 return redirect()->to('auth');
             }
             else
             {
                 // Process user info.
                 $userId = $userInfo['id'];
                 
                 session()->set('loggedInUser', $userId);
                 return redirect()->to('/dashboard');

             }
         }
      }

      /**
       * Upload user image
       */
      public function uploadImage()
      {
        try
        {
            $loggedInUserId = session()->get('loggedInUser');
            $config['upload_path'] = getcwd().'/images';
            $imageName = $this->request->getFile('userImage')->getName();
  
            // if Directory not present then create.
  
            if(!is_dir($config['upload_path']))
            {
                mkdir($config['upload_path'], 0777 );
            }
  
            // Get image.
  
            $img = $this->request->getFile('userImage');
  
            if(!$img->hasMoved() && $loggedInUserId)
            {
                $img->move($config['upload_path'], $imageName);
  
                $data = [
                    'avatar' => $imageName,
                ];
  
                $userModel = new UserModel();
                $userModel->update($loggedInUserId, $data);
  
  
                return redirect()->to('dashboard/index')->with('notification',
                  'Image Uploaded successfully'
              );
            }
            else
            {
              return redirect()->to('dashboard/index')->with('notification',
              'Image Uploaded failed'
            );
            }
  
  
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
      }

      /**
       * Log out the user.
       */
      public function logout()
      {
          if(session()->has('loggedInUser'))
          {
              session()->remove('loggedInUser');
          }

          return redirect()->to('/Auth?access=loggedout')->with('fail',
          'Anda telah logged out');
      }
      //1. display reset password form to input email
      public function forgotPassword(){
        //return file from view/auth/resetpass.php
        return view('auth/forgotpassword');
      }
      //2. accept email from user to send link reset password
      public function showLinkResetPassword(){
        return view('auth/linkreset');
      }
      //3. User click submit, pakai email untuk kirim link reset password
      //4. Tampilkan link reset password yang telah di email.
      public function newPassword(){
        return view('auth/newpassword');
      }
      //5. User klik link reset password
      //6. view reset password tampil, password baru, conform password bary, submit
      //7. Tampilkan Password anda telah berubah
      public function resetPasswordSuccess(){
        return view('auth/resetpasswordsuccess');
      }

}
