# 🏥 Hospital Management System (HMS)

A comprehensive, full-stack Hospital Management System designed to streamline medical facility operations and enhance patient interaction. Built with a robust PHP backend and a dynamic Bootstrap-powered frontend.

---

## 🚀 Features

### 🖥️ Admin Panel
- **Dashboard**: Overview of system statistics.
- **Dynamic Content Management**: Edit Home page content, background images, and about info directly from the UI.
- **Carousel Manager**: Manage the homepage promotional slides and descriptions.
- **Doctor Management**: Add, remove, and update doctor profiles including their professional details and portfolio links.
- **Service Management**: Categorize and list available medical services with dynamic updates.
- **Contact Control**: Update facility address, emails, and emergency contact numbers in real-time.
- **Inquiry/Feedback View**: Monitor and manage patient messages sent through the contact form.

### 🌐 Frontend (Patient Portal)
- **Responsive Design**: Fully optimized for mobile, tablet, and desktop viewing.
- **Service Directory**: Clean, categorized display of hospital services.
- **Doctor Directory**: List of medical specialists with direct links to their credentials.
- **Interactive Contact Form**: A built-in feedback system for patient inquiries.
- **Dynamic Landing Page**: Features a customizable carousel and real-time hospital info.

---

## 🛠️ Technology Stack

| Layer | Technologies |
|---|---|
| **Frontend** | HTML5, CSS3, JavaScript, jQuery, Bootstrap 5 |
| **Backend** | PHP (Native) |
| **Database** | MySQL |
| **Icons** | FontAwesome 5/6 |

---

## 📦 Installation & Setup

1. **Clone the Project**:
   ```bash
   git clone https://github.com/[your-username]/hospital-management-system.git
   ```

2. **Database Configuration**:
   - Create a database named `hospital_db` in your MySQL server (via phpMyAdmin or CLI).
   - Import the necessary tables (see Schema structure below if no .sql file is provided).

3. **Configure Connection**:
   Update the database credentials in both connection files:
   - `admin/db_connection.php`
   - `frontend/php/db_connection.php`

   ```php
   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "your_password";
   $dbname = "hospital_db";
   ```

4. **Run the Project**:
   - Place the project folder in your server's root directory (e.g., `htdocs` for XAMPP).
   - Access the frontend: `http://localhost/hospital/frontend/php/hospital.php`
   - Access the admin panel: `http://localhost/hospital/admin/login.php`

---

## 📊 Database Schema (Overview)

The system relies on the following key tables:

- **`display`**: Stores site-wide settings like titles, descriptions, and banner filenames.
- **`carousel`**: Manages sliding images on the homepage.
- **`doctorlist`**: Profiles for medical professionals.
- **`servicelist`**: Details of available medical services.
- **`feedback`**: Stores messages from the contact form.
- **`contact_address`, `contact_email`, `contact_mbl`**: Dynamic contact information.

---

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

---

*Made with ❤️ for better healthcare management.*

