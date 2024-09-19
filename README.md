# RentalPay

Welcome to the Rental Payment Management System! This project is designed to assist landlords in managing rental properties, handling tenant registrations, and facilitating online payments. Currently, it is in development, with approximately 90% of the functionality implemented. Stay tuned for future updates and enhancements.

## Prerequisites

To run this project, you will need:

- **XAMPP**: For local development with Apache and MySQL.
- **Paystack Account**: Required for payment processing.
- **ngrok Account**: Used to expose your local server to the internet.

## Features

### For Tenants

- **Tenant Registration**: Users can sign up by providing their name, house number, contact details, and duration of stay.
- **Payment System**: Tenants can pay rent via integrated payment gateways like Paystack and Mpesa.
- **Rent Reminders and Notifications**: Tenants receive notifications for rent due dates and payment confirmations.
- **Tenant Dashboard**: Offers an overview of payment history and outstanding balances.
- **Secure Login**: Passwords are securely stored using hashing techniques.

### For Property Managers (Agents and Owners)

- **Manage Tenants**: View, approve, and manage tenant registrations.
- **Rent Collection Management**: Track rent payments, send reminders for unpaid rent, and manage balance arrears.
- **Notifications**: Alerts for overdue or paid rent.

### Admin Features

- **System Management**: Add, remove, and manage agents and tenants.
- **House Management**: Add, remove, and manage houses.
- **Contract Monitoring**: Edit parts or the entirety of contracts.
- **House Occupancy Status**: Monitor occupancy status of houses (Occupied/Empty).

## Getting Started

### 1. Clone the Repository

Clone the repository using:

```sh
git clone https://github.com/Maithy-a/RentalPay.git
```

Move the cloned project to the `htdocs` directory of your XAMPP installation.

### 2. Set Up XAMPP

1. Download and install XAMPP from [Apache Friends](https://www.apachefriends.org/index.html).
2. Start Apache and MySQL services from the XAMPP Control Panel.

### 3. Import the Database

1. Locate the database file in the repository under `res>DB`.
2. Open phpMyAdmin in your browser (`http://localhost/phpMyAdmin`).
3. Create a new database.
4. Import the database file into your newly created database.

### 4. Configure Paystack

1. Create a Paystack account if you don’t have one.
2. Navigate to `tenants/configs.php` in the repository.
3. Add your Paystack `SecretKey` and `PublicKey`:

```php
<?php 
    $SecretKey = 'YOUR_SECRET_KEY';
    $PublicKey = 'YOUR_PUBLIC_KEY';
?>
```

### 5. Set Up ngrok

1. Sign up for an ngrok account at [ngrok](https://ngrok.com/).
2. Download and install ngrok.
3. Run ngrok to expose your local server using:

```sh
ngrok http 80
```

4. Note the provided `https` URL from ngrok.

### 6. Configure Callback URL

To extract the callback URL for your application when using ngrok, follow these steps:

1. **Start ngrok**: Run ngrok as mentioned above to expose your local server.

2. **Get the Forwarding URL**: After running ngrok, you will see an output in your terminal that includes a line similar to:

   ```
   Forwarding                    https://<your-ngrok-subdomain>.ngrok.io -> http://localhost:80
   ```

   This `https` URL is what you will use as the callback URL.

3. **Update Your Callback Configuration**: Open your `callback.php` file or wherever you need to set the callback URL in your application. Replace the existing callback URL with the one provided by ngrok. For example:

   ```php
   $callbackUrl = 'https://<your-ngrok-subdomain>.ngrok.io/callback.php';
   ```

4. **Test the Callback**: Ensure that your application is set up to handle incoming requests at this endpoint. You can test it by triggering an event that sends a callback to this URL.

### 7. Default Login Credentials

Below are the default login credentials for the system:

**ADMINISTRATOR:**

- Username: ADMIN
- Password: Maithya123

**MANAGER (First):**

- Username: Maithya
- Password: Maithya123

**MANAGER (Alternate):**

- Username: MANAGER
- Password: MANAGER1

**Tenant:**

- Username: Ivy2003
- Password: 123456789

### 8. Ensure XAMPP is Running

Ensure that both Apache and MySQL services are active in XAMPP.

## Database Structure

The database consists of two main tables:

### `tenant` Table

| Column      | Type         | Description                        |
|-------------|--------------|------------------------------------|
| tenant_id   | int(3)       | Auto-incremented ID for tenants.   |
| fname       | varchar(30)  | Tenant's first name.               |
| lname       | varchar(30)  | Tenant's last name.                |
| programme   | varchar(30)  | Programme for tenant categorization.|
| reg_no      | varchar(20)  | Registration number.               |
| occupation  | varchar(30)  | Occupation of the tenant.          |
| p_no        | varchar(15)  | Tenant's phone number.             |
| e_address   | varchar(30)  | Email address.                     |
| p_address   | varchar(40)  | Physical address.                  |
| city        | varchar(15)  | City.                              |
| region      | varchar(15)  | Region.                            |
| u_name      | varchar(30)  | Username.                          |
| p_word      | varchar(60)  | Hashed password.                   |
| day_reg     | DATE         | Date of registration.              |
| status      | int(2)       | Status(`Active`,`inactive`)        |

### `payment` Table

| Column      | Type         | Description                        |
|-------------|--------------|------------------------------------|
| payment_id  | int(3)       | Auto-incremented payment ID.       |
| tenant_id   | int(3)       | Foreign key referencing `tenant_id`|
| ref_no      | varchar(11)  | Payment reference number.          |
| amount      | int(7)       | Payment amount.                    |
| pay_from    | varchar(20)  | Payment source (e.g., M-Pesa).     |
| pay_to      | varchar(20)  | Payment recipient.                 |
| date        | datetime     | Date of payment processing.        |

## Running the Project

1. Ensure XAMPP is running with MySQL set up.
2. Place project files in the `htdocs` directory of your XAMPP installation.
3. Access the project via your browser at `http://localhost/Rentalpay`.

## Development Status

This project is still under development; while most features are functional, some may be incomplete or contain bugs. Feedback and contributions are welcome!

## Contributing

Contributions are encouraged through issue submissions or pull requests while adhering to coding standards and providing relevant documentation.
