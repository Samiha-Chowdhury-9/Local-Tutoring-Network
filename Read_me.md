# Local Tutoring Network

## Project Overview

The Local Tutoring Network is a web-based platform built with PHP and MySQL following the MVC (Model-View-Controller) architecture. It is designed to bridge the gap between students/guardians and qualified local tutors. The system allows users to find tutors based on specific subjects, book tutoring sessions, share educational resources, and manage administrative tasks.

## Features

### General Features (All Users)

* **Authentication:** Secure login, registration, and logout functionality.
* **Role-Based Access Control:** Distinct interfaces and permissions for Admins, Tutors, and Students.
* **Profile Management:** View, edit, and manage personal profile information.

### Admin Features

* **Dashboard:** Centralized control panel for platform management.
* **Tutor Management:** Review and approve or reject pending tutor registrations.
* **Subject Management:** Add or remove subjects available for tutoring.
* **Notifications:** Send system-wide broadcast messages to all users.

### Tutor Features

* **Schedule Management:** Add, view, and manage available time slots for tutoring sessions.
* **Resource Sharing:** Upload and manage study materials/files for students.
* **Feedback Tracking:** View ratings and reviews left by students.
* **Professional Profile:** Set hourly rates, educational background, subjects taught, and bio.

### Student & Guardian Features

* **Tutor Search:** Search and filter available tutors by subject dynamically (using AJAX).
* **Session Booking:** View a tutor's available slots and book tutoring sessions.
* **Resource Access:** Download study materials shared by tutors.
* **Reviews & Ratings:** Leave detailed reviews and rate tutors after sessions.

---

## Tech Stack

* **Frontend:** HTML5, CSS3, Vanilla JavaScript (AJAX for dynamic searches and validation)
* **Backend:** PHP (OOP/Procedural mix, Session Management)
* **Database:** MySQL
* **Architecture:** MVC (Model, View, Controller)

---

## Installation & Setup Instructions

Follow these steps to run the project on your local machine:

**1. Prerequisites**
Ensure you have a local server environment installed (such as **XAMPP**, **WAMP**, or **MAMP**) which includes PHP and MySQL.

**2. Clone/Move the Project**
Place the extracted `Local-Tutoring-Network` folder into your server's root directory:

* For XAMPP: `C:\xampp\htdocs\`
* For WAMP: `C:\wamp\www\`

**3. Database Setup**

* Open your web browser and go to `http://localhost/phpmyadmin/`.
* Create a new database named **`ltn`**.
* Import the provided **`ltn.sql`** file into this newly created database to set up the tables.

**4. Configuration**
If your MySQL setup uses a password (default XAMPP has no password), update the database credentials in the Model configuration file:

* Open `Model/m_dbConnect.php`
* Update the `$user` and `$pass` variables to match your local database credentials.

**5. Run the Application**
Open your web browser and navigate to:
http://localhost/Local-Tutoring-Network/Index.php