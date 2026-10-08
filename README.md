# Tables & Panels

A PHP-based web application for browsing manga and webnovels, with user login/signup, genre-based discovery, and a curated reading experience. The project includes both a structured PHP app in the `project/` directory and a few additional prototype/demo pages in the repository.

## Overview

This repository was built as a reading portal themed around stories and visual content. It supports:

- User registration and login
- Manga and webnovel browsing
- Details pages for each title
- Genre filtering
- Search and discovery
- Bookmarking support
- Admin-style pages and demo front-end layouts

## Tech Stack

- PHP
- MySQL / MariaDB
- HTML
- CSS
- JavaScript-ready static/demo pages

## Repository Structure

- `project/` — main application source files
- `Atika/` — alternate/demo pages and admin-related files
- `Finale/` — additional project assets or prototypes
- `MEWW/` and `Mercy/` — supporting folders
- `Puja/` — supporting folders
- `tables_and_panels.sql` — database schema and seed data
- `genre_page.php` — example genre page powered by a MySQL query

## Main Application Files

The core app is in `project/`:

- `project/index.php` — login page
- `project/signup.php` — registration page
- `project/home.php` — main gallery and catalog page
- `project/manga_page.php` — individual manga details page
- `project/novel_page.php` — individual webnovel details page
- `project/genre.php` — genre-based content listing
- `project/search.php` — search functionality
- `project/header.php` and `project/footer.php` — shared layout
- `project/style.css` — styling for the app
- `project/dbconnection.php` — database connection setup
- `project/login_process.php` / `project/signup_process.php` — auth handling
- `project/bookmark_manga.php` / `project/bookmark_novel.php` — bookmarking logic

## Database

The project uses a MySQL database named `tables_and_panels`.

Import the SQL dump from:

- `tables_and_panels.sql`

This file includes tables such as:

- `reader`
- `manga`
- `webnovels`
- `playlist`
- `bookmarks`

## Local Setup

1. Install a local PHP + MySQL environment such as XAMPP, WAMP, or Laragon.
2. Start Apache and MySQL.
3. Create a MySQL database named `tables_and_panels`.
4. Import `tables_and_panels.sql` into the database.
5. Place the repository under your web server root (for example, `htdocs/Tables-Panels` in XAMPP).
6. Open the app in the browser:

   http://localhost/Tables-Panels/project/index.php

If your local server root differs, adjust the URL accordingly.

## Example Accounts

The seed data includes example admin accounts such as:

- `atika@gmail.com`
- `mercy@gmail.com`
- `puja@gmail.com`

The project also contains regular reader accounts in the `reader` table.

## Notes

- Some files in the repository appear to be prototypes, duplicated pages, or experimental HTML mockups.
- The main functional application is centered in `project/`.
- The project seems to be built for learning/demo purposes and may require some cleanup or environment-specific adjustments before deployment.

## License

No explicit license file was found in this repository. If you plan to publish or reuse the project, it is recommended to add an appropriate license before distribution.

## Contributing

This repository looks like a personal/educational project. Contributions are welcome if you are improving the app, fixing bugs, or cleaning up the structure.

## Suggested Next Improvements

- Add a proper README for deployment and environment configuration
- Separate admin logic from the main app
- Improve database security and validation
- Standardize filenames and folder naming
- Add a proper `.gitignore` and environment config

