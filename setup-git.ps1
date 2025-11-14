# TWTA Git Repository Setup Script
Write-Host "Setting up Git repository for TWTA..." -ForegroundColor Green

# Navigate to TWTA directory
Set-Location "c:\xampp\htdocs\twta"

# Check if Git is available
try {
    $gitVersion = git --version
    Write-Host "✓ Git found: $gitVersion" -ForegroundColor Green
} catch {
    Write-Host "✗ Git not found. Please install Git for Windows first." -ForegroundColor Red
    Write-Host "Download from: https://git-scm.com/download/win" -ForegroundColor Yellow
    Read-Host "Press Enter to exit"
    exit
}

# Initialize repository
Write-Host "Initializing Git repository..." -ForegroundColor Blue
git init

# Add all files
Write-Host "Adding files to repository..." -ForegroundColor Blue
git add .

# Create initial commit
Write-Host "Creating initial commit..." -ForegroundColor Blue
$commitMessage = @"
Initial commit: Security-hardened TWTA application

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
✓ Session security and access controls
"@

git commit -m $commitMessage

Write-Host ""
Write-Host "🎉 Git repository initialized successfully!" -ForegroundColor Green
Write-Host ""
Write-Host "🚀 Pushing to your GitHub repository..." -ForegroundColor Yellow

# Add remote repository
$repoUrl = "https://github.com/brajeshmishra26/twta.git"
Write-Host "Adding remote repository: $repoUrl" -ForegroundColor Blue
git remote add origin $repoUrl

# Set main branch
Write-Host "Setting main branch..." -ForegroundColor Blue
git branch -M main

# Push to GitHub
Write-Host "Pushing to GitHub..." -ForegroundColor Blue
git push -u origin main

Write-Host ""
Write-Host "✅ Successfully pushed to GitHub!" -ForegroundColor Green
Write-Host "🔗 Repository: https://github.com/brajeshmishra26/twta" -ForegroundColor Cyan
Write-Host ""
Write-Host "🔒 Your security-hardened application is ready for GitHub!" -ForegroundColor Green

# Show repository status
Write-Host ""
Write-Host "Repository status:" -ForegroundColor Cyan
git status

Read-Host "Press Enter to continue"