# Simple CRUD Application using PHP

## Description

This project is a Simple CRUD (Create, Read, Update, Delete) application developed with PHP, XAMPP, and Bootstrap. The purpose is to provide hands-on experience in both frontend and backend development.

## Functionality

### C.R.U.D Operations

- **Create:** Establish a student table in a database using XAMPP.
- **Read/Select:** Retrieve data from the database and display it on the web interface.
- **Update:** Modify the displayed data directly from the web interface.
- **Delete:** Remove data through the web interface.

## Getting Started

### Prerequisites

Ensure the following are installed on your system:

- [XAMPP](https://www.apachefriends.org)
- [Bootstrap 5.2 Framework](https://getbootstrap.com/docs/5.2/getting-started/introduction)

## How to Run

1. Install XAMPP and start the Apache server.
2. Clone this repository to your local machine.
3. Place the project files in the "htdocs" directory of your XAMPP installation.
4. Access the project via your web browser (e.g., http://localhost/your-project-folder).

## Database Setup

Uset he following SQL query to create the "students" table:

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    age INT NOT NULL
);

## Built With

- **XAMPP:** A cross-platform web server solution stack package.
- **Bootstrap 5.2 Framework:** A popular CSS framework for building responsive and visually appealing web pages.

## Author

- [Asme](https://mesuna.netlify.app)

## Acknowledgments

This is might help you to undertand basics about PHP-based web development.
Learn More here [Mesuna](https://mesuna.netlify.app)
