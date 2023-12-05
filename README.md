# Vote Form   🏷️ [1.0.0]

This is a prototype of a voting form for candidates, where it has a validation of each of the fields and you can make only one vote with a routine.
It works with SQLITE database, PHP and Jquery in Javascript.

It is part of a challenge required by "DESIS". .


## 📦 Installation

**A) Server integrated in Application:**

Dependencies: SQLite, Composer and PHP 8.2 or higher.

- Download the complete directory.

- With Composer installed run the following command (inside the application directory):
    ```bash
    composer install
    ```
- Copy the .env_example to .env and you must check that the 3 environment variables:
    ```bash
    APP_NAME = "VOTE FORM"
    INDEX_CONTROLLER=vote
    DB_FILE=/db/db_local.sqlite
    ```
- Run the database schemas and insert initial data (*.sql in db/initial_data , db/schema)
    ```bash
    php initdb.php
    ```
- Run the application with the following command:
    ```bash
    php -S localhost:8000
    ```
- Access http://localhost:8000/




## 💻 Usage

You must fill out the form with the requested data and verify the candidate vote count.
You can only cast one vote per "rut".

## ☝ Assumptions, conventions and future improvements

- All fields are assumed to be mandatory except the "Alias".
- Due to the time associated with the challenge notification (yesterday), only client-side validation (javascript) was performed.
- Some dependencies were added such as "blade" for views, "phpdotenv" for environment variables and "ext-sqlite3" for data persistence.

- Within the future improvements this form could be made in a framework like laravel or in another lighter one like lumen and the views with vuejs.
- Also the realization of an area of administration of the input data and with a Mysql database.

## 🛠️ Technical Aspects and Logic

- The "conventional commit" base was applied (https://www.conventionalcommits.org/en/v1.0.0/)
-  I applied a start of MVC architecture, separating the models, controllers and views, as well as a repository pattern with a directory for it.
- Composer was used for dependencies
- Some boostrap 5 components were used for the view.
- For the query and translation of path and method we used the "controller_name/method_name" logic, where "controller_name" is inside the controller_nameController directory. 
(ex: path vote/ --> "VoteController.php")
and in the same way with the method after "/".
- In the same way also the access by ajax for POST method is validated.

## 👥 Authors

Abner Galvez C., using PHP Laravel 8.*

## 🚀 Project status

Completed, awaiting review.