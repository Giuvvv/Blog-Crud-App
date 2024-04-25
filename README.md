

# Simple CRUD Blog Website with Laravel

This project is a simple CRUD (Create, Read, Update, Delete) blog website built using Laravel, where users can create, view, update, and delete their posts/articles. The website features a homepage that displays previews of posts/articles, and users can click on these previews to read the full post. Additionally, there are login and registration pages for user authentication.

## Technologies Used

- Laravel
- PHPMyAdmin (for database testing)

## Features

1. **User Authentication**: Users can register for an account and log in securely.
2. **Create**: Authenticated users can create new posts/articles.
3. **Read**: Previews of posts/articles are displayed on the homepage, and users can click to read the full post.
4. **Update**: Users can edit their own posts/articles.
5. **Delete**: Users can delete their own posts/articles.

## Setup Instructions

1. **Clone the Repository**: Clone this repository to your local machine.

    ```bash
    git clone https://github.com/Giuvvv/Blog-Crud-App.git
    ```

2. **Install Dependencies**: Navigate into the project directory and install the required dependencies using Composer.

    ```bash
    cd Blog-Crud-App
    composer install
    ```

3. **Database Configuration**: Set up your database credentials in the `.env` file. You can copy the `.env.example` file and rename it to `.env`, then fill in your database details.

4. **Run Migrations**: Run the database migrations to create necessary tables.

    ```bash
    php artisan migrate
    ```

5. **Start the Development Server**: Start the Laravel development server.

    ```bash
    php artisan serve
    ```

6. **Access the Website**: Open your web browser and navigate to `http://localhost:8000` to access the website.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, feel free to open an issue or create a pull request.

## Acknowledgements

Special thanks to Laravel for providing an excellent framework for web development.

## Author

[Giovan Battista Lo Buglio](https://github.com/Giuvvv)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
