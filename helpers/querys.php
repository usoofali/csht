<?php

function emailExist($email)
{
    $db = new Conexion;

    $db->cdp_query("SELECT * FROM user WHERE  email=:email");
    $db->bind(':email', $email);
    $db->cdp_execute();
    $result = $db->cdp_rowCount();

    if ($result == 1) {

        return true;
    } else {

        return false;
    }
}


function insert_address($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO address
        (
            address_id,
            street,
            zip_code,
            city_id
        )
        VALUES (
            :address_id,
            :street,
            :zip_code,
            :city_id
        )');

    $db->bind(':address_id', $data['address_id']);
    $db->bind(':street', $data['street']);
    $db->bind(':zip_code', $data['zip_code']);
    $db->bind(':city_id', $data['city_id']);
    return $db->cdp_execute();
}

function insert_allocation($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO allocation
        (
            allocation_id,
            contact,
            staff_id,
            course_id
        )
        VALUES (
            :allocation_id,
            :contact,
            :staff_id,
            :course_id
        )');

    $db->bind(':allocation_id', $data['allocation_id']);
    $db->bind(':contact', $data['contact']);
    $db->bind(':staff_id', $data['staff_id']);
    $db->bind(':course_id', $data['course_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...

function insert_allocation_history($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO allocation_history
        (
            allocation_id,
            staff_id,
            course_id,
            created_at
        )
        VALUES (
            :allocation_id,
            :staff_id,
            :course_id,
            :created_at
        )');

    $db->bind(':allocation_id', $data['allocation_id']);
    $db->bind(':staff_id', $data['staff_id']);
    $db->bind(':course_id', $data['course_id']);
    $db->bind(':created_at', $data['created_at']);
    return $db->cdp_execute();
}



function insert_branch($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO branch
        (
            branch_id,
            name,
            code,
            address,
            status,
            color
        )
        VALUES (
            :branch_id,
            :name,
            :code,
            :address,
            :status,
            :color
        )');

    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':name', $data['name']);
    $db->bind(':code', $data['code']);
    $db->bind(':address', $data['address']);
    $db->bind(':status', $data['status']);
    $db->bind(':color', $data['color']);
    return $db->cdp_execute();
}

function insert_city($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO city
        (
            city_id,
            name,
            iso,
            state_id
        )
        VALUES (
            :city_id,
            :name,
            :iso,
            :state_id
        )');

    $db->bind(':city_id', $data['city_id']);
    $db->bind(':name', $data['name']);
    $db->bind(':iso', $data['iso']);
    $db->bind(':state_id', $data['state_id']);
    return $db->cdp_execute();
}

function insert_course($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO course
        (
            course_id,
            title,
            code,
            unit,
            level,
            semester,
            dept_id
        )
        VALUES (
            :course_id,
            :title,
            :code,
            :unit,
            :level,
            :semester,
            :dept_id
        )');

    $db->bind(':course_id', $data['course_id']);
    $db->bind(':title', $data['title']);
    $db->bind(':code', $data['code']);
    $db->bind(':unit', $data['unit']);
    $db->bind(':level', $data['level']);
    $db->bind(':semester', $data['semester']);
    $db->bind(':dept_id', $data['dept_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function insert_course_register($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO course_register
        (
            course_register_id,
            ca,
            exam,
            attendance,
            branch_id,
            session_id,
            student_id,
            course_id
        )
        VALUES (
            :course_register_id,
            :ca,
            :exam,
            :attendance,
            :branch_id,
            :session_id,
            :student_id,
            :course_id
        )');

    $db->bind(':course_register_id', $data['course_register_id']);
    $db->bind(':ca', $data['ca']);
    $db->bind(':exam', $data['exam']);
    $db->bind(':attendance', $data['attendance']);
    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':session_id', $data['session_id']);
    $db->bind(':student_id', $data['student_id']);
    $db->bind(':course_id', $data['course_id']);
    return $db->cdp_execute();
}

function insert_credential($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO credential
        (
            credential_id,
            student_id,
            olevel,
            olevel2,
            dobc,
            indigine,
            primary_cert,
            other_cert
        )
        VALUES (
            :credential_id,
            :student_id,
            :olevel,
            :olevel2,
            :dobc,
            :indigine,
            :primary_cert,
            :other_cert
        )');

    $db->bind(':credential_id', $data['credential_id']);
    $db->bind(':student_id', $data['student_id']);
    $db->bind(':olevel', $data['olevel']);
    $db->bind(':olevel2', $data['olevel2']);
    $db->bind(':dobc', $data['dobc']);
    $db->bind(':indigine', $data['indigine']);
    $db->bind(':primary_cert', $data['primary_cert']);
    $db->bind(':other_cert', $data['other_cert']);
    return $db->cdp_execute();
}

function insert_credential_details($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO credential_details
        (
            credential_details_id,
            eng1,
            mth1,
            bio1,
            che1,
            phy1,
            eng2,
            mth2,
            bio2,
            che2,
            phy2,
            credential_id
        )
        VALUES (
            :credential_details_id,
            :eng1,
            :mth1,
            :bio1,
            :che1,
            :phy1,
            :eng2,
            :mth2,
            :bio2,
            :che2,
            :phy2,
            :credential_id
        )');

    $db->bind(':credential_details_id', $data['credential_details_id']);
    $db->bind(':eng1', $data['eng1']);
    $db->bind(':mth1', $data['mth1']);
    $db->bind(':bio1', $data['bio1']);
    $db->bind(':che1', $data['che1']);
    $db->bind(':phy1', $data['phy1']);
    $db->bind(':eng2', $data['eng2']);
    $db->bind(':mth2', $data['mth2']);
    $db->bind(':bio2', $data['bio2']);
    $db->bind(':che2', $data['che2']);
    $db->bind(':phy2', $data['phy2']);
    $db->bind(':credential_id', $data['credential_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function insert_dept($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO dept
        (
            dept_id,
            name,
            iso,
            staff_id
        )
        VALUES (
            :dept_id,
            :name,
            :iso,
            :staff_id
        )');

    $db->bind(':dept_id', $data['dept_id']);
    $db->bind(':name', $data['name']);
    $db->bind(':iso', $data['iso']);
    $db->bind(':staff_id', $data['staff_id']);
    return $db->cdp_execute();
}

function insert_education($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO education
        (
            education_id,
            certificate,
            from_date,
            to_date,
            city,
            state,
            institution,
            about,
            portfolio_id
        )
        VALUES (
            :education_id,
            :certificate,
            :from_date,
            :to_date,
            :city,
            :state,
            :institution,
            :about,
            :portfolio_id
        )');

    $db->bind(':education_id', $data['education_id']);
    $db->bind(':certificate', $data['certificate']);
    $db->bind(':from_date', $data['from_date']);
    $db->bind(':to_date', $data['to_date']);
    $db->bind(':city', $data['city']);
    $db->bind(':state', $data['state']);
    $db->bind(':institution', $data['institution']);
    $db->bind(':about', $data['about']);
    $db->bind(':portfolio_id', $data['portfolio_id']);
    return $db->cdp_execute();
}

function insert_email_template($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO email_template
        (
            email_template_id,
            body,
            help,
            subject,
            created_at
        )
        VALUES (
            :email_template_id,
            :body,
            :help,
            :subject,
            :created_at
        )');

    $db->bind(':email_template_id', $data['email_template_id']);
    $db->bind(':body', $data['body']);
    $db->bind(':help', $data['help']);
    $db->bind(':subject', $data['subject']);
    $db->bind(':created_at', $data['created_at']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function insert_experience($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO experience
        (
            experience_id,
            role,
            organization,
            from_date,
            to_date,
            city,
            state,
            portfolio_id
        )
        VALUES (
            :experience_id,
            :role,
            :organization,
            :from_date,
            :to_date,
            :city,
            :state,
            :portfolio_id
        )');

    $db->bind(':experience_id', $data['experience_id']);
    $db->bind(':role', $data['role']);
    $db->bind(':organization', $data['organization']);
    $db->bind(':from_date', $data['from_date']);
    $db->bind(':to_date', $data['to_date']);
    $db->bind(':city', $data['city']);
    $db->bind(':state', $data['state']);
    $db->bind(':portfolio_id', $data['portfolio_id']);
    return $db->cdp_execute();
}

function insert_facts($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO facts
        (
            facts_id,
            courses,
            lectures,
            students,
            staff_id
        )
        VALUES (
            :facts_id,
            :courses,
            :lectures,
            :students,
            :staff_id
        )');

    $db->bind(':facts_id', $data['facts_id']);
    $db->bind(':courses', $data['courses']);
    $db->bind(':lectures', $data['lectures']);
    $db->bind(':students', $data['students']);
    $db->bind(':staff_id', $data['staff_id']);
    return $db->cdp_execute();
}

function insert_form($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO form
        (
            form_id,
            fname,
            lname,
            phone,
            address,
            city,
            state,
            choice,
            token
        )
        VALUES (
            :form_id,
            :fname,
            :lname,
            :phone,
            :address,
            :city,
            :state,
            :choice,
            :token
        )');

    $db->bind(':form_id', $data['form_id']);
    $db->bind(':fname', $data['fname']);
    $db->bind(':lname', $data['lname']);
    $db->bind(':phone', $data['phone']);
    $db->bind(':address', $data['address']);
    $db->bind(':city', $data['city']);
    $db->bind(':state', $data['state']);
    $db->bind(':choice', $data['choice']);
    $db->bind(':token', $data['token']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function insert_generated($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO generated
        (
            generated_id,
            title,
            payer,
            amount_payable,
            total_paid,
            status,
            created_at,
            branch_id,
            student_id,
            dept_id,
            invoice_id
        )
        VALUES (
            :generated_id,
            :title,
            :payer,
            :amount_payable,
            :total_paid,
            :status,
            :created_at,
            :branch_id,
            :student_id,
            :dept_id,
            :invoice_id
        )');

    $db->bind(':generated_id', $data['generated_id']);
    $db->bind(':title', $data['title']);
    $db->bind(':payer', $data['payer']);
    $db->bind(':amount_payable', $data['amount_payable']);
    $db->bind(':total_paid', $data['total_paid']);
    $db->bind(':status', $data['status']);
    $db->bind(':created_at', $data['created_at']);
    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':student_id', $data['student_id']);
    $db->bind(':dept_id', $data['dept_id']);
    $db->bind(':invoice_id', $data['invoice_id']);
    return $db->cdp_execute();
}

function insert_invoice($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO invoice
        (
            invoice_id,
            title,
            payer,
            amount,
            branch_id,
            dept_id
        )
        VALUES (
            :invoice_id,
            :title,
            :payer,
            :amount,
            :branch_id,
            :dept_id
        )');

    $db->bind(':invoice_id', $data['invoice_id']);
    $db->bind(':title', $data['title']);
    $db->bind(':payer', $data['payer']);
    $db->bind(':amount', $data['amount']);
    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':dept_id', $data['dept_id']);
    return $db->cdp_execute();
}

function insert_item($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO item
        (
            item_id,
            skill,
            percentage,
            skills_id
        )
        VALUES (
            :item_id,
            :skill,
            :percentage,
            :skills_id
        )');

    $db->bind(':item_id', $data['item_id']);
    $db->bind(':skill', $data['skill']);
    $db->bind(':percentage', $data['percentage']);
    $db->bind(':skills_id', $data['skills_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function insert_job($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO job
        (
            function_id,
            description,
            experience_id
        )
        VALUES (
            :function_id,
            :description,
            :experience_id
        )');

    $db->bind(':function_id', $data['function_id']);
    $db->bind(':description', $data['description']);
    $db->bind(':experience_id', $data['experience_id']);
    return $db->cdp_execute();
}

function insert_message($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO message
        (
            message_id,
            sender,
            recipient,
            body,
            subject,
            created_at
        )
        VALUES (
            :message_id,
            :sender,
            :recipient,
            :body,
            :subject,
            :created_at
        )');

    $db->bind(':message_id', $data['message_id']);
    $db->bind(':sender', $data['sender']);
    $db->bind(':recipient', $data['recipient']);
    $db->bind(':body', $data['body']);
    $db->bind(':subject', $data['subject']);
    $db->bind(':created_at', $data['created_at']);
    return $db->cdp_execute();
}

function insert_notification($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO notification
        (
            user_id,
            acted_id,
            action_type,
            description
        )
        VALUES (
            :user_id,
            :acted_id,
            :action_type,
            :description
        )');

    $db->bind(':user_id', $data['user_id']);
    $db->bind(':description', $data['description']);
    $db->bind(':action_type', $data['action_type']);
    $db->bind(':acted_id', $data['acted_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function insert_notification_user($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO notification_user
        (
            notification_id,
            branch_id,
            user_id
        )
        VALUES (
            :notification_id,
            :branch_id,
            :user_id
        )');

    $db->bind(':notification_id', $data['notification_id']);
    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':user_id', $data['user_id']);
    return $db->cdp_execute();
}

function insert_paid_invoice($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO paid_invoice
        (
            paid_invoice_id,
            amount_paid,
            branch_id,
            confirmation,
            created_at,
            generated_id
        )
        VALUES (
            :paid_invoice_id,
            :amount_paid,
            :branch_id,
            :confirmation,
            :created_at,
            :generated_id
        )');

    $db->bind(':paid_invoice_id', $data['paid_invoice_id']);
    $db->bind(':amount_paid', $data['amount_paid']);
    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':confirmation', $data['confirmation']);
    $db->bind(':created_at', $data['created_at']);
    $db->bind(':generated_id', $data['generated_id']);
    return $db->cdp_execute();
}

function insert_portfolio($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO portfolio
        (
            portfolio_id,
            iam,
            about_me,
            dobc,
            freelance,
            degree,
            more,
            objectives,
            facts,
            testimonials,
            contact,
            branch_id,
            staff_id
        )
        VALUES (
            :portfolio_id,
            :iam,
            :about_me,
            :dobc,
            :freelance,
            :degree,
            :more,
            :objectives,
            :facts,
            :testimonials,
            :contact,
            :branch_id,
            :staff_id
        )');

    $db->bind(':portfolio_id', $data['portfolio_id']);
    $db->bind(':iam', $data['iam']);
    $db->bind(':about_me', $data['about_me']);
    $db->bind(':dobc', $data['dobc']);
    $db->bind(':freelance', $data['freelance']);
    $db->bind(':degree', $data['degree']);
    $db->bind(':more', $data['more']);
    $db->bind(':objectives', $data['objectives']);
    $db->bind(':facts', $data['facts']);
    $db->bind(':testimonials', $data['testimonials']);
    $db->bind(':contact', $data['contact']);
    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':staff_id', $data['staff_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function insert_session($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO session
        (
            session_id,
            year,
            current
        )
        VALUES (
            :session_id,
            :year,
            :current
        )');

    $db->bind(':session_id', $data['session_id']);
    $db->bind(':year', $data['year']);
    $db->bind(':current', $data['current']);
    return $db->cdp_execute();
}

function insert_settings($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO settings
        (
            settings_id,
            site_name,
            c_nit,
            c_phone,
            cell_phone,
            c_address,
            c_country,
            c_city,
            c_postal,
            site_email,
            mailer,
            smtp_names,
            email_address,
            smtp_host,
            smtp_user,
            smtp_password,
            smtp_port,
            smtp_secure,
            site_url,
            thumb_web,
            thumb_hweb,
            thumb_w,
            thumb_h,
            logo,
            logo_web,
            favicon,
            backup,
            version,
            prefix,
            track_digit,
            currency,
            for_currency,
            for_symbol,
            for_decimal,
            cformat,
            dec_point,
            thousands_sep,
            timezone,
            language,
            code_number,
            digit_random,
            longitude,
            latitude,
            info_mail,
            support_mail,
            booking_mail,
            customerservice_mail,
            operations_mail
        )
        VALUES (
            :settings_id,
            :site_name,
            :c_nit,
            :c_phone,
            :cell_phone,
            :c_address,
            :c_country,
            :c_city,
            :c_postal,
            :site_email,
            :mailer,
            :smtp_names,
            :email_address,
            :smtp_host,
            :smtp_user,
            :smtp_password,
            :smtp_port,
            :smtp_secure,
            :site_url,
            :thumb_web,
            :thumb_hweb,
            :thumb_w,
            :thumb_h,
            :logo,
            :logo_web,
            :favicon,
            :backup,
            :version,
            :prefix,
            :track_digit,
            :currency,
            :for_currency,
            :for_symbol,
            :for_decimal,
            :cformat,
            :dec_point,
            :thousands_sep,
            :timezone,
            :language,
            :code_number,
            :digit_random,
            :longitude,
            :latitude,
            :info_mail,
            :support_mail,
            :booking_mail,
            :customerservice_mail,
            :operations_mail
        )');

    $db->bind(':settings_id', $data['settings_id']);
    $db->bind(':site_name', $data['site_name']);
    $db->bind(':c_nit', $data['c_nit']);
    $db->bind(':c_phone', $data['c_phone']);
    $db->bind(':cell_phone', $data['cell_phone']);
    $db->bind(':c_address', $data['c_address']);
    $db->bind(':c_country', $data['c_country']);
    $db->bind(':c_city', $data['c_city']);
    $db->bind(':c_postal', $data['c_postal']);
    $db->bind(':site_email', $data['site_email']);
    $db->bind(':mailer', $data['mailer']);
    $db->bind(':smtp_names', $data['smtp_names']);
    $db->bind(':email_address', $data['email_address']);
    $db->bind(':smtp_host', $data['smtp_host']);
    $db->bind(':smtp_user', $data['smtp_user']);
    $db->bind(':smtp_password', $data['smtp_password']);
    $db->bind(':smtp_port', $data['smtp_port']);
    $db->bind(':smtp_secure', $data['smtp_secure']);
    $db->bind(':site_url', $data['site_url']);
    $db->bind(':thumb_web', $data['thumb_web']);
    $db->bind(':thumb_hweb', $data['thumb_hweb']);
    $db->bind(':thumb_w', $data['thumb_w']);
    $db->bind(':thumb_h', $data['thumb_h']);
    $db->bind(':logo', $data['logo']);
    $db->bind(':logo_web', $data['logo_web']);
    $db->bind(':favicon', $data['favicon']);
    $db->bind(':backup', $data['backup']);
    $db->bind(':version', $data['version']);
    $db->bind(':prefix', $data['prefix']);
    $db->bind(':track_digit', $data['track_digit']);
    $db->bind(':currency', $data['currency']);
    $db->bind(':for_currency', $data['for_currency']);
    $db->bind(':for_symbol', $data['for_symbol']);
    $db->bind(':for_decimal', $data['for_decimal']);
    $db->bind(':cformat', $data['cformat']);
    $db->bind(':dec_point', $data['dec_point']);
    $db->bind(':thousands_sep', $data['thousands_sep']);
    $db->bind(':timezone', $data['timezone']);
    $db->bind(':language', $data['language']);
    $db->bind(':code_number', $data['code_number']);
    $db->bind(':digit_random', $data['digit_random']);
    $db->bind(':longitude', $data['longitude']);
    $db->bind(':latitude', $data['latitude']);
    $db->bind(':info_mail', $data['info_mail']);
    $db->bind(':support_mail', $data['support_mail']);
    $db->bind(':booking_mail', $data['booking_mail']);
    $db->bind(':customerservice_mail', $data['customerservice_mail']);
    $db->bind(':operations_mail', $data['operations_mail']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function insert_attendance($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO attendance
        (
            attendance_id,
            staff_id,
            course_id,
            session_id,
            created_at
        )
        VALUES (
            :attendance_id,
            :staff_id,
            :course_id,
            :session_id,
            :created_at
        )');

    $db->bind(':attendance_id', $data['attendance_id']);
    $db->bind(':staff_id', $data['staff_id']);
    $db->bind(':course_id', $data['course_id']);
    $db->bind(':session_id', $data['session_id']);
    $db->bind(':created_at', $data['created_at']);
    return $db->cdp_execute();
}

function insert_attendee($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO attendance
        (
            attendee_id,
            attendance_id,
            student_id
        )
        VALUES (
            :attendance_id,
            :attendee_id,
            :student_id
        )');

    $db->bind(':attendee_id', $data['attendee_id']);
    $db->bind(':attendance_id', $data['attendance_id']);
    $db->bind(':student_id', $data['student_id']);
    return $db->cdp_execute();
}


function insert_skills($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO skills
        (
            skills_id,
            about,
            portfolio_id
        )
        VALUES (
            :skills_id,
            :about,
            :portfolio_id
        )');

    $db->bind(':skills_id', $data['skills_id']);
    $db->bind(':about', $data['about']);
    $db->bind(':portfolio_id', $data['portfolio_id']);
    return $db->cdp_execute();
}

function insert_staff($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO staff
        (
            acct_no,
            acct_name,
            acct_bank,
            user_id
        )
        VALUES (
            :acct_no,
            :acct_name,
            :acct_bank,
            :user_id
        )');

    $db->bind(':acct_no', $data['acct_no']);
    $db->bind(':acct_name', $data['acct_name']);
    $db->bind(':acct_bank', $data['acct_bank']);
    $db->bind(':user_id', $data['user_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function insert_state($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO state
        (
            state_id,
            name,
            iso
        )
        VALUES (
            :state_id,
            :name,
            :iso
        )');

    $db->bind(':state_id', $data['state_id']);
    $db->bind(':name', $data['name']);
    $db->bind(':iso', $data['iso']);
    return $db->cdp_execute();
}

function insert_student($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO student
        (
            student_id,
            adm,
            role,
            dept_id,
            session_id,
            user_id
        )
        VALUES (
            :student_id,
            :adm,
            :role,
            :dept_id,
            :session_id,
            :user_id
        )');

    $db->bind(':student_id', $data['student_id']);
    $db->bind(':adm', $data['adm']);
    $db->bind(':role', $data['role']);
    $db->bind(':dept_id', $data['dept_id']);
    $db->bind(':session_id', $data['session_id']);
    $db->bind(':user_id', $data['user_id']);
    return $db->cdp_execute();
}

function insert_style($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO style
        (
            id,
            status,
            detail,
            color,
            type
        )
        VALUES (
            :id,
            :status,
            :detail,
            :color,
            :type
        )');

    $db->bind(':id', $data['id']);
    $db->bind(':status', $data['status']);
    $db->bind(':detail', $data['detail']);
    $db->bind(':color', $data['color']);
    $db->bind(':type', $data['type']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function insert_testimonial($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO testimonial
        (
            testimonial_id,
            testimony,
            user_id,
            portfolio_id
        )
        VALUES (
            :testimonial_id,
            :testimony,
            :user_id,
            :portfolio_id
        )');

    $db->bind(':testimonial_id', $data['testimonial_id']);
    $db->bind(':testimony', $data['testimony']);
    $db->bind(':user_id', $data['user_id']);
    $db->bind(':portfolio_id', $data['portfolio_id']);
    return $db->cdp_execute();
}

function insert_timetable($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO timetable
        (
            timetable_id,
            branch_id,
            dept_id,
            semester,
            period1,
            period2,
            period3,
            period4,
            period5
        )
        VALUES (
            :timetable_id,
            :branch_id,
            :dept_id,
            :semester,
            :period1,
            :period2,
            :period3,
            :period4,
            :period5
        )');

    $db->bind(':timetable_id', $data['timetable_id']);
    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':dept_id', $data['dept_id']);
    $db->bind(':semester', $data['semester']);
    $db->bind(':period1', $data['period1']);
    $db->bind(':period2', $data['period2']);
    $db->bind(':period3', $data['period3']);
    $db->bind(':period4', $data['period4']);
    $db->bind(':period5', $data['period5']);
    return $db->cdp_execute();
}

function insert_user($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO user
        (
            email,
            password,
            fname,
            lname,
            username,
            userlevel,
            avatar,
            notes,
            phone,
            gender,
            newsletter,
            active,
            branch_id,
            address,
            theme
        )
        VALUES (
            :email,
            :password,
            :fname,
            :lname,
            :username,
            :userlevel,
            :avatar,
            :notes,
            :phone,
            :gender,
            :newsletter,
            :active,
            :branch_id,
            :address,
            :theme
        )');

    $db->bind(':email', $data['email']);
    $db->bind(':password', $data['password']);
    $db->bind(':fname', $data['fname']);
    $db->bind(':lname', $data['lname']);
    $db->bind(':username', $data['username']);
    $db->bind(':userlevel', $data['userlevel']);
    $db->bind(':avatar', $data['avatar']);
    $db->bind(':notes', $data['notes']);
    $db->bind(':phone', $data['phone']);
    $db->bind(':gender', $data['gender']);
    $db->bind(':newsletter', $data['newsletter']);
    $db->bind(':active', $data['active']);
    $db->bind(':branch_id', $data['branch']);
    $db->bind(':address', $data['address']);
    $db->bind(':theme', "style.css");
    return $db->cdp_execute();
}

function insert_user_action_history($datos)
{
    $db = new Conexion;
    $db->cdp_query("
                INSERT INTO user_action_history 
                (
                    user_id,
                    action_type,
                    acted_id,
                    action,
                    date_history                   
                    )
                VALUES
                    (
                    :user_id,
                    :action_type,
                    :acted_id,
                    :action,
                    :date_history
                    )
            ");

    $db->bind(':acted_id', $datos["acted_id"]);
    $db->bind(':action_type', $datos["action_type"]);
    $db->bind(':user_id', $datos["user_id"]);
    $db->bind(':action', $datos["action"]);
    $db->bind(':date_history', $datos["date_history"]);

    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function insert_zone($data)
{
    $db = new Conexion;
    $db->cdp_query('INSERT INTO zone
        (
            zone_id,
            country_code,
            zone_name
        )
        VALUES (
            :zone_id,
            :country_code,
            :zone_name
        )');

    $db->bind(':zone_id', $data['zone_id']);
    $db->bind(':country_code', $data['country_code']);
    $db->bind(':zone_name', $data['zone_name']);
    return $db->cdp_execute();
}

function update_address($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE address SET
            street = :street,
            zip_code = :zip_code,
            city_id = :city_id
        WHERE
            address_id = :address_id
        ');

    $db->bind(':street', $data['street']);
    $db->bind(':zip_code', $data['zip_code']);
    $db->bind(':city_id', $data['city_id']);
    $db->bind(':address_id', $data['address_id']);
    return $db->cdp_execute();
}

function update_allocation($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE allocation SET
            contact = :contact,
            staff_id = :staff_id,
            course_id = :course_id
        WHERE
            allocation_id = :allocation_id
        ');

    $db->bind(':contact', $data['contact']);
    $db->bind(':staff_id', $data['staff_id']);
    $db->bind(':course_id', $data['course_id']);
    $db->bind(':allocation_id', $data['allocation_id']);
    return $db->cdp_execute();
}

function update_branch($data)
{

    $db = new Conexion;
    $db->cdp_query('UPDATE branch SET
            name = :name,
            code = :code,
            address = :address,
            status = :status,
            color = :color
        WHERE
            branch_id = :branch_id
        ');

    $db->bind(':name', $data['name']);
    $db->bind(':code', $data['code']);
    $db->bind(':address', $data['address']);
    $db->bind(':status', $data['status']);
    $db->bind(':color', $data['color']);
    $db->bind(':branch_id', $data['branch_id']);
    return $db->cdp_execute();
}

function update_city($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE city SET
            name = :name,
            iso = :iso,
            state_id = :state_id
        WHERE
            city_id = :city_id
        ');

    $db->bind(':name', $data['name']);
    $db->bind(':iso', $data['iso']);
    $db->bind(':state_id', $data['state_id']);
    $db->bind(':city_id', $data['city_id']);
    return $db->cdp_execute();
}

function update_course($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE course SET
            title = :title,
            code = :code,
            unit = :unit,
            level = :level,
            semester = :semester,
            dept_id = :dept_id
        WHERE
            course_id = :course_id
        ');

    $db->bind(':title', $data['title']);
    $db->bind(':code', $data['code']);
    $db->bind(':unit', $data['unit']);
    $db->bind(':level', $data['level']);
    $db->bind(':semester', $data['semester']);
    $db->bind(':dept_id', $data['dept_id']);
    $db->bind(':course_id', $data['course_id']);
    return $db->cdp_execute();
}

// Function for the last table follows the same pattern...
function update_course_register($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE course_register SET
            ca = :ca,
            exam = :exam,
            attendance = :attendance,
            branch_id = :branch_id,
            session_id = :session_id,
            student_id = :student_id,
            course_id = :course_id
        WHERE
            course_register_id = :course_register_id
        ');

    $db->bind(':ca', $data['ca']);
    $db->bind(':exam', $data['exam']);
    $db->bind(':attendance', $data['attendance']);
    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':session_id', $data['session_id']);
    $db->bind(':student_id', $data['student_id']);
    $db->bind(':course_id', $data['course_id']);
    $db->bind(':course_register_id', $data['course_register_id']);
    return $db->cdp_execute();
}

function update_credential($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE credential SET
            student_id = :student_id,
            olevel = :olevel,
            olevel2 = :olevel2,
            dobc = :dobc,
            indigine = :indigine,
            primary_cert = :primary_cert,
            other_cert = :other_cert
        WHERE
            credential_id = :credential_id
        ');

    $db->bind(':student_id', $data['student_id']);
    $db->bind(':olevel', $data['olevel']);
    $db->bind(':olevel2', $data['olevel2']);
    $db->bind(':dobc', $data['dobc']);
    $db->bind(':indigine', $data['indigine']);
    $db->bind(':primary_cert', $data['primary_cert']);
    $db->bind(':other_cert', $data['other_cert']);
    $db->bind(':credential_id', $data['credential_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function update_credential_details($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE credential_details SET
            eng1 = :eng1,
            mth1 = :mth1,
            bio1 = :bio1,
            che1 = :che1,
            phy1 = :phy1,
            eng2 = :eng2,
            mth2 = :mth2,
            bio2 = :bio2,
            che2 = :che2,
            phy2 = :phy2
        WHERE
            credential_details_id = :credential_details_id
        ');

    $db->bind(':eng1', $data['eng1']);
    $db->bind(':mth1', $data['mth1']);
    $db->bind(':bio1', $data['bio1']);
    $db->bind(':che1', $data['che1']);
    $db->bind(':phy1', $data['phy1']);
    $db->bind(':eng2', $data['eng2']);
    $db->bind(':mth2', $data['mth2']);
    $db->bind(':bio2', $data['bio2']);
    $db->bind(':che2', $data['che2']);
    $db->bind(':phy2', $data['phy2']);
    $db->bind(':credential_details_id', $data['credential_details_id']);
    return $db->cdp_execute();
}

function update_dept($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE dept SET
            name = :name,
            iso = :iso,
            staff_id = :staff_id
        WHERE
            dept_id = :dept_id
        ');

    $db->bind(':name', $data['name']);
    $db->bind(':iso', $data['iso']);
    $db->bind(':staff_id', $data['staff_id']);
    $db->bind(':dept_id', $data['dept_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function update_education($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE education SET
            certificate = :certificate,
            from_date = :from_date,
            to_date = :to_date,
            city = :city,
            state = :state,
            institution = :institution,
            about = :about,
            portfolio_id = :portfolio_id
        WHERE
            education_id = :education_id
        ');

    $db->bind(':certificate', $data['certificate']);
    $db->bind(':from_date', $data['from_date']);
    $db->bind(':to_date', $data['to_date']);
    $db->bind(':city', $data['city']);
    $db->bind(':state', $data['state']);
    $db->bind(':institution', $data['institution']);
    $db->bind(':about', $data['about']);
    $db->bind(':portfolio_id', $data['portfolio_id']);
    $db->bind(':education_id', $data['education_id']);
    return $db->cdp_execute();
}

function update_email_template($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE email_template SET
            body = :body,
            help = :help,
            subject = :subject
        WHERE
            email_template_id = :email_template_id
        ');

    $db->bind(':body', $data['body']);
    $db->bind(':help', $data['help']);
    $db->bind(':subject', $data['subject']);
    $db->bind(':email_template_id', $data['email_template_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function update_experience($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE experience SET
            role = :role,
            organization = :organization,
            from_date = :from_date,
            to_date = :to_date,
            city = :city,
            state = :state,
            portfolio_id = :portfolio_id
        WHERE
            experience_id = :experience_id
        ');

    $db->bind(':role', $data['role']);
    $db->bind(':organization', $data['organization']);
    $db->bind(':from_date', $data['from_date']);
    $db->bind(':to_date', $data['to_date']);
    $db->bind(':city', $data['city']);
    $db->bind(':state', $data['state']);
    $db->bind(':portfolio_id', $data['portfolio_id']);
    $db->bind(':experience_id', $data['experience_id']);
    return $db->cdp_execute();
}

function update_facts($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE facts SET
            courses = :courses,
            lectures = :lectures,
            students = :students,
            staff_id = :staff_id
        WHERE
            facts_id = :facts_id
        ');

    $db->bind(':courses', $data['courses']);
    $db->bind(':lectures', $data['lectures']);
    $db->bind(':students', $data['students']);
    $db->bind(':staff_id', $data['staff_id']);
    $db->bind(':facts_id', $data['facts_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function update_form($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE form SET
            fname = :fname,
            lname = :lname,
            phone = :phone,
            address = :address,
            city = :city,
            state = :state,
            choice = :choice,
            token = :token
        WHERE
            form_id = :form_id
        ');

    $db->bind(':fname', $data['fname']);
    $db->bind(':lname', $data['lname']);
    $db->bind(':phone', $data['phone']);
    $db->bind(':address', $data['address']);
    $db->bind(':city', $data['city']);
    $db->bind(':state', $data['state']);
    $db->bind(':choice', $data['choice']);
    $db->bind(':token', $data['token']);
    $db->bind(':form_id', $data['form_id']);
    return $db->cdp_execute();
}

function update_generated($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE generated SET
            title = :title,
            payer = :payer,
            amount_payable = :amount_payable,
            total_paid = :total_paid,
            status = :status,
            branch_id = :branch_id,
            student_id = :student_id,
            dept_id = :dept_id,
            invoice_id = :invoice_id
        WHERE
            generated_id = :generated_id
        ');

    $db->bind(':title', $data['title']);
    $db->bind(':payer', $data['payer']);
    $db->bind(':amount_payable', $data['amount_payable']);
    $db->bind(':total_paid', $data['total_paid']);
    $db->bind(':status', $data['status']);
    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':student_id', $data['student_id']);
    $db->bind(':dept_id', $data['dept_id']);
    $db->bind(':invoice_id', $data['invoice_id']);
    $db->bind(':generated_id', $data['generated_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function update_invoice($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE invoice SET
            title = :title,
            payer = :payer,
            amount = :amount,
            branch_id = :branch_id,
            dept_id = :dept_id
        WHERE
            invoice_id = :invoice_id
        ');

    $db->bind(':title', $data['title']);
    $db->bind(':payer', $data['payer']);
    $db->bind(':amount', $data['amount']);
    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':dept_id', $data['dept_id']);
    $db->bind(':invoice_id', $data['invoice_id']);
    return $db->cdp_execute();
}

function update_item($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE item SET
            skill = :skill,
            percentage = :percentage,
            skills_id = :skills_id
        WHERE
            item_id = :item_id
        ');

    $db->bind(':skill', $data['skill']);
    $db->bind(':percentage', $data['percentage']);
    $db->bind(':skills_id', $data['skills_id']);
    $db->bind(':item_id', $data['item_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function update_job($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE job SET
            description = :description,
            experience_id = :experience_id
        WHERE
            function_id = :function_id
        ');

    $db->bind(':description', $data['description']);
    $db->bind(':experience_id', $data['experience_id']);
    $db->bind(':function_id', $data['function_id']);
    return $db->cdp_execute();
}

function update_message($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE message SET
            sender = :sender,
            recipient = :recipient,
            body = :body,
            subject = :subject
        WHERE
            message_id = :message_id
        ');

    $db->bind(':sender', $data['sender']);
    $db->bind(':recipient', $data['recipient']);
    $db->bind(':body', $data['body']);
    $db->bind(':subject', $data['subject']);
    $db->bind(':message_id', $data['message_id']);
    return $db->cdp_execute();
}

function update_message_status($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE message SET
            message_status = 1
        WHERE
            message_id =:message_id
        ');

    $db->bind(':message_id', $data['message_id']);
    return $db->cdp_execute();
}

function update_message_read($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE message SET
            message_read = 1
        WHERE
            message_id =:message_id
        ');

    $db->bind(':message_id', $data['message_id']);
    return $db->cdp_execute();
}

function update_notification($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE notification SET
            description = :description
        WHERE
            notification_id = :notification_id
        ');

    $db->bind(':description', $data['description']);
    $db->bind(':notification_id', $data['notification_id']);
    return $db->cdp_execute();
}

function update_notification_user($data)
{
    $db = new Conexion;

    $db->cdp_query("UPDATE notification_user SET                
    notification_status ='1'                    
    WHERE
    notification_id=:notification_id 
    and user_id = :user_id  
    ");

    $db->bind(':user_id', $data['user_id']);
    $db->bind(':notification_id', $data['notification_id']);
    
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function update_paid_invoice($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE paid_invoice SET
            amount_paid = :amount_paid,
            branch_id = :branch_id,
            confirmation = :confirmation,
            generated_id = :generated_id
        WHERE
            paid_invoice_id = :paid_invoice_id
        ');

    $db->bind(':amount_paid', $data['amount_paid']);
    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':confirmation', $data['confirmation']);
    $db->bind(':generated_id', $data['generated_id']);
    $db->bind(':paid_invoice_id', $data['paid_invoice_id']);
    return $db->cdp_execute();
}

function update_portfolio($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE portfolio SET
            iam = :iam,
            about_me = :about_me,
            dobc = :dobc,
            freelance = :freelance,
            degree = :degree,
            more = :more,
            objectives = :objectives,
            facts = :facts,
            testimonials = :testimonials,
            contact = :contact,
            branch_id = :branch_id,
            staff_id = :staff_id
        WHERE
            portfolio_id = :portfolio_id
        ');

    $db->bind(':iam', $data['iam']);
    $db->bind(':about_me', $data['about_me']);
    $db->bind(':dobc', $data['dobc']);
    $db->bind(':freelance', $data['freelance']);
    $db->bind(':degree', $data['degree']);
    $db->bind(':more', $data['more']);
    $db->bind(':objectives', $data['objectives']);
    $db->bind(':facts', $data['facts']);
    $db->bind(':testimonials', $data['testimonials']);
    $db->bind(':contact', $data['contact']);
    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':staff_id', $data['staff_id']);
    $db->bind(':portfolio_id', $data['portfolio_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function update_session($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE session SET
            year = :year,
            current = :current
        WHERE
            session_id = :session_id
        ');

    $db->bind(':year', $data['year']);
    $db->bind(':current', $data['current']);
    $db->bind(':session_id', $data['session_id']);
    return $db->cdp_execute();
}

function update_settings($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE settings SET
            site_name = :site_name,
            c_nit = :c_nit,
            c_phone = :c_phone,
            cell_phone = :cell_phone,
            c_address = :c_address,
            c_country = :c_country,
            c_city = :c_city,
            c_postal = :c_postal,
            site_email = :site_email,
            mailer = :mailer,
            smtp_names = :smtp_names,
            email_address = :email_address,
            smtp_host = :smtp_host,
            smtp_user = :smtp_user,
            smtp_password = :smtp_password,
            smtp_port = :smtp_port,
            smtp_secure = :smtp_secure,
            site_url = :site_url,
            thumb_web = :thumb_web,
            thumb_hweb = :thumb_hweb,
            thumb_w = :thumb_w,
            thumb_h = :thumb_h,
            logo = :logo,
            logo_web = :logo_web,
            favicon = :favicon,
            backup = :backup,
            version = :version,
            prefix = :prefix,
            track_digit = :track_digit,
            currency = :currency,
            for_currency = :for_currency,
            for_symbol = :for_symbol,
            for_decimal = :for_decimal,
            cformat = :cformat,
            dec_point = :dec_point,
            thousands_sep = :thousands_sep,
            timezone = :timezone,
            language = :language,
            code_number = :code_number,
            digit_random = :digit_random,
            longitude = :longitude,
            latitude = :latitude,
            info_mail = :info_mail,
            support_mail = :support_mail,
            booking_mail = :booking_mail,
            customerservice_mail = :customerservice_mail,
            operations_mail = :operations_mail
        WHERE
            settings_id = :settings_id
        ');

    $db->bind(':site_name', $data['site_name']);
    $db->bind(':c_nit', $data['c_nit']);
    $db->bind(':c_phone', $data['c_phone']);
    $db->bind(':cell_phone', $data['cell_phone']);
    $db->bind(':c_address', $data['c_address']);
    $db->bind(':c_country', $data['c_country']);
    $db->bind(':c_city', $data['c_city']);
    $db->bind(':c_postal', $data['c_postal']);
    $db->bind(':site_email', $data['site_email']);
    $db->bind(':mailer', $data['mailer']);
    $db->bind(':smtp_names', $data['smtp_names']);
    $db->bind(':email_address', $data['email_address']);
    $db->bind(':smtp_host', $data['smtp_host']);
    $db->bind(':smtp_user', $data['smtp_user']);
    $db->bind(':smtp_password', $data['smtp_password']);
    $db->bind(':smtp_port', $data['smtp_port']);
    $db->bind(':smtp_secure', $data['smtp_secure']);
    $db->bind(':site_url', $data['site_url']);
    $db->bind(':thumb_web', $data['thumb_web']);
    $db->bind(':thumb_hweb', $data['thumb_hweb']);
    $db->bind(':thumb_w', $data['thumb_w']);
    $db->bind(':thumb_h', $data['thumb_h']);
    $db->bind(':logo', $data['logo']);
    $db->bind(':logo_web', $data['logo_web']);
    $db->bind(':favicon', $data['favicon']);
    $db->bind(':backup', $data['backup']);
    $db->bind(':version', $data['version']);
    $db->bind(':prefix', $data['prefix']);
    $db->bind(':track_digit', $data['track_digit']);
    $db->bind(':currency', $data['currency']);
    $db->bind(':for_currency', $data['for_currency']);
    $db->bind(':for_symbol', $data['for_symbol']);
    $db->bind(':for_decimal', $data['for_decimal']);
    $db->bind(':cformat', $data['cformat']);
    $db->bind(':dec_point', $data['dec_point']);
    $db->bind(':thousands_sep', $data['thousands_sep']);
    $db->bind(':timezone', $data['timezone']);
    $db->bind(':language', $data['language']);
    $db->bind(':code_number', $data['code_number']);
    $db->bind(':digit_random', $data['digit_random']);
    $db->bind(':longitude', $data['longitude']);
    $db->bind(':latitude', $data['latitude']);
    $db->bind(':info_mail', $data['info_mail']);
    $db->bind(':support_mail', $data['support_mail']);
    $db->bind(':booking_mail', $data['booking_mail']);
    $db->bind(':customerservice_mail', $data['customerservice_mail']);
    $db->bind(':operations_mail', $data['operations_mail']);
    $db->bind(':settings_id', $data['settings_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function update_signing($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE signing SET
            staff_id = :staff_id,
            course_id = :course_id,
            created_at = :created_at
        WHERE
            signing_id = :signing_id
        ');

    $db->bind(':staff_id', $data['staff_id']);
    $db->bind(':course_id', $data['course_id']);
    $db->bind(':created_at', $data['created_at']);
    $db->bind(':signing_id', $data['signing_id']);
    return $db->cdp_execute();
}

function update_skills($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE skills SET
            about = :about,
            portfolio_id = :portfolio_id
        WHERE
            skills_id = :skills_id
        ');

    $db->bind(':about', $data['about']);
    $db->bind(':portfolio_id', $data['portfolio_id']);
    $db->bind(':skills_id', $data['skills_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function update_staff($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE staff SET
            acct_no = :acct_no,
            acct_name = :acct_name,
            acct_bank = :acct_bank,
            user_id = :user_id
        WHERE
            staff_id = :staff_id
        ');

    $db->bind(':acct_no', $data['acct_no']);
    $db->bind(':acct_name', $data['acct_name']);
    $db->bind(':acct_bank', $data['acct_bank']);
    $db->bind(':user_id', $data['user_id']);
    $db->bind(':staff_id', $data['staff_id']);
    return $db->cdp_execute();
}

function update_state($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE state SET
            name = :name,
            iso = :iso
        WHERE
            state_id = :state_id
        ');

    $db->bind(':name', $data['name']);
    $db->bind(':iso', $data['iso']);
    $db->bind(':state_id', $data['state_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function update_student($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE student SET
            adm = :adm,
            role = :role,
            dept_id = :dept_id,
            session_id = :session_id,
            user_id = :user_id
        WHERE
            student_id = :student_id
        ');

    $db->bind(':adm', $data['adm']);
    $db->bind(':role', $data['role']);
    $db->bind(':dept_id', $data['dept_id']);
    $db->bind(':session_id', $data['session_id']);
    $db->bind(':user_id', $data['user_id']);
    $db->bind(':student_id', $data['student_id']);
    return $db->cdp_execute();
}

function update_style($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE style SET
            mod_style = :mod_style,
            detail = :detail,
            color = :color,
            type = :type
        WHERE
            id = :id
        ');

    $db->bind(':mod_style', $data['mod_style']);
    $db->bind(':detail', $data['detail']);
    $db->bind(':color', $data['color']);
    $db->bind(':type', $data['type']);
    $db->bind(':id', $data['id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function update_testimonial($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE testimonial SET
            testimony = :testimony,
            user_id = :user_id,
            portfolio_id = :portfolio_id
        WHERE
            testimonial_id = :testimonial_id
        ');

    $db->bind(':testimony', $data['testimony']);
    $db->bind(':user_id', $data['user_id']);
    $db->bind(':portfolio_id', $data['portfolio_id']);
    $db->bind(':testimonial_id', $data['testimonial_id']);
    return $db->cdp_execute();
}

function update_timetable($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE timetable SET
            branch_id = :branch_id,
            dept_id = :dept_id,
            semester = :semester,
            period1 = :period1,
            period2 = :period2,
            period3 = :period3,
            period4 = :period4,
            period5 = :period5
        WHERE
            timetable_id = :timetable_id
        ');

    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':dept_id', $data['dept_id']);
    $db->bind(':semester', $data['semester']);
    $db->bind(':period1', $data['period1']);
    $db->bind(':period2', $data['period2']);
    $db->bind(':period3', $data['period3']);
    $db->bind(':period4', $data['period4']);
    $db->bind(':period5', $data['period5']);
    $db->bind(':timetable_id', $data['timetable_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function update_user($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE user SET
            email = :email,
            password = :password,
            fname = :fname,
            lname = :lname,
            username = :username,
            userlevel = :userlevel,
            avatar = :avatar,
            ip = :ip,
            created = :created,
            lastlogin = :lastlogin,
            lastip = :lastip,
            notes = :notes,
            phone = :phone,
            gender = :gender,
            newsletter = :newsletter,
            active = :active,
            userrole = :userrole,
            branch_id = :branch_id,
            address_id = :address_id
        WHERE
            user_id = :user_id
        ');

    $db->bind(':email', $data['email']);
    $db->bind(':password', $data['password']);
    $db->bind(':fname', $data['fname']);
    $db->bind(':lname', $data['lname']);
    $db->bind(':username', $data['username']);
    $db->bind(':userlevel', $data['userlevel']);
    $db->bind(':avatar', $data['avatar']);
    $db->bind(':ip', $data['ip']);
    $db->bind(':created', $data['created']);
    $db->bind(':lastlogin', $data['lastlogin']);
    $db->bind(':lastip', $data['lastip']);
    $db->bind(':notes', $data['notes']);
    $db->bind(':phone', $data['phone']);
    $db->bind(':gender', $data['gender']);
    $db->bind(':newsletter', $data['newsletter']);
    $db->bind(':active', $data['active']);
    $db->bind(':userrole', $data['userrole']);
    $db->bind(':branch_id', $data['branch_id']);
    $db->bind(':address_id', $data['address_id']);
    $db->bind(':user_id', $data['user_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...
function update_zone($data)
{
    $db = new Conexion;
    $db->cdp_query('UPDATE zone SET
            country_code = :country_code,
            zone_name = :zone_name
        WHERE
            zone_id = :zone_id
        ');

    $db->bind(':country_code', $data['country_code']);
    $db->bind(':zone_name', $data['zone_name']);
    $db->bind(':zone_id', $data['zone_id']);
    return $db->cdp_execute();
}

// Functions for other tables follow the same pattern...


// Functions for other tables follow the same pattern...

function getAny($query)
{
    $db = new Conexion;
    $db->cdp_query($query);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getBranch($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM branch WHERE ".$where." ORDER BY branch_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getSession($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM session WHERE ".$where." ORDER BY session_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getUser($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM user WHERE ".$where." ORDER BY user_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getStaff($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM staff WHERE ".$where." ORDER BY staff_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getDept($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM dept WHERE ".$where." ORDER BY dept_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getStudent($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM student WHERE ".$where." ORDER BY student_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getCourse($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM course WHERE ".$where." ORDER BY course_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllocation($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM allocation WHERE ".$where." ORDER BY allocation_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllocationHistory($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM allocation_history WHERE ".$where." ORDER BY allocation_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getCourseRegister($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM course_register WHERE ".$where." ORDER BY course_register_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getTimetable($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM timetable WHERE ".$where." ORDER BY timetable_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAttendance($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM attendance WHERE ".$where." ORDER BY attendance_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getMessage($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM message WHERE ".$where." ORDER BY message_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getCredential($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM credential WHERE ".$where." ORDER BY credential_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getCredentialDetails($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM credential_details WHERE ".$where." ORDER BY credential_details_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getEmailTemplate($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM email_template WHERE ".$where." ORDER BY email_template_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getNotification($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM notification WHERE ".$where." ORDER BY notification_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getNotificationUser($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM notification_user WHERE ".$where." ORDER BY notification_user_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getState($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM state WHERE ".$where." ORDER BY state_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getCity($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM city WHERE ".$where." ORDER BY city_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAddress($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM address WHERE ".$where." ORDER BY address_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getSettings($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM settings WHERE ".$where." ORDER BY settings_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}


function getStyle($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM style WHERE ".$where." ORDER BY style_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getInvoice($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM invoice WHERE ".$where." ORDER BY invoice_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getGenerated($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM generated WHERE ".$where." ORDER BY generated_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getPaidInvoice($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM paid_invoice WHERE ".$where." ORDER BY paid_invoice_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getPortfolio($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM portfolio WHERE ".$where." ORDER BY portfolio_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getTestimonial($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM testimonial WHERE ".$where." ORDER BY testimonial_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getEducation($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM education WHERE ".$where." ORDER BY education_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getExperience($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM experience WHERE ".$where." ORDER BY experience_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getJob($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM job WHERE ".$where." ORDER BY function_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getSkills($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM skills WHERE ".$where." ORDER BY skills_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getItem($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM item WHERE ".$where." ORDER BY item_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getFacts($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM facts WHERE ".$where." ORDER BY facts_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getForm($where)
{
    $db = new Conexion;
    $sql = "SELECT * FROM form WHERE ".$where." ORDER BY form_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}



function getAllBranch()
{
    $db = new Conexion;
    $sql = "SELECT * FROM branch ORDER BY branch_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllSession()
{
    $db = new Conexion;
    $sql = "SELECT * FROM session ORDER BY session_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllUser()
{
    $db = new Conexion;
    $sql = "SELECT * FROM user ORDER BY user_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllStaff()
{
    $db = new Conexion;
    $sql = "SELECT * FROM staff ORDER BY staff_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllDept()
{
    $db = new Conexion;
    $sql = "SELECT * FROM dept ORDER BY dept_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllStudent()
{
    $db = new Conexion;
    $sql = "SELECT * FROM student ORDER BY student_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllCourse()
{
    $db = new Conexion;
    $sql = "SELECT * FROM course ORDER BY course_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllAllocation()
{
    $db = new Conexion;
    $sql = "SELECT * FROM allocation ORDER BY allocation_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllAllocationHistory()
{
    $db = new Conexion;
    $sql = "SELECT * FROM allocation_history ORDER BY allocation_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllCourseRegister()
{
    $db = new Conexion;
    $sql = "SELECT * FROM course_register ORDER BY course_register_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllTimetable()
{
    $db = new Conexion;
    $sql = "SELECT * FROM timetable ORDER BY timetable_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllAttendance()
{
    $db = new Conexion;
    $sql = "SELECT * FROM attendance ORDER BY attendance_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllMessage()
{
    $db = new Conexion;
    $sql = "SELECT * FROM message ORDER BY message_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllCredential()
{
    $db = new Conexion;
    $sql = "SELECT * FROM credential ORDER BY credential_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllCredentialDetails()
{
    $db = new Conexion;
    $sql = "SELECT * FROM credential_details ORDER BY credential_details_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllEmailTemplate()
{
    $db = new Conexion;
    $sql = "SELECT * FROM email_template ORDER BY email_template_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllNotification()
{
    $db = new Conexion;
    $sql = "SELECT * FROM notification ORDER BY notification_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllNotificationUser()
{
    $db = new Conexion;
    $sql = "SELECT * FROM notification_user ORDER BY notification_user_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllState()
{
    $db = new Conexion;
    $sql = "SELECT * FROM state ORDER BY state_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllCity()
{
    $db = new Conexion;
    $sql = "SELECT * FROM city ORDER BY city_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllAddress()
{
    $db = new Conexion;
    $sql = "SELECT * FROM address ORDER BY address_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllSettings()
{
    $db = new Conexion;
    $sql = "SELECT * FROM settings ORDER BY settings_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllInvoice()
{
    $db = new Conexion;
    $sql = "SELECT * FROM invoice ORDER BY invoice_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllGenerated()
{
    $db = new Conexion;
    $sql = "SELECT * FROM generated ORDER BY generated_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllPaidInvoice()
{
    $db = new Conexion;
    $sql = "SELECT * FROM paid_invoice ORDER BY paid_invoice_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllPortfolio()
{
    $db = new Conexion;
    $sql = "SELECT * FROM portfolio ORDER BY portfolio_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllTestimonial()
{
    $db = new Conexion;
    $sql = "SELECT * FROM testimonial ORDER BY testimonial_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllEducation()
{
    $db = new Conexion;
    $sql = "SELECT * FROM education ORDER BY education_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllExperience()
{
    $db = new Conexion;
    $sql = "SELECT * FROM experience ORDER BY experience_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllJob()
{
    $db = new Conexion;
    $sql = "SELECT * FROM job ORDER BY job_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllSkills()
{
    $db = new Conexion;
    $sql = "SELECT * FROM skills ORDER BY skills_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllItem()
{
    $db = new Conexion;
    $sql = "SELECT * FROM item ORDER BY item_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllFacts()
{
    $db = new Conexion;
    $sql = "SELECT * FROM facts ORDER BY facts_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}

function getAllForm()
{
    $db = new Conexion;
    $sql = "SELECT * FROM form ORDER BY form_id ASC";
    $db->cdp_query($sql);
    $db->cdp_execute();
    $row = $db->cdp_registros();

    return $row;
}


function deleteBranch($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM branch WHERE branch_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteSession($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM session WHERE session_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteUser($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM user WHERE user_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteStaff($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM staff WHERE user_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteDept($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM dept WHERE dept_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteStudent($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM student WHERE student_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteCourse($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM course WHERE course_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteAllocation($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM allocation WHERE allocation_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteAllocationHistory($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM allocation_history WHERE allocation_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteCourseRegister($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM course_register WHERE course_register_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteTimetable($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM timetable WHERE timetable_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteSigning($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM signing WHERE signing_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteMessage($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM message WHERE message_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteCredential($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM credential WHERE credential_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteCredentialDetails($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM credential_details WHERE credential_details_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteEmailTemplate($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM email_template WHERE email_template_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteNotification($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM notification WHERE notification_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteNotificationUser($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM notification_user WHERE notification_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteState($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM state WHERE state_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteCity($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM city WHERE city_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteAddress($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM address WHERE address_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteSettings($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM settings WHERE settings_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteInvoice($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM invoice WHERE invoice_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteGenerated($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM generated WHERE generated_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deletePaidInvoice($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM paid_invoice WHERE paid_invoice_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deletePortfolio($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM portfolio WHERE portfolio_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteTestimonial($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM testimonial WHERE testimonial_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteEducation($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM education WHERE education_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteExperience($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM experience WHERE experience_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteJob($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM job WHERE job_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteSkills($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM skills WHERE skills_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteItem($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM item WHERE item_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteFacts($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM facts WHERE facts_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}

function deleteForm($query)
{
    $db = new Conexion;
    $sql = "DELETE FROM form WHERE form_id = ". $query;
    $db->cdp_query($sql);
    $row = $db->cdp_execute();
    return $row;
}
