"# 🛠️ Installation Guide - School Management Urdu Plugin

## 📋 Prerequisites

### System Requirements
```
✅ WordPress: 5.0 or higher
✅ PHP: 7.4 or higher  
✅ MySQL: 5.6 or higher
✅ Original School Management Plugin: v10.6.3
✅ Server: Apache/Nginx with mod_rewrite
```

### Before Installation
```bash
# 1. Backup your website
wp db export backup_$(date +%Y%m%d).sql

# 2. Backup plugin files
cp -r /wp-content/plugins/school-management /tmp/school-management-backup

# 3. Check plugin version
wp plugin list | grep school-management
```

## 🚀 Installation Methods

### Method 1: File Replacement (Recommended)

**Step 1: Download Files**
```bash
# Download from GitHub releases
wget https://github.com/YOUR-USERNAME/school-management-urdu-plugin/archive/refs/heads/main.zip

# Or clone repository  
git clone https://github.com/YOUR-USERNAME/school-management-urdu-plugin.git
```

**Step 2: Replace Files**
```bash
# Navigate to WordPress plugins directory
cd /wp-content/plugins/school-management/

# Replace database file
cp /path/to/downloaded/admin/inc/WLSM_Database.php admin/inc/

# Replace form file  
cp /path/to/downloaded/admin/inc/school/staff/partials/save_student.php admin/inc/school/staff/partials/

# Replace backend processor
cp /path/to/downloaded/admin/inc/school/staff/general/WLSM_Staff_General.php admin/inc/school/staff/general/

# Replace ID card template
cp /path/to/downloaded/admin/inc/school/print/partials/id_card.php admin/inc/school/print/partials/

# Replace CSS files
cp /path/to/downloaded/assets/css/wlsm.css assets/css/
cp /path/to/downloaded/assets/css/print/wlsm-id-card.css assets/css/print/
```

**Step 3: Activate Updates**
```bash
# Deactivate plugin
wp plugin deactivate school-management

# Reactivate to trigger database updates
wp plugin activate school-management

# Verify activation
wp plugin list | grep school-management
```

### Method 2: Manual Database Update

If automatic database update fails:

```sql
-- Connect to your WordPress database
mysql -u username -p database_name

-- Add Urdu columns to student records table
USE your_wordpress_database;

ALTER TABLE wp_wlsm_student_records 
ADD COLUMN name_urdu VARCHAR(255) DEFAULT NULL,
ADD COLUMN father_name_urdu VARCHAR(60) DEFAULT NULL,
ADD COLUMN mother_name_urdu VARCHAR(60) DEFAULT NULL,
ADD COLUMN address_urdu TEXT DEFAULT NULL;

-- Verify columns added
DESCRIBE wp_wlsm_student_records;

-- Exit database
exit;
```

## ✅ Verification Steps

### 1. Check Database Updates
```sql
-- Login to database
mysql -u username -p

-- Check if Urdu columns exist
SELECT COLUMN_NAME 
FROM INFORMATION_SCHEMA.COLUMNS 
WHERE TABLE_NAME = 'wp_wlsm_student_records' 
AND COLUMN_NAME LIKE '%_urdu';

-- Should show 4 results:
-- name_urdu
-- father_name_urdu  
-- mother_name_urdu
-- address_urdu
```

### 2. Test Admin Interface
```
1. Login to WordPress admin
2. Go to Students → Add Student
3. Check if these fields appear:
   ✅ Student Name (Urdu)
   ✅ Father Name (Urdu)  
   ✅ Mother Name (Urdu)
   ✅ Address (Urdu)
4. Fields should have RTL text direction
5. Placeholders should be in Urdu
```

### 3. Test ID Card Generation
```
1. Add a test student with Urdu data
2. Go to Students → Student List  
3. Click \"Print ID Card\" for the student
4. Verify:
   ✅ DOB field appears
   ✅ Urdu text displays correctly
   ✅ Font renders as Noto Nastaliq Urdu
   ✅ Print preview shows bilingual layout
```

### 4. Test Print Functionality
```
1. Open ID card in browser
2. Press Ctrl+P (or Cmd+P on Mac)
3. Check print preview:
   ✅ Urdu text visible in preview
   ✅ Layout not broken
   ✅ Font renders correctly
   ✅ No text overflow
```

## 🐛 Troubleshooting

### Issue 1: Plugin Activation Error
```
Error: \"Plugin could not be activated due to fatal error\"

Solution:
1. Check PHP error logs:
   tail -f /var/log/php-error.log

2. Common causes:
   - PHP version incompatibility
   - Missing file permissions
   - Corrupted file uploads

3. Fix permissions:
   chmod 644 *.php
   chmod 755 directories/

4. Reactivate plugin
```

### Issue 2: Urdu Fields Not Showing
```
Error: New fields don't appear in student form

Solution:
1. Clear all caches:
   - WordPress cache
   - Browser cache  
   - Server cache (if using)

2. Check file replacements:
   ls -la admin/inc/school/staff/partials/save_student.php
   
3. Verify file contents:
   grep -n \"name_urdu\" admin/inc/school/staff/partials/save_student.php

4. Should return multiple matches
```

### Issue 3: Database Columns Missing
```
Error: Database not updated automatically  

Solution:
1. Check current columns:
   wp db query \"DESCRIBE wp_wlsm_student_records\"

2. Manual database update:
   wp db query \"ALTER TABLE wp_wlsm_student_records ADD name_urdu VARCHAR(255)\"
   wp db query \"ALTER TABLE wp_wlsm_student_records ADD father_name_urdu VARCHAR(60)\"
   wp db query \"ALTER TABLE wp_wlsm_student_records ADD mother_name_urdu VARCHAR(60)\"
   wp db query \"ALTER TABLE wp_wlsm_student_records ADD address_urdu TEXT\"

3. Verify additions:
   wp db query \"SHOW COLUMNS FROM wp_wlsm_student_records LIKE '%_urdu'\"
```

### Issue 4: Urdu Font Not Loading
```
Error: Urdu text shows in wrong font

Solution:
1. Check Google Fonts connection:
   curl -I https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu

2. Verify CSS file updated:
   grep -n \"Noto Nastaliq Urdu\" assets/css/wlsm.css

3. Clear browser cache:
   Ctrl+Shift+R (or Cmd+Shift+R on Mac)

4. Check network tab for font loading errors
```

### Issue 5: Print Layout Broken
```
Error: Urdu text not visible in print

Solution:
1. Check print CSS file:
   ls -la assets/css/print/wlsm-id-card.css

2. Verify print styles:
   grep -n \"urdu-text\" assets/css/print/wlsm-id-card.css

3. Test print preview in different browsers:
   - Chrome: Better font support
   - Firefox: May need font fallbacks
   - Safari: Check font loading

4. Add local font fallback if needed
```

## 🔄 Rollback Instructions

If you need to revert changes:

### Quick Rollback
```bash
# 1. Deactivate plugin
wp plugin deactivate school-management

# 2. Restore backup files
cp -r /tmp/school-management-backup/* /wp-content/plugins/school-management/

# 3. Restore database (optional)
wp db import backup_YYYYMMDD.sql

# 4. Reactivate plugin  
wp plugin activate school-management
```

### Selective Rollback (Keep Urdu Data)
```bash
# Only restore original files, keep database changes
cp /tmp/school-management-backup/admin/inc/WLSM_Database.php admin/inc/
cp /tmp/school-management-backup/admin/inc/school/staff/partials/save_student.php admin/inc/school/staff/partials/
# ... restore other files as needed

# Keep Urdu columns in database for future use
```

## 📞 Support

### Getting Help
```
🐛 Technical Issues: Create GitHub issue
📧 Direct Support: Email via GitHub profile  
📚 Documentation: Check README.md
💬 Community: WordPress forums
```

### Provide Information When Reporting Issues
```
1. WordPress version: wp --version
2. PHP version: php --version  
3. Plugin version: Check changelog
4. Error messages: Full error text
5. Browser/OS: Chrome 91, Windows 10, etc.
6. Steps to reproduce: Detailed list
```

---

**Installation Complete! 🎉**

Your WordPress School Management Plugin now supports full Urdu language features with professional ID cards and bilingual forms."
