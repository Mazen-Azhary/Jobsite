Jobsite

Project Description

Jobsite is a simple web app built using PHP and MySQL to help job seekers find job listings and apply for them. Employers can also post jobs and manage applications. This project was created as a learning experience and is not intended for commercial use.

Features

User Authentication: Secure registration and login system for both job seekers and employers.

Job Listings: Employers can post job vacancies with detailed descriptions and requirements.

Application Management: Job seekers can apply for jobs, track application status, and receive employer responses.

Profile Management: Users can create and update their professional profiles, including resumes and personal details.

Search and Filters: Advanced search and filtering options to help job seekers find relevant job opportunities quickly.

Admin Dashboard: Admin users can manage job postings, user accounts, and platform settings.

Installation Guide

1. Install XAMPP

Download and install XAMPP from the official website: https://www.apachefriends.org/index.html.

Ensure that XAMPP is installed in C:\xampp for smooth operation.

2. Clone the Repository

Open Command Prompt and navigate to the htdocs directory:

cd C:\xampp\htdocs

Clone the Jobsite repository:

git clone https://github.com/Mazen-Azhary/Jobsite.git

3. Import the Database

Start Apache and MySQL using the XAMPP Control Panel.

Open http://localhost/phpmyadmin/ in your browser.

Create a new database (e.g., jobsite_db).

Import the jobsite.sql file from the cloned repository.

4. Configure the Application

Open the configurations.php file in the project directory.

Update the database connection settings (database name, username, password) to match your MySQL setup.

5. Access the Application

Open your browser and go to http://localhost/Jobsite/ to start using the platform.

For more details, visit the repository: https://github.com/Mazen-Azhary/Jobsite.

