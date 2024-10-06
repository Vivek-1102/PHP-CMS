# PHP-CMS

## Introduction

Welcome to the PHP-CMS Project! This Content Management System (CMS) is developed in PHP, offering a seamless interface for managing content with CRUD (Create, Read, Update, Delete) operations. The system includes robust authentication with roles for Admin and User, allowing for precise control over content management. The user interface is enhanced with DataTables, jQuery Ajax, and Bootstrap 5, ensuring a smooth, responsive, and interactive user experience. You can manage both posts and users efficiently within this system.

## Why CMS project:

- **Efficient Content Management**: The project was essential for streamlining the frequent updates and management of content on the "SIR Bulletin" section, ensuring timely and accurate dissemination of information within the organization.

- **Scalable User Management**: By implementing role-based access control (RBAC), the project addressed the need for secure, flexible user roles, enabling administrators to manage content and users efficiently while maintaining security and accountability.

- **Improved User Experience**: The CMS incorporated responsive design, user-friendly interfaces, and error-handling mechanisms, providing an intuitive system for both technical and non-technical users, which was crucial for minimizing errors and enhancing productivity.

## Features

- **User Authentication:** Secure login for Admin and User roles.
- **Post Management:** Full CRUD operations for managing posts.
- **User Management:** Full CRUD operations for managing users.
- **Real-time Updates:** Dynamic content updates with jQuery Ajax.
- **Responsive Design:** Optimized for all devices with Bootstrap 5.
- **Interactive Data Tables:** Enhanced user interaction with DataTables.
- **Toast Notifications:** Instant feedback for CRUD operations.

## Technologies Used

- **Backend:** PHP, MySQL
- **Frontend:** Bootstrap 5, DataTables, jQuery Ajax
- **Notifications:** Toast notifications

## Installation

To get started with the PHP-CMS project, follow these steps:

1. **Clone the repository**
    ```bash
    git clone https://github.com/Vivek-1102/PHP-CMS.git
    ```
2. **Navigate to the project directory**
    ```bash
    cd PHP-CMS
    ```
3. **Set up the database**
    - Create a database named `cms` in your MySQL server.
    - Import the provided SQL file (`cms.sql`) to set up the tables:
    ```bash
    mysql -u [username] -p cms < cms.sql
    ```

4. **Update configuration**
    - Update your database configuration in the `includes/config.php` file with your database credentials.
    ```php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'your_username');
    define('DB_PASSWORD', 'your_password');
    define('DB_NAME', 'cms');
    ```

5. **Run the project**
    - Start a local PHP server from the project directory:
    ```bash
    php -S localhost:8000
    ```
6. **Access the application**
    - Open your web browser and navigate to `http://localhost:8000`.

7. **Login**
    - Use the following credentials to log in:
    ```plaintext
    username: admin
    password: admin
    ```

## Usage

- **Admin Dashboard:** Admin users can manage posts and users, view analytics, and perform other administrative tasks.
- **User Dashboard:** Regular users can manage their own posts and view content.
- **CRUD Operations:** Perform create, read, update, and delete operations on posts and users.
- **Search and Filter:** Use DataTables to search and filter data efficiently.
- **Notifications:** Receive real-time notifications for actions performed.

## Contributing

We welcome contributions to improve this project! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch for your feature or bugfix.
    ```bash
    git checkout -b feature-name
    ```
3. Commit your changes.
    ```bash
    git commit -m "Add some feature"
    ```
4. Push to the branch.
    ```bash
    git push origin feature-name
    ```
5. Open a pull request to the `main` branch.


---

Thank you for using PHP-CMS! We hope it meets your content management needs.
Happy Coding!!
