# Flight Management System (Laravel)

Author: Ali Seyedi (علی سیدی)

## Setup
These files are the app code of a Laravel 11 project. Vendor files are not included.

    composer create-project laravel/laravel flight-system
    cd flight-system
    php artisan install:api
    (copy app, database, resources, routes from this folder into flight-system, replace when asked)
    php artisan migrate
    php artisan serve

Open http://127.0.0.1:8000

## Features
- Planes (airline fleet): CRUD
- Customers: CRUD
- Flights: add, list, delete (each flight uses a plane)
- Customer portal: a customer picks his name, then can book a flight or cancel his own booking

## API (Postman)
Import `postman_collection.json` in Postman (variable base_url = http://127.0.0.1:8000).
Always send the header `Accept: application/json` (already set in the collection).

- GET/POST /api/planes, GET/PUT/DELETE /api/planes/{id}
- GET/POST /api/customers, GET/PUT/DELETE /api/customers/{id}
- GET/POST /api/flights, GET/PUT/DELETE /api/flights/{id}
- POST /api/flights/{id}/book  body: {"customer_id": 1}
- GET /api/customers/{id}/bookings
- DELETE /api/bookings/{id}  body: {"customer_id": 1} (only the owner can cancel)
