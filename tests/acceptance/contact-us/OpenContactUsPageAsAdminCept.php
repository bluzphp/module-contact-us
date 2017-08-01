<?php 
// @group module-contact-us
$I = new AcceptanceTester($scenario);
$I->amAdmin();
$I->wantTo('open contact us page as admin');
$I->setHeader("Accept", "text/html");
$I->amOnPage('/contact-us/');
$I->see('Contact us');
