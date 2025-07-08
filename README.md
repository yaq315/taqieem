# Laravel Project - Taqieem

A web application built using **Laravel 10**, designed for **private school evaluation in Jordan by parents**.

---

## 🧱 Project Structure

This is a standard Laravel 10 application using:

- MVC architecture
- Artisan CLI
- Eloquent ORM
- Blade templating engine

---

## ⚙️ Requirements

- PHP >= 8.1  
- Composer  
- Laravel >= 9.x  
- MySQL >= install xampp or wamp to run database

---

## 🚀 Installation

1. **Clone the repository**

```bash
git clone https://github.com/yaq315/taqieem.git
cd taqieem
```

2. **Install PHP dependencies**

```bash
composer install
```

3. **Install JS dependencies**

```bash
npm install && npm run dev
```

4. **Set up `.env` file**

```bash
cp .env.example .env
php artisan key:generate
```

5. **Configure `.env` file**  
   Set your DB credentials and other environment settings.

6. **Run migrations**

```bash
php artisan migrate
```

7. **(Optional) Seed the database**

```bash
php artisan db:seed
```

8. **Run the application**

```bash
php artisan serve
```

---

## 🔐 Authentication

Authentication is handled using one of the following Laravel packages:

- Breeze
- Jetstream


To customize authentication features, visit:

- `/routes/web.php`
- `app/Http/Controllers/Auth`

---

## ✅ Testing

Run the tests using:

```bash
php artisan test
```

---

## 📄 License

[MIT](LICENSE) © Aqaba Orange Academy 
