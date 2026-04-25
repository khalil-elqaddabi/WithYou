<div align="center">

<br />

# WithYou

### The e-learning platform built for real classrooms.

**WithYou** brings teachers, students, and content together in one structured workspace —
no scattered tools, no confusion, just focused learning.

<br />

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind-38B2AC?style=flat-square&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=flat-square&logo=vite&logoColor=white)
![License](https://img.shields.io/badge/license-MIT-green?style=flat-square)

<br />

</div>

---

## What is WithYou?

Most online learning setups are messy — courses live in one tool, files in another, communication somewhere else. **WithYou fixes that.**

It's a role-based e-learning platform where teachers build structured workspaces, students follow courses and lessons, and admins keep everything running. Everything in one place, everyone on the same page.

---

## Highlights

- **Role-based by design** — Admin, Teacher, and Student each get a fully scoped experience with their own dashboard, routes, and permissions.
- **Workspace-first model** — All learning happens inside workspaces. Teachers own them, students join them.
- **Structured content** — Courses → Lessons → Exercises. A clear hierarchy that mirrors real classroom logic.
- **Rich lesson types** — Text, PDF attachments, external links — teachers can combine them freely.
- **Clean, fast UI** — Built with Tailwind CSS and Blade components. Light/dark mode supported.
- **Search everywhere** — Admins can search across teachers, students, and workspaces instantly.

---

## Who it's for

| Role | What they do |
|---|---|
| **Admin** | Manages users, monitors the platform, views all workspaces and stats |
| **Teacher** | Creates workspaces, builds courses and lessons, enrolls students |
| **Student** | Joins workspaces, follows lessons, completes exercises |

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 11 |
| Frontend | Blade + Tailwind CSS |
| Build tool | Vite |
| Database | MySQL |
| Auth | Laravel Breeze + custom role middleware |
| Version control | Git |

---

## Architecture

```
withyou/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Platform-wide management
│   │   │   ├── Teacher/        # Workspace & content control
│   │   │   └── Student/        # Read & learn
│   │   └── Middleware/         # Role guards
│   └── Models/                 # User · Workspace · Course · Lesson · Exercise
├── resources/
│   └── views/
│       ├── admin/
│       ├── teacher/
│       └── student/
├── routes/
│   └── web.php                 # Scoped per role
└── database/
    └── migrations/
```

**Every role is fully isolated.** A student can't access teacher routes. A teacher can't touch admin pages. Middleware enforces it at every level.

---

## Getting Started

**Requirements:** PHP 8.2+, Composer, Node.js 18+, MySQL

```bash
# Clone
git clone https://github.com/khalil-elqaddabi/withyou.git
cd withyou

# Install dependencies
composer install && npm install

# Environment
cp .env.example .env
php artisan key:generate

# Database — update .env with your credentials, then:
php artisan migrate

# Run
php artisan serve
npm run dev
```

### Demo accounts

| Role | Email | Password |
|---|---|---|
| Admin | admin@example.com | password |
| Teacher | teacher@example.com | password |
| Student | student@example.com | password |

---

## UI & UX

WithYou ships with a consistent design system across all three roles:

- **Light & dark mode** — persisted via `localStorage`, respects system preference
- **Responsive layout** — works on desktop and tablet out of the box
- **Component-based** — Blade components keep views clean and reusable
- **Contextual navigation** — each role sees only what's relevant to them

---

## Current Status

| Module | Status |
|---|---|
| Authentication & roles | ✅ Stable |
| Admin dashboard | ✅ Stable |
| Teacher dashboard | ✅ Stable |
| Student dashboard | ✅ Stable |
| Workspaces | ✅ Stable |
| Courses & lessons | ✅ Stable |
| Exercises | ⚡ Basic |
| Real-time chat | 🔜 Planned |
| Video calls | 🔜 Planned |
| Analytics & charts | 🔜 Planned |

---

## Roadmap

The foundation is solid. Here's what comes next:

- **Real-time chat** — per-workspace messaging with Laravel Echo + Pusher
- **Video calls** — live session support via WebRTC or a third-party SDK
- **Analytics** — lesson completion rates, student progress, Chart.js dashboards
- **Notifications** — in-app alerts for new lessons, exercises, and enrollments
- **Advanced search** — filters by date, role, subject, and workspace
- **Mobile polish** — fully responsive across all screen sizes

---

## Why this project?

WithYou started as a portfolio project with a real goal: prove that a clean, production-grade Laravel app can be built with good architecture, proper role separation, and a UI that actually looks professional.

It demonstrates:

```
✔  Laravel MVC architecture
✔  Role-based access control (RBAC)
✔  Multi-role authentication with Breeze
✔  Reusable Blade component system
✔  Full CRUD across all roles
✔  Clean, consistent UI with Tailwind CSS
✔  Separation of concerns at every layer
```

---

## Author

**Khalil El Qaddabi** — Full Stack Developer


---

<div align="center">
<sub>Built with care. Designed to grow.</sub>
</div>
