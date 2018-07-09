--create tables in default postgres database

--to do: add constraints and foreign keys

CREATE TABLE public.customers (
	customer_name varchar NOT NULL
);

CREATE TABLE public.company (
	company_unique_id varchar NOT NULL,
	company_name varchar NOT NULL
);

CREATE TABLE public.bank_accounts (
	company_unique_id varchar NOT NULL,
	bank_account varchar NOT NULL,
	bank_account_number varchar NOT NULL,
	main_currency varchar NOT NULL,
	bank_short_name varchar NOT NULL,
	bank_name varchar NOT NULL,
	account_group varchar NULL,
	account_sub_group varchar NULL,
	bank_account_status varchar NULL,
	bank_account_type varchar NULL,
	bank_account_closing_date date NULL,
	bank_account_opening_date date NULL,
	counterparty_unique_id varchar NULL
);

--Users table to be used by the login script

CREATE TABLE public.users (
  userId serial primary key,
  userName varchar NOT NULL,
  userEmail varchar NOT null unique,
  userPass varchar NOT NULL
);