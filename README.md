# Album Management System

This repository contains the code for an Album Management System built using Laravel. The system allows users to create, edit, and delete albums, each containing one or more pictures. It also provides options for handling non-empty album deletion.

## Requirements

- User can create an album.
- User can edit any album.
- User can delete an album.
- The album has a name and one or more pictures.
- Each picture in the album has a name.
- If the user tries to delete a non-empty album, the system will provide two choices:
  - Delete all the pictures in the album.
  - Move the pictures to another album.
- The user experience should be as easy as possible.

## Packages Used

- Dropzone.js
- Filepond.js
- Laravel-medialibrary

## Installation

1. Clone the repository:
git clone https://github.com/yourusername/album-management-system.git

2. Install dependencies:
composer install
npm install

3. Set up your environment variables by copying the `.env.example` file to `.env` and configuring it according to your environment.

4. Generate the application key:
php artisan key:generate

5. Migrate the database:
php artisan migrate

6. Run the server:
php artisan serve


## Contributing

Contributions are welcome! Please check out the [contribution guidelines](CONTRIBUTING.md) before making any pull requests.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
