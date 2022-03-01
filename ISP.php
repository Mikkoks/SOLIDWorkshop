<?php

interface Mailer 
{
	translate();
	log();
	sendSMS();
	sendEmail();
	formatMessage();
}
--->
interface Translator;
interface Logger;
interface SMSMailer;
interface Emailer;
interface MessageFormatter;

