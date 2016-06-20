<?php

$userFixtures = new \tests\codeception\fixtures\UserFixture();
$userFixtures->load();

$booksFixture = new \tests\codeception\fixtures\BookFixture();
$booksFixture->load();


$I = new FunctionalTester($scenario);
$I->haveHttpHeader('Content-Type', 'application/json');

$I->sendGET('/lib/users/stat');
$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson([
    'name' => 'Петров Петр'
]);
$I->dontSeeResponseContainsJson([
    'name' => 'Иванов Иван',
]);
