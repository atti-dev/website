CREATE TABLE courses (
    id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    course VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    period INT(6) NOT NULL,
    qualifications VARCHAR(191) NOT NULL,
    price_per_month FLOAT,
    total_price FLOAT,
    full_time TINYINT,
    course_type VARCHAR(191),
    img_url TEXT,
    created_at TIMESTAMP
    -- Add FULLTEXT Index for course
    -- Add FULLTEXT Index for description
);

CREATE TABLE course_learn_list (
    id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    course_id INT(6) NOT NULL,
    item TEXT NOT NULL,
    created_at TIMESTAMP,

    FOREIGN KEY (course_id) REFERENCES courses(id)
    -- Add FULLTEXT Index for item
);

CREATE TABLE registrations(
    id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    id_number VARCHAR(13) NOT NULL UNIQUE,
    email VARCHAR(191) NOT NULL,
    contact_number VARCHAR(15) NOT NULL,

    postal_address VARCHAR(50),
    postal_city VARCHAR(100),
    postal_code INT(4),
    home_address VARCHAR(50),
    home_city VARCHAR(100),
    home_code INT(4),

    qualification_name VARCHAR(191) NOT NULL,
    qualification_doc TEXT,
    id_copy TEXT,
    is_foreign TINYINT NOT NULL,
    permit TEXT,

    guardian_firstname VARCHAR(50) NOT NULL,
    guardian_lastname VARCHAR(50) NOT NULL,
    guardian_relation VARCHAR(50) NOT NULL,
    guardian_contact VARCHAR(15) NOT NULL,

    company_intials VARCHAR(10),
    company_lastname VARCHAR(50),
    company_position VARCHAR(191),
    company_email VARCHAR(191),
    company_telephone VARCHAR(15),
    company_reg_number VARCHAR(100),
    company_vat_number VARCHAR(100),
    company_postal_address VARCHAR(50),
    company_postal_city VARCHAR(100),
    company_postal_code INT(4),
    company_pysical_address VARCHAR(50),
    company_pysical_city VARCHAR(100),
    company_pysical_code INT(4),

    medical_aid_scheme VARCHAR(191),
    medical_member_number VARCHAR(100),
    medical_telephone VARCHAR(15),
    medical_illness TINYINT,
    medical_illness_description TEXT
);

CREATE TABLE web_messages (
    id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(50),
    contact_number VARCHAR(15),
    message TEXT NOT NULL,
    seen TINYINT DEFAULT(0) NOT NULL,
    -- created_at TIMESTAMP NOT NULL,
);