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
    '6.jpg', 
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

CREATE TABLE favorites (
    favorite_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    research_id INT NOT NULL,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(user_id, research_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (research_id) REFERENCES researches(research_id)
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

INSERT INTO researches (
    category_id, title, full_text, abstract, pdf_url, thumbnail_url, 
    publication_date, page_count, doi, volume, issue, is_published
) VALUES 
(9, 'تحليل تأثير التغير المناخي على الزراعة', 'نص البحث الكامل...', 'يعتبر تغير المناخ أحد التحديات العالمية الأكثر تأثيرًا على الزراعة. تتسبب التغيرات المناخية مثل زيادة درجات الحرارة وانخفاض معدل الأمطار في تدهور الأراضي الزراعية، مما يؤثر على إنتاج المحاصيل الزراعية ويزيد من الحاجة إلى تقنيات زراعية متطورة. يتناول هذا البحث دراسة تفصيلية عن تأثير التغيرات المناخية على الإنتاج الزراعي، بما في ذلك استخدام تقنيات الزراعة الذكية والتكيف مع الظروف البيئية المتغيرة. كما يناقش البحث تأثير انبعاثات غازات الاحتباس الحراري على خصوبة التربة ويوفر حلولًا للاستدامة الزراعية.', 'url_to_pdf1', 'url_to_thumbnail1', '2025-05-01', 12, '10.1234/climate', 3, 2, TRUE),
(10, 'دور الذكاء الاصطناعي في التشخيص الطبي', 'نص البحث الكامل...', 'شهد مجال الذكاء الاصطناعي تطورات هائلة في السنوات الأخيرة، حيث يتم استخدامه في العديد من المجالات، ومن أبرزها التشخيص الطبي. يساعد الذكاء الاصطناعي في تحسين سرعة ودقة التشخيص، مما يساهم في زيادة فرص العلاج الناجح وتقليل نسبة الأخطاء الطبية. يتناول البحث تطبيقات الذكاء الاصطناعي في المجالات الطبية المختلفة، مثل تحليل صور الأشعة والتعرف على الأنماط في البيانات الطبية للكشف المبكر عن الأمراض. كما يناقش البحث التحديات التقنية والأخلاقية التي تواجه استخدام الذكاء الاصطناعي في الطب وكيفية التغلب عليها.', 'url_to_pdf2', 'url_to_thumbnail2', '2025-04-15', 20, '10.5678/ai_medicine', 5, 1, TRUE),
(11, 'تحليل اقتصاديات الطاقة المتجددة', 'نص البحث الكامل...', 'أصبحت مصادر الطاقة المتجددة، مثل الطاقة الشمسية والرياح، جزءًا أساسيًا من خطط التنمية المستدامة. يهدف هذا البحث إلى دراسة اقتصاديات الطاقة المتجددة وتأثيراتها على النمو الاقتصادي العالمي، بالإضافة إلى تحليل التكلفة والعائد المرتبط باستخدام الطاقة النظيفة مقارنة بمصادر الطاقة التقليدية. يناقش البحث العوامل الرئيسية التي تؤثر على سوق الطاقة المتجددة، مثل السياسات الحكومية، الابتكارات التكنولوجية، والتحديات التمويلية. كما يقدم البحث تقييمًا للاستراتيجيات المتاحة لتعزيز استثمارات الطاقة المتجددة في مختلف الدول.', 'url_to_pdf3', 'url_to_thumbnail3', '2025-03-10', 18, '10.2345/renewable_energy', 4, 2, TRUE),
(12, 'أثر وسائل التواصل الاجتماعي على الصحة النفسية', 'نص البحث الكامل...', 'أصبحت وسائل التواصل الاجتماعي جزءًا لا يتجزأ من حياة الملايين حول العالم، إلا أنها تحمل تأثيرات كبيرة على الصحة النفسية للأفراد. يسلط البحث الضوء على مدى تأثير الاستخدام المفرط لوسائل التواصل الاجتماعي على الحالة النفسية، بما في ذلك زيادة القلق والتوتر، ضعف التركيز، والعزلة الاجتماعية. كما يناقش البحث الدور الإيجابي لهذه المنصات في تعزيز التواصل الاجتماعي ونشر الوعي حول الصحة النفسية. يتم تقديم استراتيجيات عملية للتحكم في استخدام وسائل التواصل الاجتماعي بشكل متوازن لضمان الاستفادة منها دون تأثير سلبي على الصحة النفسية.', 'url_to_pdf4', 'url_to_thumbnail4', '2025-02-20', 22, '10.7890/social_media', 6, 1, TRUE);


INSERT INTO researches (
    category_id, title, full_text, abstract, pdf_url, thumbnail_url, 
    publication_date, page_count, doi, volume, issue, is_published
) VALUES 
(5, 'التكنولوجيا الحيوية وتطور الصناعات الطبية', 'نص البحث الكامل...', 'تشهد التكنولوجيا الحيوية تطورًا سريعًا، مما يؤثر بشكل كبير على الصناعات الطبية والعلاجية. يتناول هذا البحث دراسة تطبيقات التكنولوجيا الحيوية الحديثة، مثل العلاج بالخلايا الجذعية، وتطوير اللقاحات باستخدام تقنيات الهندسة الوراثية. يناقش البحث أيضًا التأثير الأخلاقي لاستخدام هذه التقنيات، وكيفية تحقيق التوازن بين الابتكار العلمي والمسؤولية الأخلاقية.', 'url_to_pdf5', 'url_to_thumbnail5', '2025-05-05', 28, '10.3456/biotech', 7, 3, TRUE),
(6, 'تحليل استخدام البيانات الضخمة في اتخاذ القرار', 'نص البحث الكامل...', 'أصبحت البيانات الضخمة أداة أساسية في عالم الأعمال واتخاذ القرار، حيث تساعد في تحليل سلوك العملاء، تحسين استراتيجيات التسويق، وتطوير الخدمات بناءً على أنماط الاستخدام. يناقش هذا البحث التقنيات الحديثة لتحليل البيانات الضخمة، والتحديات التي تواجه المؤسسات في إدارة هذه البيانات بفعالية، مع اقتراح حلول لتعزيز استخدام البيانات في صنع القرار.', 'url_to_pdf6', 'url_to_thumbnail6', '2025-04-28', 24, '10.4567/big_data_decision', 8, 2, TRUE),
(7, 'تقنيات الذكاء الاصطناعي في تحسين كفاءة الطاقة', 'نص البحث الكامل...', 'الذكاء الاصطناعي يلعب دورًا كبيرًا في تحسين كفاءة استخدام الطاقة، سواء في الصناعات أو في المنازل. يركز البحث على كيفية استخدام تقنيات الذكاء الاصطناعي مثل التعلم الآلي وتحليل البيانات الضخمة لتحسين أداء أنظمة الطاقة وتخفيض التكاليف التشغيلية. كما يناقش البحث تطبيقات الذكاء الاصطناعي في أنظمة الطاقة الذكية والابتكارات في مجال الاستدامة.', 'url_to_pdf7', 'url_to_thumbnail7', '2025-03-22', 30, '10.6789/ai_energy', 9, 3, TRUE),
(8, 'الأمن السيبراني في عصر الرقمنة', 'نص البحث الكامل...', 'مع ازدياد التحول الرقمي، تزداد الحاجة إلى استراتيجيات قوية للأمن السيبراني لحماية المعلومات الحساسة. يناقش هذا البحث أحدث تطورات الأمن السيبراني، بما في ذلك التهديدات الإلكترونية الحديثة، واستراتيجيات الحماية، ودور الذكاء الاصطناعي في كشف التهديدات الأمنية. كما يقدم البحث حلولًا مبتكرة لتعزيز أمان البيانات في مختلف القطاعات.', 'url_to_pdf8', 'url_to_thumbnail8', '2025-02-10', 26, '10.7891/cyber_security_digital', 10, 1, TRUE),
(9, 'تأثير التعليم الإلكتروني على تطوير المهارات المهنية', 'نص البحث الكامل...', 'أحدث التعليم الإلكتروني ثورة في مجال التعليم والتدريب المهني، حيث أصبح من الممكن اكتساب المهارات دون الحاجة لحضور الفصول التقليدية. يتناول البحث تأثير التعليم الإلكتروني على تطوير المهارات المهنية، ودور منصات التعليم الإلكتروني في تعزيز الفهم والتفاعل بين المتعلمين، والتحديات التي تواجه أنظمة التعليم الإلكتروني في تحسين جودة المحتوى التعليمي.', 'url_to_pdf9', 'url_to_thumbnail9', '2025-01-15', 21, '10.8902/e_learning_skills', 11, 2, TRUE),
(10, 'دور الذكاء الاصطناعي في تحسين الخدمات الصحية', 'نص البحث الكامل...', 'يساهم الذكاء الاصطناعي في تحسين جودة الخدمات الصحية من خلال تحليل البيانات الطبية، تحسين طرق التشخيص، والمساعدة في تطوير استراتيجيات العلاج. يناقش البحث كيفية استخدام الذكاء الاصطناعي لتقليل التكاليف الطبية، وتحسين تجربة المرضى في المستشفيات والعيادات من خلال أنظمة ذكية تساعد الأطباء في تقديم خدمات أكثر دقة وفعالية.', 'url_to_pdf10', 'url_to_thumbnail10', '2025-01-05', 34, '10.9012/ai_health', 12, 3, TRUE);


SELECT * FROM researches ;

