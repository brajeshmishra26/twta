# TWTA - Teachers Writers and Thinkers Association

A comprehensive web application for the Teachers Writers and Thinkers Association, featuring member management, content publishing, and administrative tools.

## 🔒 Security Notice

This codebase has been **fully hardened** against security vulnerabilities including:
- ✅ Upload injection attacks
- ✅ SQL injection vulnerabilities  
- ✅ Database privilege escalation
- ✅ File execution vulnerabilities
- ✅ Credential exposure

## 🚀 Features

- **Member Management**: Registration, profiles, and membership tracking
- **Content Publishing**: Article submission and management system
- **Administrative Dashboard**: Complete admin panel for content and user management
- **Club Section**: Member interaction and activity tracking
- **File Upload System**: Secure document and image upload functionality
- **Gallery Management**: Photo and media management
- **Education Resources**: Educational content and resources

## 🏗️ Architecture

### Frontend
- HTML5/CSS3 with responsive design
- JavaScript/jQuery for interactivity
- Bootstrap framework for UI components

### Backend
- **PHP 7.4+** server-side logic
- **MySQL** database with secure connections
- **Environment-based configuration**
- **Prepared statements** for all database queries

### Security Implementation
- **MIME type validation** for all uploads
- **Random filename generation** to prevent conflicts
- **Execution blocking** in upload directories via .htaccess
- **Dedicated database user** with minimal privileges
- **Environment variable management** for credentials

## 📋 Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- GD extension for image processing

## 🔧 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/twta.git
   cd twta
   ```

2. **Set up environment configuration**
   ```bash
   cp .env.example .env
   ```
   
3. **Configure your database credentials in .env**
   ```env
   DB_HOST=127.0.0.1
   DB_USER=your_db_user
   DB_PASS=your_secure_password
   DB_NAME=twta
   ```

4. **Create the database and import schema**
   ```sql
   CREATE DATABASE twta;
   -- Import your SQL schema file
   ```

5. **Set up directory permissions**
   ```bash
   chmod 755 club/uploads club/docs club/images
   chmod 755 admin/fbimg admin/topicimg php/uploads
   ```

6. **Configure your web server** to point to the application root

## 🗂️ Project Structure

```
twta/
├── admin/              # Administrative panel
├── club/               # Member club section
├── php/                # Core PHP utilities
├── css/                # Stylesheets
├── js/                 # JavaScript files
├── images/             # Static images
├── include/            # Shared PHP includes
│   ├── connect.php     # Database connection
│   └── env.php         # Environment loader
├── doc/                # Documentation
└── .env.example        # Environment template
```

## 🔐 Security Features

### Upload Security
- **File type validation** using PHP's finfo extension
- **MIME type checking** to prevent malicious uploads
- **Size limits** enforced on all uploads
- **Random filename generation** using cryptographically secure methods
- **Directory execution blocking** via .htaccess files

### Database Security
- **Prepared statements** for all database queries
- **Dedicated database user** with minimal required privileges
- **Environment-based credential management**
- **Connection encryption** support

### Access Control
- **Session management** for user authentication
- **Role-based permissions** for admin/member access
- **Input validation** and sanitization throughout

## 🚦 Environment Configuration

The application uses environment variables for configuration. Copy `.env.example` to `.env` and configure:

```env
# Database Configuration
DB_HOST=127.0.0.1
DB_USER=twta_app
DB_PASS=your_secure_password
DB_NAME=twta

# Application Settings  
APP_ENV=production
APP_DEBUG=false
```

## 📝 Database Setup

1. Create a dedicated database user:
   ```sql
   CREATE USER 'twta_app'@'localhost' IDENTIFIED BY 'secure_password';
   GRANT SELECT, INSERT, UPDATE, DELETE ON twta.* TO 'twta_app'@'localhost';
   FLUSH PRIVILEGES;
   ```

2. Import the database schema and data

## 🛡️ Security Hardening Checklist

- [x] All upload endpoints secured with MIME validation
- [x] Database queries use prepared statements
- [x] Upload directories have execution blocking
- [x] Dedicated database user with limited privileges
- [x] Environment-based credential management
- [x] Input validation and sanitization
- [x] Session security implementation
- [x] Error handling and logging

## 📚 Documentation

Detailed documentation can be found in the `/doc` directory:
- `security-hardening.md` - Security implementation details
- API documentation for custom endpoints
- Deployment guides and best practices

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🔍 Security Reporting

If you discover a security vulnerability, please send an e-mail to security@twta.org instead of using the issue tracker.

## 👥 Maintainers

- TWTA Development Team

## 🎯 Version History

### v2.0.0 - Security Hardened (Current)
- Complete security audit and hardening
- Upload vulnerability patches
- Database security improvements
- Environment-based configuration
- Comprehensive input validation

### v1.0.0 - Initial Release
- Basic member management
- Content publishing system
- Administrative dashboard

---

**Note**: This application has undergone comprehensive security hardening. All upload endpoints, database queries, and user input handling have been secured against common web vulnerabilities.