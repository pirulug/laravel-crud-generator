# Changelog

All notable changes to this project will be documented in this file.

## [2.0.0] - 2026-05-08

### Added
- Official support for Laravel 13.x.
- Official support for Laravel 12.x.
- Comprehensive test suite using Orchestra Testbench.
- Multi-language support (English and Spanish).
- Translation files publishing (`php artisan vendor:publish --tag=crud-lang`).
- Automatic detection and generation of validation rules for `email`, `integer`, `numeric`, `uuid`, and `date`.
- API Resource field generation in `toArray()`.

### Changed
- Standardized all source code and stubs to **2-space indentation**.
- Modernized generated controllers to use **Route Model Binding**.
- Refactored `GeneratorCommand` to improve internal logic and version handling.
- Optimized `CrudServiceProvider` with `mergeConfigFrom` and improved publishing tags.
- Updated requirements to PHP 8.2+ and Laravel 10.x+.
- Cleaned up CLI output for a more professional look.

### Fixed
- Fixed command exit codes (returning 0 on success).
- Fixed issue where layout creation would fail in environments without Composer.
- Standardized Bootstrap and Tailwind stubs for consistency.
