# Security Hardening Changes (2025-11-13)

This document summarizes the immediate hardening actions applied to reduce attack surface and mitigate common webshell persistence vectors.

## Changes Implemented

- Server-side redirect at `index.php` replacing client-side JS redirect to `CMS/`.
- Added `.htaccess` to block script execution in user-writable folders:
  - `club/uploads/`
  - `club/docs/`
  - `club/images/`
  - `admin/fbimg/`
  - `admin/topicimg/`
- Secured generic upload handler `club/upload.php`:
  - Strict allow-list for extensions (`pdf`, `mp4`) and MIME types (finfo).
  - 50MB size limit with explicit checks.
  - Cryptographically random filenames.
  - Prepared statements when inserting metadata.
  - Clear HTTP response codes and messages.

- Centralized DB configuration via environment variables:
  - New `include/env.php` to load `.env` and populate environment
  - Updated connectors: `club/include/connect.php`, `admin/include/connect.php`, `php/db.php`
  - Added `.env.example` with placeholders (actual `.env` not committed)

- Hardened additional upload endpoints with MIME/extension allow-lists, size limits, random filenames, and prepared statements:
  - `club/photoupload.php` (writer photo)
  - `club/profile.php` (profile photo + profile updates)
  - `club/payment.php` (legacy profile/photo handler made safe)
  - `club/workprofile.php` (work logo + details)
  - `admin/new_writer.php` (writer photo + aadhar; image/PDF allowed)
  - `admin/fbupload.php` and `admin/fbupload_1.php` (gallery/achievement images)
  - `admin/assign.php` (PDF order upload)
  - `admin/associate.php` (associate photo)

  Also normalized `mysqli_query` usage to pass the active `$link` connection and wrapped stale inline PHP blocks to avoid executing outdated queries.

## Recommended Next Steps

- Rotate database credentials and remove hard-coded secrets from VCS; use environment variables. [env loader in place; rotation pending]
- Apply similar upload validation to all upload entrypoints (`new_writer.php`, `profile.php`, `workprofile.php`, `photoupload.php`, and admin uploaders).
- Migrate inline SQL to prepared statements across the codebase.
- Add a WAF or ModSecurity CRS on the web server.
- Configure periodic malware scans and integrity monitoring.
- Enforce least-privilege filesystem permissions on upload directories.

## Incident Response Checklist

1. Take a filesystem + database backup snapshot.
2. Review recent file modifications in webroot (mtime) for unexpected changes.
3. Search for obfuscated payload patterns (eval/base64/gzinflate/assert etc.).
4. Inspect web server logs for suspicious requests to upload and admin endpoints.
5. Rotate all credentials (DB, admin accounts, SMS/API keys).
6. Redeploy from a clean baseline if compromise is confirmed.
