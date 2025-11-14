-- Database User Setup Script
-- Creates a dedicated user for the TWTA application with minimal privileges

-- Create the dedicated user
CREATE USER 'twta_app'@'localhost' IDENTIFIED BY 'tWtA_2024#SecurePass!';

-- Grant only necessary privileges to the TWTA database
GRANT SELECT, INSERT, UPDATE, DELETE ON twta.* TO 'twta_app'@'localhost';

-- Optional: Grant specific table-level privileges if you want more granular control
-- GRANT CREATE, DROP, ALTER ON twta.* TO 'twta_app'@'localhost';  -- Uncomment if app needs to modify schema

-- Ensure changes take effect
FLUSH PRIVILEGES;

-- Show the new user
SELECT User, Host, authentication_string FROM mysql.user WHERE User = 'twta_app';

-- Show granted privileges
SHOW GRANTS FOR 'twta_app'@'localhost';

-- Test connection (you can run this separately)
-- SELECT 'Connection test successful' AS status;