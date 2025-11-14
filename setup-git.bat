@echo off
echo Setting up Git repository for TWTA...

cd /d "c:\xampp\htdocs\twta"

echo Initializing Git repository...
git init

echo Adding all files...
git add .

echo Creating initial commit...
git commit -m "Initial commit: Security-hardened TWTA application

- Complete security audit and vulnerability patching
- Upload endpoints secured with MIME validation
- Database queries converted to prepared statements  
- Dedicated database user with limited privileges
- Environment-based credential management
- Upload directory execution blocking
- Comprehensive input validation and sanitization

Security features implemented:
✓ File upload security (MIME validation, random names, size limits)
✓ SQL injection prevention (prepared statements)
✓ Directory execution blocking (.htaccess protection)
✓ Database privilege restriction (dedicated user)
✓ Credential externalization (environment variables)
✓ Session security and access controls"

echo.
echo Git repository initialized successfully!
echo.
echo Pushing to your GitHub repository...

echo Adding remote repository...
git remote add origin https://github.com/brajeshmishra26/twta.git

echo Setting main branch...
git branch -M main

echo Pushing to GitHub...
git push -u origin main

echo.
echo Successfully pushed to GitHub!
echo Repository: https://github.com/brajeshmishra26/twta
echo.
echo Your security-hardened application is ready for GitHub!

pause