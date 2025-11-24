# 🛒 Super Mall Website

## Project Overview
Super Mall is a responsive e-commerce website designed to provide a seamless online shopping experience. The platform allows customers to browse various products and place orders easily. It also includes an admin area for complete management of users, product inventory, and orders.

---

## 📸 Demo / Live Link  
🔗 **Live Preview:**    
📂 **Repository Link:** 

## 🔍⚙️Features

### Customer Features:
- Responsive design optimized for desktop, tablet, and mobile devices
- User-friendly interface for browsing products and categories
- Secure user registration and login
- Shopping cart and checkout process
- View order history and manage profile

### Admin Features:
- Secure admin login dashboard
- Manage products: add, update, delete product details
- View and manage customer orders and statuses
- User account management
- Real-time inventory control and reports

---

## Technologies Used

| Technology | Used For |
|----------|----------|
| Frontend| HTML5, CSS3, JavaScript (with libraries like AOS, Boxicons, Font Awesome) |
| Backend | PHP for server-side scripting.|
| Database | MySQL running on port `3307` |
| Tools | Visual Studio Code, Chrome DevTools |
| Version contro | Git |


---

## 📝 NOTE
this website is not fully responsive and working condition it has some errors Due to server crash and server errors.

## 🚨⚠️ Most Important Note 

Step 1.. You should have an XAMPP Control Pannel,
step 2.. After opening the control pannel just change the prot number of MYSQL to `3307`,
To Change it i am providing an Youtube Link just follow the steps `https://youtu.be/3fVZ9XXJCik?si=nf1LhfWigxuzZA-- ` ..

## 📦 Installation & Setup

** if you are downloading this website make sure you add this SuperMall Website Folder under `xammp folder/ inside that htdocs folder/ inside that paste this website folder`.
After that make changes in xampp server as told in most important note.

Now you need to have an database called as MyStore.
For this i am providing whole database file just paste into database.
1. open xampp folder where you have located in your Pc or Laptop.
2. Then under xampp folder there is mysql folder open it.
3. now Paste MyStore Folder in it.
4. you need to restore old file called as `ib.data1`etc, just replace it with old one. `I AM PROVIDING ONLY MAIN FILE THAT YOU NEED TO CHANGE. THE XAMPP FOLDER IS IN MY GITHUB REPOSITORY`.
5. for your more understanding i am providing an link to how to add old database in new xampp:-
6. Refer this link `https://youtu.be/ugkeFUhyTD8?si=dAxzU7n-FFq0XPaI` .
7. Just follow this steps, you will get MyStore Folder in my github Repository that is provided on top.

## ⚠️ Alert 

when you enter to cart after you checkout there will be 2 methods of payment conformation but your orders will not go to payment Just select ofline payment after that `In XAMPP SERVER the myql port will shutdown Pls make sure you Start the mysql port and the press the alert message of payment note submited`.

## Database Configuration

- MySQL Server is configured to run on port **3307** instead of the default 3306.
- Make sure your PHP connection files specify this port number.
- Example database connection in PHP:

```php
$servername = "localhost";
$username = " '' ";
$password = "root";
$dbname = "MyStore";
$port = 3307;

Just refer connect.php file which is present in 'include' Folder.

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

---

```

 ## 🧠 Future Improvements

• Backend integration for centralized data management.
• To solve the error in this Project.
• Mobile version of the app.
• Advanced analytics dashboard.
• Automated reminders and scheduling features.

## 🪪 Author

© Created by Shubham.

## 📧 Contact

**Shubham Vaghela**  
📩 Email: Shubhamvaghela2004@gmail.com .
🔗 LinkedIn: https://www.linkedin.com/in/shubham-vaghela-41b8aa368 .

---

## 🪪 License
This project is open-source. Use it as per your needs.

## ⭐ Support

If you like this project, please ⭐ the repo!
I hope this project will be helpful for you to learn and explore. Use it and make future changes as per your needs, Thankyou 😊.

--  {^_^}  --