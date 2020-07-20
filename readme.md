# Course Registration System

## Project Description
The project is a Course Registration System built with [Laravel](https://laravel.com) and [VueJS](https://vuejs.org/). This project repository also includes available API endpoints for any developer willing to integrate their application with the system. The available features of the project include 
1. Login and registration for students and admin
2. Uploads of courses by the admin
3. Profile update
4. Course Recommendation
5. Course Registration



## Newly Registered users are registered are registered as students

## Project Workflow


## Admin
After the admin is authenticated, they can navigate to the management part where they can manage the registered students and upload courses. An admin can also try out the course registration to see have a view of what users sees.  The default Admin Login is:
    Email: admin@admin.com
    Password: admin

## Student 
New Users are registered as student, the only activity that can be performed by a student is course registration, the student selects the session and semester after which they will be able to see the available courses for the selected session


## Project Setup(Web Portal)

### Cloning the GitHub Repository.
Clone the repository to your local machine by running the terminal command below.

```bash
git clone repo-url
```
### Setup Database
Create your a MySQL database and note down the required connection parameters. (DB Host, Username, Password, Name) 

### Install Composer Dependencies
Navigate to the project root directory via terminal and run the following command.
```bash
composer install
```
### Install NPM Dependencies
While still in the project root directory via terminal, run the following command.

```bash
npm install
```
or if you use yarn instead
```bash
yarn
```
### Create a copy of your .env file
Run the following command 
```bash
cp .env.example .env
```
This should create an exact copy of the .env.example file. Name the newly created file .env and update it with your local environment variables (database connection info and others).

### Generate an app encryption key
```bash
php artisan key:generate
```

### Migrate the database
```bash
php artisan migrate
```
### Seed the default data
```bash
php artisan db:seed
```
### Import the course into database
```
import courses.sql and electives.sql into the created database
```

### Future Possible Updates
The following features are to be added in the next available upgrade of the system.
1. Ability to register courses against student.
1. Students will be able to see courses they have registered in the past.

### License
[MIT](https://choosealicense.com/licenses/mit/)