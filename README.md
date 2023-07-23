## Installation and Run

- git clone https://github.com/rhranadu/happihub.git
- composer install
- Copy the example env file and make the required configuration changes in the .env file - cp .env.example .env
- Run the database migrations (Set the database connection in .env before migrating) - php artisan migrate