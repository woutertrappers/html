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
	account_group integer,
	account_sub_group integer,
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

--Add integration with R and Python - these languages R-Cran, Python, plR and plPython are prerequisites

CREATE EXTENSION plr;

CREATE LANGUAGE plpythonu;

CREATE OR REPLACE FUNCTION r_max (integer, integer) RETURNS integer AS '
    if (arg1 > arg2)
       return(arg1)
    else
       return(arg2)
' LANGUAGE 'plr' STRICT;

CREATE FUNCTION pymax (a integer, b integer)
  RETURNS integer
AS $$
  if a > b:
    return a
  return b
$$ LANGUAGE plpythonu;

CREATE VIEW public."max account group" AS
select 
account_group
,account_sub_group
,r_max(account_group, account_sub_group) as "max account group R"
,pymax(account_group, account_sub_group) as "max account group python"
from public.bank_accounts;