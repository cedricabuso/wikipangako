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
	political_party VARCHAR(128),
	birthday DATE,
  educational_background VARCHAR(128),
  former_elected_positions VARCHAR(128),
  position VARCHAR(128),
  province VARCHAR(128),
  city VARCHAR(128)
);

CREATE TABLE ROLE(
  role_id INTEGER PRIMARY KEY AUTO_INCREMENT,
  role_type INTEGER NOT NULL,
  account_id_fk INTEGER,
  politician_id_fk INTEGER,
  FOREIGN KEY (account_id_fk) REFERENCES ACCOUNT(account_id),
	FOREIGN KEY (politician_id_fk) REFERENCES POLITICIAN(politician_id)
);

CREATE TABLE PROMISE(
	promise_id INTEGER PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(128),
	details VARCHAR(300),
	politician_id_fk INTEGER,
	FOREIGN KEY (politician_id_fk) REFERENCES POLITICIAN(politician_id)
);

CREATE TABLE WIKIP(
	wikip_id INTEGER PRIMARY KEY AUTO_INCREMENT,
	url VARCHAR(256),
	date_added TIMESTAMP NOT NULL,
	approved INTEGER NOT NULL,
	caption TEXT NOT NULL,
  is_question INTEGER NOT NULL,
  answer VARCHAR(128),
	politician_id_fk INTEGER NOT NULL,
	account_id_fk INTEGER NOT NULL,
	promise_id_fk INTEGER,
	FOREIGN KEY (account_id_fk) REFERENCES ACCOUNT(account_id),
	FOREIGN KEY (politician_id_fk) REFERENCES POLITICIAN(politician_id),
	FOREIGN KEY (promise_id_fk) REFERENCES PROMISE(promise_id)
);

CREATE TABLE RATES(
  rates_id INTEGER PRIMARY KEY AUTO_INCREMENT,
  rating INTEGER,
  account_id_fk INTEGER,
  politician_id_fk INTEGER,
  FOREIGN KEY (account_id_fk) REFERENCES ACCOUNT(account_id),
  FOREIGN KEY (politician_id_fk) REFERENCES POLITICIAN(politician_id)
);

CREATE TABLE TRACKS(
  tracks_id INTEGER PRIMARY KEY AUTO_INCREMENT,
  status INTEGER,
  account_id_fk INTEGER,
  promise_id_fk INTEGER,
  FOREIGN KEY (account_id_fk) REFERENCES ACCOUNT(account_id),
  FOREIGN KEY (promise_id_fk) REFERENCES PROMISE(promise_id)
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

CREATE TABLE IS_FAMILY_MEMBER(
    is_family_member_id INTEGER PRIMARY KEY AUTO_INCREMENT,
	relationship VARCHAR(128),
	politician1_id_fk INTEGER,
	politician2_id_fk INTEGER,
	FOREIGN KEY (politician1_id_fk) REFERENCES POLITICIAN(politician_id),
	FOREIGN KEY (politician2_id_fk) REFERENCES POLITICIAN(politician_id)
);

CREATE TABLE DEMAND(
	demand_id INTEGER PRIMARY KEY AUTO_INCREMENT,
	account_id_fk INTEGER,
	wikip_id_fk INTEGER,
	FOREIGN KEY (account_id_fk) REFERENCES ACCOUNT(account_id),
	FOREIGN KEY (wikip_id_fk) REFERENCES WIKIP(wikip_id)
);

CREATE TABLE POLITICIAN_PROFILE(
	politician_profile_id INTEGER PRIMARY KEY AUTO_INCREMENT,
	date_added TIMESTAMP NOT NULL,
	category VARCHAR(128),
	details VARCHAR(500),
	account_id_fk INTEGER,
	politician_id_fk INTEGER,
	FOREIGN KEY (account_id_fk) REFERENCES ACCOUNT(account_id),
	FOREIGN KEY (politician_id_fk) REFERENCES POLITICIAN(politician_id)
);

//ACCOUNT SEMI_LOCKS POLITICIAN_PROFILE
CREATE TABLE SEMI_LOCKS(
	semi_locks_id INTEGER PRIMARY KEY AUTO_INCREMENT,
	account_id_fk INTEGER,
  politician_profile_id_fk INTEGER,
	FOREIGN KEY (account_id_fk) REFERENCES ACCOUNT(account_id),
	FOREIGN KEY (politician_profile_id_fk) REFERENCES POLITICIAN_PROFILE(politician_profile_id)
);

//ROLE INTEGER:
1 - normal user
2 - politician
3 - moderator

//PROMISE status INTEGER:
1 - done
2 - in progress
3 - stalled
4 - failed