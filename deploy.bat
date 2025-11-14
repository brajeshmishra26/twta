@echo off
echo.
echo ===============================================
echo   TWTA Security-Hardened Application Deploy  
echo   Repository: brajeshmishra26/twta
echo ===============================================
echo.

cd /d "c:\xampp\htdocs\twta"

echo Running PowerShell deployment script...
echo.

powershell -ExecutionPolicy Bypass -File "deploy-to-github.ps1"

pause