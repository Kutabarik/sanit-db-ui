# Data Cleaning Manager UI

A simple Laravel application for managing and executing data cleaning rules using the [Kutabarik/SanitDb](https://github.com/your-username/sanitdb) package.

---

## Features

- Manage cleaning rules (add, edit, delete).
- Run data analysis based on defined rules.
- View analysis results in a structured format.

---

## Installation

1. Clone the repository:
```bash
git clone https://github.com/your-username/data-cleaning-ui.git
cd data-cleaning-ui
```

2. Install dependencies:
```bash
composer install
npm install && npm run build
```

3. Configure the environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Create rules storage file:
```bash
mkdir -p storage/app
touch storage/app/rules.json
```

5. Start the application:
```bash
php artisan serve
```

