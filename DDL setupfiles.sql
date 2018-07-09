--create tables in default postgres database

CREATE TABLE customers (
	customer_name varchar NOT NULL,
	CONSTRAINT customers_pk PRIMARY KEY (customer_name),
	CONSTRAINT customers_un UNIQUE (customer_name)
)
WITH (
	OIDS=FALSE
) ;

CREATE TABLE company (
	company_unique_id varchar NOT NULL,
	company varchar NOT NULL,
	reporting_currency varchar NOT NULL,
	company_sub_group varchar NOT NULL,
	company_group varchar NOT NULL,
	company_top_group varchar NOT NULL,
	company_holding varchar NOT NULL,
	customer_name varchar NOT NULL,
	CONSTRAINT company_pk PRIMARY KEY (company_unique_id),
	CONSTRAINT company_un UNIQUE (company_unique_id)
)
WITH (
	OIDS=FALSE
) ;

CREATE TABLE bank_accounts (
	company_unique_id varchar NOT NULL,
	bank_account varchar NOT NULL,
	bank_account_number varchar NOT NULL,
	main_currency varchar NOT NULL,
	bank_short_name varchar NOT NULL,
	bank_name varchar NOT NULL,
	CONSTRAINT bank_accounts_pk PRIMARY KEY (bank_account),
	CONSTRAINT bank_accounts_un UNIQUE (bank_account)
)
WITH (
	OIDS=FALSE
) ;

--Users table to be used by the login script

CREATE TABLE users (
	userid serial NOT NULL,
	username varchar NOT NULL,
	useremail varchar NOT NULL,
	userpass varchar NOT NULL,
	CONSTRAINT users_pkey PRIMARY KEY (userid),
	CONSTRAINT users_useremail_key UNIQUE (useremail)
)
WITH (
	OIDS=FALSE
) ;