# Ravindra Singh — Portfolio Website

A personal data-science portfolio built with PHP, HTML, and CSS.
Single-page site (Home, About, Projects, Certificates, Experience, Blog, Contact)
plus separate blog post pages and a MySQL-backed contact form.

---

## 1. Requirements

- A local server with **PHP + MySQL** — e.g. **XAMPP** or **WAMP**.
- The project folder placed inside the web root:
  - XAMPP: `C:\xampp\htdocs\Ravindra_portfolio`
  - WAMP:  `C:\wamp64\www\Ravindra_portfolio`

---

## 2. How to run the site

1. Start **Apache** and **MySQL** from the XAMPP/WAMP control panel.
2. Put the `Ravindra_portfolio` folder in the web root (see paths above).
3. Open the site in your browser:

   ```
   http://localhost/Ravindra_portfolio/index.php
   ```

> The site MUST be opened through `http://localhost/...` (via Apache).
> Double-clicking the file will NOT work — PHP needs the server to run.

---

## 3. Database setup (one time)

The contact form saves every submission into a MySQL table.

1. Open phpMyAdmin: `http://localhost/phpmyadmin`
2. Create a database named **`portfolio`** (Databases tab → name it → Create).
3. Select `portfolio` → open the **SQL** tab → paste the contents of
   **`contacts.sql`** → click **Go**. This creates the `contacts` table.
4. Open **`includes/db.php`** and confirm the login details:

   ```php
   $DB_HOST = '127.0.0.1';
   $DB_NAME = 'portfolio';
   $DB_USER = 'root';      // default local user
   $DB_PASS = '';          // default local password is empty
   ```

That's it — submit the contact form and a new row appears in the `contacts` table.

---

## 4. Viewing contact submissions (admin)

Two ways to see who contacted you:

- **phpMyAdmin:** open the `portfolio` database → `contacts` table → **Browse**.
- **Admin login in the browser:**

  ```
  http://localhost/Ravindra_portfolio/admin/login.php
  ```

  Or click the **Admin** button in the site's top navigation.
  Log in with:
  - **Email:** `ravindrdeeg95@gmail.com`
  - **Password:** `Ravindra@123`

  After logging in you'll see all contact submissions, with a **Log out** button.

  **Forgot your password?** On the login page click **"Forgot password?"**,
  enter your admin email, and a secure reset link is generated (valid 1 hour).
  It is emailed if your server has mail set up; on localhost the link is also
  shown on screen — click it and set a new password. The new password is saved
  in the database, so it persists.

  > Login credentials live in the database (`admin_users` table), which is
  > created automatically the first time you open the login page. The default
  > seed account is `ravindras@ambientscientific.ai` / `Ravindra@123`.

---

## 5. Folder structure

```
Ravindra_portfolio/
├── index.php                 ← homepage (loads all the sections)
├── contacts.sql              ← run this once in phpMyAdmin to create the table
├── README.md                 ← this file
│
├── css/
│   └── style.css             ← ALL styling. After editing, bump ?v= in header.php
│
├── images/                   ← put your images here (see list in section 6)
├── assets/
│   └── resume.pdf            ← your CV (for the Download CV / Resume buttons)
│
├── includes/                 ← the building blocks of the page
│   ├── config.php            ← ALL your text/data: name, projects, jobs, posts...
│   ├── db.php                ← database login details
│   ├── header.php            ← <head>, nav bar, hero section
│   ├── project.php           ← projects + about
│   ├── certificates.php      ← certificates
│   ├── experience.php        ← experience timeline + blog list
│   ├── contact.php           ← contact form + save-to-database logic
│   └── footer.php            ← footer with social icons
│
├── blog/                     ← one PHP file per blog post
│   ├── face-recognition-esp32.php
│   └── small-language-models.php
│
└── admin/
    └── submissions.php       ← password-protected view of contact submissions
```

---

## 6. Editing content (no design knowledge needed)

Almost all text lives in **`includes/config.php`**:

- `$profile`  → name, role, tagline, intro, about, email, phone, address, social links, photo
- `$skills`   → the skill chips on the hero
- `$projects` → the "More Projects" cards
- `$jobs`     → the experience timeline
- `$certificates` → the certificates cards
- `$posts`    → the blog cards (set `url` to a blog file, or `#` for "Coming soon")

### Images to add (in the `images/` folder)
| File | Used for |
|------|----------|
| `photo.jpg` | your headshot in the hero |
| `background.jpg` | Home + footer background |
| `about-bg.jpg` | About section background |
| `projects-bg.jpg` | Projects section background |
| `experience-bg.jpg` | Experience section background |
| `certificates-bg.jpg` | Certificates section background |
| `blog-bg.jpg` | Blog section background |
| `fall-detection.jpg`, `wake-word.jpg`, `face-id.jpg` | project images |
| `face-id.jpg`, `slm.jpg` | blog post images |

If an image is missing, that area just falls back to plain white — nothing breaks.

---

## 7. Adding a new blog post

1. Copy an existing file in `blog/` (e.g. `small-language-models.php`) to a new name.
2. Edit the title, text, and image inside it.
3. Add an entry to `$posts` in `includes/config.php`:

   ```php
   ['title'=>'My New Post','desc'=>'Short summary.','date'=>'July 2026','url'=>'blog/my-new-post.php'],
   ```

---

## 8. After editing CSS — IMPORTANT

Browsers cache the stylesheet. After changing `css/style.css`, open
`includes/header.php` and bump the version number so the new styles load:

```php
<link rel="stylesheet" href="css/style.css?v=25">   →   change 25 to 26, 27, ...
```

You can also force a refresh in the browser with **Ctrl + Shift + R**.

---

## 9. Quick reference (bookmarks)

| What | URL |
|------|-----|
| The website | `http://localhost/Ravindra_portfolio/index.php` |
| phpMyAdmin | `http://localhost/phpmyadmin` |
| Admin login | `http://localhost/Ravindra_portfolio/admin/login.php` |

---

## 10. Going live (later)

Upload the whole folder to any PHP + MySQL host (Hostinger, InfinityFree, cPanel).
Recreate the database there, import `contacts.sql`, update `includes/db.php`
with the host's database details, and **change the admin key** in
`admin/submissions.php` to a strong, private password.
