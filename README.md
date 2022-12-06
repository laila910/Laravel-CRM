# Laravel CRM 

# Description:
> Build a system using Laravel framework for a mini CRM where the admin user can add employees and customers, and also he can
 assign the customers to the employees. And each employee can add a new customer and also can add actions to the customers.
 The action types includes (call, visit or follow up) and he can also record the results of these actions.

# Build Database: 
 1. Users (Admins & Employees): [name,email,password,image,phone,address,AdminCheckbox]
  >Notes:
    1. Admin checkbox by default will be false means this will be an employee, and if checked will be admin.
    2. Admin can create other users (employees or admin).

 2. Customers: [name,email,phone,company,website,user_id,createdBy]
  >Notes:
    1. `user_id` is User Id who will be assigned to this customer (mean who will deal with customer), Admin only can be assign any employee or user to this customer. 
    2. by default he will be the person who create this customer.
    3. `createdBy` is user Id who create this customer and not any user can change this value :)

 3. Actions: [status(call,visit,followUp),notes,customer_id]
  >Notes:
   1. customer_id is the id of customer who have this record.(F.K).
   2. Status is the status of this action.
   3. notes will be any details that an employee want to add to this action.

# start work:
 1. make Models, Migration & relations between tables.
 2. `composer require laravel/ui`
 3. `npm install`
 4. `npm run dev`
 5. make a seed for details of CRM Admin User :) `php artisan db:seed`
 6. `php artisan tinker` to hash password :)
 7. Complete All Coding Until Finish :)


# Steps To Run This CRM:
  To clone the project you must follow the following steps:
  1. Navigate to the main page of the repository.
  2. Above the list of files, click Code button and copy the https link.
  3. Go to your visual studio code editor then open the terminal and write this command git clone .
  4. Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu.
  5. Open your .env file and change the database name to `crm`, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
  6. open Mysql Host and create Database with `crm` with your above configuration.
  6. Run `composer install`
  6. Run `php artisan key:generate`
  7. Run `php artisan migrate`
  8. Run `php artsian db:seed`
  9. Run `Run php artisan serve` and start Manage Users & Customers in CRM :) with Admin Credientials with Email `lailaibrahim798@gmail.com` and Password `password`. Hope to enjoy :)
   