# To-Do List App

![Laravel](https://img.shields.io/badge/Laravel-10.x-red?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.x-purple?style=for-the-badge&logo=php)

## 📌 Overview
To-Do List App is a web-based application used to manage task lists with CRUD (Create, Read, Update, Delete) features. Built using **Laravel**, **Bootstrap** and uses **Modernize Free Version** as a responsive UI template.

## 🚀 Features
✅ **Add Task**: Create a new task with information such as name, priority, date and deadline.  
✅ **Edit Task**: Update task information directly.  
✅ **Delete Task**: Delete task with modal confirmation.  
✅ **Bootstrap UI**: Attractive and user-friendly appearance.

## ⚙️ Installation

### 1️⃣ Clone Repository
```
git clone https://github.com/rhmats/To-Do-list-App.git
cd To-Do-list-App
```

### 2️⃣ Install Dependencies
```
composer install
npm install
```

### 3️⃣ Konfigurasi .env
Buat file .env dan atur database sesuai kebutuhan:
```
APP_NAME=Laravel
DB_DATABASE=To-do-list-app
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Generate Key & Migrate Database
```
php artisan key:generate
php artisan migrate
```

### 5️⃣ Run the Server
```
php artisan serve
```
Akses aplikasi di http://127.0.0.1:8000

## Contributing
Pull requests are very welcome! Please fork this repo and propose useful changes.

## License
This project is open-source and available under the MIT License.

