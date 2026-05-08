# AssetWise Theme

Custom WordPress theme used for AssetWise websites and landing experiences.

## Theme Metadata

- **Theme name:** Seed Spring
- **Text domain:** `spring`
- **Theme header source:** `style.css`

## Requirements

- WordPress 6.x
- PHP 8.1+ recommended
- Composer (for PHP dependencies in `vendor/`)
- Node.js (optional, for frontend package management / Tailwind-related packages)

## Quick Start

1. Put this folder in `wp-content/themes/assetwise`.
2. Install PHP dependencies:
   - `composer install`
3. Install Node dependencies (if needed for frontend work):
   - `npm install`
4. Activate the theme from WordPress admin.

## Project Structure

Key locations in this theme:

- `functions.php`  
  Main bootstrap for theme setup, menus, sidebars, asset enqueue, hooks, and feature flags.

- `inc/`  
  Shared logic and integrations:
  - `api.php`, `endpoint.php`, `_endpoint.php`
  - `shortcode.php`
  - `woocommerce.php`
  - `customizer.php`
  - `template-tags.php`
  - `superapp/` (project-specific logic)

- `template-parts/`  
  Reusable components and content partials (home sections, hot-deal modules, search blocks, forms, etc.).

- `template-project/`  
  Project detail template variants (`modern`, `elegant`, `dynamic`, `delightful`, `all`).

- `template-css/`  
  CSS files tied to template variants and specialized sections.

- `css/` and `js/`  
  Theme frontend assets (mobile/desktop styles, scripts).

- Root templates  
  Large set of page and single templates, for example:
  - `page-*.php`
  - `single-*.php`
  - `taxonomy-project-type*.php`
  - `template-all-*.php`
  - `v1-*`, `v2-*`, `v3-*` legacy/versioned templates

- `vendor/`  
  Composer-installed dependencies.

## Styling and Assets

- Base CSS entry points are in `css/` (including `mobile.css`, `desktop.css`, `ie.css`).
- Theme enqueue runs in `functions.php` (`seed_scripts()`).
- Versioning uses file timestamps for cache busting on local files.
- `style.css` is still used for theme header and optional overrides.

## API and Cron-like Page Endpoints

This theme includes multiple page template endpoints for internal integrations and automations, such as:

- `page-api-internal-*.php`
- `page-api-form-auto-cron.php`
- `page-api-grow-together-form.php`

Use extra caution when modifying these files:

- Validate/sanitize all input
- Escape output where relevant
- Protect privileged operations
- Verify expected runtime context (CLI/cron/webhook/browser)

## CI/CD

GitLab CI config is in `.gitlab-ci.yml` and currently:

- Deploys from `main`
- Syncs changed files via `rsync`
- Applies server permissions/SELinux context
- Optionally flushes WP cache and restarts Apache

## Notes for Contributors

- This codebase contains active templates plus legacy/versioned templates (`v1`, `v2`, `v3`).
- Before deleting old templates, verify they are not referenced by content, ACF fields, or internal links.
- Prefer updating shared partials in `template-parts/` when possible to reduce duplication.

## Recent Maintenance

- Fixed `filemtime(): stat failed` issues in `functions.php` by using safe file-exists checks before `filemtime()`.
