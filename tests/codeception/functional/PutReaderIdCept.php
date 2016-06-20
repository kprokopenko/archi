<?php

$userFixtures = new \tests\codeception\fixtures\UserFixture();
$userFixtures->load();

$booksFixture = new \tests\codeception\fixtures\BookFixture();
$booksFixture->load();


$I = new FunctionalTester($scenario);
$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPUT('/lib/books/1', [
    'reader_id' => 1,
]);
$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson([
    'title' => 'Книга 1',
    'reader_id' => 1,
]);

$I->sendGET('/lib/books', [
    'reader_id' => 1,
]);
$I->seeResponseCodeIs(200);
$I->seeResponseContainsJson([
    'title' => 'Книга 1',
    'reader_id' => 1,
]);
$I->dontSeeResponseContainsJson([
    'title' => 'Книга 2',
]);
