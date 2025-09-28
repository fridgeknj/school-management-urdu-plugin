                /* Add Urdu language support fields for bilingual education system */
                $row = $wpdb->get_results("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . DB_NAME . "' AND TABLE_NAME = '" . WLSM_STUDENT_RECORDS . "' AND COLUMN_NAME = 'name_urdu'");
                if (empty($row)) {
                        $wpdb->query("ALTER TABLE " . WLSM_STUDENT_RECORDS . " ADD name_urdu varchar(255) DEFAULT NULL");
                        $wpdb->query("ALTER TABLE " . WLSM_STUDENT_RECORDS . " ADD father_name_urdu varchar(60) DEFAULT NULL");
                        $wpdb->query("ALTER TABLE " . WLSM_STUDENT_RECORDS . " ADD mother_name_urdu varchar(60) DEFAULT NULL");
                        $wpdb->query("ALTER TABLE " . WLSM_STUDENT_RECORDS . " ADD address_urdu text DEFAULT NULL");
                }

                /* Create promotions table */
                $sql = "CREATE TABLE IF NOT EXISTS " . WLSM_PROMOTIONS . " (
