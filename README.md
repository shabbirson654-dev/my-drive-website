# 📁 Drive Website

A responsive **cloud storage web application** built with **PHP, MySQL, Bootstrap, JavaScript, jQuery, AJAX, and PHPMailer**.

This project allows users to create accounts, verify their email, upload and manage files, download files, mark files as favourites, and manage their storage plans.

---

## 🚀 Features

### 👤 User Authentication

* User registration
* Email verification using a verification code
* Login and logout
* Session-based authentication
* Protected user pages
* User account management

### 📂 File Management

* Upload files
* View uploaded files
* Download files
* Delete files
* Add files to favourites
* Remove files from favourites
* Duplicate file checking
* Storage usage tracking
* File management through the user dashboard

### 💾 Storage Plans

The website supports different storage plans:

| Plan    | Storage |
| ------- | ------: |
| Start   |  100 MB |
| Premium |  300 MB |
| Golden  |  500 MB |

The system tracks:

* Total storage
* Used storage
* Remaining storage
* Current plan
* Plan expiry date

### 📧 Email Verification

The registration system uses **PHPMailer with SMTP** to send verification codes.

```text
Register
   ↓
Verification Code Generated
   ↓
Verification Email Sent
   ↓
User Enters Code
   ↓
Email Verified
   ↓
Account Ready
```

### ⚡ AJAX & jQuery

AJAX and jQuery are used for dynamic operations and a smoother user experience with fewer unnecessary page reloads.

### 📱 Responsive Design

The website is designed to work on:

* Desktop
* Laptop
* Tablet
* Mobile

---

# 🛠️ Technologies Used

### Frontend

* HTML5
* CSS3
* Bootstrap 5
* JavaScript
* jQuery
* AJAX
* Bootstrap Icons

### Backend

* PHP
* MySQL

### Email

* PHPMailer
* SMTP

### Development Environment

* XAMPP
* Laragon

---

# 📧 PHPMailer Setup

The project uses **PHPMailer** to send verification emails.

## 1. Download PHPMailer

Download PHPMailer from the official GitHub repository:

[PHPMailer GitHub Repository](https://github.com/PHPMailer/PHPMailer?utm_source=chatgpt.com)

Download the ZIP file and extract it.

You need the PHPMailer library files, including:

```text
Exception.php
PHPMailer.php
SMTP.php
```

Place PHPMailer in the location expected by your email configuration.

---

# 📮 Gmail SMTP Setup

You can use Gmail SMTP to send verification emails.

Use these settings:

| Setting             | Value              |
| ------------------- | ------------------ |
| SMTP Host           | `smtp.gmail.com`   |
| SMTP Port           | `587`              |
| Encryption          | `TLS`              |
| SMTP Authentication | `true`             |
| Username            | Your Gmail address |
| Password            | Gmail App Password |

Example:

```php
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'your-email@gmail.com';
$mail->Password   = 'YOUR_APP_PASSWORD';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port       = 587;
```

---

# 🔑 Gmail App Password

**Do not use your normal Gmail password in PHPMailer.**

For Gmail SMTP, create a **Google App Password**.

General process:

```text
Google Account
      ↓
Enable 2-Step Verification
      ↓
Open App Passwords
      ↓
Create an App Password
      ↓
Copy the generated password
      ↓
Use it in PHPMailer
```

Use the generated App Password here:

```php
$mail->Password = 'YOUR_APP_PASSWORD';
```

### ⚠️ Important

Never upload your real Gmail password or App Password to GitHub.

---

# ✉️ Email Configuration

Configure the sender and recipient:

```php
$mail->setFrom('your-email@gmail.com', 'Drive Website');
$mail->addAddress($user_email);
```

Replace:

```text
your-email@gmail.com
```

with the Gmail account you are using to send emails.

The recipient email should come from the user's registration information.

---

# 💻 How to Run with XAMPP

## 1. Install XAMPP

Download and install XAMPP.

Open the XAMPP Control Panel and start:

```text
Apache
MySQL
```

---

## 2. Add the Project

Copy the Drive Website project into:

```text
C:\xampp\htdocs\
```

For example:

```text
C:\xampp\htdocs\drive
```

---

## 3. Create the Database

Open phpMyAdmin:

```text
http://localhost/phpmyadmin
```

Create a database named:

```text
drive
```

Import the project's `.sql` database file into the `drive` database.

---

## 4. Configure Database Connection

Configure the database connection according to your XAMPP MySQL settings.

For the default XAMPP configuration:

```php
$db = new mysqli("localhost", "root", "", "drive");

if ($db->connect_error) {
    die("Connection failed");
}
```

If your MySQL account has a password, replace the empty password with your configured password.

---

## 5. Configure PHPMailer

Download PHPMailer and place it in the required location.

Configure your email settings:

```text
SMTP Host: smtp.gmail.com
SMTP Port: 587
Encryption: TLS
SMTP Authentication: Enabled
Username: Your Gmail address
Password: Gmail App Password
```

---

## 6. Run the Website

Open your browser:

```text
http://localhost/drive
```

The Drive Website should now be running on XAMPP.

---

# 🦁 How to Run with Laragon

## 1. Install Laragon

Download and install Laragon.

Start:

```text
Apache
MySQL
```

---

## 2. Add the Project

Copy the Drive Website project into:

```text
C:\laragon\www\
```

For example:

```text
C:\laragon\www\drive
```

---

## 3. Create the Database

Open Laragon's database management tool or phpMyAdmin.

Create a database named:

```text
drive
```

Import the project's `.sql` database file.

---

## 4. Configure Database Connection

For a default Laragon MySQL configuration:

```php
$db = new mysqli("localhost", "root", "", "drive");

if ($db->connect_error) {
    die("Connection failed");
}
```

If your Laragon MySQL username or password is different, update the connection accordingly.

---

## 5. Configure PHPMailer

Configure the Gmail SMTP settings:

```text
SMTP Host: smtp.gmail.com
SMTP Port: 587
Encryption: TLS
SMTP Authentication: Enabled
Username: Your Gmail address
Password: Gmail App Password
```

---

## 6. Run the Website

You can access the website using:

```text
http://localhost/drive
```

If Laragon's automatic virtual hosts are enabled, you can also use:

```text
http://drive.test
```

---

# 🧪 Testing Email Verification

After completing the SMTP configuration:

1. Start Apache and MySQL.
2. Open the Drive Website.
3. Go to registration.
4. Enter a valid email address.
5. Register the account.
6. Check your email.
7. Enter the verification code.
8. Complete the registration process.
9. Log in to the Drive Website.

If the email does not arrive, check:

* Spam/Junk folder
* Gmail address
* App Password
* SMTP host
* SMTP port
* SMTP encryption
* PHPMailer configuration
* PHPMailer file paths
* PHP error messages
* Internet connection

---

# 🔐 Security

For production use, additional security measures are recommended.

### Recommended Security Improvements

* Use `password_hash()` for passwords
* Use `password_verify()` for login
* Use prepared SQL statements
* Validate uploaded files
* Validate file size
* Restrict dangerous file types
* Protect uploaded files from unauthorized access
* Secure PHP sessions
* Add CSRF protection
* Use HTTPS
* Keep SMTP credentials private
* Validate user permissions before accessing files

---

# ⚠️ Protect Your Credentials

Never upload sensitive information to GitHub.

Do not commit:

```text
Gmail Password
Gmail App Password
Database Password
API Keys
SMTP Credentials
Private Configuration
```

Use environment variables or a private configuration file for production projects.

---

# 🔮 Future Improvements

Possible future improvements include:

* 💳 Payment gateway integration
* 📦 Premium plan purchasing
* 🔄 Automatic plan renewal
* 🔗 File sharing links
* 📁 Folder management
* 🔎 File search
* 🖼️ Image preview
* 📄 PDF preview
* ✏️ File renaming
* 📤 Multiple file upload
* 🖱️ Drag-and-drop upload
* 🗑️ Recycle bin
* 📊 Storage analytics
* 👨‍💼 Admin dashboard
* 🔐 Two-factor authentication
* ⏳ Expiring file-sharing links

---

# 🎯 Project Purpose

This project was developed as a **full-stack PHP/MySQL portfolio project** to demonstrate practical experience with:

* User authentication
* Email verification
* PHP backend development
* MySQL database management
* File upload and management
* Sessions
* Cookies
* CRUD operations
* AJAX
* jQuery
* Responsive web design
* Storage management
* PHPMailer
* SMTP integration

---

# 👨‍💻 Developer

**Shabbir Ahmad**

**Full-Stack Web Developer**

### Skills Demonstrated

```text
HTML5
CSS3
Bootstrap 5
JavaScript
jQuery
AJAX
PHP
MySQL
PHPMailer
SMTP
Responsive Web Design
```

---

# 📌 Project Status

**Completed ✅**

The Drive Website is a functional cloud-storage-style web application built for learning, portfolio demonstration, and further development.

It can be extended with payment systems, file sharing, folder management, advanced security, and additional storage features.
