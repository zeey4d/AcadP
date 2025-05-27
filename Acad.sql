DROP DATABASE acad;
-- إنشاء قاعدة البيانات
CREATE DATABASE acad;
USE acad;


-- جدول المستخدمين
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    university VARCHAR(100),
    department VARCHAR(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (username, email, password, university, department) VALUES
('Ahmed', 'ahmed@example.com', 'hashed_password_here', 'University of Sana\'a', 'Computer Science'),
('Sara', 'sara@example.com', 'hashed_password_here', 'University of Aden', 'Engineering'),
('ziad', 'ziad@gmail.com', '33334444', 'University of Taiz', 'Business Administration');

SELECT * FROM users;
SELECT password FROM users WHERE email = 'ziad@gmail.com';

-- جدول الأبحاث
CREATE TABLE researches (
    research_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    title VARCHAR(255) NOT NULL,
    abstract TEXT NOT NULL,
    full_text LONGTEXT,
    pdf_url VARCHAR(255),
    thumbnail_url VARCHAR(255),
    publication_date DATE,
    page_count INT,
    doi VARCHAR(100),
    views_count INT DEFAULT 0,
    downloads_count INT DEFAULT 0,
    citations_count INT DEFAULT 0,
--     journal_id INT,
    volume VARCHAR(20),
    issue VARCHAR(20),
    is_published BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO researches (
    category_id, title, full_text,abstract , pdf_url, thumbnail_url, 
    publication_date, page_count, doi, volume, issue, is_published
) VALUES 
(
    1, 'تأثير الذكاء الاصطناعي في التعليم', 
    'بحث حول تأثير الذكاء الاصطناعي في تطوير التعليم الحديث.', 
    'نص البحث الكامل هنا...', 
    'sciimm.pdf', 
    'https://example.com/image1.jpg', 
    '2025-05-24', 25, 
    2, 'Vol 10', 'Issue 2', TRUE
),
(
    2, 'تحليل البيانات الضخمة في الصحة', 
    'دراسة حول كيفية استخدام البيانات الضخمة لتحسين الرعاية الصحية.', 
    'نحليل البيانات الضخمة في مجال الصحة هو نهج حديث يعتمد على تقنيات الذكاء الاصطناعي والتعلم الآلي لاستخلاص رؤى قيمة من كميات هائلة من البيانات الطبية. يهدف هذا التحليل إلى تحسين جودة الرعاية الصحية، تعزيز التشخيص المبكر، وتخصيص العلاجات وفقًا للملفات الصحية الفردية للمرضى.
تشمل مصادر البيانات الضخمة في الصحة السجلات الطبية الإلكترونية، بيانات الأجهزة القابلة للارتداء، نتائج الفحوصات المخبرية، والتصوير الطبي. من خلال تحليل هذه البيانات، يمكن لمقدمي الرعاية الصحية التنبؤ بالأمراض، تحسين إدارة المستشفيات، وتقليل التكاليف التشغيلية.
على الرغم من الفوائد الكبيرة، يواجه تحليل البيانات الضخمة في الصحة تحديات مثل خصوصية البيانات، تكامل الأنظمة المختلفة، وضمان دقة البيانات. ومع ذلك، فإن التطورات المستمرة في التكنولوجيا توفر حلولًا مبتكرة للتغلب على هذه العقبات وتحقيق أقصى استفادة من البيانات الضخمة في تحسين الرعاية الصحية.', 
    'sciimm.pdf', 
    'SRob.jpg', 
    '2025-04-12', 30, 
    3, 'Vol 8', 'Issue 5', TRUE
),
(
    3, 'استخدام الروبوتات في العمليات الجراحية', 
    'دراسة حول تأثير الروبوتات الطبية في تحسين دقة العمليات الجراحية وتقليل المضاعفات.', 
    'تتناول هذه الورقة العلمية دور الأنظمة الروبوتية الذكية في جراحة القلب والجراحة العصبية...', 
    'https://example.com/research4.pdf', 
    'https://example.com/image4.jpg', 
    '2025-07-20', 35, 
    4,'Vol 15', 'Issue 6', TRUE
),
(
    4, 'تحليل تأثير تغير المناخ على الصحة العامة', 
    'بحث حول العلاقة بين تغير المناخ وانتشار الأمراض المزمنة والمعدية.', 
    'يستعرض البحث البيانات المناخية والتأثيرات الصحية طويلة المدى على المجتمعات...', 
    'https://example.com/research5.pdf', 
    'https://example.com/image5.jpg', 
    '2025-08-05', 50,
    5,
    'Vol 18', 'Issue 4', FALSE
    );



-- جدول تصنيفات الأبحاث
CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    icon_class VARCHAR(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- جدول علاقة الأبحاث بالتصنيفات (Many-to-Many)
CREATE TABLE research_categories (
    research_id INT,
    category_id INT,
    PRIMARY KEY (research_id, category_id),
    FOREIGN KEY (research_id) REFERENCES researches(research_id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- جدول المؤلفين (علاقة Many-to-Many بين المستخدمين والأبحاث)
-- CREATE TABLE authors (
--     author_id INT AUTO_INCREMENT PRIMARY KEY,
--     research_id INT,
--     user_id INT,
--     author_order INT NOT NULL COMMENT 'ترتيب المؤلف في البحث',
--     is_corresponding BOOLEAN DEFAULT FALSE,
--     FOREIGN KEY (research_id) REFERENCES researches(research_id) ON DELETE CASCADE,
--     FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SELECT * FROM users;


CREATE TABLE favorites (
    favorite_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    research_id INT NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(user_id, research_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (research_id) REFERENCES researches(research_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
