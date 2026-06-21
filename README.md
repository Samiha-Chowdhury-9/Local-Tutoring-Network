# Local Tutoring Network

## Project Overview

The **Local Tutoring Network** is a web-based platform built with PHP and MySQL following the MVC (Model-View-Controller) architecture. It is designed to bridge the gap between students or guardians and qualified local tutors.

The system allows users to find tutors based on specific subjects, book tutoring sessions, share educational resources, and manage administrative tasks.

## Technologies Used

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge\&logo=php\&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge\&logo=mysql\&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge\&logo=html5\&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge\&logo=css3\&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge\&logo=javascript\&logoColor=black)
![AJAX](https://img.shields.io/badge/AJAX-005571?style=for-the-badge\&logo=javascript\&logoColor=white)
![MVC](https://img.shields.io/badge/Architecture-MVC-8A2BE2?style=for-the-badge)

---

## Features

### General Features

* **Authentication:** Secure login, registration, and logout functionality.
* **Role-Based Access Control:** Distinct interfaces and permissions for admins, tutors, and students.
* **Profile Management:** View, edit, and manage personal profile information.

### Admin Features

* **Dashboard:** Centralized control panel for platform management.
* **Tutor Management:** Review and approve or reject pending tutor registrations.
* **Subject Management:** Add or remove subjects available for tutoring.
* **Notifications:** Send system-wide broadcast messages to all users.

### Tutor Features

* **Schedule Management:** Add, view, and manage available time slots for tutoring sessions.
* **Resource Sharing:** Upload and manage study materials and files for students.
* **Feedback Tracking:** View ratings and reviews left by students.
* **Professional Profile:** Set hourly rates, educational background, subjects taught, and bio.

### Student and Guardian Features

* **Tutor Search:** Search and dynamically filter available tutors by subject using AJAX.
* **Session Booking:** View a tutor's available time slots and book tutoring sessions.
* **Resource Access:** Download study materials shared by tutors.
* **Reviews and Ratings:** Leave detailed reviews and rate tutors after sessions.

---

## Installation and Setup

Follow these steps to run the project on your local machine.

### 1. Prerequisites

Make sure you have a local server environment installed, such as:

* XAMPP
* WAMP
* MAMP

The local server environment must include PHP and MySQL.

### 2. Clone or Move the Project

Clone the repository:

```bash
git clone https://github.com/Samiha-Chowdhury-9/Local-Tutoring-Network
```

Alternatively, download and extract the project folder.

Place the `Local-Tutoring-Network` folder inside your local server's root directory.

**For XAMPP:**

```text
C:\xampp\htdocs\
```

**For WAMP:**

```text
C:\wamp\www\
```

### 3. Database Setup

1. Start Apache and MySQL from your local server control panel.
2. Open your browser and visit:

```text
http://localhost/phpmyadmin/
```

3. Create a new database named:

```text
ltn
```

4. Select the newly created database.
5. Open the **Import** tab.
6. Import the provided `ltn.sql` file to create the required tables.

### 4. Database Configuration

The default XAMPP MySQL installation normally uses `root` as the username with no password.

When different credentials are being used, open:

```text
Model/m_dbConnect.php
```

Update the `$user` and `$pass` variables to match your MySQL credentials.

### 5. Run the Application

Open your browser and navigate to:

```text
http://localhost/Local-Tutoring-Network/Index.php
```
