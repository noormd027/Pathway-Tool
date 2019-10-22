DROP TABLE if exists Programme;
CREATE TABLE Programme (
    ProgrammeID int NOT NULL auto_increment,
    ProgrammeName varchar(255),
    PRIMARY KEY (ProgrammeID)
)ENGINE = MyISAM;

DROP TABLE if exists Pathway;
CREATE TABLE Pathway (
    PathwayID int NOT NULL auto_increment,
    PathwayName varchar(255),
	ProgrammeID int,
    PRIMARY KEY (PathwayID)
)ENGINE = MyISAM;

DROP TABLE if exists Course;
CREATE TABLE Course (
    CourseID int not null auto_increment,
    CourseCode varchar(8) NOT NULL,
	Level int, 
    CourseName varchar(255),
	PathwayID int,
	PreRequisite varchar(510),
	CoRequisite varchar(255), 
	Compulsory char(1), 
	Credits int, 
    PRIMARY KEY (CourseID)
)ENGINE = MyISAM;

--Insert Unitec Programmes
INSERT INTO Programme VALUES (1, 'Bachelor of Computing Systems');
INSERT INTO Programme VALUES (2, 'Graduate Diploma in Computing');

--Insert Unitec Programme Pathways 
INSERT INTO Pathway VALUES (1, 'Computing networks and cloud computing', 1);
INSERT INTO Pathway VALUES (2, 'Software engineering', 1);
INSERT INTO Pathway VALUES (3, 'Games development', 1);
INSERT INTO Pathway VALUES (4, 'Business intelligence', 1);
INSERT INTO Pathway VALUES (5, 'Cybersecurity', 1);

--Level 5 Courses
INSERT INTO Course VALUES (1, 'ISCG5400', 5, 'Hardware Fundamentals', NULL, NULL, NULL, 'Y', 15);
INSERT INTO Course VALUES (2, 'ISCG5401', 5, 'Operating System Fundamentals', NULL, NULL, NULL, 'Y', 15); 
INSERT INTO Course VALUES (3, 'ISCG5420', 5, 'Programming Fundamentals', NULL, NULL, NULL, 'Y', 15); 
INSERT INTO Course VALUES (4, 'ISCG5423', 5, 'Introduction to Databases', NULL, NULL, NULL, 'Y', 15); 
INSERT INTO Course VALUES (5, 'ISCG5424', 5, 'Information Systems Concepts', NULL, NULL, NULL, 'Y', 15); 
INSERT INTO Course VALUES (6, 'ISCG5430', 5, 'Professional Skills for IT Practitioners', NULL, NULL, NULL, 'Y', 15); 

INSERT INTO Course VALUES (7, 'HTCS5700', 5, 'Cyber Security Principles', NULL, NULL, NULL, 'N', 15);
INSERT INTO Course VALUES (8, 'ISCG5403', 5, 'Networking Fundamentals', NULL, NULL, NULL, 'N', 15);
INSERT INTO Course VALUES (9, 'ISCG5421', 5, 'Programming Principles and Practice', NULL, NULL, NULL, 'N', 15);
INSERT INTO Course VALUES (10, 'ISCG5422', 5, 'Multimedia and Website Development', NULL, NULL, NULL, 'N', 15);

--Level 6 Courses
INSERT INTO Course VALUES (11, 'ISCG6411', 6, 'Project Planning and Control', NULL, 'ISCG5410 or ISCG5424', 'ISCG5430', 'Y', 15);
INSERT INTO Course VALUES (12, 'ISCG6400', 6, 'Hardware Technology', NULL, 'ISCG5400', 'ISCG5430', 'N', 15); 
INSERT INTO Course VALUES (13, 'ISCG6401', 6, 'Data Communications and Networks', NULL, 'ISCG5403', 'ISCG5430', 'N', 15);
INSERT INTO Course VALUES (14, 'ISCG6402', 6, 'Network Administration and Support', NULL, 'ISCG5400 and ISCG5403', 'ISCG5430', 'N', 15);
INSERT INTO Course VALUES (15, 'ISCG6403', 6, 'Network Operating Systems Management', NULL, 'ISCG5401', 'ISCG5430', 'N', 15);
INSERT INTO Course VALUES (16, 'ISCG6404', 6, 'Web Server Management',  NULL, '(ISCG6402 or ISCG6225) and (ISCG5422 or ISCG5242)', 'ISCG5430', 'N', 15);
INSERT INTO Course VALUES (17, 'ISCG6407', 6, 'Fundamental Concepts in Cyber Security', NULL, 'ISCG5403', NULL, 'N', 15);
