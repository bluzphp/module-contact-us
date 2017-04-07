<?php 
// @group module-contact-us
$I = new AcceptanceTester($scenario);
$I->wantTo('open contact us page');
$I->setHeader("Accept", "text/html");
$I->amOnPage('/contact-us/');
$I->see('Contact us');
