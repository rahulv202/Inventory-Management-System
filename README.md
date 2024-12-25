Here’s a comprehensive `README.md` file for your **Inventory Management System (IMS)** project:

---
# Inventory Management System (IMS)

The **Inventory Management System (IMS)** is a robust solution designed to streamline inventory, order, and supplier management workflows. This system uses **PHP** with **OOP**, the **MVC** architecture, and includes dynamic URL routing. It is a beginner-to-advanced level project that incorporates key concepts in software development.

---

## **Features**

### **Admin**
- Manage users (add, update, delete) with roles and permissions (Manager, Staff).
- Manage products: Add, update, and delete product details.
- Manage suppliers: Add and update supplier contact and address information.

### **Manager**
- Monitor stock levels and update inventory.
- Create and track purchase orders.

### **Staff**
- Receive and log incoming inventory.
- Process customer orders and update order status.

### **Supplier**
- View and process purchase orders sent by the system.
- Deliver products and update order fulfillment status.

---

## **Technologies Used**

- **Language**: PHP
- **Architecture**: MVC (Model-View-Controller)
- **Database**: MySQL
- **Dynamic Routing**: Flexible URL handling with parameters (e.g., `http://localhost/demo/1/2`).

---

## **Installation**

1. **Clone the Repository**
   ```bash
   git clone https://github.com/rahulv202/Inventory-Management-System
   cd Inventory-Management-System
   ```
2. **Install Dependencies:**
     ```bash
   composer install
   ```
    ```bash
   composer init
   ```
    ```bash
   composer dump-autoload
   ```

3. **Setup the Database**
   - Import the provided `ims.sql` file into your MySQL database.
   - Update the database credentials in `config/Database.php`.


3. **Run the Application**
   -    php -S localhost:8000
   - Open your browser and navigate to `http://localhost/`.

---

## **Folder Structure**

### **Core**
Contains the core framework components for the MVC structure.
```
/core
    /Controller.php  # Base Controller class
    /Model.php       # Base Model class
    /Route.php        # Application routing
    /Database.php    # Database connection
```
### **Middlewares** 
Handles authentication and authorization.
```
/middleware
    /CheckAdminRoleMiddleware.php  # Checks if user has admin role
    /CheckManagerRoleMiddleware.php  # Checks if user has manager role
    /CheckStaffRoleMiddleware.php  # Checks if user has staff role
    /CheckSupplierRoleMiddleware.php  # Checks if user has supplier role
    /CheckLoginMiddleware.php  # Checks if user is logged in
    /CheckLogoutMiddleware.php  # Checks if user is logged out
```
### **Controllers**
Manages the business logic for the application.
```
/controllers
    /UserController.php    # Handles User functionalities
    /InventoryController.php  # Handles Inventory workflows
    /ProductController.php    # Handles Product operations
    /SupplierController.php # Handles Supplier actions
    /OrderController.php     # Handles Order workflows
    /RegisterController.php # Handles Register workflows
    /LoginController.php    # Handles Login workflows
    /DashboardController.php # Handles Dashboard workflows
```

### **Models**
Handles database interactions.
```
/models
    /User.php       # User management
    /Product.php    # Product management
    /Supplier.php   # Supplier management
    /Order.php      # Order processing
    /Inventory.php  # Inventory updates
```

### **Views**
Displays the UI for each role and workflow.
```
/views
    /inventory     # Inventory views
    /products       # Products views
    /orders         # Order views
    /supplier      # Supplier views
    /layouts      # Shared components (e.g., header, footer)
    /users         # User-specific views
```

---

## **Database Schema**

The database is designed to manage users, products, orders, suppliers, and inventory. Key tables include:

1. **`users`**: Stores user details and roles (Admin, Manager, Staff).
2. **`products`**: Holds product information (name, SKU, price).
3. **`suppliers`**: Manages supplier details (name, contact, address).
4. **`orders`**: Tracks purchase orders with status (`pending`, `fulfilled`).
5. **`inventory`**: Monitors stock levels for products.

---

## **How It Works**

### **Admin Workflow**
- Add users and assign roles.
- Manage products and suppliers.

### **Manager Workflow**
- Create and track purchase orders.
- Update inventory after receiving goods.

### **Staff Workflow**
- Process orders and update status.
- Log received inventory and update stock levels.

### **Supplier Workflow**
- View pending purchase orders.
- Mark orders as fulfilled after delivery.

---

## **Dynamic URL Routing**

The application uses dynamic routing to handle URLs with flexible parameters. For example:

- `http://localhost/ims/products/1` – View details for Product ID 1.
- `http://localhost/ims/orders/fulfill/2` – Fulfill Order ID 2.


---


## **License**

This project is licensed under the MIT License. See the `LICENSE` file for details.

---


