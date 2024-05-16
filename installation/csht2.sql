-- Branch Table
CREATE TABLE branch (
    branch_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    code VARCHAR(5)
);

-- Session Table
CREATE TABLE session (
    session_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    year VARCHAR(255),
    current BOOLEAN
);



-- Address Table
CREATE TABLE address (
    address_id INT(11) NOT NULL,
    street VARCHAR(300) DEFAULT NULL,
    zip_code VARCHAR(300) DEFAULT NULL,
    city_id INT(11),
    PRIMARY KEY (address_id),
    FOREIGN KEY (city_id) REFERENCES city(city_id)
);


-- User Table
CREATE TABLE user (
    user_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255),
    password VARCHAR(255),
    fname VARCHAR(255),
    lname VARCHAR(255),
    username VARCHAR(255) DEFAULT NULL,
    userlevel TINYINT(1) UNSIGNED DEFAULT NULL,
    avatar VARCHAR(350) DEFAULT NULL,
    ip VARCHAR(16) DEFAULT NULL,
    created DATETIME DEFAULT NULL,
    lastlogin DATETIME DEFAULT NULL,
    lastip VARCHAR(16) DEFAULT NULL,
    notes TEXT,
    phone VARCHAR(255) DEFAULT NULL,
    gender VARCHAR(255) DEFAULT NULL,
    newsletter TINYINT(1) NOT NULL DEFAULT 0,
    active TINYINT(1) NOT NULL DEFAULT 1,
    userrole VARCHAR(55) NOT NULL,
    branch_id INT(11),
    address_id INT(11),  -- Changed column name to address_id
    FOREIGN KEY (branch_id) REFERENCES branch(branch_id),
    FOREIGN KEY (address_id) REFERENCES address(address_id)  -- Corrected foreign key reference
);


-- Staff Table
CREATE TABLE staff (
    staff_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    acct_no VARCHAR(10),
    acct_name VARCHAR(255),
    acct_bank VARCHAR(55),
    user_id INT(11),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

-- Department Table
CREATE TABLE dept (
    dept_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    iso VARCHAR(55),
    staff_id INT(11),
    FOREIGN KEY (staff_id) REFERENCES staff(staff_id)
);

-- Student Table
CREATE TABLE student (
    student_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    adm VARCHAR(25),
    role VARCHAR(25),
    dept_id INT(11),
    session_id INT(11),
    user_id INT(11),
    FOREIGN KEY (dept_id) REFERENCES dept(dept_id),
    FOREIGN KEY (session_id) REFERENCES session(session_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

-- Course Table
CREATE TABLE course (
    course_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255),
    code VARCHAR(6),
    unit INT(1),
    level INT(1),
    semester INT(1),
    dept_id INT(11),
    FOREIGN KEY (dept_id) REFERENCES dept(dept_id)
);

-- Allocation Table
CREATE TABLE allocation (
    allocation_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    contact INT(11),
    staff_id INT(11),
    course_id INT(11),
    FOREIGN KEY (staff_id) REFERENCES staff(staff_id),
    FOREIGN KEY (course_id) REFERENCES course(course_id)
);

-- Allocation History Table
CREATE TABLE allocation_history (
    allocation_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    staff_id INT(11),
    course_id INT(11),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (staff_id) REFERENCES staff(staff_id),
    FOREIGN KEY (course_id) REFERENCES course(course_id)
);

-- Course Register Table
CREATE TABLE course_register (
    course_register_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    ca FLOAT,
    exam FLOAT,
    attendance INT(2),
    branch_id INT(11),
    session_id INT(11),
    student_id INT(11),
    course_id INT(11),
    FOREIGN KEY (branch_id) REFERENCES branch(branch_id),
    FOREIGN KEY (session_id) REFERENCES session(session_id),
    FOREIGN KEY (student_id) REFERENCES student(student_id),
    FOREIGN KEY (course_id) REFERENCES course(course_id)
);

-- Timetable Table
CREATE TABLE timetable (
    timetable_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    branch_id INT(11),
    dept_id INT(11),
    semester INT(1),
    period1 VARCHAR(255),
    period2 VARCHAR(255),
    period3 VARCHAR(255),
    period4 VARCHAR(255),
    period5 VARCHAR(255),
    UNIQUE KEY (dept_id),
    FOREIGN KEY (branch_id) REFERENCES branch(branch_id),
    FOREIGN KEY (dept_id) REFERENCES dept(dept_id)
);

-- Signing Table
CREATE TABLE signing (
    signing_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    staff_id INT(11),
    course_id INT(11),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (staff_id) REFERENCES staff(staff_id),
    FOREIGN KEY (course_id) REFERENCES course(course_id)
);

-- Message Table
CREATE TABLE message (
    message_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    sender INT(11),
    recipient INT(11),
    body VARCHAR(500),
    subject VARCHAR(40),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender) REFERENCES user(user_id),
    FOREIGN KEY (recipient) REFERENCES user(user_id)
);

-- Credential Table
CREATE TABLE credential (
    credential_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    student_id INT(11),
    olevel VARCHAR(255),
    olevel2 VARCHAR(255),
    dobc VARCHAR(255),
    indigine VARCHAR(255),
    primary_cert VARCHAR(255),
    other_cert VARCHAR(255),
    FOREIGN KEY (student_id) REFERENCES student(student_id)
);

-- Credential Details Table
CREATE TABLE credential_details (
    credential_details_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    eng1 VARCHAR(1),
    mth1 VARCHAR(1),
    bio1 VARCHAR(1),
    che1 VARCHAR(1),
    phy1 VARCHAR(1),
    eng2 VARCHAR(1),
    mth2 VARCHAR(1),
    bio2 VARCHAR(1),
    che2 VARCHAR(1),
    phy2 VARCHAR(1),
    credential_id INT(11),
    FOREIGN KEY (credential_id) REFERENCES credential(credential_id)
);

-- Email Template Table
CREATE TABLE email_template (
    email_template_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    body TEXT,
    help TEXT,
    subject VARCHAR(40),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Notification Table
CREATE TABLE notification (
    notification_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    description VARCHAR(350),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Notification User Table
CREATE TABLE notification_user (
    notification_user_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    notification_read INT(1) DEFAULT 0,
    notification_status INT(11) DEFAULT 0,
    branch_id INT(11),
    user_id INT(11),
    FOREIGN KEY (branch_id) REFERENCES branch(branch_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);


-- Settings Table
CREATE TABLE settings (
    settings_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    site_name VARCHAR(50) DEFAULT NULL,
    c_nit VARCHAR(30) DEFAULT NULL,
    c_phone VARCHAR(30) DEFAULT NULL,
    cell_phone VARCHAR(30) DEFAULT NULL,
    c_address VARCHAR(60) DEFAULT NULL,
    c_country VARCHAR(60) DEFAULT NULL,
    c_city VARCHAR(60) DEFAULT NULL,
    c_postal VARCHAR(30) DEFAULT NULL,
    site_email VARCHAR(40) DEFAULT NULL,
    mailer ENUM('PHP', 'SMTP') DEFAULT 'PHP',
    smtp_names VARCHAR(120) DEFAULT NULL,
    email_address VARCHAR(120) DEFAULT NULL,
    smtp_host VARCHAR(120) DEFAULT NULL,
    smtp_user VARCHAR(120) DEFAULT NULL,
    smtp_password VARCHAR(60) DEFAULT NULL,
    smtp_port VARCHAR(10) DEFAULT NULL,
    smtp_secure VARCHAR(10) DEFAULT NULL,
    site_url VARCHAR(200) DEFAULT NULL,
    thumb_web VARCHAR(10) DEFAULT NULL,
    thumb_hweb VARCHAR(10) DEFAULT NULL,
    thumb_w VARCHAR(4) DEFAULT NULL,
    thumb_h VARCHAR(4) DEFAULT NULL,
    logo VARCHAR(500) DEFAULT NULL,
    logo_web VARCHAR(500) DEFAULT NULL,
    favicon VARCHAR(500) DEFAULT NULL,
    backup VARCHAR(600) DEFAULT NULL,
    version VARCHAR(5) DEFAULT NULL,
    prefix VARCHAR(6) DEFAULT NULL,
    track_digit VARCHAR(15) DEFAULT NULL,
    currency VARCHAR(120) DEFAULT NULL,
    for_currency VARCHAR(20) DEFAULT NULL,
    for_symbol VARCHAR(20) DEFAULT NULL,
    for_decimal VARCHAR(20) DEFAULT NULL,
    cformat TEXT,
    dec_point TEXT,
    thousands_sep TEXT,
    timezone VARCHAR(120) DEFAULT NULL,
    language VARCHAR(120) DEFAULT NULL,
    code_number TINYINT(4) DEFAULT NULL,
    digit_random VARCHAR(14) DEFAULT NULL,
    longitude FLOAT NOT NULL,
    latitude FLOAT NOT NULL,
    info_mail VARCHAR(55) NOT NULL,
    support_mail VARCHAR(55) NOT NULL,
    booking_mail VARCHAR(55) NOT NULL,
    customerservice_mail VARCHAR(55) NOT NULL,
    operations_mail VARCHAR(55) NOT NULL
);

-- Invoice Table
CREATE TABLE invoice (
    invoice_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(55),
    payer ENUM('Fresh', 'Returning', 'All') DEFAULT 'All',
    amount FLOAT,
    branch_id INT(11),
    dept_id INT(11),
    FOREIGN KEY (branch_id) REFERENCES branch(branch_id),
    FOREIGN KEY (dept_id) REFERENCES dept(dept_id)
);

-- Generated Table
CREATE TABLE generated (
    generated_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(55),
    payer ENUM('Fresh', 'Returning', 'All') DEFAULT 'All',
    amount_payable FLOAT,
    total_paid FLOAT,
    status TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    branch_id INT(11),
    student_id INT(11),
    dept_id INT(11),
    invoice_id INT(11),
    FOREIGN KEY (branch_id) REFERENCES branch(branch_id),
    FOREIGN KEY (student_id) REFERENCES student(student_id),
    FOREIGN KEY (dept_id) REFERENCES dept(dept_id),
    FOREIGN KEY (invoice_id) REFERENCES invoice(invoice_id)
);

-- Paid Invoice Table
CREATE TABLE paid_invoice (
    paid_invoice_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    amount_paid FLOAT,
    branch_id INT(11),
    confirmation TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    generated_id INT(11),
    FOREIGN KEY (branch_id) REFERENCES branch(branch_id),
    FOREIGN KEY (generated_id) REFERENCES generated(generated_id)
);

-- Portfolio Table
CREATE TABLE portfolio (
    portfolio_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    iam VARCHAR(200),
    about_me TEXT,
    dobc DATE,
    freelance VARCHAR(50),
    degree VARCHAR(50),
    more TEXT,
    objectives TEXT,
    facts TEXT,
    testimonials TEXT,
    contact TEXT,
    branch_id INT(11),
    staff_id INT(11),
    FOREIGN KEY (branch_id) REFERENCES branch(branch_id),
    FOREIGN KEY (staff_id) REFERENCES generated(generated_id)
);

-- Testimonial Table
CREATE TABLE testimonial (
    testimonial_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    testimony TEXT,
    user_id INT(11),
    portfolio_id INT(11),
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (portfolio_id) REFERENCES portfolio(portfolio_id)
);

-- Education Table
CREATE TABLE education (
    education_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    certificate VARCHAR(100),
    from_date DATE,
    to_date DATE,
    city VARCHAR(100),
    state VARCHAR(100),
    institution VARCHAR(100),
    about VARCHAR(500),
    portfolio_id INT(11),
    FOREIGN KEY (portfolio_id) REFERENCES portfolio(portfolio_id)
);

-- Experience Table
CREATE TABLE experience (
    experience_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    role VARCHAR(100),
    organization VARCHAR(100),
    from_date DATE,
    to_date DATE,
    city VARCHAR(100),
    state VARCHAR(100),
    portfolio_id INT(11),
    FOREIGN KEY (portfolio_id) REFERENCES portfolio(portfolio_id)
);

-- Job Table
CREATE TABLE job (
    function_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    description VARCHAR(100),
    experience_id INT(11),
    FOREIGN KEY (experience_id) REFERENCES experience(experience_id)
);

-- Skills Table
CREATE TABLE skills (
    skills_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    about VARCHAR(100),
    portfolio_id INT(11),
    FOREIGN KEY (portfolio_id) REFERENCES portfolio(portfolio_id)
);

-- Item Table
CREATE TABLE item (
    item_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    skill VARCHAR(100),
    percentage INT(11),
    skills_id INT(11),
    FOREIGN KEY (skills_id) REFERENCES skills(skills_id)
);

-- Facts Table
CREATE TABLE facts (
    facts_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    courses INT(11),
    lectures INT(11),
    students INT(11),
    staff_id INT(11),
    FOREIGN KEY (staff_id) REFERENCES staff(staff_id)
);

-- Form Table
CREATE TABLE form (
    form_id INT(11) PRIMARY KEY AUTO_INCREMENT,
    fname VARCHAR(100),
    lname VARCHAR(100),
    phone VARCHAR(100),
    address VARCHAR(100),
    city VARCHAR(100),
    state VARCHAR(100),
    choice VARCHAR(100),
    token VARCHAR(100)
);
