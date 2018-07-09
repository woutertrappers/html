--create tables in default postgres database

--to do: add constraints and foreign keys

CREATE TABLE public.customers (
	customer_name varchar NOT NULL
);

CREATE TABLE public.company (
	company_unique_id varchar NOT NULL,
	company varchar NOT null,
	reporting_currency varchar NOT null, 
	company_sub_group varchar NOT null, 
	company_group varchar NOT null,
	company_top_group varchar NOT null, 
	company_holding varchar NOT null,
	customer_name varchar not null
);

CREATE TABLE public.bank_accounts (
	company_unique_id varchar NOT NULL,
	bank_account varchar NOT NULL,
	bank_account_number varchar NOT NULL,
	main_currency varchar NOT NULL,
	bank_short_name varchar NOT NULL,
	bank_name varchar NOT null
);

--Users table to be used by the login script

CREATE TABLE public.users (
  userId serial primary key,
  userName varchar NOT NULL,
  userEmail varchar NOT null unique,
  userPass varchar NOT NULL
);