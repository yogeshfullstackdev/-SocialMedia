# Laravel Social Media Application

This is a simple social media application built with Laravel 10 and MySQL where users can:
- Create and view posts
- Like posts
- Follow other users
- View followers and following

## Features

- **Posts**: Users can create and display posts.
- **Like Posts**: Logged-in users can like posts.
- **Follow Users**: Follow other users and view followers and followings.
- **Authentication**: User authentication using Laravel Breeze.
- **Profile Management**: Users can view their profiles and posts.

## Requirements

- PHP >= 8.1
- Composer
- Node.js
- MySQL Database

## Installation

### 1. Clone the Repository
- git clone https://github.com/your-username/social-media-app.git
- cd social-media-app

### 2. Install Dependencies
  Install PHP dependencies using Composer:
- composer install

  Install Node.js dependencies for front-end (if needed):
- npm install
- npm run build

### 3. Setup Environment
  Copy the .env.example file to .env and configure your environment settings, such as database and mail settings:
- cp .env.example .env

  Generate the application key:
- php artisan key:generate

### 4. Configure Database
  Update the .env file with your MySQL database configuration:

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=social_media
- DB_USERNAME=root
- DB_PASSWORD=your-password

**Note: Database file included for reference with some testing data (social_media_app.sql)

### 5. Run Migrations
  Run the database migrations to create the necessary tables:

- php artisan migrate

### 6. Seed the Database (Optional)
  You can also seed the database with dummy data for testing:

- php artisan db:seed

### 7. Run the Application
  To start the development server, run:

- php artisan serve
- The application will be available at http://localhost:8000.

### 8. Compile Front-End Assets (Optional)
If you are making changes to the front-end, you need to recompile the assets:
- npm run dev

## Usage
- Home Page: Lists all posts (visible to both logged-in and guest users).
- Dashboard: After logging in, users can access the dashboard to create posts, view followers, and manage profiles.
- Follow/Unfollow: Logged-in users can follow/unfollow other users.
- Likes: Logged-in users can like posts.

## Routes
- / - Home page (displays posts)
- /dashboard - Dashboard (after login)
- /create-post - Create a new post
- /follow-user/{user} - Follow a user
- /unfollow-user/{user} - Unfollow a user

## Authentication
- This application uses Laravel Breeze for authentication, which includes registration, login, and password reset functionality.

## License
- This project is open-source and available under the MIT License.

### Explanation:
- **Description**: Brief overview of the application and its features.
- **Requirements**: Specifies the necessary versions of PHP, Composer, etc.
- **Installation**: Detailed steps on how to set up the application.
- **Usage**: Explanation of the available routes and features.
- **License**: Standard MIT license for open-source sharing (optional, depending on your licensing preference). 

You can customize the repository name and URL according to your GitHub setup.