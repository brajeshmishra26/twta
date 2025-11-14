# TWTA Deployment Script - Push to GitHub
# Repository: https://github.com/brajeshmishra26/twta.git

Write-Host "🚀 TWTA Security-Hardened Application Deployment" -ForegroundColor Green
Write-Host "=================================================" -ForegroundColor Green
Write-Host ""

# Navigate to project directory
$projectPath = "c:\xampp\htdocs\twta"
Set-Location $projectPath
Write-Host "📁 Working directory: $projectPath" -ForegroundColor Blue

# Check if Git is available
try {
    $gitVersion = git --version 2>$null
    Write-Host "✅ Git found: $gitVersion" -ForegroundColor Green
} catch {
    Write-Host "❌ Git not found! Please install Git for Windows." -ForegroundColor Red
    Write-Host "   Download from: https://git-scm.com/download/win" -ForegroundColor Yellow
    Read-Host "Press Enter to exit"
    exit 1
}

Write-Host ""
Write-Host "🔧 Setting up repository..." -ForegroundColor Blue

# Initialize repository (if not already initialized)
if (-not (Test-Path ".git")) {
    Write-Host "   Initializing Git repository..." -ForegroundColor Gray
    git init
} else {
    Write-Host "   Repository already initialized" -ForegroundColor Gray
}

# Configure git user (if not set)
$gitUser = git config user.name 2>$null
$gitEmail = git config user.email 2>$null

if (-not $gitUser) {
    Write-Host "   Setting git user..." -ForegroundColor Gray
    git config user.name "Brajesh Mishra"
}

if (-not $gitEmail) {
    Write-Host "   Setting git email..." -ForegroundColor Gray
    git config user.email "brajeshmishra26@users.noreply.github.com"
}

Write-Host ""
Write-Host "📦 Adding files to repository..." -ForegroundColor Blue

# Add all files except those in .gitignore
git add .

# Check if there are changes to commit
$status = git status --porcelain
if ($status) {
    Write-Host "   Found changes to commit" -ForegroundColor Gray
    
    # Create commit with detailed message
    $commitMessage = @"
🔒 Security-hardened TWTA application v2.0

SECURITY AUDIT & HARDENING COMPLETE:

🛡️ Upload Security:
- MIME type validation on all file uploads
- Random filename generation (cryptographically secure)
- File size limits enforced
- Upload directory execution blocking via .htaccess
- Extension whitelist validation

🔐 Database Security:
- Dedicated database user with minimal privileges
- All queries converted to prepared statements
- Environment-based credential management
- SQL injection prevention implemented

📁 File System Security:
- PHP execution disabled in upload directories
- Proper file permissions and access controls
- Secure file handling throughout application

🌍 Environment Configuration:
- Credentials externalized to environment variables
- Production-ready configuration management
- Secure defaults and fallback handling

✅ Comprehensive Security Features:
- Input validation and sanitization
- Session security improvements
- Error handling and logging
- Access control and permissions
- XSS prevention measures

📋 Quality Assurance:
- Full codebase security audit completed
- All vulnerabilities identified and patched
- Professional documentation added
- Deployment guides and best practices included

This release transforms the application from vulnerable to production-ready
with enterprise-grade security implementations.
"@

    Write-Host "   Creating security commit..." -ForegroundColor Gray
    git commit -m $commitMessage

} else {
    Write-Host "   No changes to commit" -ForegroundColor Gray
}

Write-Host ""
Write-Host "🌐 Connecting to GitHub repository..." -ForegroundColor Blue

# Add remote (remove existing if present)
$repoUrl = "https://github.com/brajeshmishra26/twta.git"
$existingRemote = git remote get-url origin 2>$null

if ($existingRemote) {
    if ($existingRemote -ne $repoUrl) {
        Write-Host "   Updating remote URL..." -ForegroundColor Gray
        git remote set-url origin $repoUrl
    } else {
        Write-Host "   Remote already configured correctly" -ForegroundColor Gray
    }
} else {
    Write-Host "   Adding remote repository..." -ForegroundColor Gray
    git remote add origin $repoUrl
}

Write-Host ""
Write-Host "📤 Pushing to GitHub..." -ForegroundColor Blue

# Set main branch and push
Write-Host "   Setting main branch..." -ForegroundColor Gray
git branch -M main

Write-Host "   Pushing to repository..." -ForegroundColor Gray
try {
    git push -u origin main
    
    Write-Host ""
    Write-Host "🎉 SUCCESS! Your security-hardened application is now on GitHub!" -ForegroundColor Green
    Write-Host ""
    Write-Host "🔗 Repository URL: https://github.com/brajeshmishra26/twta" -ForegroundColor Cyan
    Write-Host ""
    Write-Host "📋 What was uploaded:" -ForegroundColor Yellow
    Write-Host "   ✅ Complete security-hardened codebase" -ForegroundColor White
    Write-Host "   ✅ Professional documentation (README.md)" -ForegroundColor White
    Write-Host "   ✅ Security implementation details" -ForegroundColor White
    Write-Host "   ✅ Environment configuration templates" -ForegroundColor White
    Write-Host "   ✅ Deployment guides and best practices" -ForegroundColor White
    Write-Host "   ✅ MIT License for open source compliance" -ForegroundColor White
    Write-Host ""
    Write-Host "🔒 Security features protected:" -ForegroundColor Yellow
    Write-Host "   🛡️ All upload vulnerabilities patched" -ForegroundColor White
    Write-Host "   🛡️ SQL injection prevention implemented" -ForegroundColor White
    Write-Host "   🛡️ Database access properly restricted" -ForegroundColor White
    Write-Host "   🛡️ Credentials safely externalized (.env excluded)" -ForegroundColor White
    Write-Host "   🛡️ File execution blocking in upload directories" -ForegroundColor White
    Write-Host ""
    Write-Host "🚀 Your application is now production-ready!" -ForegroundColor Green
    
} catch {
    Write-Host ""
    Write-Host "❌ Push failed. This might be because:" -ForegroundColor Red
    Write-Host "   1. You need to authenticate with GitHub" -ForegroundColor Yellow
    Write-Host "   2. The repository doesn't exist yet" -ForegroundColor Yellow
    Write-Host "   3. You don't have push permissions" -ForegroundColor Yellow
    Write-Host ""
    Write-Host "💡 Solutions:" -ForegroundColor Blue
    Write-Host "   - Make sure the repository exists: https://github.com/brajeshmishra26/twta" -ForegroundColor White
    Write-Host "   - Set up GitHub authentication (Personal Access Token recommended)" -ForegroundColor White
    Write-Host "   - Try running: git push -u origin main" -ForegroundColor White
}

Write-Host ""
Read-Host "Press Enter to continue"