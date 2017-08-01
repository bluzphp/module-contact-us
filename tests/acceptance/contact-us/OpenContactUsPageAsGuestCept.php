<?php 
// @group module-contact-us
$I = new AcceptanceTester($scenario);
$I->wantTo('open contact us page as guest');
$I->setHeader("Accept", "text/html");
$I->amOnPage('/contact-us/');
$I->see('Contact us');
$I->see('Name');
$I->see('Email');
$I->see('Subject');
$I->see('Message');
