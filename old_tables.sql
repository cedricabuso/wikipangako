CREATE TABLE ACCOUNT(
	account_id INTEGER PRIMARY KEY AUTO_INCREMENT,	
	username VARCHAR(128),
	password VARCHAR(128),
	email VARCHAR(128),
	facebook_id VARCHAR(128),
	twitter_id VARCHAR(128),    
	enforcer_points INTEGER NOT NULL
);

CREATE TABLE POLITICIAN(
	politician_id INTEGER PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(128),
	spending VARCHAR(128),
	details VARCHAR(300),
	years_in_service INTEGER,
  position VARCHAR(128),
  province VARCHAR(128),
  city VARCHAR(128)
);

CREATE TABLE PROMISE(
	promise_id INTEGER PRIMARY KEY AUTO_INCREMENT,
	date_needed DATE, 
	details VARCHAR(300),
	title VARCHAR(128),
	politician_id_fk INTEGER,
	FOREIGN KEY (politician_id_fk) REFERENCES POLITICIAN(politician_id)
);

CREATE TABLE IS_FAMILY_MEMBER(
  is_family_member_id INTEGER PRIMARY KEY AUTO_INCREMENT,
	relationship VARCHAR(128),
	politician1_id_fk INTEGER,
	politician2_id_fk INTEGER,
	FOREIGN KEY (politician1_id_fk) REFERENCES POLITICIAN(politician_id),
	FOREIGN KEY (politician2_id_fk) REFERENCES POLITICIAN(politician_id)
);

CREATE TABLE RATES(
  rates_id INTEGER PRIMARY KEY AUTO_INCREMENT,
	rating INTEGER,
	account_id_fk INTEGER,
	politician_id_fk INTEGER,
	FOREIGN KEY (account_id_fk) REFERENCES ACCOUNT(account_id),
	FOREIGN KEY (politician_id_fk) REFERENCES POLITICIAN(politician_id)
);

ALTER TABLE RATES ADD rates_id INTEGER PRIMARY KEY AUTO_INCREMENT FIRST;

ALTER TABLE WIKIP MODIFY COLUMN caption TEXT;
CREATE TABLE WIKIP(
	wikip_id INTEGER PRIMARY KEY AUTO_INCREMENT,
	url VARCHAR(256),
	date_added TIMESTAMP,
	approved INTEGER,
	caption TEXT,
  is_question INTEGER,
  answer VARCHAR(128),
	politician_id_fk INTEGER,
	account_id_fk INTEGER,
	FOREIGN KEY (account_id_fk) REFERENCES ACCOUNT(account_id),	
	FOREIGN KEY (politician_id_fk) REFERENCES POLITICIAN(politician_id)	
);

CREATE TABLE IS_WATCHING(
  is_watching_id INTEGER PRIMARY KEY AUTO_INCREMENT,
  account_id_fk INTEGER,
  politician_id_fk INTEGER,
  FOREIGN KEY (account_id_fk) REFERENCES ACCOUNT(account_id),
  FOREIGN KEY (politician_id_fk) REFERENCES POLITICIAN(politician_id)
);

CREATE TABLE IS_CONTACT(
  is_contact_id INTEGER PRIMARY KEY AUTO_INCREMENT,
  account_id1_fk INTEGER,
  account_id2_fk INTEGER,
  FOREIGN KEY (account_id1_fk) REFERENCES ACCOUNT(account_id),
  FOREIGN KEY (account_id2_fk) REFERENCES ACCOUNT(account_id)
);

CREATE TABLE PROJECT(
	project_id INTEGER PRIMARY KEY AUTO_INCREMENT,
	project_name VARCHAR(300),
	project_status VARCHAR(100)
);

ALTER TABLE WIKIP ADD COLUMN project_id FOREIGN KEY REFERENCES PROJECT(project_id);

INSERT INTO POLITICIAN (name, spending, details, years_in_service, position, province, city) VALUES ('Noynoy Aquino', 'P500,000,000', 'Porky', 3, 'President', null, null);
INSERT INTO POLITICIAN (name, spending, details, years_in_service, position, province, city) VALUES ('Jojo Binay', 'P500,000,000', 'Oink', 3, 'Vice President', null, null);