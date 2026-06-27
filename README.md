# Vendro - Enterprise Modular Digital Commerce Platform

This repository contains the Vendro platform bootstrap skeleton.

## Current Progress
- [x] Module 1: Folder Structure
- [x] Module 1: Bootstrap Skeleton Files
- [x] Module 2: Configuration
- [ ] Module 3: Database
- [ ] Module 4: Authentication
- [ ] Module 5: Wallet
- [ ] Module 6: Ledger
- [ ] Module 7: Queue Engine
- [ ] Module 8: Provider Engine
- [ ] Module 9: Transaction Engine
- [ ] Module 10: User Dashboard
- [ ] Module 11: Admin Dashboard
- [ ] Module 12: Public API
- [ ] Module 13: Webhooks
- [ ] Module 14: Documentation
- [ ] Module 15: Testing
- [ ] Module 16: Deployment

## Configuration Boot Rules
1. `.env` is loaded first from project root.
2. Environment variables are validated for presence and primitive type safety.
3. Config files are loaded from `config/*.php` via a centralized loader.
4. Required config keys are validated before application starts.
5. Config repository is immutable after initialization.
6. In non-local environments, weak/default JWT secrets are rejected.

## Local Setup
1. Copy environment file:
   - `cp .env.example .env`
2. Install dependencies:
   - `composer install`
3. Generate optimized autoload:
   - `composer dump-autoload`
4. Start web server to public directory (Apache/Nginx).

## Notes
- Use `config('app.name')` style access for configuration.
- Do not hardcode runtime values outside config files.
- All modules must respect standardized success/error response formats.
