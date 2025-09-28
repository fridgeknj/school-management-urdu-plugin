"# 🎓 WordPress School Management Plugin - Urdu Language Support

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![WordPress](https://img.shields.io/badge/WordPress-5.0%2B-blue.svg)](https://wordpress.org)
[![PHP](https://img.shields.io/badge/PHP-7.4%2B-purple.svg)](https://php.net)

## 🌟 Features Added

### ✅ **Complete Urdu Language Support**
- **Student Names (Urdu)** - طالب علم کا نام
- **Father Names (Urdu)** - والد کا نام  
- **Mother Names (Urdu)** - والدہ کا نام
- **Address (Urdu)** - مکمل پتہ
- **Jameel Noori Nastaleeq Font** - Professional Urdu typography

### ✅ **Enhanced ID Cards**
- **DOB Field Added** - Date of Birth display (previously missing)
- **Bilingual Layout** - English + Urdu side by side
- **Print Optimized** - Perfect rendering in PDF/Print
- **Professional Design** - School-standard ID cards

### ✅ **Advanced Features**
- **Database Migration** - Safe automatic updates
- **RTL Text Support** - Right-to-left Urdu text
- **Form Validation** - Urdu text validation
- **Backward Compatible** - Works with existing data

## 🚀 Quick Start

### Prerequisites
```bash
✅ WordPress 5.0+
✅ PHP 7.4+
✅ Original School Management Plugin installed
✅ Database backup recommended
```

### Installation Steps

1. **Download Files** from this repository
2. **Backup** your current plugin
3. **Replace** the 6 modified files in your WordPress plugin directory
4. **Deactivate & Reactivate** plugin to trigger database updates

**Detailed installation guide:** [INSTALLATION.md](INSTALLATION.md)

## 📸 Screenshots

### Before vs After
| Feature | Before ❌ | After ✅ |
|---------|-----------|----------|
| DOB on ID Card | Missing | ✅ Displayed |
| Urdu Names | Not supported | ✅ Full support |
| Print Quality | English only | ✅ Bilingual |
| Font Support | Basic | ✅ Jameel Noori |

### Form Interface
```
📝 English Fields:
└── Student Name: [Ahmad Ali]
└── Father Name: [Muhammad Ali] 
└── Address: [House 123, Street 5]

📝 اردو فیلڈز:
└── طالب علم: [احمد علی]
└── والد: [محمد علی]
└── پتہ: [مکان نمبر 123، گلی نمبر 5]
```

## 🔧 Technical Implementation

### Modified Files
| File | Purpose | Changes |
|------|---------|---------|
| `WLSM_Database.php` | Database schema | Added 4 Urdu columns |
| `save_student.php` | Student form | Added Urdu input fields |
| `WLSM_Staff_General.php` | Backend processing | Urdu data handling |
| `id_card.php` | ID card template | DOB + bilingual layout |
| `wlsm.css` | Main styles | Urdu font & RTL support |
| `wlsm-id-card.css` | Print styles | Urdu print optimization |

### Database Schema
```sql
-- New columns added to wp_wlsm_student_records
ALTER TABLE wp_wlsm_student_records ADD COLUMN name_urdu VARCHAR(255) DEFAULT NULL;
ALTER TABLE wp_wlsm_student_records ADD COLUMN father_name_urdu VARCHAR(60) DEFAULT NULL;
ALTER TABLE wp_wlsm_student_records ADD COLUMN mother_name_urdu VARCHAR(60) DEFAULT NULL;
ALTER TABLE wp_wlsm_student_records ADD COLUMN address_urdu TEXT DEFAULT NULL;
```

## 🎨 Font & Typography

### Google Fonts Integration
```css
@import url('https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400;500;600;700&display=swap');

.urdu-text {
    font-family: 'Noto Nastaliq Urdu', 'Jameel Noori Nastaleeq', serif;
    direction: rtl;
    text-align: right;
    line-height: 1.6;
}
```

## 📱 Usage Examples

### 1. Adding Student with Urdu Details
```php
// English data
$student_name = \"Ahmad Ali\";
$father_name = \"Muhammad Hassan\";

// Urdu data  
$student_name_urdu = \"احمد علی\";
$father_name_urdu = \"محمد حسن\";
```

### 2. ID Card Generation
```php
// Generates bilingual ID card with:
// - DOB field (newly added)
// - English + Urdu names
// - Print-ready layout
// - Professional styling
```

## 🐛 Troubleshooting

### Common Issues & Solutions

**Issue 1: Urdu text not displaying**
```bash
Solution: Check Google Fonts loading
curl -I https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu
```

**Issue 2: Database columns missing**  
```bash
Solution: Reactivate plugin or run SQL manually
wp plugin deactivate school-management
wp plugin activate school-management
```

**Issue 3: Print layout broken**
```bash
Solution: Clear browser cache and check CSS loading
```

## 🤝 Contributing

We welcome contributions! Here's how:

1. **Fork** this repository
2. **Create** feature branch: `git checkout -b feature/new-feature`
3. **Commit** changes: `git commit -m 'Add new feature'`
4. **Push** to branch: `git push origin feature/new-feature`  
5. **Create** Pull Request

### Development Setup
```bash
# Clone repository
git clone https://github.com/YOUR-USERNAME/school-management-urdu-plugin.git

# Create development environment
# Test with WordPress local setup
# Follow WordPress coding standards
```

## 📄 License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- **Original Plugin Developers** - Base school management functionality
- **Google Fonts Team** - Noto Nastaliq Urdu font
- **WordPress Community** - Development standards & best practices
- **Pakistani Educators** - Feature requirements & testing

## 📞 Support & Contact

- 🐛 **Bug Reports**: [Create Issue](../../issues/new?template=bug_report.md)
- 💡 **Feature Requests**: [Create Issue](../../issues/new?template=feature_request.md)
- 📧 **Direct Contact**: Open an issue for immediate support
- 📚 **Documentation**: Check [INSTALLATION.md](INSTALLATION.md) for setup help

## 🎯 Roadmap

### Version 1.1.0 (Planned)
- ✅ Result card Urdu support
- ✅ Attendance system enhancement
- ✅ Email templates in Urdu
- ✅ SMS notifications support

### Version 1.2.0 (Future)
- ✅ Multi-language support (Arabic, Hindi)
- ✅ Custom Urdu keyboard
- ✅ Advanced reporting in Urdu
- ✅ Mobile app integration

## 📊 Stats

- **Files Modified**: 6
- **Lines of Code Added**: ~200
- **Database Tables Updated**: 1
- **New Features**: 8
- **Backward Compatibility**: 100%

---

**Made with ❤️ for  Educational Institutions**

### 🇵🇰 **خصوصی طور پر تعلیمی اداروں کے لیے بنایا گیا**"
