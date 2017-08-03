<?php 
// @group module-contact-us
$I = new AcceptanceTester($scenario);
$I->amMember();
$I->wantTo('open contact us page as member');
$I->setHeader("Accept", "text/html");
$I->amOnPage('/contact-us/');
$I->see('Contact us');
$I->dontSee('Name');
$I->dontSee('Email');
$I->see('Subject');
$I->see('Message');
