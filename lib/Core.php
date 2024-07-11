<?php


class Core
{

    private $db;
    public $site_name; // $settings->site_name;
    public $site_acronyme; // $settings->site_acronyme;
    public $c_nit; // $settings->c_nit;
    public $c_phone; // $settings->c_phone;
    public $cell_phone; // $settings->cell_phone;
    public $c_address; // $settings->c_address;
    public $c_country; // $settings->c_country;
    public $c_city; // $settings->c_city;
    public $c_postal; // $settings->c_postal;
    public $site_url; // $settings->site_url;

    //EMAIL SMTP
    public $site_email; // $settings->site_email;
    public $mailer; // $settings->mailer;
    public $smtp_names; // $settings->smtp_names;
    public $email_address; // $settings->email_address;
    public $smtp_host; // $settings->smtp_host;
    public $smtp_user; // $settings->smtp_user;
    public $smtp_password; // $settings->smtp_password;
    public $smtp_port; // $settings->smtp_port;
    public $smtp_secure; // $settings->smtp_secure;

    //SETTINGS COMPANY
    public $logo; // $settings->logo;
    public $favicon; // $settings->favicon;
    public $logo_web; // $settings->logo_web;
    //SETTINGS TRACK INVOICE AND TAXES
    public $version; // $settings->version;
    public $prefix; // $settings->prefix;
    public $track_digit; // $settings->track_digit;
    public $digit_random; // $settings->digit_random;
    public $currency; // $settings->currency;
    public $timezone; // $settings->timezone;
    public $language; // $settings->language;
    public $code_number; // $settings->code_number;
    public $twitter;
    public $facebook;
    public $instagram;
    public $linkedin;

    function __construct()
    {
        $this->db = new Conexion;
        $this->cdp_getSettings();
    }

    public function role_track($branchId, $sessionId, $deptId)
    {
        $this->db->cdp_query("SELECT MAX(role) AS role  FROM student WHERE (branch_id='" . $branchId . "' and session_id='" . $sessionId . "' and dept_id='" . $deptId . "')");
        $this->db->cdp_execute();
        $max_role = $this->db->cdp_fetch_assoc();
        $max_role = $max_role['role'];
        $max_role = $max_role + 1;
        $role_str = (string) $max_role;
        $format = str_pad($role_str, 3, "0", STR_PAD_LEFT);
        return $format;
    }
    public function branch_role_track($branchId)
    {
        $this->db->cdp_query("SELECT MAX(branch_role) AS role  FROM student WHERE branch_id='" . $branchId . "'");
        $this->db->cdp_execute();
        $max_role = $this->db->cdp_fetch_assoc();
        $max_role = $max_role['role'];
        $max_role = $max_role + 1;
        $role_str = (string) $max_role;
        $format = str_pad($role_str, 4, "0", STR_PAD_LEFT);
        return $format;
    }
    private function cdp_getSettings()
    {

        $this->db->cdp_query('SELECT * FROM settings');
        $this->db->cdp_execute();
        $settings = $this->db->cdp_registro();

        $this->site_name = $settings->site_name;
        $this->site_acronyme = $settings->site_acronyme;
        $this->c_nit = $settings->c_nit;
        $this->c_phone = $settings->c_phone;
        $this->cell_phone = $settings->cell_phone;
        $this->c_address = $settings->c_address;
        // $this->locker_address = $settings->locker_address;
        $this->c_country = $settings->c_country;
        $this->c_city = $settings->c_city;
        $this->c_postal = $settings->c_postal;
        $this->site_url = $settings->site_url;

        //EMAIL SMTP
        $this->site_email = $settings->site_email;
        $this->mailer = $settings->mailer;
        $this->smtp_names = $settings->smtp_names;
        $this->email_address = $settings->email_address;
        $this->smtp_host = $settings->smtp_host;
        $this->smtp_user = $settings->smtp_user;
        $this->smtp_password = $settings->smtp_password;
        $this->smtp_port = $settings->smtp_port;
        $this->smtp_secure = $settings->smtp_secure;

        //SETTINGS COMPANY
        $this->logo = $settings->logo;
        $this->favicon = $settings->favicon;
        $this->twitter = $settings->twitter;
        $this->facebook = $settings->facebook;
        $this->logo_web = $settings->logo_web;
        //SETTINGS TRACK INVOICE AND TAXES
        $this->version = $settings->version;
        $this->prefix = $settings->prefix;
        $this->track_digit = $settings->track_digit;
        $this->digit_random = $settings->digit_random;

        $this->currency = $settings->currency;
        $this->instagram = $settings->instagram;
        $this->linkedin = $settings->linkedin;
        $this->timezone = $settings->timezone;
        $this->language = $settings->language;
        $this->code_number = $settings->code_number;
        date_default_timezone_set($this->timezone);
    }


    public function getBranch()
    {
        $sql = "SELECT * FROM branch ORDER BY branch_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getSession()
    {
        $sql = "SELECT * FROM session ORDER BY session_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getUser()
    {
        $sql = "SELECT * FROM user ORDER BY user_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getStaff()
    {
        $sql = "SELECT * FROM staff ORDER BY staff_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getDept()
    {
        $sql = "SELECT * FROM dept ORDER BY dept_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getStudent()
    {
        $sql = "SELECT * FROM student ORDER BY student_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getCourse()
    {
        $sql = "SELECT * FROM course ORDER BY course_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getAllocation()
    {
        $sql = "SELECT * FROM allocation ORDER BY allocation_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getAllocationHistory()
    {
        $sql = "SELECT * FROM allocation_history ORDER BY allocation_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getCourseRegister()
    {
        $sql = "SELECT * FROM course_register ORDER BY course_register_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getTimetable()
    {
        $sql = "SELECT * FROM timetable ORDER BY timetable_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getSigning()
    {
        $sql = "SELECT * FROM signing ORDER BY signing_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getMessage()
    {
        $sql = "SELECT * FROM message ORDER BY message_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getCredential()
    {
        $sql = "SELECT * FROM credential ORDER BY credential_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getCredentialDetails()
    {
        $sql = "SELECT * FROM credential_details ORDER BY credential_details_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getEmailTemplate()
    {
        $sql = "SELECT * FROM email_template ORDER BY email_template_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getNotification()
    {
        $sql = "SELECT * FROM notification ORDER BY notification_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getNotificationUser()
    {
        $sql = "SELECT * FROM notification_user ORDER BY notification_user_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getState()
    {
        $sql = "SELECT * FROM state ORDER BY state_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getCity()
    {
        $sql = "SELECT * FROM city ORDER BY city_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getAddress()
    {
        $sql = "SELECT * FROM address ORDER BY address_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getSettings()
    {
        $sql = "SELECT * FROM settings ORDER BY settings_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getInvoice()
    {
        $sql = "SELECT * FROM invoice ORDER BY invoice_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getGenerated()
    {
        $sql = "SELECT * FROM generated ORDER BY generated_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getPaidInvoice()
    {
        $sql = "SELECT * FROM paid_invoice ORDER BY paid_invoice_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getPortfolio()
    {
        $sql = "SELECT * FROM portfolio ORDER BY portfolio_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getTestimonial()
    {
        $sql = "SELECT * FROM testimonial ORDER BY testimonial_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getEducation()
    {
        $sql = "SELECT * FROM education ORDER BY education_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getExperience()
    {
        $sql = "SELECT * FROM experience ORDER BY experience_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getJob()
    {
        $sql = "SELECT * FROM job ORDER BY function_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getSkills()
    {
        $sql = "SELECT * FROM skills ORDER BY skills_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getItem()
    {
        $sql = "SELECT * FROM item ORDER BY item_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getFacts()
    {
        $sql = "SELECT * FROM facts ORDER BY facts_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getForm()
    {
        $sql = "SELECT * FROM form ORDER BY form_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getZone()
    {
        $sql = "SELECT * FROM zone ORDER BY zone_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getStyle()
    {
        $sql = "SELECT * FROM style ORDER BY style_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getBranchWhere($where)
    {
        $sql = "SELECT * FROM branch WHERE $where ORDER BY branch_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getSessionWhere($where)
    {
        $sql = "SELECT * FROM session WHERE $where ORDER BY session_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getUserWhere($where)
    {
        $sql = "SELECT * FROM user WHERE $where ORDER BY user_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getStaffWhere($where)
    {
        $sql = "SELECT * FROM staff WHERE $where ORDER BY staff_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getDeptWhere($where)
    {
        $sql = "SELECT * FROM dept WHERE $where ORDER BY dept_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getStudentWhere($where)
    {
        $sql = "SELECT * FROM student WHERE $where ORDER BY student_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getCourseWhere($where)
    {
        $sql = "SELECT * FROM course WHERE $where ORDER BY course_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getAllocationWhere($where)
    {
        $sql = "SELECT * FROM allocation WHERE $where ORDER BY allocation_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getAllocationHistoryWhere($where)
    {
        $sql = "SELECT * FROM allocation_history WHERE $where ORDER BY allocation_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getCourseRegisterWhere($where)
    {
        $sql = "SELECT * FROM course_register WHERE $where ORDER BY course_register_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getTimetableWhere($where)
    {
        $sql = "SELECT * FROM timetable WHERE $where ORDER BY timetable_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getSigningWhere($where)
    {
        $sql = "SELECT * FROM signing WHERE $where ORDER BY signing_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getMessageWhere($where)
    {
        $sql = "SELECT * FROM message WHERE $where ORDER BY message_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getCredentialWhere($where)
    {
        $sql = "SELECT * FROM credential WHERE $where ORDER BY credential_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getCredentialDetailsWhere($where)
    {
        $sql = "SELECT * FROM credential_details WHERE $where ORDER BY credential_details_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getEmailTemplateWhere($where)
    {
        $sql = "SELECT * FROM email_template WHERE $where ORDER BY email_template_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getNotificationWhere($where)
    {
        $sql = "SELECT * FROM notification WHERE $where ORDER BY notification_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getNotificationUserWhere($where)
    {
        $sql = "SELECT * FROM notification_user WHERE $where ORDER BY notification_user_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getStateWhere($where)
    {
        $sql = "SELECT * FROM state WHERE $where ORDER BY state_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getCityWhere($where)
    {
        $sql = "SELECT * FROM city WHERE $where ORDER BY city_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getAddressWhere($where)
    {
        $sql = "SELECT * FROM address WHERE $where ORDER BY address_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getSettingsWhere($where)
    {
        $sql = "SELECT * FROM settings WHERE $where ORDER BY settings_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getInvoiceWhere($where)
    {
        $sql = "SELECT * FROM invoice WHERE $where ORDER BY invoice_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getGeneratedWhere($where)
    {
        $sql = "SELECT * FROM generated WHERE $where ORDER BY generated_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getPaidInvoiceWhere($where)
    {
        $sql = "SELECT * FROM paid_invoice WHERE $where ORDER BY paid_invoice_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getPortfolioWhere($where)
    {
        $sql = "SELECT * FROM portfolio WHERE $where ORDER BY portfolio_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getTestimonialWhere($where)
    {
        $sql = "SELECT * FROM testimonial WHERE $where ORDER BY testimonial_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getEducationWhere($where)
    {
        $sql = "SELECT * FROM education WHERE $where ORDER BY education_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getExperienceWhere($where)
    {
        $sql = "SELECT * FROM experience WHERE $where ORDER BY experience_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getJobWhere($where)
    {
        $sql = "SELECT * FROM job WHERE $where ORDER BY function_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getSkillsWhere($where)
    {
        $sql = "SELECT * FROM skills WHERE $where ORDER BY skills_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getItemWhere($where)
    {
        $sql = "SELECT * FROM item WHERE $where ORDER BY item_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getFactsWhere($where)
    {
        $sql = "SELECT * FROM facts WHERE $where ORDER BY facts_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getFormWhere($where)
    {
        $sql = "SELECT * FROM form WHERE $where ORDER BY form_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function getZoneWhere($where)
    {
        $sql = "SELECT * FROM zone WHERE $where ORDER BY zone_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }


    public function getStyleWhere($where)
    {
        $sql = "SELECT * FROM style WHERE $where ORDER BY style_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registros();

        return $row;
    }

    public function get1BranchWhere($where)
    {
        $sql = "SELECT * FROM branch WHERE $where ORDER BY branch_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1SessionWhere($where)
    {
        $sql = "SELECT * FROM session WHERE $where ORDER BY session_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1UserWhere($where)
    {
        $sql = "SELECT * FROM user WHERE $where ORDER BY user_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1StaffWhere($where)
    {
        $sql = "SELECT * FROM staff WHERE $where ORDER BY staff_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1DeptWhere($where)
    {
        $sql = "SELECT * FROM dept WHERE $where ORDER BY dept_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1StudentWhere($where)
    {
        $sql = "SELECT * FROM student WHERE $where ORDER BY student_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1CourseWhere($where)
    {
        $sql = "SELECT * FROM course WHERE $where ORDER BY course_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1AllocationWhere($where)
    {
        $sql = "SELECT * FROM allocation WHERE $where ORDER BY allocation_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1AllocationHistoryWhere($where)
    {
        $sql = "SELECT * FROM allocation_history WHERE $where ORDER BY allocation_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1CourseRegisterWhere($where)
    {
        $sql = "SELECT * FROM course_register WHERE $where ORDER BY course_register_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1TimetableWhere($where)
    {
        $sql = "SELECT * FROM timetable WHERE $where ORDER BY timetable_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1SigningWhere($where)
    {
        $sql = "SELECT * FROM signing WHERE $where ORDER BY signing_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1MessageWhere($where)
    {
        $sql = "SELECT * FROM message WHERE $where ORDER BY message_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1CredentialWhere($where)
    {
        $sql = "SELECT * FROM credential WHERE $where ORDER BY credential_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1CredentialDetailsWhere($where)
    {
        $sql = "SELECT * FROM credential_details WHERE $where ORDER BY credential_details_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1EmailTemplateWhere($where)
    {
        $sql = "SELECT * FROM email_template WHERE $where ORDER BY email_template_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1NotificationWhere($where)
    {
        $sql = "SELECT * FROM notification WHERE $where ORDER BY notification_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1NotificationUserWhere($where)
    {
        $sql = "SELECT * FROM notification_user WHERE $where ORDER BY notification_user_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1StateWhere($where)
    {
        $sql = "SELECT * FROM state WHERE $where ORDER BY state_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1CityWhere($where)
    {
        $sql = "SELECT * FROM city WHERE $where ORDER BY city_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1AddressWhere($where)
    {
        $sql = "SELECT * FROM address WHERE $where ORDER BY address_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1SettingsWhere($where)
    {
        $sql = "SELECT * FROM settings WHERE $where ORDER BY settings_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1InvoiceWhere($where)
    {
        $sql = "SELECT * FROM invoice WHERE $where ORDER BY invoice_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1GeneratedWhere($where)
    {
        $sql = "SELECT * FROM generated WHERE $where ORDER BY generated_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1PaidInvoiceWhere($where)
    {
        $sql = "SELECT * FROM paid_invoice WHERE $where ORDER BY paid_invoice_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1PortfolioWhere($where)
    {
        $sql = "SELECT * FROM portfolio WHERE $where ORDER BY portfolio_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1TestimonialWhere($where)
    {
        $sql = "SELECT * FROM testimonial WHERE $where ORDER BY testimonial_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1EducationWhere($where)
    {
        $sql = "SELECT * FROM education WHERE $where ORDER BY education_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1ExperienceWhere($where)
    {
        $sql = "SELECT * FROM experience WHERE $where ORDER BY experience_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1JobWhere($where)
    {
        $sql = "SELECT * FROM job WHERE $where ORDER BY function_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1SkillsWhere($where)
    {
        $sql = "SELECT * FROM skills WHERE $where ORDER BY skills_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1ItemWhere($where)
    {
        $sql = "SELECT * FROM item WHERE $where ORDER BY item_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1FactsWhere($where)
    {
        $sql = "SELECT * FROM facts WHERE $where ORDER BY facts_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1FormWhere($where)
    {
        $sql = "SELECT * FROM form WHERE $where ORDER BY form_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1ZoneWhere($where)
    {
        $sql = "SELECT * FROM zone WHERE $where ORDER BY zone_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

    public function get1StyleWhere($where)
    {
        $sql = "SELECT * FROM form WHERE $where ORDER BY style_id ASC";
        $this->db->cdp_query($sql);
        $this->db->cdp_execute();
        $row = $this->db->cdp_registro();

        return $row;
    }

}