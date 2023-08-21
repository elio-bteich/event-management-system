# Event Management Project (Unfinished)

This repository contains an event management project built using Laravel. The project focuses on reserving event tickets and team management using roles and permissions and includes a QR code generation feature. Please note that this project was one of my first attempts at Laravel development, and it remains unfinished.

## Project Overview

The goal of this project was to create a web application that simplifies event management by allowing users to reserve tickets for various events. Additionally, the project aimed to generate QR codes for these reserved tickets to streamline the event check-in process.

## Project Features (Partial Implementation)

- **User Registration and Authentication**: Users can create accounts and log in to the application.

- **Event Listings**: The application displays a list of upcoming events with details such as event name, date, location, and available tickets.

- **Ticket Reservation**: Users can select events and reserve tickets for them.

- **QR Code Generation**: A feature was planned to generate QR codes for the reserved tickets, allowing for easy event check-in.

- **Roles and Permissions Management**: The project utilizes the [Spatie Laravel-Permissions](https://spatie.be/docs/laravel-permission/v5/introduction) package to manage user roles and permissions. Roles such as "Super Admin", "Admin" and many more roles related to the event management were implemented, allowing different levels of access within the application, you can check the implemented roles in the database/seeders/RoleSeeder.php and the implemented permissions in the database/seeders/PermissionSeeder.php


## Project Dependencies

This project is built on top of the Laravel framework and uses the [Spatie Laravel-Permissions](https://spatie.be/docs/laravel-permission/v5/introduction) package for roles and permissions.

## Getting Started

1. Clone the repository to your local machine using:
```
git clone https://github.com/elio-bteich/event-management-system.git
```


2. Navigate to the project directory:
```
cd event-management-system
```

3. Install project dependencies using [Composer](https://getcomposer.org/):
```
composer install
```

4. Copy the `.env.example` file and create a `.env` file:
```
cp .env.example .env
```

5. Generate a new application key:
```
php artisan key:generate
```

6. Set up your database and email configuration in the `.env` file.

7. Run database migrations and seed initial data:
```
php artisan migrate --seed
```

8. Serve the application locally:
```
php artisan serve
```

9. Visit `http://localhost:8000` in your web browser to access the application.

## Unfinished Work

It's important to note that this project remains unfinished due to being one of my early attempts at Laravel development. While the core concepts and features were started, various aspects of the application are incomplete or may require further development. You could check the routing of the app in the routes/web.php to discover all the developped features.

## Future Enhancements

Although this project is unfinished, there are opportunities for improvement and completion. Future enhancements could include:

- Completing the QR code lecture feature.
- Enhancing the user interface and overall user experience.

## Acknowledgments

I embarked on this project as a learning experience to explore Laravel and its capabilities. While the project isn't fully functional, it represents my progress in web development and serves as a foundation for future projects.

Please feel free to explore, learn from, and build upon this project. If you have any questions or insights, I'd love to hear from you!

Happy coding and learning! 🚀





